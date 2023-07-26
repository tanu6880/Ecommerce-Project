<?php 

	include("navbar.php");
	$conn = mysqli_connect("localhost","root","","ecommers");
	$id=$_GET['id'];
	$sql = "SELECT * FROM product_image where id=$id";
	$result = mysqli_query($conn,$sql);
	$image = $result->fetch_assoc();
	$sql = "SELECT * FROM product where p_id=$_GET[p_id]";
	$result1 = mysqli_query($conn,$sql);
	$row = $result1->fetch_assoc();
	echo "<div id='main'><div class='k2'>";
	for($i=1;$i<=5;$i++)
	{
		$var = "image".$i;
		$name = $image[$var];
		echo "<div>
				<img onclick=imageshow('$name') class='image' src='../../image/$image[$var]'>
			</div>";
	}
	echo "</div>";

	echo "<div class='k1'>
		<div>
		<img id='displayimage' src='../../image/$image[image1]'>
		</div>
		<button class='buttons' onclick='addToCart($id,$row[p_id],$row[c_id])'><i class='fa-sharp fa-solid fa-cart-plus'></i> add to cart</button>
	<a href='buypage.php?p_id=$row[p_id]'><button class='buttons'><i class='fa-solid fa-bolt'></i> buy now</button></a>
			</div>";

	echo "<div id='detail'>
		<h1>$row[p_name]</h1>
		<h1><i class='fa-solid fa-indian-rupee-sign'></i> $row[p_sales_price]</h1>
		<h3>Available offers</h3>
		<p><i class='fa-solid fa-tag'></i> Offer Pay Later</p>
		<p><i class='fa-solid fa-tag'></i> Bank Offer5% Cashback on Flipkart Axis Bank CardT&C</p>
		<p><i class='fa-solid fa-tag'></i> Partner OfferSign up for Flipkart Pay Later and get Flipkart Gift Card worth up to ₹500*Know More</p>
		<p><i class='fa-solid fa-tag'></i> Partner OfferBuy this product & Get upto ₹500 off on FurnitureKnow More</p>
		<h1>Descripetion</h1>
		<p>$row[p_desc]</p>
		<h1>Warranty</h1>
		<p>No return policy on $row[p_name] after 15 days...thank you</p>
		</div>";
	echo "</div><br><br>";
					
	 include("../../front-end/html/footer.html");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../front-end/css/navbar.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../../front-end/css/footer.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  	<style type="text/css">
  		#main 
  		{
  			margin-top: 50px;
  			margin-left: 100px;
  		}
  		.image
  		{
  			height: 80px;
  			width: 80px;
  			box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;

  		}
  		.image:hover
  		{
  			border: 3px solid blue;
  			box-sizing: border-box;
  			cursor: pointer;
  		}
  		#displayimage
  		{
  			height: 450px;
  			width: 450px;
  			cursor: pointer;
/*  			box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;*/

  		}
  		.k1
  		{
  			height: 450px;
  			width: 450px;
  			
  		}
  		.k2
  		{
  			height: 400px;
  			width: 80px;
  			
  		}
  		#main
  		{
  			display: grid;
  			grid-template-columns: 100px 100px auto;
  		}
  		.buttons
  		{
  			height: 50px;
  			width:450px;
  			background-color: darkorchid;
  			color: white;
  			font-size: 1.3em;
  			font-weight: 600;
/*  			box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;*/

  		}
  		#detail 
  		{
  			margin-left: 400px;
  		}
  	</style>
</head>
<body>
	<script type="text/javascript">
		function imageshow(path)
		{
			let displayimage = document.getElementById("displayimage");
			displayimage.src="../../image/"+path;
		} 
		function addToCart(id,p_id,c_id)
		{
			$.ajax({
		    	url: 'clickCartHandler.php',
			    type: "POST",
			    data: {
			        "p_id":p_id,
					"image_id":id,
					"c_id":c_id,
					"scope":"add"

			    },
			    dataType: "json",
			    success: function (data) {
			        if(data===201)
			        {
			        	window.location.href="cartShow.php";
			        }
			    },
			    error: function (error) {
			        if(error==401)
			        	alert("Please login then continue");
			    }
			});

		}
	</script>
</body>
</html>