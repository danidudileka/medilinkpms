<?php
include("./php/db_connect.php");
session_start();

// Fetch all usernames from the patient table
$usernames_query = "SELECT username FROM patient";
$result_usernames = $conn->query($usernames_query);

$selected_user = isset($_POST['username']) ? $_POST['username'] : '';

// Fetch details for the selected user
$user_details = null;
$checkup_details = [];

if (!empty($selected_user)) {
    $details_query = "SELECT * FROM patient WHERE username = '$selected_user'";
    $result_details = $conn->query($details_query);
    $user_details = $result_details->fetch_assoc();

    // Fetch scheduled checkups for the selected user
    $checkups_query = "SELECT checkup_type, checkup_date FROM medical_checkups WHERE username = '$selected_user'";
    $result_checkups = $conn->query($checkups_query);
    while ($row = $result_checkups->fetch_assoc()) {
        $checkup_details[] = $row;
    }
}

// Function to format values properly
function formatValue($value) {
    return ($value === "Update Your data here" || empty($value)) ? "N/A" : $value;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MediLink | User Details</title>
    <link rel="stylesheet" href="Style/style.css" />
    <style>

        h2{
            text-align: center;
            padding-top: 16px;
        }
        table {
            max-width: 1100px;
            width: 100%;
            border-collapse: collapse;
            margin: 16px auto 24px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: var(--secondary);
            color: #fff;
        }

        td{
            background-color: #fff;
        }

        form{
            width: 1100px;
            margin: 0 auto;
        }

        select{
            width: 300px;
            height: 40px;
            padding: 8px;
        }

        label{
            display: block;
            font-size: 1.5em;
            font-weight: bold;
            padding-top: 16px;
        }
    </style>
</head>
<body>
    <header>
      <nav>
        <h1 class="logo">MediLink</h1>
        <ul class="menu">
          <li>
            <a href="index.html"><b>Home</b></a>
          </li>

          <li><a href="services.php">Services</a></li>

          <li><a href="aboutus.html">About us</a></li>

          <li><a href="contactus.html">Contact</a></li>

          <li><a href="signin.html">Account</a></li>
        </ul>
      </nav>
    </header>
    
    <form method="POST">
    <label for="username">Select a Patient:</label>
        <select name="username" id="username" onchange="this.form.submit()">
            <option value="" disabled selected>Choose a username</option>
            <?php while ($row = $result_usernames->fetch_assoc()) { ?>
                <option value="<?php echo $row['username']; ?>" <?php if ($selected_user == $row['username']) echo 'selected'; ?>>
                    <?php echo $row['username']; ?>
                </option>
            <?php } ?>
        </select>
    </form>

    <h2>Patient Details</h2>
    <table border="1">
        <tr>
            <th>Patient Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Patient Details</th>
            <th>Scheduled Medical Checkups</th>
            <th>Health History</th>
        </tr>
        <tr>
            <?php if ($user_details) { ?>
                <td><?php echo $user_details['patient_name']; ?></td>
                <td><?php echo $user_details['gender']; ?></td>
                <td><?php echo $user_details['age']; ?></td>
                <td><?php echo formatValue($user_details['patient_detail']); ?></td>
                <td>
                    <?php
                    if (!empty($checkup_details)) {
                        foreach ($checkup_details as $checkup) {
                            echo "<p>" . date("d/m/Y", strtotime($checkup['checkup_date'])) . " - " . $checkup['checkup_type'] . "</p>";
                        }
                    } else {
                        echo "No scheduled checkups";
                    }
                    ?>
                </td>
                <td><?php echo formatValue($user_details['medical_history']); ?></td>
            <?php } else { ?>
                <td colspan="6" style="text-align: center;">Select a patient to view details</td>
            <?php } ?>
        </tr>
    </table>

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
