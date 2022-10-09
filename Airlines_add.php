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

$airline = $_POST["airline_field"];
$manager = $_POST["manager_field"];
$tele = $_POST["tele_field"];
$op_manager = $_POST["op_manager_field"];
$operator = $_POST["operator_field"];

$sql = "INSERT INTO Airlines(airline_name, manager, telephone, operation_manager, operator) 
VALUES ('$airline','$manager','$tele','$op_manager','$operator')";

if ($conn->query($sql) === TRUE) {
  echo "<script>
  alert('A new airline has been added');
  window.location.href='Airlines.php';
  </script>";
//   header("Location: NANSC.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>