<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $lemail = $_SESSION['lemail'];
    $noticeid = $_GET['notice'];
} else {
    echo "<script> location.href='index.php' </script>";
}

include("../dbconnection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="all.min.css">
    <title>Notice Description</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap');

        body {
            font-family: 'Comic Neue', cursive;
        }
    </style>
</head>
<?php

$sql = "SELECT * FROM user_signup WHERE user_email = '$lemail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<?php

//Query for dispalying notice no.
$sql2 = "SELECT * FROM notice WHERE notice_id = '$noticeid'";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
 
?>
<body>
    <nav class="navbar navbar-expand-sm  bg-info navbar-dark fixed-top p-3">
        <a href="" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="jumbotron">
            <h2 class="text-center text-danger"> Notice No. - <?php if(isset($noticeid)){echo $noticeid;}?></h2>
            <h2 class="text-center">Yasveshu Homes</h2>
            <h4 class="mt-4"> Date Published - <span class="text-danger"><?php if(isset($row2['notice_date'])){echo $row2['notice_date'];}?></span></h4>
            <h4 class="mt-2"> Title - <span class="text-danger"><?php if(isset($row2['notice_title'])){echo $row2['notice_title'];}?></span></h4>
            <h4 class="mt-2"> Description - <span class="text-danger"><?php if(isset($row2['notice_desc'])){echo $row2['notice_desc'];}?></span></h4>
            <h5 class="mt-4">Sneh,</h3>
            <p>(Secretary -  Yaveshu Homes)</p>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            offset: 10,
            duration: 1100
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="all.min.js"></script>
</body>

</html>