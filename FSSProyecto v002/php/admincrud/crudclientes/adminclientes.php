<?php
include_once("../../conexion.php");
$result = $dbConn->query("SELECT * FROM cliente");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GYM FSS</title>
        <link rel="stylesheet" href="../../../css/estilos.css">
    </head>

<body>

    <!--ESTA ES LA CABECERA-->
    <header>
        <div class="centrarnav">
            <div class="logo">
                FITNESS STORAGE SYSTEM
            </div>
            <nav>
                <a href="adminclientes.php"><span class="activo">CLIENTES</span></a>
                <a href="../crudentrenadores/adminentrenadores.php">ENTRENADORES</a>
                <a href="../../login_registro/registro.php">REGISTRAR</a>
                <a href="../../login_registro/logout.php">SALIR</a>
            </nav>
        </div>
    </header>

    <!--ESTO ES LA PORTADA-->
    
    <div class="espaciotop contenedor">
        <div class="title2">clientes</div>
        <div class="subtitle">INICIO • <span class="inactivo">CLIENTES</span></div>
    </div>

    <!--ESTO ES EL CONTENIDO-->

<section class="espaciotop">
<div class="centrarnav"><a href="form_adicionar.html" class="btn-neon">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    <span id="span5"></span>
                    ADICIONAR CLIENTE</a></div><br><br>
    <table class="centrarnav contenido-tabla">
        <thead>
            <tr id="tabla-crud">
                <th>Tipo doc</th>
                <th>Doc. Identidad</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Télefono</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Acción</th>
            </tr>
        </thead>
        <?php
        while ( $row = $result->fetch(PDO::FETCH_ASSOC) ){
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $row['Tipo_doc'] . "</td>";
            echo "<td>" . $row['Doc_identidad'] . "</td>";
            echo "<td>" . $row['Nombres'] . "</td>";
            echo "<td>" . $row['Apellidos'] . "</td>";
            echo "<td>" . $row['Tel_contacto'] . "</td>";
            echo "<td>" . $row['Cel_contacto'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td> <span class='link'><a href=\"editar.php?Doc_identidad=$row[Doc_identidad]\">Editar</a></span> | <span class='link'><a href=\"eliminar.php?Doc_identidad=$row[Doc_identidad]\" 
            onClick=\"return confirm('¿Está seguro de eliminar este registro?') \">Eliminar</a></span></td>";
    }
    ?>
    </table>
</section>

        <p class="espaciobot"></p>


</body>

</html>