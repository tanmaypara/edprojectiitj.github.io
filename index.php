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
                <h1>Create Account</h1>
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post" class="form" id="myForm" onsubmit="return checkWords()">
            Your name:<br><input type="text" class="number" name="fullname" placeholder="Full Name:" required><br>
            Email:<br> <input type="text" class="number" name="email" id="textInput" placeholder="Email:" required><br>
            Password:<br><input type="password" class="number" name="password" placeholder="Password:" required><br>
            Repeat Password:<br> <input type="password" class="number" name="repeat_password" placeholder="Repeat Password:" required><br>
                <button name="submit" class="continue">Registration</button>
            </div>
        </form>
        <div class="left">
                <div class="logo"><img src="iitjlogo.png" alt=""></div>
                <div class="login"><p>Already Registered <a href="login.php">Login Here</a></p></div>
            </div>
        </div>
    </div>

    <script>
    function checkWords() {
      var inputText = document.getElementById("textInput").value;
      var requiredWords = ["@iitj.ac.in"];
      
      for (var i = 0; i < requiredWords.length; i++) {
        if (inputText.indexOf(requiredWords[i]) === -1) {
          alert("Please include the required words: " + requiredWords.join(", "));
          return false; // Prevent form submission
        }
      }
      
      return true; // Allow form submission
    }
  </script>
</body>
</html>