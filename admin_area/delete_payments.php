<!-- File Created on 26-02-2024 9:26PM -->


<?php 

if(isset($_GET['delete_payments'])){
    $delete_payments=$_GET['delete_payments'];
    // echo $delete_category;

    $delete_query="Delete from `user_payments` where payment_id=$delete_payments";
    $result=mysqli_query($con,$delete_query);

    if($result){
        echo "<script>alert('Payment has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}
?>