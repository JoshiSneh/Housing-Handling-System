<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $lemail = $_SESSION['lemail'];
} else {
    echo "<script> location.href='index.php' </script>";
}

include("dbconnection.php");
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

    <title>User Dashboard</title>
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

<body>
    <nav class="navbar navbar-expand-sm  bg-info navbar-dark fixed-top p-3">
        <a href="" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="jumbotron">
            <h2 class="text-center text-info font-weight-bolder">Welcome To Yaveshu Homes</h2>
            <h3 class="text-center"><?php if (isset($row['user_name'])) {echo $row['user_name'];} ?> - <?php if (isset($row['user_flatno'])) { echo $row['user_flatno']; } ?></h3>
            <h4 class="text-center text-info">You can access our Dashboard from here</h4>
        </div>
    </div>
    <div class="container my-5">
        <!-- Row 1 Start -->
        <h5></h5>
        <div class="row mx-2">
            <div class="col-lg-3 col-sm-3 mt-3">
                <div class="card shadow-lg" style="border: 2px solid #5bc0de;">
                    <div class="card-body text-center">
                        <a href="payment/payment.php"><i class="fas fa-rupee-sign fa-7x text-info"></i></a>
                        <div class="card-title mt-4">
                            <h4 class="font-weight-bolder">Payment</h4>
                        </div>
                        <div class="card-text text-info">
                            <h5> Pay your monhtly maintenance </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 mt-3">
                <div class="card shadow-lg" style="border: 2px solid #5cb85c;">
                    <div class="card-body text-center" >
                        <a href="userpanel/profile.php"><i class="fas fa-user-circle fa-7x text-success"></i></a>
                        <div class="card-title mt-4">
                            <h4 class="font-weight-bolder">Profile</h4>
                        </div>
                        <div class="card-text text-success">
                            <h5> Update and Complete your profile </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 mt-3">
                <div class="card shadow-lg" style="border: 2px solid #d9534f;">
                    <div class="card-body text-center">
                        <a href="userpanel/complain.php"><i class="fas fa-thumbs-down fa-7x text-danger"></i></a>
                        <div class="card-title mt-4">
                            <h4 class="font-weight-bolder">Complain</h4>
                        </div>
                        <div class="card-text text-danger">
                            <h5>Register your complain here </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 mt-3">
                <div class="card shadow-lg" style="border: 2px solid #5bc0de;">
                    <div class="card-body text-center">
                        <a href="userpanel/notice.php"><i class="fas fa-envelope-open-text fa-7x text-info"></i></a>
                        <div class="card-title mt-4">
                            <h4 class="font-weight-bolder">Notice</h4>
                        </div>
                        <div class="card-text text-info">
                            <h5> Notices regarding Society </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row 1 End -->
        <!-- Row 2 Start -->
        <div class="row mx-2">
            <div class="col-lg-3 col-sm-3 mt-3">
                <div class="card shadow-lg" style="border: 2px solid #343a40;">
                    <div class="card-body text-center">
                        <a href="userpanel/contacts.php"><i class="fas fa-address-book fa-7x text-dark"></i></a>
                        <div class="card-title mt-4">
                            <h4 class="font-weight-bolder">Contact</h4>
                        </div>
                        <div class="card-text text-dark">
                            <h5> Emergeny contacts </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 mt-3">
                <div class="card shadow-lg" style="border: 2px solid #ffc107;">
                    <div class="card-body text-center">
                        <a href="userpanel/message.php"><i class="fas fa-envelope fa-7x text-warning"></i></a>
                        <div class="card-title mt-4">
                            <h4 class="font-weight-bolder">Message</h4>
                        </div>
                        <div class="card-text text-warning">
                            <h5> Message Section </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 mt-3">
                <div class="card shadow-lg" style="border: 2px solid #868e96;">
                    <div class="card-body text-center">
                        <a href="userpanel/facilities.php"><i class="fas fa-home fa-7x text-secondary"></i></a>
                        <div class="card-title mt-4">
                            <h4 class="font-weight-bolder">Facility</h4>
                        </div>
                        <div class="card-text text-secondary">
                            <h5> Amenities we offer</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 mt-3">
                <div class="card shadow-lg" style="border: 2px solid #007bff;">
                    <div class="card-body text-center">
                        <a href="logout.php"><i class="fas fa-sign-out-alt fa-7x text-primary"></i></a>
                        <div class="card-title mt-4">
                            <h4 class="font-weight-bolder">Logout</h4>
                        </div>
                    </div>
                </div>
            </div>
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