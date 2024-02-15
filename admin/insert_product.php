<?php

include('../include/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['discription'];
    $product_keyword=$_POST['Product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['Product_price'];
    $product_status='true';


    //accessing images

    $product_image1=$_FILES['Product_image1']['name'];
    $product_image2=$_FILES['Product_image2']['name'];
    $product_image3=$_FILES['Product_image3']['name'];

    //accessing image tem  name

    $tmp_image1=$_FILES['Product_image1']['tmp_name'];
    $tmp_image2=$_FILES['Product_image2']['tmp_name'];
    $tmp_image3=$_FILES['Product_image3']['tmp_name'];


    // checking empty conddition
    if($product_title=='' or $product_description=='' or $product_keyword=='' 
    or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' 
    or $product_image3=='' ){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{

        move_uploaded_file($tmp_image1,"./admin/product_images/$product_image1");
        move_uploaded_file($tmp_image2,"./admin/product_images/$product_image2");
        move_uploaded_file($tmp_image3,"./admin/product_images/$product_image3");


        //insert query
        $insert_products="insert into `products`(product_title,product_description,product_keyword,catogories_id,
        brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title',
        ' $product_description','$product_keyword','$product_category','$product_brands','$product_image1','$product_image2',
        '$product_image3','$product_price',NOW(),'$product_status')";

        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Insert successfull')</script>";
        }

    }
    


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product-Addmin dasbord</title>

    <!--Boostrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css link -->

    <link rel="stylesheet" href="../style.css">

    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
<div class="container mt-3">
    <h1 class="text-center">Insert Products</h1>

    <!-- form -->

    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form_label">Product title</label>
        <input type="text" name="product_title" 
        id="product_title" class="form-control" placeholder="Enter product title" 
        autocomplete="off" required="required">
    </div>

    <!-- discription -->

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="discription" class="form_label">Discription</label>
        <input type="text" name="discription" 
        id="discription" class="form-control" placeholder="Enter discription" 
        autocomplete="off" required="required">
    </div>

    <!-- Product keyword -->

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="Product_keyword" class="form_label">Product keyword</label>
        <input type="text" name="Product_keyword" 
        id="Product_keyword" class="form-control" placeholder="Enter Product keyword" 
        autocomplete="off" required="required">
    </div>

     <!-- categories -->

     <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_category" id="" class="form-select">
            <option value="">Select a category</option>
            <?php
            $select_query="Select * from `catogories`";
            $result_query=mysqli_query($con,$select_query);

            while($row=mysqli_fetch_assoc($result_query)){
                $category_title=$row['catogories_title'];
                $category_id=$row['catogories_id'];
                echo "<option value='$category_id'>$category_title</option>";
            }


            ?>






          
        </select>
    </div>

    <!-- brands -->

    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_brands" id="" class="form-select">
            <option value="">Select a Brands</option>
            <?php
            $select_query="Select * from `brands`";
            $result_query=mysqli_query($con,$select_query);

            while($row=mysqli_fetch_assoc($result_query)){
                $brand_title=$row['brand_title'];
                $brand_id=$row['brand_id'];
                echo "<option value='$brand_id'>$brand_title</option>";
            }


            ?>

            
        </select>
    </div>

     <!-- image1 -->

     <div class="form-outline mb-4 w-50 m-auto">
        <label for="Product_image1" class="form_label">Product image 1</label>
        <input type="file" name="Product_image1" 
        id="Product_image1" class="form-control"
         required="required">
    </div>

    <!-- image2 -->

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="Product_image2" class="form_label">Product image 2</label>
        <input type="file" name="Product_image2" 
        id="Product_image2" class="form-control"
         required="required">
    </div>

    <!-- image3 -->

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="Product_image3" class="form_labe3">Product image 3</label>
        <input type="file" name="Product_image3" 
        id="Product_image3" class="form-control"
         required="required">
    </div>

    <!-- Product Price -->

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="Product_price" class="form_label">Product Price</label>
        <input type="text" name="Product_price" 
        id="Product_price" class="form-control" placeholder="Enter Product price" 
        autocomplete="off" required="required">
    </div>

     

     <!-- submit -->

     <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product ">
    </div>





    </form>
</div>    
</body>
</html>