<?php 
header("Content-type: application/csv;charset=UTF-8"); 
header("Content-disposition: attachment; filename=\"liste_des_utilisateurs.csv\"");
echo "\xEF\xBB\xBF"; // UTF-8 BOM
include('../templates/page_init_admin.tpl');
include ("../db/conexion.php");

$mostrar = 
                    "
                        SELECT * FROM users WHERE user_type!=1 ORDER BY last_name,first_name;
                    ";

                    $res = $conexion->query($mostrar);


//$csv = "Prénom;Nom;Téléphone;Email;Service"."\n"; //row names
$csv = $language['user_firstname'].";".$language['user_lastname'].";".$language['user_phone'].";".$language['user_email'].";".$language['user_organization']."\n"; //row names


while ($fila = $res->fetch_assoc())
    {
	$csv.= $fila["first_name"].";".$fila["last_name"].";".$fila["phone"].";".$fila["email"].";".$fila["organization"]."\n";
	}
print($csv);
exit;	
?>
