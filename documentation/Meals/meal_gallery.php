<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meal Ideas Gallery</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
  }

  .gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
  }

  .card {
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
  }

  .card img {
    width: 100%;
    height: 50;
    border-radius: 10px 10px 0 0;
  }

  .card-content {
    padding: 20px;
    position: relative;
  }

  .label-sticker {
    background-color: #495057;
    color: #fff;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 20px;
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1;
  }

  .prep-time-sticker {
    background-color: #495057;
    color: #fff;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 20px;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1;
  }

  .btn {
    display: block;
    width: 100%;
    padding: 15px 0;
    margin-bottom: 10px;
    background-color: #495057;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn:hover {
    background-color: #343a40;
  }

  h3 {
    color: #343a40;
    font-size: 1.2rem;
    margin-top: 0;
    position: relative;
  }

  p {
    color: #555;
    font-size: 1rem;
    margin-bottom: 10px;
  }
  
.nav{
    width: 100%;
    display:flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 0; 
}

.nav ul{
    display:flex;
    list-style: none;
}

.nav  ul li{
    margin-right: 30px;
}

.nav  ul li a{
    margin-right: 30px;
    text-decoration: none;
    font-weight: 500;
    font-size: 17px;
    font-family:verdana;
    color:black;
}
.logo img
{
    width: 80px;
}

.nav ul .active::after{
    content: "";
    width: 60%;
    height: 3px;
    background-color:gray;
    display:flex;
    position: relative;
    margin-left: 10px;
}
</style>
</head>
<body>

<section class="menu">
        <div class="nav">
            <div class="logo">
                <img src="./Images/favicon.jpg" alt="logo"></div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a class="active" href="meal_gallery.php">Browse Meals</a></li>
                    <li><a href="#">Shopping List</a></li>             
                </ul>         
                <div class=>
                    <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="window.location.href='logout.php'" class="logout">Log out</button>
                   
                </div>
        </div>
    </section>


<div class="gallery">
  <div class="card">
    <div class="label-sticker">Gluten-free</div>
    <div class="prep-time-sticker">30 mins prep</div>
    <img src="Images/Grilled-Salmon-With-Vegetables.png" alt="">
    <div class="card-content">
      <h3>Grilled Salmon with Roasted Vegetables</h3>
      <button class="btn">Add to Shopping List</button>
      <button class="btn">View Ingredients</button>
    </div>
  </div>

  <div class="card">
    <div class="label-sticker">Gluten-free</div>
    <div class="prep-time-sticker">30 mins prep</div>
    <img src="Images/Stuffed-Peppers-5.png" alt="">
    <div class="card-content">
      <h3>Qunioa Stuffed Bell Peppers </h3>
      <button class="btn">Add to Shopping List</button>
      <button class="btn">View Ingredients</button>
    </div>
  </div>

  <div class="card">
    <div class="label-sticker">Gluten-free</div>
    <div class="prep-time-sticker">30 mins prep</div>
    <img src="Images/chicken-vegetables-stir-fry.png" alt="">
    <div class="card-content">
      <h3>Chicken and Vegetables Stir-fry with Tamari Sauce </h3>
      <button class="btn">Add to Shopping List</button>
      <button class="btn">View Ingredients</button>
    </div>
  </div>


  <!-- Add more cards here -->

</div>

</body>
</html>
