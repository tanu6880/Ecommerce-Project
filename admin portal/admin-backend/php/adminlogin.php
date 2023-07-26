<?php 
	if(isset($_POST['submit']))
	{
		$uname = $_POST['admin_username'];
		$pass = $_POST['admin_Password'];
		$conn  = mysqli_connect("localhost","root","","ecommers");
		if($conn->connect_error)
		{
			die("connection faild: ".$conn->connect_error);
		} 
		$sql = "SELECT * from admin WHERE((username='$uname' or mobile ='$uname' or email = '$uname' ) and  password='$pass')";
		$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)===1) {
				$row = mysqli_fetch_assoc($result);
            	if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
					{
						header("Refresh:0.5; url=dashboard.php?username=$row[username]");
					}
					else
					{
						setcookie("username",$uname,time()+3600);
						setcookie("password",$pass,time()+3600);
						header("Refresh:0.3 ; url=dashboard.php?username=$row[username]");

					}
			}
			else
			{
				header("Refresh:0.3 ; url=admin_login.php?error=error=Incorrect user name or password");
			}

	}
	else
	{ 
		   header("Location: index.php?error=Incorrect user name or password");
		   exit();
	}
	
?>