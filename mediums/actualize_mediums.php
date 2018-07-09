<?php include('../templates/page_init_admin.tpl'); ?>
<?php   
    if(isset($_POST['btn8']))
    {
        include("../db/conexion.php");

        $id = $_POST['id'];
        $nombre_medium = $_POST['nombre_medium'];

        $conexion->query("UPDATE mediums SET name_mediums='$nombre_medium' WHERE id_mediums='$id'");
        header ("Location: list_mediums.php");
	}
?>