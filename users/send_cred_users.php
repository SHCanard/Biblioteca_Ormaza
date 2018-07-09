<?php include('../templates/page_init_admin.tpl');
include("../languages/config.php");
	include ("../db/conexion.php");

    $id = $_GET['id'];

    $cargar = 
    "
        SELECT email,password FROM users WHERE id='$id';
    ";

    $res = $conexion->query($cargar);

    $fila = $res->fetch_assoc();
	
	require '../phpmailer/mailing.php';
	
	$to=$fila['email'];
	$subject=$language['user_send_id_subject'];
	$body=$language['user_send_id_body']."<br>- ".$language['login']." : ".$fila['email']."<br>- ".$language['password']." : ".$fila['password']."<br><br>".$language['contact'];
	
	$mailstate=mailing($to,$body,$subject);
	
	if($mailstate==0)
		echo "<script>alert('".$language['email_sent']."');location.href='list_users.php';</script>";
	else
		echo "<script>alert('".$language['email_error']." ".$mailstate."');location.href='list_users.php';</script>";
?>