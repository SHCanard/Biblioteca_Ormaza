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
    
    if(isset($_POST['btn12']))
    {
        include("../db/conexion.php");

        $id = $_POST['id'];
        $titulo_libro = $_POST['titulo_libro'];
        $nombre_categoria_libro = $_POST['nombre_categoria_libro'];
        $autor_libro = $_POST['autor_libro'];
        $editorial_libro = $_POST['editorial_libro'];
        $isbn_libro = $_POST['isbn_libro'];

        $conexion->query("UPDATE libro SET titulo_libro='$titulo_libro', nombre_categoria_libro='$nombre_categoria_libro', autor_libro='$autor_libro', editorial_libro='$editorial_libro', isbn_libro='$isbn_libro'    WHERE id='$id'");
        header ("Location: listar_libros.php");
    }

?>