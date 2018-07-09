<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    if(isset($_POST['btn12']))
    {
        include("../db/conexion.php");

        $id = $_POST['id_books'];
        $titulo_libro = $_POST['title_books'];
        $nombre_categoria_libro = $_POST['id_category_books'];
		$id_medium_books = $_POST['id_medium_books'];
        $autor_libro = $_POST['author_books'];
        $editorial_libro = $_POST['editor_books'];
        $isbn_libro = $_POST['isbn_books'];
		$tags_books = $_POST['tags_books'];
		$link_books = $_POST['link_books'];
		$summary_books = $_POST['summary_books'];
		$inventory_books = $_POST['inventory_books'];

        $conexion->query("UPDATE books SET tags_books='$tags_books', internet_link_books='$link_books', summary_books='$summary_books', inventory_number_books='$inventory_books', title_books='$titulo_libro', id_category_books='$nombre_categoria_libro', id_medium_books='$id_medium_books', author_books='$autor_libro', editor_books='$editorial_libro', isbn_books='$isbn_libro' WHERE id_books='$id'");
        header ("Location: list_books.php");
    }
?>