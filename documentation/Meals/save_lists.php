<?php
session_start();
include_once "connect.php"; // Include database connection

// Check if required data is received via POST and if user is logged in
if(isset($_POST['list_name']) && isset($_POST['list_id']) && isset($_POST['item_list']) && isset($_POST['item_name']) && isset($_SESSION['user_id'])) {
    // Retrieve POST data
    $listName = $_POST['list_name'];
    $listId = $_POST['list_id'];
    $itemList = json_decode($_POST['item_list'], true); // Decode JSON item list
    $userId = $_SESSION['user_id']; // Retrieve user_id from session

    // Prepare SQL statement to insert list into the shopping_lists table
    $sql = "INSERT INTO shopping_lists (list_id, list_name, user_id) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bind_param("isi", $listId, $listName, $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Loop through item list and insert items into shopping_list table
        foreach ($itemList as $item) {
            $itemName = $item['item_name'];
            $quantity = $item['quantity'];
            $sql = "INSERT INTO shopping_list (list_id, item_name, quantity) VALUES (?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("iss", $listId, $itemName, $quantity);
            $stmt->execute();
        }
        echo "List saved successfully!";
    } else {
        echo "Error saving list: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid request"; // Error message if required data is not received or user is not logged in
}

// Close connection
$connection->close();
?>
