<?php 
	$userid = $_GET['user_id'];
	$conn = mysqli_connect("localhost","root","", "ecommers");
	$sql = "delete from user_personal_details where user_id=$userid";
	if(mysqli_query($conn,$sql))
	{
		header("Refresh:0;url=usermanage.php");
	}
	else
	{
		header("Refresh:0;url=usermanage.php?can not delete");
	}

 ?>