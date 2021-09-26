<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar datos</title>
</head>
<body>
<?php
include_once("../../conexion.php");
if(isset ($_POST['Submit']) ){
    $Doc_identidad = $_POST['Doc_identidad'];
    $Tipo_doc = $_POST['Tipo_doc'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Tel_contacto = $_POST['Tel_contacto'];
    $Cel_contacto = $_POST['Cel_contacto'];
    $Email = $_POST['Email'];

    
    $sql = "INSERT INTO cliente(Doc_identidad, Tipo_doc, Nombres, Apellidos, Tel_contacto, Cel_contacto, Email) 
            VALUES (:Doc_identidad, :Tipo_doc, :Nombres, :Apellidos, :Tel_contacto, :Cel_contacto, :Email)";
    $query = $dbConn->prepare($sql);
    $query->bindparam (':Doc_identidad', $Doc_identidad);
    $query->bindparam (':Tipo_doc', $Tipo_doc);
    $query->bindparam (':Nombres', $Nombres);
    $query->bindparam (':Apellidos', $Apellidos);
    $query->bindparam (':Tel_contacto', $Tel_contacto);
    $query->bindparam (':Cel_contacto', $Cel_contacto);
    $query->bindparam (':Email', $Email);
    $query->execute();

    echo'<script type="text/javascript"> alert("Cliente agregado"); window.location.href="adminclientes.php";
    </script>';
    }

?>
</body>
</html>