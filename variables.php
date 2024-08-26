<?php
    // $users=[
    //    [
    //      'full_name'=>'Alaise tchindou', 
    //      'email'=>'Alaise.tchindou@exemple.com',
    //      'password'=>'oklm',
    //    ],
    //    [
    //       'full_name'=>'Nom victor',
    //      'email'=>'Nom.victor@exemple.com',
    //      'password'=>'oklm',
    //    ]
    //    ];
        // $reminders=[
        //     [
        //         'title'=>'Evala',
        //         'event'=>'Evala est très très reconnu et pratiqué en pays kabyè. On parle là de la fête ou les hommes soulève les autres hommes.',
        //         'date'=>'',
        //         'importance'=>'high',
        //         'statut'=>'Coming'

        //     ],
        //     [
        //         'title'=>'Akpéma',
        //         'event'=>'Akpéma est très très reconnu et pratiqué en pays kabyè. On parle là de la fête ou les femmes marchent sur la montagne haha.',
        //         'date'=>'',
        //         'importance'=>'low',
        //         'statut'=>'ended'

        //     ]
        //     ];







    require_once('config/dbconnect.php');

    $sqlQuery= 'SELECT * FROM users';
    $usersStatment=$mysqlClient->prepare($sqlQuery);
    $usersStatment->execute();
    $users=$usersStatment->fetchAll();

    $sql= 'SELECT * FROM reminders';
    $remindersStatment=$mysqlClient->prepare($sql);
    $remindersStatment->execute();
    $reminders=$remindersStatment->fetchAll();



    $showImagesql= 'SELECT * FROM images';
    $showImagesStatment=$mysqlClient->prepare($showImagesql);
    $showImagesStatment->execute();
    $images=$showImagesStatment->fetchAll();
  
    
   