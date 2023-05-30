<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IITJ</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="center">
        <div class="container">
            <div class="right">
                <h1>Log in</h1>
            <div class="form">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post"  class="form" >
      Email:<br> <input type="email" placeholder="Enter Email:" name="email" class="number">
      Password:<br> <input type="password" placeholder="Enter Password:" name="password" class="number">
            <button class="continue" name="login">Login</button>
      </form>
      </div>
            </div>
            <div class="left">
                <div class="logo"><img src="iitjlogo.png" alt=""></div>
                <div class="login"><p>Already Registered <a href="index.php">Registration Here</a></p></div>
            </div>
        </div>
    </div>
    </body>
</html>