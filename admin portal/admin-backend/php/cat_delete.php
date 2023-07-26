<?php 
	if(isset($_GET['id']))
	{
		$p_id = $_GET['id'];
		$conn = mysqli_connect("localhost","root","","ecommers");
		$sql = "delete from category_main where p_id = $p_id";
		if(mysqli_query($conn,$sql))
		{
			header("Refresh:0;url=cat_show.php");
		}
		else
		{
			header("Refresh:0;url=cat_show.php");
		}
	}
 ?>