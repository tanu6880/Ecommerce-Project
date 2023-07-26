<?php
 	if(isset($_POST['add']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");
 		$p_id = $_GET['p_id'];
		$img1 = $_POST['img1'];
 		$img2 = $_POST['img2'];
 		$img3 = $_POST['img3'];
 		$img4 = $_POST['img4'];
 		$img5 = $_POST['img5'];
 		$sql = "Insert into product_image (p_id,image1,image2,image3,image4,image5) values('$p_id','$img1','$img2','$img3','$img4','$img5')";
 		if($conn->query($sql))
		{
			header("Refresh:0 ; url=product_show_catwise.php?id=$_GET[c_id]"); 
			$conn->close(); 
		}
		else
		{
			header("Refresh:0 ; url=addimage_catwise.php?id=$_GET[id]"); 
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
		<form action="addimage_catwise.php?p_id=<?php echo $_GET['p_id']?>&c_id='<?php echo $_GET['c_id']?>'" method="post">
			<label classs="uplabel">image1:</label>
			<input class="form-control" type="file" name="img1">
			<label classs="uplabel">image2:</label>
			<input class="form-control" type="file" name="img2">
			<label classs="uplabel">image3:</label>
			<input class="form-control" type="file" name="img3">
			<label classs="uplabel">image4:</label>
			<input class="form-control" type="file" name="img4">
			<label classs="uplabel">image5:</label>
			<input class="form-control" type="file" name="img5">
			
			<input type="submit" name="add"class='btn btn-primary'>
		</form>
	</div>
</body>
</html>
