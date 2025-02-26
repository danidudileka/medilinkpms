<?php
include("db_connect.php");
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: signin.html");
    exit();
}

$username = $_SESSION['user']['username'];

$sql = "DELETE FROM patient WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    session_destroy();
    header("Location: signup.html");
} else {
    echo "Error deleting account: " . $conn->error;
}
?>
