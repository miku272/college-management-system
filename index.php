<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <title>College Management System - Home</title>
</head>

<body style="background: linear-gradient(450deg, #8cc5d0, transparent);">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-light" style="background: linear-gradient(450deg, #8cc5d0, transparent);">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand">
        <img id="college-logo" src="images/logo.svg" alt="College Logo" draggable="false" height="30" />
        <span class="mx-4 h3">College Management System</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-4">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Events</a>
          </li>
        </ul>
        <?php if (!isset($_SESSION['signIn'])) { ?>
          <form class="d-flex" role="search">
            <a class="btn btn-outline-success" href="signIn.php">Sign In</a>
          </form>
        <?php } else { ?>
          <form class="d-flex" role="search">
            <a class="btn btn-outline-primary me-5" href="#">My Profile</a>
          </form>
          <form class="d-flex" role="search">
            <a class="btn btn-outline-danger" href="actions/logout.php">Log Out</a>
          </form>
        <?php } ?>
      </div>
    </div>
    </div>
  </nav>

  <!-- Body -->

  <div class="container-fluid my-5">
    <div class="row">
      <!-- Left Side -->
      <div class="col-lg-6 my-5">
        <h1 class="display-3 my-5">Welcome to College Mangement Website!</h1>
        <p class="my-4">The prestigious WURI Rankings 2022 has ranked us 2nd in India among the Top Ivy League
          universities. In our very first attempt, we have secured a global band of 101-200. Join with us now!</p>
        <?php if (!isset($_SESSION['signIn'])) { ?>
          <a href="signIn.php" class="btn btn-lg btn-outline-success my-3 mx-5 col-lg-6">Sign In </a>
        <?php } ?>
      </div>
      <!-- Right Side -->
      <?php if (!isset($_SESSION['signIn'])) { ?>
        <div class="col-lg-6 my-5">
          <div class="w-50 mx-auto">
            <form action="#" method="POST" class="my-5">
              <div class="input-group mb-4">
                <span class="input-group-text" id="fullName">Full Name</span>
                <input type="text" class="form-control" placeholder="Your Full Name" aria-label="fullName" aria-describedby="fullName" required>
              </div>
              <div class="input-group mb-4">
                <span class="input-group-text" id="userName">User Name</span>
                <input type="text" class="form-control" placeholder="Your User Name" aria-label="userName" aria-describedby="userName" required>
              </div>
              <div class="input-group mb-4">
                <span class="input-group-text" id="email">Email</span>
                <input type="email" class="form-control" placeholder="Your Email" aria-label="email" aria-describedby="email" required>
              </div>
              <div class="input-group mb-4">
                <span class="input-group-text" id="phNumber">Number</span>
                <input type="tel" class="form-control" placeholder="Your Phone Number" aria-label="phNumber" aria-describedby="phNumber" required>
              </div>
              <div class="input-group mb-4">
                <span class="input-group-text" id="pWord">Password</span>
                <input type="password" class="form-control" placeholder="Enter your password" aria-label="pWord" aria-describedby="pWord" required>
              </div>
              <div class="input-group mb-4">
                <span class="input-group-text" id="confPass">Confirm Password</span>
                <input type="password" class="form-control" placeholder="Confirm your password" aria-label="confPass" aria-describedby="confPass" required>
              </div>
              <div class="input-group mb-4 gender-details">
                <input type="radio" name="gender" id="male">
                <input type="radio" name="gender" id="female">
                <input type="radio" name="gender" id="others">
                <input type="radio" name="gender" id="undefined">
                <div class="category">
                  <label for="male">
                    <span class="dot one"></span>
                    <span class="gender">Male</span>
                  </label>
                  <label for="female">
                    <span class="dot two"></span>
                    <span class="gender">Female</span>
                  </label>
                  <label for="others">
                    <span class="dot three"></span>
                    <span class="gender">Others</span>
                  </label>
                  <label for="undefined">
                    <span class="dot four"></span>
                    <span class="gender">Prefer not to say</span>
                  </label>
                </div>
              </div>
              <div class="input-group mb-4">
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                  <option hidden="true">Choose your department</option>
                  <option value="BCA">BCA</option>
                  <option value="BBA">BBA</option>
                  <option value="MCA">MCA</option>
                  <option value="MBA">MBA</option>
                </select>
              </div>
              <div class="input-group mb-4">
                <input type="submit" class="btn btn-lg btn-outline-primary col-12" value="Register">
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
<?php } else { ?>
  <div class="col-lg-6 my-5">
    <div class="w-50 mx-auto">
      <img src="images/index_banner.jpg" style="border-radius: 15px;" alt="college_logo" width="650" height="705" />
    </div>
  </div>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>