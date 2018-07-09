<?php include("../languages/config.php");?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
  <title><?php echo $language['connection']; ?></title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/icons/book.ico" />
    <script src="../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../css/sweet-alert.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login2.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../js/modernizr.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
</head>

<body class="full-cover-background login">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
           <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
       </p>
       <center><h4 class="text-center all-tittles" style="margin-bottom: 30px;"><?php echo $language['connection']; ?></h4>
  <form action="sesion.php" method="post">
      <label for="Codigo"><?php echo $language['login']; ?> :</label>
      <input type="text" id="Codigo" name="Codigo"><br><br>
      <label for="Contrasena"><?php echo $language['password']; ?> :</label>
      <input type="password" id="Contrasena" name="Contrasena"><br><br>
      <button type="submit" name="enviar"><?php echo $language['connect']; ?></button>
  </form> 
  <footer>
<!--      <p>¿No estás registrado? Regístrate <a href="Registrar_Usuario.php">aquí</a></p>-->
  </footer>
  </center>
  </div>
</body>
</html>