<?php
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  //db connection
  $conn = new mysqli ('localhost', 'root', '', 'test');
  if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
  }
  else
  {
    $stmt = $conn->prepare("insert into login (email,password) values(?,?)");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    echo "success";
    $stmt->close();
    $conn->close();
    // header("Location: login.php");
  }
?>