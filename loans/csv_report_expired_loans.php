<?php 
include('../templates/page_init_admin.tpl');
header("Content-type: application/csv;charset=UTF-8"); 
header("Content-disposition: attachment; filename=\"".$language['loan_list_name_csv']."\"");
echo "\xEF\xBB\xBF"; // UTF-8 BOM
include ("../db/conexion.php");

$mostrar = 
                    "
                        SELECT title_books,inventory_number_books,first_name,last_name,date_loans,date_expired_loans,date_return_loans,state_loans FROM loans JOIN users ON id=code_user_loans JOIN books ON id_book_loans=id_books WHERE date_expired_loans < NOW() AND state_loans='En cours' ORDER BY date_loans desc, state_loans;
                    ";

                    $res = $conexion->query($mostrar);


//$csv = "Livre;N° d'inventaire;Utilisateur;Date prêt;Date expiration;Date retour;Etat"."\n"; //row names
$csv = $language['book_title_long'].";".$language['book_inventory_number'].";".$language['user'].";".$language['loan_date'].";".$language['loan_date_expired'].";".$language['loan_date_return'].";".$language['loan_sate']."\n"; //row names

while ($fila = $res->fetch_assoc())
    {
	$csv.= $fila["title_books"].";".$fila["inventory_number_books"].";".$fila["first_name"]." ".$fila["last_name"].";".$fila["date_loans"].";".$fila["date_expired_loans"].";".$fila["date_return_loans"].";".$fila["state_loans"]."\n";
	}
print($csv);
exit;	
?>