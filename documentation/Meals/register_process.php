<?php

include("connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email, username, and password from the form
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $psw_repeat = $_POST['psw_repeat'];

    //  validation checks
    if ($password != $psw_repeat) {
        $error = "Passwords do not match";
    } else {
        // Checks
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            $error = "Email is already registered";
        } else {
            // Hash 
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database
            $insert_query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashed_password')";
            if (mysqli_query($connection, $insert_query)) {
                
                header("Location: login.php");
                exit();
            } else {
                $error = "Error: " . mysqli_error($connection);
            }
        }
    }
}


mysqli_close($connection);
?>

