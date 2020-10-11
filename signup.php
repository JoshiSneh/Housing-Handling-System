<?php
 
include("dbconnection.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['flat'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $flat = $_POST['flat'];

    $sql = "INSERT INTO user_signup(user_name, user_email, user_flatno, user_pass) VALUES( '$username' , '$email', '$flat' ,'$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
       header("location: index.php?msg=1");
    }
  } else {
    header("location: index.php?msg=2");
  }
}
?>