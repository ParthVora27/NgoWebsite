<?php
session_start();
require "config.php";

if(!isset($_SESSION['isAdmin'])){
    header("Location: index.php");
    return;
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
    <link rel="stylesheet" href="../static/css/main.css">
</head>

<body>
    <?php
    require "templates/header.php";
    ?>

    <div class="bg-light">
        <div class="container-fluid pt-5">
            <div class="py-5">
                <h2 class="text-center text-uppercase">The smiling thaal admin panel</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="text-center">Volunteer Info</h4>
                    <div style="height: 50vh; overflow: auto;">
                        <?php
                        $stmt = mysqli_query($conn, "SELECT username, email, id from volunteers");
                        if (mysqli_num_rows($stmt) > 0) {
                            echo "
                            <table class='table table-striped'>
                            <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Delete</th>
                            </tr>
                            ";
                            while ($row = mysqli_fetch_assoc($stmt)) {
                                echo "
                                    <tr>
                                        <th>" . $row['username'] . "</th>
                                        <th>" . $row['email'] . "</th>                                        
                                        <th><a class='btn btn-danger' href='delete.php?id=" . $row['id'] . "'>Delete</a></th>
                                        </tr>
                                ";
                            }
                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4 class="text-center">Campaign Info</h4>
                    <div style="height: 50vh; overflow:auto;">
                        <?php
                        $stmt = mysqli_query($conn, "SELECT c_title, c_date, c_id from campaigns");
                        if (mysqli_num_rows($stmt) > 0) {
                            echo "
                        <table class='table table-striped'>
                            <tr>
                            <th>Campaign Title</th>
                            <th>Campaign Date</th>
                            <th>Delete</th>
                            </tr>
                            ";
                            while ($row = mysqli_fetch_assoc($stmt)) {
                                echo "
                            <tr>
                                        <th>" . $row['c_title'] . "</th>
                                        <th>" . $row['c_date'] . "</th>                                        
                                        <th><a class='btn btn-danger' href='delete.php?cid=" . $row['c_id'] . "'>Delete</a></th>
                                    </tr>
                                    ";
                            }
                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require "templates/footer.php";
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>