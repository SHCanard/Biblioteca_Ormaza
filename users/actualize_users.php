<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    if(isset($_POST['btn10']))
    {
        include("../db/conexion.php");

        $id = $_POST['id'];
        $nombre_estudiante = $_POST['nombre_estudiante'];
        $apellido_estudiante = $_POST['apellido_estudiante'];
        $telefono_estudiante = $_POST['telefono_estudiante'];
		$email_estudiante = $_POST['email_estudiante'];
        $direccion_estudiante = $_POST['direccion_estudiante'];

        $conexion->query("UPDATE users SET last_name='$nombre_estudiante', first_name='$apellido_estudiante', phone='$telefono_estudiante', email='$email_estudiante', organization='$direccion_estudiante' WHERE id='$id'");
        header ("Location: list_users.php");
    }
?>