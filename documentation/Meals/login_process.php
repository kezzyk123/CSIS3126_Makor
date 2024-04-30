<?php
session_start();


include("connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hashes the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query to check if the user exists in the database
    $query = "SELECT * FROM users WHERE username=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // if password is correct, set up session and redirect to index.php
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            $error = "Invalid username or password";
            header("Location: login.php");
        }
    } else {
        // User does not exist
        $error = "Invalid username or password";
        
    }
}

// Closes everything
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>

