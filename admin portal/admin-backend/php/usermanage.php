<?php
	include("dashboard.php") ;
	include("product_navbar.php");
	$conn = mysqli_connect("localhost","root","","ecommers");
	if($conn->connect_error)
	{
		die("connection faild: ".$conn->connect_error);
	}
	$sql = "SELECT * FROM `user_personal_details` ;" ;
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)===0) { 
		echo "empty table";
	}
	else 
	{
		echo "<h1 style='margin-left:730px;margin-top:20px;margin-bottom:20px;' >user details</h1>";
		echo "<table id='user_table'>
			<tr>
			  <th>usr_per_id</th>
			  <th>Usr_id</th>
		      <th>FirstName</th>
		      <th>LastName</th>
		      <th>Dob</th>
		      <th>gender</th>
		      <th>Image</th>
		      <th>Edit</th>
		      <th>Delete</th>
		      </tr>";
		    while($row = $result->fetch_assoc())
			{
				echo "<tr>";
				echo "<td class='ex'>".$row['user_personal_id']."</td>";
				echo "<td class='ex'>".$row['user_id']."</td>";
				echo "<td class='ex'>".$row['user_firstname']."</td>";
				echo "<td class='ex'>".$row['user_lastname']."</td>";
				echo "<td class='ex'>".$row['user_dob']."</td>";
				echo "<td class='ex'>".$row['gender']."</td>";
				echo "<td class='ex'>".$row['user_image']."</td>";
				echo "<td><button onclick=confirmi($row[user_id]) type='button' class='btn btn-primary'><i class='fas fa-edit'></i></button></td>";
				echo "<td><button onclick=del($row[user_id]) type='button' class='btn btn-primary'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
				echo "</tr>";
			}
			echo "</table>";

	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style type="text/css">
		#user_table
		{
			margin-left: 250px;
		}
		#user_table th 
		{
			font-size: 1.4em;
			font-weight: 700;
			padding-left: 15px;
			padding-right: 15px;
			text-align: center;
		}
		#user_table td
		{
			font-size: 1.2em;
			font-weight: 500;
			padding-left: 15px;
			padding-right: 15px;
			padding-top: 5px;
			text-align: center;

		}
		.ex:hover
		{
			background-color: black;
			color: white;
		}
		#user_table td a 
		{
			text-decoration: none;
			color: blue;
			margin-left: -30px;
		}

	</style>
</head>
<body>
	<script type="text/javascript">
		function confirmi(userid)
		{
			
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "userupdate.php?user_id="+userid;	
			}
			else
			{
				window.location.href = "usermanage.php";	
			}
		}
		function del(userid)
		{
			
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "userdelete.php?user_id="+userid;	
			}
			else
			{
				window.location.href = "usermanage.php";	
			}
		}
	</script>
</body>
</html>
