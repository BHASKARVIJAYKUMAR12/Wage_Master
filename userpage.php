<?php
// Assuming you have already established a database connection
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

// Query to retrieve the username from the registration table
$query = "SELECT name FROM registration";

// Execute the query
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the username from the result set
    $row = $result->fetch_assoc();
    $username = $row['name'];
} else {
    // Handle the case when the query fails
    $username = "Unknown";
}

// Close the database connection
$conn->close();?>
<!DOCTYPE html>
<html>
<head>
  <title>Webpage Example</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .navbar {
      background-color: #333;
      padding: 10px;
      color: #fff;
      display: flex;
      justify-content: space-between;
    }
    
    .navbar h3 {
      margin: 0;
    }
    
    .card {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 0px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }
    
    .card h2 {
      margin-top: 0;
    }
    
    .card ul {
      list-style-type: none;
      padding: 0;
    }
    
    .card li {
      margin-bottom: 10px;
    }
    
    .card a {
      text-decoration: none;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <h3>Welcome, <?php echo $username; ?></h3>
    <a href="signout.php">Sign Out</a>
  </div>
  
  <div class="card">
    <h2>Webpages</h2>
    <ul>
      <li><a href="labour.php">Labours Page</a></li>
      <li><a href="jobmaster.php">Job Master Page</a></li>
      <li><a href="attendance.php">Attendance Page</a></li>
      <li><a href="wagespage.php">Wages Page</a></li>
    </ul>
  </div>
</body>
</html>
