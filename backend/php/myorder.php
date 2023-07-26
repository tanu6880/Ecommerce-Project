<?php 
	if(isset($_COOKIE['user_id']))
	{
		$user_id = $_COOKIE['user_id'];
		$conn = mysqli_connect("localhost","root","","ecommers");
		$fetchProduct = "SELECT * FROM orders where user_id=$user_id";
		$result = mysqli_query($conn,$fetchProduct);
		if(mysqli_num_rows($result)===0)
		{
			echo "<h1>cart is empty</h1>";
		}
		else
		{	echo "<h1>Your Order</h1>";
			while($orders = $result->fetch_assoc())
			{
				$image = "SELECT * FROM product_image where p_id=$orders[p_id]";
				$prod_image = mysqli_query($conn,$image);
				$img = $prod_image->fetch_assoc();

				$product = "SELECT * FROM product where p_id=$orders[p_id]";
				$pr = mysqli_query($conn,$product);
				$prod = $pr->fetch_assoc();
				echo "<div id='cartproduct'><div>";
				echo "<img height='100px' width='140px' src='../../image/$img[image1]'>";
				echo "</div><div>";
				echo $prod['p_name']."<br>";
				echo $prod['p_sales_price']."<br>";
				echo $prod['p_desc']."<br><br><br>";
				echo "<button onclick='cartdelete($orders[p_id])'>Cancel</button>";
				echo "<br>";
				echo "</div></div>";
			}
		}

	}
	else 
	{
		header("Refresh:0;url=login.php");
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  	
	<title></title>
	<style>
	body
	{
		margin-top: 50px;
	} 
	#cartproduct 
	{
		display: flex;
		grid-template-columns: 200px auto;
		margin-left: 400px;
		height: 200px;
		width: 800px;
		margin-top: 20px;
	}

	#myform {
	    text-align: center;
	    padding: 5px;
	    border: 1px dotted #ccc;
	    margin: 2%;
		}
		.qty {
		    width: 40px;
		    height: 25px;
		    text-align: center;
		}
		input.qtyplus { width:25px; height:25px;}
		input.qtyminus { width:25px; height:25px;}

	button 
	{
		background-color: lightgray;
		margin-left: 50px;
		height: 20px;
		width: 100px;
		font-weight: 600;
	}
	h1
	{
		text-align: center;
		margin-bottom: 50px;
		text-decoration: underline;
	}
	img 
	{
		margin-right: 20px;
	}	
	</style>
</head>
<body>
	<script>
		function update(p_id,sign)
		{ let id="qty"+p_id;
			let qtiy = document.getElementById(id); 
			if(sign===2)
				qtiy.value =  parseInt(qtiy.value)-1;
			else 
				qtiy.value =  parseInt(qtiy.value)+1;
			val = parseInt(qtiy.value);
			$.ajax({
		    	url: 'update_quantity.php',
			    type: "POST",
			    data: {
			        "p_id":p_id,
					"quantity":val
			    },
			    dataType: "json",
			    success: function (data) {
			        console.log(data);
			    },
			    error: function (error) {
			        if(error==401)
			        	alert("Please login then continue");
			    }
			});

		}
		function cartdelete(p_id)
		{ 
			$.ajax({
		    	url: 'cartdelete.php',
			    type: "POST",
			    data: {
			        "p_id":p_id,
			    },
			    dataType: "json",
			    success: function (data) {
			        if(data==301)
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