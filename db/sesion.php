<?php
session_start();

  $Codigo=$_POST['Codigo'];
  $Contrasena=$_POST['Contrasena'];

	include("conexion.php");
	// Consulta en la tabla de usuarios si el usiario existe y con la contraseña ingresada en el formulario de inicio_sesion
	$login = $mysqli->query("SELECT id, user_type, first_name FROM users WHERE email = '$Codigo' and password = '$Contrasena'") or die($language['no_results']);

	$if = $login->fetch_object();

		if (!empty($if) AND $if->user_type == 1){
			$_SESSION['loggedin']=true;
			$_SESSION['name']=$if->first_name;
			$_SESSION['usertype']=$if->user_type;
			$now = time();
			$_SESSION['expire']=$now+1200;
			header('Location: ../menu/administrator_menu.php');
		}
		elseif (!empty($if) AND $if->user_type == 0){
			$_SESSION['loggedin']=true;
			$_SESSION['id']=$if->id;
			$_SESSION['login']=$Codigo;
			$_SESSION['name']=$if->first_name;
			$_SESSION['usertype']=$if->user_type;
			$now = time();
			$_SESSION['expire']=$now+1200;
			header('Location: ../menu/user_menu.php');
		}
		else
			{
			session_destroy();
			header('Location: index.php');
			exit;
			}
?>
