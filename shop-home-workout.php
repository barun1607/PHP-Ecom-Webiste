<?php
  session_start();

  if(!isset($_SESSION['uid'])) {
    header('login.php');
    die();
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wp_project_db";

  $connection = mysqli_connect($servername, $username, $password, $dbname);

  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $fetchProducts = "SELECT * FROM products WHERE type='workout'";

  $result = $connection->query($fetchProducts);

  // if(mysqli_num_rows($result) > 0){
  //   echo "success";
  // } else {
  //   echo "No results";
  // }

  

  function renderProducts($row) {
    // print_r($row);
    echo '<div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" src="'.$row['path'].'" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="shop-item.php?pid='.$row['pid'].'">'.$row['pname'].'</a>
          </h4>
          <h5>Rs. '.$row['price'].'</h5>
          <p class="card-text">'.$row['description'].'</p>
        </div>
        <div class="card-footer">
          <large style="color: #0278AE;">&#9733; &#9733; &#9733; &#9733; &#9734;</large>
        </div>
      </div>
    </div>';
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

  <title>Shop</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/fontawesome/css/all.css">

  <!-- Custom styles for this template -->
  <link href="css/styles.css" rel="stylesheet">

</head>

<body>

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
          <li class="nav-item active">
            <a class="nav-link" href="#">Shop              
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Calculators</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart <i class='fas fa-shopping-cart'></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout <i class='fas fa-sign-out-alt'></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4 tex">Shop</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Workouts</a>
          <a href="shop-home-diet.php" class="list-group-item">Diets</a>
          <a href="shop-home-supp.php" class="list-group-item">Supplements</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="assets/img/pexels-li-sun-2294354.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/img/gym-coronavirus.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/img/pexels-li-sun-2294361.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

        <?php
          while($row = $result->fetch_assoc()) {
            renderProducts($row);
          }
        ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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
