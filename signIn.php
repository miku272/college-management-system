<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>College management system - Login</title>
</head>

<body>
    <!-- Sign In Page -->
    <section class="vh-100 d-flex" style="background: linear-gradient(360deg, #b1c8de, transparent);">
        <div class="col-3 m-auto">
            <div class="card">
                <div class="card-body shadow">
                    <h3 class="my-3 mx-3">Sign In to continue</h3>
                    <form action="actions/login.php" method="POST">
                        <div class="input-group my-5">
                            <span class="input-group-text" id="email">Email</span>
                            <input type="email" class="form-control" name="signInEmail" placeholder="Your Email" aria-label="email"
                                aria-describedby="email" required>
                        </div>
                        <div class="input-group mb-5 ">
                            <span class="input-group-text" id="pWord">Password</span>
                            <input type="password" class="form-control" name="signInPass" placeholder="Enter your password"
                                aria-label="pWord" aria-describedby="pWord" required>
                        </div>
                        <div class="input-group mb-4">
                            <input type="submit" class="btn btn-lg btn-outline-primary col-12" name="signInBtn" value="Sign In">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>