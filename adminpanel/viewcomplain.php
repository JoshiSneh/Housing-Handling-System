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

    <title>View Complain</title>
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
              
              if(isset($_POST['comp'])){
                $id = $_POST['compid'];
                $sql = "SELECT * FROM complain WHERE comp_id='$id'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
              }
            ?>
            <div class="container col-md-8  bg-dark">
                <h3 class="text-center mt-3 border-bottom text-warning font-weight-bolder" style="width: max-content;">Complain Details</h3>
                <div class="form-row mx-3 mt-4">
                    <div class="form-group  col-md-4">
                       <label for="" class="text-warning text h5">Complainer Name</label>
                       <input class="form-control font-weight-bolder" type="text" value="<?php if(isset($row['comp_by'])){echo $row['comp_by'];}?>">
                    </div>
                    <div class="form-group col-md-3">
                       <label for="" class="text-warning text h5">Flat No.</label>
                       <input class="form-control font-weight-bolder" type="text" value="<?php if(isset($row['comp_flatno'])){echo $row['comp_flatno'];}?>">
                    </div>
                </div>
                <div class="form-row mx-3 mt-4">
                    <div class="form-group  col-md-6">
                       <label for="" class="text-warning text h5">Complain Title</label>
                       <input class="form-control font-weight-bolder" type="text" value="<?php if(isset($row['comp_title'])){echo $row['comp_title'];}?>">
                    </div>
                </div>
                <div class="form-group mx-3 mt-4">
                   <label for="" class="text-warning text h5">Complain Description</label>
                   <input type="text" class="form-control font-weight-bolder" cols="30" rows="10" value="<?php if(isset($row['comp_desc'])){echo $row['comp_desc'];}?>">
                </div>
                <div class="form-row mx-3 mt-4">
                    <div class="form-group col-md-4">
                       <label for="" class="text-warning text h5">Mobile</label>
                       <input class="form-control font-weight-bolder" type="text" value="<?php if(isset($row['comp_number'])){echo $row['comp_number'];}?>">
                    </div>
                    <div class="form-group col-md-4">
                       <label for="" class="text-warning text h5">Complain Date</label>
                       <input class="form-control font-weight-bolder" type="text" value="<?php if(isset($row['comp_date'])){echo $row['comp_date'];}?>">
                    </div>
                </div>
                <?php
                  
                  if(isset($_POST['reply'])){
                      if(!empty($_POST['comp_reply']) && !empty($_POST['compre_date'])){
                          $compid = $_POST['comp_id'];
                          $reply = $_POST['comp_reply'];
                          $date = $_POST['compre_date'];
                          $comp_by = $_POST['comp_by'];
                          $comp_title = $_POST['comp_title'];
                          $sql = "INSERT INTO complain_reply(comp_id, comp_by, comp_title, comp_reply, comre_date) VALUES ('$compid', '$comp_by','$comp_title','$reply', '$date')";
                          $result = mysqli_query($conn,$sql);
                          if($result){
                              $remsg = "<div class='alert alert-success text-center font-weight-bolder h5'>Reply Send Succcessfully</div>";
                          }
                      }else{
                        $remsg = "<div class='alert alert-warning text-center font-weight-bolder h5'>Fill all details</div>";
                      }
                  }
                  
                
                
                ?>
                <h3 class="text-center mt-3 border-bottom text-warning font-weight-bolder" style="width: max-content;">Reply to Complain</h3>
                <form action="" method="POST">
                    <div class=" form-row mx-3 mt-4">
                        <div class="form-group col-md-7">
                            <label for="" class="text-warning text h5">Write your reply</label>
                            <textarea name="comp_reply" id="" cols="10" rows="4" class="form-control font-weight-bolder">
                                
                            </textarea>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="" class="text-warning text h5">Reply  Date</label>
                            <input class="form-control font-weight-bolder" type="date" name="compre_date" >
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="comp_id" value="<?php if(isset($id)){ echo $id;}?>">
                         <input class="form-control font-weight-bolder" name="comp_by" type="hidden" value="<?php if(isset($row['comp_by'])){echo $row['comp_by'];}?>">
                         <input class="form-control font-weight-bolder" name="comp_title" type="hidden" value="<?php if(isset($row['comp_title'])){echo $row['comp_title'];}?>">
                    </div>
                    <button class="btn btn-warning mx-4 mb-3 font-weight-bolder" name="reply">Submit</button>
                </form>
                <?php
                 if(isset($remsg)){
                    echo $remsg;
                 }
                ?>
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