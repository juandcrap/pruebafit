<?php
require '../configsesion.php';

if (isset($_POST['login'])) {
    $errMsg = '';

    //Get  data from FORM
    $Doc_identidad = $_POST['Doc_identidad'];
    $Password = $_POST['Password'];

    if ($errMsg == '') {
        try {
            $stmt = $connect->prepare('SELECT Doc_identidad, Nom_usuario, Password, Tipo_usuario FROM login WHERE Doc_identidad=:Doc_identidad');
            $stmt->execute(array(':Doc_identidad' => $Doc_identidad));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data == false) {
                echo'<script type="text/javascript"> alert("Usuario no encontrado. Vuelva a intentarlo."); window.location.href="login.php"; </script>';
            } else {
                if ($Password == $data['Password']) {
                    $_SESSION['Doc_identidad'] = $data['Doc_identidad'];
                    $_SESSION['Nom_usuario'] = $data['Nom_usuario'];
                    $_SESSION['Password'] = $data['Password'];
                    $_SESSION['Tipo_usuario'] = $data['Tipo_usuario'];

                    header('Location: ../admincrud/crudclientes/adminclientes.php');
                    exit;
                } else
                    echo'<script type="text/javascript"> alert("Contraseña incorrecta. Vuelva a intentarlo."); window.location.href="login.php"; </script>';
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/estilos.css">
</head>
<body>
        <div class="login-box">
            <img src="../../img/person_3.jpg" class="avatar">
            <h1>Ingresa</h1>
                <form action="" method="post">
                <p>Núm. Documento</p>
                <input type="text" name="Doc_identidad" placeholder="Ingrese su documento" 
                value="<?php if (isset($_POST['Doc_identidad'])) echo $_POST['Doc_identidad'] ?>" autocomplete="off" required/>
                <p>Contraseña</p>
                <input type="password" name="Password" placeholder="Ingrese su contraseña" 
                value="<?php if (isset($_POST['Password'])) echo $_POST['Password'] ?>" autocomplete="off" required/>
                <br><br><br>
                <button><input type="submit" name='login' value="Ingresar"/></button>
            </form>
        </div>
                <?php
                    if (isset($errMsg)) {
                        echo '<div style="color:white;text-align:center;font-size:17px;">' . $errMsg . '</div>';
                    }
            ?>
</body>
</html>