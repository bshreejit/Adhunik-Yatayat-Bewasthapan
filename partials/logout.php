<?php 
	session_start();
	if (isset($_SESSION['user-login']) || isset($_SESSION['admin-login']) || isset($_SESSION['mainadmin-login'])) {
		session_unset();
	}
	header("location:../index.php");
 ?>