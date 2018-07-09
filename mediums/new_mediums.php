<?php include('../templates/page_init_admin.tpl'); ?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['medium_add']; ?></title>
    <?php include('../templates/head.tpl'); ?>
</head>
<body>
    <?php include('../templates/navbar_lateral.tpl'); ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php include('../templates/navbar_user.tpl'); ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['medium_add']; ?></small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <?php if(isset($_SESSION['usertype']) AND ($_SESSION['usertype']==1))
              echo '<li role="presentation" class="active"><a href="new_mediums.php">'.$language['medium_add'].'</a></li>';
			?>
              <li role="presentation"><a href="list_mediums.php"><?php echo $language['medium_list']; ?></a></li>
            </ul>
        </div>
        
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><i class="zmdi zmdi-plus-box zmdi-hc-fw"></i> <?php echo $language['medium_add']; ?></div>
                <form autocomplete="off" method="POST" action="register_mediums.php">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
					   <legend><?php echo $language['medium_datas']; ?></legend>
					   <br><br>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['medium_example']; ?>"  required="" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['medium_long']; ?>" name="nombre_medium">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['medium_long']; ?></label>
                            </div>
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; <?php echo $language['reset']; ?></button>
                                <button type="submit" name="btn4" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; <?php echo $language['submit']; ?></button>
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