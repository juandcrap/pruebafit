<?php
include_once("../../conexion.php");
$Doc_identidad = $_GET ['Doc_identidad'];
$sql = "DELETE FROM entrenador WHERE Doc_identidad=:Doc_identidad";
$query = $dbConn->prepare($sql);
$query->execute(array(':Doc_identidad' => $Doc_identidad)); 
header("Location: adminentrenadores.php");
?>