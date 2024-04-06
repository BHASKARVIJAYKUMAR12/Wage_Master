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

// Check if the registration form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute the SQL statement to insert the data into the database
    // $registrationSql = "INSERT INTO registration (name, email, password) VALUES ('$name', '$email', '$password')";
    $sql = "INSERT INTO registration (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "Registration successful";
       // $loginSql = "INSERT INTO logindata (username, password) VALUES ('$username', '$password')";
       // if ($conn->query($loginSql) === TRUE) {
            // Login data inserted successfully
        //   echo "Login data inserted successfully";
        } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <style>
    /* Basic styling for the registration form */
    body {
        background-image: url('registration.jpg');
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: center bottom 70%; /* Adjust the percentage value as needed */
    }
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 0px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
        text-align: center;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    
    .signin-link {
        text-align: center;
        margin-top: 10px;
    }
</style>

</head>
<body>
  <div class="container">
    <h1>Registration Page</h1>
    <form name="registrationForm" method="post" onsubmit="return validateForm()">
      <label for="name">Name:</label>
      <input type="text" name="name" required>
      
      <label for="email">Email:</label>
      <input type="email" name="email" required>
      
      <label for="password">Password:</label>
      <input type="password" name="password" required>
      
      <input type="submit" value="Register">
    </form>
    
    <div class="signin-link">
      <a href="login.php">Already have an account? Sign in</a>
    </div>
  </div>
  
  <script>
    function validateForm() {
      var name = document.forms["registrationForm"]["name"].value;
      var email = document.forms["registrationForm"]["email"].value;
      var password = document.forms["registrationForm"]["password"].value;
      
      if (name === "") {
        alert("Name must be filled out");
        return false;
      }
      
      if (email === "") {
        alert("Email must be filled out");
        return false;
      }
      
      if (password === "") {
        alert("Password must be filled out");
        return false;
      }
      
      return true;
    }
  </script>
</body>
</html>