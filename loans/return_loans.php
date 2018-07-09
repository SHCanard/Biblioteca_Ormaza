<?php include('../templates/page_init_admin.tpl'); ?>
<?php
include('../db/conexion.php');

$id=$_GET['id'];

$req = "
	SELECT id_book_loans FROM loans WHERE id_loans='$id';
       ";
    
$res = $conexion->query($req);

while($row = $res->fetch_array(MYSQLI_ASSOC))
	$nombre_libro_prestamo=$row['id_book_loans'];

$conexion->query("UPDATE loans SET state_loans='1', date_return_loans=NOW() WHERE id_loans='$id'");
$conexion->query("UPDATE books SET is_loaned_books=FALSE WHERE id_books='$nombre_libro_prestamo'");

header ("Location: pending_returns.php");
?>