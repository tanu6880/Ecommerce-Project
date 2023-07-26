<?php

if(isset($_COOKIE['user_id']))
{
	$user_id = $_COOKIE['user_id'];
	$p_id = $_GET['p_id'];
	$a_id = $_GET['a_id'];
	$conn = mysqli_connect("localhost","root","","ecommers");
	$category_query="SELECT * FROM product where p_id = p_id";
	$category = mysqli_query($conn,$category_query);
	$cat = $category->fetch_assoc();
	$c_id = $cat['c_id'];
	$productQuary = "SELECT * FROM product where p_id=$p_id";
    $pr_quary = mysqli_query($conn,$productQuary);
    $product = $pr_quary->fetch_assoc();
        
	$quantity_qry = "SELECT * FROM carts where p_id=$p_id";
    $quan_quary = mysqli_query($conn,$quantity_qry);
    $quantity = $quan_quary->fetch_assoc();
    if(mysqli_num_rows($quan_quary)===0)
    {
        $qnty = 1;
        $totalprice = intval($product['p_sales_price'])*1;
    }
    else
    {
          $qnty = $quantity['quantity'];
          $totalprice = intval($product['p_sales_price'])*intval($quantity['quantity']);
    }
    $status = "confirm";

    $query = "Insert into orders (user_id,c_id,p_id,a_id,product_quantity,totalprice,status) values($user_id,$c_id,$p_id,$a_id,$qnty,$totalprice,'$status');";
    if( mysqli_query($conn,$query))
    {
      $order_id = mysqli_insert_id($conn);
      $query_order_details = "Insert into order_details (user_id,order_id,p_id,a_id,product_quantity,amount,status) values($user_id,$order_id,$p_id,$a_id,$qnty,$totalprice,'p');";
      echo $query_order_details;
    	if( mysqli_query($conn,$query_order_details))
    	{
    		header("Refresh:0;url=myorder.php");
    	}
    }
    else
    {
    	header("Refresh:0;url=payment_gatway.php?p_id=$p_id&a_id=$a_id");
    }
           
}

?>