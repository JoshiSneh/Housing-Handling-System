<?php
session_start();
if (isset($_SESSION['loggedin'])){
    $aemail = $_SESSION['aemail'];
}else {
    echo "<script> location.href='adminlogin.php' </script>";
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
    <link rel="stylesheet" href="../all.min.css">

    <title>Admin Panel</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap');
        body {
            font-family: 'Comic Neue', cursive;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top p-3">
        <a href="" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>

    <div class="container-fluid" style="margin-top: 85px;">
        <div class="row" style="margin: 40px;">
            <div class="col-md-3 shadow ">
                <h3 class="text-center mt-3">Admin Menu</h3>
                <nav class="col-sm-9  sidebar py-5  d-print-none">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column h5">
                            <li class="nav-item"><a href="adminpanel.php" class="nav-link active text-success"><i class="fas fa-user-circle text-success mr-2"></i>Dashboard</a></li>
                            <li class="nav-item"><a href="adminnotice.php" class="nav-link text-info"><i class="fas fa-envelope-open-text text-info mr-2"></i>Notice</a></li>
                            <li class="nav-item"><a href="admincomplain.php" class="nav-link text-danger"><i class="fas fa-thumbs-down mr-2"></i></i>Complain Management</a></li>
                            <li class="nav-item"><a href="assets.php" class="nav-link"><i class="fas fa-shopping-bag mr-2"></i></i></i>Assets</a></li>
                            <li class="nav-item"><a href="contacts.php" class="nav-link text-dark"><i class="fas fa-address-book mr-2"></i></i>Manage Members</a></li>
                            <li class="nav-item"><a href="checkpayment.php" class="nav-link text-secondary"><i class="fas fa-rupee-sign mr-2"></i></i>Check Payment</a></li>
                            <li class="nav-item"><a href="sellreport.php" class="nav-link"><i class="fas fa-table mr-2"></i></i>Sell Report</a></li>
                            <li class="nav-item"><a href="workreport.php" class="nav-link"><i class="fas fa-table mr-2"></i></i>Work Report</a></li>
                            <li class="nav-item"><a href="adminchangepassword.php" class="nav-link text-warning"><i class="fas fa-key mr-2"></i>Change Password</a></li>
                            <li class="nav-item"><a href="adminlogout.php" class="nav-link text-primary"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <?php
              
              if(isset($_POST['manageind'])){
                $id = $_POST['mid'];
                $sql = "SELECT * FROM user_profile WHERE user_id='$id'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
              }
            ?>
            <div class="container col-md-8 bg-dark">
                <h3 class="text-center mt-3 border-bottom text-warning font-weight-bolder" style="width: max-content;">Complete Details</h3>
                <div class="form-row mx-3 mt-4">
                    <div class="form-group  col-md-4">
                       <label for="" class="text-warning text h5">Name</label>
                       <input class="form-control font-weight-bolder" type="text" value="<?php if(isset($row['user_name'])){echo $row['user_name'];}?>">
                    </div>
                    <div class="form-group col-md-3">
                       <label for="" class="text-warning text h5">Flat No.</label>
                       <input class="form-control font-weight-bolder" type="text" value="<?php if(isset($row['user_name'])){echo $row['user_name'];}?>">
                    </div>
                    <div class="form-group col-md-4">
                       <label for="" class="text-warning text h5">Email</label>
                       <input class="form-control" type="email" value="<?php if(isset($row['user_name'])){echo $row['user_name'];}?>">
                    </div>
                </div>
                <div class="form-row mx-3 mt-4">
                    <div class="form-group  col-md-6">
                       <label for="" class="text-warning text h5">Address Line 1</label>
                       <input class="form-control" type="text" value="<?php if(isset($row['user_name'])){echo $row['user_name'];}?>">
                    </div>
                    <div class="form-group col-md-6">
                       <label for="" class="text-warning text h5">Address Line 2</label>
                       <input class="form-control" type="text" value="<?php if(isset($row['user_name'])){echo $row['user_name'];}?>">
                    </div>
                </div>
                <div class="form-row mx-3 mt-4">
                    <div class="form-group  col-md-4">
                       <label for="" class="text-warning text h5">City</label>
                       <input class="form-control" type="text" value="<?php if(isset($row['user_name'])){echo $row['user_name'];}?>">
                    </div>
                    <div class="form-group col-md-4">
                       <label for="" class="text-warning text h5">Mobile</label>
                       <input class="form-control" type="text" value="<?php if(isset($row['user_name'])){echo $row['user_name'];}?>">
                    </div>
                    <div class="form-group col-md-4">
                       <label for="" class="text-warning text h5">Total Members</label>
                       <input class="form-control" type="text" value="<?php if(isset($row['user_name'])){echo $row['user_name'];}?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="../all.min.js"></script>

</body>

</html>