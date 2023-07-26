<?php 
	if(isset($_GET['id']) && isset($_POST['product_submit']))
		{
			$c_id = $_GET['id'];
			$p_name = $_POST['pro_name'];
			$p_purchase_price=$_POST['pro_purpase_price'];
			$p_sales_price = $_POST['pro_sal_price'];
			$p_desc = $_POST['pro_desc'];
			$conn = mysqli_connect("localhost","root","","ecommers");
			$sql = "Insert into product (p_name,p_purchase_price,p_sales_price,c_id,p_desc) values('$p_name',$p_purchase_price,$p_sales_price,$c_id,'$p_desc')";
			echo $sql;
			if(mysqli_query($conn,$sql))
			{
				header("Refresh:0;url=product.php");
			}
			else
			{
				header("Refresh:0;url=product_add.php");
			}
		}
 ?>