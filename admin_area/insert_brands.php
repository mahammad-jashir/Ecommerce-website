<?php

include('../includes/connect.php');       //18-1-2024 10:05 PM
if (isset($_POST['insert_brand'])) {  //To check button is clicked or not
    $brand_title = $_POST['brand_title'];  //To access value

    //Select data from database
    $select_query = "Select * from `brands` where brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);  //To execute query
    $number = mysqli_num_rows($result_select); // To count number of matching categories in database

    //If data present in database
    if ($number > 0) { //To avoid insertion of same categories again and again
        echo "<script>alert('This Brand already present in database')</script>";
    }
    //If data is not present in database insert that data
    else {




        $insert_query = "insert into `brands` (brand_title) values ('$brand_title') ";  // Insert the data into the database. database ,column name
        $result = mysqli_query($con, $insert_query);  //To execute query
        if ($result) {
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }
}


?>

<h2 class="text-center">Insert Brands</h2>


<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands"
            aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
       
        <input type="submit" class=" bg-success border-0 p-2 my-3 " name="insert_brand" value="Insert Brands"  >
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Brands</button> -->
    </div>
</form>