<?php

//include connect file
//include('./include/connect.php');

//getting products

function getproducts(){
    global $con;

    //condition to check isset or not
    if(!isset($_GET['catogories'])){
        if(!isset($_GET['brands'])){

        

    
    $select_query="Select * from `products` order by rand() LIMIT 0,9";
    $result_query=mysqli_query($con,$select_query);
                    
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $catogories_id=$row['catogories_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price:$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
                       


                    }
}
    }
}

//getting all products

function getallprodut(){

    global $con;

    //condition to check isset or not
    if(!isset($_GET['catogories'])){
        if(!isset($_GET['brands'])){

        

    
    $select_query="Select * from `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
                    
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $catogories_id=$row['catogories_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price:$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
                       


                    }
}
    }

}






//getting unic categories

function get_unic_categories(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['catogories'])){
        $category_id=$_GET['catogories'];
        
        

    
    $select_query="Select * from `products` where catogories_id= $category_id";
    $result_query=mysqli_query($con,$select_query);
    $sum_of_rows=mysqli_num_rows($result_query);
    if($sum_of_rows==0){
        echo "<h2 class='text-center text-danger'> No stock for this category</h2>";
    }
                    
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $catogories_id=$row['catogories_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price:$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
                       


                    }
}
    }

    //getting unic brands

function get_unic_brands(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['brands'])){
        $brand_id=$_GET['brands'];
        
        

    
    $select_query="Select * from `brands` where brand_id= $brand_id";
    $result_query=mysqli_query($con,$select_query);
    $sum_of_rows=mysqli_num_rows($result_query);
    if($sum_of_rows==0){
        echo "<h2 class='text-center text-danger'>This brand not avilable for service</h2>";
    }
                    
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $catogories_id=$row['catogories_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price:$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
                       


                    }
}
    }






//display brands in side navi

function getbrands(){
    global $con;
    $select_branda="Select * from `brands`";
    $result_branda=mysqli_query($con,$select_branda);
    // $row_data=mysqli_fetch_assoc($result_branda);
    // echo $row_data['brand_title'];

    while($row_data=mysqli_fetch_assoc($result_branda)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];

        echo "  <li class='nav-item '>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'> $brand_title</a>
    </li>";

    }

    
}


// displap cotogoris

function gatcategories(){
    global $con;
    $select_category="Select * from `catogories`";
                    $result_catogory=mysqli_query($con,$select_category);
                    // $row_data=mysqli_fetch_assoc($result_branda);
                    // echo $row_data['brand_title'];

                    while($row_data=mysqli_fetch_assoc($result_catogory)){
                        $catogory_title=$row_data['catogories_title'];
                        $catogory_id=$row_data['catogories_id'];

                        echo "  <li class='nav-item '>
                        <a href='index.php?catogory=$catogory_id' class='nav-link text-light'>$catogory_title</a>
                    </li>";

                    }
}


//searching products funtion

function search_product(){
    global $con;

    if(isset($_GET['search_data_product'])){

        $search_data_value=$_GET['search_data'];

    
    $search_query="Select * from `products` where product_keyword like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $sum_of_rows=mysqli_num_rows($result_query);
    if($sum_of_rows==0){
        echo "<h2 class='text-center text-danger'>No result match!</h2>";
    }
                    
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $catogories_id=$row['catogories_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price:$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
                       


                    }
}
}


// view funtion

function view_detils(){

    global $con;

    //condition to check isset or not

    if(isset($_GET['product_id'])){
    if(!isset($_GET['catogories'])){
        if(!isset($_GET['brands'])){
            $product_id=$_GET['product_id'];

        

    
    $select_query="Select * from `products` where product_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
                    
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_image2=$row['product_image2'];
                        $product_image3=$row['product_image3'];
                        $product_price=$row['product_price'];
                        $catogories_id=$row['catogories_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price:$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='index.php' class='btn btn-secondary'>Go home</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-md-8'>
                    <!-- releted image -->

                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-info mb-5'>Releted products</h4>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>

                        </div>

                        <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>

                        </div>
                    </div>
                </div>";
                       


                    }
}
    }


}
}

//get ip address

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart funtion

function cart(){
    if(isset($_GET['add_to_cart'])){

        global $con;
        $get_ip = getIPAddress(); 

        $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * from `cart_details` where ip_address='$get_ip' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $sum_of_rows=mysqli_num_rows($result_query);
        if($sum_of_rows>0){
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";


        }else{
            $insert_query="insert into `cart_details` (product_id,ip_address,quntity) values ('$get_product_id','$get_ip',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('This item is added to the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }



    }
    
}

//function to get cart item number

function cart_item(){

    if(isset($_GET['add_to_cart'])){

        global $con;
        $get_ip = getIPAddress(); 

       // $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * from `cart_details` where ip_address='$get_ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_item=mysqli_num_rows($result_query);
        }else{
            global $con;
        $get_ip = getIPAddress(); 

       // $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * from `cart_details` where ip_address='$get_ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_item=mysqli_num_rows($result_query);

        }

        echo $count_cart_item;



    }

    // tolal price funtion

    function total_cart_price(){
        global $con;
        $get_ip = getIPAddress(); 
        $total_price=0;
        $cart_query="Select * from `cart_details` where ip_address='$get_ip'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="Select * from `products` where product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){

                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $total_price+=$product_values;


            }
        }

        echo $total_price;
    }

//get user order details

function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_order'])){
                if(!isset($_GET['delete_accountr'])){
                    $get_order="Select * from `user_order` where user_id=$user_id and order_status='pending'";
                    $result_order_query=mysqli_query($con,$get_order);
                    $row_count=mysqli_num_rows($result_order_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success mt-5 mb-2'> You hape<span class='text-danger'>$row_count</span>pending order</h3>
                        <p class='text-center'><a class='text-dark' href='profile.php?my_order'>Order details</a></p>";
                        
                    }else{
                        echo "<h3 class='text-center text-success mt-5 mb-2'> you have zero pending order</h3>
                        <p class='text-center'><a class='text-dark' href='../index.php'>Order details</a></p>";
                    }

                }

            }
        }
    }
}

?>