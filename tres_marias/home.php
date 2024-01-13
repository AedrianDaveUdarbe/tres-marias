<?php require("includes/dbcon.php") ?>
<?php session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

      <!--Nav Bar-->
      <div>
        <!--Add Logo picture-->
    <img src="" alt="logo">
    <a href="home.php">Home</a>
    <a href="product.php">Products<c/a>
    <a href="shopping-cart.php">Shopping Cart</a>
    <a href="contact-us.php">Contact Us</a>
    <a href="about-us.php">About Us</a>
    <a href="review.php">Review</a>
    <a href="faq.php">FAQ</a>
    <a href="my-account.php">My Account</a>
    <!--add the searchbar-->
    </div>

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