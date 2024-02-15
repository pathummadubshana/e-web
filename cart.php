<!-- connect file -->
<?php

include('include/connect.php');
include('funtion/comman_funtion.php');
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY shop-cart</title>
    <!--Boostrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">

    <style>
        .cart_image{
    width: 80px;
    height: 80px;
    object-fit:contain;
}
    </style>



</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0 ">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid">
                <img src="./image/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./user_area/user_registation.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Total price:<?php total_cart_price();?>/-</a>
                        </li> -->

                    </ul>
                    <!-- <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <button class="btn btn-outline-light" type="submit">Search</button>

                        <input type="submit" value="Search" calss="btn btn-outline-light"  name="search_data_product">
                    </form> -->
                </div>
            </div>
        </nav>

        <!-- calling cart funtion -->

        <?php
         cart();

        ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
                    <a href="#" class="nav_link">welcome Guest</a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
              <a class='nav-link' href='./user_area/user_login.php'>Login</a>
          </li>";
                } else {
                    echo "<li class='nav-item'>
              <a class='nav-link' href='./user_area/logout.php'>Logout</a>
          </li>";
                }

                ?>


            </ul>
        </nav>
        <!-- third children -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Story</h3>
            <p class="text-center"> Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- Fouth childe-table -->

        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                   
                    <tbody>
                        <?php

                            global $con;
                            $get_ip = getIPAddress(); 
                            $total_price=0;
                            $cart_query="Select * from `cart_details` where ip_address='$get_ip'";
                            $result=mysqli_query($con,$cart_query);
                            $result_count=mysqli_num_rows($result);
                            if($result_count>0){

                                echo " <thead>
                                <tr>
                                    <th>Product title</th>
                                    <th>product image</th>
                                    <th>Quantity</th>
                                    <th>Total price</th>
                                    <th>Remove</th>
                                    <th clospan='2'>Operation</th>
                                </tr>
                                </thead>";

                            
                            while($row=mysqli_fetch_array($result)){
                                $product_id=$row['product_id'];
                                $select_products="Select * from `products` where product_id='$product_id'";
                                $result_products=mysqli_query($con,$select_products);
                                while($row_product_price=mysqli_fetch_array($result_products)){

                                    $product_price=array($row_product_price['product_price']);
                                    $price_table=$row_product_price['product_price'];
                                    $product_title=$row_product_price['product_title'];
                                    $product_image1=$row_product_price['product_image1'];
                                    $product_values=array_sum($product_price);
                                    $total_price+=$product_values;


 

                        ?>
                        <tr>
                            <td><?php echo $product_title?> </td>
                            <td><img src="./image/<?php echo $product_image1?>" alt="" class="cart_image"></td>
                            <td><input type="text" name="qty"  class="form-input w-50"></td>

                            <?php
                             $get_ip = getIPAddress(); 
                             if(isset($_POST['Update_cart'])){
                                $quntity=$_POST['qty'];
                                $update_cart="update `cart_details` set quntity=$quntity where ip_address='$get_ip'";
                                $result_products_quntity=mysqli_query($con,$update_cart);
                                $total_price=$total_price*$quntity;

                             }


                            ?>

                            <td><?php echo $price_table?></td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                            <td>
                                <!-- <button button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="Update_cart">
                                <!-- <button button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                                <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                            </td>
                        </tr>

                        <?php
                        }}}
                        else{
                            echo "<h2 class='text-center text-danger'> Cart is empty</h2>";
                        }?>
                    </tbody>
                  
                </table>
                <!-- subtolal -->
                <div class="d-flex mb-5">

                <?php


                            $get_ip = getIPAddress(); 
                            $total_price=0;
                            $cart_query="Select * from `cart_details` where ip_address='$get_ip'";
                            $result=mysqli_query($con,$cart_query);
                            $result_count=mysqli_num_rows($result);
                            if($result_count>0){

                                echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$total_price/-</strong></h4>
                                <input type='submit' value='Continue shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                                <button class='bg-secondary p-3 py-2 border-0 text-light'><a href='./user_area/checkout.php'class='text-light text-decoration-none'>Checkout</a></button>";
                            }else{
                                echo "<input type='submit' value='Continue shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                            }
                            if(isset($_POST['continue_shopping'])){
                                echo "<script> window.open('index.php','_self')</script>";
                            }
                ?>
                    
                </div>
                </form>


                <!-- function to remove item -->

                <?php
                function remove_cart_item(){
                    global $con;

                    if(isset($_POST['remove_cart'])){
                        foreach($_POST['removeitem'] as $remove_id){
                            echo $remove_id;

                            $delete_query="Delete from `cart_details` where product_id=$remove_id ";
                            $run_delete=mysqli_query($con,$delete_query);

                            if($run_delete){
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }
                echo $remove_items=remove_cart_item();

                ?>
            </div>
        </div>

        <!-- last chiled -->
        <?php
        include("./include/footer.php");

        ?>
    </div>
    <!--Boostrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>