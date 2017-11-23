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
    
    if(isset($_POST['btn14']))
    {
        include("../db/conexion.php");

        $id = $_POST['id'];
        $nombre_libro_prestamo = $_POST['nombre_libro_prestamo'];
        $doc_ident_estud_prestamo = $_POST['doc_ident_estud_prestamo'];
        $fecha_prestamo = $_POST['fecha_prestamo'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $fecha_devolucion = $_POST['fecha_devolucion'];
        $estado_prestamo = $_POST['estado_prestamo'];

        $conexion->query("UPDATE prestamo SET nombre_libro_prestamo='$nombre_libro_prestamo', doc_ident_estud_prestamo='$doc_ident_estud_prestamo', fecha_prestamo='$fecha_prestamo', fecha_vencimiento='$fecha_vencimiento', fecha_devolucion='$fecha_devolucion', estado_prestamo='$estado_prestamo'    WHERE id='$id'");
        header ("Location: listar_prestamos.php");
    }

?>