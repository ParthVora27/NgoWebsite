<?php
session_start();
require "config.php";

if(isset($_POST['submit'])){
  $name = htmlentities($_POST['name']);
  $email = htmlentities($_POST['email']);
  $message = htmlentities($_POST['message']);

  $stmt = mysqli_query($conn, "INSERT INTO contacts(c_name, c_email, c_message) VALUES ('$name', '$email', '$message')");
  if($stmt){
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

  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&display=swap" rel="stylesheet">

  <!-- font awasome kit -->
  <script src="https://kit.fontawesome.com/975b3b2d68.js" crossorigin="anonymous"></script>

  <!-- css sheet -->
  <link rel="stylesheet" href="../static/css/main.css">
</head>

<body>
  <!-- Navbar-->
  <?php
  require "templates/header.php";
  ?>
  <!-- end of navbar  -->
  <!-- don-->
  <header class="don" id="home">
    <div class="container">
      <div class="don-heading text-uppercase">help for food </div>
      <form>
        <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_GYBqcoFZIQdMr0" async> </script>
      </form>
    </div>
  </header>
  <!--end of don Image-->

  <!--Footer Section-->
  <!-- Signup-->
  <section class="signup-section mt-5" id="signup">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">
          <h2 class="text-dark mb-5 text-uppercase">join to help us feed our india!</h2>
          <!-- <form class="form-inline d-flex">
            <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" type="email" placeholder="Enter email address...">
            <button class="btn btn-danger mx-auto" type="submit">
              become a member</button>
          </form> -->
          <a href="signup.php" class="btn btn-danger mx-auto">Become a member</a>
        </div>
      </div>
    </div>
  </section>
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact mt-5">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Contact</h2>
        <h3 class="section-subheading text-muted">Contact us for personal donations and queries.</h3>
      </div>

      <div class="row">

        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-6 info">
              <i class="fas fa-phone"></i>
              <h4>Call Us</h4>
              <p>+91 123123123<br>+91 123456789</p>
            </div>
            <div class="col-lg-6 info">
              <i class="fas fa-envelope"></i>
              <h4>Email Us</h4>
              <p>thesmilingthaal@give.com<br>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
              <input placeholder="Your Name" type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <input placeholder="Your Email" type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <textarea placeholder="Message" class="form-control" name="message" rows="5" required></textarea>
              <div class="validate"></div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-danger rounded-cor" name="submit">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->
  <!-- ======= Footer ======= -->
  <?php
  require "templates/footer.php";
  ?>
  <!-- End Footer -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>