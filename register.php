<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";      // Default XAMPP password
$dbname = "course_platform";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if (!empty($_POST)) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $rollno = $_POST['rollno'];
    $gender = $_POST['gender'];
    $collegename = $_POST['collegename'];

    // Prepare and execute SQL query
    $sql = "INSERT INTO users (name, email, password, rollno, gender, collegename) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $password, $rollno, $gender, $collegename);

    if ($stmt->execute()) {
        $_SESSION['username'] = $name;
        // Success: Output HTML with success message
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registration Success</title>
            <style>
                body {
                    font-family: \'Arial\', sans-serif;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background: linear-gradient(135deg, #6dd5ed, #2193b0);
                }

                .container {
                    background-color: #ffffff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                    width: 350px;
                    text-align: center;
                }

                p.success-message {
                    color: green;
                    text-align: center;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <p class="success-message">Registration successful! <a href="login.php">Login</a></p>
            </div>
        </body>
        </html>';
        exit();
    } else {
        // Error: Output HTML with error message
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registration Error</title>
            <style>
                body {
                    font-family: \'Arial\', sans-serif;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background: linear-gradient(135deg, #6dd5ed, #2193b0);
                }

                .container {
                    background-color: #ffffff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                    width: 350px;
                    text-align: center;
                }

                p.error-message {
                    color: red;
                    text-align: center;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <p class="error-message">Error: ' . $conn->error . '</p>
            </div>
        </body>
        </html>';
        exit();
    }

    $stmt->close();
} else {
    // Output the form if it hasn't been submitted
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <style>
            body {
                font-family: \'Arial\', sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background: linear-gradient(135deg, #6dd5ed, #2193b0);
            }

            .container {
                background-color: #ffffff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                width: 500px;
                text-align: center;
            }

            .form-group {
                margin-bottom: 20px;
                text-align: left;
            }

            label {
                display: block;
                margin-bottom: 8px;
                color: #555;
                font-weight: 600;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            select {
                width: calc(100% - 22px);
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
                box-sizing: border-box;
                font-size: 16px;
                transition: border-color 0.3s ease;
            }

            input[type="text"]:focus,
            input[type="email"]:focus,
            input[type="password"]:focus,
            select:focus {
                border-color: #4CAF50;
                outline: none;
            }

            button {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                width: 80%;
                font-size: 16px;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color:rgb(44, 125, 169);
            }

            a {
                color: #2193b0;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            a:hover {
                color: #6dd5ed;
            }

            p {
                margin-top: 20px;
                color: #777;
            }

            @media (max-width: 480px) {
                .container {
                    width: 90%;
                    padding: 20px;
                }
            }
        </style>
    </head>
    <body style="background-image: url(https://media.istockphoto.com/id/517188688/photo/mountain-landscape.jpg?s=1024x1024&w=0&k=20&c=z8_rWaI8x4zApNEEG9DnWlGXyDIXe-OmsAyQ5fGPVV8=); background-size: cover; background-repeat: no-repeat;">

        <div class="container">
            <h2>Registration</h2>
            <form id="registrationForm" action="register.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="rollno">Roll Number:</label>
                    <input type="text" id="rollno" name="rollno" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="collegename">College Name:</label>
                    <input type="text" id="collegename" name="collegename" required>
                </div>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </body>
    </html>';
}

$conn->close();
?>