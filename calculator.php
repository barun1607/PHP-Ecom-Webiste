<?php
  session_start();

  if(!isset($_SESSION['uid'])) {
    header('Location: login.php');
    die();
  }

  include('config.php'); 

  $bmi = 0;
  $bf = 0;

  if(isset($_POST['submit1'])) {
    if(isset($_POST['weightbmi']) && isset($_POST['heightbmi'])) {
      $h = $_POST['heightbmi'];
      $w = $_POST['weightbmi'];
      $bmi = $w / (($h / 100) * ($h / 100));
    }
  }

  if(isset($_POST['submit2'])) {
    if(isset($_POST['weightbf']) && isset($_POST['waistbf'])) {
      $wh = $_POST['weightbf'];
      $wt = $_POST['waistbf'];

      $f1 = ($wh * 1.082) + 94.42;
      $f2 = $wt * 4.15;

      $lm = $f1 - $f2;

      $bf = (($wh - $lm) * 100) / $wh;
    }
  }

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

  <div class="container mt-5 text-def">
    <div class="row">
      <div class="col-12">
        <h2 class="mb-3">Calculators</h2>
      </div>      
    </div>    
    <div class="row">
      <div class="col-md-6">
        <div class="card mt-2 mb-5">
            <div class="card-body">
              <h3 class="card-title">BMI calculator</h3>
              <form method="post" action="calculator.php">
                <div class="form-group">                
                  <label for="weightbmi">Weight</label>
                  <input type="number" class="form-control" id="weightbmi" name="weightbmi" placeholder="Enter weight in kilos">
                </div>
                <div class="form-group">
                  <label for="heightbmi">Height</label>
                  <input type="number" class="form-control" id="heightbmi" name="heightbmi" placeholder="Enter height in centimetres">
                </div>
                <button type="submit" name="submit1" class="btn btn-primary">Calculate BMI</button>
                <h4 class="mt-2">Result: <?php if($bmi != 0) echo $bmi; ?></h4>                         
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mb-5 text-def">   
    <div class="row">
      <div class="col-md-6">
        <div class="card mt-2 mb-5">
            <div class="card-body">
              <h3 class="card-title">BF% Calculator</h3>
              <form method="post" action="calculator.php">
                <div class="form-group">                
                  <label for="weightbf">Weight</label>
                  <input type="number" class="form-control" id="weightbf" name="weightbf" placeholder="Enter weight in kilos">
                </div>
                <div class="form-group">
                  <label for="waistbf">Waist Measurement</label>
                  <input type="number" class="form-control" id="waistbf" name="waistbf" placeholder="Enter waist measurement in inches">
                </div>
                <button type="submit" name="submit2" class="btn btn-primary">Calculate BF%</button>
                <h4 class="mt-2">Result: <?php if($bf != 0) echo $bf; ?></h4>                         
              </form>
            </div>
          </div>
        </div>
      </div>
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