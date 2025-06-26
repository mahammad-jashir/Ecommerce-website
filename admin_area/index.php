<?php

include('../includes/connect.php');          //23-02-2024 //3:39PM
include('../functions/common_function.php'); //23-02-2024  //3:39PM


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- 25-02-2024 3:18PM Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <!-- External css -->
    <link rel="stylesheet" href="../style.css">

    <style>
        /* 23-02-2024 3:43PM */
        body {
            overflow-x: hidden;
            /* To remove horizontal scroll bar */

        }

        .product_img {
            width: 100px;
            object-fit: contain;
        }

        /* .p{
            width: 100px;
            object-fit: contain;
        } */
    </style>



</head>

<body>
    <!-- Navbbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="../Images/logo.png" alt="" class="logo"> <!--double dots is used to come out of the folder-->

                <nav class="navbar navabar-expand-lg ">
                    <ul class="navbar-nav">
                    <li class='nav-item'>
                    <!-- <a class='nav-link text-success' href='#'>Welcome Guest</a> -->
                </li>
             


           
                    </ul>

                </nav>
            </div>
        </nav>

        <!-- Second Child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center ">

                <div class="p-5">
                    <a href="#"><img src="../Images/admin.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin</p>
                </div>

                <div class="button text-center">
                    <button class="my-3 bg-dark" ><a href="insert_product.php" class="nav-link  bg-dark text-success my-1">Insert
                            Product</a></button>
                    <button class="bg-dark"> <a href="index.php?view_products" class="nav-link  bg-dark text-success my-1">View
                            Products</a></button>
                    <button class="bg-dark"><a href="index.php?insert_category" class="nav-link  bg-dark text-success my-1">Insert
                            Categories</a></button>
                    <button class="bg-dark"><a href="index.php?view_categories" class="nav-link  bg-dark text-success my-1">View
                            Categories</a></button>
                    <button class="bg-dark"><a href="index.php?insert_brand" class="nav-link  bg-dark text-success my-1">Insert
                            Brands</a></button>
                    <button class="bg-dark"><a href="index.php?view_brands" class="nav-link  bg-dark text-success my-1">View
                            Brands</a></button>
                    <button class="bg-dark"><a href="index.php?list_orders" class="nav-link  bg-dark text-success my-1">All orders</a></button>
                    <button class="bg-dark"><a href="index.php?list_payments" class="nav-link bg-dark text-success my-1">All payments</a></button>
                    <button class="bg-dark"><a href="index.php?list_users" class="nav-link bg-dark text-success my-1">List Users</a></button>
                    <button class="bg-success"><a href="logout_admin.php" class="nav-link bg-success text-light my-1">Logout</a></button>

                </div>

            </div>
        </div>

        <!-- Fourth Child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }

            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }

            //23-02-2024 3:47PM
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }


            //23-02-2024 9:10PM
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }

            //24-02-2024 9:48PM
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }


            //24-02-2024 10:06PM
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }

            //24-02-2024 10:50PM
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }

            //25-02-2024 8:51AM
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }

            //25-02-2024 10:11AM
            if (isset($_GET['edit_brands'])) {
                include('edit_brands.php');
            }

            //25-02-2024 10:32AM
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }

            //25-02-2024 2:57PM
            if (isset($_GET['delete_brands'])) {
                include('delete_brands.php');
            }
            
            //25-02-2024 3:58PM
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }

             //25-02-2024 4:48PM
             if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
           

              //25-02-2024 7:33PM
              if (isset($_GET['list_users'])) {
                include('list_users.php');
            }

             //26-02-2024 8:13PM
             if (isset($_GET['delete_users'])) {
                include('delete_users.php');
            }

              //26-02-2024 9:00PM
              if (isset($_GET['delete_orders'])) {
                include('delete_orders.php');
            }

             //26-02-2024 9:23PM
             if (isset($_GET['delete_payments'])) {
                include('delete_payments.php');
            }

            ?> <!-- PHP codes -->
        </div>

        <!-- <div class="bg-info p-3 text-center footer1 container-fluid">
            <p>All rights reserved Designed by Karthik 2024</P>
        </div> -->
        <?php
        include("../includes/footer.php"); //23-02-2024 7:53PM
        
        ?>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- 25-02-2024 3:16PM -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>