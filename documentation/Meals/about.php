<?php

    include("connect.php");
    session_start();
  /* user check in*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel ="shortcut icon" href="./Images/favicon.jpg" type="Images/meals-favicon"> <!----short cut icon-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planning | About Us </title>


    <style>
        body {
          font-family: Verdana, Geneva, Tahoma, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #c7c7c7;
          background-image: url("Images/about-us.png");
         
          
        }
      
        header {
          background-color: #ffffff;
          color: #fffbfb;
          text-align: center;
          padding: 20px 0;
        }
      
        .container {
          max-width: 800px;
          margin: 0 auto;
          padding: 20px;

        }
      
        .about-section {
          background-color: #fff;
          border-radius: 20px;
          padding: 20px;
          margin-bottom: 20px;
        }
      
        .about-section p {
          font-size: 1.1rem;
          line-height: 1.5;
          font-family: verdana;
        }
      
        .circle-img {
          width: 150px;
          height: 150px;
          border-radius: 50%;
          overflow: hidden;
          margin: 0 auto 20px;
        }
      
        .circle-img img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
      </style>
</head>
<body>
    <!---top layer headings-->
    <section class="menu">
        <div class="nav">
            <div class="logo">
                <img src="./Images/favicon.jpg" alt="logo"></div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a class ="active" href="about.html">About Us</a></li>
                    <li><a href="meal_gallery.php">Browse Recipes</a></li>
                    <li><a href="shopping_list.php">Shopping List</a></li>   
                    <li><a href="rating_screen.php">Meal Reviews</a></li> 
                             
                </ul>         
                <div>
                    <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="window.location.href='logout.php'" class="logout">Log out</button>
                   
                </div>
        </div>
    </section>

    <header>
        <h1>About Us</h1>
      </header>
      
      <div class="container">
        <div class="about-section">
          <h2>Our Mission</h2>
          <p>Our mission is to make meal planning easy and enjoyable for everyone. We provide tools and resources to help users create nutritious meals effortlessly, regardless of their cooking experience or dietary preferences. Our goal is to inspire healthier lifestyles and make eating well accessible to all.</p>
        </div>
      
        <div class="about-section">
          <h2>Our Vision</h2>
          <div class="circle-img">
            <img src="Images/about-us2.png" alt="Vision Image">
          </div>
          <p>Our vision is to be the ultimate place for meal planning, where everyone can get inspired and supported in their quest for healthier eating. We want meal planning to be easy, fun, and empowering for all. By always improving and offering new ideas, we want to change the way people think about food and help them live healthier, happier lives</p>
        </div>
      </div>
    
</body>
</html>