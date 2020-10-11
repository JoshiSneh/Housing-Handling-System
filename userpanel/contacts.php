<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $lemail = $_SESSION['lemail'];
} else {
    echo "<script> location.href='index.php' </script>";
}

include("../dbconnection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="all.min.css">

    <title>Contacts</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap');

        body {
            font-family: 'Comic Neue', cursive;
            background: #000000;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #434343, #000000);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #434343, #000000);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>
</head>
<?php

$sql = "SELECT * FROM user_signup WHERE user_email = '$lemail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top p-3">
        <a href="" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="jumbotron">
            <h2 class="text-center text-dark font-weight-bolder">Contact Section</h2>
            <h3 class="text-center"><?php if (isset($row['user_name'])) { echo $row['user_name']; } ?> - <?php if (isset($row['user_flatno'])) { echo $row['user_flatno']; } ?></h3>
            <h4 class="text-center text-info">Emergency Contacts/ Members contact are listed here</h4>
        </div>
    </div>
    <div class="container my-5 text-white">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
                <h3 class="border-bottom text-warning" style="width: fit-content;">Emergency Contact</h3>
                <ul class="h5 mt-3">
                    <li>Police- 101</li>
                    <li>Ambulance - 102</li>
                </ul>
            </div>
        </div>
        <?php
        
          $sql = "SELECT * FROM user_profile WHERE NOT user_email = '$lemail'";
          $result = mysqli_query($conn,$sql);
        ?>
        <div class="mt-5 d-flex justify-content-center align-items-center flex-column">
            <h3 class="border-bottom text-warning" style="width: fit-content;">Members  Contact</h3>
        </div>
        <div class="container mt-4 h5">
            <table class="table text-warning text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Flat No.</th>
                        <th>Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$row['user_name']."</td>
                                <td>".$row["user_flatno"]."</td>
                                <td>".$row["user_number"]."</td>
                              </tr>";
                    }?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 300,
            duration: 1100
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="all.min.js"></script>
</body>

</html>