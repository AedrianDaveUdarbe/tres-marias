    <?php require("includes/dbcon.php") ?>
    <?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        img{
            width: 200px;
            height: 200px;
            box-sizing: border-box;
        }
        input[type=submit]{
            border-style: none;
            background-color: white;
            cursor: pointer;
            color: blue;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width : 200px;

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


        <h1>CAKESHOP NG TRES MARIAS</h1>

        <div class="content">
            
        <?php 
            echo "<div class='pics'>";
            $product_pics = "SELECT * FROM product_pics";
            foreach($conn->query($product_pics) as $product_pic){
                echo "<img src='product-pics/".$product_pic['filename']."' placeholder='product-image' class='' <br>";
            }
            echo "</div>";
            echo "<div class='desc'>";
                $products = "SELECT * FROM products";
                //to display the products
                foreach($conn->query($products) as $product){

                    
                    echo "<form action='product-page.php' method='get'>
                    <input type='hidden' name='productID' value='".$product['productID']." ?>' id=''>
                    
                    <input type='submit' value='".$product['name']."'name='product-name'><br>";
                    echo "₱".$product['price']."<br>";
                    echo "Stock: ".$product['stock']."<br>";
                    echo "</form>";
                    
                    
                    
                }
                echo "</div>";
            ?>
        </div>
    </div>

    <div>
        <h2>All Products</h2>
        <a href="">product name</a>
        <a href="">product name</a>
        <a href="">product name</a>
        <a href="">product name</a><br>
        <a href="">product name</a>
        <a href="">product name</a>
        <a href="">product name</a>
        <a href="">product name</a> 
    </div>

    <!--add footer-->
    <div>
        <p>Indulge in the Sweet Delights of Aparri, Cagayan!</p>

        <a href="">fb: Marias Bakeshop</a><br>
        <a href="">ig: tres_mariascakes</a>
    </div>
</body>
</html>