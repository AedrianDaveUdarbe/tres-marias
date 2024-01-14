<?php
require("includes/dbcon.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tres Marias</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <style>
    .navbar-brand-logo {
      width: 50px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <img class="navbar-brand-logo me-3" src="./assets/imgs/tres-marias-logo.png" alt="tres marias logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor04" aria-controls="navbarColor04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor04">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="home.php">Home
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shopping-cart.php">Shopping Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about-us.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="review.php">Reviews</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.php">FAQs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my-account.php">My Account</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-sm-2" type="search" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

    <!--User's Name-->
    <?php
        if (isset($_SESSION["name"])) {
            echo "<h3>Login Success, Welcome " . $_SESSION["name"] . "</h3>";
        } else {
            // Redirect to index.php if the name is not set in the session
            header("Location: index.php");
            exit();
        }        
    ?>

    <!--Introduction-->
   <div>
        <h1>Welcome to Tres Marias <br> Cakes and Pastries</h1>
            <p>Indulge in the Sweet Delights of Aparri, Cagayan</p><br><br>

            <p>Discover the artistry and passion that defines Tres Marias Bakeshop. Nestled in the heart of Aparri, Cagayan, our bakeshop is a haven for those seeking exquisite treats and delightful moments.</p><br><br><br>
   </div>

   <!--Main Products-->
    <div>
        <p>OUR BEST SELLERS</p>
        <h3>Favorites</h3>
        <a href="">Mangoe Supreme Cake</a><br>
        <a href="">Mangoe Supreme Cake</a><br>
        <a href="">Mangoe Supreme Cake</a><br>
        <a href="">Mangoe Supreme Cake</a><br><br>
    </div>
    
    <div> 
        <h1>GET A CAKE</h1><br>
        <h4>NEW AND IMPROVED</h4>
        <h2>Yema Caramel Cake</h2>
        <h4>Experience pure bliss with our updated Yema Caramel Cake - a revamped version of our classic favorite!</h4><br>
        
        <button><a href="product.php">START ORDER</a></button>
    </div>

    <!--add footer-->
    <div>
        <p>Indulge in the Sweet Delights of Aparri, Cagayan!</p>

        <a href="">fb: Marias Bakeshop</a><br>
        <a href="">ig: tres_mariascakes</a>
    </div>
</body>
</html>