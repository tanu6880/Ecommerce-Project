<?php

	$conn = mysqli_connect("localhost","root","","ecommers");
	$p_id = $_POST['p_id'];	
    $quantity = $_POST['quantity'];
	$qnti = "Update carts set quantity=$quantity where p_id=$p_id";
	$update_qnt = mysqli_query($conn,$qnti);
	echo 301;

 ?>