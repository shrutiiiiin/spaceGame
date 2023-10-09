<?php
require_once("config.php");
// $insert = false;
if(isset($_POST['name'])){
    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];

    $sql = "INSERT INTO `gamespace`.`registration` ( `username`, `email`, `password`, `created_at`) VALUES ( '$username', '$email', '$password', current_timestamp());";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    // echo $sql;

}
?>
