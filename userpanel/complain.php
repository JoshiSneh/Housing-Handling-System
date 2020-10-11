<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $lemail = $_SESSION['lemail'];
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

    <title>Complain</title>
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
    <nav class="navbar navbar-expand-sm font-weight-bolder navbar-dark fixed-top p-3" style='border-bottom: 1px solid white; width:fit-content'>
        <a href="../userdashboard.php" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="jumbotron">
            <h2 class="text-center text-dark font-weight-bolder">Complain Window</h2>
            <h4 class="text-center text-info"> Your complain will be sent to Secretary</h4>
            <h3 class="text-center"><?php if (isset($row['user_name'])) { echo $row['user_name']; } ?> - <?php if (isset($row['user_flatno'])) { echo $row['user_flatno'];  } ?></h3>
        </div>
    </div>

    <?php
    //displaying user info
    $sql = "SELECT * FROM user_signup WHERE user_email = '$lemail' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);


    // Submiting data in to database
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['comptitle']) && !empty($_POST['compdesc']) && !empty($_POST['compdate']) && !empty($_POST['compnumber'])) {
            $compby = $_POST['compby'];
            $compflat = $_POST['compflat'];
            $comptitle = $_POST['comptitle'];
            $compdesc = $_POST['compdesc'];
            $compdate = $_POST['compdate'];
            $compnumber = $_POST['compnumber'];
            $sql = "INSERT INTO `complain` (`comp_by`, `comp_flatno`, `comp_title`, `comp_desc`, `comp_number`, `comp_date`) VALUES ( '$compby', '$compflat', '$comptitle', '$compdesc', '$compnumber', '$compdate');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $remsg = "<div class='alert alert-success text-center font-weight-bold mt-3 h5
                '>Complain sent Successfully</div>";
            } else {
                $remsg = "<div class='alert alert-danger text-center font-weight-bold mt-3 '>Something went wrong</div>";
            }
        } else {
            $remsg = "<div class='alert alert-warning text-center font-weight-bold mt-3 '>Fill all details before sending</div>";
        }
    }
    ?>

    <div class="container jumbotron bg-dark">
        <form action="" method="Post" class="mx-2">
            <h2 class="text-center text-warning font-weight-bolder" style='border-bottom: 1px solid yellow; width:fit-content'>Register Complain</h2>
            <?php if (isset($remsg)) {
                echo $remsg;
            } ?>
            <div class="form-row my-4">
                <div class="form-group col-sm-6">
                    <label for="" class="font-weight-bold text-warning"> Your Name</label>
                    <input type="text" class="form-control font-weight-bold" name="compby" value="<?php if (isset($row['user_name'])) { echo $row['user_name']; } ?>" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="font-weight-bold text-warning">Your flatno.</label>
                    <input type="text" class="form-control font-weight-bold" name="compflat" value="<?php if (isset($row['user_flatno'])) { echo $row['user_flatno']; } ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="" class="font-weight-bold text-warning"> Complain Title</label>
                    <input type="text" class="form-control font-weight-bolder" name="comptitle">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="font-weight-bolder text-warning"> Complain Description</label>
                <textarea name="compdesc" id="" cols="30" rows="6" class="form-control font-weight-bolder"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="" class="font-weight-bold text-warning"> Complain Date</label>
                    <input type="date" class="form-control font-weight-bolder" name="compdate">
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="font-weight-bold text-warning"> Mobile no.</label>
                    <input type="number" class="form-control font-weight-bolder" name="compnumber">
                </div>
            </div>
            <button class="btn btn-warning font-weight-bolder" name="submit" type="submit">Submit</button>
            <a href='../userdashboard.php' class='btn btn-warning font-weight-bolder'>Back to Dashboard</a>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="all.min.js"></script>

</body>

</html>