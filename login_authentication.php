<?php
$servername = "localhost";
$username = "id17409418_cdm_db";
$password = "1MytI|NkPXc]Ll%V";
$dbname = "id17409418_cdm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

$uname = $_POST["uname"];
$pass = $_POST["pass"];

$sql = "SELECT * FROM User WHERE username = '$uname' and password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $first_row = $result->fetch_assoc();
  $_SESSION["name"] = $first_row["name"];
  $_SESSION["gender"] = $first_row["gender"];
  // echo '<script>alert("'  . $first_row["gender"] . '")</script>';
  header("Location: NANSC.php");
}
else{
  echo "<script>
  alert('Wrong username or password');
  window.location.href='login.html';
  </script>";
}
$conn->close();
?>