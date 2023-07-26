<?php
	include("dashboard.php");
	include("product_navbar.php"); 
	$conn = mysqli_connect("localhost","root","","ecommers");
	$sql = "SELECT * FROM product";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)===0)
	{
		echo "the table is empty";
	}
	else
	{
		echo " <h1>all product </h1>
			<table id='pro_table'>
			  <tr>
			  <th>p_id</th>
			  <th>c_id</th>
			  <th>product_name</th>
			  <th>p_purchase_price</th>
			  <th>p_sales_price</th>
			  <th>p_description</th>
			  </tr>
			  <tr>";
			while($row = $result->fetch_assoc())
			{
				echo "<tr>
					<td>$row[p_id]</td>
					<td>$row[c_id]</td>
					<td>$row[p_name]</td>
					<td>$row[p_purchase_price]</td>
					<td>$row[p_sales_price]</td>
					<td>$row[p_desc]</td>
					<td><button onclick=catconfirmi($row[p_id]) type='button' class='btn btn-primary'><i class='fas fa-edit'></i></button></td>
					<td><button onclick=catdel($row[p_id]) type='button' class='btn btn-primary'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
			
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
	<link rel="stylesheet" type="text/css" href="../../Admin-front-end/css/pruduct_show_catwise.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
	<title></title>
</head>
<body>
<script type="text/javascript">
		function catconfirmi(id)
		{
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "product_allupdate.php?id="+id;	
			}
			else
			{
				window.location.href = "product_allshow.php";	
			}
		}
		function catdel(id)
		{
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "product_alldelete.php?id="+id;	
			}
			else
			{
				window.location.href = "rpduct_allshow.php";	
			}

		}
	</script>

</body>
</html>