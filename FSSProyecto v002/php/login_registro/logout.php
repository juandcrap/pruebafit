<?php
    require '../configsesion.php';
    session_destroy();

    header('Location: ../../html/index.html');
?>