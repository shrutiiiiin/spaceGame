<?php
 require("config.php");
//  $username = $email =$password = $confirmPassword = "" ;
//  $username_err = $email_err = $password_err = $confirm_password_err = "";
 if($_SERVER ['REQUEST_METHOD']== "POST")
 {
    // $username= $_POST['username'];
    // $email= $_POST['email'];
    // $password= $_POST['password'];


    //check if username is empty

    // if(empty($_POST['username']))
    // {
    //     $username_err = "Username is required";
    // }
    // else{
    //     $sql = 'SELECT * FROM registration WHERE username = ?';
    //     $stmt = mysqli_prepare($conn , $sql);
    //     if($stmt)
    //     {

    //         $stmt->bind_param('s' , $_POST['username']); // $binding the parameters with stmt
    //         $stmt->execute(); //try to excute the statement
    //         $stmt->store_result(); // store the result in $stmt
    //         if($stmt->num_rows == 1) // checking if the username is already taken
    //         {
    //             $username_err = "This username is already taken";
    //         }
    //         else
    //         {
    //             $username = trim($_POST['username']);
    //         }
    //     }
    //     else{
    //         echo "Something went wrong";
    //     }
    // }

    // mysqli_stmt_close($stmt);
    
    // //check if email is empty
    // if(empty($_POST['email']))
    // {
    //         $email_err = "Email is required";
    // }
    // else{
    //         $sql = 'SELECT * FROM registration WHERE email = ?';
    //         $stmt = mysqli_prepare($conn , $sql);
    //         if($stmt)
    //         {
    //             $stmt->bind_param('s' , $_POST['email']); // $binding the parameters with stmt
    //             $stmt->execute(); //try to excute the statement
    //             $stmt->store_result(); // store the result in $stmt
    //             $email = test_input($_POST["email"]);
    //             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    //             {
    //                 $emailErr = "Invalid email format";
    //             }
    //             else
    //             {
    //                 $email = trim($_POST['email']);
    //             }
                
    //         }
    //         else{
    //             echo "Something went wrong";
    //         }
    //     }
    // mysqli_stmt_close($stmt); 

    // //check if password is empty
    // if(empty($_POST['password']))
    // {
    //     $password_err = " password is required, field is empty";
    // }
    // elseif(strlen($_POST['password'])<8)
    // {
    //     $password_err = " password cannot be less than 8 characters";
    // }
    // else
    // {
    //     $password = trim ($_POST['password']);
    // }

    // //check if confirm password is same as password
    // if(trim($_POST['confirm_password_err']) != trim($_POST['password_err']))
    // {
    //     $password_err = " password should match";
    // }
    // // If there were no errors, go ahead and insert into the database
    // if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
    // {
    //     $sql = "INSERT INTO registration (username , email, password ) VALUES (?, ? , ?)";
    //     $stmt = mysqli_prepare($conn, $sql);
    //     if ($stmt)
    //     {
    //         $stmt->bind_param('sss' , $param_username , $param_email , $param_password);

    //         $param_username = $username ;
    //         $param_email = $email;
    //         $param_password = password_hash($password ,PASSWORD_DEFAULT);
    //         if($stmt->excute())
    //         {
    //             header("location: login.php");
    //         }
    //         else{
    //             echo " something went wrong... cannot redirect";
    //         }
            
    //     }
    //     mysqli_stmt_close($stmt);
    // }  

    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];

    $sql = "INSERT INTO `gamespace`.`registration` ( `username`, `email`, `password`, `created_at`) VALUES ( '$username', '$email', '$password', current_timestamp());";
    $result= mysqli_query($conn, $sql);
    if ($result) {
        echo "Update successful!";
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }

    mysqli_commit($conn);
    mysqli_autocommit($conn, true);
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    if (!$result) 
        {
            die("Update query failed: " . mysqli_error($conn));
        }
        $conn->close();

    // mysqli_stmt_close($stmt);
    }
?>
