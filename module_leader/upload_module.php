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
	      <?php require 'module_leader_sidebar.php';
	       ?>
			<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8"></div>

		<div class="add_course">
			<form class="add_course_form" method="POST" action="" enctype="multipart/form-data">
				<div class="add_course_pannel">
					<?php
$odp = new PDO('mysql:dbname=group_project;host=localhost', 'root' ,'');  
$mesg ="";
//this connect with the database
if(isset($_POST['add_module'])){
 //check the reserved variable of post
	$target ="module_file/".basename($_FILES['slide']['name']); //for image
    move_uploaded_file($_FILES['slide']['tmp_name'],$target);
    
$tmts = $odp->prepare("INSERT INTO module_upload(week,slide,chapter_description,chapter_creation_date,module_name) VALUES
(:week,:slide,:chapter_description,:chapter_creation_date,:module_name'))"); //this insertquery insert the all the given value in database
$criteriias=[ 
'week'=> $_POST['week'],//excute the attribute given in table
'slide'=> $_FILES['slide']['name'],
'chapter_description'=> $_POST['chapter_description'],
'chapter_creation_date'=> $_POST['chapter_creation_date'],
'module_name'=>$_POST['module_name']
];
//execute the aatribute given in table


if($tmts->execute($criteriias)){
	 ?>
   <strong>Added successfully.Pree Ok!! <button> <a href="upload_module.php">OK</a></button></strong>
    
<?php
  }
	else{
		echo '<p>!error!</p>';
	}
}

?>
					<label>ADD MODULE</label><br>
					
				</div>
					<LABEL>WEEK:</LABEL>
					<input id="add_course_name" type="number" name="week" placeholder="enter name of a course" required><br><br>
					<label>SLIDE:</label>
					<input id="add_course_full_name"  type="file" name="slide" required><br><br>
                    <label>SLIDE DESCRIPTION:</label>
					<input id="add_course_full_name"  type="text" name="chapter_description" placeholder="enter description" required><br><br>
                    <label>SLIDE CREATION DATE:</label>
                    <input id="add_creation_date" type="date" name="chapter_creation_date" required><br><br>
                    <label>MODULE NAME:</label>
                    <select id="module_name" name="module_name">
                    	<?php

 
  // group_project database is connected with pdo.
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');
 $stmt = $pdo->prepare("SELECT module_name FROM module_assign");
  // statement is executed.
 $stmt->execute();
  // for each condition is used for decalring statement as row.
 foreach ($stmt as $row) {
 echo '<option module_name="'.$row['module_name'].'">'.$row['module_name'].' </option>';
}
?>

                    	
            </select><br><br>
			 <a href="upload_process.php"><input class="btn_course" type="submit" name="add_module" value="UPLOAD"><br></a>
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