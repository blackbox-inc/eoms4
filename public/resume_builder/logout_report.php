<?php
	session_start();
	session_destroy();

	$sitepath = "/v2/login.php";

	echo '
	    <script>window.open("'.$sitepath.'","_self");</script>
	';
?>

