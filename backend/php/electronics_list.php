<?php
	include("navbar.php"); 
	include("categories_nav_list.php"); 
	$id=$_GET['c_id'];
	$conn = mysqli_connect("localhost","root","","ecommers");
	$sql = "SELECT * FROM product where c_id=$id";
	$result = mysqli_query($conn,$sql);
	echo "<ol>";
	while($row = $result->fetch_assoc())
	{
		$sql = "SELECT * FROM product_image where p_id=$row[p_id]";
		$result1 = mysqli_query($conn,$sql);
		$image = $result1->fetch_assoc();
		echo "<div class ='categories_elec' onclick='categories($image[id],$row[p_id])'>
		<div><img class='image_elec' src='../../image/$image[image1]'></div>
		<div class='categories_elec_main_image_about'>
		<h3>$row[p_name]</h3>
		<h3>$row[p_sales_price]</h3>
		<p class='over_flow'>$row[p_desc]</p>
		<button class='categories_elec_button'><a href='#'' class='categories_elec_link'>Buy Now</a></button>
      	<button class='categories_elec_button'><a href='#'' class='categories_elec_link'>Add To Cart</a></button>
		</div></div>";
	} 
	echo "</ol>";
	include("../../front-end/html/footer.html");

?>

<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../../front-end/css/categories_css/categories_electronics.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	
		<link rel="stylesheet" type="text/css" href="../../front-end/css/navbar.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../../front-end/css/footer.css">
  	
		<style type="text/css">
			ol
			{
				display: grid;
				grid-template-columns: auto auto auto auto;
				gap: 15px 0px;
				margin-top: 50px;
				margin-left: 100px;
			}
			h3
			{
				text-align: center;
			}
			.over_flow
			{
				overflow: hidden;
				display: -webkit-box;
				-webkit-line-clamp:2;
				line-clamp: 2;
				-webkit-box-orient:vertical;
			}
		</style>
		<title></title>
	</head>
	<body>
	<script type="text/javascript">
		function categories(id,p_id)
		{
			window.location="product_details.php?id="+id+"&p_id="+p_id;
		}
	</script>
	</body>
	</html>	