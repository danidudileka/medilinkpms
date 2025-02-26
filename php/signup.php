<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $patient_name = $_POST['patient_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $security_answer = $_POST['security_answer'];

    // Set default values
    $patient_detail = "Update Your data here";
    $medical_history = "Update Your data here";

    $sql = "INSERT INTO patient (username, password, patient_name, email, phone_number, age, gender, address, patient_detail, medical_history, security_answer)
    VALUES ('$username', '$password', '$patient_name', '$email', '$phone_number', '$age', '$gender', '$address', '$patient_detail', '$medical_history', '$security_answer')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Account created successfully!'); window.location.href = '../signin.html';</script>";
        exit();
    } else {
        echo "<script>alert('Error creating account! Try again!'); window.location.href = '../signup.html';</script>";
        exit();
    }
}
?>
