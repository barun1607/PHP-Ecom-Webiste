<?php
  session_start();

  if(!isset($_SESSION['uid'])) {
    header('Location: login.php');
    die();
  }

  include('config.php');

  $getCartItems = "SELECT * FROM cart_contents WHERE cid=".$_SESSION['cid']."";
  $resultCartItems = $connection->query($getCartItems);

  $getProducts = "";
  $productStore = array();

  while($row = $resultCartItems->fetch_assoc()) {
    $getProducts = "SELECT * FROM products WHERE pid=".$row['pid'].";";
    $result = $connection->query($getProducts);
    array_push($productStore, $result->fetch_assoc());
  }

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
          <li class="nav-item">
            <a class="nav-link" href="calculator.php">Calculators</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Cart <i class='fas fa-shopping-cart'></i><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Logout <i class='fas fa-sign-out-alt'></i></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5 mb-5  text-def">
    <div class="row">
      <div class="col-12">
        <h2 class="mb-3">Your Cart</h2>
      </div>      
    </div>
    <div class="row"> 
      <?php
        if(empty($productStore)) {
          echo "<h4 >You haven't added any products yet</h4>";
        } else {
          foreach($productStore as $product) {
            renderProducts($product);
          } 
        }           
      ?>      
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