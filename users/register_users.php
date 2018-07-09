<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    if (isset($_POST['btn9']))
    {
        include("../db/conexion.php");

		$nombre_estudiante = $_POST['nombre_estudiante'];
        $apellido_estudiante = $_POST['apellido_estudiante'];
        $telefono_estudiante = $_POST['telefono_estudiante'];
		$email_estudiante = $_POST['email_estudiante'];
        $direccion_estudiante = $_POST['direccion_estudiante'];
		
		$password = substr($apellido_estudiante,0,2);
		$password .= substr($nombre_estudiante,0,2);
		$password .= mt_rand(10,99);
		$password=strtr($password,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		
        $conexion->query("INSERT INTO users (last_name, first_name, phone, organization, email, password) values ('$nombre_estudiante', '$apellido_estudiante', '$telefono_estudiante', '$direccion_estudiante', '$email_estudiante', '$password')");

	include("../phpmailer/mailing.php");
	
	$to=$email_estudiante;
	$subject="Vos identifiants sur le système de bibliothèque";
	$body="Bonjour,<br><br>Vos identifiants sont :<br>- Login : ".$to."<br>- Mot de passe : ".$password."<br><br>Système de bibliothèque";
	
	$mailstate=mailing($to,$body,$subject);

    header ("Location: new_users.php");
    }
?>