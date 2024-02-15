<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="Select * from `user_table` where user_name='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_contact'];

}
    if(isset($_POST['user_update'])){
        $update_id+$user_id;
        $user_name=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_temp=$_FILES['user_image']['tmp'];
        move_uploaded_file($user_image_temp,"./user_images/$user_image");

        //update 

        $update_data="update `user_table` set user_name='$user_name',user_email='$user_email',user_address='$user_address',
         user_imag=' $user_image',user_contact='$user_mobile' where user_id=$update_id";
         $result_query_update=mysqli_query($con,$update_data);
         if($result_query_update){
            echo "<script>alert('data update success full')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
         }
    }


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<body>
   <h3 class="text-success mb-4">Edit Account</h3>
   <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-5 m-auto" value="<?php echo $user_name?>" name="user_username">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-5 m-auto" value="<?php echo $user_email?>" name="user_email">
    </div>
    <div class="form-outline mb-4 d-flex  w-5 m-auto">
        <input type="file" class="form-control m-auto" name="user_image">
        <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_image">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-5 m-auto" value="<?php echo $user_address?>" name="user_address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-5 m-auto" name="user_mobile " value="<?php echo $user_mobile?>">
    </div>
    
        <input type="submit" class="bg-info py-2 px-3" name="user_update" value="Update">
   
   </form>
    
</body>
</html>