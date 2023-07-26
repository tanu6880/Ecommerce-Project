<?php
	if(isset($_POST['submit']))
	{
		if(isset($_POST['username']) && isset($_POST['password']))
		{
	
			// function validate($data)
			// {
			// 	$data = trim($data);
			// 	$data = stripcslashes($data);
			// 	$data = htmlspecialchars($data);
			// 	return $data;

			// }
			// $Uname = validate($_POST['username']);
			// $password = validate($_POST['password']);
			$Uname = $_POST['username'];
			$password = $_POST['password'];
			$conn = mysqli_connect("localhost","root","", "ecommers");
			if($conn->connect_error)
			{
				die("connection faild: ".$conn->connect_error);
			} 
			$sql = "SELECT * FROM users WHERE ((user_email='$Uname' or user_mobile ='$Uname') and  user_password='$password')";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)===1) {
				$row = mysqli_fetch_assoc($result);
            	if (($row['user_email']=== $Uname || $row['user_mobile']=== $Uname) && $row['user_password']===$password ) {
			        if(isset($_COOKIE['admin_username']) && isset($_COOKIE['admin_password']) && isset($_COOKIE['user_id']))
					{
						header("Refresh:0.5; url=index.php");
					}
					else
					{
						setcookie("admin_username",$Uname,time()+3600);
						setcookie("user_id",$row['user_id'],time()+3600);
						setcookie("admin_password",$password,time()+3600);
						header("Refresh:0 ; url=index.php");

					}

				}
				else
			    { 
			    	header("Location: index.php?error=Incorrect user name or password");
			        exit();

			    }
			}
			else
			{ 
			   	header("Location: index.php?error=Incorrect user name or password");
			    exit();

			}
		}
		else
		{

		}

	}
 ?>