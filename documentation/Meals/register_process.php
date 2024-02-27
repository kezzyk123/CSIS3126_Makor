<?php
include("connect.php"); // Include the database connection file

// Check if form is submitted
if(isset($_POST['submit'])){
    // Get form data
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $psw_repeat = $_POST["psw_repeat"];

    // Validate form data
    if(empty($email) || empty($username) || empty($password) || empty($psw_repeat)){
        // Handle empty fields
        $error = "All fields are required.";
    } elseif($password != $psw_repeat){
        // Handle password mismatch
        $error = "Passwords do not match.";
    } else {
        // Check if the user already exists
        $query = "SELECT * FROM users WHERE email='$email' OR username='$username'";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
            // Handle user already exists
            $error = "User already exists with the given email or username.";
        } else {
           

            // Insert new user data into the database
            $insert_query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username','$password')";
            $insert_result = mysqli_query($connection, $insert_query);

            if($insert_result){
                // Registration successful
                header("Location: index.php"); // Redirect to login page
                exit();
            } else {
                // Handle database insertion error
                $error = "Error occurred while registering user.";
            }
        }
    }
}

// If there are errors or form is not submitted, redirect back to register page
header("Location: register.php?error=" . urlencode($error));
exit();
?>
