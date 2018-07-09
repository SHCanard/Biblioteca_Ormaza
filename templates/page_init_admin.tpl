<?php
    session_start();

    if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 1) {

    } else {
    header ("Location: ../db/control.php");

    exit;
    }

    $now = time();

    if($now > $_SESSION['expire']) {
    session_destroy();

    header ("Location: ../db/index.php");
    exit;
    } else {
		$_SESSION['expire']=$now+1200;
	}
include("../languages/config.php");
?>
