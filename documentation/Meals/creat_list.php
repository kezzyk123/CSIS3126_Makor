<?php
include_once "connect.php"; // Include database connection

// Check if required data is received via POST
if(isset($_POST['list_name']) && isset($_POST['item_name']) && isset($_POST['quantity'])) {
    // Retrieve POST data
    $listId = $_POST['list_name']; // assuming list_id is passed as list_name
    $itemName = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    // Prepare SQL statement to insert item into the shopping_list table
    $sql = "INSERT INTO shopping_lists (list_id, item_name, quantity) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssi", $listId, $itemName, $quantity);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Item added successfully!";
    } else {
        echo "Error adding item: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid request"; // Error message if required data is not received
}

// Close connection
$connection->close();
?>

