<?php
session_start();
require 'config.php';

if (isset($_POST['submit'])) {
    $username = htmlentities($_POST['username']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $confirmPassword = htmlentities($_POST['confirmPassword']);

    $stmt = mysqli_query($conn, "SELECT * FROM volunteers WHERE username = '$username'");
    if (mysqli_num_rows($stmt) > 0) {
        $_SESSION['message'] = "Username already exists.";
        header('Location: signup.php');
        return;
    } else {
        $stmt = mysqli_query($conn, "SELECT * FROM volunteers WHERE email = '$email'");
        if (mysqli_num_rows($stmt) > 0) {
            $_SESSION['message'] = "Email ID already exists.";
            header('Location: signup.php');
            return;
        } else {
            if($password != $confirmPassword){
                $_SESSION['message'] = "Passwords do not match.";
                header('Location: signup.php');
                return;
            }
            else{
                $stmt = mysqli_query($conn, "INSERT INTO volunteers(username, email, password) VALUES('$username', '$email', '$password')");
                $stmt = mysqli_query($conn, "SELECT * FROM volunteers WHERE username = '$username'");
                $_SESSION['id'] = mysqli_fetch_assoc($stmt)['id'];
                $_SESSION['username'] = mysqli_fetch_assoc($stmt)['username'];
                header('Location: index.php');
                return;
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>The Smiling Thaal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/css/regg.css">
</head>

<body>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="../static/img/poster2.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 py-5">
                    <h1 class="font-weight-bolf-py-3">The Smiling Thaal</h1>
                    <h4>Sign up as a Volunteer</h4>
                    <?php if (isset($_SESSION['message'])) {
                        echo "<p class='alert alert-danger font-weight-bold'>" . $_SESSION['message'] . "</p>";
                        unset($_SESSION['message']);
                    } ?>

                    <form action="#" method="POST">
                        <div class="form-row">
                            <div class="col-lg-8">
                                <input class="form-control my-3 p-3" placeholder="Username" id="username" type="text" name="username" required>
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-row">
                            <div class="col-lg-8">
                                <input class="form-control my-3 p-3" placeholder="Email Address" id="email" type="email" name="email" required>
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-row">
                            <div class="col-lg-8">
                                <input class="form-control my-3 p-3" placeholder="Password" id="password" type="password" name="password" required>
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-row">
                            <div class="col-lg-8">
                                <input class="form-control my-3 p-3" placeholder="Confirm Password" id="password" type="password" name="confirmPassword" required>
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-row">
                            <div class="col-lg-8">
                                <button class="btn1 btn-primary mt-3" type="submit" id="register" name="submit" value="Sign Up">Sign Up</button>
                            </div>
                        </div>
                        <!--  -->
                        <p>Already have an account? <a href="login.php">Login here</a></p>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>