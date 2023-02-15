<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE my_system_dbm";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Create table
$conn = new mysqli($servername, $username, $password, "myDB");
$sql = "CREATE TABLE `my_system_dbm`.`users` (
    `ID` INT(6) NOT NULL AUTO_INCREMENT , 
    `fname` VARCHAR(250) NOT NULL , 
    `lname` VARCHAR(250) NOT NULL , 
    `username` VARCHAR(250) NOT NULL , 
    `email` VARCHAR(250) NOT NULL , 
    `pass` VARCHAR(250) NOT NULL , 
    `u_role` VARCHAR(250) NOT NULL , 
    `c_date` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ,
    `activated` VARCHAR(250) NOT NULL , 
    actvation_date` TIMESTAMP(250) NOT NULL , PRIMARY KEY (`ID`))";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
