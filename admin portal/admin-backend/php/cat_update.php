<?php
 	if(isset($_POST['submit']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");
		$c_name = $_POST['c_name'];
 		$c_price = $_POST['c_price'];
 		$c_desc = $_POST['c_desc'];
 		$c_img = $_POST['c_img'];
 		$sql = "Update category_main set c_name='$c_name',c_price=$c_price,c_desc='$c_desc',c_image='$c_img' where c_id=$_GET[c_id]";
 		echo $sql;
 		if($conn->query($sql))
		{
			header("Refresh:0 ; url=cat_show.php"); 
			$conn->close(); 
		}
		else
		{
			header("Refresh:0 ; url=cat_show.php"); 
		}
 	} 
 	if(isset($_GET['id']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");

 		$sql = "SELECT * FROM category_main where c_id=".$_GET['id'];
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
		
		#cat_updateform
		{
			border: 1px solid black;
			margin-left: 560px;
			margin-top: 100px;
			height: 360px;
			width: 400px;
			padding-left: 7px;
			padding-right: 7px;
			font-weight: 500;
		}
		input[type=submit]
		{
			margin-left: 150px;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div>
		<form class="form-group" id="cat_updateform" action="cat_update.php?c_id=<?php echo$row['c_id'] ?>" method="post">
			<label classs="uplabel">category Name</label>
			<input class="form-control" type="text" name="c_name" value="<?php echo $row['c_name'] ?>">
			<label classs="uplabel">category price</label>
			<input class="form-control" type="number" name="c_price" value="<?php echo $row['c_price'] ?>">
			<label classs="uplabel">category desccription</label>
			<textarea class="form-control"  name="c_desc" value="<?php echo $row['c_desc'] ?>"></textarea>
			<label classs="uplabel">categry Image</label>
			<input class="form-control" type="file" name="c_img" value="<?php echo $row['c_image'] ?>">
			<input class='btn btn-primary' type="submit" name="submit">
		</form>
	</div>
</body>
</html>