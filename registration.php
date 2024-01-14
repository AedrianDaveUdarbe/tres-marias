
<?php require("includes/dbcon.php");
    session_start();
    
    if(isset($_POST["register"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone_number = $_POST["phone_number"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "INSERT INTO users(name,email,phone_number,username,password) VALUES(:name,:email,:phone_number,:username,:password)";
        $query_run = $conn->prepare($query);

        $data = [
            ":name" =>$name,
            ":email" =>$email,
            ":phone_number" =>$phone_number,
            ":username" =>$username,
            ":password" =>$password

        ];

        $query_exec = $query_run->execute($data);

        if($query_exec){
            $_SESSION["message"]="Created account successfuly";
            header("Location: index.php");
        }
        else
        {
            $_SESSION["message"]="Not created";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Registration Form-->
    <div>
        <form action="registration.php" method="post">

         <h1>REGISTER AN ACCOUNT</h1>

            <label for="">Name</label>
            <input type="text" name="name" id="" placeholder="Type your full name"><br>

            <label for="">Email</label>
            <input type="email" name="email" id="" placeholder="Type your email"><br>

            <label for="">Phone Number</label>
            <input type="number" name="phone_number" id="" placeholder="Type your phone number"><br>

            <label for="">Username</label>
            <input type="text" name="username" id="" placeholder="Type your username"><br>

            <label for="">Password</label>
            <input type="password" name="password" id="" placeholder="Type your password"><br>



            <input type="submit" value="REGISTER" name="register"><br>
        </form>
    </div>
</body>
</html>