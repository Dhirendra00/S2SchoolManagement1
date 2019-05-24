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
				<?php require 'student_sidebar.php';
	       ?>
	       

			<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8" style="height: 100%; position: fixed;"></div>
	 <div class="notification" >
	 	<div class="note">
  <h4 style="margin-left: 3%;">GRADE:</h4>
  </div>
  <?php
$pdo = new PDO('mysql:dbname=group_project;host=localhost', 'root', '');
//linking the database
$users = $pdo->prepare("SELECT * FROM grade");
//executes the same sql stat with high efffiency
$users->execute();
?>

<?php
//php is started
foreach ($users as $row) {?>
	<div class="about_module">
<!-- <h4><?php echo" ".$row['week']?></h4><br></div> -->
<h4 style="text-align: center;"><?php echo $row['grade_name']?></h4></div><br>
<a type="file" href="../module_leader/grade_file/<?php echo $row['grade_file']?>"><?php echo $row['grade_file']?></a><br>
<?php echo $row['grade_description']?><br>
<h4><?php echo $row['grade_creation_date']?></h4><br>
<?php 
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











































