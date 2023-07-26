<?php 

	if(isset($_POST['submit']))
	{
		$user_personal_id = $_GET['id'];
		$st1 = $_POST['street1'];
		$st2 = $_POST['street2'];
		$city = $_POST['city'];
		$pin = $_POST['pin'];
		$district = $_POST['district'];
		$state = $_POST['state'];
		$country = $_POST['country'];

		$conn = mysqli_connect("localhost","root","","ecommers");
		$sql = "Insert into address (street1,street2,city,pin,district,state,country,user_personal_id) values ('$st1','$st2','$city','$pin','$district','$state','$country','$user_personal_id')";
		if(mysqli_query($conn,$sql))
		{
			header("Refresh:0;url=address.php?id=$user_personal_id");
		}
		else
		{
			header("Refresh:0;url=address_add.php");
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
		<form action="address_add.php?id=<?php echo $_GET['id']?>" method="post">
			<label classs="uplabel">Street1 :</label>
			<input class="form-control" type="text" name="street1">
			<label classs="uplabel">street2 :</label>
			<input class="form-control" type="text" name="street2">
			<label classs="uplabel">city :</label>
			<input class="form-control" type="text" name="city">
			<label classs="uplabel">pin :</label>
			<input class="form-control" type="number" name="pin">
			<label classs="uplabel">district : </label>
			<input class="form-control" type="text" name="district">
			<label classs="uplabel">state :</label>
			<input class="form-control" type="text" name="state">
			<label classs="uplabel">country :</label>
			<input class="form-control" type="text" name="country">
			<input type="submit" name="submit"class='btn btn-primary'>
		</form>
	</div>
</body>
</html>