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

    <title>User Profile</title>
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
            <h2 class="text-center text-dark font-weight-bolder">Profile Section</h2>
            <h2 class="text-center text-info">You can Complete and Update your profile from here</h2>
            <h3 class="text-center"><?php if (isset($row['user_name'])) {echo $row['user_name'];} ?> - <?php if (isset($row['user_flatno'])) { echo $row['user_flatno']; } ?></h3>
        </div>
    </div>

    <?php

    $sql = "SELECT * FROM user_profile WHERE user_email = '$lemail' LIMIT 1";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $row2 = mysqli_fetch_assoc($result);
    if($num == 1){
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        if (!empty($_POST['memid']) && !empty($_POST['memname']) && !empty($_POST['memflat']) && !empty($_POST['mememail']) && !empty($_POST['memadd1']) && !empty($_POST['memadd2']) && !empty($_POST['memcity']) && !empty($_POST['memmobile']) && !empty($_POST['memtotal'])) {
            $userid = $_POST['memid'];
            $username = $_POST['memname'];
            $userflatno =  $_POST['memflat'];
            $useremail = $_POST['mememail'];
            $useradd1 = $_POST['memadd1'];
            $useradd2 = $_POST['memadd2'];
            $usercity = $_POST['memcity'];
            $usermobile = $_POST['memmobile'];
            $usertotal = $_POST['memtotal'];

            $sql = "UPDATE user_profile SET user_email='$useremail', user_add1='$useradd1', user_add2='$useradd2', user_city='$usercity', user_number='$usermobile', user_members='$usertotal'";
            $result2 = mysqli_query($conn, $sql);
            if ($result) {
                $resmg =  "<div class='alert alert-success text-center font-weight-bold mt-3 h5'>Success! Updated Successfully</div>";
            } else {
                $resmg = "<div class='alert alert-danger text-center font-weight-bold mt-3 h5'>Error! Something went wrong</div>";
            }
        } else {
            $resmg =  "<div class='alert alert-warning text-center font-weight-bold mt-3 h5'>Error! Fill all Credentials</div>";
        }
    }
  echo "<div class='container jumbotron bg-dark' id='profile1'>
        <h3 class='text-center text-warning font-weight-bolder' style='border-bottom: 1px solid yellow; width:fit-content'>Update Your Profile if any Information is changed</h3>
        <h5 class='text-danger'>* represent readonly input</h5>
        <form action='' class='mx-2 mt-4 font' method='POST'>
            <div class='form-row'>
                <div class='form-group col-sm-2'>
                    <label for='' class='font-weight-bold text-warning'>Id <span class='text-danger'> *</span</label>
                    <input type='text' class='form-control font-weight-bold bg-white' name='memid' value='"; if (isset($row2['user_id'])) {echo $row2['user_id'];} echo"'"; echo "readonly>
                </div>
                <div class='form-group col-sm-4'>
                    <label for='' class='font-weight-bold text-warning'>Name <span class='text-danger'> *</span</label>
                    <input type='text' class='form-control font-weight-bold bg-white' name='memname' value='";if (isset($row2['user_name'])) {echo $row2['user_name']; } echo"'"; echo "readonly>
                </div>
                <div class='form-group col-sm-2'>
                    <label for='' class='font-weight-bold text-warning'>Flatno. <span class='text-danger'> *</span</label>
                    <input type='text' class='form-control font-weight-bold bg-white' name='memflat' value='"; if (isset($row2['user_flatno'])) {echo $row2['user_flatno'];} echo"'"; echo "readonly>
                </div>
                <div class='form-group col-sm-4'>
                    <label for='' class='font-weight-bold text-warning'>Email <span class='text-danger'> *</span</label>
                    <input type='email' class='form-control font-weight-bold bg-white' name='mememail' value='"; if (isset($row2['user_email'])) {echo $row2['user_email'];} echo"'"; echo ">
                </div>
            </div>
            <div class='form-row'>
                <div class='form-group col-sm-6'>
                    <label for='' class='font-weight-bold text-warning'>Address Line 1</label>
                    <input type='text' class='form-control font-weight-bolder' name='memadd1' value='"; if (isset($row2['user_add1'])) {echo $row2['user_add1'];} echo"'"; echo ">
                </div>
                <div class='form-group col-sm-6'>
                    <label for='' class='font-weight-bold text-warning'>Address Line 2</label>
                    <input type='text' class='form-control font-weight-bolder' name='memadd2' value='"; if (isset($row2['user_add2'])) {echo $row2['user_add2'];} echo"'"; echo ">
                </div>
            </div>
            <div class='form-row'>
                <div class='form-group col-sm-4'>
                    <label for='' class='font-weight-bold text-warning'>City</label>
                    <input type='text' class='form-control font-weight-bolder' name='memcity' value='"; if (isset($row2['user_city'])) {echo $row2['user_city'];} echo"'"; echo ">
                </div>
                <div class='form-group col-sm-4'>
                    <label for='' class='font-weight-bold text-warning'>Mobile No</label>
                    <input type='number' class='form-control font-weight-bolder' name='memmobile' value='"; if (isset($row2['user_number'])) {echo $row2['user_number'];} echo"'"; echo ">
                </div>
                <div class='form-group col-sm-4'>
                    <label for='' class='font-weight-bold text-warning'>Total Memebers</label>
                    <input type='number' class='form-control font-weight-bolder' name='memtotal' value='"; if (isset($row2['user_members'])) {echo $row2['user_members'];} echo"'";echo ">
                </div>
            </div>
            <button class='btn btn-info' type='submit' name='update'>Update</button>
            <a href='../userdashboard.php' class='btn btn-info'>Back to Dashboard</a>";
             if (isset($resmg)) {
                echo $resmg;
            } 
        echo"</form>
    </div>";
    }else{

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        if (!empty($_POST['memid']) && !empty($_POST['memname']) && !empty($_POST['memflat']) && !empty($_POST['mememail']) && !empty($_POST['memadd1']) && !empty($_POST['memadd2']) && !empty($_POST['memcity']) && !empty($_POST['memmobile']) && !empty($_POST['memtotal'])) {
            $userid = $_POST['memid'];
            $username = $_POST['memname'];
            $userflatno =  $_POST['memflat'];
            $useremail = $_POST['mememail'];
            $useradd1 = $_POST['memadd1'];
            $useradd2 = $_POST['memadd2'];
            $usercity = $_POST['memcity'];
            $usermobile = $_POST['memmobile'];
            $usertotal = $_POST['memtotal'];

            $sql = "INSERT INTO user_profile(user_id, user_name, user_email, user_flatno, user_add1, user_add2, user_city, user_number, user_members) VALUES ('$userid', '$username', '$useremail', '$userflatno', '$useradd1', '$useradd2', '$usercity', '$usermobile', '$usertotal')";
            $result2 = mysqli_query($conn, $sql);
            if ($result) {
                $resmg =  "<div class='alert alert-success text-center font-weight-bold mt-3 h5'>Success! Added Successfully, Please wait...</div>";
                echo "<script> setTimeout(function(){
                     location.reload();
                },2000);</script>";
            } else {
                $resmg = "<div class='alert alert-danger text-center font-weight-bold mt-3 h5'>Error! Something went wrong</div>";
            }
        } else {
            $resmg =  "<div class='alert alert-warning text-center font-weight-bold mt-3 h5'>Error! Fill all Credentials</div>";
        }
    }
    echo"   <div class='container jumbotron bg-dark' id='profile1'>
                    <h3 class='text-center text-warning font-weight-bolder' style='border-bottom: 1px solid yellow; width:fit-content'>Complete Your Profile</h3>
                    <h5 class='text-white mt-4'>( * represent readonly input )</h5>
                    <form action='' class='mx-2 mt-4 font' method='POST'>
                        <div class='form-row'>
                            <div class='form-group col-sm-2'>
                                <label for='' class='font-weight-bold text-warning'>Id <span class='text-white'> *</span</label>
                                <input type='text' class='form-control font-weight-bold bg-white' name='memid' value='"; if (isset($row['user_id'])) {echo $row['user_id'];} echo"'"; echo "readonly>
                            </div>
                            <div class='form-group col-sm-4'>
                                <label for='' class='font-weight-bold text-warning'>Name<span class='text-white'> *</span</label>
                                <input type='text' class='form-control font-weight-bold bg-white' name='memname' value='";if (isset($row['user_name'])) {echo $row['user_name'];} echo"'"; echo "readonly>
                            </div>
                            <div class='form-group col-sm-2'>
                                <label for='' class='font-weight-bold text-warning'>Flatno.<span class='text-white'> *</span</label>
                                <input type='text' class='form-control font-weight-bold bg-white' name='memflat' value='"; if (isset($row['user_flatno'])) {echo $row['user_flatno'];} echo"'"; echo "readonly>
                            </div>
                            <div class='form-group col-sm-4'>
                                <label for='' class='font-weight-bold text-warning'>Email<span class='text-white'> *</span</label>
                                <input type='email' class='form-control font-weight-bold bg-white' name='mememail' value='"; if (isset($row['user_email'])) {echo $row['user_email'];} echo"'"; echo "readonly>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-sm-6'>
                                <label for='' class='font-weight-bold text-warning'>Address Line 1</label>
                                <input type='text' class='form-control font-weight-bolder' name='memadd1'>
                            </div>
                            <div class='form-group col-sm-6'>
                                <label for='' class='font-weight-bold text-warning'>Address Line 2</label>
                                <input type='text' class='form-control font-weight-bolder' name='memadd2'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-sm-4'>
                                <label for='' class='font-weight-bold text-warning'>City</label>
                                <input type='text' class='form-control font-weight-bolder' name='memcity'>
                            </div>
                            <div class='form-group col-sm-4'>
                                <label for='' class='font-weight-bold text-warning'>Mobile No</label>
                                <input type='number' class='form-control font-weight-bolder' name='memmobile'>
                            </div>
                            <div class='form-group col-sm-4'>
                                <label for='' class='font-weight-bold text-warning'>Total Memebers</label>
                                <input type='number' class='form-control font-weight-bolder' name='memtotal'>
                            </div>
                        </div>
                        <button class='btn btn-warning font-weight-bolder' type='submit' name='submit'>Submit</button>
                        <button class='btn btn-warning font-weight-bolder' type='submit'>Reset</button>";
                        if (isset($resmg)) {
                            echo $resmg;
                        } 
                    echo"</form>
             </div>";
    }

    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="all.min.js"></script>

</body>

</html>