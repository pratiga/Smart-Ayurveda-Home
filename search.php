<?php 
  include("includes/db.php");
  include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style/search.css">
</head>
<body>


<div class="container">
  <div class="row">
    
      <?php 
          if(isset($_POST['submit']))
          {
            $user_keyword = $_POST['search'];
            $get_product = "select * from products where product_keyword like'%$user_keyword%' ";
            $run_products =  mysqli_query($con,$get_product);
            while($row_products=mysqli_fetch_array($run_products))
            {
              $pro_id = $row_products['product_id'];
              $pro_title= $row_products['product_name'];
              $pro_desc = $row_products['product_desc'];
              $pro_price = $row_products['product_price'];
              $pro_image = $row_products['product_img'];
              echo"
                 <div class='col-sm-12 col-md-4 content'>
                    <img src='admin_area/product_image/$pro_image' class='img-responsive'><br>
                    $pro_title<br>
                    Rs:$pro_price<br>
                    $pro_desc<br>
                    <b><a href='shopping.php?add_cart=$pro_id'>Add cart</b>
                  </div>

                ";                                   
            }
          }
      ?>
      
    
  </div>
</div>


<?php 
  include("footer.php");
?>