<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title></title>
	<style type="text/css">
		#address_list
		{
			margin-left: 250px;
			margin-top: 10px;
		}
		h1
		{
			text-align: center;
		}
		#add_box
		{
			border: 1px solid gray;
			height: 50px;
			width: 1000px;
			padding-top: 10px;
			padding-left: 30px;
			margin-bottom: 0px;
			margin-left: 290px;
			margin-top: 20px;
		}
		address
		{
			font-size: 1.2em;
			font-weight: 500;
			padding-top: 10px;
			padding-left: 30px;
			margin-bottom: 0px;
			height: 100px;
			width: 95%;
		}
		li
		{
			list-style: none;
			border-collapse: collapse;
			border: 1px solid gray;
			height: 100px;
			width: 1000px;
		}
		#add_box a 
		{
			font-size: 1.4em;
			font-weight: 500;
		}
		#add_box a:hover
		{
			text-decoration: none;
		}
		li div 
		{
			display: flex;
			flex-direction: row;
		}
		#idit
		{
			margin-top: 10px;
			position: relative;
  			display: inline-block;
  			height: 100px;
  			width: 50px;
  			padding-left: 30px;
		}
		.content
		{
			display: none;
  			position: absolute;
  			background-color: #f1f1f1;
  			min-width: 160px;
  			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  			z-index: 1;
		}
		.content a
		{
			color: black;
			  padding: 4px 0px;
			  text-decoration: none;
			  display: block;
			  text-align: center;
		}
		#idit:hover .content {display: block;}
		.content a:hover {background-color: #ddd;}
		</style>
</head>
<body>
	<?php 
	
	$conn = mysqli_connect("localhost","root","","ecommers");
	$user_personal_id = $_GET['id'];
	$sql = "SELECT * FROM address where user_personal_id=$user_personal_id";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)===0)
	{
		echo "<h1>please add address</h1>";
	}
	else
	{
		echo "<h1>Manage Address</h1>";
		echo "<div id='add_box'><a href='address_add.php?id=$_GET[id]'>+ add new address</a></div>";
		echo "<div id='address_list'><ol>";
		while($row = $result->fetch_assoc())
		{
			echo "<li>
			<div>
				<address>$row[street1], $row[street2], $row[city], $row[pin], $row[district]<br>
						$row[state], $row[country]<br>
				</address>
				<div id='idit'><i class='fa fa-ellipsis-v' aria-hidden='true'></i>
					<div class='content'>
						<a href='address_edit.php?id=$row[a_id]&user_id=$row[user_personal_id]'><i class='fas fa-edit'></i> Edit</a>
						<a href='address_delete.php?id=$row[a_id]&user_id=$row[user_personal_id]''><i class='fa fa-trash' aria-hidden='true'></i> delete</a>
					</div>
				</div>
			</div>
			</li>";
		}
		echo "</ol></div>";
	}
?>
</body>
</html>
