<?php 
// include("layout/header.php");
include('includes/db.php');
if (isset($_GET['edit_admin']))
   {
   	$admin_id = $_GET['edit_admin'];
   	$edit_admin = "select * from admin where admin_id='$admin_id'";
   	$run_admin = mysqli_query($con,$edit_admin);
   	$row_admin = mysqli_fetch_array($run_admin);
   	$admin_id = $row_admin['admin_id'];
   	$admin_name = $row_admin['admin_name'];
   	$admin_email = $row_admin['admin_email'];
   	$admin_pass = $row_admin['admin_pass'];
   	$admin_address = $row_admin['admin_address'];

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

		
		<b>Admin Name</b>
			<input type="text" name="name" value="<?php echo $admin_name; ?>">
		<br>
		<b>Admin Email</b>
      <input type="email" name="email" value="<?php echo $admin_email; ?>">
    <br>
    <b>Admin Password</b>
      <input type="Password" name="password" value="<?php echo $admin_pass; ?>">
    <br><b>Admin Address</b>
      <input type="text" name="address" value="<?php echo $admin_address; ?>">

		
			<button type="submit" name="update_admin">Edit Admin</button>
			<a href="view_admin.php" class="btn btn-primary">Back</a>
		</div>
	</form>


</body>
</html>
<?php 
    	
    if(isset($_POST['update_admin']))
    {
    	
    	$name = $_POST['name'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $address = $_POST['address'];
    	
    	$update_admin ="UPDATE `admin` SET `admin_name`='$name',`admin_email`='$email',`admin_pass`='$password',`admin_address`='$address' WHERE admin_id = '$admin_id' "; 
    	$run_admin = mysqli_query($con,$update_admin);
    	if($run_admin)
    	{
    		echo " update is done sucessfully";
    		header('location:view_admin.php');
      }
  
    	else
    	{
    		echo "<script> alert'update is unsucessfull' </script>";
    		//echo "<script>window.open('index.php?view_cat','_self')</script>";
    	}
   }
 ?>