<?php

include('../includes/connect.php');       //18-1-2024 10:05 PM
if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];  //To access value

    //Select data from database
    $select_query = "Select * from `categories` where category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);  //To execute query
    $number = mysqli_num_rows($result_select); // To count number of matching categories in database

    //If data present in database
    if ($number > 0) { //To avoid insertion of same categories again and again
        echo "<script>alert('This category already present in database')</script>";
    }
    //If data is not present in database insert that data
    else {




        $insert_query = "insert into `categories` (category_title) values ('$category_title') ";  // Insert the data into the database. database ,column name
        $result = mysqli_query($con, $insert_query);  //To execute query
        if ($result) {
            echo "<script>alert('category has been inserted successfully')</script>";
        }
    }
}


?>


<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories"
            aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" class="bg-success p-2 my-3 border-0" name="insert_cat" value="Insert Categories">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Categories</button> -->
    </div>
</form>