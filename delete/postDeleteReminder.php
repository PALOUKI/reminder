<?php
session_start();
require_once("../config/mysql.php");
require_once("../config/dbconnect.php");
require_once("../functions.php");
 echo "ok";
    $postData=$_POST;
  if(!isset($postData['id']) || !is_numeric($postData['id'])){
    echo "il manque les id pour permettre la suppression du reminder";
  }
  if(!isset($postData['imge_id']) || !is_numeric($postData['image_id'])){
    echo "il manque les id pour permettre la suppression de l'image";
  }

  $id=(int)$postData['id'];
  $sqlQuery=("DELETE FROM reminders WHERE reminder_id=:id");
  $stmt=$mysqlClient->prepare($sqlQuery);
  $stmt->execute([
    'id'=>$id,
  ]);

  //côté image
  $image_id=htmlspecialchars((int)$postData['image_id']);
    // Supprimer l'enregistrement de l'image dans la base de données
    $stmt = $mysqlClient->prepare("DELETE FROM images WHERE image_id = :id");
    $stmt->execute([
        'id' => $image_id
    ]);
    redirectToUrl('../index.php');