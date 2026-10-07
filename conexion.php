<?php

$host ="127.0.0.1";
$db_name ="mi_sitio";
$user ="root";
$password = " ";

try{
    $conexion = new PDO ("mysql:host=$host;dbname=$dbname; chastset=utf8",
    $username, $password);

    $conexion -> setAttribute(PDO:: ATTR)


}catch{

}

?>