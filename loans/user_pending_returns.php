<?php include('../templates/page_init.tpl'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Prêts en cours</title>
    <?php include('../templates/head.tpl'); ?>
	<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <script src="../js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#mitabla').DataTable({
            "language":{
                 "lengthMenu": "Afficher _MENU_ prêts par page",
                "info": "Page _PAGE_ de _PAGES_",
                "infoEmpty": "Aucun prêt disponible",
                "infoFiltered": "(filtre sur _MAX_ prêts)",
                "loadingRecords": "Chargement...",
                "processing": "Calcul...",
                "search": "Rechercher",
                "zeroRecords": "Aucun prêt correspondant",
                "paginate": {
                    "next": "Suivant",
                    "previous": "Précédent"
                },
            }
        });
    });

    </script>
</head>
<body>
    <?php include('../templates/navbar_lateral.tpl'); ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php include('../templates/navbar_user.tpl'); ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Système de bibliotèque <small>Prêts en cours</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation" class="active"><a href="user_pending_returns.php">Prêts en cours</a></li>
            </ul>
        </div>
        <div class="container-fluid">
			<h2 class="text-center all-tittles"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i> Prêts en cours</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li><a href="report_pending_returns.php">Générer en PDF</a></li>
                    </ol>
                </div>
            </div>
            <?php
    
                   include ("../db/conexion.php");

                    $mostrar = 
                    "
                        SELECT id_loans, title_books, author_books, editor_books, isbn_books, date_loans, date_expired_loans, state_loans FROM loans,books WHERE code_user_loans='".$_SESSION['id']."' AND id_book_loans=id_books AND state_loans ='En cours';
                    ";
    
                    $res = $conexion->query($mostrar);

                ?>
            <table class="display" id="mitabla">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Livre</th>
					<th>Auteur</th>
					<th>Editeur</th>
					<th>ISBN</th>
                    <th>Date du prêt</th>
                    <th>Date de fin de prêt</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($fila = $res->fetch_assoc())
                    {
                ?>
                <tr>
                    <td><?php echo $fila["id_loans"];?></td>
                    <td><?php echo $fila["title_books"];?></td>
					<td><?php echo $fila["author_books"];?></td>
					<td><?php echo $fila["editor_books"];?></td>
					<td><?php echo $fila["isbn_books"];?></td>
                    <td><?php echo $fila["date_loans"];?></td>
                    <td><?php if ($fila["date_expired_loans"]<date('Y-m-d')) echo "<b>" ?><?php echo $fila["date_expired_loans"];?><?php if ($fila["date_expired_loans"]<date('Y-m-d')) echo "</b>" ?></td>
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