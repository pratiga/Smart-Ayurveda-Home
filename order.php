<?php 
    include ("includes/db.php");
    include ("function/function.php");

    // getting customer ID

    if(isset($_GET['c_id']))
    {
    	$customer_id =$_GET['c_id'];
    	$get_c_email = "select * from customers where customer_id='customer_id'";
    	$run_email = mysqli_query($con,$get_c_email);
    	$row_email =mysqli_fetch_array($run_email);
    	$customer_email = $row_email['customer_email'];

    }

    //getting products price and number of items

    $ip_add = getRealIpAddr();
    $total = 0;
    $sel_price = "select * from cart where ip_add='$ip_add'";
    $run_price = mysqli_query($con,$sel_price);
    $status = 'pending';
    $invoice_no = mt_rand();
    $count_pro = mysqli_num_rows($run_price);
    while ($record = mysqli_fetch_array($run_price))

	{
		$pro_id=$record['pro_id'];
		$pro_price = "select * from products where product_id='$pro_id'";
		$run_price = mysqli_query($con,$pro_price);
		while($row_price = mysqli_fetch_array($run_price))
		{
			$product_name = $row_price['product_name'];
			$product_price =array($row_price['product_price']);
			$values = array_sum($product_price);
			$total+=$values;

		}
	}

   //getting quantity from the cart
	$get_cart = "select * from cart ";
	$run_cart = mysqli_query($con,$get_cart);
	$row_qty = mysqli_fetch_array($run_cart);
	$qty = $row_qty['qty'];
	// if($qty==1)
	// {
	// 	$qty=1;
	// 	$sub_total=$total;
	// }
	//else
	//{
	//	$qty= $qty;
		$sub_total=$total*$qty;

	//}

	$insert_order = "insert into customer_order(customer_id,due_amount,invoice_no,total_product,order_status) values('$customer_id','$sub_total','$invoice_no','$count_pro','$status')";
	$run_order = mysqli_query($con,$insert_order);

	echo "<script>alert('order successfully submitted, thanks')</script>";
      	echo "<script>window.open('customer/my_account.php','_self')</script>";


	$insert_to_pending_orders = "insert into pending_order(customer_id,invoice_no,product_id,qty,order_status) values ('$customer_id','$invoice_no','$pro_id','$qty','$status')";
	
	
      	$run_pending_order = mysqli_query($con,$insert_to_pending_orders);  	


 ?>