<?php
include("db_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patient WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row;
            header("Location: ../dashboard_page.php");
            exit();
        } else {
            echo "<script>alert('Invalid Username or password!'); window.location.href = '../signin.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Invalid Username or password!'); window.location.href = '../signin.html';</script>";
        exit();
    }
}
?>