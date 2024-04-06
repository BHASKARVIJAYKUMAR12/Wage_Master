<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wagemaster";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Check if the form fields are set
  if (isset($_POST["username"]) && isset($_POST["password"])) {
      // Retrieve the form data
      $name = $_POST["username"];
      $password = $_POST["password"];

      // Prepare and execute the SQL statement
      $sql = "SELECT * FROM registration WHERE name = '$name' AND password = '$password'";
      $result = $conn->query($sql);

      if ($result->num_rows == 1) {
          // Login successful
        //  echo "Login successful";
          header("Location: userpage.php");
          exit;  
      } else {
          // Login failed
          echo "Invalid username or password";
      }
  } else {
      // Form fields are not set
      echo "Form fields not set";
  }
}
// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    /* Basic styling for the login page */
    body {
      background-image: url('loginbg1.jpg');
      font-family: Arial, sans-serif;
      background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: center bottom 70%;
    }
    
    h1 {
      text-align: center;
    }
    
    .form-container {
      width: 300px;
      margin: 0 auto;
    }
    
    .form-container label {
      display: block;
      margin-bottom: 5px;
    }
    
    .form-container input[type="text"],
    .form-container input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    
    .form-container button {
      display: block;
      width: 100%;
      padding: 8px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    
    .form-container button:hover {
      background-color: #45a049;
    }
    
    .switch-form {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h1>Login Page</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div id="signinForm" class="form-container">
  <label for="signinUsername"><b>Username:</b></label>
      <input type="text" id="signinUsername" name="username" required>
      
      <label for="signinPassword"><b>Password:</b></label>
      <input type="password" id="signinPassword" name="password" required>
      <button type="submit" onclick="signIn()">Sign In</button>
  </form>
    
    <div class="switch-form">
      Don't have an account? <a href="registration.php" onclick="toggleForm()">Sign Up</a>
    </div>
  </div>
    <div class="switch-form">
      Already have an account? <a href="login.php" onclick="toggleForm()">Sign In</a>
    </div>
  </div>
    </body>
    </html>
