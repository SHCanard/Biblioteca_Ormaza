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
    
    if(isset($_POST['btn10']))
    {
        include("../db/conexion.php");

        $id = $_POST['id'];
        $doc_identidad_estudiante = $_POST['doc_identidad_estudiante'];
        $nombre_estudiante = $_POST['nombre_estudiante'];
        $apellido_estudiante = $_POST['apellido_estudiante'];
        $telefono_estudiante = $_POST['telefono_estudiante'];
        $direccion_estudiante = $_POST['direccion_estudiante'];

        $conexion->query("UPDATE estudiante SET doc_identidad_estudiante='$doc_identidad_estudiante', nombre_estudiante='$nombre_estudiante', apellido_estudiante='$apellido_estudiante', telefono_estudiante='$telefono_estudiante', direccion_estudiante='$direccion_estudiante'    WHERE id='$id'");
        header ("Location: listar_estudiantes.php");
    }

?>