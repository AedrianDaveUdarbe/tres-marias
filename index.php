<?php require("includes/dbcon.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {

  try {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username=:username AND password=:password";
    $query_run = $conn->prepare($query);

    $query_run->execute(
      array(
        ":username" => $username,
        ":password" => $password
      )
    );

    $count = $query_run->rowCount();
    $userdata = $query_run->fetch(PDO::FETCH_ASSOC);

    //to count if the the account exist
    if ($count > 0) {
      $_SESSION["username"] = $userdata["username"];
      header("Location: home.php");
    } else {
?>
      <script type="module">
        import {
          createErrorMssg,
          removeErrorMssg
        } from './errorMessage.js';
        createErrorMssg("Unauthorized username and password.", "login-form");
        removeErrorMssg(5000);
      </script>
<?php
    }
  } catch (Exception $e) {
    echo "error " . $e->getMessage();
  }
}
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
      max-width: 500px;
      min-width: 350px;
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
  <div class="form-container">
    <form class="form-login bg-light shadow-lg p-5 mb bg-body-tertiary rounded-5" action="index.php" method="post" id="login-form">
      <h1 class="mb-3 fw-normal text-center">LOGIN</h1>
      <div class="form-group">
        <label class="control-label" for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">
      </div>
      <div class="form-group">
        <label class="control-label" for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <button type="submit" name="login" href="#" class="btn btn-primary w-100" id="login">LOGIN</button>
      <a href="registration.php" class="btn btn-link text-center d-block">Click here to register an account</a>
      <p class="mt-5 mb-3 text-body-secondary text-center">© 2023-2024</p>
    </form>
  </div>

  <!-- bootstrap js cdn -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script>
    const usernameInpt = document.getElementById("username");
    const passwordInpt = document.getElementById("password");
    const loginBtn = document.getElementById("login");
    const inputs = [usernameInpt, passwordInpt]

    validateInput();
    inputs.forEach(input => {
      input.addEventListener("input", () => {
        validateInput()
      })
    });

    function validateInput() {
      if (usernameInpt.value.length && passwordInpt.value.length) {
        loginBtn.removeAttribute("disabled");
      } else {
        loginBtn.setAttribute("disabled", "disabled");
      }
    }
  </script>

</body>

</html>