<?php
$pdo = new PDO('mysql:dbname=Group_Project;host=localhost','root','');
$_GET['id'];
$stmt = $pdo->prepare("UPDATE tbl_user SET archive =:archive WHERE id =:id");
$criteria = [
		'id'=>$_GET['id'],
		 'archive'=>'yes'
	];
		// statement execute the above criteria
	($stmt->execute($criteria)); 
	header('Location:view_user.php')
?>