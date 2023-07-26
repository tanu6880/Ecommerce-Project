<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
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
	</style>
</head>
<body>
	<?php 
		$conn = mysqli_connect("localhost","root","","ecommers");
		$fetchProduct = "SELECT * FROM carts where user_id=$user_id";
		$result = mysqli_query($conn,$fetchProduct);
		
	echo"<form id='myform' method='POST' class='quantity' action='#'>
	  <input type='button' value='-' class='qtyminus minus' field='quantity' onclick='minus()' />
	  <input type='text' name='quantity' value='0' id='qty' class='qty' readonly />
	  <input type='button' value='+' class='qtyplus plus' field='quantity' onclick='plus()' />
	</form>";
	?>
	<script>
		let qtiy = document.getElementById("qty");
		function minus()
		{
			const qtyval = qtiy.value - 1;
			console.log(qtyval);
		}
		function plus()
		{
			const qtyval = qtiy.value + 1;
			console.log(qtyval);
		}
	</script>
</body>
</html>