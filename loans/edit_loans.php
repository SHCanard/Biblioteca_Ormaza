<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    
    include ("../db/conexion.php");

    $id = $_GET['id'];

    $cargar = 
    "
        SELECT id_loans, id_books, title_books, id, first_name, last_name, date_loans, date_expired_loans, date_return_loans, state_loans FROM loans,users,books WHERE id=code_user_loans AND id_books=id_book_loans AND id_loans='$id';
    ";

    $res = $conexion->query($cargar);

    $fila = $res->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['loan_edit']; ?></title>
    <?php include('../templates/head.tpl'); ?>
</head>
<body>
    <?php include('../templates/navbar_lateral.tpl'); ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php include('../templates/navbar_user.tpl'); ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['loan_edit']; ?></small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
                <li role="presentation"><a href="new_loans.php"><?php echo $language['loan_add']; ?></a></li>
                <li role="presentation"><a href="pending_returns.php"><?php echo $language['loan_pending_returns']; ?></a></li>
                <li role="presentation"><a href="expired_loans.php"><?php echo $language['loan_expired']; ?></a></li>
                <li role="presentation" class="active"><a href="list_loans.php"><?php echo $language['loan_list']; ?></a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><i class="zmdi zmdi-alarm-add zmdi-hc-fw"></i> <?php echo $language['loan_edit']; ?></div>
                <form autocomplete="off" method="POST" action="actualize_loans.php">
                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <legend><?php echo $language['loan_datas']; ?></legend>
                           <br><br>
                            <div><?php echo $language['book']; ?></div>
                            <div class="group-material">
                                <?php
                                include ("../db/conexion.php");

                                    if ($conexion->connect_error)
                                        {
                                            die($language['connection_error'].' : ' . $conexion->connect_error);
                                        }

                                    $sql="SELECT id_books,title_books,inventory_number_books FROM books ORDER BY title_books,inventory_number_books";
                                    $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
                                        if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                                        {
                                            $combobit="";
                                            while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
                                            {
												$combobit .=" <option ";
												if($row['id_books']==$fila["id_books"])
													$combobit .="selected='selected' ";
                                                $combobit .="value='".$row['id_books']."'>".$row['title_books']." | ".$row['inventory_number_books']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                                            }
                                        }
                                        else
                                        {
                                            echo $language['no_results'];
                                        }
                                            $conexion->close(); //cerramos la conexión
                                        ?>
                                        <select name="nombre_libro_prestamo" class="material-control tooltips-general" required="" maxlength="11" data-toggle="tooltip" data-placement="top" title="<?php echo $language['loan_book_select']; ?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                            <?php echo $combobit; ?>
                                        </select>
                            </div>
                            <div><?php echo $language['user']; ?></div>
                            <div class="group-material">
                                <?php
                                include ("../db/conexion.php");

                                    if ($conexion->connect_error)
                                        {
                                            die($language['connection_error'].' : ' . $conexion->connect_error);
                                        }

                                    $sql="SELECT * FROM users where user_type!=1";
                                    $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
                                        if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                                        {
                                            $combobit="";
                                            while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
                                            {
												$combobit .=" <option ";
												if($row['id']==$fila["id"])
													$combobit .="selected='selected' ";
                                                $combobit .="value='".$row['id']."'>".$row['last_name']." ".$row['first_name']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                                            }
                                        }
                                        else
                                        {
                                            echo $language['no_results'];
                                        }
                                            $conexion->close(); //cerramos la conexión
                                        ?>
                                        <select name="doc_ident_estud_prestamo" class="material-control tooltips-general" required="" maxlength="11" data-toggle="tooltip" data-placement="top" title="<?php echo $language['loan_user_select']; ?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                            <?php echo $combobit; ?>
                                        </select>
                            </div>
                            <div class="group-material">
                                <input type="date" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="<?php echo $language['loan_date']; ?>" name="fecha_prestamo" value="<?php echo $fila["date_loans"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['loan_date']; ?></label>
                            </div>
                            <div class="group-material">
                                <input type="date" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="<?php echo $language['loan_date_expired']; ?>" name="fecha_vencimiento" value="<?php echo $fila["date_expired_loans"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['loan_date_expired']; ?></label>
                            </div>
                            <div class="group-material">
                                <input type="date" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="<?php echo $language['loan_date_return']; ?>" name="fecha_devolucion" value="<?php echo $fila["date_return_loans"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['loan_date_return']; ?></label>
                            </div>
                            <div class="group-material">
                                <div><?php echo $language['loan_state_long']; ?></div>
                            <select name="estado_prestamo" class="material-control tooltips-general" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="<?php echo $language['loan_state']; ?>">
                                    <option value="<?php echo $fila["state_loans"]; ?>" selected=""><?php if ($fila["state_loans"]==0)
									echo $language['loan_state_pending'];
								else
									echo $language['loan_state_returned'];
								?></option>
                                    <option value="0"><?php echo $language['loan_state_pending']; ?></option>
                                    <option value="1"><?php echo $language['loan_state_returned']; ?></option>
                            </select>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            </div>
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; <?php echo $language['reset']; ?></button>
                                <button type="submit" class="btn btn-primary" name="btn14"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; <?php echo $language['submit']; ?></button>
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