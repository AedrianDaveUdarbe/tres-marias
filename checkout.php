<?php require("includes/dbcon.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          img{
            width: 150px;
            height: 105px;
            box-sizing: border-box;
        }
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
        .payment-method{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .total-payment {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .place-order{
            display: flex;
            float: right;
            grid-gap: 10px;
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
    <h1>CHECKOUT</h1>

    <div>
        <p>Delivery Address</p><br>
        <p>Fullname | Contact Number | Full Address</p>

        <table>
            <thead>
                <tr><td></td>
                    <td>Products Ordered</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <?php if(isset($_POST['checkout']) || isset($_POST['buy-now'])){
                $order_total=0;
                $total_items=0;
                $shipping_fee = 30;
                    $display_order="SELECT * FROM cart";
                    foreach($conn->query($display_order) as $order){
            ?>
            <tbody>
                <tr>
                     <td><?php echo "<img src='assets/imgs/".$order['filename']."' placeholder='product-image' class=''";?>   </td>   
                    <td><?php echo "<h3>".$order['name']."</h3><br>";?></td>
                    <td><?php echo "<h3>".$order['price']."</h3><br>";?></td>
                    <td><?php echo "<h3>".$order['quantity']."</h3><br>";?></td>
                    <td><?php $subtotal = $order['price'] * $order['quantity']; 
                                    
                                 $order_total += $subtotal;
                                 $total_items += $order['quantity'];
                                 $total_payment = $order_total + $shipping_fee;
                                echo "₱".$subtotal;
                    ?></td>
        </tr>
            </tbody>
                  <?php  }}?>
        </table>
        <div class="payment-method"><h3>PAYMENT METHOD</h3> <h3>E-wallet</h3><h3>Gcash</h3></div>
        <?php 
            echo "<div class='total-payment'>
                    <form action='message' method='post'>
                        <label>Message for Sellers: </label><br>
                        <textarea name='comments' rows='5' cols='30'></textarea>
                    </form>
                    <div>
                        <h3>ORDER TOTAL: (".$total_items." ITEM(S)): ₱".$order_total."</h3>
                        <h3>SHIPPING FEE: ₱".$shipping_fee."</h3>
                        <h3>TOTAL PAYMENT: ₱".$total_payment."</h3>
                    </div>
            </div>";
        ?>
    </div>

    <form action="order-history.php" method="post" class="place-order">
        <button><a href="product.php">CANCEL</a></button>
        <input type="hidden" name="order_total" value="<?php echo $order_total;?>">
        <input type="hidden" name="shipping_fee" value="<?php echo $shipping_fee;?>">
        <input type="hidden" name="total_payment" value="<?php echo $total_payment;?>">
        
        <input type="hidden" name="product-name" value="<?php echo $order['name'];?>">
        <input type="hidden" name="cartID" value="<?php echo $order['cartID'];?>">
        <input type="hidden" name="price" value="<?php echo $order['price'];?>">
        <input type="hidden" name="quantity" value="<?php echo $order['quantity'];?>">
        <input type="submit" value="PLACE ORDER" name="place-order">
    </form>
</body>
</html>