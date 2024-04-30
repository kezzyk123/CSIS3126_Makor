<?php

include("connect.php");

session_start();

//handle form submission on same page
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form 
    $errors = [];
    $meal_id = $_POST['meal_id'];
    $user_id = $_SESSION['user_id']; 
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Inserts the review into my comments database I joined this with my users and meals table
    if (empty($errors)) {
        $sql_insert_review = "INSERT INTO comments (user_id, meal_id, rating, comment) VALUES (?, ?, ?, ?)";
        $stmt_insert_review = mysqli_prepare($connection, $sql_insert_review);
        mysqli_stmt_bind_param($stmt_insert_review, "iiis", $user_id, $meal_id, $rating, $comment);
        mysqli_stmt_execute($stmt_insert_review);

        // Redirects back to the same page 
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}

// Retrieve meal information
$sql_meals = "SELECT meal_id, meal_name FROM meals";
$result_meals = mysqli_query($connection, $sql_meals);
$meals = mysqli_fetch_all($result_meals, MYSQLI_ASSOC);

// Retrieve reviews for each meal
$reviews = [];
foreach ($meals as $meal) {
    $sql_reviews = "SELECT users.username, comments.rating, comments.comment
                    FROM comments
                    JOIN users ON comments.user_id = users.user_id
                    WHERE comments.meal_id = ?";
    $stmt_reviews = mysqli_prepare($connection, $sql_reviews);
    mysqli_stmt_bind_param($stmt_reviews, "i", $meal['meal_id']);
    mysqli_stmt_execute($stmt_reviews);
    $result_reviews = mysqli_stmt_get_result($stmt_reviews);
    $reviews[$meal['meal_id']] = mysqli_fetch_all($result_reviews, MYSQLI_ASSOC);
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
                    <li><a class="active" href="rating_screen.php">Meal Reviews</a></li>     
                    <li><a href="add_meals.php">Add Custom Meals</a></li>         
                </ul>         
                <div class=>
                    <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="window.location.href='logout.php'" class="logout">Log out</button>
                   
                </div>
        </div>
    </section>

<h1>Meal Reviews</h1>
<h5>Users please rate and comment on meals<br> Your feeback is highly apperciated. </h5>

<div class="card">
<?php foreach ($meals as $meal): ?>
    <h2><?php echo $meal['meal_name']; ?></h2>
    <ul>
        <?php if (!empty($reviews[$meal['meal_id']])): ?>
            <?php foreach ($reviews[$meal['meal_id']] as $review): ?>
                <li>
                    <strong><?php echo $review['username']; ?></strong>
                    Rating: <?php echo $review['rating']; ?>/5<br>
                    Comment: <?php echo $review['comment']; ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No reviews yet for this meal.</li>
        <?php endif; ?>
    </ul>

    <!-- Form for users to make a review -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="meal_id" value="<?php echo $meal['meal_id']; ?>">
        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="1" max="5" placeholder="Rate from 1-5, 5 being the best"required>
        <br>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" required></textarea>
        <br>
        <button type="submit">Submit Review</button>
    </form>
<?php endforeach; ?>
        </div>

</body>
</html>


<?php include("footer.php"); ?>