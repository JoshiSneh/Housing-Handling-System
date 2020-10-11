<?php
include("dbconnection.php");
if(!isset($_SESSION['loggedin'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['uemail']) && !empty($_POST['upass'])) {
            $lemail = mysqli_real_escape_string($conn, trim($_POST['uemail']));
            $lpass = mysqli_real_escape_string($conn, trim($_POST['upass']));
            $sql = "SELECT user_email, user_pass FROM `user_signup` WHERE user_email= '$lemail' AND user_pass= '$lpass' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['lemail'] = $lemail;
                $sql = "SELECT * FROM user_signup WHERE user_email = '$lemail'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['flat'] = $row['user_flatno'];
                echo "<script> location.href='userdashboard.php' </script>";
            } else {
                header("location: index.php?msg=4");
            }
        } else {
            header("location: index.php?msg=3");
        }
    }
}else{
    echo "<script> location.href='userdashboard.php' </script>";
}
