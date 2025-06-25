<?php

$conn='mysql:host=localhost;dbname=colores';
$user='root';
$pass='';

try{
    $pdo=new PDO($conn,$user,$pass);
   // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
   
    //echo "Conexion exitosa";
}catch( PDOException $e){
    echo "Error de conexion: " . $e->getMessage();
}

