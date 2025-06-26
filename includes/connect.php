<!-- To connect our database -->

<?php
$con = mysqli_connect('localhost', 'root', '', 'mystore'); // database connection. localhost,username,password,database name


if(!$con){ //if not connection established display the error
    die(mysqli_error($con));    //To display error 
}




?>