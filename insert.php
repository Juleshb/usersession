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

$fname= $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["username"];
$email = $_POST["email"];
$pass= $_POST["pass"];
$u_role= $_POST["u_role"];



$sql = "INSERT INTO `users`(`fname`, `lname`, `username`, `email`, `pass`, `u_role`) VALUES('$fname', '$lname','$username','$email','$pass','$u_role')";

if ($conn->query($sql) === TRUE) {
  header("Location: home.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
