<?php
	include("dashboard.php") ;
	include("category-top-nav.php"); 
	if(isset($_GET['user_personal_id']))
	{
		$user_personal_id = $_GET['user_personal_id'];
		$conn = mysqli_connect("localhost","root","","ecommers");
		$sql = "SELECT * FROM address where user_personal_id = $user_personal_id";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)===0)
		{
			echo "<h1>table is empty</h1>";
		}
		else
		{
			echo " <h1>address table</h1>
			<table id='cat_table'>
			  <tr>
			  <th>a_id</th>
			  <th>user_personal_id</th>
			  <th>street1</th>
			  <th>street2</th>
			  <th>pin</th>
			  <th>district</th>
			  <th>state</th>
			  <th>country</th>
			  </tr>
			  <tr>";
			while($row = $result->fetch_assoc())
			{
				echo "<tr>
					<td>$row[a_id]</td>
					<td>$row[user_personal_id]</td>
					<td>$row[street1]</td>
					<td>$row[street2]</td>
					<td>$row[pin]</td>
					<td>$row[district]</td>
					<td>$row[state]</td>
					<td>$row[country]</td>
					<td><button onclick=addressconfirmi($row[a_id]) type='button' class='btn btn-primary'><i class='fas fa-edit'></i></button></td>
					<td><button onclick=catdel($row[a_id]) type='button' class='btn btn-primary'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
			
					</tr>";
			}
			echo "</table>";
		}
	}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>category show</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
  <link rel="stylesheet" type="text/css" href="../../Admin-front-end/css/category_show.css">
</head>
<body>
	<script type="text/javascript">
		function addressconfirmi(id)
		{
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "adress_update_form.php?a_id="+id;	
			}
			else
			{
				window.location.href = "adress_everyuser.php";	
			}
		}
		function catdel(id)
		{
			if(confirm("Press a button!Either OK or Cancel.")==true)
			{
				window.location.href = "cat_delete.php?id="+id;	
			}
			else
			{
				window.location.href = "cat_show.php";	
			}

		}
	</script>
</body>
</html>