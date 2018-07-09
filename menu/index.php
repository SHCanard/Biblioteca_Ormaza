<?php include('../templates/page_init.tpl'); ?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['home']; ?></title>
    <?php include('../templates/head.tpl'); ?>
</head>
<body>
    <?php include('../templates/navbar_lateral.tpl'); ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php include('../templates/navbar_user.tpl'); ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><?php echo $language['home']; ?></h1>
            </div>
        </div>
        <?php include('../templates/tiles.tpl'); ?>
        <?php include('../templates/help.tpl'); ?>
        <?php include('../templates/footer.tpl'); ?>
    </div>
</body>
</html>