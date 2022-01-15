<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta charset="utf-8">  
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/register.css">
</head>
<body>
<div class="login container-fluid ">
<div class="loginc">
  <img src="image/Ayurveda.jpg">
</div>
<div class="loginb logind">
  <div class="row">
    <div class="col-sm-12 col-md-3"></div>
    <div class="col-sm-12 col-md-6">
      <div class="logina">
        <h2>Smart Ayurveda Home</h2>
        <h3>Register</h3><br>
        <form method="post">
        <input type="hidden" name="captcha_key" id="captcha_key" value="">
        <input type="text" name="name" required pattern="[A-Za-z]+" class="form-control" placeholder="Enter Name"><br>
        <input type="text" name="address" required class="form-control" placeholder="Enter Address"><br>
        <input type="email" name="email" required class="form-control" placeholder="Enter Email"><br>
        <input type="number" name="phone" required class="form-control" placeholder="Enter Phone No."><br>
        <input type="Password" name="pass" required class="form-control" placeholder="Enter Password"><br>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
            <div class="help-block with-errors"></div>
          </div>
        <button type="submit" name="submit" id="submit" disabled="disabled" class="btn btn-success"> Register </button>
        <span> <a href="../c_login.php" class="btn btn-success">login</a></span>
      </form>
      </div>
    </div>
    <div class="col-sm-12 col-md-3"></div>
  </div>
</div>
</div>

<?php 
  include("includes/db.php");
  include("function/function.php");
  if(isset($_POST['submit']))
  {
    $c_name=$_POST['name'];
    $c_email= $_POST['email'];
    $c_pass = md5($_POST['pass']);
    $c_address = $_POST['address'];
    $c_phone = $_POST['phone'];
    $c_ip = getRealIpAddr();
    $c_image = $_FILES["img"]["name"];
    $tem_name = $_FILES["img"]["tmp_name"];
    move_uploaded_file($tem_name,"customer_photo/$c_image");
    $insert_customer = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_address, customer_phone, customer_image) VALUES ('$c_name','$c_email','$c_pass','$c_address','$c_phone','$c_image')";
    $run_customer = mysqli_query($con,$insert_customer);
    if($run_customer)
    {
      echo "<script>alert('you are sucessfully login')</script>";
      echo"<script>window.open('../checkout.php','_self')</script>";
    }
    else
    {
      echo"<script>alert('please try again')</script>";
    }
  }
 ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
  function verifyRecaptchaCallback(res) {
  if(res) {
    document.getElementById('submit').removeAttribute("disabled");
    document.getElementById('captcha_key').value = res;
  } else {
    alert('Captcha verification failed');
    document.getElementById('captcha_key').value = '';
  } 
  }
  function expiredRecaptchaCallback() {
    document.getElementById('submit').setAttribute("disabled", "disabled");
    document.getElementById('captcha_key').value = '';
  }
</script>
</body>
</html>