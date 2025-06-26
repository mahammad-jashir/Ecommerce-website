<!-- File Created at 24-02-2024 9:53PM -->

<?php 



if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    // echo $delete_id;

    //Delete query 24-02-2024 9:54PM 

    $delete_product="Delete from `products` where product_id=$delete_id";
    $result_product=mysqli_query($con,$delete_product);

    if($result_product){
        echo "<script>alert('Product Deleted Successfully')</script>";
        echo "<script>window.open('./insert_product.php','_self')</script>";
    }
}

?>