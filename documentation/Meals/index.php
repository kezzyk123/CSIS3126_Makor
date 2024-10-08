<?php

    include("connect.php");
    session_start();
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./Images/favicon.jpg" type="Images/meals-favicon"> <!----short cut icon-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planning | Home </title>
</head>
<body>
    <section class="menu">
        <div class="nav">
            <div class="logo">
                <img src="./Images/favicon.jpg" alt="logo"></div>
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="meal_gallery.php">Browse Meals</a></li>
                    <li><a href="shopping_list.php">Shopping List</a></li>        
                    <li><a href="rating_screen.php">Meal Reviews</a></li>     
                    <li><a href="add_meals.php">Add Custom Meals</a></li>
                </ul>         
                <div>
                    <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="window.location.href='logout.php'" class="logout">Log out</button>
                   
                </div>
        </div>
    </section>
    <section class="grid">
        <div class="intro">
            <div class="intro-left">
                <div class="info">
                    <h3> Nourish Your Days,<br> Plan Your Meals</h3>
                    <p>Say goodbye to mealtime stress and hello to easy planning. <br> Take charge of
                    your health today! </p>
                </div>
            </div>
            <div class="intro-right">
                <img src="Images/about-us.png" alt="">
            </div>
        </div>
    </section>
    <section class="category">
        <div class="list-items">
            <h3>Diet Categories</h3>
            <div class="card-list">
                <div class="card">
                    <img src="Images/heart-beat.png" alt="">
                    <div class="diet-title">
                        <h2>Heart-healthy</h2>
                    </div>
                    <div class="diet-desc">
                        <p>For those who prefer meals that support cardiovascular health </p>
                    </div>
                </div>
                <div class="card">
                    <img src="Images/gluten-free.png" alt="">
                    <div class="diet-title">
                        <h2>Gluten-free</h2>
                    </div>
                    <div class="diet-desc">
                        <p>For those with gluten sensitivity or intolerence</p>
                    </div>
                </div>
                <div class="card">
                    <img src="Images/low-sodium.png" alt="">
                    <div class="diet-title">
                        <h2>Low-sodium</h2>
                    </div>
                    <div class="diet-desc">
                        <p>For those who want to lower sodium daily sodium intake</p>
                    </div>
                </div>
                <div class="card">
                    <img src="Images/no-pref.png" alt="">
                    <div class="diet-title">
                        <h2>No-preference</h2>
                    </div>
                    <div class="diet-desc">
                        <p>Options for those who don't want dietary restrictions</p>
                    </div>
                </div>
                <div class="card">
                    <img src="Images/protein.png" alt="">
                    <div class="diet-title">
                        <h2>High-protein</h2>
                    </div>
                    <div class="diet-desc">
                        <p>For those who prefer higher amounts of protein in their meals</p>
                    </div>
                </div>
            </div>
        </div>
    </section> 
</body>
</html>


<?php include("footer.php"); ?>