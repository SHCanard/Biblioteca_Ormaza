<?php include('../templates/page_init_admin.tpl'); ?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['loan_expired']; ?></title>
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
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['loan_expired']; ?></small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation"><a href="new_loans.php"><?php echo $language['loan_add']; ?></a></li>
                <li role="presentation"><a href="pending_returns.php"><?php echo $language['loan_pending_returns']; ?></a></li>
                <li role="presentation" class="active"><a href="expired_loans.php"><?php echo $language['loan_expired']; ?></a></li>
                <li role="presentation"><a href="list_loans.php"><?php echo $language['loan_list']; ?></a></li>
            </ul>
        </div>
        <div class="container-fluid">
			<h2 class="text-center all-tittles"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> <?php echo $language['loan_expired']; ?></h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li><!--<a href="report_expired_loans.php">Générer en PDF</a>--> <?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1) echo'~ <a href="csv_report_expired_loans.php">'.$language['csv_generate'].'</a>'; ?></li>
                    </ol>
                </div>
            </div>
            <?php
    
                   include ("../db/conexion.php");

                    $mostrar = 
                    "
						SELECT id_loans, title_books, inventory_number_books, first_name, last_name, date_loans, date_expired_loans, state_loans, phone, email FROM loans,users,books WHERE id=code_user_loans AND id_book_loans=id_books AND date_expired_loans < NOW() AND state_loans='En cours';
                    ";
    
                    $res = $conexion->query($mostrar);

                ?>
            <table class="display" id="mitabla">
            <thead>
                <tr>
                    <th><?php echo $language['book']; ?></th>
					<th><?php echo $language['book_inventory_number']; ?></th>
                    <th><?php echo $language['user']; ?></th>
                    <th><?php echo $language['loan_date']; ?></th>
                    <th><?php echo $language['loan_date_expired']; ?></th>
                    <th><?php echo $language['loan_state']; ?></th>
                    <th><?php echo $language['loan_return']; ?></th>
					<th><?php echo $language['loan_contact']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($fila = $res->fetch_assoc())
                    {
                ?>
                <tr>
                    <td><?php echo $fila["title_books"];?></td>
					<td><?php echo $fila["inventory_number_books"];?></td>
                    <td><?php echo $fila["first_name"]." ".$fila["last_name"];?></td>
                    <td><?php echo $fila["date_loans"];?></td>
                    <td><?php echo $fila["date_expired_loans"];?></td>
                    <td><?php if ($fila["state_loans"]==0)
									echo $language['loan_state_pending'];
								else
									echo $language['loan_state_returned'];
								?></td>
                    <td><a href="return_loans.php?id=<?php echo $fila["id_loans"];?>"><img src='../assets/img/entrega.png' width=30 height=30></a></td>
					<td><a href="mailto:<?php echo $fila["email"];?>?subject=<?php echo $language['loan_mail_subject']; ?> '<?php echo $fila["title_books"];?>'"><img src='../assets/img/mail.png' width=30 height=30></a>&nbsp;&nbsp;&nbsp;<?php echo $fila["phone"]; ?></td>
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