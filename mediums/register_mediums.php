<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    if (isset($_POST['btn4']))
    {
        include("../db/conexion.php");

        $nombre_medium = $_POST['nombre_medium'];

        $conexion->query("INSERT INTO mediums (name_mediums) values ('$nombre_medium')");

        header ("Location: new_mediums.php");
    }
?>