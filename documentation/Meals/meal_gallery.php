<?php

include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meal Ideas | Meal Gallery</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
  }

  .gallery {
    display: grid;
    /*grid-template-columns: repeat(auto-fit, minmax(min(3rem,100%)3fr));*/
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));

    grid-gap: 0.09rem;
  }

  .card {
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;

    width:200px;
    height: auto;
    display: block;
    padding: 10px;
    position: relative;
    background: white;
    outline:2px solid rgb(136, 124, 124);
  }

  .card img {
    width: 100%;
    height: relative;
    border-radius: 10px 10px 0 0;
  }

  .card-content {
    padding: 20px;
    position: relative;
  }

  .prep-time-sticker {
    background-color: #495057;
    color: #fff;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 20px;
    position: 50px;
    top: 10px;
    left: 10px;
    z-index: 1;
  }

  .label-sticker {
    background-color: #495057;
    color: #fff;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 20px;
    position: absolute;
    bottom: 0;
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

  .btn-shopping {
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

  
  .btn-shopping:hover {
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
  
  .nav {
    width: 100%;
    background-color: #fff;
    border-bottom: 2px solid #ccc;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
}

.nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.nav ul li {
    margin-right: 30px;
}

.nav ul li:last-child {
    margin-right: 0;
}

.nav ul li a {
    text-decoration: none;
    font-weight: 500;
    font-size: 17px;
    font-family: verdana;
    color: black;
}

.nav ul li a:hover {
    color: #495057;
}

.logo img {
    width: 80px;
}

.nav ul .active::after {
    content: "";
    width: 60%;
    height: 3px;
    background-color: gray;
    display: flex;
    position: relative;
    margin-left: 10px;
}

/* CSS for the modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
    max-width: 400px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
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
                    <li><a href="about.php">About Us</a></li>
                    <li><a class="active" href="meal_gallery.php">Browse Meals</a></li>
                    <li><a href="shopping_list.php">Shopping List</a></li>        
                    <li><a  href="rating_screen.php">Meal Reviews</a></li>     
                </ul>         
                <div class=>
                    <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="window.location.href='logout.php'" class="logout">Log out</button>
                   
                </div>
        </div>
    </section>


    <!-- Modal HTML structure -->
<div id="ingredientsModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Ingredients</h2>
    <ul id="ingredientsList"></ul>
  </div>
</div>



<div class="gallery">
  
    <h2>Gluten-free options</h2>
    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">30 mins prep</div>
      <img src="Images/Grilled-Salmon-With-Vegetables.png" alt="">
      <div class="card-content">
        <h3>Grilled Salmon with Roasted Vegetables</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(1)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">30 mins prep</div>
      <img src="Images/Stuffed-Peppers-5.png" alt="">
      <div class="card-content">
        <h3>Quinoa Stuffed Bell Peppers</h3>
        <button class="btn-shopping" id="2">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(2)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">30 mins prep</div>
      <img src="Images/chicken-vegetables-stir-fry.png" alt="">
      <div class="card-content">
        <h3>Chicken and Vegetables Stir-fry with Tamari Sauce</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(3)">View Ingredients</button>
      </div>
    </div>
  </div>
</div>

<div class="gallery">
  
    <h2>Gluten-free options <br> ~heart-healthy~</h2>
    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">1hr prep</div>
      <img src="Images/lentil-soup-carrots-spinach.jfif" alt="">
      <div class="card-content">
        <h3>Lentil Soup with Spinach and Carrots</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(4)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">20 mins prep</div>
      <img src="Images/pesto-tomatoes.jfif" alt="">
      <div class="card-content">
        <h3>Zucchini Noodles with Pesto and Cherry Tomatoess</h3>
        <button class="btn-shopping" id="2">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(5)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">40 mins prep</div>
      <img src="Images/baked-chicken-sweetpotatoes.jpg" alt="">
      <div class="card-content">
        <h3>Baked Chicken with Sweet Potato Wedges</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(6)">View Ingredients</button>
      </div>
    </div>
    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">45 mins prep</div>
      <img src="Images\tofu-vegetable-curry.jfif" alt="">
      <div class="card-content">
        <h3>Tofu and Vegetable Curry with Coconut Milk</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(13)">View Ingredients</button>
      </div>
    </div>
  </div>
</div>

<div class="gallery">
  
    <h2>Gluten-free options</h2>
    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">15 mins prep</div>
      <img src="Images/shrimp-avocadosalad.jfif" alt="">
      <div class="card-content">
        <h3>Shrimp and Avocado Salad with Citrus</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(7)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker"> 1 hour 30 mins prep</div>
      <img src="Images/turkey-chilli with black beans.jfif" alt="">
      <div class="card-content">
        <h3>Turkey Chili with Black Beans and Corn</h3>
        <button class="btn-shopping" id="2">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(8)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">35 mins prep</div>
      <img src="Images/s-feta-stuffed-chicken.jfif" alt="">
      <div class="card-content">
        <h3>Spinach and Feta Stuffed Chicken Breast</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(9)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">20 mins prep</div>
      <img src="Images/quinoa-salad-cucumbers.jfif" alt="">
      <div class="card-content">
        <h3>Quinoa Salad with Cucumber, Tomato, and Feta Cheese</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(15)">View Ingredients</button>
      </div>
    </div>
  </div>
</div>

<div class="gallery">
  
    <h2>Gluten-free options</h2>
    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">25 mins prep</div>
      <img src="Images/cauliflower-fried-rice.jfif" alt="">
      <div class="card-content">
        <h3>Cauliflower Fried Rice with Mixed Vegetables</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(10)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">30 mins prep</div>
      <img src="Images/gluten-free-pizza.jfif" alt="">
      <div class="card-content">
        <h3>Gluten-Free Pizza with Tomato Sauce and Fresh Basil</h3>
        <button class="btn-shopping" id="2">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(11)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">1 hour prep</div>
      <img src="Images/eggplant-parm.jfif" alt="">
      <div class="card-content">
        <h3>Eggplant Parmesan with Marinara Sauce</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(12)">View Ingredients</button>
      </div>
    </div>


    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">35mins prep</div>
      <img src="Images/steak-lettuce-wraps.jfif" alt="">
      <div class="card-content">
        <h3>Steak Lettuce Wraps with Sautéed Mushrooms</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(14)">View Ingredients</button>
      </div>
    </div>
  </div>
</div>

<div class="gallery">
  
    <h2>High-Protein options <br> ~heart-healthy~</h2>
    <div class="card">
      <div class="label-sticker"><High-protein></div>
      <div class="prep-time-sticker">5 mins prep</div>
      <img src="Images/greek-yogurt-parfait.jfif" alt="">
      <div class="card-content">
        <h3>Greek Yogurt Parfait with Mixed Berries and Almond</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(16)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">High-protein</div>
      <div class="prep-time-sticker">10 mins prep</div>
      <img src="Images/tuna-salad-wrap.jfif" alt="">
      <div class="card-content">
        <h3>Tuna Salad Wrap</h3>
        <button class="btn-shopping" id="2">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(17)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">High-protein</div>
      <div class="prep-time-sticker">15 mins prep</div>
      <img src="Images/chicken-vegetables-stir-fry.png" alt="">
      <div class="card-content">
        <h3>Chicken and Vegetable Stir-Fry</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(18)">View Ingredients</button>
      </div>
    </div>
    <div class="card">
      <div class="label-sticker">High-protein</div>
      <div class="prep-time-sticker">10 mins prep</div>
      <img src="Images/egg-s-omelette.jfif" alt="">
      <div class="card-content">
        <h3>Egg and Spinach Omelette</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(19)">View Ingredients</button>
      </div>
    </div>
  </div>
</div>


<div class="gallery">
  
    <h2>No Preference options</h2>
    <div class="card">
      <div class="label-sticker">No-preference</div>
      <div class="prep-time-sticker">40 mins prep</div>
      <img src="Images/classic-spaghetti-bolognese.jfif" alt="">
      <div class="card-content">
        <h3>Classic Spaghetti Bolognese</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(20)">View Ingredients</button>
      </div>
    </div>
    <div class="card">
      <div class="label-sticker">No-preference</div>
      <div class="prep-time-sticker">30 mins prep</div>
      <img src="Images/pasta-alfredo-chicken.jfif" alt="">
      <div class="card-content">
        <h3>Pasta Alfredo with Chicken</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(21)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">45 mins prep</div>
      <img src="Images/s-ricotta-stuffed-chells.jfif" alt="">
      <div class="card-content">
        <h3>Spinach and Ricotta Stuffed Shells</h3>
        <button class="btn-shopping" id="2">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(22)">View Ingredients</button>
      </div>
    </div>

    <div class="card">
      <div class="label-sticker">Gluten-free</div>
      <div class="prep-time-sticker">25 mins prep</div>
      <img src="Images/creamy-carbonara.jfif" alt="">
      <div class="card-content">
        <h3>Creamy Carbonara</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(23)">View Ingredients</button>
      </div>
    </div>
  </div>
</div>



<div class="gallery">
  
    <h2>Low-sodium options</h2>
    <div class="card">
      <div class="label-sticker">Low-sodium</div>
      <div class="prep-time-sticker">35 mins prep</div>
      <img src="Images/roasted-chicken-breast-asaparagus.jfif" alt="">
      <div class="card-content">
        <h3>Roasted Chicken Breast with Asparagus</h3>
        <button class="btn-shopping" id="1">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(24)">View Ingredients</button>
      </div>
    </div>



    <div class="card">
      <div class="label-sticker">Low-sodium</div>
      <div class="prep-time-sticker">40mins prep</div>
      <img src="Images/Stuffed-Peppers-5.png" alt="">
      <div class="card-content">
        <h3>Spinach and Feta Stuffed Bell Peppers</h3>
        <button class="btn-shopping" id="3">Add to Shopping List</button>
        <button class="btn" onclick="showIngredients(25)">View Ingredients</button>
      </div>
    </div>
  </div>
</div>





<script>
// handles AJAX request and display ingredients in the modal
function showIngredients(meal_id) {
    var modal = document.getElementById("ingredientsModal");
    var span = document.getElementsByClassName("close")[0];

    // Show the modal
    modal.style.display = "block";

    // Send AJAX request to get_ingredi.php
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the JSON response
                var ingredients = JSON.parse(xhr.responseText);
                
                // Populate the modal with ingredients
                var ingredientsList = document.getElementById("ingredientsList");
                ingredientsList.innerHTML = ''; // Clear previous content
                ingredients.forEach(function(ingredient) {
                    var li = document.createElement("li");
                    li.textContent = ingredient;
                    ingredientsList.appendChild(li);
                });
            } else {
                // Handle error
                console.error('Error:', xhr.statusText);
            }
        }
    };
    xhr.open('GET', 'get_ingredi.php?meal_id=' + meal_id, true);
    xhr.send();

    // when the close button is clicked
    span.onclick = function() {
        modal.style.display = "none";
    };

    //  when the user clicks outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
}
</script>




</body>
</html>



