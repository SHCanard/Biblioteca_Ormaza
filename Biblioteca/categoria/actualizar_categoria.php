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
    
    if(isset($_POST['btn8']))
    {
        include("../db/conexion.php");

        $id = $_POST['id'];
        $nombre_categoria = $_POST['nombre_categoria'];

        $conexion->query("UPDATE categoria SET nombre_categoria='$nombre_categoria' WHERE id='$id'");
        header ("Location: listar_categorias.php");
    }

?>