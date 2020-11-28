<?php
  session_start();

  include('config.php');

  $fail = "";
  $success = "";

  if(isset($_POST['submit'])) {
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['reconfirm']) ) {

      $signupUname = htmlspecialchars($_POST['username']);
      $signupPass = htmlspecialchars($_POST['password']);
      $signupEmail = htmlspecialchars($_POST['email']);
      $signupRecon = htmlspecialchars($_POST['reconfirm']);
      $uid = NULL;

      $verifyQuery = 'SELECT * FROM users WHERE uname='."'"."$signupUname"."'".'';
      $addQuery = "INSERT INTO users(uname, email, pass) VALUES('$signupUname', '$signupEmail', '$signupPass')";
      $createCart = "INSERT INTO cart(uid) SELECT uid FROM users WHERE uname='$signupUname'";

      $result = $connection->query($verifyQuery);
      $count = mysqli_num_rows($result);
      $row = $result->fetch_assoc();

      if(strlen($signupPass) < 8) {
        $fail = "Password should be atleast 8 characters long";
      } else if($signupPass != $signupRecon) {
        $fail = "Passwords don't match";
      } else if($count == 1) {
        $fail = "Username already exists";
      } else {
        $success = "Account successfully created <a href="."login.php".">[Go to login page]</a>";
        $addResult = $connection->query($addQuery);
        if($addResult) {
          $connection->query($createCart);
        }        
      }
    }
  }

  $connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sign up</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/fontawesome/css/all.css">

  <!-- Custom styles for this template -->
  <link href="css/styles.css" rel="stylesheet">

</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card mt-5 mb-5">
          <div class="card-body">
            <h3 class="card-title">Log into your account</h3>
            <form method="post" action="signup.php">
              <small style="color: red;"><?php echo $fail;?></small>
              <small style="color: green;"><?php echo $success;?></small>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="unameinp" name="username" placeholder="Enter username">
              </div>
              <div class="form-group">
                <small></small>
                <label for="username">Email</label>
                <input type="email" class="form-control" id="emailinp" name="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="passinp" name="password" placeholder="Enter password">
              </div>
              <div class="form-group">
                <label for="reconfirm">Reconfirm Password</label>
                <input type="password" class="form-control" id="reconinp" name="reconfirm" placeholder="Enter password again">
              </div>
              <button type="submit" name="submit" class="btn btn-info">Sign up</button>                        
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  

  <footer class="py-5 navbar-custom" style="position: relative; top: 25vh;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Varun 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>