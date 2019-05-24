	<?php
session_start();
if(empty($_SESSION['sess_login']) || $_SESSION['sess_login'] == ''){
    header("Location:../index.php");
    die();
}
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');
?>
<?php
 require'module_leader_sidebar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css"> 
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
 	</style>

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
 <div class="username" style="margin-left: 770px; font-size: 20px; margin-top: -30px;color: black;">
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


      </div>
      
<div>
			<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8" style="height: 100%; position: fixed;"></div>
		</div>
		<div class="student_number_display">
			 <?php   
			 $id1 = $_SESSION['sess_login'];
			
        $users = $pdo->prepare('SELECT * FROM tbl_user where username=:username');

//linking the database
//executes the same sql stat with high efffiency
	$users->execute(['username'=> $id1]);

foreach ($users as $row) {



 				

	 				
echo "<table>";
echo "<b>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['l_name'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Address: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo"" .$row['address'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 			

	 				
 				echo "</table>";
 				echo "</b>";
}
 			?>
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
	background-color: white;
	margin-left: 30%;
	margin-top: -4.3%;
	position: fixed;
	width: 10%;
	height: 20%;
	border-radius: 10px;
	font-family: serif;
	font-weight: bold;
	text-align: center;
	font-size: 20px;

}
.total_m_leaders{
	background-color: green;
	margin-left: 45%;
	margin-top: -4.3%;
	position: fixed;
	width: 10%;
	height: 20%;
	border-radius: 10px;
	font-family: serif;
	font-weight: bold;
	text-align: center;
	font-size: 20px;

}
.total_c_leaders{
	background-color: green;
	margin-left: 60%;
	margin-top: -4.3%;
	position: fixed;
	width: 10%;
	height: 20%;
	border-radius: 10px;
	font-family: serif;
	font-weight: bold;
	text-align: center;
	font-size: 20px;

}
.total_admin{
	background-color: green;
	margin-left: 75%;
	margin-top: -4.3%;
	position: fixed;
	width: 10%;
	height: 20%;
	border-radius: 10px;
	font-family: serif;
	font-weight: bold;
	text-align: center;
	font-size: 20px;

}


</style>






 