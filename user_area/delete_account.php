<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
</head>
<body>
    <h3 class="text-danger mb-4">Delete Account</h3>

    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value=" Dont Delete account">
        </div>

    </form>


    <?php
    $username_session=$_SESSION['username'];
    if(isset($_post['delete'])){
        $delete_query="Delete from `user_table` where username= ' $username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account delete success fully')</script>";
            echo "<script>alert('../index.php','_self')</script>";
        }
    }
    if(isset($_post['dont_delete'])){
        echo "<script>alert('profile.php','_self')</script>";
    }

?>
</body>
</html>
