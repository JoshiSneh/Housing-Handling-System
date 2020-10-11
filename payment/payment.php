<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $lemail = $_SESSION['lemail'];
    $id = $_SESSION['id'];
} else {
    echo "<script> location.href='../index.php' </script>";
}

include("../dbconnection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="all.min.css">

    <title>Payment</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap');

        body {
            font-family: 'Comic Neue', cursive;
            background: #FDC830;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #F37335, #FDC830);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #F37335, #FDC830);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .hidden {
            display: none;
        }
    </style>
    <?php 
       if(isset($_GET['msg'])){
         if ($_GET['msg'] === "1") {
            echo "<script type='text/javascript'> 
				window.history.forward(); 
			  </script> ";
          }
       }
   ?>
</head>
<?php

//displaying data from user_signup table
$sql = "SELECT * FROM user_signup WHERE user_email = '$lemail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<body>
    <nav class="navbar navbar-expand-sm  font-weight-bolder navbar-dark fixed-top p-3" style="border-bottom:1px solid white;width:fit-content;">
        <a href="../userdashboard.php" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="jumbotron">
            <h2 class="text-center text-dark font-weight-bolder">Payment Window</h2>
            <h4 class="text-center text-info"> You can pay your monthly maintenance from here</h4>
            <h3 class="text-center"><?php if (isset($row['user_name'])) { echo $row['user_name'];} ?> - <?php if (isset($row['user_flatno'])) { echo $row['user_flatno'];
                                            } ?></h3>
        </div>
    </div>

    <?php


    // checking if user has already paid or not;

    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $paymonth = $_POST['paymonth'];
        $sql2 = "SELECT * FROM checkout WHERE check_user_id = '$id' AND check_pay_month = '$paymonth'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $num2 = mysqli_num_rows($result2);

        if ($num2 === 1) {
            $remsg1 = "<div class='alert alert-warning text-center font-weight-bold mt-3 h5'>You have already paid for Present Month</div>";
        } else {
            $paymonth = $_POST['paymonth'];
            $paydate = $_POST['paydate'];
            $remsg1 = "<div class='alert alert-success text-center font-weight-bold mt-3 h5 '>Redirecting to Checkout Page Please Wait....</div>";
            $_SESSION['month'] = $paymonth;
            $_SESSION['date'] = $paydate;
            echo "<script> setTimeout(function(){
                 location.href = 'checkout.php';
                 },1900)</script>";
        }
    }
    ?>


    <div class="container jumbotron shadow-lg bg-dark">
        <?php if (isset($_GET['msg'])) {
            if ($_GET['msg'] === "1") {
                $remsg = "<div class='alert alert-danger font-weight-bold h5 text-center mt-3 none'>Your Previous transaction was cancelled</div>";
            } elseif ($_GET['msg'] === "2") {
                $remsg =  "<div class='alert alert-success font-weight-bold h5 text-center mt-3 none'>Your Transaction Was succesfull, Please click on Dashboard button to leave this page or Enter Transaction Id for Receipt</div>";
            }
        } ?>
        <?php if (isset($remsg1)) {
            echo $remsg1;
        } elseif (isset($remsg)) {
            echo $remsg;
        }
        ?>
        <div class="row">
            <div class="col-md-7">
                <form action="" method="Post" class="mx-2">
                    <h2 class="text-center text-warning">Pay your Maintenance</h2>
                    <div class="form-row mt-4">
                        <div class="form-group col-sm-6">
                            <h4 class=" text-white">Your Current Month</h4>
                            <input type="text" class="form-control mt-3 font-weight-bolder bg-white" name="paymonth" value="" id="month" readonly>
                        </div>
                        <div class="form-group col-sm-6">
                            <h4 class=" text-white">Date of Payment</h4>
                            <input type="text" name="paydate" class="form-control font-weight-bolder bg-white mt-3" id="date" value="" readonly>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-warning font-weight-bold" name="submit" type="submit">Proceed to checkout</button>
                    </div>
                </form>
                <div class="mx-2">
                    <a href='../userdashboard.php' class='btn btn-warning font-weight-bolder mt-4'>Back to Home</a>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <h2 class="text-center text-warning">View Previous Receipt</h2>
                <a href="receiptpage.php" class="btn btn-warning font-weight-bolder">Previous Receipts</a>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="all.min.js"></script>
    <script>
        // month
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";

        var d = new Date();
        var n = month[d.getMonth()];
        document.getElementById("month").value = n;

        // date

        var d1 = new Date();
        var n1 = d1.getDate();
        document.getElementById("date").value = n1;
    </script>
</body>

</html>