<?php
	session_start();
	if(isset($_SESSION['sess_login']))
	{
		unset($_SESSION['sess_login']);
	}
	header("location:index.php");
?>