<?php
    session_start();
    require_once('../functions.php');

    if(isset($_POST['submit'])){
        $postData=$_POST;
        if(isset($postData['title'])){
            $title=strip_tags($postData['title']);
        }else{
            $_SESSION['fileErrrorTitle']= "Le titre est obligatoire";
        }
        if(isset($postData['event'])){
            $event=strip_tags($postData['event']);
            
        }else{
            $_SESSION['fileErrror']= "L'évènement est obligatoire";
        }

        if(isset($postData['date'])){
            $date=strip_tags($postData['date']);           
        }
        
        if(isset($postData['importance'])){
            $importance=strip_tags($postData['importance']);
            
        }
        if(isset($postData['statut'])){
            $statut=strip_tags($postData['statut']);
           
        }
        if(isset($_FILES['image']) && $_FILES['image']['error']===0){
           
            
            
                require_once('../config/mysql.php');
                require_once('../config/dbconnect.php');
                $file=$_FILES['image'];
                $fileTempName=$file['tmp_name'];
                $uploadDir='../uploads/';
                $uploadfile=$uploadDir.basename($file['name']);
                $moveFile=move_uploaded_file($fileTempName,$uploadfile);

                //SI LE FICHIER A BIEN ETE DEPLACER DANS LE FICHIER UPLOADS JE FAIS LA REQUETTE d4INSERTION DANS LA BASE DE DONNEE
                if($moveFile){
                    // INSERER L'IMAGE
                    $imageQuery='INSERT INTO images(image) VALUES(:image)';
                    $imagesStatement=$mysqlClient->prepare($imageQuery);
                 $retourImage=   $imagesStatement->execute([
                        ":image"=> $file['name']
                 ]);
                    //INSERER le titre, la description, la date, l'importance, le statut de l'évènement
                    $reminderQuery='INSERT INTO reminders(title, event, date, importance, statut)
                                    VALUES (:title, :event, :date, :importance, :statut)';
                    $remindersStatement=$mysqlClient->prepare($reminderQuery);
                    $retourReminder=   $remindersStatement->execute([
                        
                        ":title"=> $postData['title'],
                        ":event"=> $postData['event'],
                        ":date"=> $postData['date'],
                        ":importance"=> $postData['importance'],
                        ":statut"=> $postData['statut'],
                 ]);


                    if($retourImage){
                        redirectToUrl('../index.php');
                    }else{
                        echo ("Une ereur est survenue lors de l'envoie du ficher. ".$e->getMessage());
                    }
                    if($retourReminder){
                        redirectToUrl('../index.php');
                    }else{
                        echo ("Echec de l'ajout du rappel. ".$e->getMessage());
                    }
                   
                    // $images=$imagesStatement->fetchAll(); 
                    // $reminders=$remindresStatement->fetchAll(); 
                }
            }
           




               redirectToUrl('../index.php');
        }
    
       
     
    
   

  
  