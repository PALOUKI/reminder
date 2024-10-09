<?php

    require_once('config/dbconnect.php');

    $sqlQuery= 'SELECT * FROM users';
    $usersStatment=$mysqlClient->prepare($sqlQuery);
    $usersStatment->execute();
    $users=$usersStatment->fetchAll();

    $sql= 'SELECT * FROM reminders WHERE user_id=?';
    $remindersStatment=$mysqlClient->prepare($sql);
    $remindersStatment->execute(
        [
            $_SESSION["loggedUser"]["user_id"]
        ]
    );
    $reminders=$remindersStatment->fetchAll();



    $showImagesql= 'SELECT * FROM images WHERE user_id=?';
    $showImagesStatment=$mysqlClient->prepare($showImagesql);
    $showImagesStatment->execute([
        $_SESSION["loggedUser"]["user_id"]
    ]);
    $images=$showImagesStatment->fetchAll();
  
    
   
