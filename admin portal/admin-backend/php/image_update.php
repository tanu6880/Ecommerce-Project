<?php
 	if(isset($_POST['update']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");
 		$id = $_GET['id'];
 		$sql = "SELECT * FROM product_image where id=$id";
 		$result = mysqli_query($conn,$sql);
		$row = $result->fetch_assoc();
		
 		$id = $_GET['id'];
		$img1 = $_POST['img1'];
 		$img2 = $_POST['img2'];
 		$img3 = $_POST['img3'];
 		$img4 = $_POST['img4'];
 		$img5 = $_POST['img5'];

 		if($img1=="")
 			$img1=$row['image1'];
 		if($img2=="")
 			$img2=$row['image2'];
 		if($img3=="")
 			$img3=$row['image3'];
 		if($img4=="")
 			$img4=$row['image4'];
 		if($img5=="")
 			$img5=$row['image5'];
 		
 		$sql = "Update product_image set image1='$img1',image2='$img2',image3='$img3',image4='$img4',image5='$img5' where id=$id";
 		echo $sql;
 		if($conn->query($sql))
		{
			header("Refresh:0 ; url=product_image_show.php"); 
			$conn->close(); 
		}
		else
		{
			header("Refresh:0 ; url=image_update.php?id=$_GET[id]"); 
		}
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
  <style type="text/css">
  	#addimage
  	{
  		height: 600px;
  		width: 55%;
  		margin-left: 400px;
  		margin-top: 40px;
  	}
  	#addimage h1
  	{
  		text-align: center;		
   	}
   	#addimage input
   	{
   		margin-bottom: 10px;
   	}
   	#addimage input[type=submit]
   	{
   		margin-left: 250px;
   		height: 30px;
   		width: 40%;
   	}
  </style>
	<title></title>
</head>
<body>
<div id="addimage">
		<h1 classs="uplabel">Add image</h1>
		<form action="image_update.php?id=<?php echo $_GET['id']?>" method="post">
			<label classs="uplabel">image1:</label>
			<input class="form-control" type="file" name="img1" >
			<label classs="uplabel">image2:</label>
			<input class="form-control" type="file" name="img2" >
			<label classs="uplabel">image3:</label>
			<input class="form-control" type="file" name="img3" >
			<label classs="uplabel">image4:</label>
			<input class="form-control" type="file" name="img4" >
			<label classs="uplabel">image5:</label>
			<input class="form-control" type="file" name="img5" >
			
			<input type="submit" name="update"class='btn btn-primary'>
		</form>
	</div>
</body>
</html>
