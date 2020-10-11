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

    <title>View Reply</title>
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


<body>
    <nav class="navbar navbar-expand-sm font-weight-bolder navbar-dark fixed-top p-3" style='border-bottom: 1px solid white; width:fit-content'>
        <a href="../userdashboard.php" class="text-white navbar-brand">Yaveshu Homes</a>
    </nav>
    <div class="container jumbotron bg-dark" style="margin-top: 100px;">
        <h2 class="text-center text-warning font-weight-bolder" style='border-bottom: 1px solid yellow; width:fit-content'>Reply from Secretary</h2>

        <?php
        if (isset($_POST['reply'])) {
            $comp_id = $_POST['comp_id'];
            $sql = "SELECT * FROM complain_reply WHERE comp_id = '$comp_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($result) {
                echo "  <h5 class='text-warning font-weight-bolder mt-5'>Complainer Name = <span class='text-white'>" . $row['comp_by'] . "</span></h5><br>
                <h5 class='text-warning font-weight-bolder'>Complain Title = <span class='text-white'>" . $row['comp_title'] . "</span></h5><br>
                <h5 class='text-warning font-weight-bolder'>Reply = <span class='text-white'>" . $row['comp_reply'] . "</span></h5><br>
                <h5 class='text-warning font-weight-bolder'>Reply Date = <span class='text-white'>" . $row['comre_date'] . "</span></h5><br>
                <div><p class='text-white font-weight-bolder'>Sneh Joshi</p>
                <p class='text-white font-weight-bolder'>( Secretary - Yaveshu Homes )</p><br></div>
                <hr class='bg-warning'>
                <div class='text-center'><a href='message.php' class='btn btn-warning font-weight-bolder'>Back to message</a></div>";
            }
        }
        ?>
    </div>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="../all.min.js"></script>

</body>

</html>