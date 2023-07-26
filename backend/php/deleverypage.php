<?php

	if(isset($_COOKIE['user_id']))
	{
		$a_id = $_POST['a_id'];
		$p_id = $_GET['p_id'];
		if(empty($a_id))
		{
			header("Refresh:0;url=buypage.php?p_id=$_GET[p_id]");
		}
		else	
		{
			include("payment_gatway.php");
		}
	}
	else
	{
		header("Refresh:0;url=login.php");
	}

?>