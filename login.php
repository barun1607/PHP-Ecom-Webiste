<?php
  session_start();

  include('config.php');

  $fail = "";

  if(isset($_POST['submit'])) {
    if(isset($_POST['username']) && isset($_POST['password'])) {

      $loginUname = htmlspecialchars($_POST['username']);
      $loginPass = htmlspecialchars($_POST['password']);

      $verifyQuery = 'SELECT * FROM users WHERE uname='."'".$loginUname."'".' AND pass='."'".$loginPass."'".'';

      $result = $connection->query($verifyQuery);
      $count = mysqli_num_rows($result);
      $row = $result->fetch_assoc();

      if($count == 1) {
        $_SESSION['uid'] = $row['uid'];
        header('Location: home.php');
      } else {
        $fail = "Invalid credentials";
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

  <title>Login</title>

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
            <form method="post" action="login.php">
              <small style="color: red;"><?php echo $fail;?></small>
              <div class="form-group">                
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="unameinp" name="username" placeholder="Enter username">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="passinp" name="password" placeholder="Enter password">
              </div>
              <a href="signup.php" class="btn btn-info">Sign up</a> 
              <button type="submit" name="submit" class="btn btn-primary">Log in</button>                         
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