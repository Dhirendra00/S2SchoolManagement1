<?php
require 'tableGenerator.php';
$pdo = new PDO('mysql:dbname=group_project;host=localhost','root','');

if (isset($_POST['keyword'])) 
{
	$keyword=$_POST['keyword'];
	$stmt=$pdo->prepare("SELECT * FROM tbl_user WHERE username Like'%$keyword%' OR user_type Like '%$keyword%' OR Address Like '%$keyword%'");
	$stmt->execute();
	if ($stmt->rowCount()>0) {
	foreach ($stmt as $product) 
	{
		extract($product);?>
	<div class="product">
		<table>	
		<th>
			userName :
		</th>
	    <th>
			email :
	    </th>
	    <th>
			user_type :
		</th>
	    <th>
			contact_Number :
		</th>
	    <th>
			Address :
		</th>
		<th>
			Gender :
		</th>	
		<tr><td><?php echo $username?></td>
		<td><?php echo $email?></td>
		<td><?php echo $user_type?></td>
		<td><?php echo $cont_number?></td>
		<td><?php echo $Address?></td>	    
	    <td><?php echo $Gender?></td></tr>
	</table>

	<?php  }
}
else{
	$stmt=$pdo->prepare("SELECT * FROM tbl_user");
}
}
?>
<style>
	table{
		border: 1px solid black;
		width: 10%;
		height: auto;
		/*position: fixed;*/

	}
	table th{
		height: 1%;
		background-color: lightblue;
	}
	table tr{
	height: 10%;
		/*font-size: 18px;*/
		/*padding: 2px;*/
		
		
	}
	table td{
		height: 60%;
		/*width: 30%;*/
		overflow: auto;

	}
	tr:nth-child(even){background-color: #f2f2f2}    /*https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_table_responsive
</style>