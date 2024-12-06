<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'registration_db');

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];

// Insert data into database
$sql = "INSERT INTO registrations (name, email, phone, dob, gender, address)
        VALUES ('$name', '$email', '$phone', '$dob', '$gender', '$address')";

if ($conn->query($sql) === TRUE) {
    echo json_encode([
        'success' => true,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'dob' => $dob,
        'gender' => $gender,
        'address' => $address
    ]);
} else {
    echo json_encode(['success' => false, 'message' => $conn->error]);
}

$conn->close();
?>
