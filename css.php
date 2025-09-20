<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Mastery Course</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            background: linear-gradient(135deg, #a8c0ff,rgb(105, 82, 187));
            min-height: 100vh;
            color: #fff;
        }

        .header {
            width: 100%;
            text-align: center;
            padding: 40px 0;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.8em;
            margin: 0;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto 30px;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .video-grid iframe {
            width: 100%;
            height: 250px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .video-grid iframe:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .quiz-section {
            text-align: center;
        }

        .quiz-button {
            display: inline-block;
            padding: 15px 35px;
            background: linear-gradient(135deg, #66bb6a, #43a047);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .quiz-button:hover {
            background: linear-gradient(135deg, #43a047, #66bb6a);
            transform: scale(1.05);
        }

        .footer {
            width: 100%;
            text-align: center;
            padding: 20px 0;
            background: rgba(0, 0, 0, 0.2);
            color: #ccc;
            font-size: 0.9em;
        }
    </style>
</head>
<body style="background-image: url('https://t4.ftcdn.net/jpg/06/91/05/19/360_F_691051962_GFhQPOAXABmf7l706q89b2PFh6FnB1kI.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="header">
        <h1>CSS Mastery Course</h1>
    </div>
    <div class="container">
        <div class="video-grid">
            <iframe src="https://www.youtube.com/embed/yfoY53QXEnI" title="CSS Crash Course For Absolute Beginners"></iframe>
            <iframe src="https://www.youtube.com/embed/1Rs2ND1ryYc" title="CSS Tutorial - Zero to Hero (Complete Course)"></iframe>
            <iframe src="https://www.youtube.com/embed/Edsxf_NBFrw" title="Learn CSS in 20 Minutes"></iframe>
            <iframe src="https://www.youtube.com/embed/ieTHC78giGQ" title="CSS Grid Layout Crash Course"></iframe>
        </div>
        <div class="quiz-section">
            <a href="cssquiz.php" class="quiz-button">Test Your Knowledge: Start Quiz</a>
        </div>
    </div>
    <div class="footer">
        © <?php echo date("Y"); ?> CSS Mastery. All rights reserved.
    </div>
</body>
</html>