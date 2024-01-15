<?php require("includes/dbcon.php")?>
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
         .logo-pic{
            width: 50px;
            height: 50px;
            object-fit: contain;
            border-style: none;
        }
        
        .content{
            border: 1px black solid;
            margin: 50px;
           background-color: white;
           padding: 20px;
        }
        .desc{
            grid-gap: 10px;     
            display: flex;
            flex-direction: column  ;
        }
        h4{
            margin: -2px;
        }
        .buttons{
            display: flex;
            flex-direction: row;
            float: right;
            
        }
        .add-to-cart{
            margin-right: 10px;
        }
       .product_pic{
            width: 400px;
            height: 300px;
            object-fit: cover;
            border: 1px black solid;
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

    <br>
        <div class="content justify-content-evenly align-items-center  row">
    <?php
       try{
        if(isset($_GET['product-name'])){
            $productID = $_GET['productID'];
            
            //display the picture of the product
            $product_pics = "SELECT * FROM product_pics WHERE productID = '$productID'";
            foreach($conn->query($product_pics) as $product_pic){
                echo "<img class='product_pic col-sm-5' src='assets/imgs/".$product_pic['filename']."' placeholder='product-image' class='' <br>";
            }

            echo "<div class= 'desc col-sm-5'>";
            //display the description of the product
            $product_description = "SELECT * FROM products WHERE productID = '$productID'";
            foreach($conn->query($product_description) as $description ){
                echo "<h1>".$description['name']."</h1><br>";
                echo $description['description']."<br>";
                echo "<h4>₱".$description['price']."</h4>";
                echo "<h4>Stock: ".$description['stock']."</h4><br>";
            }
            
            echo "<div class='buttons'>
            <form class='add-to-cart' action='shopping-cart.php' method='post'>
                <input class='btn border-dark btn-white w-20' type='submit' value= 'ADD TO CART' name='add-to-cart'>
                <input type='hidden' name='productID' value='".$description['productID']."' id=''>
                <input type='hidden' name='name' value='".$description['name']."' id=''>
                <input type='hidden' name='price' value='".$description['price']."' id=''>
                <input type='hidden' name='filename' value='".$product_pic['filename']."' id=''>
                <input type='hidden' name='quantity' value='1' id=''>
            </form>

            <form action='checkout.php' method='post'>
                <input class='btn btn-success  w-20'type='submit' value= 'BUY NOW' name='buy-now'>
            </form>
        </div>";
            echo "</div>";
            $_SESSION['add_to_cart'] = "<script>alert('added to cart successfully!')</script>";

            if(isset($_POST['add-to-cart'])){
                echo $_SESSION['add_to_cart'];
            }
           
        }
       }catch(Exception $e){
        echo $e->getMessage();
       }
    ?>
    <?php 
            try{
                if(isset($_POST['buy-now'])){
                    $productID = $_POST['productID'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $filename=$_POST['filename'];

                    //insert the products to cart
                    $add_product= "INSERT INTO cart(productID,name,price,filename,quantity) VALUES(:productID,:name,:price,:filename,1)";
                    $query_run = $conn->prepare($add_product);
                    $data = [
                        ":productID" =>$_POST['productID'],
                        ":name" => $_POST['name'],
                        ":price" => $_POST['price'],
                        ":filename" => $_POST['filename']
                    ];
    
                    $query_exec = $query_run->execute($data);
    
                }
            }catch(Exception $e ){
                echo $e->getMessage();
            }
            ?>
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


