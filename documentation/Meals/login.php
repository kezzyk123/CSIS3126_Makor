<?php

include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <form method = "POST" action ="login_process.php">
            <div class="input-box">
                <input type="text" class="input-field" name="username" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="input-submit">
                <button class="submit-btn" name="submit"></button>
                <label for="submit">Sign In</label>
            </div>
        </form>
        <div class="sign-up-link">
            <p>Don't have account? <a href="register.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>

<?php include("footer.php"); ?>