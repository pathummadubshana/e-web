<?php
include('../include/connect.php');
include('../funtion/comman_funtion.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registation</title>
    <!--Boostrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 cal-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-lable">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your user name" autocomplete="off" required="required" name="user_username">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-lable">User Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_email">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-lable">User image</label>
                        <input type="file" id="user_image" class="form-control" placeholder="Enter your Image" autocomplete="off" required="required" name="user_image">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-lable">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="conform_password" class="form-lable">Conform password</label>
                        <input type="password" id="conform_password" class="form-control" placeholder="Enter your conforme password" autocomplete="off" required="required" name="conform_password">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-lable">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your user address" autocomplete="off" required="required" name="user_address">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-lable">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your user contact" autocomplete="off" required="required" name="user_contact">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" calss="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>








                </form>
            </div>
        </div>
    </div>

</body>

</html>


<!-- php code -->

<?php






if (isset($_post['user_register'])) {
    $user_name = $_post['user_username'];
    $user_email = $_post['user_email'];
    $user_password = $_post['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_conform = $_post['conform_password'];
    $user_address = $_post['user_address'];
    $user_conntac = $_post['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tem_name'];
    $user_ip = getIPAddress();


    $select_query = "Select * from `user_table` where user_name='$user_name' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('username and user emil alreadyexit')</script>";
    }else if($user_password!=$user_conform){
        echo "<script>alert('passwords do not match')</script>";

    }




     else {
        //insert
        move_uploaded_file($user_image_temp, "./user_images/$user_image");

        $insert_query = "insert into `user_table`(user_name,user_email,user_password,user_image,user_ip,user_adreess,user_contact) 
values('$user_name','$user_email',' $hash_password',' $user_address',' $user_conntac','$user_image','$user_ip')";

        $sql_execute = mysqli_query($con, $insert_query);
    }

    //select cart item
   
    $select_cart_items="Selcet * from `cart_details` where ip_address=$user_ip" ;
    $result_cart=mysqli_query($con,$select_cart_items);
    $row_count = mysqli_num_rows($result_cart);
    if($row_count>0){
        $_SESSION['username']=$user_name;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>windows.open('checkout.php','_self')</script>";

    }else{
        echo "<script>windows.open('index.php','_self')</script>";
    }
}




?>