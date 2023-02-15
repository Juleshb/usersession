<?php
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

// Prepare and execute SELECT query
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");

// bind the parameter values
$stmt->bindParam(':id', $_POST['id']);

$stmt->execute();

// Populate input field with data
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<html>
  <head>
    <link rel="stylesheet" href="from.css">
   <title>Registe</title>
  </head>
  <body>

  
    <!-- HTML form -->
    <h2 id="animateHeading">Uppdate <?php echo $row['username']?>'s infromation </h2>
    <div class="form-container" >
      <form id="contact-form" action="update1.php" method="post" >
        <div class="form-group">
          <label for="name">Frist Name:</label>
          <input
            type="text"
            id="fname"
            name="fname"
            class="form-control"
            value="<?php echo $row['fname'];?>"
           
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
            value="<?php echo $row['lname']?>"
            
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
              value="<?php echo $row['username']?>"
              
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
              value="<?php echo $row['email']?>"
             
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
              value="<?php echo $row['pass']?>"
             
            />
            <span class="error" id="classError"></span>
          </div>
          <div class="form-group">
          <label for="email">User Role:</label>
          <select id="u_role" name="u_role">
          <option value="<?php echo $row['u_role']?>"><?php echo $row['u_role']?></option>
          <option value="Adimin">Adimin</option>
          <option value="User">User</option>
  
          </select>
            
            
          </div>

          

          <div class="form-group">
          <label for="email">Activated:</label> 
          <select id="activated" name="activated">
          <option value="<?php echo $row['activated']?>"><?php echo $row['activated']?></option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
  
          </select>
        
        </option>
            <span class="error" id="classError"></span>
          </div>
          
        
        <input type="hidden" name="id" value="<?php echo $row['ID']?>">
        <button type="submit">Uppdatte</button>
      </form>
    </div>

    
</body>
</html>