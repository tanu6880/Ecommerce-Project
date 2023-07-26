<?php 

if(isset($_COOKIE['admin_username']) && isset($_COOKIE['admin_password']))
{
	$user_id = $_COOKIE['user_id'];
	$conn = mysqli_connect("localhost","root","","ecommers");
	$userQuary = "SELECT * FROM users where user_id=$user_id";
	$user_r = mysqli_query($conn,$userQuary);
	$user = $user_r->fetch_assoc();
	$per_id = "SELECT * FROM user_personal_details where user_id=$user_id";
	$result1 = mysqli_query($conn,$per_id);
	$getId = $result1->fetch_assoc();
	$user_personal_id = $getId['user_personal_id'];
	$sql = "SELECT * FROM address where user_personal_id=$user_personal_id";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)===0)
	{
		echo "<h1>please add address</h1>";
	}
	else
	{
		echo "<h1>select Address</h1>";
		echo "<div id='add_box'><a href='address_add.php?id=$user_personal_id'>+ add new address</a></div>";
		echo "<div id='address_list'><form id='myform' method='POST' class='quantity' action='deleverypage.php?p_id=$_GET[p_id]'><ol>";
		while($row = $result->fetch_assoc())
		{
			echo "<li><div class='radio'><input type='radio' id='css' name='a_id' value=$row[a_id]>
				</div>
				<div>
					<address><b>$getId[user_firstname] $getId[user_lastname] ..Home.. $user[user_mobile] </b><br>
					$row[street1], $row[street2], $row[city], $row[pin], $row[district]<br>
							$row[state], $row[country]<br>
					</address>
					<div id='idit'><i class='fa fa-ellipsis-v' aria-hidden='true'></i>
						<div class='content'>
							<a href='address_edit.php?id=$row[a_id]&user_id=$row[user_personal_id]'><i class='fas fa-edit'></i> Edit</a>
						</div>
					</div>
				</div></li>";
		}
		echo "<input id='ibutton' type=submit value = 'Delivery Here'>";
		echo "</ol></form></div>";
	}


}
else
{
	header("Refresh:0;url=login.php");
}
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		#address_list,h1
		{
			display: flex;
			flex-direction: row;
			align-content: center;
			justify-content: center;
		}
		#address_list li 
		{
			display: flex;
			flex-direction: row;
			border: 2px solid gray;
			margin: 10px 2px 0px 0Spx;
			padding: 10px 20px 10px 20px;
		}
		.radio
		{
			width: 30px;
			height: 70px;
		}
		li {
			list-style: none;
		}
		#add_box
		{
			border: 2px solid gray;
			height: 50px;
			width: 640px;
			padding-top: 20px;
			padding-left: 30px;
			margin-top: 25px;
			margin-left: 445px;
		}
		#ibutton
		{
			height: 30px;
			width: 250px;
			background: gray;
			color: yellow;
			margin-top: 20px;
			margin-left: 200px;
			font-size: 1.1em;
			font-weight: 600;
		}
	</style>
</head>
<body>

</body>
</html>