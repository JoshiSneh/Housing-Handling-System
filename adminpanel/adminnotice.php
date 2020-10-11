<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $aemail = $_SESSION['aemail'];
} else {
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

    <title>Notice</title>
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

    <div class="container-fluid" style="margin-top:85px;">
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
            
             if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notice'])){
                 if(!empty($_POST['ntitle']) && !empty($_POST['ndesc']) && !empty($_POST['ndate'])){
                   $ntitle = $_POST['ntitle'];
                   $ndesc = $_POST['ndesc'];
                   $ndate = $_POST['ndate'];
                   $sql = "INSERT INTO notice(notice_title, notice_desc, notice_date) VALUE ('$ntitle','$ndesc','$ndate')";
                   $result = mysqli_query($conn,$sql);
                   if($result){
                      $remsg = "<div class='alert alert-success text-center font-weight-bolder h5 mt-3'>Notice Published Successfully </div>";
                   }else{
                      $remsg = "<div class='alert alert-danger text-center font-weight-bolder h5 mt-3'>Something Went Wrong</div>";
                   }
                 }else{
                     $remsg = "<div class='alert alert-warning text-center font-weight-bolder h5 mt-3'>Fill all details </div>";
                 }
             }
            ?>
            <div class="container col-md-8 bg-dark ml-5 shadow-lg">
                <h3 class="text-center mt-3 border-bottom text-warning font-weight-bolder" style="width: max-content;">Notice</h3>
                <h5 class="text-white text-center">( Your notice will be send to all Society Members )</h5>
                <form action="" method="POST" class="mt-4 mx-5">
                    <div class="form-group">
                        <label for="" class="font-weight-bolder h5 text-warning">Notice Title</label>
                        <input type="text" class="form-control font-weight-bolder" name="ntitle">
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bolder h5 text-warning">Notice Description</label>
                        <textarea name="ndesc" cols="30" rows="7" class="form-control font-weight-bolder"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bolder h5 text-warning">Notice Date</label>
                        <input type="date" class="form-control font-weight-bolder" name="ndate">
                    </div>
                    <button class="btn btn-warning font-weight-bolder mb-5" name="notice">Publish Notice</button>
                    <?php
                    if (isset($remsg)) {
                        echo $remsg;
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <h4 class="text-center font-weight-bolder" style="text-decoration: underline;"> Previously Published Notice </h4>
       <table class="table mt-4 h5">
           <thead class="text-center bg-info text-white">
               <tr>
                   <th>Notice Id</th>
                   <th>Notice Title</th>
                   <th>Notice Description</th>
                   <th>Published Date</th>
               </tr>
           </thead>
           <tbody>
               <?php
                // For displaying notices
                $sql = "SELECT * FROM notice";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num>=1){
                   while($row = mysqli_fetch_assoc($result)){
                    echo"
                       <tr>
                         <td class='text-center'>".$row['notice_id']. "</td>
                         <td class='text-center'>".$row['notice_title']. "</td>
                         <td class='text-center'>".$row['notice_desc']. "</td>
                         <td class='text-center'>".$row['notice_date']."</td>
                       </tr>
                    ";
                  }
                }else{
                    echo "<div class='alert alert-warning font-weight-bolder h5 text-center'>0 Notice</div>";
                }
               ?>
           </tbody>
       </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="../all.min.js"></script>

</body>

</html>