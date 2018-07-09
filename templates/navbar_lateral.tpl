<div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                <?php echo $language['system_title']; ?>
            </div>
            <div class="full-reset" style="background-color:#2B3D51; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="../assets/img/logo-cht-mini.png" alt="<?php echo $language['system_title']; ?>" class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;"><?php echo $language['contact']; ?>
					</p>
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li>
					<?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1)
					echo '<a href="../menu/administrator_menu.php">';
					else
					echo '<a href="../menu/index.php">';
					?>
					<i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; <?php echo $language['home']; ?></a></li>
					<li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-local-library zmdi-hc-fw"></i>&nbsp;&nbsp; <?php echo $language['books']; ?><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
						<?php if(isset($_SESSION['usertype']) AND ($_SESSION['usertype']==1))
                            echo '<li><a href="../books/new_books.php"><i class="zmdi zmdi-plus-box zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['book_add'].'</a></li>';
						?>
                            <li><a href="../books/list_books.php"><i class="zmdi zmdi-collection-item zmdi-hc-fw"></i>&nbsp;&nbsp; <?php echo $language['book_list']; ?></a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-folder-special zmdi-hc-fw"></i>&nbsp;&nbsp; <?php echo $language['categories']; ?> <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
						<?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1)
                            echo '<li><a href="../categories/new_categories.php"><i class="zmdi zmdi-plus-box zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['category_add'].'</a></li>';
						?>
                            <li><a href="../categories/list_categories.php"><i class="zmdi zmdi-collection-item zmdi-hc-fw"></i>&nbsp;&nbsp; <?php echo $language['category_list']; ?></a></li>
                        </ul>
                    </li>
					<li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-book-photo zmdi-hc-fw"></i>&nbsp;&nbsp; <?php echo $language['media']; ?> <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
						<?php if(isset($_SESSION['usertype']) AND $_SESSION['usertype']==1)
                            echo '<li><a href="../mediums/new_mediums.php"><i class="zmdi zmdi-plus-box zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['medium_add'].'</a></li>';
						?>
                            <li><a href="../mediums/list_mediums.php"><i class="zmdi zmdi-collection-item zmdi-hc-fw"></i>&nbsp;&nbsp; <?php echo $language['medium_list']; ?></a></li>
                        </ul>
                    </li>
					<?php if(isset($_SESSION['usertype']) AND ($_SESSION['usertype']==1))
                            echo '
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['users'].' <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="../users/new_users.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['user_add'].'</a></li>
                            <li><a href="../users/list_users.php"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['user_list'].'</a></li>
                        </ul>
                    </li>'; ?>
					<?php if(isset($_SESSION['usertype']) AND ($_SESSION['usertype']==1))
						echo '
					<li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['loans'].' <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="../loans/new_loans.php"><i class="zmdi zmdi-alarm-add zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['loan_add'].'</a></li>
                            <li>
                                <a href="../loans/pending_returns.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['loan_pending_returns'].' </a>
                            </li>
                            <li>
                                <a href="../loans/expired_loans.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['loan_expired'].' </a>
                            </li>
                             <li>
                                <a href="../loans/list_loans.php"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['loan_list'].' </a>
                            </li>
                        </ul>
                    </li>'; 
					elseif(isset($_SESSION['usertype']) AND $_SESSION['usertype']==0)
					echo '
					<li>
					<div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['loans'].' <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li>
                                <a href="../loans/user_pending_returns.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; '.$language['loan_pending_returns'].' </a>
                            </li>
                        </ul>
					</li>';
					?>
                </ul>
            </div>
        </div>
    </div>