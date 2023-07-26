<?php 

	if(isset($_POST['submit']))
	{
		$a_id = $_GET['a_id'];
		$st1 = $_POST['street1'];
		$st2 = $_POST['street2'];
		$city = $_POST['city'];
		$pin = $_POST['pin'];
		$district = $_POST['district'];
		$state = $_POST['state'];
		$country = $_POST['country'];

		$conn = mysqli_connect("localhost","root","","ecommers");
		$sql = "Update address set street1='$st1',street2='$st2',city='$city',pin='$pin',district='$district',state='$state',country='$country' where a_id=$_GET[a_id]";
		if(mysqli_query($conn,$sql))
		{
			header("Refresh:0;url=address.php?id=$_GET[user_id]");
		}
		else
		{
			header("Refresh:0;url=address.php?id=$_GET[user_id]");
		}
	}
	if(isset($_GET['id']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");

 		$sql = "SELECT * FROM address where a_id=".$_GET['id'];
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
  <style type="text/css">
  	#address_add_form
  	{
  		height: 600px;
  		width: 55%;
  		margin-left: 400px;
  		margin-top: 40px;
  	}
  	#address_add_form h1
  	{
  		text-align: center;		
   	}
   	#address_add_form input
   	{
   		margin-bottom: 10px;
   	}
   	#address_add_form input[type=submit]
   	{
   		margin-left: 250px;
   		height: 30px;
   		width: 40%;
   	}
  </style>
	<title></title>
</head>
<body>
<div id="address_add_form">
		<h1 classs="uplabel">Add address</h1>
		<form action="address_edit.php?a_id=<?php echo $_GET['id']?>&user_id=<?php echo $_GET['user_id']?>" method="post">
			<label classs="uplabel">Street1 :</label>
			<input class="form-control" type="text" name="street1" value="<?php echo $row['street1'] ?>">
			<label classs="uplabel">street2 :</label>
			<input class="form-control" type="text" name="street2" value="<?php echo $row['street2'] ?>">
			<label classs="uplabel">city :</label>
			<input class="form-control" type="text" name="city" value="<?php echo $row['city'] ?>">
			<label classs="uplabel">pin :</label>
			<input class="form-control" type="number" name="pin" value="<?php echo $row['pin'] ?>">
			<label classs="uplabel">district : </label>
			<input class="form-control" type="text" name="district" value="<?php echo $row['district'] ?>">
			<label classs="uplabel">state :</label>
			<input class="form-control" type="text" name="state" value="<?php echo $row['state'] ?>">
			<label classs="uplabel">country :</label>
			<input class="form-control" type="text" name="country" value="<?php echo $row['country'] ?>">
			<input type="submit" name="submit"class='btn btn-primary'>
		</form>
	</div>
</body>
</html>