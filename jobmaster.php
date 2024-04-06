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

  // Check if the form was submitted
  if (isset($_POST['submit'])) {
      // Get form values
      $jobCode = $_POST['jobCode'];
      $department = $_POST['department'];
      $startDate = $_POST['startDate'];
      $endDate = $_POST['endDate'];
      $manPower = $_POST['manPower'];

      // Prepare the SQL statement
      $sql = "INSERT INTO jobmaster(jobcode, department, startdate, enddate, manpower) VALUES ('$jobCode', '$department', '$startDate', '$endDate', '$manPower')";

      // Execute the SQL statement
      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
  // Close the database connection
  $conn->close();
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Job Master</title>
  <style>
    /* CSS styling */
    body {
        background-color: #f2f2f2;
      background-image: url('jobmasterbg.jpg');
      font-family: Arial, sans-serif;
      background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: center bottom 70%;
    }
    h1 {
      text-align: center;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border-radius: 5px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      display: block;
      margin: 0 auto;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Job Master</h1>
    <form name="jobmaster.php" method="POST" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="jobCode">Job Code:</label>
        <input type="text" id="jobCode" name="jobCode" maxlength="10" required>
      </div>
      <div class="form-group">
        <label for="department">Department:</label>
        <select id="department" name="department" required>
          <option value="">Select Department</option>
          <option value="Electrical">Electrical</option>
          <option value="Civil">Civil</option>
          <option value="IT">IT</option>
          <option value="Chemical">Chemical</option>
          <option value="CSE">CSE</option>
          <option value="Mechanical">Mechanical</option>
          <option value="ECE">ECE</option>
        </select>
      </div>
      <div class="form-group">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" required>
      </div>
      <div class="form-group">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" required>
      </div>
      <div class="form-group">
        <label for="manPower">Man Power:</label>
        <input type="number" id="manPower" name="manPower" required>
      </div>
      <button type="submit" name="submit">Submit</button>
    </form>
  </div>
</body>
</html>


<!--------------
  <script>
    // JavaScript code to handle form submission
    document.getElementById('jobForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission
      // Get form values
      var jobCode = document.getElementById('jobCode').value;
      var department = document.getElementById('department').value;
      var startDate = document.getElementById('startDate').value;
      var endDate = document.getElementById('endDate').value;
      var manPower = document.getElementById('manPower').value;

      // Display form values (you can modify this part to send the values to a server)
      console.log("Job Code: " + jobCode);
      console.log("Department: " + department);
      console.log("Start Date: " + startDate);
      console.log("End Date: " + endDate);
      console.log("Man Power: " + manPower);
    });
  </script>
  ----------------->
