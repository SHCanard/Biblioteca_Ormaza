<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    } else {
    header ("Location: ../db/control.php");

    exit;
    }

    $now = time();

    if($now > $_SESSION['expire']) {
    session_destroy();

    header ("Location: ../db/index.php");
    exit;
    }
?>
<?php
    if (isset($_POST['btn9']))
    {
        include("../db/conexion.php");

        $Codigo = $_POST['Codigo'];
        $Nombre = $_POST['Nombre'];
        $Apellidos = $_POST['Apellidos'];
        $Telefono = $_POST['Telefono'];
        $Direccion = $_POST['Direccion'];
        $Email = $_POST['Email'];
        $Contrasena = $_POST['Contrasena'];
        $Fecha_Nacimiento = $_POST['Fecha_Nacimiento'];
        $Tipo_Usuario = $_POST['Tipo_Usuario'];

        $conexion->query("INSERT INTO usuario (Codigo,Nombre,Apellidos,Telefono,Direccion,Email,Contrasena,Fecha_Nacimiento,Tipo_Usuario) values ('$Codigo', '$Nombre', '$Apellidos', '$Telefono', '$Direccion','$Telefono','$Email','$Contrasena','$Fecha_Nacimiento','$Tipo_Usuario',)");

        header ("Location: Nuevo_Usuario.php");
    }
    
?>