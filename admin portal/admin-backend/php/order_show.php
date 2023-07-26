<?php 
	include("dashboard.php") ;
	include("category-top-nav.php");
	$conn = mysqli_connect("localhost","root","","ecommers");
	$sql = "SELECT * from `orders`";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)===0)
	{
		echo "the table is empty";
	}
	else
	{
		echo " <h1>Order table</h1>
			<table id='cat_table'>
			  <tr>
			  <th>User Id</th>
			  <th>Order Id</th>
			  <th>Product Id</th>
			  <th>category_Id</th>
			  <th>Adress Id</th>
			  <th>Product Quantity</th>
			  <th>Total Amount</th>
			  <th>Date And Time</th>
			  <th>Status</th>
			  </tr>
			  <tr>";
			while($row = $result->fetch_assoc())
			{
				echo "<tr>
					<td>$row[user_id]</td>
					<td>$row[order_id]</td>
					<td>$row[p_id]</td>
					<td>$row[c_id]</td>
					<td>$row[a_id]</td>
					<td>$row[product_quantity]</td>
					<td>$row[totalprice]</td>
					<td>$row[created_at]</td>
					<td>$row[status]</td>
					<td><button onclick=editstatus($row[order_id]) type='button' class='btn btn-primary'><i class='fas fa-edit'></i> Status</button></td>
			
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
	<title>category show</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" type="text/css" href="../../Admin-front-end/css/category_show.css">
</head>
<body>
	<script type="text/javascript">
		function editstatus(id)
		{
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "changestatus.php?order_id="+id;	
			}
			else
			{
				window.location.href = "order_show.php";	
			}
		}
	</script>
</body>
</html>