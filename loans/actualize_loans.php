<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    if(isset($_POST['btn14']))
    {
        include("../db/conexion.php");

        $id = $_POST['id'];
        $nombre_libro_prestamo = $_POST['nombre_libro_prestamo'];
        $doc_ident_estud_prestamo = $_POST['doc_ident_estud_prestamo'];
        $fecha_prestamo = $_POST['fecha_prestamo'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $fecha_devolucion = $_POST['fecha_devolucion'];
        $estado_prestamo = $_POST['estado_prestamo'];

$req = "
	SELECT id_book_loans FROM loans WHERE id_loans='$id';
       ";
    
$res = $conexion->query($req);

while($row = $res->fetch_array(MYSQLI_ASSOC))
	$id_book=$row['id_book_loans'];

		
        $conexion->query("UPDATE loans SET id_book_loans='$nombre_libro_prestamo', code_user_loans='$doc_ident_estud_prestamo', date_loans='$fecha_prestamo', date_expired_loans='$fecha_vencimiento', date_return_loans='$fecha_devolucion', state_loans='$estado_prestamo' WHERE id_loans='$id'");
		
		if($estado_prestamo=="En cours")
			$conexion->query("UPDATE books SET is_loaned_books=TRUE WHERE id_books='$id_book'");
		else
			$conexion->query("UPDATE books SET is_loaned_books=FALSE WHERE id_books='$id_book'");
		
		header ("Location: list_loans.php");
		
    }
?>