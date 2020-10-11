<?php
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

    <title>User Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap');
        body {
            font-family: 'Comic Neue', cursive;
        }
    </style>
</head>
<body>
    <?php
      if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(!empty($_POST['aemail']) && !empty($_POST['apass'])){
             $aemail = $_POST['aemail'];
             $apass = $_POST['apass'];
             $sql = "SELECT admin_email AND admin_pass FROM admin_signup";
             $result = mysqli_query($conn,$sql);
             if($result){
                 session_start();
                 $_SESSION['loggedin'] = true;
                 $_SESSION['aemail'] = $aemail;
                 echo "<script> location.href='adminpanel.php'</script>";
             }else{
                 $remsg = "<div class='alert alert-danger text-center h5 font-weight-bold mt-3'>Something Went Wrong</div>";
             }
        }else{
                $remsg = "<div class='alert alert-danger text-center h5 font-weight-bold mt-3'>Enter all details before login</div>";
        }
      }
    ?>
    <div class="mt-5 text-center" style="font-size: 30px;">
        <i class="fas fa-home"></i>
        <span>Yaveshu Homes Admin Login</span>
    </div>
    <p class="text-center mt-4" style="font-size: 20px;"><i class=" fas fa-user-secret text-danger mr-3"></i>Admin Area</p>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 ">
                <form action="" method="post" class="shadow-lg p-4 rounded">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                        <input type="email" name="aemail" id="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="password" class="font-weight-bold pl-2">Password</label>
                        <input type="password" name="apass" id="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline-info btn-block font-weight-bold shadow-sm">Login</button>
                </form>
                <div>
                    <?php if (isset($remsg)) {
                        echo $remsg;
                    }; ?>
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