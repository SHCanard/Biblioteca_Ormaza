<?php 
include('../templates/page_init_admin.tpl');
$med = $_GET['med']; 
header("Content-type: application/csv;charset=UTF-8"); 
header("Content-disposition: attachment; filename=\"".$language['book_list_name_csv']."\"");
echo "\xEF\xBB\xBF"; // UTF-8 BOM
include ("../db/conexion.php");

$mostrar = 
                    "
                        SELECT title_books,summary_books,internet_link_books,tags_books,name_categories,name_mediums,author_books,editor_books,isbn_books,inventory_number_books,CASE is_loaned_books WHEN TRUE THEN 'Oui' ELSE 'Non' END AS is_loaned_books FROM books,categories,mediums WHERE id_categories=id_category_books AND id_mediums=id_medium_books AND id_mediums=".$med.";
                    ";

                    $res = $conexion->query($mostrar);

$csv = $language['book_title'].";".$language['book_summary'].";".$language['book_link'].";".$language['book_keywords'].";".$language['book_category'].";".$language['book_medium'].";".$language['book_author'].";".$language['book_editor'].";".$language['book_ISBN'].";".$language['book_title'].";".$language['book_inventory_number'].";".$language['book_is_loaned']."\n"; //row names

while ($fila = $res->fetch_assoc())
    {
	$csv.= $fila["title_books"].";".trim(preg_replace('/\s\s+/', ' ',$fila["summary_books"])).";".$fila["internet_link_books"].";".$fila["tags_books"].";".$fila["name_categories"].";".$fila["name_mediums"].";".$fila["author_books"].";".$fila["editor_books"].";".$fila["isbn_books"].";".$fila["inventory_number_books"].";".$fila["is_loaned_books"]."\n";
	}
print($csv);
exit;	
?>