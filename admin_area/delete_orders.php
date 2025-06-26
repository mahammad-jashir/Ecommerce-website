<!-- File Created on 26-02-2024 9:28PM -->


<?php 
  

if(isset($_GET['delete_orders'])){
    $delete_orders=$_GET['delete_orders'];
    // echo $delete_category;


    $delete_query="Delete from `user_orders` where order_id='$delete_orders'";
    $result=mysqli_query($con,$delete_query);

    if($result){
        echo "<script>alert('Order has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}
?>