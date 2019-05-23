<?php

$user="root";
$pass="";
$db="tour";
$server="localhost";
$conn=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexion con el servidor");

try {
    $conn = new PDO("mysql:host=$server;dbname=$db;",$user,$pass);
} catch (PDOException $e) {
    die('Connected failed:'.$e->getMessage());
}

?>

