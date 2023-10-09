<?php
//this is the login page
session_start();
//check if the username is already set
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
}
else
{
    require_once("config.php"); //making connection w database
}

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }
    if(empty($err))
    {
        $sql = "SELECT id, username, password FROM registration WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql); //imp step t define $stmt
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;
        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
        {
            mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
            if(mysqli_stmt_fetch($stmt))
            {
                if(password_verify($password, $hashed_password))
                {
                    // this means the password is corrct. Allow user to login
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["id"] = $id;
                    $_SESSION["loggedin"] = true;

                    //Redirect user to welcome page
                    header("location: welcome.php");
                    
                }
            }

        }

}
}    


}


?>
