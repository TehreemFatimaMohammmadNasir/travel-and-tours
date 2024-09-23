<?php
// Database configuration
$host = 'localhost';
$db = 'booking';
$user = 'root';
$pass = '';

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user inputs
    $name = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $datetime = trim($_POST['datetime']);
    $destination = trim($_POST['destination']);
    $specialRequest = trim($_POST['specialRequest']);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, datetime, destination, special_request) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $datetime, $destination, $specialRequest);

    if ($stmt->execute()) {
        // Booking was successful
        echo json_encode(['message' => 'Booking successful!']);
    } else {
        // Error saving booking
        echo json_encode(['message' => 'Error saving booking: ' . $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
