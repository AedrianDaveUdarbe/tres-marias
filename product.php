    <?php require("includes/dbcon.php") ?>
    <?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        body{
            background: rgb(255,170,205);
            background: linear-gradient(180deg, rgba(255,170,205,1) 0%, rgba(244,233,194,1) 57%, rgba(244,233,194,1) 92%);
        }
        .content{
            display: flex;
            flex-direction: column  ;
            grid-gap: 10px;
          
        }
        .pics{
            grid-gap: 10px;
            display: flex;
            flex-direction: row  ;
        }
        .desc{
            grid-gap: 10px;     
            display: flex;
        
        }
        .product_pic {
            width: 200px;
            height: 200px;
            box-sizing: border-box;
            border-radius: 20px;
            border: 1px black solid;
        }
        input[type=submit]{
            border-style: none;
            background-color: transparent;
            cursor: pointer;
            color: blue;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width : 200px;

        }
        .logo-pic{
            width: 50px;
            height: 50px;
            object-fit: contain;
            border-style: none;
        }
        .cakeshop{
            padding-left: 100px;
        }
        .all_products{
            padding-left: 100px;
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
      <img class="navbar-brand-logo me-3 logo-pic" src="./assets/imgs/tres-marias-logo.png" alt="tres marias logo">
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

        <h1 class="cakeshop pt-5 pr-5">CAKESHOP<br> <span>NG TRES </span><br> MARIAS</h1>

        <div class="content">
            
        <div class="row justify-content-center">
        <?php 
         $product_pics = "SELECT * FROM product_pics WHERE productID <=5";
         foreach($conn->query($product_pics) as $product_pic){
             echo "<div class='col-sm-2 m-1'><img class='product_pic ' src='assets/imgs/".$product_pic['filename']."' placeholder='product-image' class='img-product' <br>";

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
         <br>
    <div>
        <h2 class="all_products">All Products</h2>
        <div class="row justify-content-center">
        <?php 
         $product_pics = "SELECT * FROM product_pics WHERE productID";
         foreach($conn->query($product_pics) as $product_pic){
             echo "<div class='col-sm-2 m-1'><img class='product_pic ' src='assets/imgs/".$product_pic['filename']."' placeholder='product-image' class='img-product' <br>";

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