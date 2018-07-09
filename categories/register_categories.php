<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    if (isset($_POST['btn4']))
    {
        include("../db/conexion.php");

        $nombre_categoria = $_POST['nombre_categoria'];

        $conexion->query("INSERT INTO categories (name_categories) values ('$nombre_categoria')");

        header ("Location: new_categories.php");
    }
?>