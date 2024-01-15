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
    .img-container{
      width: 250px;
      height: 300px;
    }
    .img-container img{
      width: 250px;
      height: 300px;
      object-fit: cover ;
    }
    .img-product{
      width: 200px;
      height: 200px;
      object-fit: cover ;
      border-radius: 20px;
      border: 1px black solid;
    }

    .custom-margin{
      margin-left: 20px;
      margin-top: 20px;
      margin-right: 20px;
    }

    .main-products{
      background-color: #FCF3EB;
      padding: 30px ;
    }
    .desc{
            grid-gap: 10px;     
            display: flex;
        
        }
        input[type=submit]{
            border-style: none;
            background-color: none;
            cursor: pointer;
            color: blue;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width : 200px;
        }
        .text-center{
          margin-top: 50px;
        }
         .footer{
          background-color: #76453B;
         
         }
         .footer{
            overflow: hidden;
         }
         .footer-img img{
          width: 300px;
          height: 300px;
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
  if (isset($_SESSION["username"])) {
    echo "<h3>Login Success, Welcome " . $_SESSION["username"] . "</h3>";
  } else {
    // Redirect to index.php if the name is not set in the session
    header("Location: index.php");
    exit();
  }
  ?>

  <!--Introduction-->
  <div class="row custom-margin">
    <div class="col-sm-8">
        <h1>Welcome to <span style="color:red">Tres Marias</span> <br> Cakes and Pastries</h1>
        <p>Indulge in the Sweet Delights of Aparri, Cagayan</p><br><br>

        <p>Discover the artistry and passion that defines Tres Marias Bakeshop. Nestled in the heart of Aparri, Cagayan, our bakeshop is a haven for those seeking exquisite treats and delightful moments.</p><br><br><br>
    </div class="col-sm-4">
    <div class="img-container">
        <img src="assets/imgs/kim-chu.png" alt="kim-chu with pandesal">
    </div>
  </div>

  <!--Main Products-->
  <div class="main-products">
    <p>OUR BEST SELLERS</p>
    <h3>Favorites</h3>
    <div class="row justify-content-center">
        <?php 
         $product_pics = "SELECT * FROM product_pics WHERE productID <=5";
         foreach($conn->query($product_pics) as $product_pic){
             echo "<div class='col-sm-2 m-1'><img src='assets/imgs/".$product_pic['filename']."' placeholder='product-image' class='img-product' <br>";

              $productID=$product_pic['productID'];
              $products = "SELECT * FROM products WHERE productID =$productID";
              $display = $conn->query($products);
              $description = $display->fetch(PDO::FETCH_ASSOC);
             
             echo "<form action='product-page.php' method='get'>";
             echo  "<input type='submit' value='".$description['name']."'name='product-name'><br>";
             echo " <input type='hidden' name='productID' value=".$description['productID'].">";
             echo "</form>";
             echo "</div>";
         }
         
        ?>

    </div>
  </div>
        
  <div>
    <h1 class="text-center">GET A CAKE</h1><br>
    
  </div>
  
  <div class="row m-5 justify-content-center">
          <div class="col-sm-4">
              <h4>NEW AND IMPROVED</h4>
              <h2>Yema Caramel Cake</h2>
              <h4>Experience pure bliss with our updated Yema Caramel Cake - a revamped version of our classic favorite!</h4><br>
              <button class="btn btn-danger w-20"><a class="text-decoration-none" style="color: white" href="product.php">START ORDER</a></button>
          </div>
          <img class="col-sm-4"src="assets/imgs/yema.png" alt="">
  </div>
  <!--add footer-->
 <div class="footer">
      <div class="row p-3">

      <div class="col-sm-3 footer-img">
        <img src="assets/imgs/tres-marias-logo.png" alt="">
      </div>

      <div class="col-sm-4">
        <p class="text-white">Indulge in the Sweet Delights of Aparri, Cagayan!</p>
        <div>
              <div class="col-sm-5 mb-2" ><img class=" navbar-brand-logo me-2" src="assets/icons/fb-logo.png" alt=""><a class="text-white text-decoration-none" href="">Marias Bakeshop</a>
              </div>
              <div class="col-sm-5 "><img class=" navbar-brand-logo me-2 " src="assets/icons/ig-logo.png" alt=""><a class="text-white text-decoration-none" href="">tres_mariascakes</a>
              </div>
      </div>
      </div>
      <div class="col-sm-2">
          <p class="text-white">Explore Tres  Marias</p><br><br>
          <a href="" class="text-white">Home</a><br>
          <a href="" class="text-white">Products</a><br>
          <a href="" class="text-white">Shopping Cart</a><br>
          <a href="" class="text-white">Contact Us</a><br>
          <a href="" class="text-white">About Us</a>
          <a href="" class="text-white">FAQs</a>
        </div>
        <div class="col-sm-2">
          <p class="text-white">Products</p><br><br>
          <a href="" class="text-white">Baked Classics</a><br>
          <a href="" class="text-white">Baked Loaves</a><br>
          <a href="" class="text-white">Baked Sweets</a><br>
          <a href="" class="text-white">Fried Breads</a><br>
          <a href="" class="text-white">Pastries</a>
          <a href="" class="text-white">Snack Cakes</a>
        </div>
      </div>
 </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>