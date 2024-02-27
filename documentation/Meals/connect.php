<?php

// hostname, username, password, databasename
$connection = mysqli_connect("localhost","root","root","meal_planner", "8889") or die("Unable to connect to database");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


?>