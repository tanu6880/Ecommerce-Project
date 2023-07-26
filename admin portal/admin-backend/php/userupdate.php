<?php
 	if(isset($_POST['submit']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");
		$firstname = $_POST['firstname'];
 		$lastname = $_POST['lastname'];
 		$dob = $_POST['dob'];
 		$gender = $_POST['gender'];
 		$image = $_POST['image'];
 		$sql = "Update user_personal_details set user_firstname='$firstname',user_lastname='$lastname',user_dob='$dob',gender='$gender',user_image='$image' where user_id=$_GET[userid]";
 		echo $sql;
 		if($conn->query($sql))
		{
			header("Refresh:0 ; url=usermanage.php"); 
			$conn->close(); 
		}
		else
		{
			header("Refresh:0 ; url=usermanage.php"); 
		}
 	} 
 	if(isset($_GET['user_id']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");

 		$sql = "SELECT * FROM user_personal_details where user_id=".$_GET['user_id'];
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
		
		#updateform
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
		<form class="form-group" id="updateform" action="userupdate.php?userid=<?php echo$row['user_id'] ?>" method="post">
			<label classs="uplabel">First name</label>
			<input class="form-control" type="text" name="firstname" value="<?php echo $row['user_firstname'] ?>">
			<label classs="uplabel">Last name</label>
			<input class="form-control" type="text" name="lastname" value="<?php echo $row['user_lastname'] ?>">
			<label classs="uplabel">Dob</label>
			<input class="form-control" type="date" name="dob" value="<?php echo $row['user_dob'] ?>">
			<label classs="uplabel">Gender</label>
			<input class="form-control" type="text" name="gender" value="<?php echo $row['gender'] ?>">
			<label classs="uplabel">Image</label>
			<input class="form-control" type="file" name="image" value="<?php echo $row['user_firstname'] ?>">
			<input class='btn btn-primary' type="submit" name="submit">
		</form>
	</div>
</body>
</html>