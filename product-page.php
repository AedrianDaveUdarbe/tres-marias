<?php require("includes/dbcon.php")?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         img{
            margin: 30px;
            width: 400px;
            height: 400px;
            box-sizing: border-box;
        }
        .content{
            display: flex;
            flex-direction: row  ;
            grid-gap: 10px;
          
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
    </style>
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

    <br>
        <div class="content">
    <?php
       try{
        if(isset($_GET['product-name'])){
            $productID = $_GET['productID'];
            
            //display the picture of the product
            $product_pics = "SELECT * FROM product_pics WHERE productID = '$productID'";
            foreach($conn->query($product_pics) as $product_pic){
                echo "<img src='assets/imgs/".$product_pic['filename']."' placeholder='product-image' class='' <br>";
            }

            echo "<div class= 'desc'>";
            //display the description of the product
            $product_description = "SELECT * FROM products WHERE productID = '$productID'";
            foreach($conn->query($product_description) as $description ){
                echo "<h1>".$description['name']."</h1><br>";
                echo $description['description']."<br>";
                echo "<h4>₱".$description['price']."</h4>";
                echo "<h4>Stock: ".$description['stock']."</h4><br>";
            }
            
            echo "<div class='buttons'>
            <form action='shopping-cart.php' method='post'>
                <input type='submit' value= 'ADD TO CART' name='add-to-cart'>
                <input type='submit' value= 'BUY NOW' name='buy-now'>
                <input type='hidden' name='productID' value='".$description['productID']."' id=''>
                <input type='hidden' name='name' value='".$description['name']."' id=''>
                <input type='hidden' name='price' value='".$description['price']."' id=''>
                <input type='hidden' name='filename' value='".$product_pic['filename']."' id=''>
                <input type='hidden' name='quantity' value='1' id=''>
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
        </div>
           <!--add footer-->
    <div>
        <p>Indulge in the Sweet Delights of Aparri, Cagayan!</p>

        <a href="">fb: Marias Bakeshop</a><br>
        <a href="">ig: tres_mariascakes</a>
    </div>

</body>
</html>


