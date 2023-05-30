<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IITJ</title>
    <link rel="stylesheet" href="stylelite.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="fix">
    <div class="head">
        <div class="logo">
            <img src="iitjlogo.png" alt="">
        </div>
        <h1>IITJ Helpdesk</h1>
        <button class="login"><a href="logout.php"> logout</a></button>
        
    </div>
    <div class="navbar">
        <ul class="nav">
            <li class="home" id="faq">
                <details>
                    <summary>options</summary>
                    <a href="buy.php"><option class="ram" value="">Buy and Sell</option></a>
                    <a href="lost.php"><option class="ram" value="">Lost and Found</option></a>
                    <a href="trans.php"><option class="ram" value="">Transport sharing</option></a>
            </li>
            <li class="home" id="faq">
                <details>
                    <summary>Inventory</summary>
                    <a href="buyinventory.php"><option class="ram" value="">Buy and Sell Inventory</option></a>
                    <a href="lostinven.php"><option class="ram" value="">Lost and Found Inventory</option></a>
                    <a href="transportinv.php"><option class="ram" value="">Transport sharing Inventory</option></a>
            </li>            
        </ul>
    </div>
</div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="download.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="IIT-Jodhpur.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="images.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div> 
    <div class="list">
        <hr>
        <h1>About us</h1><hr>
        <p>Hello, this is a website developed to solve problems of lost and found,transport sharing,and for  buying/selling old goods for students of IITJ.Hope this website will be beneficial for you. 
               <i>      <br>
                THANK YOU!!</i>  
        </p> 
           
    </div>
    
    <div class="last">
        <h2>IITJ helpdesk</h2>
        <p>iitj hepdesk team will be happy to help you anytime</p>

    </div>
    <div class="icon">
        <a href="https://www.instagram.com/insta_iitj2019/"><img src="instgram.png" alt=""></i></a>
        <a href="https://www.facebook.com/IITJOfficial/"><img src="facebook.png" alt=""></i></a> 
        <a href="https://www.linkedin.com/school/sme-iitj/?originalSubdomain=in" ><img src="linkedin.png" alt=""></i></a> 
       </div>
</body>
</html>
