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

    <title>My store</title>
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container-fluid text-white">
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

                        <?php
                        //23-02-2024 10:31AM
                        if (isset($_SESSION['username'])) {
                            echo "  <li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Account</a> 
                        </li>";
                        } else {
                            echo "  <li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        }

                        ?>
                     
                        <!-- <li class="nav-item">
                            5-03-2024 2:47PM
                            <a class="nav-link" href="#">Contact</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php
                                    cart_item();
                                    ?>
                                </sup></a> <!--26-01-2024--->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price:
                                <?php
                                total_cart_price();   //26-01-2024 7:22PM
                                
                                ?>/-
                            </a>
                        </li>

                        <?php
                        //26-02-2024 7:43PM
                          if (!isset($_SESSION['username'])) {
                        echo "<li class=nav-item>
                            <a class=nav-link href='./admin_area/admin_login.php'>Admin</a>
                        </li>";
                          }
                        ?>

                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">

                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
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
                //For login and logout sessions //08-02-2024 10:43PM
                
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li>";
                } else {
                    echo "  <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . " </a> 
                </li>";

                }



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

        <!-- Fourth Child -->
        <div class="row px-1">

            <div class="col-md-10">
                <div class="row">
                    <!-- // Fetching products and displaying products from the database 21-01-2024 -->
                    <?php

                    //calling function
                    getproducts(); //by writing actions or styles in separate files function and calling them here using same function 23-01-2024
                    // search_product();
                    get_unique_categories(); //23-01-2024
                    get_unique_brands(); //23-01-2024
                    
                    // $ip = getIPAddress(); //26-01-2024
                    // echo 'User Real IP Address - ' . $ip;  //26-01-2024
                    


                    ?>










                </div>

            </div>

            <!-- Side Navigation Bar -->
            <div class="col-md-2 bg-dark p-0">

                <ul class="navbar-nav me-auto text-center">

                    <li class="nav-item bg-info ">
                        <a href="#" class="nav-link text-light bg-success ">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>
                    <!--20-01-2024-->
                    <?php

                    getbrands();

                    ?>



                </ul>

                <!-- Categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">

                    <li class="nav-item bg-info ">
                        <a href="#" class="nav-link text-light bg-success ">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    getcategories();  //23-01-2024
                    
                    ?>



                </ul>

            </div>

        </div>


        <!-- Including footer.php -->

        <?php
        include("./includes/footer.php"); //24-01-2024
        
        ?>
    </div>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></scrip >

</body >

</html >