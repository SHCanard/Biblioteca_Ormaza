<nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="../assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles"><?php echo $language['welcome']; ?> <?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?></span>
                </li>
				<?php if(isset($_SESSION['loggedin']) AND $_SESSION['loggedin']==true)
					echo '<li  class="tooltips-general exit-system-button" data-href="../db/disconnect.php" data-placement="bottom" title="'.$language['disconnect'].'">';
				else 
					echo '<li><a href="../db/index.php">'; ?>
                    <i class="zmdi zmdi-power"></i><?php echo '</a>'; ?>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="<?php echo $language['help']; ?>">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                </li>
            </ul>
        </nav>