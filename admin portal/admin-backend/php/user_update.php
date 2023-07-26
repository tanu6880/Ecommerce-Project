<?php
 	if(isset($_POST['upadte']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");
		$user_email = $_POST['user_email'];
 		$user_mobile = $_POST['user_mobile'];
 		$user_password = $_POST['user_password'];
 		$sql = "Update users set user_email='$user_email',user_mobile='$user_mobile',user_password='$user_password' where user_id=$_GET[user_id]";
 		echo $sql;
 		if($conn->query($sql))
		{
			header("Refresh:0 ; url=user_show.php"); 
			$conn->close(); 
		}
		else
		{
			header("Refresh:0 ; url=user_update.php"); 
		}
 	} 
 	if(isset($_GET['id']))
 	{
 		$conn = mysqli_connect("localhost","root","", "ecommers");

 		$sql = "SELECT * FROM users where user_id=".$_GET['id'];
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
		
		#user_update_form
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
		<form class="form-group" id="user_update_form" action="user_update.php?user_id=<?php echo$row['user_id'] ?>" method="post">
			<label classs="uplabel">user_email</label>
			<input class="form-control" type="text" name="user_email" value="<?php echo $row['user_email'] ?>">
			<label classs="uplabel">user_mobile</label>
			<input class="form-control" type="text" name="user_mobile" value="<?php echo $row['user_mobile'] ?>">
			<label classs="uplabel">user_password</label>
			<input class="form-control" type="text" name="user_password" value="<?php echo $row['user_password'] ?>">
			<input class='btn btn-primary' type="submit" name="upadte">
		</form>
	</div>
</body>
</html>