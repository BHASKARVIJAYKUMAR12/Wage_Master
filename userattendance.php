<?php
// Assuming you have a database connection already established
$servername = "localhost";
$username="root";
$password = "";
$dbname = "wagemaster";
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Create a new PDO instance
$conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$requestPayload = file_get_contents("php://input");
var_dump($requestPayload);

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve the request payload
  $requestData = json_decode(file_get_contents("php://input"));
  if ($requestData !== null && isset($requestData->jobCode) && isset($requestData->type)) {
  // Extract the job code and attendance type from the payload
  $jobCode = $requestData->jobCode;
  $type = $requestData->type;
  $stmt = $conn->prepare("SELECT * FROM userattendance WHERE jobcode = :jobcode");
  $stmt->bindParam(":jobcode", $jobCode);
  $stmt->execute();
  }else{
    die("Invalid request payload");
  }
  if ($stmt->rowCount() > 0) {
    // Job code exists, update the corresponding record
    if ($type === "present") {
      $sql = "UPDATE userattendance SET present = present + 1 WHERE jobcode = :jobcode";
    } elseif ($type === "absent") {
      $sql = "UPDATE userattendance SET absent = absent + 1 WHERE jobcode = :jobcode";
    }
  } else {
    // Job code does not exist, insert a new record
    $sql = "INSERT INTO userattendance (jobcode, present, absent) VALUES (:jobcode, :present, :absent)";
  }

  // Prepare and execute the SQL statement
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(":jobcode", $jobCode);
  $stmt->bindValue(":present", ($type === "present" ? 1 : 0), PDO::PARAM_INT);
  $stmt->bindValue(":absent", ($type === "absent" ? 1 : 0), PDO::PARAM_INT);
  $success = $stmt->execute();
  // Check if the query was successful
  if ($success) {
    echo json_encode(["success" => true]);
  } else {
    echo json_encode(["success" => false]);
  }
  
}
//$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Daily Attendance</title>
  <style>
    /* Add some basic styling to the page */
    body {
      font-family: Arial, sans-serif;
      padding: 0;
      margin: 0;
      background-image: url("userattendancebg.jpg");
      background-size: cover;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
    }
    .card {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 100%;
    }
    .navbar {
      background-color: black;
      display: flex;
      justify-content: flex-end;
      padding: 10px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1;
    }
    .navbar a {
      float: right;
      color: #fff;
      text-align: center;
      padding: 14px 30px;
      text-decoration: none;
    }
    .form-group {
      margin-bottom: 10px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input[type="text"],
    .form-group input[type="checkbox"] {
      margin-left: 5px;
    }
    .submit-button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .submit-button:hover {
      background-color: #45a049;
    }
    .center{
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>
<div class="navbar">
    <a href="signout.php">Sign Out</a>
  </div>
  <div class="container">
  <form name="userattendance.php" method="POST" id="attendanceForm" onsubmit="return validateForm()">

    <div class="card">
      <h1>Daily Attendance</h1>
        <div class="form-group">
          <label for="jobCodeInput">Job Code (Unique ID):</label>
          <input type="text" id="jobCodeInput" name="jobCode" required>
        </div>
        <div class="form-group">
          <label for="present">Present:</label>
          <input type="checkbox" id="presentCheckbox" name="type" value="present">
        </div>
        <div class="form-group">
          <label for="absentCheckbox">Absent:</label>
          <input type="checkbox" id="absentCheckbox" name="type" value="absent">
        </div><div class="center">
        <button class="submit-button" type="submit">Submit</button></div>
        </form>
    </div>
  </div>
  <script>
    document.getElementById("attendanceForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent the form from submitting normally

      var formData = new FormData(this);
  var jobCode = formData.get("jobCode");
  var type = formData.get("type");

  // Increment the attendance based on the checkbox selected
  if (type === "present") {
    incrementAttendance(jobCode, "present");
  } else if (type === "absent") {
    incrementAttendance(jobCode, "absent");
  }

  // Reset the form
  document.getElementById("attendanceForm").reset();
});

    function incrementAttendance(jobCode, type) {
      // Send an AJAX request to your server to update the database
      // Here, you would typically use a server-side language like PHP, Node.js, etc., to handle the database operations

      // Example AJAX request using JavaScript fetch API
      fetch("/updateAttendance", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ jobCode: jobCode, type: type })
      })
      .then(function(response) {
        if (response.ok) {
          console.log("Attendance updated successfully.");
        } else {
          console.log("Failed to update attendance.");
        }
      })
      .catch(function(error) {
        console.log("Error:", error);
      });
    }
  </script>
</body>
</html>
