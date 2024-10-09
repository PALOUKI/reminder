<?php 
   session_start();
   require_once('variables.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/99d6117b83.js" crossorigin="anonymous"></script>
    <title>Reminder</title>
</head>
<body>

   <?php require_once('includes/header.php'); ?>
      
   <?php require_once('users/login.php'); ?>

   <?php if (isset($_SESSION['loggedUser'])) : ?>
      <?php require_once('includes/drawerComponent.php'); ?>

            <!--Ajouter dynamiquement des reminders -->
      <div class="">
         <?php  require_once("home/connectContenuAcceuil.php"); ?>
      </div>
   <?php endif; ?>   
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

   <?php require_once('includes/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script src="script.js"></script>
</body>
</html>
