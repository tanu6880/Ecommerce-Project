<?php
 	if(isset($_POST['submit']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");
		$p_name = $_POST['p_name'];
 		$p_purchase_price = $_POST['p_purchase_price'];
 		$p_sales_price = $_POST['p_sales_price'];
 		$p_desc = $_POST['p_desc'];
 		$sql = "Update product set p_name='$p_name',p_purchase_price=$p_purchase_price,p_purchase_price=$p_purchase_price,p_desc='$p_desc' where p_id=$_GET[p_id]";
 		if($conn->query($sql))
		{
			header("Refresh:0 ; url=product_allshow.php"); 
			$conn->close(); 
		}
		else
		{
			header("Refresh:0 ; url=product_allshow.php?id=$_GET[id]"); 
		}
 	} 
 	if(isset($_GET['id']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");

 		$sql = "SELECT * FROM product where p_id=".$_GET['id'];
		$result = mysqli_query($conn,$sql);
		$row = $result->fetch_assoc();
		$conn->close();
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

	<title>update page</title>
	<style type="text/css">
		
		#pro_updateform
		{
			margin-left: 460px;
			margin-top: 100px;
			height: 360px;
			width: 700px;
			padding-left: 7px;
			padding-right: 7px;
			font-weight: 500;
		}
		input[type=submit]
		{
			margin-left: 320px;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div>
		<form class="form-group" id="pro_updateform" action="product_allupdate.php?p_id=<?php echo$row['p_id']?>" method="post">
			<label classs="uplabel">product Name</label>
			<input class="form-control" type="text" name="p_name" value="<?php echo $row['p_name'] ?>">
			<label classs="uplabel">product purchase price</label>
			<input class="form-control" type="number" name="p_purchase_price" value="<?php echo $row['p_purchase_price'] ?>">
			<label classs="uplabel">product sales price</label>
			<input class="form-control" type="number" name="p_sales_price" value="<?php echo $row['p_sales_price'] ?>">
			<label classs="uplabel">product desccription</label>
			<textarea class="form-control"  name="p_desc" value="<?php echo $row['p_desc'] ?>"></textarea>
			<input class='btn btn-primary' type="submit" name="submit">
		</form>
	</div>
</body>
</html>