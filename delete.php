<?php
// create a new PDO object
$pdo = new PDO('mysql:host=localhost;dbname=my_system_dbm', 'root', '');

// prepare the DELETE statement
$statement = $pdo->prepare('DELETE FROM users WHERE id = :id');

// bind the parameter values
$statement->bindParam(':id', $_POST['id']);

// execute the statement
$statement->execute();
header("Location: home.php");

?>