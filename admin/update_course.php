<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>add_course</title>
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
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8" style="height: 100%; position: fixed; "></div>

		<div class="add_course">
			<form class="add_course_form" method="POST" action="">
				<div class="add_course_pannel">
					<label>UPDATE COURSE</label><br>
					<?php 
$pdo = new PDO('mysql:dbname=group_project;host=localhost','root','');
if(isset($_POST['update'])){
$stmt = $pdo->prepare("UPDATE course SET course_name=:course_name, course_full_name=:course_full_name,course_leader_name=:course_leader_name, course_creation_date=:course_creation_date WHERE id=:id");
	$criteria = [
		'course_name' => $_POST['course_name'],
		'course_full_name'=> $_POST['course_full_name'],
		'course_leader_name'=> $_POST['course_leader_name'],
		'course_creation_date'=>$_POST['course_creation_date'],
		'id'=>$_GET['id'] 
		
	];
		// statement execute the above criteria
	if($stmt->execute($criteria))  {
        ?>
         <strong>Updated successfully.Pree Ok!! <button> <a href="update_course.php">OK</a></button></strong>
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

				</div>
					<LABEL>COURSE SHORT NAME:</LABEL>
					<input id="add_course_name" type="text" name="course_name" placeholder="enter name of a course" required><br><br>
					<label>COURSE FULL NAME:</label>
					<input id="add_course_full_name"  type="text" name="course_full_name" placeholder="enter name of a course" required><br><br>
                    <label>COURSE LEADER NAME:</label>
                    <input id="add_course_leader"  type="text" name="course_leader_name" placeholder="enter name of a course" required><br><br>
                    <label>COURSE CREATION DATE:</label>
                    <input id="add_creation_date" type="date" name="course_creation_date" required><br><br>
			 <input class="btn_course" type="submit" name="update" value="UPDATE"><br>
			</form>


			 
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
.add_course_pannel{
	background:#e7e7e7;
    color: black;
}
.add_course_form{
	margin: 5px;
	padding: 2px;
	width: 50%;
	margin-left: 35%;
	margin-top: 5%;
	height: 50%;
	background: white;
	border-radius: 4px;
}
#add_course_name{
	margin-left: 35px; 
    width: 40%;
    border-radius: 2px;
}
#add_course_full_name{
   margin-left: 47px;
   width: 40%;
   border-radius: 2px;
}
#add_creation_date{
  margin-left: 22px;
  width: 40%;
  border-radius: 2px;
}
#add_course_leader{
margin-left: 33px;
width: 40%;
border-radius: 2px;
}

.btn_course{
background-color: #14bdee;
  width: 100px;
  height: 30px;
  margin-top: 1%;
  margin-left: 50%;
  text-align: center;
  box-shadow: 0px 5px 40px rgba(29,34,47,0.15);
}
.btn_course:hover{
  box-shadow: 0px 5px 40px rgba(29,34,47,0.45);

}
.btn_course a{
   display: block;
  text-transform: uppercase;
}

</style>






<!-- value="<?php echo date('y-m-d');?>" readonly="readonly" -->












/*<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav_dropdown -->*/