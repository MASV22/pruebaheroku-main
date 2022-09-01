<?php 
    //  (COMPARAR MYSQL)
    header("Access-Control-Allow-Origin: *");
    $dbname = "pruebasu_pwa";
    $dns = "mysql:host=localhost;dbname=$dbname";
    $user = "pruebasu_pwa1";
    $pass = "Admin22699";
    try{
        $db = new PDO($dns,$user,$pass);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
 
?>


