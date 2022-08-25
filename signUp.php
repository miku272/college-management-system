<?php include('includes/config.php'); ?>

<?php
if (isset($_POST['signUpBtn'])) {
    $user_name = $_POST['signUpName'];
    $email = $_POST['signUpEmail'];
    $user_type = $_POST['signUpType'];
    $password = $_POST['signUpPass'];
    $conf_password = $_POST['signUpConfPass'];

    $passed_checks = 1;

    $query = mysqli_query($con, "SELECT * FROM accounts");

    while ($account = mysqli_fetch_object($query)) {
        if ($account->email == $email) {
            echo "<script>alert('The given email is already in use');</script>";
            $passed_checks = 0;
        }
    }

    if ($password != $conf_password) {
        echo "<script>alert('The password does not match. Try again');</script>";
        $passed_checks = 0;
    } 
    
    if ($passed_checks != 0) {
        mysqli_query($con, "INSERT INTO accounts (user_type, email, password, user_name) VALUES ('$user_type', '$email', '$password', '$user_name')");

        header('location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>College management system - Register</title>
</head>

<body>
    <!-- Sign In Page -->
    <section class="vh-100 d-flex" style="background: linear-gradient(-450deg, #8cc5d0, transparent);">
        <div class="col-3 m-auto">
            <div class="card">
                <div class="card-body shadow">
                    <h3 class="my-3 mx-3">Register here</h3>
                    <form action="" method="POST">
                        <div class="input-group my-5">
                            <span class="input-group-text" id="name">Name</span>
                            <input type="text" class="form-control" name="signUpName" placeholder="Your Name" aria-label="name" aria-describedby="name" required>
                        </div>
                        <div class="input-group my-5">
                            <span class="input-group-text" id="email">Email</span>
                            <input type="email" class="form-control" name="signUpEmail" placeholder="Your Email" aria-label="email" aria-describedby="email" required>
                        </div>
                        <div class="input-group my-5">
                            <span class="input-group-text" id="type">choose your type</span>
                            <select name="signUpType" class="form-control" name="signUpType" aria-label="type" aria-describedby="type" required>
                                <option value="student">Student</option>
                                <option value="counsellor">Counsellor</option>
                                <option value="teacher">Teacher</option>
                                <option value="parent">Parent</option>
                                <option value="librarian">Librarian</option>
                            </select>
                        </div>
                        <div class="input-group mb-5 ">
                            <span class="input-group-text" id="pWord">Password</span>
                            <input type="password" class="form-control" name="signUpPass" placeholder="Enter your password" aria-label="pWord" aria-describedby="pWord" required>
                        </div>
                        <div class="input-group mb-5 ">
                            <span class="input-group-text" id="pWord">Confirm Password</span>
                            <input type="password" class="form-control" name="signUpConfPass" placeholder="Confirm your password" aria-label="pWord" aria-describedby="pWord" required>
                        </div>
                        <div class="input-group mb-4">
                            <input type="submit" class="btn btn-lg btn-outline-primary col-12" name="signUpBtn" value="Sign Up">
                        </div>
                    </form>
                    <div class="d-flex justify-content-center">
                        <span>Already registered?&nbsp;</span> <a href="signIn.php" style="text-decoration: none;">&nbsp;Login here&nbsp;</a> <span>or&nbsp;</span><a href="index.php" style="text-decoration: none;">Return to home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>