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

    <title>Facility</title>
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
            <h2 class="text-center">Yaveshu Homes Amenities</h2>
            <h3 class="text-center"><?php if (isset($row['user_name'])) {
                                        echo $row['user_name'];
                                    } ?> - <?php if (isset($row['user_flatno'])) {
                                                echo $row['user_flatno'];
                                            } ?></h3>
            <h4 class="text-center text-info">All amenities/specification are listed here</h4>
        </div>
    </div>
    <div class="container my-5 text-white">
        <div class="row">
            <div class="col-md-4">
                <h3 class="border-bottom text-warning" style="width: fit-content;">Community Amenities</h3>
                <ul class="h5 mt-3">
                    <li>Club house</li>
                    <li>Community hall</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="border-bottom text-warning" style="width: fit-content;">Health and Fitness</h3>
                <ul class="h5 mt-3">
                    <li> Swimming Pool</li>
                    <li>Childrens Pool</li>
                    <li>Indoor Games</li>
                    <li>Health Facilities</li>
                    <li>Tennis Court</li>
                    <li>Badminton Court</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="border-bottom text-warning" style="width: fit-content;">Lifestyle</h3>
                <ul class="h5 mt-3">
                    <li>Table Tennis</li>
                    <li>Party Area</li>
                    <li>Landscaped Gardens</li>
                    <li>Spa & Sauna</li>
                    <li>Kids Play Area</li>
                </ul>
            </div>
        </div>
        <div class="conatiner mt-4">
            <h5 class="text-white"><em>Yaveshu Homes amenities is the yardstick in the real estate industry. YaveshuGroup provides the best amenities to every project they undertake. They ensure that all the amenities provided meet international standards and made available for all ages.</em><br><br>
                Visitor car park is the exemplary amenity available at the Yaveshu Homes by the Yaveshu Group. While dedicated car parking place for visitors is usually not available in most of the apartments, here at Yaveshu Waterford, one need not make their visitors struggle to find safe car parking place outside the apartment, but get them the ample parking space in the campus itself and spend time with their host without any worry of their cars. Visitor car parking space is provided in front of the Block/Building No-5 tower 7 spreading across the Block/Building-4 Tower 6 and ending at Block/Building No.3 tower 5. <br><br>
                At the very end of the campus facing the garden park is the observation deck. This is such lovely place and thoughtfully created that you can sit and get relaxed in midst of greenery. A wide-span bicycle track is available. This bicycle track is worthy to tempt you to put the sporty bicycle gears and pedal across the track daily and keep your muscles fit and strong. Jogging track is made along the bicycle track. Put your headsets on, run the huge track daily and immunize your lungs with fresh air as you jog around the gardens every day morning.</h5>
        </div>
        <div class="contaier mt-4">
            <h3 class="border-bottom text-center font-weight-bold text-warning" style="width: fit-content;">Other Amenities</h3>
            <div class="media mt-4" data-aos="fade-left">
                <img src="../img/f (2).png" class="align-self-center mr-3 img-fluid" width="300px">
                <div class="media-body mt-3">
                    <h3 class="mt-0 text-warning">Parking System </h3>
                    <h5>Parking space is a major issue in a myriad of housing complexes. At <em>Yaveshu Homes</em> we have a dedicated parking space for your vehicle.</h5>
                </div>
            </div>
            <div class="media mt-4" data-aos="fade-right">
                <div class="media-body mt-3">
                    <h3 class="mt-0 text-warning">Security System </h3>
                    <h5>At Yaveshu Homes we offer security features like CCTV camera, firefighting systems and intercom facilities. The campus also have 24/7 security guards all around the campus.</h5>
                </div>
                <img src="../img/f (3).png" class="align-self-center mr-3 img-fluid" width="300px">
            </div>
            <div class="media mt-3" data-aos="fade-left">
                <img src="../img/f (4).png" class="align-self-center mr-3 img-fluid" width="300px">
                <div class="media-body mt-3">
                    <h3 class="mt-0 text-warning">Water Supply </h3>
                    <h5>Water is one of the basic amenities and we ensure proper water supply for 24hrs.</h5>
                </div>
            </div>
            <div class="media mt-4" data-aos="fade-right">
                <div class="media-body mt-3">
                    <h3 class="mt-0 text-warning">Sports and Recreation </h3>
                    <h5>Having the option of relaxing with a quick game of tennis within your housing complex can do wonders to your soul. Hence, we check out for the recreational facility inside our campus.</h5>
                </div>
                <img src="../img/f (1).png" class="align-self-center mr-3 img-fluid" width="300px">
            </div>
            <div class="media mt-3" data-aos="fade-left">
                <img src="../img/f (5).png" class="align-self-center mr-3 img-fluid" width="300px">
                <div class="media-body mt-3">
                    <h3 class="mt-0 text-warning">Gym and Spa </h3>
                    <h5>Who does not want to unwind with a quick work out in the evening or a spa break on the weekend? These are some amenities which can significantly add to the quality of life. We offers you with a good infrastructure Gyms with trainer.</h5>
                </div>
            </div>
            <div class="media mt-4" data-aos="fade-right">
                <div class="media-body mt-3">
                    <h3 class="mt-0 text-warning">Swimming Pools </h3>
                    <h5>Every adults even some children love swimming as it is good exercise. We have two separate pools for adults and children at Yaveshu Homes</h5>
                </div>
                <img src="../img/f (6).png" class="align-self-center mr-3 img-fluid" width="300px">
            </div>
            <div class="media mt-3" data-aos="fade-left">
                <img src="../img/f (7).png" class="align-self-center mr-3 img-fluid" width="300px">
                <div class="media-body mt-3">
                    <h3 class="mt-0 text-warning">Power Backup </h3>
                    <h5>Uninterrupted power supply is must for a peace, We are equipped with a reliable power back up system.</h5>
                </div>
            </div>
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