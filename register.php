<!doctype html>
<html lang="en">
  <head>
    <title>Classical Concert Information -Sign up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/319afa374e.js"></script>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-7 mx-auto">
                  <h1>Register</h1>
                  <form action="datafile.php" method="post" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" name="fname" id="fname"  class="form-control ">
                    </div>
                    <div class="form-group my-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="c_num" class="form-label">Contact Number</label>
                        <input type="text" name="c_number" id="c_num" class="form-control ">
                    </div>
                    <div class="form-group my-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address"  class="form-control ">
                    </div>
                    <div class="form-group my-3">
                        <label for="profilepic" class="form-label">Profile Image</label>
                        <input type="file" name="profilepic" id="profilepic" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="uname" class="form-label">User Name</label>
                        <input type="text" name="uname" id="uname"  class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="pword" class="form-label">Password</label>
                        <input type="password" name="pword" id="pword"  class="form-control ">
                    </div>

                    <button type="submit" name="register" class="btn btn-info mt-3 btn-block">Register</button>
                  </form>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>