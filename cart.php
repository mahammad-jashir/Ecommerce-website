<!-- Including connect.php file using php syntax -->

<?php
include('includes/connect.php');          //20-01-2024
include('functions/common_function.php'); //23-01-2024
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- External css -->
    <link rel="stylesheet" href="./style.css">
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>

    <title>My store-Cart Details</title>
</head>

<body>

    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="./Images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php
                                    cart_item();
                                    ?>
                                </sup></a> <!--26-01-2024--->
                        </li>


                    </ul>

                </div>
            </div>
        </nav>


        <!-- calling cart function 26-01-2024 -->

        <?php
        cart();
        ?>





        <!-- Second child --> <!-- 10-01-2024 -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">

            <ul class="navbar-nav me-auto">


                <?php

                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
                } else {
                    echo "  <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . " </a> 
    </li>";

                }




                //For login and logout sessions //08-02-2024 10:53PM
                if (!isset($_SESSION['username'])) {
                    echo "  <li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                } else {
                    echo "  <li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";

                }
                ?>

            </ul>
        </nav>

        <!-- Third child --> <!-- 10-01-2024 -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- Fourth child-table --> <!--26-01-2024--7:41PM-->

        <div class="container">
            <div class="row">
                <form action="" method="post"> <!--27-01-2024 9:16PM-->
                    <table class="table table-bordered text-center">
                        <!-- <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan="2">Operations</th>
                            </tr>
                        </thead> -->

                        <tbody>
                            <!-- Php code to display dynamic data //26-01-2024 8:21 PM -->
                            <?php
                            // global $con;
                            $get_ip_add = getIPAddress();
                            $total_price = 0; //26-01-2024 7:09 PM
                            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'"; //26-01-2024 3:50PM
                            $result = mysqli_query($con, $cart_query);

                            //28-01-2024
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {

                                echo "     <thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                            </thead>";




                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];
                                    $select_products = "Select * from `products` where product_id='$product_id'"; //26-01-2024 3:55PM
                                    $result_products = mysqli_query($con, $select_products);
                                    while ($row_product_price = mysqli_fetch_array($result_products))       //26-01-2024 3:58PM
                                    {
                                        $product_price = array($row_product_price['product_price']);           //[200,300]
                                        $price_table = $row_product_price['product_price'];  //26-01-2024 8:22 PM 
                                        $product_title = $row_product_price['product_title'];  //26-01-2024 8:25 PM 
                                        $product_image1 = $row_product_price['product_image1'];  //26-01-2024 8:25 PM 
                                        //  $product_image2=$row_product_price['product_image2'];  //26-01-2024 8:25 PM 
                                        //  $product_image3=$row_product_price['product_image3'];  //26-01-2024 8:25 PM 
                            
                                        $product_values = array_sum($product_price);         //26-01-2024 4:03PM  //[500]
                                        $total_price += $product_values; //26-01-2024 7:10 PM //[500]
                            


                                        ?>

                                        <tr>
                                            <td>
                                                <?php echo $product_title //26-01-2024 8:31PM ?>
                                            </td>
                                            <td><img src="./admin_area/product_images/ <?php echo $product_image1 ?>" alt=""
                                                    class="cart_img"></td>
                                            <td><input type="text" name="qty" id="" class="form-input w-50"></td>

                                            <?php
                                            $get_ip_add = getIPAddress();                                             //27-01-2024 9:24PM
                                            if (isset($_POST['update_cart'])) {
                                                $quantities = $_POST['qty'];        //27-01-2024 9:28PM
                                                $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                                $result_products_quantity = mysqli_query($con, $update_cart);
                                                $total_price = $total_price * $quantities; //27-01-2024 9:33PM
                                            }
                                            ?>

                                            <td>
                                                <?php echo $price_table //26-01-2024 8:31PM ?>/-
                                            </td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                            <!--27-01-2024 10:41PM-->
                                            <td>
                                                <!-- <button class="bg-info px-3  py-2 border-0 mx-3">Update</button> -->
                                                <input type="submit" value="Update Cart" class="bg-success text-dark px-3  py-2 border-0 mx-3"
                                                    name="update_cart">
                                                <!-- <button class="bg-info px-3  py-2 border-0 mx-3">Remove</button> -->
                                                <input type="submit" value="Remove Cart" class="bg-success text-dark px-3  py-2 border-0 mx-3"
                                                    name="remove_cart">
                                            </td>

                                        </tr>

                                        <?php
                                        //26-01-2024 8:28PM
                                    }
                                }


                            }

                            //28-01-2024
                            else {
                                echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Sub Total 26-01-2024 -->

                    <div class="d-flex mb-5">
                        <?php
                        $get_ip_add = getIPAddress();

                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'"; //26-01-2024 3:50PM
                        $result = mysqli_query($con, $cart_query);

                        //28-01-2024
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {

                            echo " <h4 class='px-3'>Subtotal:<strong class='text-info'>
                             $total_price/-
                        </strong></h4>
                        <input type='submit' value='Continue Shopping' class='bg-secondary text-light px-3  py-2 border-0 mx-3'
                        name='continue_shopping'>
                    <button class='bg-dark text-success px-3  py-2 border-0 text-light'><a href='./users_area/checkout.php' class='text-success text-decoration-none'>CheckOut</a></button>";
                        } else {
                            echo "  <input type='submit' value='Continue Shopping' class='bg-secondary text-light px-3  py-2 border-0 mx-3'
                            name='continue_shopping'>";
                        }


                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>



                    </div>
            </div>
        </div>

        </form>

        <!-- Functions to remove items from cart 27-01-2024 10:43PM -->

        <!-- <?php
        function remove_cart_item()
        {
            global $con;

            if (isset($_POST['remove_cart'])) {

                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);

                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')></Script>";
                    }
                }

            }

            // echo $remove_item=remove_cart_item();
        }

        echo $remove_item = remove_cart_item();

        ?> -->

        <!-- Including footer.php -->

        <?php
        include("./includes/footer.php"); //24-01-2024
        
        ?>
    </div>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>