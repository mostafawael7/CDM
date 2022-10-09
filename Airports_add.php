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

$airport = $_POST["airport_field"];
$manager = $_POST["manager_field"];
$tele = $_POST["tele_field"];
$coo = $_POST["coo_field"];

$sql = "INSERT INTO Airports(name, manager, telephone, coo) 
VALUES ('$airport','$manager','$tele','$coo')";

if ($conn->query($sql) === TRUE) {
  echo "<script>
  alert('A new airport has been added');
  window.location.href='Airports.php';
  </script>";
//   header("Location: NANSC.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>