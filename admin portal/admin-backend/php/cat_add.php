<?php
	
	if(isset($_POST['cat_submit']))
	{
		$cat_name = $_POST['cat_name'];
		$cat_price = $_POST['cat_price'];
		$cat_desc = $_POST['cat_desc'];
		$cat_image = $_POST['cat_img'];

		$conn = mysqli_connect("localhost","root","","ecommers");
		$sql = "Insert into category_main (c_name,c_price,c_desc,c_image) values('$cat_name',$cat_price,'$cat_desc','$cat_image')";
		if($conn->query($sql))
		{
			header("Refresh:0 ; url=cat_add_form.php"); 
			$conn->close(); 
		}
		else
		{
			header("Refresh:0 ; url=cat_add_form.php"); 
		}
	} 
?>