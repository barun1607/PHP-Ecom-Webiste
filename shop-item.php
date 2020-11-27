<?php
  session_start();

  if(!isset($_SESSION['uid'])) {
    header('login.php');
    die();
  }

  $pid = $_GET['pid'];
  $cid = $_SESSION['cid'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wp_project_db";

  $connection = mysqli_connect($servername, $username, $password, $dbname);

  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $getProduct = "SELECT * FROM products WHERE pid=$pid";
  $updateCart = "INSERT INTO cart_contents(cid, pid) values ($cid, $pid);";

  $result = $connection->query($getProduct);

  $row = $result->fetch_assoc();

  $message = "";

  if(isset($_POST['cartadd'])) {
    if($connection->query($updateCart) === TRUE) $message = "Item added to cart";
    unset($_POST['cartadd']);
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

  <title><?php echo $row['pname'];?></title>

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
            <a class="nav-link" href="shop-home-workout.php">Shop              
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Calculators</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Cart <i class='fas fa-shopping-cart'></i></a>
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
    <br><h3 class="text-def"><?php echo $message;?></h3>
    <div class="row justify-content-center">

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="<?php echo $row['path']; ?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $row['pname']; ?></h3>
            <h4>Rs. <?php echo $row['price']; ?></h4>
            <p class="card-text"><?php echo $row['description'] ?></p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <form method="POST">
              <button type="submit" name="cartadd" value="cartadd" class="btn btn-primary">Add to Cart</button>
            </form>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

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
