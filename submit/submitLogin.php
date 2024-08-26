<?php
session_start();
require_once('../config/mysql.php'); // Ensure that mysql.php sets up $mysqlClient
require_once('../config/dbconnect.php');
require_once('../functions.php');

$postData = $_POST;

// Validation du formulaire
if (isset($postData['email']) && isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour soumettre le formulaire.';
    } else {
        $email = trim(strip_tags($postData['email']));
        $password = trim(strip_tags($postData['password']));
        
        // Requête pour vérifier les informations de l'utilisateur
        $stmt = $mysqlClient->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérifier le mot de passe
            if (password_verify($password, $user['password'])) {
                // Connexion réussie
                $_SESSION['loggedUser'] = [
                    'user_id' => $user['user_id'],
                    'email' => $user['email'],
                ];
                // Redirection après une connexion réussie
                header('Location: ../index.php');
                exit;
            } else {
                // Mot de passe incorrect
                $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Le mot de passe est incorrect.';
            }
        } else {
            // Utilisateur non trouvé
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                'L\'utilisateur avec l\'email %s n\'existe pas.',
                htmlspecialchars($email)
            );
        }
    }
}

// Redirection en cas d'erreur
header('Location: ../index.php');
exit;
?>
