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

    <title>Receipt</title>
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
</head>
<?php

//displaying data from user_signup table
$sql = "SELECT * FROM user_signup WHERE user_email = '$lemail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<body>
    <nav class="navbar navbar-expand-sm  font-weight-bolder navbar-dark fixed-top p-3 d-print-none" style="border-bottom:1px solid white;width:fit-content;">
        <a href="../userdashboard.php" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>
    <div class="container d-print-none" style="margin-top: 100px;">
        <div class="jumbotron">
            <h2 class="text-center text-dark font-weight-bolder">Receipt Section</h2>
            <h4 class="text-center text-info"> View your Previous Receipts</h4>
            <h3 class="text-center"><?php if (isset($row['user_name'])) { echo $row['user_name'];} ?> - <?php if (isset($row['user_flatno'])) { echo $row['user_flatno']; } ?></h3>
        </div>
    </div>

    <div class="container jumbotron shadow-lg bg-dark overflow-hidden">
        <?php if (isset($_GET['msg'])) {
            if ($_GET['msg'] === "1") {
                $remsg = "<div class='alert alert-danger font-weight-bold h5 text-center mt-3 d-print-none'>Your Previous transaction was cancelled</div>";
            } elseif ($_GET['msg'] === "2") {
                $remsg =  "<div class='alert alert-success font-weight-bold h5 text-center mt-3 d-print-none'>Your Transaction Was succesfull, Please click on Dashboard button to leave this page or Enter Transaction Id for Receipt</div>";
            } elseif ($_GET['msg'] === "3") {
                $remsg =  "<div class='alert alert-warning font-weight-bold h5 text-center mt-3 d-print-none'>Please Enter Transaction Id</div>";
            } elseif ($_GET['msg'] === "4") {
                $remsg =  "<div class='alert alert-warning font-weight-bold h5 text-center mt-3 d-print-none'>No Receipt Found, Please Enter valid Id</div>";
            }elseif ($_GET['msg'] === "5") {
                $receipt = $_SESSION['receipt'];
                $sql2 = "SELECT * FROM checkout WHERE check_pay_id = '$receipt' LIMIT 1";
                $result2 = mysqli_query($conn, $sql2);
                $num2 = mysqli_num_rows($result2);
                $row2 = mysqli_fetch_assoc($result2);
                $remsg =  "<div class='alert alert-success font-weight-bold h5 text-center mt-3 d-print-none'>You can print your receipt</div>";
                echo "<div class='container bg-white' style='border: 2px solid;'>
                    <h3 class='text-center mt-3 '>Yaveshu Homes</h3>
                    <h4 class='text-center text-info'>Maintenance Receipt</h4>
                    <div>
                    <h5 class='font-weight-bold'>Name - ";if (isset($row['user_name'])){ echo $row['user_name'];} echo "</h5>
                    <h5 class='font-weight-bold'> Date - "; if (isset($row2['check_date'])){ echo $row2['check_date']; } echo "</h5>
                    <h5 class='font-weight-bold'> Flat No. - ";if (isset($row['user_flatno'])){ echo $row['user_flatno']; } echo "</h5>
                    <h5 class='mt-3'>Received with thanks from <span class='text-info'>"; if (isset($row['user_name'])){ echo $row['user_name']; } echo " </span> Sum of Rs. <span class='text-info'>"; if (isset($row2['check_amount'])){ echo $row2['check_amount']; } echo " </span> by Online Payment from Yaveshu Payment Page with transaction Id <span class ='text-info'>"; if (isset($row2['check_pay_id'])){ echo $row2['check_pay_id']; } echo "</span> towards monthly Subscription as maintenance charge for the month of <span class='text-info'>"; if (isset($row2['check_pay_month'])){ echo $row2['check_pay_month']; } echo"</span>.</h5>
                    <h5 class='font-weight-bold mt-3'> Rupees - ";if (isset($row2['check_amount'])){ echo $row2['check_amount']; } echo "</h5>
                    <h5 class='text-dark mt-3'>Sneh,</h5>
                    <p class='text-dark'>(Secretary - Yaveshu Homes)</p>
                    </div>
                </div>";
                echo "<div class='text-center d-print-none mt-5'>
                        <button class='btn btn-warning font-weight-bolder' onclick='window.print();'>Print</button>
                        <a href='../userdashboard.php'><button class='btn btn-warning font-weight-bolder'>Back To Dashboard</button></a>
                    </div>";
            }
        } ?>
        <?php if (isset($remsg1)) {
            echo $remsg1;
        } elseif (isset($remsg)) {
            echo $remsg;
        }
        ?>
        <h2 class="text-center text-warning font-weight-bolder d-print-none" style='border-bottom: 1px solid yellow; width:fit-content'>View Previous Receipt</h2>
        <form action="" method="POST" class="d-print-none">
            <div class="form-group mt-4 ">
                <h4 class=" text-warning text-center font">Enter Transaction Id</h4>
                <input type="text" class="form-control mt-3 col-md-5 ml-auto mr-auto" name="receipt">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-warning font-weight-bolder">Search</button>
            </div>
        </form>
    </div>
        <?php
      if(isset($_POST['receipt'])){
        if(!empty($_POST['receipt'])){
            $receipt = mysqli_real_escape_string($conn, trim($_POST['receipt']));
            $sql2 = "SELECT * FROM checkout WHERE check_pay_id = '$receipt' LIMIT 1";
            $result2 = mysqli_query($conn,$sql2);
            $num2 = mysqli_num_rows($result2);
            $row2 = mysqli_fetch_assoc($result2);
            if($num2 === 1){
                $_SESSION['receipt'] = $receipt;
                 echo "<script> location.href = 'receiptpage.php?msg=5' </script>";
            }else{
                echo "<script> location.href = 'receiptpage.php?msg=4' </script>";
            }
        }else{
           echo "<script> location.href = 'receiptpage.php?msg=3' </script>";
        }
      }
      
    ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="all.min.js"></script>
</body>

</html>