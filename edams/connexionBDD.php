<?php
    try{
        $db = new PDO('mysql:host=localhost;dbname=edams','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
    catch(PDOException $e){
        die('Errer :'.$e->getMessage());
    }
