<?php
require_once('mysql.php'); 
    try{
        $mysqlClient= new PDO(sprintf(
            'mysql:host=%s;dbname=%s',
            $serverName,
            $dbName),
            $user,
            $password
        );
        $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die('error: '.$e->getMessage());
    }