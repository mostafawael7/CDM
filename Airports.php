<?php
session_start();
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Airports </title>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="CSS/Dashboard_style.css">
  <link rel="stylesheet" href="CSS/table_style.css">
  <link rel="stylesheet" href="CSS/modalBox_style.css">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
      <!-- <img src="media/logo.png" alt="Couldn't load image" width="30" height="30"> -->
      <div class="logo_name">CDM</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="NANSC.php">
          <i class='bx bxs-plane bx-rotate-90'></i>
          <span class="links_name">NANSC</span>
        </a>
        <span class="tooltip">NANSC</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-plane-take-off'></i>
          <span class="links_name">Airports</span>
        </a>
        <span class="tooltip">Airports</span>
      </li>
      <li>
        <a href="Airlines.php">
          <i class='bx bxs-plane-alt'></i>
          <span class="links_name">Airlines</span>
        </a>
        <span class="tooltip">Airlines</span>
      </li>
      <li>
        <a href="Military.php">
          <i class='bx bx-shield'></i>
          <span class="links_name">Military</span>
        </a>
        <span class="tooltip">Military</span>
      </li>
      <li>
        <a href="index.html">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
      <!-- <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li> -->
      <li class="profile">
        <?php
        if ($_SESSION["gender"] == 1) {
          echo '<div class="name">Mr. ' . $_SESSION["name"] . '</div>';
        } else {
          echo '<div class="name">Mrs. ' . $_SESSION["name"] . '</div>';
        }
        ?>
        <!-- <div class="profile-details"> -->
        <!-- <img src="media/profile.png" alt="profileImg"> -->
        <!-- <div class="name_job">
             <div class="job">Title</div>
           </div> -->
        <!-- </div> -->
        <i class='bx bx-user' id="log_out"></i>
        <!-- <i class='bx bx-log-out' id="log_out" ></i> -->
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="top-div">
      <input type="text" placeholder="What are you looking for?" id="gfg" class="search" onkeyup="myFunction()">
      <button class="add" id="myBtn">Add</button>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <div>
          <form action="Airports_add.php" method="POST">
            <input type="text" class="modal_field" placeholder="Airport Name..." name="airport_field" required>
            <input type="text" class="modal_field" placeholder="Manager..." name="manager_field" required>
            <input type="text" class="modal_field" placeholder="Telephone..." name="tele_field" required>
            <input type="text" class="modal_field" placeholder="COO..." name="coo_field" required>
            <button type="submit" class="modal_btn">Add</button>
          </form> 
        </div>
      </div>
    </div>
    <?php
    $con = mysqli_connect("localhost", "id17409418_cdm_db", "1MytI|NkPXc]Ll%V", "id17409418_cdm");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($con, "SELECT * FROM Airports");

    echo "<table border='1' id='myUL'>
      <tr>
      <th>Airport Name</th>
      <th>Manager</th>
      <th>Telephone</th>
      <th>COO</th>
      </tr>";

    while ($row = mysqli_fetch_array($result)) {
      echo "<tbody id='geeks'>";
      echo "<tr>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['manager'] . "</td>";
      echo "<td>" . $row['telephone'] . "</td>";
      echo "<td>" . $row['coo'] . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    mysqli_close($con);
    ?>
  </section>

  <script src="JS/Dashboard_script.js"></script>
  <script>
    $(document).ready(function() {
      $("#gfg").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#geeks tr").filter(function() {
          $(this).toggle($(this).text()
            .toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  <!-- <script>
    var btn = document.getElementById('add_entry');
    btn.addEventListener('click', function() {
      document.location.href = 'NANSC_add.php';
    });
  </script> -->
  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>

</html>