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
    if (isset($_POST['btn13']))
    {
        include("../db/conexion.php");

        $nombre_libro_prestamo = $_POST['nombre_libro_prestamo'];
        $doc_ident_estud_prestamo = $_POST['doc_ident_estud_prestamo'];
        $fecha_prestamo = $_POST['fecha_prestamo'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $estado_prestamo = $_POST['estado_prestamo'];

        $conexion->query("INSERT INTO prestamo (nombre_libro_prestamo, doc_ident_estud_prestamo, fecha_prestamo, fecha_vencimiento, estado_prestamo) values ('$nombre_libro_prestamo', '$doc_ident_estud_prestamo', '$fecha_prestamo', '$fecha_vencimiento', '$estado_prestamo')");

        header ("Location: nuevo_prestamo.php");
    }
    
?>