<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
	<style type="text/css">
  	#image_table,h1
  	{
  		margin-left: 250px;
  	}
  	h1
  	{
  		margin-left: 680px;
  		margin-bottom: 50px;
  	}
  	.img_div img
  	{
  		height: 150px;
  		width: 180px;
  	}
  	#image_table th
  	{
  		text-align: center;
  	}
  	#image_table td
  	{
  		text-align: center;
  	}
  </style>
	<title></title>
</head>
<body>
<script type="text/javascript">
	function updateimage(id)
	{
		if(confirm("Press a button!Either OK or Cancel.")==true)
		{
			window.location.href = "image_update.php?id="+id;	
		}
		else
		{
			window.location.href = "addimage_catwise.php";	
		}
	}
	function deleteimage(id)
	{
		if(confirm("Press a button!Either OK or Cancel.")==true)
		{
			window.location.href = "image_delete.php?id="+id;	
		}
		else
		{
			window.location.href = "addimage_catwise.php";	
		}
	}
</script>
</body>
</html>

<?php 
	include("dashboard.php");
	include("product_navbar.php"); 
	$conn = mysqli_connect("localhost","root","","ecommers");
	$sql = "SELECT * FROM product_image";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)===0)
	{
		echo "the table is empty";
	}
	else
	{
		echo " <h1>all product image</h1>
			<table id='image_table'>
			  <tr>
			  <th style='width:100px;'>id</th>
			  <th style='width:100px;'>p_id</th>
			  <th>image1</th>
			  <th>image2</th>
			  <th>image3</th>
			  <th>image4</th>
			  <th>image5</th>
			  </tr>
			  <tr>";
			while($row = $result->fetch_assoc())
			{
				echo "<tr>
					<td>$row[id]</td>
					<td>$row[p_id]</td>
					<td><div class='img_div'>
							<img src='../../../image/$row[image1]'></div></td>
					<td><div class='img_div'>
							<img src='../../../image/$row[image2]'></div></td>
					<td><div class='img_div'>
							<img src='../../../image/$row[image3]'></div></td>
					<td><div class='img_div'>
							<img src='../../../image/$row[image4]'></div></td>
					<td><div class='img_div'>
							<img src='../../../image/$row[image5]'></div></td>
					<td><button onclick=updateimage($row[id]) type='button' class='btn btn-primary'><i class='fas fa-edit'></i></button></td>
					<td><button onclick=deleteimage($row[id]) type='button' class='btn btn-primary'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
			
					</tr>";
			}
			echo "</table>";
	}
?>
