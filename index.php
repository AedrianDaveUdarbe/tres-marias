<?php require("includes/dbcon.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if (isset($_SESSION['message'])) {
    echo '<h2>' . $_SESSION['message'] . '</h2>';

    // Clear the session message to prevent it from showing again
    unset($_SESSION['message']);
}
?>

<?php  if (isset($_POST['login'])) {
   try{
    $username=$_POST["username"];
    $password=$_POST["password"];

    //to check if the user input does not fill the input box
    if(empty($username) || empty($password)) {
        echo"All field is required";
    }
     else {

    //to check if the  username and password is true
    $query= "SELECT * FROM users WHERE username=:username AND password=:password";
    $query_run= $conn->prepare($query);

    $query_run->execute(
        array(
            ":username"=> $username,
            ":password"=> $password
        )
    );

    $count = $query_run->rowCount();

    //to get the data of the table
    $userdata = $query_run->fetch(PDO::FETCH_ASSOC);

    //to count if the the account exist
    if($count > 0) {

        //to get the user's name data
        $_SESSION["name"] = $userdata["name"];
        header("Location: home.php");
    }
    else{
        echo "username or password is wrong!";
    }
     
}
   }
   catch(Exception $e){
    echo "error ".$e->getMessage();
    
   }
}
?>

    <!--Login form-->
    <div>
        <form action="index.php" method="post">
            <h1>LOGIN</h1>

            <label for="">Username</label>
            <input type="text" name="username" id="" placeholder="Type your username"><br>

            <label for="">Password</label>
            <input type="password" name="password" id="" placeholder="Type your password"><br>

            <input type="submit" value="LOGIN" name="login"><br>
            <a href="registration.php">Click here to register an account</a>
        </form>
    </div>
</body>
</html>