<?php
include("db_connect.php");
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: signin.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['user']['username'];
    $patient_name = $_POST['patient_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $patient_detail = $_POST['patient_detail'];
    $medical_history = $_POST['medical_history'];

    $sql = "UPDATE patient SET patient_name='$patient_name', email='$email', phone_number='$phone_number', age='$age', gender='$gender', 
        address='$address', patient_detail='$patient_detail', medical_history='$medical_history' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['user']['patient_name'] = $patient_name;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['phone_number'] = $phone_number;
        $_SESSION['user']['age'] = $age;
        $_SESSION['user']['gender'] = $gender;
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['patient_detail'] = $patient_detail;
        $_SESSION['user']['medical_history'] = $medical_history;
        
        echo "<script>alert('Profile updated successfully!.'); window.location.href = '../dashboard_page.php';</script>";
    } else {
        echo "<script>alert('Error updating the profile!.'); window.location.href = '../update_page.php';</script>";
    }
}
?>
