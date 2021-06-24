<?php
session_start();
require 'config.php';

if (isset($_POST['submit'])) {
    $title = htmlentities($_POST['title']);
    $content = htmlentities($_POST['content']);
    $id = $_SESSION['id'];
    $temp_date = getdate();
    $date = $temp_date['year'] . "-" . $temp_date['mon'] . "-" . $temp_date['mday'];

    $stmt = mysqli_query($conn, "INSERT INTO blogs(b_title, b_content, b_date, b_vid) VALUES('$title', '$content', '$date', '$id')");
    if ($stmt) {
        mysqli_free_result($stmt);
        header('Location: blogs.php');
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
    <link rel="stylesheet" href="../static/css/main.css">
</head>

<body>
    <?php
    require "templates/header.php";
    ?>
    <div class="mt-5">
        <?php
        if(isset($_SESSION['id'])){
            echo "
            <div class='bg-white py-5'>
                <div class='container'>
                    <h2 class='text-center text-uppercase'>Share your experiences</h2>
                        <form action='' method='POST'>
                            <div class='form-row my-3'>
                                <input class='form-control' type='text' name='title' id='title' placeholder='Blog Title' required>
                            </div>
                            <div class='form-row my-3'>
                                <textarea class='form-control' name='content' id='content' rows='5' placeholder='Blog Description' required></textarea>
                            </div>
                            <div class='form-row my-3'>
                                <button class='btn btn-success' type='submit' name='submit'>Post Blog</button>
                            </div>
                        </form>
                </div>
            </div>
            ";
        }
        ?>
    </div>

    <div class="bg-light py-3">
        <div class="container">
            <h2 class="text-center text-uppercase py-4">Recent Blogs</h2>
            <section>
                <?php
                $stmt = mysqli_query($conn, "SELECT * FROM blogs ORDER BY b_date DESC");
                if (mysqli_num_rows($stmt) > 0) {
                    while ($row = mysqli_fetch_assoc($stmt)) {
                        $id = $row['b_vid'];
                        $username = mysqli_query($conn, "SELECT username FROM volunteers WHERE id = '$id'");
                        echo "
                            <hr>
                            <article>
                                <h4 class = 'text-danger'>" . $row['b_title'] . "</h4>
                                <p class='text-muted'>By " . mysqli_fetch_assoc($username)['username'] . " , Published on " . $row['b_date'] . "</p>
                                <p class=''>" . $row['b_content'] . "</p>";
                        if (isset($_SESSION['id']) && $id == $_SESSION['id']) {
                            echo "<a class='btn btn-primary' href='delete.php?bid=" . $row['b_id'] . "'>Delete</a>";
                        }
                        echo "</article>";
                    }
                }
                ?>
            </section>
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