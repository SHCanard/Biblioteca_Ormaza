<?php include('../templates/page_init_admin.tpl'); ?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['user_list']; ?></title>
<?php include('../templates/head.tpl'); ?>
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
	<script src="../js/jquery.dataTables.min.js"></script>
    <?php include('../js/dataTable.php'); ?>
</head>
<body>
    <?php include('../templates/navbar_lateral.tpl'); ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php include('../templates/navbar_user.tpl'); ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['user_list']; ?></small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
              <li role="presentation"><a href="new_users.php"><?php echo $language['user_add']; ?></a></li>
              <li role="presentation" class="active"><a href="list_users.php"><?php echo $language['user_list']; ?></a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <h2 class="text-center all-tittles"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i> <?php echo $language['user_list']; ?></h2>
        </div>
        <div class="container-fluid">
		<div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li><!--<a href="report_users.php">Générer en PDF</a>--> <?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1) echo'~ <a href="csv_report_users.php">'.$language['csv_generate'].'</a>'; ?></li>
                    </ol>
                </div>
            </div>
             <?php
    
                    include ("../db/conexion.php");

                    $mostrar = 
                    "
                        SELECT * FROM users WHERE user_type!=1;
                    ";
    
                    $res = $conexion->query($mostrar);

                ?>
            <table class="display" id="mitabla">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo $language['user_lastname']; ?></th>
                    <th><?php echo $language['user_firstname']; ?></th>
                    <th><?php echo $language['user_organization']; ?></th>
                    <th><?php echo $language['user_email']; ?></th>
					<th><?php echo $language['user_phone']; ?></th>
					<th><?php echo $language['user_send_id']; ?></th>
                    <th><?php echo $language['edit']; ?></th>
                    <th><?php echo $language['delete']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($fila = $res->fetch_assoc())
                    {
                ?>
                <tr>
                    <td><?php echo $fila["id"];?></td>
                    <td><?php echo $fila["last_name"];?></td>
                    <td><?php echo $fila["first_name"];?></td>
                    <td><?php echo $fila["organization"];?></td>
                    <td><a href="mailto:<?php echo $fila["email"];?>"><?php echo $fila["email"];?></a></td>
					<td><?php echo $fila["phone"];?></td>
					<td><a href="send_cred_users.php?id=<?php echo $fila["id"];?>"><img src='../assets/img/mail_id.png' width=30 height=30></a></td>
                    <td><a href="edit_users.php?id=<?php echo $fila["id"];?>"><img src='../assets/img/editar.png' width=30 height=30></a></td>
                    <td><a href="remove_users.php?id=<?php echo $fila["id"];?>"><img src='../assets/img/eliminar.png' width=30 height=30></a></td>
                    <?php }?>
                </tr>
            </tbody>
        </table>
        </div>
        <?php include('../templates/help.tpl'); ?>
		<?php include('../templates/footer.tpl'); ?>
    </div>
</body>
</html>