<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../front-end/css/personal_details.css">
	<title>personal details</title>
</head>
<body>
	<?php 
		include("../../front-end/html/personal_details.html");

	if(isset($_POST['Submit']))
	{
		$image = $_POST['img_name'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$conn = mysqli_connect("localhost","root","", "ecommers");
		if($conn->connect_error)
		{
			die("connection faild: ".$conn->connect_error);
		} 
		$sql = "Update user_personal_details set user_firstname='$first_name',user_lastname='$last_name',user_dob='$dob',gender='$gender',user_image='$image' where user_id=$_GET[userid]";
		if($conn->query($sql))
		{
			header("Refresh:2 ; url=index.php"); 
			$conn->close(); 
		}
		else
		{
			// header("Refresh:2 ; url=personal_details.php"); 
		}
	}
?>
</body>
</html>