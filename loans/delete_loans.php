<?php include('../templates/page_init_admin.tpl'); ?>
<?php
include('../db/conexion.php');

$id=$_GET['id'];

$conexion->query("DELETE FROM loans WHERE id_loans='$id'");

echo "<script>alert('Prêt supprimé');location.href='list_loans.php';</script>";
?>