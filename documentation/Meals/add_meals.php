<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $meal_name = $_POST["meal_name"];
    $meal_category = $_POST["meal_category"];
    $ingredients = $_POST["ingredients"];
    $prep_time = $_POST["prep_time"];
    
    // Process the image upload
    $target_dir = "Images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, get the file path
            $image_path = $target_file;
            
            // Insert meal details into the database
            $sql = "INSERT INTO meals (meal_name, meal_category, ingredients, prep_time, image_path) VALUES ('$meal_name', '$meal_category', '$ingredients', '$prep_time', '$image_path')";
            if (mysqli_query($connection, $sql)) {
                // Get the last inserted meal_id
                $meal_id = mysqli_insert_id($connection);
                // Redirect user back to meal gallery
                header("Location: meal_gallery.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./Images/favicon.jpg" type="Images/meals-favicon"> <!----short cut icon-->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="navbar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planning | Meal Reviews </title>
</head>
<body>

<section class="menu">
        <div class="nav">
            <div class="logo">
                <img src="./Images/favicon.jpg" alt="logo"></div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a  href="meal_gallery.php">Browse Meals</a></li>
                    <li><a href="shopping_list.php">Shopping List</a></li> 
                    <li><a  href="rating_screen.php">Meal Reviews</a></li>  
                    <li><a class="active" href="add_meals.php">Add Custom Meals</a></li>          
                </ul>         
                <div class=>
                    <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="window.location.href='logout.php'" class="logout">Log out</button>
                   
                </div>
        </div>
</section>
    <h2>Add a New Meal to the Meal Gallery</h2><br>
    <p> Helpful hints: Use google or your very own ideas to add new recipes</p>
    <form method="post" enctype="multipart/form-data">
        <label for="meal_name">Meal Name:</label>
        <input type="text" id="meal_name" name="meal_name" required><br><br>

        <label for="meal_category">Diet Category:</label>
        <select id="meal_category" name="meal_category" required>
            <option value="Gluten-free">Gluten-free</option>
            <option value="High-protein">High-protein</option>
            <option value="Heart-healthy">Heart-healthy</option>
            <option value="Low-sodium">Low-sodium</option>
            <option value="No-preference">No-preference</option>
        </select><br><br>

        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" rows="4" cols="50" placeholder="Make sure you seperate each item with a comma"required></textarea><br><br>

        <label for="prep_time">Preparation Time:</label>
        <input type="text" id="prep_time" name="prep_time" required><br><br>

        <!-- Input field for image upload -->
        <label for="image">Select image to upload:</label>
        <input type="file" name="image" id="image" required><br><br>

        <input type="submit" value="Add Meal">
    </form>

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
