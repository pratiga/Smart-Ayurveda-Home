<?php include("layout/header.php"); ?>

<div class="row">
    <div class="col-sm-12 col-md-3"></div>
    <div class="col-sm-12 col-md-6">
        <h1 align="center">ADD CATEGORY</h1><br><br>
        <form method="post"> 
             <input type="text" name="category" required class="form-control" placeholder="Enter Category Name" style="border:1px solid black; border-radius: 15px;"><br><br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary" style="border:1px solid blue; border-radius: 10px;">
        </form>

    </div>
    <div class="col-sm-12 col-md-3"></div>
</div>
    <center>
	<div class="cat">

</div>
</center>
</body>
</html>
<?php

    require_once ("includes/db.php");
    if(isset($_POST['submit']))
    {
    	$category_title=$_POST['category'];
    	$insert_cat="insert into category (cat_title) values ('$category_title')";

    	$run_cat = mysqli_query($con,$insert_cat);

    	if($run_cat)
    		{
    			echo"<script> alert ('category is insert sucessfully')</script>";
    		}
    		else
    		{
    			echo "Error: could not ableto execute $insert_cat.".mysqli_error($con);
    		}

    		mysqli_close($con);


    		
    }


 ?>