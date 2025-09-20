<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];

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

// Fetch results from the database
$sql = "SELECT * FROM results WHERE user_id = $user_id order by result_id desc";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Import Google Font (Open Sans) */
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap');

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color:rgb(255, 255, 255);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 50px;
            max-width: 800px;
            width: 100%;
            margin: 0 auto; /* Center the container */
        }

        h2 {
            color: #333;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        /* Navigation Styles */
        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #fff;
            font-weight: 700;
            font-size: 1.2em;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }

        /* Course Links */
        .course-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .course-links a {
            background-color:rgb(0, 123, 255);
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .course-links a:hover {
            background-color:rgb(0, 74, 154);
        }

        /* Logout Button */
        .logout-button {
            text-align: center;
        }

        .logout-button a {
            background-color:rgb(2, 1, 1);
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout-button a:hover {
            background-color:rgb(187, 7, 25);
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body style="background-image: url('https://images.pexels.com/photos/326055/pexels-photo-326055.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <h2>Dashboard</h2>
        <div class="course-links">
            <a href="html.php">HTML Full Course</a>
            <a href="css.php">CSS Full Course</a>
            <a href="js.php">JavaScript Full Course</a>
            <a href="phplearning.php">PHP Full Course</a>
        </div>
        <div class="logout-button">
            <a href="login.php">Logout</a>
        </div>

        <h2>My Quiz Results</h2>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Marks out of 5</th>
                    <th>Time Duration</th>
                    <th>Set Number</th>
                    <th>Subject</th>
                    <th>Result Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['marks'] . "</td>";
                        echo "<td>" . $row['time_duration'] . " Seconds </td>";
                        echo "<td>" . $row['set_number'] . "</td>";
                        echo "<td>" . $row['subject'] . "</td>";
                        echo "<td>" . $row['result_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No results found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>