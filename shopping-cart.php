<?php require("includes/dbcon.php")?>


<?php 
            try{
                if(isset($_POST['add-to-cart'])){
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        img{
            width: 150px;
            height: 105px;
            box-sizing: border-box;
        }
        .remove img{
            width: 50px;
            height: 50px;
        }

        .remove{
            display: flex;
            justify-content: center;
            align-items: center;
            border-style: none;
            cursor: pointer;    
        }
       .checkout{
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

    <h1>MY SHOPPING CART</h1>

    <table>
        <thead>
            <td></td>
            <td>PRODUCT</td>
            <td>PRICE</td>
            <td>QUANTITY</td>
            <td>TOTAL</td>
            <td>REMOVE ITEM</td>
        </thead>
        <tbody>
            <?php  
                //display the products to cart
                try{
                $descriptions = "SELECT * FROM cart";
                foreach($conn->query($descriptions) as $description){
           
                
            ?>
           <tr>
            <td class="checkbox">
                
                <?php echo "<img src='product-pics/".$description['filename']."' placeholder='product-image' class=''";?>           
        </td>       
            <td><?php echo "<h3>".$description['name']."</h3><br>";?></td>
            <td><?php echo "<h3>".$description['price']."</h3><br>";?></td>
            <td><?php echo "<h3>".$description['quantity']."</h3><br>";?></td>
            <td><?php $total = $description['price'] * $description['quantity'];
                    echo $total;
            ?></td>
            <td>
                <form action="shopping-cart.php" method="get">
                    <input type="hidden" name="cartID" value="<?php echo $description['cartID']?>">
                     <button class="remove" name="remove"><img src="pics/remove.png" alt="" style = ></button>  
                </form>

            </td>
            </tr>
        <?php  }}
        catch(Exception $e){
               echo $e->getMessage();
        }?>
        </tbody>
    </table>

        <div class="checkout">
                <form action="checkout.php" method="post">
                    <button><a href="home.php">HOMEPAGE</a></button>
                    <input type="submit" value="CHECKOUT" name="checkout">
                </form>
        </div>
   
</body>
</html>


<?php
if(isset($_GET["remove"])){
    //remove the product into cart

   try{

    $cartID = $_GET['cartID'];
    $remove_product ="DELETE FROM cart WHERE cartID = $cartID";
    $query_run = $conn->exec($remove_product);
    
    if($query_run){

        header("Location: shopping-cart.php");
    }
    else {
      
    }
   }catch(Exception $e){
    echo $e->getMessage();
   }
}

?>