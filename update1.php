<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_system_dbm";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get id parameter from URL


// Check if form is submitted

$fname= $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["username"];
$email = $_POST["email"];
$pass= $_POST["pass"];
$id = $_POST['id'];
$u_role = $_POST["u_role"];
$activated = $_POST["activated"];


$sql = "UPDATE `users` SET`fname`='$fname', `lname`='$lname', `username`='$username', `email`='$email', `pass`='$pass',`u_role`='$u_role',`activated`='$activated' WHERE `users`.`ID` =$id; ";

if (mysqli_query($conn, $sql)) {
    header("Location: home.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>
