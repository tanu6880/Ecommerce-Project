<?php
	include("dashboard.php");
	include("product_navbar.php");
	$conn = mysqli_connect("localhost","root","","ecommers");
	$sql = "SELECT * from `category_main`";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)===0)
	{
		echo "the table is empty";
	}
	else
	{
		echo " <h1>Category table</h1>
			<table id='cat_table'>
			  <tr>
			  <th>category_id</th>
			  <th>category_name</th>
			  <th>category_price</th>
			  <th>category_desc</th>
			  <th>category_imgae</th>
			  </tr>
			  <tr>";
			while($row = $result->fetch_assoc())
			{
				echo "<tr>
					<td>$row[c_id]</td>
					<td>$row[c_name]</td>
					<td>$row[c_price]</td>
					<td>$row[c_desc]</td>
					<td>$row[c_image]</td>
					<td><button onclick=proconfirmbox($row[c_id]) type='button' class='btn btn-primary'><i class='fa-solid fa-cart-plus'></i></button></td>
					<td><button onclick=proshowbox($row[c_id]) type='button' class='btn btn-primary'><i class='fa-solid fa-display'></i></button></td>			
							
					</tr>";
			}
			echo "</table>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" type="text/css" href="../../Admin-front-end/css/category_show.css">
	<title></title>
</head>
<body>
<script type="text/javascript">
	function proconfirmbox(id)
		{
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "product_add.php?id="+id;	
			}
			else
			{
				window.location.href = "product.php";	
			}
		}
		function proshowbox(id)
		{
			window.location.href = "product_show_catwise.php?id="+id;	
		}
</script>
</body>
</html>