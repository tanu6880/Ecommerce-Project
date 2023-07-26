<?php 
	if(isset($_GET['id']))
	{
		$p_id = $_GET['id'];
		$conn = mysqli_connect("localhost","root","","ecommers");
		$sql = "delete from product where p_id = $p_id";
		if($conn->query($sql))
		{
			header("Refresh:0 ; url=product_show_catwise.php?id=$_GET[c_id]"); 
			$conn->close(); 
		}
		else
		{
			header("Refresh:0 ; url=product_show_catwise.php?id=$_GET[c_id]"); 
		}
	}
 ?>