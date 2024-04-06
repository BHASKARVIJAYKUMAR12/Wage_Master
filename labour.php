<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "wagemaster"; // Assuming your database name is "wagemaster"

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $dateofbirth = $_POST["dob"];
    $gender = $_POST["gender"];
    $aadharno = $_POST["aadhar"];
    $address = $_POST["address"];
    $skills = $_POST["skills"];
    $qualification = $_POST["qualification"];
    $phoneno = $_POST["phone"];
    $email = $_POST["email"];
    $jobdescription = $_POST["jobDescription"];
    $others = $_POST["others"];

    // Prepare the SQL statement to insert data into the labour table
    $sql = "INSERT INTO labour (name, dateofbirth, gender, aadharno, address, skills, qualification, phoneno, email, jobdescription, others)
            VALUES ('$name', '$dateofbirth', '$gender', '$aadharno', '$address', '$skills', '$qualification', '$phoneno', '$email', '$jobdescription', '$others')";

    if ($conn->query($sql) === TRUE) {
        // header("Location : homepage.php");
        // exit;
        header("Location: jobmast.php");
          exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Labour Details</title>
  <style>
    /* General styles */
    body {
      background-color: #f2f2f2;
      background-image: url('labourbg.jpg');
      font-family: Arial, sans-serif;
      background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: center bottom 70%;
    }

    /* Navigation bar styles */
    .navbar {
      background-color: #333;
      overflow: hidden;
      position: fixed;
      top: 0;
      width: 100%;
    }

    .navbar a {
      float: right;
      color: #fff;
      text-align: center;
      padding: 14px 30px;
      text-decoration: none;
    }

    /* Details entry card styles */
    .card {
  max-width: 400px;
  margin: 80px auto 20px 20px;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 0px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  overflow-y: scroll;
  max-height: 500px;
  margin-bottom: 50px;
  margin-top: 50px;
}
    .card h1 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }

    .card label {
      display: block;
      margin-top: 10px;
    }

    .card input[type="text"],
    .card input[type="email"],
    .card input[type="tel"],
    .card select,
    .card textarea {
      width: 90%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .card .gender-container {
      display: flex;
      margin-bottom: 10px;
    }

    .card .gender-container label {
      margin-right: 10px;
    }

    .card input[type="submit"] {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      
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

<div class="card">
    <h1>Labour Details</h1>
    <form name="labour.php" method="POST" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <div class="gender-container">
            <label for="gender">Gender:</label>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other" required>
            <label for="other">Other</label>
        </div>

        <label for="aadhar">Aadhar Number:</label>
        <input type="text" id="aadhar" name="aadhar" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="skills">Skills:</label>
        <input type="text" id="skills" name="skills" required>

        <label for="qualification">Qualification:</label>
        <select id="qualification" name="qualification" required>
            <option value="B.Tech">B.Tech</option>
            <option value="M.Tech">M.Tech</option>
            <option value="BE">BE</option>
            <option value="MBA">MBA</option>
            <option value="MCA">MCA</option>
            <option value="DIPLOMA">DIPLOMA</option>
            <option value="INTER">INTER</option>
            <option value="10TH">10TH</option>
        </select>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="jobDescription">Job Description:</label>
        <textarea id="jobDescription" name="jobDescription" required></textarea>

        <label for="others">Others:</label>
        <input type="text" id="others" name="others">
<div class="center">
        <input type="submit" value="Submit"></div>
    </form>
</div>

<script>
    // JavaScript code for form validation or any additional functionality can be added here
</script>
</body>
</html>
