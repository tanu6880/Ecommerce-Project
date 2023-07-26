<?php 
	$userid = $_GET['id'];
	$conn = mysqli_connect("localhost","root","", "ecommers");
	$sql = "delete from user_personal_details where user_id=$userid";
	if(mysqli_query($conn,$sql))
	{
		$sql = "delete from users where user_id=$userid";
		if(mysqli_query($conn,$sql))
		{
			header("Refresh:0;url=user_show.php");
		}
		else
		{
			header("Refresh:0;url=user_show.php?user_not delete");
		}
	}
	else
	{
		header("Refresh:0;url=user_show.php?can not delete");
	}

 ?>