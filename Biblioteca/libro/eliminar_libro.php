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
include('../db/conexion.php');

$id=$_GET['id'];

$conexion->query("DELETE FROM libro WHERE id='$id'");

echo "<script>alert('Registro Eliminado');location.href='listar_libros.php';</script>";

?>