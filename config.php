<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/
    $DB_SERVER = 'localhost';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'gamespace';

// Try connecting to the Database
$conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}
else
{
    echo " connected successfully";
}



?>
