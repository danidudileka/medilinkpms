<?php
include("db_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $inquiry_type = mysqli_real_escape_string($conn, $_POST['inquiry-type']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contact_form (name, email, phone, inquiry_type, message) 
              VALUES ('$name', '$email', '$phone', '$inquiry_type', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Thanks for your response!'); window.location.href = '../contactus.html';</script>";
    } else {
        echo "<script>alert('Error! Message not sent!'); window.location.href = '../contactus.html';</script>";
    }
    mysqli_close($conn);
}
?>
