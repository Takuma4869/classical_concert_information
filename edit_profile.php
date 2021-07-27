<?php
    include 'datafile.php';
    $user_id = $_SESSION['id'];
    $profile = $functions->get_profile($user_id);

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
        .img-fluid
        {
            width: 300px;
            height: 600px;
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
                            <li class="nav-item">
                                <a class="nav-link" href="admin_dashboard.php">Home </a>
                            </li>
                            <li class="nav-item">
                                <?php if($_SESSION['status'] == 'U'){ ?>
                                    <a class="nav-link" href="user_post.php">Concert</a>
                                <?php } else{ ?>
                                    <a class="nav-link" href="admin_post.php">Post </a>
                                <?php } ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Profile</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
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
                    <div class="col-8 my-3 mx-auto h5">
                        <h2 class="text-center">Edit Profile</h2>
                        <form action="datafile.php" method="post" enctype="multipart/form-data">
                            <div class="my-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" value='<?php echo $_SESSION["fname"]; ?>'>
                            </div>
                            <div class="form-group my-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" value='<?php echo $_SESSION["lname"]; ?>'>
                            </div>
                            <div class="form-group my-3">
                                <label for="c_num" class="form-label">Contact Number</label>
                                <input type="text" name="c_number" id="c_num" class="form-control" value="<?php echo $profile['contact_number']; ?>">
                            </div>
                            <div class="form-group my-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address"  class="form-control" value="<?php echo $profile['address']; ?>">
                            </div>
                                <div class="mt-3">
                                    <label for="profile_pic" class="form-label">Profile Image</label>
                                </div>
                                <img src="images/<?php echo$_SESSION["file_name"] ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <input type="file" name="profile_pic" id="profile_pic" class="form-control my-3">
                            
                            <div class="form-group my-3">
                                <label for="uname" class="form-label">User Name</label>
                                <input type="text" name="uname" id="uname"  class="form-control" value='<?php echo $_SESSION["username"]; ?>'>
                            </div>

                            <!-- <button type="submit" name="update" class="btn btn-dark mt-3 btn-block">Update</button> -->

                            <button type="button" class="btn  btn-dark btn-block mt-3" data-toggle="modal" data-target="#exampleModal">
                                Update
                            </button>

                            <!-- modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Enter Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                            </div>

                        </form>
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