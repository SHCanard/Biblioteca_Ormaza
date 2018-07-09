<?php include('../templates/page_init_admin.tpl'); ?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['user_add']; ?></title>
    <?php include('../templates/head.tpl'); ?>
</head>
<body>
    <?php include('../templates/navbar_lateral.tpl'); ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php include('../templates/navbar_user.tpl'); ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['user_add']; ?></small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
                <li role="presentation" class="active"><a href="new_users.php"><?php echo $language['user_add']; ?></a></li>
                <li role="presentation"><a href="list_users.php"><?php echo $language['user_list']; ?></a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> <?php echo $language['user_add']; ?></div>
                <form autocomplete="off" method="POST" action="register_users.php">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <legend><?php echo $language['user_datas']; ?></legend>
                           <br><br>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_lastname_placeholder']; ?>" required="" maxlength="30" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_lastname_long']; ?>" name="nombre_estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_lastname']; ?></label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_firstname_placeholder']; ?>" required="" maxlength="30" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_firstname_long']; ?>" name="apellido_estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_firstname']; ?></label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_organization_placeholder']; ?>" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_organization_long']; ?>" name="direccion_estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_organization']; ?></label>
                            </div>
							<div class="group-material">
                                <input type="number" class="material-control tooltips-general" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_phone_long']; ?>" name="telefono_estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_phone']; ?></label>
                            </div>
							<div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['user_email_placeholder']; ?>" required="" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['user_email_long']; ?>" name="email_estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['user_email']; ?></label>
                            </div>
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; <?php echo $language['reset']; ?></button>
                                <button type="submit" name="btn9" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; <?php echo $language['submit']; ?></button>
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