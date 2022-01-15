<?php
	session_start(); 
	include("includes/db.php");
	include("function/function.php");
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/shopping.css">
	<link rel="stylesheet" href="bootstrap/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
    <nav class="navbar">
  		<div class="container-fluid">
      		<div class="navbar-header">
      			<a class="navbar-brand" href="#">Smart Ayurveda <br> Home</a>
    		</div>
    		<ul class="nav navbar-nav">
      			<li class="active"><a href="#"></a></li>
    		</ul>
    		<ul class="nav navbar-nav navbar-right">
      			<li><a href="customer/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      			<?php 	 
      			if(!isset($_SESSION['customer_email']))
       			{
        		 echo"<li><a href='checkout.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
        		}
      			else 
      			{
        		 echo"<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
      			}
       			?>
      	<?php 
        if(!isset($_SESSION['customer_email']))
        {
          echo "<b>WelcomeGuest</b>";
        }
         else
         {
          echo "<b>Welcome:". "<span style='color:green'>" .$_SESSION['customer_email']."</b>";
        }
        ?>
    </ul>
  </div>
</nav>
</div>

<div class="content">
	<div class="container">
		<div class="col-sm-12 col-md-12">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<div class="category">
					<h2>Categories</h2>
					<ul type="none">
						<?php echo getcategory(); ?>
					</ul>
				</div>
			</div>
			<div class="col-sm-12 col-md-7 ">
				<h1>Content</h1>
				<div class="row">
					 <?php 
					   
                        echo getallproduct();
                        echo  getproduct();
                        echo add_cart();
					  ?>
				</div>
			</div>
			<div class="col-sm-12 col-md-2">
				<h2><a href="cart.php">GoToCart </a><span class="fa fa-cart-plus"></span></h2>
				<h3>Items:<?php echo items(); ?></h3>
				<h3>Total Price: <?php echo total(); ?></h3>
				<h3>Check Out</h3>
			</div>
		</div>
	</div>
</div>
</div>

<div class="footer">
<div class="container-fluid">
	<div class="row"  style="color:white;">
		<div class="col-sm-12 col-md-1"></div>
		<div class="col-sm-12 col-md-2">
			<h4>About Ayurveda</h4>
			About us<br>Contact us<br>Newsroom<br>Carrers<br>
		</div>
		<div class="col-sm-12 col-md-2">
			<h4>Support</h4>
			Product Support<br>Community<br>Report Abuse
		</div>
		<div class="col-sm-12 col-md-2">
			<h4>Resources</h4>
			Webmail<br>Site Map
		</div>
		<div class="col-sm-12 col-md-2">
			<h4>Account</h4>
			My Account<br>My Renewals <br>Create Account
		</div>
		<div class="col-sm-12 col-md-2">
			<h4>Shopping</h4>
			Product Catalog<br>Find a Domain<br>Resseler Programs
		</div>
		<div class="col-sm-12 col-md-1"></div>
	</div>
	<div class="foota"  style="color:white;">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				Copyright © 2019 Smart Ayurveda Home
			</div>
			<div class="col-sm-12 col-md-6"></div>
			<div class="col-sm-12 col-md-3">
			Follow us : 
				<a href="www.facebook.com" ><span class="fa fa-facebook"> </span> </a>
				<a href="www.facebook.com"  ><span class="fa fa-twitter"> </span></a>
				<a href="www.facebook.com"  ><span class="fa fa-youtube"> </span></a>
			</div>
		</div>
	</div>
</div>
</div>

</body>
</html>