<?php
include('../include/connect.php');
if(isset($_POST['insert_cat'])){

    $catogory_title=$_POST['cat_title'];

    // select data from database
    $select_query="Select * from `catogories` where catogories_title='$catogory_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This catogory is present in the database')</script>";

    }else{
        $insert_query="insert into `catogories` (catogories_title) values ('$catogory_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
        echo "<script>alert('category has been inserted sucessfully')</script>";
    }

    }





    
}
?>


<h2 class=" text-center">Insert categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i> </span>
        <input type="text" class="form-control" 
        name="cat_title" placeholder="Insert categories" 
        aria-label="catogories" aria-describedby="basic-addon1">

    </div>
    <div class="input-group w-10 mb-2 m-auto">
        
        <input type="submit" class=" bg-info border-0 p-2 my-3" 
        name="insert_cat" value="Insert categories" 
        aria-label="Username" aria-describedby="basic-addon1" >

        

    </div>
</form>