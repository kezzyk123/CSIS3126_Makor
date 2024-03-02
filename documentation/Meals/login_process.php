<?php
session_start();

// Include the database connection file
include_once "connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to fetch user details
    $query = "SELECT * FROM users WHERE username='$username'";
   
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User found, verify password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION["username"] = $username;
            // Redirect to dashboard or home page
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect
            $error = "Invalid username or password.";
        }
    } else {
        // User not found
        $error = "Invalid username or password.";
    }

    // Redirect back to login page with error message
    header("Location: login.php?error=" . urlencode($error));
    exit();
} else {
    // If the form is not submitted, redirect to login page
    header("Location: login.php");
    exit();
}
?>
