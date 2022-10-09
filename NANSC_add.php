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
$op_manager = $_POST["op_manager_field"];
$tele = $_POST["tele_field"];
$LOA = $_POST["LOA_field"];

$sql = "INSERT INTO NANSC_Airports(airport_name, operation_manager, telephone, letter_of_agreement) 
VALUES ('$airport','$op_manager','$tele','$LOA')";

if ($conn->query($sql) === TRUE) {
  echo "<script>
  alert('A new airport has been added');
  window.location.href='NANSC.php';
  </script>";
//   header("Location: NANSC.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>