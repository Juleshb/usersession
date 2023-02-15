<?php

session_start();



if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

?>


<html>
  <head>
    
    <title>Welcome to My Landing Page</title>
   <link rel="stylesheet" href="home.css">
  </head>
  <body>
  <div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#news">Loan</a>
  <a href="updateadimin.php">Profile</a>
  <a href="logout.php" class="logou">Logout</a>
  <a href="logout.php" class="logou"><?php echo "Hey 🙌 " . $_SESSION["username"];?></a>
 
</div>

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

?>
<br>
<br><br>
<a href="register.php" style="background-color: #1aca02;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;" >Add new User</a>
<div class="container">

<table>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>User Role</th>
        <th>Created Date</th>
        <th>Actvated</th>
        <th>Activated Date</th>
        <th>Actions</th>
      </tr>

      <?php 
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      // echo "fn: " . $row["fname"]. " - ln: " . $row["lname"]. " - column3: " . $row["username"]. "<br>";
  
      ?>
      <tr>
        <td><?php echo $row["fname"] ?></td>
        <td><?php echo $row["lname"] ?></td>
        <td><?php echo $row["username"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["u_role"] ?></td>
        <td><?php echo $row["c_date"] ?></td>
        <td><?php echo $row["activated"] ?></td>
        <td><?php echo $row["actvation_date"] ?></td>
        <td><form method="post" action="delete.php"><input type="hidden" name="id" value="<?php echo $row['ID']?>"><input type="submit" value="Delete" style="background-color: #1aca02;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;"></form>
        <form method="post" action="update.php"><input type="hidden" name="id" value="<?php echo $row['ID']?>"><input type="submit" value="Update" style="background-color: #1aca02;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;"></form>
      </td>
      </tr>
      <?php 
      }
    } else {
      echo "0 results";
    }
      ?>
</table>
   
      
    </div>
  </body>
</html>
