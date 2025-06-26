<?php include('../includes/connect.php');
include('../functions/common_function.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<!-- Internal CSS 9-02-2024 -->
<style>
   .payment_img{
        width: 50%;
        margin: auto;
        display: block;

    }
</style>

<body class="bg-dark">
    <!-- PHP code to access user id 09-02-2024 9:21PM -->
<?php 
$user_ip=getIPAddress();  //11-02-2024
$get_user="Select * from `user_table` where user_ip='$user_ip'";   //11-02-2024   //8:56AM
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);

$user_id=$run_query['user_id'];


?>

    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../Images/upi.webp" alt="" class="payment_img"></a>
            </div>

            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center text-success ">Pay Offline</h2></a>
            </div>

        </div>
    </div>
</body>

</html>