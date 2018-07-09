<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    if (isset($_POST['btn11']))
    {
        include("../db/conexion.php");

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

        $conexion->query("INSERT INTO books (title_books, id_category_books, id_medium_books, author_books, editor_books, isbn_books, tags_books, internet_link_books, summary_books, inventory_number_books) values ('$titulo_libro', '$nombre_categoria_libro', '$id_medium_books', '$autor_libro', '$editorial_libro', '$isbn_libro', '$tags_books', '$link_books', '$summary_books', '$inventory_books')");

        header ("Location: new_books.php");
    }
    
?>