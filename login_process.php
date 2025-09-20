<?php

session_start(); // Start the session

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course_platform";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute SQL query
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Successful login
        $_SESSION['user_id'] = $row['id']; // Store user ID in session
        $_SESSION['username'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        // Invalid password
        header("Location: login.php?error=1");
        exit();
    }
} else {
    // Invalid email
    header("Location: login.php?error=1");
    exit();
}

$stmt->close();
$conn->close();

?>