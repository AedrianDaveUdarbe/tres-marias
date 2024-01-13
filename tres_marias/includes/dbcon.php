<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername="localhost";
        $username= "root";
        $password= "";
        $dbname= "tres marias";

        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo "connected successfuly";
        }
        catch (Exception $e){
            echo "connection failed".$e->getMessage()."";
        }
    ?>
</body>
</html>