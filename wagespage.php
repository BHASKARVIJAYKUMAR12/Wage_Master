<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wagemaster";
// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$year = $_POST['year'];
$month = $_POST['month'];
$date = $_POST['date'];
$jobcode = $_POST['jobcode'];
$rateSSK = $_POST['rateSSK'];
$rateUSK = $_POST['rateUSK'];
$rateSK = $_POST['rateSK'];
$rateSUP = $_POST['rateSUP'];

// Prepare the SQL statement to insert the data
$sql = "INSERT INTO wages (year, month, date,jobcode, skilled, unskilled, semiskilled, supervised)
        VALUES ('$year', '$month', '$date','$jobcode', '$rateSSK', '$rateUSK', '$rateSK', '$rateSUP')";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Data inserted successfully";
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
  <title>Wages</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
    body {
        background-color: #f2f2f2;
      background-image: url('wagesbg.jpg');
      font-family: Arial, sans-serif;
      background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: center bottom 70%;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      border-radius: 10px;
      padding: 10px;
      margin-top: 150px;
    }

    .container input[type="text"],
    .container select {
      margin: 5px;
    }

    .container .row {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container .row button {
      margin: 5px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .container .row button:hover {
      background-color: #555;
    }

    .container .row label {
      margin-right: 10px;
      font-weight: bold;
    }

    .container .row input[type="text"] {
      width: 150px;
    }

    .container .row select {
      width: 150px;
    }

    .container .row table {
      border-collapse: collapse;
      width: 70%;
      margin-top: 10px;
    }

    .container .row th,
    .container .row td {
      border: 1px solid #333;
      padding: 8px;
      text-align: left;
    }

    .container .row th {
      background-color: #333;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
  <form name="wagespage.php" method="POST" onsubmit="return validateForm()">
    <div class="row">
      <label for="year">Year:</label>
      <select id="year" name="year">
        <option value="2030">2030</option>
        <option value="2029">2029</option>
        <option value="2028">2028</option>
        <option value="2027">2027</option>
        <option value="2026">2026</option>
        <option value="2025">2025</option>
        <option value="2024">2024</option>
        <option value="2023">2023</option>
        <option value="2022">2022</option>
        <option value="2021">2021</option>
      </select>

      <label for="month">Month:</label>
      <select id="month" name="month">
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

      <label for="date">Date:</label>
      <input type="text" id="date" name="date" placeholder="Select date" style="width: 150px;">
    </div>
    <label for="jobcode"><b>JobCode :</b></label>
      <input type="text" id="jobcode" name="jobcode" placeholder="Enter JobCode" style="width: 250px;">
    <div class="row">
      <table>
        <tr>
          <th>Skill</th>
          <th>Rate</th>
        </tr>
        <tr>
          <td>Skilled (SSK)</td>
          <td><input type="text" id="rateSSK" name="rateSSK" placeholder="Rate"></td>
        </tr>
        <tr>
          <td>Unskilled (USK)</td>
          <td><input type="text" id="rateUSK" name="rateUSK" placeholder="Rate"></td>
        </tr>
        <tr>
          <td>Semiskilled (SK)</td>
          <td><input type="text" id="rateSK" name="rateSK" placeholder="Rate"></td>
        </tr>
        <tr>
          <td>Supervised (SUP)</td>
          <td><input type="text" id="rateSUP" name="rateSUP" placeholder="Rate"></td>
        </tr>
      </table>
    </div>

    <div class="row">
      <button onclick="submitDetails()">Submit</button>
      <button onclick="modifyDetails()">Modify</button>
      <button onclick="deleteDetails()">Delete</button>
    </div>
    <div id="output"></div>
    </form>
  </div>
  </body>
</html>
