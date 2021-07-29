<?php
    include 'datafile.php';
    $post = $functions->get_post_user();
    $hall = $functions->get_post_hall_user();

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
                                <a class="nav-link" href="user_dashboard.php">Home </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Concert <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile_user.php">Profile</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                            <a href="profile_user.php" class="nav-link">Welcome, <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?> !</a>
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
                                <h5 class="text-uppercase mb-4 text-white wow fadeInDown" data-wow-delay="0.4s"><strong>Concert
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
            <div class="container-fluid">
                <!--Grid row-->
                <div class="row py-5">
                    <!--Grid column-->
                    <div class="col-10 mx-auto mb-5">
                        <h2 class="text-center">Serch Concerts</h2>
                            <form action="datafile.php" method="post">
                            <div class="row h5">
                                <div class="col-5 text-center mx-auto">
                                    <label for="keywords" class="form-label h4">Keywords</label>
                                    <input type="text" class="form-control" name="searched_concert" id="keywords" aria-label="Recipient's username" aria-describedby="button-addon2" placeholder="Search Composers, Conductors and Halls">
                                    <div class="div text-center col-5 mx-auto mt-3">
                                        <button class="btn btn-outline-dark w-100" type="submit" name="search1" id="button-addon2">Search</button>
                                    </div>
                                </div>
                                <div class="col-5 text-center mx-auto">
                                <label for="date" class="form-label h4">Date</label>
                                    <div class="input-group input-daterange"> 
                                        <label class=" form-control-placeholder mr-3" id="start-p" for="start">Start Date</label>
                                        <input type="text" id="start" class="form-control text-left mr-3" name="start"> 
                                        <span class="fa fa-calendar" id="fa-1"></span> 
                                        <label class="form-control-placeholder mr-3" id="end-p" for="end">End Date</label> 
                                        <input type="text" id="end" class="form-control text-left " name="end"> 
                                        <span class="fa fa-calendar" id="fa-2"></span> 
                                    </div>
                                    <div class="div text-center col-5 mx-auto mt-3">
                                        <button class="btn btn-outline-dark w-100" type="submit" name="search2" id="button-addon2">Search</button>
                                    </div>
                                </div>
                                <!-- <div class="col-4 text-center ">
                                    <label for="hall" class="form-label h4">hall</label>
                                    <select name="hall" id="hall" class="form-control"> -->
                                        <!-- <option disabled selected>choose hall</option> -->
                                        <!-- <?php foreach($hall as $row){ ?>
                                            <option value="<?php echo $row['hall'] ?>"><?php echo $row['hall']?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="div text-center col-5 mx-auto mt-3">
                                        <button class="btn btn-outline-dark w-100" type="submit" name="search3" id="button-addon2">Search</button>
                                    </div>
                                </div> -->
                            </div>
                            
                            </form>
                                    
                    </div>

                    <div class="col-9 mx-auto">
                        <?php if($post == false){ ?>
                            <h2 class="text-center mb-3">
                            No records to display.
                            </h2>
                        <?php }else{ ?>
                        <h2  class="text-center mb-3">All Concerts</h2>
                        <div class="row card-deck">
                            <?php foreach($post as $row){ ?>
                            <div class="col-3 my-2">
                                <div class="card ">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>

      

    <script>
        $(document).ready(function(){
        $('.input-daterange').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        calendarWeeks : true,
        clearBtn: true,
        disableTouchKeyboard: true
        });

        });
    </script>
</body>

</html>