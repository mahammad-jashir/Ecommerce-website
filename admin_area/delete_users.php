<!-- File Created on 26-02-2024 9:27PM -->


<?php 

if(isset($_GET['delete_users'])){
    $delete_users=$_GET['delete_users'];
    // echo $delete_category;

    $delete_query="Delete from `user_table` where user_id=$delete_users";
    $result=mysqli_query($con,$delete_query);

    if($result){
        echo "<script>alert('User has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}
?>