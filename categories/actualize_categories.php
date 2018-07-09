<?php include('../templates/page_init_admin.tpl'); ?>
<?php   
    if(isset($_POST['btn8']))
    {
        include("../db/conexion.php");

        $id = $_POST['id'];
        $nombre_categoria = $_POST['nombre_categoria'];

        $conexion->query("UPDATE categories SET name_categories='$nombre_categoria' WHERE id_categories='$id'");
        header ("Location: list_categories.php");
?>