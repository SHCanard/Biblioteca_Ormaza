<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    } else {
    header ("Location: ../db/control.php");

    exit;
    }

    $now = time();

    if($now > $_SESSION['expire']) {
    session_destroy();

    header ("Location: ../index.php");
    exit;
    }
?>
<?php
    if (isset($_POST['btn4']))
    {
        include("../db/conexion.php");

        $nombre_categoria = $_POST['nombre_categoria'];

        $conexion->query("INSERT INTO categoria (nombre_categoria) values ('$nombre_categoria')");

        header ("Location: nueva_categoria.php");
    }
    
?>