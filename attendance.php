<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "wagemaster";

$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Muster Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    .form-group input,
    .form-group select {
      width: 100%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .form-group select {
      height: 30px;
    }
    .button-container {
      text-align: center;
      margin-top: 20px;
    }
    .button-container button {
      padding: 10px 20px;
      border-radius: 5px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
    }
    .output-container {
      margin-top: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 10px;
    }
    .output-container table {
      width: 100%;
      border-collapse: collapse;
    }
    .output-container th,
    .output-container td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    #detailsTextbox {
  width: 100%;
  height: 200px;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

  </style>
</head>
<body>
  <div class="container">
    <h2>Muster Details</h2>
    <div class="form-group">
      <label for="jobCode">Job Code:</label>
      <input type="text" id="jobCode" placeholder="Enter job code (at least 10 characters)">
    </div>
    <div class="form-group">
      <label for="yearSelect">Year:</label>
      <select id="yearSelect">
        <option value="">Select year</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
      </select>
    </div>

    <div class="form-group">
      <label for="monthSelect">Month:</label>
      <select id="monthSelect">
        <option value="">Select month</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
      </select>
    </div>

    <div class="button-container">
      <button onclick="displayDetails()">Show Details</button>
    </div>
    <div class="output-container" id="outputContainer">
      <textarea id="detailsTextbox" readonly></textarea>
    </div>
  </div>

  <script>
    function displayDetails() {
  // Get the input values
  var jobCode = document.getElementById("jobCode").value;
  var year = document.getElementById("yearSelect").value;
  var month = document.getElementById("monthSelect").value;

  // Perform validation if needed

  // Create the static data object
  var employeeData = {
    aadharno: "1234567890",
    name: "John Doe",
    skills: "Programming, Design",
    jobdescription: "Full Stack Developer"
  };

  // Display the static data in the output text box
  var outputTextbox = document.getElementById("detailsTextbox");
  outputTextbox.value = "Aadhar No: " + employeeData.aadharno + "\n" +
                        "Name: " + employeeData.name + "\n" +
                        "Skills: " + employeeData.skills + "\n" +
                        "Job Description: " + employeeData.jobdescription;
}

  </script>
</body>
</html>
