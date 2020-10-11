<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="style.css" />

  <title>Sign in & Sign up Form</title>
  <script type='text/javascript'> 
				window.history.forward(); 
  </script>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="login.php" class="sign-in-form" method="POST">
          <?php if (isset($_GET['msg'])) {
            if ($_GET['msg'] === "2") {
              echo "<div class='alert alert-warning'>Error! Fill all Details before Signup</div>";
            } elseif ($_GET['msg'] === "1") {
              echo "<div class='alert alert-success'>Success! You can login now</div>";
            } elseif ($_GET['msg'] === "3") {
              echo "<div class='alert alert-warning'>Error! Fill all credentials </div>";
            } elseif ($_GET['msg'] === "4") {
              echo "<div class='alert alert-warning'>Error! Invalid email or password </div>";
            }
          } ?>
          <h1 class="myheading">Welcome to Yaveshu Homes</h1>
          <em class="myheading1">" We the Yaveshu's are little different "
          </em>
          <p style="color: red;">(User Login)</p>
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email" name="uemail" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="upass" />
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>


        <form action="signup.php" class="sign-up-form" method="POST">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field " style="margin-top: 20px;">
            <i class="fas fa-user"></i>
            <input type="number" placeholder="Flat No." name="flat" />
          </div>
          <div class="input-field " style="margin-top: 20px;">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" />
          </div>
          <div class="input-field" style="margin-top: 20px;">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="pass" />
          </div>
          <input type="submit" class="btn" value="Sign up" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Please signup before you use our Apartment Service
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/login.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of our Member ?</h3>
          <p>
            If you have already signed up then login directly
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register (2).svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>