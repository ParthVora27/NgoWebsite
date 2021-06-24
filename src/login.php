<?php
session_start();
require 'config.php';

if (isset($_POST['submit'])) {
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);

	// Admin Panel 
	if($email == "admin@admin.com" && $password == "123456"){
		$_SESSION['isAdmin'] = true;
		header('Location: admin.php');
		return;
	}

    $stmt = mysqli_query($conn, "SELECT * FROM volunteers WHERE email = '$email' and password = '$password'");
    if (mysqli_num_rows($stmt) == 0) {
        // $message = "Invalid Credentials. Please Try Again.";
        $_SESSION['message'] = "Invalid Credentials. Please Try Again.";
        header('Location: login.php');
        return;
    } else {
        $_SESSION['id'] = mysqli_fetch_assoc($stmt)['id'];
        $_SESSION['username'] = mysqli_fetch_assoc($stmt)['username'];
        // $message = "Login Successful. Welcome Back.";
        // $_SESSION['message'] = "Login Successful. Welcome Back.";
        header('Location: index.php');
        return;
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
					<img src="../static/img/poster2.jpg"  class="img-fluid" alt="">
				</div>
				<div class="col-lg-7 px-5 py-5">
					<h1 class="font-weight-bolf-py-3">The Smiling Thaal</h1>
					<h4>Log into your account</h4>
                    <?php if(isset($_SESSION['message'])){ echo "<p class='alert alert-danger font-weight-bold'>".$_SESSION['message']."</p>"; unset($_SESSION['message']); } ?>
					<form action="#" method="POST">
						<div class="form-row">
							<div class="col-lg-8">
								<input class="form-control my-3 p-3"
								placeholder="Email Address" id="email" type="email" name="email" required>
							</div>
						</div>
						<!--  -->
						<div class="form-row">
							<div class="col-lg-8">
								<input class="form-control my-3 p-3"
								placeholder="Password" id="password" type="password" name="password" required>
							</div>
						</div>
						<!--  -->
						<div class="form-row">
							<div class="col-lg-8">
								<button class="btn1 btn-primary mt-3" type="submit" id="register" name="submit" value="Sign Up">Sign Up</button>
							</div>
						</div>
						<!--  -->
						<p>Don't have an account? <a href="signup.php">Register here</a></p>
						
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