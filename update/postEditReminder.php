<?php
session_start();
require_once("../functions.php");
?>

<?php if(isset($_FILES['newImage']) && $_FILES['newImage']['error']===0):?>
    <?php
            require_once('../config/mysql.php');
            require_once('../config/dbconnect.php');
        
            $postData = $_POST;
        if (
            //Je ne vais pas vérifier le statut et l'importance car ils ont déjà une valeur par défaut
            !isset($postData['id'])
            || !is_numeric($postData['id'])
            || empty($postData['title'])
            || empty($postData['event'])
            || empty($postData['date'])
            || trim(strip_tags($postData['title'])) === ''
            || trim(strip_tags($postData['event'])) === ''
            || trim(strip_tags($postData['date'])) === ''
        ) {
            echo 'Il manque des informations pour permettre l\'édition du formulaire.';
            return;
        }

        $id = (int)$postData['id'];
        $title = trim(strip_tags($postData['title']));
        $event = trim(strip_tags($postData['event']));
        $date = trim(strip_tags($postData['date']));
        $importance = trim(strip_tags($postData['importance']));
        $statut = trim(strip_tags($postData['statut']));

        $editReminderStatement = $mysqlClient->prepare('UPDATE reminders SET title = :title, event = :event, date= :date, importance= :importance, statut= :statut  WHERE reminder_id = :id');
        $editReminderStatement->execute([
            'title' => $title,
            'event' => $event,
            'date'  => $date,
            'importance'=> $importance,
            'statut'=> $statut,
            'id' => $id,
        ]);

        //Côté image
        // Déplacez le fichier téléchargé vers le répertoire d'upload
            $image_id = htmlspecialchars($_POST['image_id']);
            $file=$_FILES['newImage'];
            $fileTempName=$file['tmp_name'];
            $uploadDir='../uploads/';
            $fileName=basename($file['name']);
            $uploadfile=$uploadDir.$fileName;
            $moveFile=move_uploaded_file($fileTempName,$uploadfile);

        //SI LE FICHIER A BIEN ETE DEPLACER DANS LE FICHIER UPLOADS JE FAIS LA REQUETTE d4INSERTION DANS LA BASE DE DONNEE
            if($moveFile){
                // INSERER L'IMAGE
                // Préparer la requête pour mettre à jour l'image dans la base de données
                $sql = "UPDATE images SET image = :image WHERE image_id = :image_id";
                $stmt = $mysqlClient->prepare($sql);
                $stmt->bindParam(':image', $fileName);
                $stmt->bindParam(':image_id', $image_id);
                $stmt->execute();
            } else {
                    echo "Failed to upload file.";
                }
    ?>
    
        <?php  redirectToUrl('../index.php'); ?>

<?php else: ?> 
     <h1>No file was uploaded or there was an upload error.</h1>
<?php endif;?>




