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

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rollno = $_POST['rollno'];
    $gender = $_POST['gender'];
    $collegename = $_POST['collegename'];

    $sql = "UPDATE users SET name = ?, email = ?, rollno = ?, gender = ?, collegename = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $rollno, $gender, $collegename, $id);
    $stmt->execute();

    header("Location: admin_dashboard.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Student</h2>
        <form action="edit_student.php" method="post">
            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="rollno">Roll Number:</label>
                <input type="text" id="rollno" name="rollno" value="<?php echo $student['rollno']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male" <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($student['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="collegename">College Name:</label>
                <input type="text" id="collegename" name="collegename" value="<?php echo $student['collegename']; ?>" required>
            </div>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>