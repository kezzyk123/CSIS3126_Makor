
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
    <div class="register-box">
        <div class="register-header">
            <header>Register</header>
        </div>
        <form method = "POST" action="register_process.php" >
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email" autocomplete="off" value="<?php echo htmlspecialchars($email,ENT_QUOTES);?>" required>
            </div>
            <div class="input-box">
                <input type="text" name="username" class="input-field" placeholder="Username" autocomplete="off" value="<?php echo htmlspecialchars($username,ENT_QUOTES);?>" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" value="<?php echo htmlspecialchars($password,ENT_QUOTES);?>" required>
            </div>
            <div class="input-box">
                <input type="password" name="psw_repeat" class="input-field" placeholder=" Confirm Password" autocomplete="off" value="<?php echo htmlspecialchars($password,ENT_QUOTES);?>" required>
            </div>
            <div class="input-submit">
                <button class="submit-btn" name="submit" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
        </form>
        <div class="log-in-link">
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </div>
    </div>
</body>
</html>

<?php include("footer.php"); ?>