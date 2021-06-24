<?php
session_start();
require "config.php";

if (isset($_POST['submit'])) {
    $title = htmlentities($_POST['title']);
    $date = htmlentities($_POST['date']);
    $description = htmlentities($_POST['description']);
    $id = $_SESSION['id'];

    $stmt = mysqli_query($conn, "INSERT INTO campaigns(c_title, c_date, c_description, c_vid) VALUES('$title', '$date', '$description', '$id')");
    if ($stmt) {
        mysqli_free_result($stmt);
        header('Location: campaign.php');
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
    <?php
    require "templates/header.php";
    ?>

    <!--Project Section-->
    <section class="proj-section bg-light py-5 mt-5" id="project">
        <!-- Create a Campaign -->
        <?php
        if (isset($_SESSION['id'])) {
            echo "
            <div class='container px-2'>
            <h2 class='text-uppercase text-center'>Start a Campaign</h2>
            <h4 class='text-center text-muted'>Enter The Campaign Details Below.</h4>
            <form action='' method='POST'>
            <div class='form-row'>
                    <div class='col text-center'>
                        <input class='form-control my-3 p-3' placeholder='Campaign Title' id='title' type='text' name='title' required>
                        </div>
                </div>
                <div class='form-row'>
                    <div class='col text-center'>
                        <input class='form-control my-3 p-3' id='date' type='date' name='date' min='2021-02-06' required>
                        </div>
                </div>
                <div class='form-row'>
                    <div class='col text-center'>
                    <textarea class='form-control my-3 p-3' placeholder='Campaign Description' id='description' name='description' required></textarea>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col'>
                        <button class='btn btn-primary mt-3' type='submit' id='submit' name='submit' value='submit'>Start Campaign</button>
                        </div>
                        </div>
                        </form>
                        </div>
                        ";
        }
        ?>
        <!-- End of Campaign -->
        <div class="container py-3">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">latest campaigns</h2>
                <h3 class="section-subheading text-muted">
                    Our campaigns across india.</h3>
            </div>
            <div class="row">
                <?php
                $stmt = mysqli_query($conn, "SELECT * FROM campaigns");
                if (mysqli_num_rows($stmt) > 0) {

                    while ($row = mysqli_fetch_assoc($stmt)) {
                        echo "
                        <div class='col-lg-4 col-sm-6 mb-4'>
                        <div class='project-item' style='box-shadow: 0 0 4px #333;'>
                        <a class='project-link' data-toggle='modal' href='#projectModal" . $row['c_id'] . "'>
                        <div class='project-hover'>
                        <div class='project-hover-content'>
                        <i class='fas fa-plus fa-3x'></i>
                        </div>
                        </div>";
                        $var = random_int(0,2);
                        if($var == 0){
                            echo "<img class='img-fluid d-block mx-auto' src='../static/img/family.jpg' alt='prop-1'/></a>";
                        }
                        else if($var == 1){
                            echo "<img class='img-fluid d-block mx-auto' src='../static/img/food.jpg' alt='prop-1'/></a>";
                        }
                        else{
                            echo "<img class='img-fluid d-block mx-auto' src='../static/img/waste.jpg' alt='prop-1'/></a>";
                        }
                        // <img src='../static/img/proj.jfif' class='img-fluid' alt=''>
                        // </a>
                        echo "<div class='project-caption'>
                        <div class='project-caption-heading'>" . $row['c_title'] . "</div>
                        </div>
                        </div>
                        </div>";
                    }
                }
                ?>
                <!---Project 1-->

            </div>
        </div>
        </div>
        </div>
    </section>
    <!--End of Project Section-->

    <!-- Project Modals-->
    <!-- Modal 1-->
    <?php
    $stmt = mysqli_query($conn, "SELECT * FROM campaigns");
    if (mysqli_num_rows($stmt) > 0) {

        while ($row = mysqli_fetch_assoc($stmt)) {
            echo "
            <div class='project-modal modal fade' id='projectModal" . $row['c_id'] . "' tabindex='-1' role='dialog' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='close-modal' data-dismiss='modal'>
                    <i class='fas fa-window-close'></i>
                    </div>
                    <div class='container'>
                        <div class='row justify-content-center'>
                            <div class='col-lg-8'>
                            <div class='modal-body'>
                                    <h2 class='text-uppercase'>" . $row['c_title'] . "</h2>";
                                    if($var == 0){
                                        echo "<img class='img-fluid d-block mx-auto' src='../static/img/family.jpg' alt='prop-1'/>";
                                    }
                                    else if($var == 1){
                                        echo "<img class='img-fluid d-block mx-auto' src='../static/img/food.jpg' alt='prop-1'/>";
                                    }
                                    else{
                                        echo "<img class='img-fluid d-block mx-auto' src='../static/img/waste.jpg' alt='prop-1'/>";
                                    }
                                    echo "
                                    <p>" . $row['c_description'] . "</p>
                                    <ul class='list-inline'>
                                        <li>Date: " . $row['c_date'] . "</li>
                                    </ul>
                                    <button class='btn btn-danger' data-dismiss='modal' type='button'>
                                    <i class='fas fa-times mr-1'></i>Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>";
        }
    }
    ?>

    <?php
    require "templates/footer.php";

    ?>

    <!-- End of modal part -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        const date = new Date()
        const myDate = date.toISOString().split('T')[0]
        document.getElementById('date').value = myDate
    </script>

</body>

</html>