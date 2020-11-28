<?php
  session_start();

  if(!isset($_SESSION['uid'])) {
    header('Location: login.php');
    die();
  }

  include('config.php'); 

  $connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/fontawesome/css/all.css">

  <!-- Custom styles for this template -->
  <link href="css/styles.css" rel="stylesheet">
  
  <title>Cart</title>
</head>

<body>
  <?php include('logoutModal.php'); ?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Fitness Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop-home-workout.php">Shop</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Calculators<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="cart.php">Cart <i class='fas fa-shopping-cart'></i></a>
          </li>
          <li class="nav-item">
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Logout <i class='fas fa-sign-out-alt'></i></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5 mb-5  text-def">
    <h2 class="mb-3">Calculators</h2>
    <div class="row">
      
      
    </div>
  </div>

  <!-- Footer -->
  <!-- Footer -->
  <footer class="py-5 navbar-custom">
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