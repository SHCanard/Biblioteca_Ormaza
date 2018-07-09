<?php include('../templates/page_init_admin.tpl'); ?>
<?php
include('../db/conexion.php');
$id=$_GET['id'];
$conexion->query("DELETE FROM books WHERE id_books='$id'");
echo "<script>alert('Livre supprimé');location.href='list_books.php';</script>";
?>