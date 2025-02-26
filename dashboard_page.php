<?php
session_start();
include("php/db_connect.php");

if (!isset($_SESSION['user'])) {
    header("Location: signin.html");
    exit();
}
$user = $_SESSION['user'];
$username = $user['username'];

// Medical Checkups
$sql_checkups = "SELECT checkup_date, checkup_type FROM medical_checkups WHERE username='$username' ORDER BY checkup_date ASC";
$result_checkups = $conn->query($sql_checkups);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/dashboard.css" />
  </head>
  <body>
    <header>
      <nav>
        <h1 class="logo">MediLink</h1>
        <ul class="menu">
          <li><a href="index.html">Home</a></li>

          <li><a href="services.php">Services</a></li>

          <li><a href="aboutus.html">About us</a></li>

          <li><a href="contactus.html">Contact</a></li>

          <li>
            <a href="dashboard.html"><b>Account</b></a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="dashboard-container">
        <div class="dashboard-top">
            <div class="dashboard-name">
                <h1>Welcome! <?php echo $user['patient_name']; ?></h1>
            </div>
            <div class="dashboard-signout">
                <a href="update_page.php">Edit Account</a>
                <a href="php/logout.php">Sign Out</a>
            </div>
        </div>

        <hr />

        <div class="dashboard-row">
            <div class="dashboard-titles">
                <h2>Patient Details</h2>
            </div>
            <div class="dashboard-details">
                <div class="patient-details-container">
                    <div class="patient-details">
                        <h3>Name</h3>
                        <p><?php echo $user['patient_name']; ?></p>
                    </div>
                    <div class="patient-details">
                        <h3>Age</h3>
                        <p><?php echo $user['age']; ?></p>
                    </div>
                    <div class="patient-details">
                        <h3>Gender</h3>
                        <p><?php echo $user['gender']; ?></p>
                    </div>
                    <div class="patient-details">
                        <h3>Address</h3>
                        <p><?php echo $user['address']; ?></p>
                    </div>
                    <div class="patient-details">
                        <h3>Contact</h3>
                        <p><?php echo $user['email']; ?><br /><?php echo $user['phone_number']; ?></p>
                    </div>
                    <div class="patient-details">
                        <h3>Condition</h3>
                        <p><?php echo !empty($user['patient_detail']) ? $user['patient_detail'] : "Update Your data here"; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-row">
            <div class="dashboard-titles">
                <h2>Scheduled<br />Medical Checkups</h2>
            </div>
            <div class="dashboard-details">
                <div class="patient-details">
                    <?php
                    if ($result_checkups->num_rows > 0) {
                        while ($row = $result_checkups->fetch_assoc()) {
                          echo "<h3>Date - " . date("d/m/Y", strtotime($row['checkup_date'])) . "</h3>";
                            echo "<p>" . $row['checkup_type'] . "</p>";
                        }
                    } else {
                        echo "<p>No scheduled checkups.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="dashboard-row">
            <div class="dashboard-titles">
                <h2>Health History</h2>
            </div>
            <div class="dashboard-details">
                <div class="patient-details">
                    <p><?php echo !empty($user['medical_history']) ? $user['medical_history'] : "Update Your data here"; ?></p>
                </div>
            </div>
        </div>
    </div>

    <footer>
      <div class="container">
        <div class="item1">
          <p class="footer-title">MediLink Patient Management System</p>
          <p>
            Streamlining healthcare with secure, efficient, and user-friendly
            solutions, empowering patients for better medical management and
            care.
          </p>
          <br />
          <p class="footer-title">Address</p>
          <p>No.10, Colombo 04, Sri Lanka</p>
          <br />

          <p class="footer-title">Contact</p>
          <p>+94 123456789</p>
          <p>MediLinkpms@email.com</p>
        </div>
        <div></div>
        <div class="item2">
          <p class="footer-title">Navigation</p>
          <ul class="footer-nav">
            <li><a href="index.html">Home</a></li>

            <li><a href="services.php">Services</a></li>

            <li><a href="aboutus.html">About us</a></li>

            <li><a href="contactus.html">Contact</a></li>
          </ul>
        </div>
        <div class="item3">
          <p class="footer-title">Social Media</p>
          <ul class="footer-nav">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">LinkedIn</a></li>
          </ul>
        </div>
      </div>
      <p id="credits">Development Team 07</p>
    </footer>
  </body>
</html>
