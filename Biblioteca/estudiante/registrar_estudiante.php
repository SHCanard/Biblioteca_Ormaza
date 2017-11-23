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
    if (isset($_POST['btn9']))
    {
        include("../db/conexion.php");

        $doc_identidad_estudiante = $_POST['doc_identidad_estudiante'];
        $nombre_estudiante = $_POST['nombre_estudiante'];
        $apellido_estudiante = $_POST['apellido_estudiante'];
        $telefono_estudiante = $_POST['telefono_estudiante'];
        $direccion_estudiante = $_POST['direccion_estudiante'];

        $conexion->query("INSERT INTO estudiante (doc_identidad_estudiante, nombre_estudiante, apellido_estudiante, telefono_estudiante, direccion_estudiante) values ('$doc_identidad_estudiante', '$nombre_estudiante', '$apellido_estudiante', '$telefono_estudiante', '$direccion_estudiante')");

        header ("Location: nuevo_estudiante.php");
    }
    
?>