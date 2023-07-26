<?php 
	if(isset($_GET['id']))
	{
		$a_id = $_GET['id'];
		$conn = mysqli_connect("localhost","root","","ecommers");
		$sql = "delete from address where a_id = $a_id";
		if(mysqli_query($conn,$sql))
		{
			header("Refresh:0;url=address.php?id=$_GET[user_id]");
		}
		else
		{
			header("Refresh:0;url=address.php?id=$_GET[user_id]");
		}
	}
 ?>