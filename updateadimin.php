<?php

session_start();



if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_system_dbm";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// Prepare a SELECT statement to retrieve the user's information
$stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");

// Bind the email value to the prepared statement
$stmt->bindParam(':username', $_SESSION['username']);

// Execute the statement
$stmt->execute();

// Fetch the result
$user = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<html>
  <head>
    <link rel="stylesheet" href="from.css">
   <title>Registe</title>
   <link rel="stylesheet" href="home.css">
  </head>
  <body>
  <div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="#news">Loan</a>
  <a href="updateadimin.php">Profile</a>
  <a href="logout.php" class="logou">Logout</a>
  <a href="updateadimin.php" class="logou"><?php echo "Hey 🙌 " . $_SESSION["username"];?></a>
 
</div>

  </head>
  <body>

  
    <!-- HTML form -->
    <h2 id="animateHeading">Uppdate <?php echo $user['username']?>'s infromation </h2>
    <div class="form-container" >
      <form id="contact-form" action="update1.php" method="post" >
        <div class="form-group">
          <label for="name">Frist Name:</label>
          <input
            type="text"
            id="fname"
            name="fname"
            class="form-control"
            value="<?php echo $user['fname'];?>"
           
          />
          <span class="error" id="nameError"></span>
        </div>
        <div class="form-group">
          <label for="email">Last Name:</label>
          <input
            type="text"
            id="lname"
            name="lname"
            class="form-control"
            value="<?php echo $user['lname']?>"
            
          />
          <span class="error" id="emailError"></span>
        </div>
        <div class="form-group">
            <label for="email">User Name:</label>
            <input
              type="text"
              id="username"
              name="username"
              class="form-control"
              value="<?php echo $user['username']?>"
              
            />
            <span class="error" id="regnumberError"></span>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              value="<?php echo $user['email']?>"
             
            />
            <span class="error" id="sexError"></span>
          </div>
          <div class="form-group">
            <label for="email">Password:</label>
            <input
              type="text"
              id="pass"
              name="pass"
              class="form-control"
              value="<?php echo $user['pass']?>"
             
            />
            <span class="error" id="classError"></span>
          </div>
          <div class="form-group">
          <label for="email">User Role:</label>
          <select id="u_role" name="u_role">
          <option value="<?php echo $user['u_role']?>"><?php echo $user['u_role']?></option>
          <option value="Adimin">Adimin</option>
          <option value="User">User</option>
  
          </select>
            
            
          </div>

          

          <div class="form-group">
          <label for="email">Activated:</label> 
          <select id="activated" name="activated">
          <option value="<?php echo $user['activated']?>"><?php echo $user['activated']?></option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
  
          </select>
        
        </option>
            <span class="error" id="classError"></span>
          </div>
          
        
        <input type="hidden" name="id" value="<?php echo $user['ID']?>">
        <button type="submit">Uppdatte</button>
      </form>
    </div>

    
</body>
</html>