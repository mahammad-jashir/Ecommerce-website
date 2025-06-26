<?php 

session_start();
session_unset(); //9-02-2024 8:15PM
session_destroy();

echo "<script>window.open('../index.php','_self')</script>";


?>