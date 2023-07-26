<?php 
	if(isset($_COOKIE['admin_username']) && isset($_COOKIE['admin_password']))
	{
		setcookie("admin_username","",time()-1);
		setcookie("admin_password","",time()-1);
		header("Refresh:0.2;url=index.php");
	}
	else
	{
		header("Refresh:0.2;url=index.php");
	}
 ?>