<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin_page</title>
	<style type="text/css">
		#admin_page
		{
			position: relative;
			height: 95vh;
			width: 99vw;
			border: 2px solid black;
			background-image: url("https://i.pinimg.com/originals/ab/4d/24/ab4d2413c366181ff128199f039bd7b1.jpg");
			display: flex;
		}
		.admin_a  
		{
			color: white;
			text-decoration: none;
			font-weight: 800;
			font-size: 1.4em;
			margin-left: 40px;
		}
		.admin
		{
			height: 50px;
			width: 150px;
			background-color: darkgreen;
			margin-left: 40px;
			margin-top: 20px;
			padding-top: 20px;
		}
		#buton
		{
			margin: 300px 500px;
			display: flex;
		}
		.admin:hover
		{
			background-color: black;
			color: black;
		}
	</style>
</head>
<body>
	<div id="admin_page">
		<div id="buton">
			<div class="admin">
			<a class = "admin_a" href="admin_login.php">Sign-in</a>
			</div>
			<div class="admin">
			<a class = "admin_a" href="admin_logout.php">logout</a>
			</div>
		</div>
	</div>
</body>
</html>