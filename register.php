<?php
<<<<<<< HEAD
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
=======
// Database connection parameters
$host = "localhost"; // Your database host
$username = "root"; // Your database username
$password = " "; // Your database password
$database = "test"; // Your database name

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize input data
function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = sanitize($_POST["username"]);
    $email = sanitize($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security

    // Insert user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful
        header("Location: success.php"); // Redirect to a success page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
x
>>>>>>> 246873dce28bc27c1b10207b2937436f23f28f73
