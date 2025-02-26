<?php
session_start();
include("db_connect.php");

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    echo "<script>alert('You must be signed in to book a checkup!'); window.location.href = '../signin.html';</script>";
    exit();
}

$username = $_SESSION['user']['username']; // Get logged-in username
$checkup_date = $_POST['checkup_date'];
$checkup_type = $_POST['checkup_type'];

// Check if username exists in patient table
$sql_check = "SELECT username FROM patient WHERE username='$username'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows == 0) {
    echo "<script>alert('Error: User does not exist!'); window.location.href = '../services.php';</script>";
    exit();
}

// Insert checkup into medical_checkups table
$sql_insert = "INSERT INTO medical_checkups (username, checkup_date, checkup_type) VALUES ('$username', '$checkup_date', '$checkup_type')";

if ($conn->query($sql_insert) === TRUE) {
    echo "<script>alert('Checkup booked successfully!'); window.location.href = '../dashboard_page.php';</script>";
} else {
    echo "<script>alert('Error booking checkup!'); window.location.href = '../services.php';</script>";
}
?>
