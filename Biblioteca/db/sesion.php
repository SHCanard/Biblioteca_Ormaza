<?php 
  $Codigo=$_POST['Codigo'];
  $Contrasena=$_POST['Contrasena'];

	include("Conexion.php");
	// Consulta en la tabla de usuarios si el usiario existe y con la contraseña ingresada en el formulario de inicio_sesion
	$login = $mysqli->query("SELECT Codigo, Tipo_Usuario FROM usuario WHERE Codigo = '$Codigo' and Contrasena = '$Contrasena'") or die("Error: no consulta");
    
	$if = $login->fetch_object();

		if ($if->Tipo_Usuario == 0){
			header('Location: ../Menu_Usuario.php');
		}
		else{
			header('Location: ../Menu_Administrador.php');
		};
	?>
	