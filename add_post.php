<?php
    include 'datafile.php';

    if(!isset($_SESSION["id"]))
    {
        header("location:login.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Classical Concert Information -Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        /* html,
        body,
        header,
        .view {
            height: 100%;
        } */

        @media (max-width: 740px) {

            html,
            body,
            header,
            .view {
                height: 60vh;
            }
        }

        .main
        {
            padding-top: 10vh;
        }

        .top-nav-collapse {
            background-color: #78909c !important;
        }

        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }

        @media (max-width: 991px) {
            .navbar:not(.top-nav-collapse) {
                background: #78909c !important;
            }
        }

        h1 {
            letter-spacing: 8px;
        }

        h5 {
            letter-spacing: 3px;
        }

        .hr-light {
            border-top: 3px solid #fff;
            width: 80px;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
        <header>
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
                <div class="container">
                    <a class="navbar-brand" href="#"><strong>Classical Concert Information</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="admin_dashboard.php">Home </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="admin_post.php">Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile_admin.php">Profile</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                            <a href="profile_admin.php" class="nav-link">Welcome, <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?> !</a>
                            </li>
                            <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
            <!-- Full Page Intro -->
            <div class="view" style="background-image: url('images/music.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light align-items-center">
                    <!-- Content -->
                    <div class="container">
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="main col-md-12 mb-4 text-white text-center">
                                <h1 class="h1-reponsive text-white text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>Classical Concert Information</strong></h1>
                                <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
                                <h5 class="text-uppercase mb-4 text-white wow fadeInDown" data-wow-delay="0.4s"><strong>Add Post
                                </strong></h5>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </div>
                    <!-- Content -->
                </div>
                <!-- Mask & flexbox options-->
            </div>
            <!-- Full Page Intro -->
        </header>
        <!-- Main navigation -->
        <!--Main Layout-->
        <main>
            <div class="container">
                <!--Grid row-->
                <div class="row ">
                    <!--Grid column-->
                    <div class="col-md-12 text-center">
                        <form action="datafile.php" method="post" enctype="multipart/form-data">
                            <div class="my-3">
                                <label for="concert_name" class="form-label"><h5>Concert Name</h5></label>
                                <input type="text" name="concert_name" id="concert_name" class="form-control">
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="date" class="form-label"><h5>Date</h5></label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="opening_time" class="form-label"><h5>Opening Time</h5></label>
                                    <input type="time" name="opening_time" id="opening_time" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="hall" class="form-label"><h5>Hall</h5></label>
                                <input type="text" name="hall" id="hall" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="artists" class="form-label"><h5>Artists</h5></label>
                                <textarea name="artists" id="artists" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="program" class="form-label"><h5>Program</h5></label>
                                <textarea name="program" id="program" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ticket" class="form-label"><h5>Ticket</h5></label>
                                <textarea name="ticket" id="ticket" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label"><h5>Contact</h5></label>
                                <textarea name="contact" id="contact" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="pic" class="form-label"><h5>Image</h5></label>
                                <input type="file" name="pic" id="pic" class="form-control">
                            </div>
                            <div class="mb-3">
                            <button type="submit" name="post" class="btn btn-outline-dark btn-block"><span class="font-weight-bold">Post</span></button>
                            </div>
                            
                        </form>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
        </main>
        <!--Main Layout-->

        <footer class="footer bg-light border-top pt-4 w-100" style="height: 70px; bottom: 0; left: 0;">
            <p class="text-muted text-center">&copy; 2021 | Classical Concert Information</p>
        </footer>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        // Animations init
        new WOW().init();
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>