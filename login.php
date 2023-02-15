<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_system_dbm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username' AND pass	='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to a protected page
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: home.php");
    } else {
        // Login failed, display an error message
        echo "Wrong username or password. Please try again.";
    }
}

$conn->close();
?>

<html>
<head>
    <link rel="stylesheet" href="from.css">
    <title>Login Form</title>
    <style>
      /* CSS styles for the form */
      
    </style>
</header>
<body>
<h2 id="animateHeading">Login here ...</h2>
    <div class="form-container" >
<form action="login.php" method="post">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</body>
