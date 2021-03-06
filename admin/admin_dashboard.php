	<?php
	//session file that contains admin session and header property is called
session_start();
// if session does not start or user try to redirect page without login then link the page to the index homepage
if(empty($_SESSION['sess_login']) || $_SESSION['sess_login'] == ''){
    header("Location:../index.php");
    die();
}
?>
<?php
 require'admin_sidebar.php';
?>
<!DOCTYPE html>
<html>
<!-- heaeder part start -->
<head>
	<!-- title of a page -->
	<title>admin_dashboard</title>
		<!-- bootstrap.mi.css style file is callled -->

	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css"> 
<!-- responsive.css is used to make system responsive -->

<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<!-- head part ends -->

<!-- body part started -->

<body>

<header class="header">
			
	

		<!-- div is declared inside the header with name header_sontainer -->
		<div class="header_container">
			<!-- further div for the content of header -->
			<div class="container">
				<!-- div for the row of header -->
				<div class="row">
					<!-- div for the column of header -->
					<div class="col">
						<!-- header div for storing value inside the header surrounded margin -->
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<!-- header div for adding logo inside and style is used to maintain diffenret css file to adjust logo -->
							<div class="logo_container">
								<img src="logo.BMP" style="margin-left:-100px;">
								<!-- div inside header is useld to change the style of university name where the letter W is span from the  word woodland university-->
									<div class="logo_text">W<span>OODLAND<br>UNIVERSITY</span></div>
								
							</div>
							<?php
							// if session is started then display the user name and defualt profile picture
							if(isset($_SESSION['sess_login'])){
      ?>
        <nav>
          <ul>
          	<div class="profile_logo" style="margin-left: 940px; margin-top: 10px;">
          		<!-- when log out button is pressed link to the log out.php file for log off user -->
          	  <li><a href="../logout.php">LOGOUT</a></li>
          	  <!-- when default profile picture is pressed display the profile detail of the user using session -->
            <a href="profile.php"> <img src="profile.jpg" name="profile" style="width: 40px; 
border-radius: 5px; 
/*margin-left: 900%;*/
 margin-top: 5%;"></a></div>
 <!--display username with prefix Hello everytime user get log in  -->
 <div class="username" style="margin-left: 770px; font-size: 20px; margin-top: -30px;color: black;">
            <?php
            echo "Hello ". $_SESSION['sess_login'] ;
            
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

		<!-- header is closed -->
			
	</header>

	
<!-- section part is started -->
	<section>

			
		<!-- main part is started inside section part -->
		
		<main>

	       
        </form>
      </div>
      
<div>
			<div class="courses">
								<!-- new div is made that let data parrallax while scrolling page and background image of pages is defined with path name and style is used for designing -->

		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8" style="height: 100%; position: fixed;"></div>
		</div>
		<div class="student_number_display">
			<!--  -->
 <?php 
 // database name group_project is connected using pdo connnection
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');

 // select all the number of student having user type students and counter is used to count the total number of students.
 $stmt = $pdo->prepare("SELECT * FROM tbl_user where user_type='student'");
  // statement is executed.
 $stmt->execute();
  // for each condition is used for decalring statement as row.

 // counter is declared initially as 0
 $count=0;
 foreach ($stmt as $row) {
  
 // on every iteration of loop the value of counter get incremented 
  $count++;
} ?>
<!-- display total numebr of student -->
<button class="total_students"><a href="student_user.php" style="color: black"><?php
   echo "TOTAL \n STUDENTS\n"."<br>".$count;?></a></button>
   <?php

?>
				
		</div>
		<div class="m_leaders_number_display">
			<!--  -->
 <?php 
  // database name group_project is connected using pdo connnection

 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');

 // select all the number of module_leader having user type students and counter is used to count the total number of module_leader.

 $stmt = $pdo->prepare("SELECT * FROM tbl_user where user_type='module_leader'");
  // statement is executed.
 $stmt->execute();
  // for each condition is used for decalring statement as row.

 // counter is declared initially as 0.
 $count=0;
 foreach ($stmt as $row) {
 	 // on every iteration of loop the value of counter get incremented 
   
  $count++;
} ?>

<!-- display total number of module_leader -->
<button class="total_m_leaders"><a href="module_leader_user.php" style="color: black"><?php
   echo "TOTAL \n M.LEADER\n"."<br>".$count;?></button>
   <?php

?>
			
		</div>
		<div class="c_leaders_number_display">
			<!--  -->
 <?php 
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');

 // select all the number of course_leader having user type students and counter is used to count the total number of course_leader.

 $stmt = $pdo->prepare("SELECT * FROM tbl_user where user_type='course_leader'");
  // statement is executed.
 $stmt->execute();
 // for each condition is used for decalring statement as row.

 // counter is declared initially as 0.
 $count=0;
 foreach ($stmt as $row) {

 	 // on every iteration of loop the value of counter get incremented 
   
  $count++;
} ?>
<!-- display total number of course_leader -->
<button class="total_c_leaders"><a href="course_leader_user.php" style="color: black"><?php
   echo "TOTAL \n C.LEADER\n"."<br>".$count;?></button>
   <?php

?>
				<!-- <label>TOTAL<br>STUDENTS</label> -->
		</div>
		<div class="admin_number_display">
			<!--  -->
 <?php 
 // database name group_project is connected using pdo connnection
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');

 // select all the number of student having user type admin and counter is used to count the total number of admin.

 $stmt = $pdo->prepare("SELECT * FROM tbl_user where user_type='admin'");
  // statement is executed.
 $stmt->execute();
  // for each condition is used for decalring statement as row.


 // counter is declared initially as 0.
 $count=0;
 foreach ($stmt as $row) {
   
 	 // on every iteration of loop the value of counter get incremented 
  $count++;
} ?>
<!-- display total number of admin -->

<button class="total_admin"><a href="admin_user.php" style="color: black"><?php
   echo "TOTAL \n ADMIN\n"."<br>".$count;?></button>
   <?php

?>
				
		</div>
					 <!--div is closed  -->

		</main>
				<!-- main part is closed -->

	</section>
		<!-- section part is closed -->

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/custom.js"></script>	
</body>
</html>

<!-- style css that is used to design the above page content -->
<style>	
	.profile_logo{
width: 20px; 
border-radius: 5px; 
margin-left: 600%;
 margin-top: 15%;
	}
.total_students{
	background-color: green;
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





