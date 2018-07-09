<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    if (isset($_POST['btn13']))
    {
        include("../db/conexion.php");

        $nombre_libro_prestamo = $_POST['nombre_libro_prestamo'];
        $doc_ident_estud_prestamo = $_POST['doc_ident_estud_prestamo'];
        $fecha_prestamo = $_POST['fecha_prestamo'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $estado_prestamo = "En cours";

        $conexion->query("INSERT INTO loans (id_book_loans, code_user_loans, date_loans, date_expired_loans, state_loans) values ('$nombre_libro_prestamo', '$doc_ident_estud_prestamo', '$fecha_prestamo', '$fecha_vencimiento', '$estado_prestamo')");
		$conexion->query("UPDATE books SET is_loaned_books=TRUE WHERE id_books='$nombre_libro_prestamo';");

		echo "<script>alert('Prêt créé !');location.href='new_loans.php';</script>";
    }
    
?>