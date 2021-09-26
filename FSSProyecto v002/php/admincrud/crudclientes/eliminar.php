<?php
include_once("../../conexion.php");
$Doc_identidad = $_GET ['Doc_identidad'];
$sql = "DELETE FROM cliente WHERE Doc_identidad=:Doc_identidad";
$query = $dbConn->prepare($sql);
$query->execute(array(':Doc_identidad' => $Doc_identidad)); 
header("Location: adminclientes.php");
?>