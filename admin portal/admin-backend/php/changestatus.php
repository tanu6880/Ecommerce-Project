<?php

	if(isset($_POST['submit']))
 	{
		$conn = mysqli_connect("localhost","root","", "ecommers");
	 	$order_id = $_GET['order_id'];
	 	$status = $_POST['status'];
	 	$query = "update order_details set status = '$status' where order_id=$order_id";
		if( mysqli_query($conn,$query))
	    {
	      $query1 = "update orders set status = '$status' where order_id=$order_id";
	      echo $query1;
	    	if( mysqli_query($conn,$query1))
	    	{
	    		header("Refresh:0;url=order_show.php");
	    	}
	    }
	    else
	    {
	    	header("Refresh:0;url=order_show.php");
	    }
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		select 
		{
			height: 30px;
			width: 300px;
		}
		form 
		{
			border: 1px black solid;
			width: fit-content;
			padding: 50px;
			margin-top: 10%;
			margin-left: 35%;
			background: violet;
		}
		#button 
		{
			height: 30px;
			width: 100px;
			margin-top: 10px;
			margin-left: 30%;
			background: black;
			color: white;
			font-size: 1.1em;
		}
		h1 
		{
			text-align: center;
			color: black;
		}
	</style>
</head>
<body>
	<form method="post" action="changestatus.php?order_id=<?php echo $_GET['order_id']?>">
		<h1> Status Update </h1>
		<select name="status">  
	        <option value = "placed order" selected> Select option </option>  
	        <option value = "placed order" > placed order </option>  
	        <option value = "shiped" > shiped </option>  
	        <option value = "delivered" > delivered </option>    
        </select>  
        <br>
		<input id='button' type="submit" value="Submit" name="submit">

	</form>
</body>
</html>