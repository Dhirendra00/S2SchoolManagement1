<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>WOODLAND UNIVERSITY</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css"> 
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
			
	

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
              
									<div class="logo_text">
             <img src="logo.BMP" style="margin-left:-100px; position: fixed;">
                    W<span>OODLAND<br>UNIVERSITY</span></div>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
			
	</header>

	<!-- Menu -->

	<section>	
	<main>

	

	<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="images/courses_background.jpg" data-speed="0.8"></div>
		<div class="login">
     <?php
// electronics database is connected in pdo.
$pdo = new PDO('mysql:dbname=group_project;host=localhost', 'root', '');
  // if condition is used to check the statement log in is post or not.
if (isset($_POST['login'])) {
    // select username from tbl-user.
  $stmt= $pdo->prepare("SELECT * FROM tbl_user WHERE username= :username");
  $criteria=[
    'username' => $_POST['username']
    // 'user_type' => $_POST['user_type']

  ];
// statemen to execute criteria.
  $stmt-> execute($criteria);
  //to check if statement is used to check the password is added or not
  if($stmt-> rowCount() >0){
    $user = $stmt -> fetch();
    //to check if the password is verified or not. 
    if(password_verify($_POST['password'],$user['password'])){
      echo "Wrong details";
      // to check weather log in is admin or user type.
     $_SESSION['sess_login']=$_POST['username'];
      if ($user['user_type']=='admin'){
       header('Location:admin/admin_dashboard.php');
      }
    else if ($user['user_type']=='student') {
          $_SESSION['sess_login'] = $_POST['username'];
        header('Location:student/student_dashboard.php');
      }
      else if ($user['user_type']=='course_leader')
        {
            $_SESSION['sess_login'] = $_POST['username'];
          header('Location:course_leader/course_leader_dashboard.php');
    } 
      else if ($user['user_type']=='Module_leader')
      { 
         $_SESSION['sess_login'] = $_POST['username'];
         header('Location:module_leader/module_leader_dashboard.php');
      }
      else 
      {
        echo "user_type error";
      }
    }
    else echo '<h2>!!Login Failed!!</h2>';
  }
}
?>

<div class="help_sites">
 <div class="notification" >
    <div class="note">
  <h4 style="margin-left: 3%;">HELP SITES:</h4>
  </div>
   <?php
$pdo = new PDO('mysql:dbname=group_project;host=localhost', 'root', '');
//linking the database
$users = $pdo->prepare("SELECT * FROM library_sites");
//executes the same sql stat with high efffiency
$users->execute();
?>

<?php
//php is started
foreach ($users as $row) {?>
  <div class="about_module">
<h4>LINK:</h4><br></div>
<h4 style="text-align: center;"><?php echo $row['link']?></h1><br>
<a type="text" href="<?php echo $row['link']?>"><?php echo $row['link']?></a><br>
<h4><?php echo $row['u_date']?></h4><br>
<?php 
}
?>
</div>
</div>


  <form method="POST" action="">
    <h4 id="lgn">Log In</h4>
  <label>Username:</label><input id="username" type="text" name="username" placeholder="Enter your username" required><br><br>
  <label>Password:</label><input id="password" type="password" name="password" placeholder="Enter your password" required ><br>
  <input class="btn_lgn" type="submit" name="login" value="LOGIN"><br>
</form>
</div>

<div class="needhelp">
  <h4>FeedBack?</h4>
  <?php 

if(isset($_POST['submit'])){
  $stmt = $pdo->prepare("INSERT INTO feed_back(
    feedback) VALUES(:feedback)");

  $criteria = [
     'feedback' => $_POST['feedback']
    ];

  if($stmt->execute($criteria)){
   ?>
   <strong>Added successfully.Pree Ok!! <button class="btn"> <a href="index.php">OK</a></button></strong>
    
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
 <form method="POST" action="">
   <input id="feedback_form" type="text" name="feedback" placeholder="write something..."><br>
   <input class="btn" type="submit" name="submit" value="feedback" style="width: 90px; height: 25px; margin-top: 5%; margin-left: 5%;">
 </form>
</div>
</main>
</section>

	

<script src="js/jquery-3.2.1.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>

<style>
.notification{
 background-color: grey;
  margin-top: -1%;
  margin-left: 60%;
  width: 40%;
  /*font-size: 10px;*/
  height: 80%;
  position: fixed;
  padding: 2px;
  background: white;
  overflow-x: auto;
  overflow-y: auto;
}
.help_sites{
  background: white;
  width: 40%;
  position: fixed;
}
.note {
 color: black;
 background: #e7e7e7;
}
.about_module{
  background: #85B5AD;
}
.needhelp{
  
  margin-left: 2%;
  margin-top: 6%;
  padding: 1%;
  background: white;
  width: 25%;
  height: 25%;
  box-shadow: 0px 1px 10px rgba(29,34,47,0.1);
}


</style>