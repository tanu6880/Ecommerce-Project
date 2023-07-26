<?php 

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$conn = mysqli_connect("localhost","root","","ecommers");
	$sql = "delete from product_image where id = $id";
	if(mysqli_query($conn,$sql))
	{
		header("Refresh:0;url=product_image_show.php");
	}
	else
	{
		header("Refresh:0;url=product_image_show.php");
	}
}

?>