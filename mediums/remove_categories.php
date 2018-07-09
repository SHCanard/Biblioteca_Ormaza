<?php include('../templates/page_init_admin.tpl'); ?>
<?php
include('../db/conexion.php');

$id=$_GET['id'];

$conexion->query("DELETE FROM categories WHERE id_categoreis='$id'");

echo "<script>alert('Catégorie supprimée');location.href='list_categories.php';</script>";
?>