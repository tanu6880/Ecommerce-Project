<?php 
include("dashboard.php");
include("product_navbar.php"); 
$conn = mysqli_connect("localhost","root","","ecommers");
$sql = "SELECT * FROM users ";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)===0)
{
	echo "the table is empty";
}
else
{
	echo "<h1>user table</h1>";
	echo "<table id='user_details'>
		<tr>
		<th>user_id</th>
		<th>user_email</th>
		<th>user_mobile_number</th>
		<th>user_password</th>
		</tr>";
		while($row=$result->fetch_assoc())
		{
			echo "<tr>
			<td>$row[user_id]</td>
			<td>$row[user_email]</td>
			<td>$row[user_mobile]</td>
			<td>$row[user_password]</td>
			<td><button onclick=userconfirmi($row[user_id]) type='button' class='btn btn-primary'><i class='fas fa-edit'></i></button></td>
			<td><button onclick=userdel($row[user_id]) type='button' class='btn btn-primary'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
			
			</tr>";
		}
		echo "</table>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
  	#user_details,h1
  	{
  		margin-left: 280px;
  	}
  	h1
  	{
  		margin-left: 680px;
  		margin-bottom: 50px;
  	}
  	#user_details th
  	{
  		text-align: center;
  		padding-left: 100px;
  	}
  	#user_details td
  	{
  		text-align: center;
  		padding-left: 100px;
  	}
  </style>
	<title></title>
</head>
<body>
	<script type="text/javascript">
		function userconfirmi(id)
		{
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "user_update.php?id="+id;	
			}
			else
			{
				window.location.href = "user_show.php";	
			}
		}
		function userdel(id)
		{
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "user_delete.php?id="+id;	
			}
			else
			{
				window.location.href = "user_show.php";	
			}

		}
	</script>
</body>
</html>