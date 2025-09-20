<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

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

$student_id = $_GET['id'];

// Fetch quiz history for the student
$sql = "SELECT * FROM results WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz History</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button-container a {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button-container a:hover {
            background-color: #0056b3;
        }

        .logout-button a {
            background-color: #dc3545;
        }

        .logout-button a:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body  style="background-image: url('https://t4.ftcdn.net/jpg/06/91/05/19/360_F_691051962_GFhQPOAXABmf7l706q89b2PFh6FnB1kI.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <h1>Quiz History</h1>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Marks out of 5</th>
                    <th>Time Duration (In Seconds)</th>
                    <th>Set Number</th>
                    <th>Subject</th>
                    <th>Result Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['marks'] . "</td>";
                        echo "<td>" . $row['time_duration'] . "</td>";
                        echo "<td>" . $row['set_number'] . "</td>";
                        echo "<td>" . $row['subject'] . "</td>";
                        echo "<td>" . $row['result_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No quiz history found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="button-container">
            <a href="admin_dashboard.php">Back to Dashboard</a>
            <div class="logout-button">
                <a href="admin_logout.php">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>