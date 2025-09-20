<?php

session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Retrieve the username from the session
    $email = $_SESSION['email']; // Retrieve the email from the session
} else {
    // Handle the case where the username is not set in the session
    $username = "Guest"; // Or redirect to login, etc.
}

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "course_platform";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$setNumber = $_POST['setNumber'];
$resultDate = date('Y-m-d');
$subject = 'JavaScript'; // Subject is JavaScript
$user_id = 0;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
// Calculate marks
$marks = 0;
$sql = "SELECT * FROM mcqs WHERE category = 'JavaScript' AND id BETWEEN " . (($setNumber - 1) * 5 + 36) . " AND " . ($setNumber * 5 + 35); // Adjusted IDs for JavaScript
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questionId = $row['id'];
        $correctOption = $row['correct_option'];

        if (isset($_POST['answer_' . $questionId]) && $_POST['answer_' . $questionId] == $correctOption) {
            $marks++;
        }
    }
}

$timeTaken = isset($_POST['timeTaken']) ? $_POST['timeTaken'] : 0;

$sql = "INSERT INTO results (user_name, marks, user_id, time_duration, set_number, subject, result_date) VALUES ('" . $_SESSION['username'] . "', $marks, $user_id, $timeTaken, $setNumber, '$subject', '$resultDate')";
if ($conn->query($sql) === TRUE) {
    $quizSubmitted = true;
} else {
    $quizSubmitted = false;
    $error = "Error: " . $sql . "<br>" . $conn->error;
}

// Send email with quiz details
require 'mailing/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$emailSent = false;

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail -> Username = "ndrkquizportal@gmail.com";
    $mail -> Password = "tkvk ykpe rsyj kcrs";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('ndrkquizportal@gmail.com', 'Quiz Platform');
    $mail->addAddress($email, $username);

    $mail->isHTML(true);
    $mail->Subject = 'Quiz Results';
    $mail->Body = "
        <h2>Quiz Results</h2>
        <p>Dear $username,</p>
        <p>Thank you for taking the JavaScript quiz. Here are your results:</p>
        <ul>
            <li><strong>Subject:</strong> $subject</li>
            <li><strong>Set Number:</strong> $setNumber</li>
            <li><strong>Marks:</strong> $marks out of 5</li>
            <li><strong>Time Taken:</strong> $timeTaken seconds</li>
            <li><strong>Date:</strong> $resultDate</li>
        </ul>
        <p>Best regards,<br>Quiz Platform Team</p>
    ";

    $mail->send();
    $emailSent = true;
} catch (Exception $e) {
    $emailError = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 10px;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body  style="background-image: url('https://t4.ftcdn.net/jpg/06/91/05/19/360_F_691051962_GFhQPOAXABmf7l706q89b2PFh6FnB1kI.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <h2>Quiz Results</h2>
        <?php if ($quizSubmitted): ?>
            <p>Thank you for taking the JavaScript quiz. Here are your results:</p>
            <ul>
                <li><strong>Subject:</strong> <?php echo $subject; ?></li>
                <li><strong>Set Number:</strong> <?php echo $setNumber; ?></li>
                <li><strong>Marks:</strong> <?php echo $marks; ?> out of 5</li>
                <li><strong>Time Taken:</strong> <?php echo $timeTaken; ?> seconds</li>
                <li><strong>Date:</strong> <?php echo $resultDate; ?></li>
            </ul>
            <?php if ($emailSent): ?>
                <p>An email with your quiz results has been sent to <?php echo $email; ?>.</p>
            <?php else: ?>
                <p>There was an error sending the email: <?php echo $emailError; ?></p>
            <?php endif; ?>
        <?php else: ?>
            <p>There was an error submitting your quiz: <?php echo $error; ?></p>
        <?php endif; ?>
        <div class="button-container">
            <a href="dashboard.php">Go to Dashboard</a>
        </div>
    </div>
</body>
</html>