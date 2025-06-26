<?php 

session_start();
session_unset(); //26-02-2024 7:56PM
session_destroy();

echo "<script>window.open('../index.php','_self')</script>";


?>