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
  <h4 style="margin-left: 3%;">COURSE:</h4>
  </div>
  				<?php
$pdo = new PDO('mysql:dbname=Group_Project; host=localhost','root','');
if(isset($_GET['delete']))
// delete column using id.
{
	$stmt = 'DELETE FROM course WHERE id = :id';
// statement is called from above stmt to prepared stmt using pdo.
	$preparedstmt = $pdo->prepare($stmt);
	$criteria = [
		'id' =>$_GET['delete']
	];
// prepared stmt is execute with criteria and display deleted statement if the criteria get executed.
	if($preparedstmt->execute($criteria))  {
        ?>
                   <strong>Deleted successfully.Pree Ok!! <button> <a href="delete_course.php">OK</a></button></strong>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("Registration Error");
            </script>
          <?php

        }

}
?>
 <?php 
// add_table is called in backend_product.
 require 'course_table_generator.php';
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');
  // table generator is declared.
 $tg = new TableGenerator();
  // table column name is added in the table.
 $tg->setHeadings(['id','course_name','course_full_name','course_leader_name','course_creation_date']);
  // statement of table column is selected from product table.
 $stmt = $pdo->prepare("SELECT id,course_name, course_full_name, course_leader_name,course_creation_date FROM course");
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
  margin-top: 8%;
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



