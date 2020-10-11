<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    $lemail = $_SESSION['lemail'];
    $id = $_SESSION['id'];
    $month = $_SESSION['month'];
    $date = $_SESSION['date'];
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
    <meta name="GENERATOR" content="Evrsoft First Page">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="all.min.css">

    <title>Checkout</title>
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
    </style>
</head>
<?php

//displaying data from user_signup table
$sql = "SELECT * FROM user_signup WHERE user_email = '$lemail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<body>
    <nav class="navbar navbar-expand-sm font-weight-bolder navbar-dark fixed-top p-3" style="border-bottom:1px solid white;width:fit-content;">
        <a href="../userdashboard.php" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="jumbotron">
            <h2 class="text-center text-dark font-weight-bolder">Checkout Window</h2>
            <h4 class="text-center text-info"> Your transaction are always safe with us</h4>
            <h3 class="text-center"><?php if (isset($row['user_name'])) {  echo $row['user_name']; } ?> - <?php if (isset($row['user_flatno'])) {  echo $row['user_flatno']; } ?></h3>
        </div>
    </div>
    <?php

    //If user has press cancel button
    //   if($_SERVER['REQUEST_METHOD'] === "POST"){
    //     if(isset($_POST['cancel'])){
    //        $sql = "DELETE FROM checkout WHERE check_pay_month = '$month' AND check_user_id = '$id' AND pay_date = '$date'";
    //        $result = mysqli_query($conn,$sql);
    //        if($result){}
    //            $remsg = "<div class='alert alert-warning font-weight-bold h5 text-center'>Redirecting to Payment Page...</div>";
    //            echo "<script> setTimeout(function(){
    //                location.href = 'payment.php?msg=1';
    //            },2000)</script>";
    //     }else{
    //         $remsg = "<div class='alert alert-danger font-weight-bold h5 text-center'>Something Went Wrong</div>";
    //     }
    //   }

    ?>
    <div class="container jumbotron bg-dark">
        <form action="" class="font-weight-bold">
            <div class='alert alert-warning font-weight-bold h5 text-center my-3' style="display: none;" id="alert">Redirecting to Payment Page...</div>
            <h3 class="text-center text-warning" style="border-bottom: 1px solid yellow; width:fit-content">Yaveshu homes Payment Page</h3>
            <h3><?php if (isset($remsg)) {
                    echo $remsg;
                } ?></h3>
            <div class="form-row mt-5">
                <div class="form-group col-sm-6">
                    <label for="" class="text-warning">Payment Month</label>
                    <input class="form-control font-weight-bold bg-white" value="<?php if (isset($month)) {echo  $month;} ?>" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="text-warning">Payment Date</label>
                    <input class="form-control font-weight-bold bg-white" value="<?php if (isset($date)) { echo $date; } ?>" readonly>
                </div>
            </div>
        </form>
        <form method="post" action="../PaytmKit/pgRedirect.php" class="font-weight-bold">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="" class="text-warning">Transaction Id <span class="text-wahite">(Keep this for Online Receipt)</span></label>
                    <input id="ORDER_ID" tabindex="1" maxlength="20" class="form-control font-weight-bold bg-white" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="text-warning">Member Email</label>
                    <input id="CUST_ID" tabindex="2" maxlength="12" size="12" class="form-control font-weight-bold bg-white" name="CUST_ID" autocomplete="off" value="<?php if (isset($lemail)){
                    echo $lemail;} ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="" class="text-warning">Platform Type</label>
                    <input id="CHANNEL_ID" tabindex="4" maxlength="12" class="form-control font-weight-bold bg-white" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="text-warning">Total Amount</label>
                    <input title="TXN_AMOUNT" tabindex="10" type="text" class="form-control font-weight-bold bg-white" name="TXN_AMOUNT" value="4000" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <!-- <label for="">Industry Type</label> -->
                    <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" class="form-control" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" type="hidden">
                </div>
            </div>
            <div>
                <input value="Checkout" type="submit" onclick="" class="btn btn-warning font-weight-bolder">
            </div>

        </form>
        <div class="mt-3 mb-3"> <button class="btn btn-warning font-weight-bolder" onclick="backfunction()">Cancel Payment</button></div>
        <p class="text-white font-weight-bolder">Note: Complete payment by clicking Checkout button</p>
        <p class="text-white font-weight-bolder">Keep your Trasnsaction Id for receipt generation</p>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="all.min.js"></script>
    <script>
        function backfunction() {
            var art = document.getElementById('alert');
            art.style.display = "block";
            setTimeout(function() {
                location.href = "payment.php?msg=1";
            }, 1500)
        }
    </script>

</body>

</html>