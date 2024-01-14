<?php require("includes/dbcon.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- bootswatch theme -->
    <link rel="stylesheet" href="https://bootswatch.com/3/lumen/bootstrap.min.css">
    <style>
        .form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-login {
            max-width: 330px;
            padding: 1rem;
        }

        .form-login input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-login input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body>

    <?php if (isset($_SESSION['message'])) {
        echo '<h2>' . $_SESSION['message'] . '</h2>';

        // Clear the session message to prevent it from showing again
        unset($_SESSION['message']);
    }
    ?>

    <?php if (isset($_POST['login'])) {
        try {
            $username = $_POST["username"];
            $password = $_POST["password"];

            //to check if the user input does not fill the input box
            if (empty($username) || empty($password)) {
                echo "All field is required";
            } else {

                //to check if the  username and password is true
                $query = "SELECT * FROM users WHERE username=:username AND password=:password";
                $query_run = $conn->prepare($query);

                $query_run->execute(
                    array(
                        ":username" => $username,
                        ":password" => $password
                    )
                );

                $count = $query_run->rowCount();

                //to get the data of the table
                $userdata = $query_run->fetch(PDO::FETCH_ASSOC);

                //to count if the the account exist
                if ($count > 0) {

                    //to get the user's name data
                    $_SESSION["name"] = $userdata["name"];
                    header("Location: home.php");
                } else {
                    echo "username or password is wrong!";
                }
            }
        } catch (Exception $e) {
            echo "error " . $e->getMessage();
        }
    }
    ?>


    <!--Login form-->
    <div class="form-container">
        <form class="form-login" action="index.php" method="post">
            <h1 class="mb-3 fw-normal">LOGIN</h1>
            <div class="form-group">
                <label class="control-label" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" name="login" href="#" class="btn btn-primary">LOGIN</button>
            <a href="registration.php" class="btn btn-link">Click here to register an account</a>
            <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
        </form>
    </div>

    <!-- bootstrap js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>