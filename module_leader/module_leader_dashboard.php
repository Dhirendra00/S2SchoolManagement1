<?php
session_start();
if(empty($_SESSION['sess_login']) || $_SESSION['sess_login'] == ''){
    header("Location:../index.php");
    die();
}
?>
<?php
require 'module_leader_sidebar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>course_leader_dashboard</title>
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css"> 
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
	<header class="header">
			
	

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<img src="logo.BMP" style="margin-left:-100px;">
									<div class="logo_text">W<span>OODLAND<br>UNIVERSITY</span></div>
								
							</div>
							<?php
							if(isset($_SESSION['sess_login'])){
      ?>
        <nav>
          <ul>
          	<div class="profile_logo" style="margin-left: 940px; margin-top: 10px;">
          	  <li><a href="../logout.php">LOGOUT</a></li>
            <a href="profile.php"> <img src="profile.jpg" name="profile" style="width: 40px; 
border-radius: 5px; 
/*margin-left: 900%;*/
 margin-top: 10%;"></a></div>
 <div class="username" style="margin-left: 700px; font-size: 20px; margin-top: -30px;color: black;">
            <?php
            echo "hello ". $_SESSION['sess_login'] ;
            
            ?>

 </div>
          </ul>
        </nav>
      <?php
    }
 ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
			
	</header>


	<section>

			
		
		<main>

	       
        </form>
      </div>
     
<div>
			<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8" style="height: 100%; position: fixed;"></div>
		</div>
		<div class="student_number_display">
	 	<div class="note">
  <h4 style="margin-left: 0%; background: #85B5AD ">MODULE:</h4>
  </div>	<!--  -->
 <?php
// add_table is called in backend_product.
 
  // electronics database is connected with pdo.
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');
 $stmt = $pdo->prepare("SELECT module_name FROM module_assign");
  // statement is executed.
 $stmt->execute();
  // for each condition is used for decalring statement as row
 foreach ($stmt as $row) {?>
	
<h4><a href="upload_module.php"><?php echo $row['module_name']?></a></h4><br>
<?php 
}
?>

	</div>			<!-- <label>TOTAL<br>STUDENTS</label> -->
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
	.profile_logo{
width: 20px; 
border-radius: 5px; 
margin-left: 600%;
 margin-top: 15%;
	}
.student_number_display{
	margin-left: 30%;
	margin-top: -3%;
	width: 50%;
	height: 50%;
	background: white;

}

</style>






