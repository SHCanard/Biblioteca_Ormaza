<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    
    include ("../db/conexion.php");

    $id = $_GET['id'];

    $cargar = 
    "
        SELECT * FROM users WHERE id='$id';
    ";

    $res = $conexion->query($cargar);

    $fila = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['user_edit']; ?></title>
    <?php include('../templates/head.tpl'); ?>
</head>
<body>
    <?php include('../templates/navbar_lateral.tpl'); ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php include('../templates/navbar_user.tpl'); ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['user_edit']; ?></small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation"><a href="new_users.php"><?php echo $language['user_add']; ?></a></li>
                <li role="presentation" class="active"><a href="list_users.php"><?php echo $language['user_list']; ?></a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> <?php echo $language['user_edit']; ?></div>
                <form autocomplete="off" method="POST" action="actualize_users.php">
                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <legend><?php echo $language['user_datas']; ?></legend>
                           <br><br>
						   <input type="hidden" class="material-control tooltips-general" required="" maxlength="20" data-toggle="tooltip" data-placement="top" name="id" value="<?php echo $fila["id"]; ?>">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_lastname_placeholder']; ?>" required="" maxlength="30" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_lastname_long']; ?>" name="nombre_estudiante" value="<?php echo $fila["last_name"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_lastname']; ?></label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_firstname_placeholder']; ?>" required="" maxlength="30" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_firstname_long']; ?>" name="apellido_estudiante" value="<?php echo $fila["first_name"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_firstname']; ?></label>
                            </div>
							<div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_organization_placeholder']; ?>" required="" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_organization_long']; ?>" name="direccion_estudiante" value="<?php echo $fila["organization"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_organization']; ?></label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_phone_placeholder']; ?>" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_phone_long']; ?>" name="telefono_estudiante" value="<?php echo $fila["phone"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_phone']; ?></label>
                            </div>
							<div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_email_placeholder']; ?>" required="" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_email_long']; ?>" name="email_estudiante" value="<?php echo $fila["email"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_email']; ?></label>
                            </div>
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; <?php echo $language['reset']; ?></button>
                                <button type="submit" name="btn10" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; <?php echo $language['submit']; ?></button>
                            </p> 
                       </div>
                    </div>
                </form>
            </div>
        </div>
        <?php include('../templates/help.tpl'); ?>
		<?php include('../templates/footer.tpl'); ?>
    </div>
</body>
</html>