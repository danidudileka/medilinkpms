<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $security_answer = $_POST['security_answer'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    $sql = "SELECT * FROM patient WHERE username='$username' AND security_answer='$security_answer'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $sql_update = "UPDATE patient SET password='$new_password' WHERE username='$username'";
        if ($conn->query($sql_update) === TRUE) {
            echo "<script>alert('Password updated successfully!'); window.location.href = '../signin.html';</script>";
        }
    } else {
        echo "<script>alert('Incorrect Username or Security answer!'); window.location.href = '../recover_password.html';</script>";
    }
}
?>
