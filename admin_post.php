<?php
    include 'datafile.php';
    $user_id = $_SESSION['id'];
    $post = $functions->get_post_admin($user_id);

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
                                <a class="nav-link" href="#">Post</a>
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
                                <h5 class="text-uppercase mb-4 text-white wow fadeInDown" data-wow-delay="0.4s"><strong>Post
                                </strong></h5>
                                <a href="add_post.php" class="btn btn-outline-light font-weight-bold wow fadeInDown" data-wow-delay="0.4s">Add Post</a>
                                <!-- <a href="add_post.php" class="btn btn-outline-light font-weight-bold wow fadeInDown" data-wow-delay="0.4s">Edit Post</a> -->
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
                    <div class="col-7 mx-auto">
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
                    
                    <div class="col-10 mx-auto">
                        <table class="table table-bordered mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Concert Name</th>
                                    <th>Date</th>
                                    <th>Opening Time</th>
                                    <th>Hall</th>
                                    <th>Artists</th>
                                    <th>Program</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php if($post == false){
                                echo "<tr><td class='text-center' colspan='8'>No records to display.</td></tr>";
                            }else{ ?>
                                <?php foreach($post as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['concert_name']?></td>
                                        <td><?php echo $row['date']?></td>
                                        <td><?php echo $row['opening_time']?></td>
                                        <td><?php echo $row['hall']?></td>
                                        <td><?php echo $row['artists']?></td>
                                        <td><?php echo $row['program']?></td>
                                        <td><a href="post_detail_admin.php?id=<?php echo $row['post_id']?>" class="btn btn-sm btn-dark">Detail</a></td>
                                        <td>
                                        <a href="edit_post.php?id=<?php echo $row['post_id']?>" class="btn btn-sm btn-dark">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modelId_<?php echo $row['post_id'] ?>">
                                         Delete
                                        </button>
                                        </td>
                                    </tr>
                                      
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId_<?php echo $row['post_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Notice</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       Are you sure you want to delete the Post <?php echo $row['post_id'] ?>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="delete_post.php?id=<?php echo $row['post_id']?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>


                            </tbody>
                            
                        </table>
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