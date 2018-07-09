<?php include('../templates/page_init.tpl');
$med = $_GET['med']; 
include ("../db/conexion.php");
$mostrar = 
"
SELECT * FROM mediums WHERE id_mediums='$med';
";
$res = $conexion->query($mostrar);
$medname = $res->fetch_assoc();
$medname = $medname['name_mediums'];
?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <?php echo '<title>'.$language['book_list'].' "'.$medname.'" </title>' ?>
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
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['book_list']." ".$medname; ?></small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
			<?php if(isset($_SESSION['usertype']) AND ($_SESSION['usertype']==1))
				echo '<li role="presentation"><a href="new_books.php">Nouveau livre</a></li>'; ?>
              <li role="presentation" class="active"><a href="list_books.php">Liste des livres</a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <h2 class="text-center all-tittles"><i class="zmdi zmdi-collection-item zmdi-hc-fw"></i> <?php echo $language['book_list']; ?> <?php echo '"'.$medname.'"' ?></h2>
        </div>
        <div class="container-fluid">
            <?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1)
			echo '<div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li>~ <a href="csv_report_books_by_medium.php?med='.$med.'">'.$language['csv_generate'].'</a></li>
                    </ol>
                </div>
            </div>';?>
        </div>
        <div class="container-fluid">
            <?php
                    $mostrar = 
                    "
                        SELECT * FROM books,categories,mediums WHERE id_categories=id_category_books AND id_mediums=id_medium_books AND id_medium_books='$med';
                    ";

                    $res = $conexion->query($mostrar);
                ?>
			<div align="right"><a href="#openModalSearch"><?php echo $language['book_keywords_list']; ?></a><div id="openModalSearch" class="modalDialog"><div class="modal-dialog modal-lg"><div class="modal-header"><a href="#close" title="Fermer" class="close">X</a><h4 class="modal-title text-center all-tittles"><?php echo $language['book_keywords_list']; ?></h4></div><div class="modal-body"><center><?php include('../templates/keywords.tpl'); ?></center></div></div></div></div>
            <table class="display" id="mitabla">
            <thead>
                <tr>
                    <th><?php echo $language['book_title']; ?></th>
					<th><?php echo $language['book_summary']; ?></th>
					<th><?php echo $language['book_link']; ?></th>
                    <th><?php echo $language['book_category']; ?></th>
					<th><?php echo $language['book_medium']; ?></th>
                    <th><?php echo $language['book_author']; ?></th>
                    <th><?php echo $language['book_editor']; ?></th>
                    <th><?php echo $language['book_ISBN']; ?></th>
					<th><?php echo $language['book_inventory_number']; ?></th>
					<th style="display:none;"></th>
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
                    <td><?php echo $fila["title_books"];?></td>
					<td align="center"><?php if(isset($fila["summary_books"]) AND !empty($fila["summary_books"])) {?><a href="#openModal<?php echo $fila["id_books"];?>"><font size="5"><i class="zmdi zmdi-file-text"></i></font></a><div id="openModal<?php echo $fila["id_books"];?>" class="modalDialog"><div class="modal-dialog modal-lg"><div class="modal-header"><a href="#close" title="Fermer" class="close">X</a><h4 class="modal-title text-center all-tittles"><?php echo $fila["title_books"];?></h4></div><div class="modal-body"><?php echo nl2br($fila["summary_books"]); }?></div></div></div></td>
					<td align="center"><?php if (!empty($fila["internet_link_books"])) echo '<a href="'.$fila["internet_link_books"].'" target="_blank">www</a>'; ?></td>
                    <td><?php echo $fila["name_categories"];?></td>
					<td><?php echo $fila["name_mediums"];?></td>
                    <td><?php echo $fila["author_books"];?></td>
                    <td><?php echo $fila["editor_books"];?></td>
                    <td><?php echo $fila["isbn_books"];?></td>
					<td align="center"><?php echo $fila["inventory_number_books"];?></td>
					<td style="display:none;"><?php echo $fila["tags_books"];?></td>
					<?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1)
                    echo '<td><a href="edit_books.php?id='.$fila["id_books"].'"><img src="../assets/img/editar.png" width=30 height=30></a></td>
                    <td><a href="delete_books.php?id='.$fila["id_books"].'"><img src="../assets/img/eliminar.png" width=30 height=30></a></td>'; ?>
                </tr>
					<?php } ?>
            </tbody>
        </table>
        </div>
        <?php include('../templates/help.tpl'); ?>
        <?php include('../templates/footer.tpl'); ?>
    </div>
</body>
</html>