<?php include('../templates/page_init.tpl'); ?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['medium_list']; ?></title>
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
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['medium_list']; ?></small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
			<?php if(isset($_SESSION['usertype']) AND ($_SESSION['usertype']==1))
              echo '<li role="presentation"><a href="new_mediums.php">'.$language['medium_add'].'</a></li>';
			?>
              <li role="presentation" class="active"><a href="list_mediums.php"><?php echo $language['medium_list']; ?></a></li>
            </ul>
        </div>
        
        <div class="container-fluid">
			<h2 class="text-center all-tittles"><i class="zmdi zmdi-collection-item zmdi-hc-fw"></i> <?php echo $language['medium_list']; ?></h2>
        </div>
        <div class="container-fluid">
            <!--<div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li><a href="report_mediums.php">Générer en PDF</a></li>
                    </ol>
                </div>
            </div>-->
                <?php
    
                    include ("../db/conexion.php");

                    $mostrar = 
                    "
                        SELECT * FROM mediums;
                    ";
    
                    $res = $conexion->query($mostrar);

                ?>
                     <table class="display" id="mitabla">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo $language['book_medium']; ?></th>
					<th><?php echo $language['medium_booklist']; ?></th>
                    <?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1)
						echo '<th>'.$language['edit'].'</th>
                    <th>'.$language['delete'].'</th>'; ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($fila = $res->fetch_assoc())
                    {
                ?>
                <tr>
                    <td><?php echo $fila["id_mediums"];?></td>
                    <td><?php echo $fila["name_mediums"];?></td>
					<td><?php echo '<a href="../books/list_books_by_medium.php?med='.$fila["id_mediums"].'"><img src="../assets/img/libro.png" width=30 height=30></a>';?></td>
                    <?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1)
                    echo '<td><a href="edit_mediums.php?id='.$fila["id_mediums"].'"><img src="../assets/img/editar.png" width=30 height=30></a></td>
                    <td><a href="remove_mediums.php?id='.$fila["id_mediums"].'"><img src="../assets/img/eliminar.png" width=30 height=30></a></td>'; ?>
                </tr>
					<?php } ?>
                </tr>
            </tbody>
        </table>
        </div>
        <?php include('../templates/help.tpl'); ?>
        <?php include('../templates/footer.tpl'); ?>
    </div>
</body>
</html>