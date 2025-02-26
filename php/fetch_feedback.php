<?php
include("db_connect.php");

$query = "SELECT * FROM contact_form ORDER BY submitted_at DESC";
$result = mysqli_query($conn, $query);

$feedback = [];
while ($row = mysqli_fetch_assoc($result)) {
    $feedback[] = $row;
}

header('Content-Type: application/json');
echo json_encode($feedback);

mysqli_close($conn);
?>
