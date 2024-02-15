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
    <title>MY shop</title>
    <!--Boostrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">



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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price:<?php total_cart_price();?>/-</a>
                        </li>

                    </ul>
                    <form class="d-flex" action="" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->

                        <input type="submit" value="Search" calss="btn btn-outline-light"  name="search_data_product">
                    </form>
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

        <!-- forth childed -->
        <div class="row px-1">
            <div class="col-md-10">
                <!-- prodeucts -->
                <div class="row">
                    <!-- fetching products -->

                    <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welome Guest</a>
                    </li>";
                    }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome" .$_SESSION['username']."</a>
                    </li>";
                    }
                    // $select_query="Select * from `products` order by rand() LIMIT 0,9";
                    // $result_query=mysqli_query($con,$select_query);
                    
                    // while($row=mysqli_fetch_assoc($result_query)){
                    //     $product_id=$row['product_id'];
                    //     $product_title=$row['product_title'];
                    //     $product_description=$row['product_description'];
                    //     $product_image1=$row['product_image1'];
                    //     $product_price=$row['product_price'];
                    //     $catogories_id=$row['catogories_id'];
                    //     $brand_id=$row['brand_id'];

                    //     echo "<div class='col-md-4 mb-2'>
                    //         <div class='card'>
                    //         <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    //         <div class='card-body'>
                    //             <h5 class='card-title'> $product_title</h5>
                    //             <p class='card-text'>$product_description</p>
                    //             <p class='card-text'>Price:$product_price</p>
                    //             <a href='#' class='btn btn-info'>Add to cart</a>
                    //             <a href='#' class='btn btn-secondary'>View more</a>
                    //         </div>
                    //     </div>
                    // </div>";
                       


                    // }

                    search_product();
                    get_unic_categories();
                    get_unic_brands();

                    ?>
                    <!-- <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./image/closeup-shot-golden-watch-isolated.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Add to cart</a>
                                <a href="#" class="btn btn-secondary">View more</a>
                            </div>
                        </div>
                    </div> -->
                    
                    
                    
                    
                    
                </div>

            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->

                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>
                    <?php

                        getbrands();
                    // $select_branda="Select * from `brands`";
                    // $result_branda=mysqli_query($con,$select_branda);
                    // // $row_data=mysqli_fetch_assoc($result_branda);
                    // // echo $row_data['brand_title'];

                    // while($row_data=mysqli_fetch_assoc($result_branda)){
                    //     $brand_title=$row_data['brand_title'];
                    //     $brand_id=$row_data['brand_id'];

                    //     echo "  <li class='nav-item '>
                    //     <a href='index.php?brand=$brand_id' class='nav-link text-light'> $brand_title</a>
                    // </li>";

                    // }

                    //
                     ?>
                </ul>

                <!-- categories to  be display -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                </li>
                <?php
                gatcategories();
                    // $select_category="Select * from `catogories`";
                    // $result_catogory=mysqli_query($con,$select_category);
                    // // $row_data=mysqli_fetch_assoc($result_branda);
                    // // echo $row_data['brand_title'];

                    // while($row_data=mysqli_fetch_assoc($result_catogory)){
                    //     $catogory_title=$row_data['catogories_title'];
                    //     $catogory_id=$row_data['catogories_id'];

                    //     echo "  <li class='nav-item '>
                    //     <a href='index.php?catogory=$catogory_id' class='nav-link text-light'>$catogory_title</a>
                    // </li>";

                    // }

                    ?>
                 
                </ul>
                <!-- categories to  be display -->

            </div>
        </div>


        <!-- last chiled -->
        <div class="bg-info p-3 text-center">
            <p>All rights recived </p>

        </div>
    </div>
    <!--Boostrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>