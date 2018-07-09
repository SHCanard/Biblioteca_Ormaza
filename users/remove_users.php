<?php include('../templates/page_init_admin.tpl'); ?>
<?php
include('../db/conexion.php');

$id=$_GET['id'];

$conexion->query("DELETE FROM users WHERE id='$id'");

echo "<script>alert('Utilisateur supprimé');location.href='list_users.php';</script>";

?>