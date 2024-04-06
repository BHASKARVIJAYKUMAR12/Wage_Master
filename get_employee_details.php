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

// Get the job code from the POST request
$jobCode = $_POST['jobCode'];

// Query the labour table and retrieve data
$table = "labour"; // Replace with your table name

$sql = "SELECT aadharno, name, skills, jobdescription FROM $table WHERE jobcode = '$jobCode'";
$result = $conn->query($sql);

// Prepare the response
$response = array();

if ($result->num_rows > 0) {
  // Employee details found
  $row = $result->fetch_assoc();

  $response['success'] = true;
  $response['data'] = $row;
} else {
  // No employee details found
  $response['success'] = false;
  $response['message'] = "No employee details found for the provided job code.";
}

// Close the database connection
$conn->close();

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
