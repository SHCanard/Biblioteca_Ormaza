<?php include('../templates/page_init_admin.tpl'); ?>
<?php
    include ("../db/conexion.php");
    $id = $_GET['id'];
    $cargar = 
    "
        SELECT * FROM books, categories, mediums WHERE id_categories=id_category_books AND id_mediums=id_medium_books AND id_books='$id';
    ";
    $res = $conexion->query($cargar);
    $fila = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="<?php echo $language['lang']; ?>">
<head>
    <title><?php echo $language['book_edit']; ?></title>
    <?php include('../templates/head.tpl'); ?>
</head>
<body>
    <?php include('../templates/navbar_lateral.tpl'); ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php include('../templates/navbar_user.tpl'); ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><?php echo $language['system_title']; ?> <small><?php echo $language['book_edit']; ?></small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
                <li role="presentation"><a href="new_books.php"><?php echo $language['book_add']; ?></a></li>
                <li role="presentation" class="active"><a href="list_books.php"><?php echo $language['book_list']; ?></a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><i class="zmdi zmdi-plus-box zmdi-hc-fw"></i> <?php echo $language['book_edit']; ?></div>
                <form autocomplete="off" method="POST" action="actualize_books.php">
                    <input type="hidden" name="id_books" value=<?php echo $id; ?>>
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <legend><?php echo $language['book_datas']; ?></legend>
                           <br><br>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['book_title_long']; ?>" required="" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_title_long']; ?>" name="title_books" value="<?php echo $fila["title_books"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['book_title']; ?></label>
                            </div>
							<div class="group-material">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['book_summary']; ?></label>
								<br><br><textarea rows="4" cols="100" class="material-control tooltips-general" placeholder="<?php echo $language['book_summary_placeholder']; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $language["book_summary_long"]; ?>" name="summary_books"><?php echo $fila["summary_books"]; ?></textarea>
                            </div>
							<div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['book_link_placeholder']; ?>" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_link_long']; ?>" name="link_books" value="<?php echo $fila["internet_link_books"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['book_link']; ?></label>
                            </div>
							<div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['book_keywords_placeholder']; ?>" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_keywords_long']; ?>" name="tags_books" value="<?php echo $fila["tags_books"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['book_keywords']; ?></label>
                            </div>
                            <div><?php echo $language['book_category']; ?></div>
                            <div class="group-material">
                                <?php
                                include ("../db/conexion.php");

                                    if ($conexion->connect_error)
                                        {
                                            die($language['connection_error'].' : ' . $conexion->connect_error);
                                        }

                                    $sql="SELECT * FROM categories";
                                    $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
                                        if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                                        {
                                            $combobit="";
                                            while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
                                            {
                                                $combobit .=" <option ";
												if($row['id_categories']==$fila["id_category_books"])
													$combobit .="selected='selected' ";
												$combobit .="value='".$row['id_categories']."'>".$row['name_categories']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                                            }
                                        }
                                        else
                                        {
                                            echo $language['no_results'];
                                        }
                                            $conexion->close(); //cerramos la conexión
                                        ?>
                                        <select name="id_category_books" class="material-control tooltips-general" required="" maxlength="11" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_category_select']; ?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                            <?php echo $combobit; ?>
                                        </select>
                            </div>
							<div><?php echo $language['book_medium']; ?></div>
                            <div class="group-material">
                                <?php
                                include ("../db/conexion.php");

                                    if ($conexion->connect_error)
                                        {
                                            die($language['connection_error'].': ' . $conexion->connect_error);
                                        }

                                    $sql="SELECT * FROM mediums";
                                    $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
                                        if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                                        {
                                            $combobit="";
                                            while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
                                            {
                                                $combobit .=" <option ";
												if($row['id_mediums']==$fila["id_mediums"])
													$combobit .="selected='selected' ";
												$combobit .="value='".$row['id_mediums']."'>".$row['name_mediums']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                                            }
                                        }
                                        else
                                        {
                                            echo $language['no_results'];
                                        }
                                            $conexion->close(); //cerramos la conexión
                                        ?>
                                        <select name="id_medium_books" class="material-control tooltips-general" required="" maxlength="11" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_medium_select']; ?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                            <?php echo $combobit; ?>
                                        </select>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['book_author_placeholder']; ?>" required="" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_author_long']; ?>" name="author_books" value="<?php echo $fila["author_books"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['book_author']; ?></label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['book_editor_placeholder']; ?>" required="" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_editor_long']; ?>" name="editor_books" value="<?php echo $fila["editor_books"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['book_editor']; ?></label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="<?php echo $language['book_ISBN_placeholder']; ?>" required="" maxlength="30" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_ISBN_long']; ?>" name="isbn_books" value="<?php echo $fila["isbn_books"]; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['book_ISBN']; ?></label>
                            </div>
							<div class="group-material">
                                <input type="number" class="material-control tooltips-general" placeholder="<?php echo $language['book_inventory_number_placeholder']; ?>" required="" data-toggle="tooltip" data-placement="top" title="<?php echo $language['book_inventory_number_long']; ?>" name="inventory_books" value="<?php echo $fila["inventory_number_books"]; ?>" min="1">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><?php echo $language['book_inventory_number']; ?></label>
                            </div>
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; <?php echo $language['reset']; ?></button>
                                <button type="submit" class="btn btn-primary" name="btn12"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; <?php echo $language['submit']; ?></button>
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