<?php require("includes/dbcon.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        <?php ?>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td>
                  <form action="" method="post">
                    <input type="submit" value="buy again">
                  </form>
                </td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

</body>
</html>

<?php if(isset($_POST['place-order'])){
    $cartID = $_POST['cartID'];
    $price = $_POST['price'];
    $quantity= $_POST['quantity'];
    $add_ordered="INSERT INTO products_ordered(productName,price,quantity,cartID) VALUES(:productName,:price,:quantity,:cartID)";
    $query_run = $conn->prepare($add_ordered);
    $data=[
        ":cartID" => $_POST['cartID'],
        ":price" => $_POST['price'],
        ":quantity"=> $_POST['quantity']
    ];
    $query_exec =$query_run->execute($data);
} 

?>