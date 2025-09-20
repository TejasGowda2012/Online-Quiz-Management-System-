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
$sql = "SELECT * FROM admin WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($password == $row['password']) {
        // Successful login
        $_SESSION['admin_id'] = $row['adminid']; // Store admin ID in session
        $_SESSION['admin_name'] = $row['name'];
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Invalid password
        header("Location: admin_login.php?error=1");
        exit();
    }
} else {
    // Invalid email
    header("Location: admin_login.php?error=1");
    exit();
}

$stmt->close();
$conn->close();

?>