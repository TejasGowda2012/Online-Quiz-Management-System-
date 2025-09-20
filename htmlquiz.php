<?php
session_start(); // Start the session
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course_platform";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select a random set number from 1 to 3
$setNumber = rand(1, 3);

// Define the question ranges for each set
$setRanges = [
    1 => [1, 5],
    2 => [6, 10],
    3 => [11, 15]
];

$range = $setRanges[$setNumber];
$sql = "SELECT * FROM mcqs WHERE category = 'HTML' AND id BETWEEN " . $range[0] . " AND " . $range[1];
$result = $conn->query($sql);

$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>HTML Quiz (Set <?php echo $setNumber; ?>)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    #time {
    color: white; /* Change 'red' to any color you want */
}

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            position: relative; /* To position the timer and button */
        }

        p {
            margin-bottom: 15px;
            font-size: 18px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 8px;
        }

        /* Timer and Submit Button Styles */
        #timer {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        #timer i {
            margin-right: 8px;
            font-size: 24px;
        }

        input[type="submit"] {
            position: absolute;
            bottom: 20px; /* Position below the timer */
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body  style="background-image: url('https://t4.ftcdn.net/jpg/06/91/05/19/360_F_691051962_GFhQPOAXABmf7l706q89b2PFh6FnB1kI.jpg'); background-size: cover; background-repeat: no-repeat;">
    <h1>HTML Quiz (Set <?php echo $setNumber; ?>)</h1>
    <form id="quizForm" method="post" action="process_html_quiz.php">
        <input type="hidden" name="setNumber" value="<?php echo $setNumber; ?>">
        <?php foreach ($questions as $question): ?>
            <p><?php echo $question['question']; ?></p>
            <input type="radio" name="answer_<?php echo $question['id']; ?>" value="a"> <?php echo $question['option_a']; ?><br>
            <input type="radio" name="answer_<?php echo $question['id']; ?>" value="b"> <?php echo $question['option_b']; ?><br>
            <input type="radio" name="answer_<?php echo $question['id']; ?>" value="c"> <?php echo $question['option_c']; ?><br>
            <input type="radio" name="answer_<?php echo $question['id']; ?>" value="d"> <?php echo $question['option_d']; ?><br>
        <?php endforeach; ?>
        <input type="submit" value="Submit">
    </form>
    <div id="timer"><i class="fas fa-clock"></i><span id="time">2:00</span></div>
    <script>
        let timeLeft = 300; // 5 minutes in seconds
        const timerDisplay = document.getElementById('time');
        const quizForm = document.getElementById('quizForm');

        // Record the start time
        let startTime = Date.now();

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            timerDisplay.textContent = minutes + ':' + seconds;

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                addTimeTakenInput();
                quizForm.submit(); // Submit the form when time is up
            }
            timeLeft--;
        }

        function addTimeTakenInput() {
            // Calculate the time taken
            let endTime = Date.now();
            let timeTaken = (endTime - startTime) / 1000;

            // Create a hidden input field to store the time taken
            let timeTakenInput = document.createElement('input');
            timeTakenInput.type = 'hidden';
            timeTakenInput.name = 'timeTaken';
            timeTakenInput.value = timeTaken;
            quizForm.appendChild(timeTakenInput);
        }

        updateTimer(); // Initial call to display the timer
        const timerInterval = setInterval(updateTimer, 1000); // Update every second

        // Handle form submission
        quizForm.addEventListener('submit', function(event) {
            if (timeLeft > 0) {
                clearInterval(timerInterval); // Stop the timer
                addTimeTakenInput();
            } else {
                event.preventDefault(); // Prevent submission after time is up
            }
        });
    </script>
</body>
</html>