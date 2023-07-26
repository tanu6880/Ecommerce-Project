<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../Admin-front-end/css/dashboard.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<title>admin</title>
</head>
<body>
	<ul id="admin_nav_ul">
	<?php 
		if(isset($_COOKIE['username']))
		{
			echo "<li class='admin_nav_li' ><a class='active' href='#home'>Welcome Back ".$_COOKIE['username']."</a></li>";
		}
		else
		{
			header("Refresh:0 ;url=index.php");
		}
	 ?>
	<li class="admin_nav_li" ><a href="user_show.php"><i class="fa fa-user" aria-hidden="true"></i> User</a></li>
  <li class="admin_nav_li" ><a href="usermanage.php"><i class="fa fa-user" aria-hidden="true"></i> User Details</a></li>

  <li class="admin_nav_li" ><a href="cat_add_form.php"><i class="fa fa-user" aria-hidden="true"></i> category</a></li>
  <li class="admin_nav_li" ><a href="product.php"><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Product </a></li>
  <li class="admin_nav_li" ><a href="address_user.php">
  <img src=""><i class="fa fa-list-ul" aria-hidden="true"></i> Address</a></li>
  <li class="admin_nav_li" ><a href="product_image_show.php"><i class="fa fa-first-order" aria-hidden="true"></i> product image</a></li>
  <li class="admin_nav_li" ><a href="order_show.php"><i class="fa fa-info-circle" aria-hidden="true"></i> Order</a></li>
  <li class="admin_nav_li" ><a href="product_image_show.php"><i class="fa fa-first-order" aria-hidden="true"></i> Order-Details</a></li>
  
</ul>

</body>
</html>