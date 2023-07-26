<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../front-end/css/sign_up.css">
	<title></title>
</head>
<body>
	<?php
		include("../../front-end/html/sign_up.html");

	if(isset($_POST['SUBMIT']))
	{
		$mob = $_POST['mob'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$conn = mysqli_connect("localhost","root","", "ecommers");
		if($conn->connect_error)
		{
			die("connection faild: ".$conn->connect_error);
		} 
		$sql = "Insert into users (user_email,user_mobile,user_password) values('$email' ,$mob ,'$pass');";
		// $result = $conn->query($sql);
		if($conn->query($sql))
		{
			$id = mysqli_insert_id($conn);
			$sql = "Insert into user_personal_details(user_id)values($id)";
			if($conn->query($sql))
			{
				header("Refresh:2 ; url=personal_details.php?userid=$id"); 
				$conn->close(); 
			}
		}
		else
		{
			header("Refresh:0 ; url=register.php"); 
		}
	}
	?>
</body>
</html>