<?php

include 'databuy.php';

if(isset($_POST['done'])){
	$filename= $_FILES["uploadfile"]["name"];
$tempname= $_FILES["uploadfile"]["tmp_name"];
// print_r($_FILES["uploadfile"]);
$folder = "images/".$filename;
// echo $folder;
move_uploaded_file($tempname,$folder);

 $username = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $item = $_POST['item'];
 $location = $_POST['location'];
 $date = date('y-m-d',strtotime($_POST['date'])) ;
 $description = $_POST['description'];
 $q = "INSERT INTO `lostfile`(`name`, `email`, `phone`, `item`,`location`, `date`, `description`, `uploadfile`)  VALUES  ('$username','$email','$phone','$item','$location','$date','$description','$filename')";

 $query = mysqli_query($con,$q);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lost and Found </title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #ffe9e9;
			margin: 0;
			padding: 0;
		}
		form {
			background-color: #fff;
			padding: 20px;
			max-width: 600px;
			margin: 50px auto;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
		}
		h1 {
			text-align: center;
			margin-top: 0;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="text"], textarea {
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 20px;
			box-sizing: border-box;
		}
		textarea {
			height: 100px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
        .form{
            box-shadow: 10px 5px 5px rgb(125, 123, 123);
            background-color: #c0cac1;
        }
	</style>
</head>
<body>
<form action="lost.php" method="post" enctype="multipart/form-data" id="myForm" onsubmit="return checkWords()">
		<h1>Lost and Found Form</h1>
		<label for="name">Your Name:</label>
		<input type="text" id="name" name="name" placeholder="Enter your name" required>

		<label for="email">Your Email:</label>
		<input type="text"  name="email" placeholder="Enter your email" id="textInput" required>

		<label for="phone">Your Phone:</label>
		<input type="text" id="phone" name="phone" placeholder="Enter your phone number" pattern="[0-9]{10}" required>

		<label for="item">Lost/Found Item:</label>
		<input type="text" id="item" name="item" placeholder="Enter the name of the item" required>

		<label for="location">Location:</label>
		<input type="text" id="location" name="location" placeholder="Where was the item lost/found?" required>

		<label for="date">Date</label>
		<input type="date" id="date" name="date" placeholder="Mention date and time of going." required>

		<label for="description">Description:</label>
		<textarea id="description" name="description" placeholder="Please describe the item and any distinguishing features" required></textarea>

        <label for="picture">Picture:( size less than 10 mb)</label>
		<input type="file" class="file" name="uploadfile" required>

		<input type="submit" value="Submit" name="done">
	</form>

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