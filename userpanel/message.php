<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $lemail = $_SESSION['lemail'];
    $flatno = $_SESSION['flat'];
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
    <link rel="stylesheet" href="../all.min.css">

    <title>Message</title>
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
            <h2 class="text-center text-dark font-weight-bolder">Message Section</h2>
            <h4 class="text-center text-info"> Here all complain reply will be shown</h4>
            <h3 class="text-center"><?php if (isset($row['user_name'])) { echo $row['user_name']; } ?> - <?php if (isset($row['user_flatno'])) { echo $row['user_flatno'];  } ?></h3>
        </div>
    </div>
    <div class="container jumbotron bg-dark">
        <h2 class="text-center text-warning font-weight-bolder" style='border-bottom: 1px solid yellow; width:fit-content'>Your Complain Table</h2>
        <table class="table text-center mt-4 h5">
            <thead class="text-warning">
                <tr>
                    <th>Complain Id</th>
                    <th>Complain Title</th>
                    <th>Complain Date</th>
                    <th>View Reply</th>
                </tr>
            </thead>
            <tbody class="text-center h5 text-warning">
                <?php
                  $sql = "SELECT * FROM complain WHERE comp_flatno = '$flatno'";
                  $result = mysqli_query($conn,$sql);
                  $num = mysqli_num_rows($result);
                  if($num >= 1 ){
                      while($row = mysqli_fetch_assoc($result)){
                          $comp_id = $row['comp_id']; 
                          echo"<tr>
                               <td>".$row['comp_id']."</td>
                               <td>".$row['comp_title']."</td>
                               <td>".$row['comp_date']."</td>
                               <td><form action='viewreply.php' method='POST'>
                                    <input type='hidden' name='comp_id' value='"; if(isset($comp_id)){echo $comp_id;} echo"'>
                                    <button class='btn btn-warning' name='reply'><i class='fas fa-eye'></i></button>
                               </form></td>
                           </tr>";
                      }
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