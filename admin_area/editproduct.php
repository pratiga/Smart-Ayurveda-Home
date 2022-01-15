<?php 
// include("layout/header.php");
include('includes/db.php');
if (isset($_GET['edit_id']))
   {
   	$pro_id = $_GET['edit_id'];
   	$edit_pro = "select * from products where product_id='$pro_id'";
   	$run_pro = mysqli_query($con,$edit_pro);
   	$row_pro = mysqli_fetch_array($run_pro);
   	$product_id = $row_pro['product_id'];
   	$product_name = $row_pro['product_name'];
   	$price = $row_pro['product_price'];
   	$product_desc = $row_pro['product_desc'];
   	$image = $row_pro['product_img'];
   	$product_keyword = $row_pro['product_keyword'];

   }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<h2 style="text-align: center;">Edit Product</h2><br>
	
	<form method="POST" enctype="">

		
		<b>Name</b>
			<input type="text" name="name" value="<?php echo $product_name; ?>">
		<br>
		<b>image</b>
		
			<input type="file" name="image" value="<?php echo $image; ?>">
		<br>
		<b>Price</b>
		
			<input type="number" name="price" value="<?php echo $price; ?>">
		<br>
		<b>Product_desc</b>
		
			<input type="text" name="desc" value="<?php echo $product_desc; ?>">
		<br>
		
		 <b>Product_keyword</b>
			<input type="text" name="keyword" value="<?php echo $product_keyword;  ?>">
		<br>

		
			<button type="submit" name="update_product">Edit Product</button>
			<a href="listproduct.php" class="btn btn-primary">Back</a>
		</div>
	</form>


</body>
</html>
<?php 
    	
    if(isset($_POST['update_product']))
    {
    	
    	$pro_name = $_POST['name'];
    	$pro_desc = $_POST['desc'];
    	$pro_price = $_POST['price'];
    	$pro_keyword= $_POST['keyword'];
    	$pro_image = $_POST['image'];
    	$update_pro = "UPDATE `products` SET `product_name`='$pro_name',`product_desc`='$pro_desc',`product_price`='$pro_price',`product_img`='$pro_image',`product_keyword`='$pro_keyword' WHERE product_id='$product_id '";  
    	$run_pro = mysqli_query($con,$update_pro);
    	if($run_pro)
    	{
    		echo " update is done sucessfully";
    		header('location:listproduct.php');
      }
  
    	else
    	{
    		echo "<script> alert'update is not done sucessfully' </script>";
    		//echo "<script>window.open('index.php?view_cat','_self')</script>";
    	}
   }
 ?>