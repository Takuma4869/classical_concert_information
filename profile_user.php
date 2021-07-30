<?php
    include 'datafile.php';
    $post = $functions->get_favorite_post_user();
    $count = $functions->get_favorite_concerts_count($_SESSION['id']);



    if(!isset($_SESSION["id"]))
    {
        header("location:index.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                            <li class="nav-item">
                                <a class="nav-link" href="user_dashboard.php">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="user_post.php">Concert </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Profile</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="profile_user.php">
                                    <?php if($count == false){ ?>
                                        <i class="far fa-heart"></i> 0
                                    <?php }else{ ?>
                                        <i class="fas fa-heart"></i> 
                                        <?php echo $count;?>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">Welcome, <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?> !</a>
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
            <div class="view" style="background-image: url('images/lucas-alexander-njaQKSM365I-unsplash.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
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
                                <h5 class="text-uppercase mb-4 text-white wow fadeInDown" data-wow-delay="0.4s"><strong>Profile
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
                <div class="row">
                    <div class="col-8 mx-auto my-3">
                        <?php
                            if(isset($_GET["success"]) && isset($_GET["message"]))
                            {
                                $stat = ($_GET["success"]==1)?"success":"danger";
                                $message = $_GET["message"];
                        
                                echo "<div class='alert alert-".$stat."'>";
                                echo $message;
                                echo "</div>";
                            }
                            ?>
                    </div>
                    <div class="col-5 mx-auto my-3">
                        <h2 class="text-center ">Profile</h2>
                        <div class="card my-3">
                            <img src="images/<?php echo $_SESSION['file_name'] ?>"  class="image cards-img-top w-100">
                            <div class="card-body bg-light">
                            <h3 class='h5 card-title mb-0'>
                            <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?>
                            </h3>
                            <span class="text-muted fst-italic">@<?php echo $_SESSION["username"]; ?></span>
                            <br>
                            </div>
                        </div>
                        <a href="edit_profile.php" class="btn btn-dark">Edit Profile</a>
                        <a href="change_password.php" class="btn btn-dark float-right">Change Password</a>
                    </div>
                    <div class="col-7 mx-auto my-3">
                        <?php if($post == false){ ?>
                            <h2  class="text-center mb-3">Favorite Concerts</h2>
                            <h5 class="text-center ">
                            No records to display.
                            </h5>
                        <?php }else{ ?>
                        <h2  class="text-center ">Favorite Concerts</h2>
                        <div class="row card-deck mt-3">
                            <?php foreach($post as $row){ ?>
                            <div class="col-6 ">
                                <div class="card mb-3">
                                    <img src="images/<?php echo $row['file_name']?>" class="image cards-img-top" width="100%" height="300">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <?php echo $row['concert_name'] ?>
                                        </h4>
                                        <div>
                                            <?php echo $row['date'] ?> <span> | </span> <?php echo $row['opening_time']?>
                                        </div>
                                        <span class="card-text"><?php echo $row['hall']?></span><br>
                                        <span class="card-text"><?php echo $row['artists']?></span><br>
                                        <span class="card-text"><?php echo $row['program']?></span>
                                    </div>
                                    <div class="card-footer">
                                        <a href="post_detail_user.php?id=<?php echo $row['post_id']?>" class="btn btn-sm btn-dark w-100">Detail</a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    
                </div>
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