<?php
include('../include/connect.php');
include('../funtion/comman_funtion.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

//getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "Select * from ` cart_details` where ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$invice_number=mt_rand();
$status='prnding';
$count_products = mysqli_num_rows($result_cart_price);
while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "Select * from `products` where product_id=$product_id";
    $run_price = mysqli_query($con, $select_product);
    while($ow_product_price= mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}

//getting quntity from cart

$get_cart="Select * from ` cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quntity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quntity['quantity'];
if($quantity==0){
    $quantity==1;
    $subtotal=$total_price;

}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;

}

$insert_order="Insert into `user_order` (user_id,amount_due,invoice_number,total_products,order_date,order_status)
 value ($user_id,$subtotal,$invice_numbe,$count_products,NOW(),'$status')";
 $result_query=mysqli_query($con,$insert_order);

 if($result_query){
    echo "<script>alert('order are submitted')</script>";
    echo "<script>window.open('profile.php','_selfe')</script>";
 }

 //order pending
 $insert_pendin_order="Insert into `order_pending` (user_id,invoice_number,product_id,quntity,order_status)
 value ($user_id,$invice_numbe, $product_id,$quantity,'$status')";
 $result_pending_order=mysqli_query($con,$insert_pendin_order);


 //delete item from cart

 $empty_cart="Delete from ` cart_details` where ip_address='$get_ip_address'";
 $result_deletr=mysqli_query($con,$empty_cart);
?>