<?php
session_start();
include_once "connect.php";

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit;
}

// Get the latest list ID from the database
$latestListId = 1000; 

if (isset($_POST['list_name'])) {
    $listName = $_POST['list_name'];
    $latestListId++; // Increment the list ID counter
    $sql = "INSERT INTO shopping_lists (list_id, user_id, list_name) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iss", $latestListId, $_SESSION['user_id'], $listName);
    if ($stmt->execute()) {
        echo "New list created successfully with ID: " . $latestListId;
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
    $stmt->close();
}

$connection->close();
?>
