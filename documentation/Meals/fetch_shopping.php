<?php

session_start();

if (!isset($_SESSION['user_id'])) {
   
   header("location: login.php");

}


// Include database connection file
include_once "connect.php";

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch shopping lists for the current user from the database
$sql = "SELECT * FROM shopping_lists WHERE user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the data and store it in an array
$shopping_lists = array();
while ($row = $result->fetch_assoc()) {
    $shopping_lists[] = $row;
}

$stmt->close();
$connection->close();

// Sends the shopping lists data as JSON response
header('Content-Type: application/json');
echo json_encode($shopping_lists);
?>
