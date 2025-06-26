<?php
//22-02-2024 7:42PM
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username']; //Accessing users data while editing
    $select_query = "Select * from `user_table` where username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);

    //Fetch the data from the database
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];

}


//22-02-2024 8:03PM
if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];


    //22-02-2024 8:08PM
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

    //Moving uploaded files to folder 22-02-2024 8:10PM
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    //Update Query 22-02-2024 8:13PM
    $update_data = "update `user_table` set username='$username', user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' where user_id=$update_id";

    $result_query_update = mysqli_query($con, $update_data);

    if ($result_query_update) {
        echo "<script>alert('Data Updated Successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }


}


?>




<!DOCTYPE html>
<!-- File created on 22-02-2024 4:00PM -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_username">
        </div>

        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
        </div>

        <div class="form-outline mb-4 d-flex  w-50 m-auto">
            <input type="file" class="form-control  m-auto" name="user_image">
            <!-- Displaying Image of person who  have account -->
            <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_image"> <!--22-02-2024 5:10PM-->
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>

        <input type="submit" value="update" class="btn btn-success py-2 px-3 border-0" name="user_update">

    </form>
</body>

</html>