<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">
            <span class="logo">The Smiling Thaal</span>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="blogs.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="campaign.php">Campaigns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <?php
                        // session_start();
                        if(isset($_SESSION['id'])){
                            echo "<a href='logout.php' class='nav-link js-scroll-trigger' href='#team'>Logout</a>";
                        }
                        else{
                            echo "<a href='login.php' class='nav-link js-scroll-trigger' href='#team'>Login</a>";
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>