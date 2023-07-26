<?php	

	$conn = mysqli_connect("localhost","root","","ecommers");
	$sql = "SELECT * from `category_main`";
	$result = mysqli_query($conn,$sql);
	echo "<ul id='admin_nav_ul'>";
	while($row = $result->fetch_assoc())
	{
		echo "<li class='admin_nav_li' >
				<a href='electronics_list.php?c_id=$row[c_id]'>
					<i class='fa-solid fa-mountain'></i> $row[c_name]
				</a>
			</li>";

	}
	echo "</ul>";			

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../front-end/css/categories_nav_list.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<title>admin</title>
	<style type="text/css">
	</style>
</head>
<body>
</body>
</html>