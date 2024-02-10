<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ofo";

// Create connection
$con = new mysqli($host, $username, $password, $database);

// Check connection
if ($con->connect_errno) {
  $response = array(
    "error" => true,
    "message" => "Invalid database connection Failed" 
  );

  echo json_encode($response);
  die();
    // die("Connection failed: " . $con->connect_error);
  }
  // else{
  //   echo "Connected successfully";

  // }
  
// if (!$conn) {
//   header("location: ./error.php");
// }
// else{
//     echo "Connected successfully";
// }
?>