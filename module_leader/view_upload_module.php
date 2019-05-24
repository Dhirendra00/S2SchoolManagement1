<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>view_module_uploaded</title>
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css"> 
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>

	<section>

			
		
		<main>
				<?php require 'module_leader_sidebar.php';
	       ?>
	       

			<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8" style="height: 100%; position: fixed;"></div>
	 <div class="notification" >
	 	<div class="note">
  <h4 style="margin-left: 3%;">MODULE:</h4>
  </div>
  <?php
// add_table is called in backend_product.
 
  // electronics database is connected with pdo.
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');
 $stmt = $pdo->prepare("SELECT module_name,module_id FROM module_assign");
  // statement is executed.
 $stmt->execute();
  // for each condition is used for decalring statement as row
 foreach ($stmt as $row) {?>
	
<h4><a href="view_module.php?module_id=<?php echo $row['module_id']; ?>"><?php echo $row['module_name']?></a></h4><br><?php 
}
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
 /*background-color: grey;*/
  margin-top: 2%;
  margin-left: 20%;
  width: 80%;
  height: 80%;
  position: fixed;
  padding: 2px;
  background: white;
  overflow-x: auto;
  overflow-y: auto;
  color: black;
}
.note {
 color: black;
 background: #e7e7e7;
}
.about_module{
	background: #85B5AD;
}

</style>	











































