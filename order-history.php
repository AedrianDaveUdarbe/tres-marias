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
    <h1>ORDER HISTORY</h1>
    <table>
        <thead>
            <tr>
                <td></td>
                <td>PRODUCT</td>
                <td>PRICE</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <?php 
            $display_order="SELECT * FROM products_ordered";
            $query="SELECT * FROM date_ordered";
            $query_exec = $conn->query($query);
            $data = $query_exec->fetch(PDO::FETCH_ASSOC); 
            
            foreach($conn->query($display_order) as $order){
            ?>      
        <tbody>
            <tr>
                <td><?php echo "<img src='assets/imgs/".$order['filename']."' placeholder='product-image' class=''";?>  </td>
                <td><?php echo "<h3>".$order['productName']."</h3><br>";?></td>
                <td><?php echo "<h3>".$order['price']."</h3><br>";?></td>
                <td>
                  <form action="" method="post">
                    <input type="submit" value="Buy again">
                  
                </td>
                <td> <input type="submit" value="To Rate">
                  </td>
                </form>
            </tr>
        </tbody>
         <?php   }?>
    </table>

</body>
</html>

<?php if(isset($_POST['place-order'])){
    $order_total=$_POST['order_total'];
    $shipping_fee=$_POST['shipping_fee'];
    $total_payment=$_POST['total_payment'];
    $cartID = $_POST['cartID'];
    $price = $_POST['price'];
    $quantity= $_POST['quantity'];
   

    $add_ordered="INSERT INTO products_ordered(productName,price,quantity,cartID,filename) SELECT name,price,quantity,cartID,filename FROM cart";
    $query_run = $conn->exec($add_ordered);

    $add_date = "INSERT INTO date_ordered(created_at) VALUES(NOW())";
    $query_run = $conn->exec($add_date);
      
    $delete_cart="DELETE FROM cart";
    $query_exec = $conn->exec($delete_cart);

    $insert_description = "INSERT INTO ordered_description(order_total,shipping_fee,total_payment,date_orderedID) VALUES(:order_total,:shipping_fee,:total_payment,:date_orderedID)";
    $query_run=$conn->prepare($insert_description);
    $data=[
      ':order_total'=>$_POST['order_total'],
      ':shipping_fee'=>$_POST['shipping_fee'],
      ':total_payment'=>$_POST['total_payment'],
      ':date_orderedID' => $data['date_orderedID']
    ];
    $query_exec = $query_run->execute($data);
} 

?>