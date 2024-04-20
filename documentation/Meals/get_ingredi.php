<?php
// Include your database connection file
include("connect.php");

// Check if the meal ID is provided
if(isset($_GET['meal_id'])) {
    $meal_id = $_GET['meal_id'];
    
    // Query to fetch ingredients for the specified meal ID
    $sql = "SELECT ingredients FROM meals WHERE meal_id = $meal_id";
    $result = mysqli_query($connection, $sql);

    $ingredients = array();

    // Fetch data from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        $ingredients[] = $row['ingredients'];
    }

    // Return the ingredients as JSON
    echo json_encode($ingredients);
}
?>
