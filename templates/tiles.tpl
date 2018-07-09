<section class="full-reset text-center" style="padding: 40px 0;">
<article class="tile"><a href="../books/list_books.php">
    <div class="tile-icon full-reset"><i class="zmdi zmdi-local-library"></i></div>
    <div class="tile-name all-tittles"><?php echo $language['books']; ?></div>
    <div class="tile-num full-reset">
	<?php
	include_once ("../db/conexion.php");
                    $mostrar = 
                    "
                        SELECT count(id_books) as cnt_books FROM books;
                    ";
                    $res = $conexion->query($mostrar);
					$result=$res->fetch_array(MYSQLI_ASSOC);
					echo $result["cnt_books"];
	?>
	</div></a>
</article>
<article class="tile"><a href="../categories/list_categories.php">
    <div class="tile-icon full-reset"><i class="zmdi zmdi-folder-special"></i></div>
    <div class="tile-name all-tittles"><?php echo $language['categories']; ?></div>
    <div class="tile-num full-reset">
	<?php
	include_once ("../db/conexion.php");
                    $mostrar = 
                    "
                        SELECT count(id_categories) as cnt_cat FROM categories;
                    ";
                    $res = $conexion->query($mostrar);
					$result=$res->fetch_array(MYSQLI_ASSOC);
					echo $result["cnt_cat"];
	?>
	</div></a>
</article>
<article class="tile"><a href="../mediums/list_mediums.php">
    <div class="tile-icon full-reset"><i class="zmdi zmdi-book-photo"></i></div>
    <div class="tile-name all-tittles"><?php echo $language['media']; ?></div>
    <div class="tile-num full-reset">
	<?php
	include_once ("../db/conexion.php");
                    $mostrar = 
                    "
                        SELECT count(id_mediums) as cnt_med FROM mediums;
                    ";
                    $res = $conexion->query($mostrar);
					$result=$res->fetch_array(MYSQLI_ASSOC);
					echo $result["cnt_med"];
	?>
	</div></a>
</article>
<?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1) {
echo '<br><article class="tile"><a href="../users/list_users.php">
    <div class="tile-icon full-reset"><i class="zmdi zmdi-accounts"></i></div>
    <div class="tile-name all-tittles">'.$language['users'].'</div>
    <div class="tile-num full-reset">';
	include_once ("../db/conexion.php");
                    $mostrar = 
                    "
                        SELECT count(id) as cnt_users FROM users WHERE user_type!=1;
                    ";
                    $res = $conexion->query($mostrar);
					$result=$res->fetch_array(MYSQLI_ASSOC);
					echo $result["cnt_users"];
	echo '</div></a>
</article>';} ?>
<?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1) {
echo '<article class="tile"><a href="../loans/pending_returns.php">
    <div class="tile-icon full-reset"><i class="zmdi zmdi-time-restore"></i></div>
    <div class="tile-name all-tittles" style="width: 90%;">'.$language['loan_pending_returns'].'</div>
    <div class="tile-num full-reset">';
	include_once ("../db/conexion.php");
                    $mostrar = 
                    "
                        SELECT count(id_loans) as cnt_pending FROM loans where state_loans='".$language['loan_state_pending']."';
                    ";
                    $res = $conexion->query($mostrar);
					$result=$res->fetch_array(MYSQLI_ASSOC);
					echo $result["cnt_pending"];
	echo '</div></a>
</article>
<article class="tile"><a href="../loans/expired_loans.php">
    <div class="tile-icon full-reset"><i class="zmdi zmdi-timer"></i></div>
    <div class="tile-name all-tittles" style="width: 90%;">'.$language['loan_expired'].'</div>
    <div class="tile-num full-reset">';
	include_once ("../db/conexion.php");
                    $mostrar = 
                    "
                        SELECT count(id_loans) as cnt_expired FROM loans where date_expired_loans < NOW() and state_loans='".$language['loan_state_pending']."';
                    ";
                    $res = $conexion->query($mostrar);
					$result=$res->fetch_array(MYSQLI_ASSOC);
					echo $result["cnt_expired"];
	echo '</div></a>
</article>
<article class="tile"><a href="../loans/list_loans.php">
    <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar"></i></div>
    <div class="tile-name all-tittles" style="width: 90%;">'.$language['loan_list'].'</div>
    <div class="tile-num full-reset">';
	include_once ("../db/conexion.php");
                    $mostrar = 
                    "
                        SELECT count(id_loans) as cnt_loans FROM loans;
                    ";
                    $res = $conexion->query($mostrar);
					$result=$res->fetch_array(MYSQLI_ASSOC);
					echo $result["cnt_loans"];
	echo '</div></a>
</article>';}
elseif(isset($_SESSION['usertype']) AND $_SESSION['usertype']==0) {
	echo '<br><article class="tile"><a href="../loans/user_pending_returns.php">
    <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar"></i></div>
    <div class="tile-name all-tittles" style="width: 90%;">'.$language['loan_pending_returns'].'</div>
    <div class="tile-num full-reset">';
	include_once ("../db/conexion.php");
                    $mostrar = 
                    "
                        SELECT count(id_loans) AS cnt_loans FROM loans WHERE code_user_loans='".$_SESSION['id']."' AND state_loans='".$language['loan_state_pending']."';
                    ";
                    $res = $conexion->query($mostrar);
					$result=$res->fetch_array(MYSQLI_ASSOC);
					echo $result["cnt_loans"];
	echo '</div></a>
</article>';}?>
<?php if(!isset($_SESSION['loggedin']) OR $_SESSION['loggedin']===FALSE) 
echo '<br><article class="tile"><a href="">
<div class="tile-icon full-reset"><i class="zmdi zmdi-map"></i></div>
<div class="tile-name all-tittles" style="width: 90%;">'.$language['map'].'</div>
<div class="tile-num full-reset"><h4><br><br><br><br></h4>
</div></a>
</article>';
?>
<?php if(!isset($_SESSION['loggedin']) OR $_SESSION['loggedin']===FALSE) 
echo '<article class="tile"><a href="../db/index.html">
<div class="tile-icon full-reset"><i class="zmdi zmdi-account-circle"></i></div>
<div class="tile-name all-tittles" style="width: 90%;">'.$language['connection'].'</div>
<div class="tile-num full-reset"><h4><br>'.$language['connection_info'].'</h4>
</div></a>
</article>';
?>

</section>