<?php 
if(isset($_COOKIE['user_id']))
{
	$p_id = $_POST['p_id'];
	$c_id = $_POST['c_id'];
	$user_id = $_COOKIE['user_id'];
	$image_id = $_POST['image_id'];
	$conn = mysqli_connect("localhost","root","", "ecommers");
	$insertQuery="Insert into carts (user_id,c_id,p_id,image_id) values($user_id,$c_id,$p_id,$image_id)";
	if($conn->query($insertQuery))
	{
		echo 201;
	}
	else
	{
		echo 300;
	}
}
else
	echo 401;

?>