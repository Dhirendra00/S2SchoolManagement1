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
	       <div class="search_form">
        <form method="POST" action="ajaxProducts.php" enctype="multipart/form-data">
           <input type="text" id="keyword" placeholder="search for a name"/>
          <div id="content"></div>
        </form>
      </div>
<div>
			<div class="courses">
				
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="../images/courses_background.jpg" data-speed="0.8" style="height: 100%; position: fixed;"></div>

		<div class="view_users">
			<?php
$pdo = new PDO('mysql:dbname=Group_Project; host=localhost','root','');
if(isset($_GET['delete']))
// delete column using id.
{
	$stmt = 'DELETE FROM tbl_user WHERE id = :id';
// statement is called from above stmt to prepared stmt using pdo.
	$preparedstmt = $pdo->prepare($stmt);
	$criteria = [
		'id' =>$_GET['delete']
	];
// prepared stmt is execute with criteria and display deleted statement if the criteria get executed.
	if($preparedstmt->execute($criteria))  {
        ?>
                   <strong>DELETED successfully.Pree Ok!! <button> <a href="delete_user.php">OK</a></button></strong>
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
 require 'tableGenerator.php';
  // electronics database is connected with pdo.
 $pdo = new PDO('mysql:dbname=group_project; host=localhost','root','');
  // table generator is declared.
 $tg = new TableGenerator();
  // table column name is added in the table.
 $tg->setHeadings(['id','f_name','l_name','address','nationality','dob','gender','p_challenged','contact_number','email','user_type']);
  // statement of table column is selected from product table.
 $stmt = $pdo->prepare("SELECT id,f_name,l_name,address,nationality,dob,gender,p_challenged,contact_number,email,user_type FROM tbl_user");
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
.add_user_pannel{
	background:#e7e7e7;
    color: black;
}
.add_user_form{
	margin: 5px;
	padding: 2px;
	width: 65%;
	margin-left: 27%;
	margin-top: 5%;
	height: 50%;
	background: white;
	border-radius: 4px;
}
#firstname{
	margin-left: 3px; 
    width: 30%;
    border-radius: 2px;
    padding: 2px;
}
#dob{
	margin-left: 3px; 
    width: 30%;
    border-radius:2px;
    padding: 2px;
}
#lastname{
	margin-left: 6px; 
    width: 30%;
    border-radius: 2px;
    padding: 2px;
}
#password{
	margin-left: 8px; 
    width: 30%;
    border-radius: 2px;
    padding: 2px;
}
#Nationality{
	margin-left: 13px; 
    width: 30%;
    border-radius: 2px;
    padding: 2px;
}
#address{
	margin-left: 25px; 
    width: 30%;
    border-radius: 2px;
    padding: 2px;
}
#contact_number{
	margin-left: 2px; 
    width: 30%;
    border-radius: 2px;
    padding: 2px;
}
#email{
	margin-left: 2px; 
    width: 30%;
    border-radius: 2px;
    padding: 2px;
}
#user_type{
    margin-left: 2px; 
    border-radius: 2px;
    padding: 2px;
}
#gender{
	margin: 3px;
}
#physically_challenged{
	margin: 3px;
}


.btn_user{
background-color: #14bdee;
  width: 100px;
  height: 30px;
  margin-top: 1%;
  margin-left: 45%;
  text-align: center;
  box-shadow: 0px 5px 40px rgba(29,34,47,0.15);
}
.btn_user:hover{
  box-shadow: 0px 5px 40px rgba(29,34,47,0.45);

}
.btn_user a{
   display: block;
  text-transform: uppercase;
}
.view_users{
width: 80%;
margin-left: 19%;
}
</style>	








