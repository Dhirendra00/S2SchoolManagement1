<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>view_notification</title>
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css"> 
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>

	<section>

			
		
		<main>
				<?php require 'admin_sidebar.php';
	       ?>
	       

			<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8" style="height: 100%; position: fixed;"></div>
	 <div class="notification" >
	 	<div class="note">
  <h4 style="margin-left: 3%;">NOTIFICATION:</h4>
  </div>
  <?php 
// add_table is called in backend_product.
 require 'notification_tableGenerator.php';
  // electronics database is connected with pdo.
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');
  // table generator is declared.
 $tg = new TableGenerator();
  // table column name is added in the table.
 $tg->setHeadings(['id','Message','fName','lName','Date']);
  // statement of table column is selected from product table.
 $stmt = $pdo->prepare("SELECT id,message, fname, lname,u_date FROM notification");
  // statement is executed.
 $stmt->execute();
  // for each condition is used for decalring statement as row.
 foreach ($stmt as $row) {
   $tg->addRow($row);
  
 }
 echo $tg->getHTML();
?>
</div>
		</div>	 
		
		</main>
	</section>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/custom.js"></script>	
</body>
</html>
<style>
.notification{
 background-color: grey;
  margin-top: 3%;
  margin-left: 33%;
  width: 50%;
  height: 40%;
  position: fixed;
  padding: 2px;
  background: white;
  overflow-x: auto;
  overflow-y: auto;
}
.note {
 color: black;
 background: #e7e7e7;
}

</style>	



