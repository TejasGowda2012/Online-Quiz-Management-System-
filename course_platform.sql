-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 10:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `email`, `password`) VALUES
(1, 'Admin1', 'admin1@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

CREATE TABLE `mcqs` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `option_a` text DEFAULT NULL,
  `option_b` text DEFAULT NULL,
  `option_c` text DEFAULT NULL,
  `option_d` text DEFAULT NULL,
  `correct_option` varchar(1) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `category`) VALUES
(1, 'What does HTML stand for?', 'Home Tool Markup Language', 'Hyperlinks Text Mark Language', 'Hyper Text Markup Language', 'Highly Text Marking Language', 'c', 'HTML'),
(2, 'Which tag is used to define an unordered list?', 'li', 'ol', 'ul', 'list', 'c', 'HTML'),
(3, 'Which tag is used to insert a line break?', 'break', 'lb', 'newline', 'br', 'd', 'HTML'),
(4, 'What is the purpose of the body tag?', 'Defines the document footer', 'Defines the document body', 'Defines the document title', 'Defines the document header', 'b', 'HTML'),
(5, 'Which tag is used to create a hyperlink?', 'link', 'a', 'url', 'hyperlink', 'b', 'HTML'),
(6, 'Which tag is used to define a table row?', 'td', 'tr', 'th', 'row', 'b', 'HTML'),
(7, 'Which tag is used to define a table data cell?', 'td', 'tr', 'th', 'cell', 'a', 'HTML'),
(8, 'Which tag is used to define a table header cell?', 'tr', 'th', 'td', 'header', 'b', 'HTML'),
(9, 'Which tag is used to embed an image?', 'picture', 'src', 'img', 'image', 'c', 'HTML'),
(10, 'What is the correct HTML for inserting a background image?', 'body style background image url image gif', 'body background image gif', 'img src background gif', 'background img image gif', 'a', 'HTML'),
(11, 'Which tag is used to define an input field?', 'textinput', 'input', 'field', 'forminput', 'b', 'HTML'),
(12, 'Which attribute specifies an alternate text for an image if the image cannot be displayed?', 'alt', 'title', 'src', 'longdesc', 'a', 'HTML'),
(13, 'Which tag is used to define a form?', 'formarea', 'input', 'form', 'formdata', 'c', 'HTML'),
(14, 'Which attribute specifies the URL of the page the link goes to?', 'src', 'href', 'link', 'url', 'b', 'HTML'),
(15, 'Which tag is used to define a paragraph?', 'p', 'paragraph', 'text', 'para', 'a', 'HTML'),
(16, 'What does CSS stand for?', 'Cascading Style Sheets', 'Creative Style Sheets', 'Computer Style Sheets', 'Colorful Style Sheets', 'a', 'CSS'),
(17, 'Which CSS property is used to change the text color?', 'font color', 'color', 'text color', 'foreground color', 'b', 'CSS'),
(18, 'Which CSS property controls the text size?', 'font style', 'text size', 'font size', 'text style', 'c', 'CSS'),
(19, 'Which CSS property is used to change the background color?', 'background color', 'color background', 'background', 'bg color', 'c', 'CSS'),
(20, 'How do you insert a comment in a CSS file?', 'this is a comment', 'this is a comment', 'this is a comment', 'this is a comment', 'a', 'CSS'),
(21, 'Which CSS property is used to add space between lines?', 'spacing', 'line height', 'line spacing', 'text spacing', 'b', 'CSS'),
(22, 'Which CSS property is used to change the font of an element?', 'font family', 'font style', 'font weight', 'font', 'a', 'CSS'),
(23, 'Which CSS property is used to make the text bold?', 'font weight bold', 'text weight bold', 'font bold', 'text bold', 'a', 'CSS'),
(24, 'Which CSS property is used to align the text?', 'text align', 'align text', 'text position', 'align', 'a', 'CSS'),
(25, 'How do you select an element with the id demo?', 'demo', 'demo', 'demo', 'demo', 'a', 'CSS'),
(26, 'How do you select all p elements inside a div element?', 'div p', 'div p', 'div p', 'div p', 'a', 'CSS'),
(27, 'Which CSS property is used to add a border?', 'border', 'border style', 'border width', 'border color', 'a', 'CSS'),
(28, 'Which CSS property is used to add space outside an element?', 'margin', 'padding', 'space', 'outside space', 'a', 'CSS'),
(29, 'Which CSS property is used to add space inside an element?', 'padding', 'margin', 'space', 'inside space', 'a', 'CSS'),
(30, 'Which CSS property is used to change the list style?', 'list style type', 'list style', 'list type', 'style list', 'a', 'CSS'),
(31, 'How do you select all p elements inside a div element?', 'div p', 'div.p', 'div>p', 'div+p', 'a', 'CSS'),
(32, 'Which CSS property is used to add a border?', 'border', 'border-style', 'border-width', 'border-color', 'a', 'CSS'),
(33, 'Which CSS property is used to add space outside an element?', 'margin', 'padding', 'space', 'outside-space', 'a', 'CSS'),
(34, 'Which CSS property is used to add space inside an element?', 'padding', 'margin', 'space', 'inside-space', 'a', 'CSS'),
(35, 'Which CSS property is used to change the list style?', 'list-style-type', 'list-style', 'list-type', 'style-list', 'a', 'CSS'),
(36, 'Which event occurs when the user clicks on an HTML element?', 'onclick', 'onchange', 'onmouseover', 'onmouseout', 'a', 'JavaScript'),
(37, 'How do you write an IF statement in JavaScript?', 'if i == 5', 'if i == 5 then', 'if i = 5 then', 'if i = 5', 'a', 'JavaScript'),
(38, 'How do you write an IF statement for executing some code if i is NOT equal to 5?', 'if i != 5', 'if i not equals 5', 'if i not equals 5', 'if i =! 5 then', 'a', 'JavaScript'),
(39, 'How does a FOR loop start?', 'for i = 0 i < 5 i++', 'for i = 0 i <= 5 i++', 'for i = 1 to 5', 'for i <= 5 i++', 'a', 'JavaScript'),
(40, 'What is the correct way to round a number to the nearest integer?', 'Math round x', 'round x', 'rnd x', 'Math rnd x', 'a', 'JavaScript'),
(41, 'Which operator is used for concatenation in JavaScript?', '+', '.', ',', '&', 'a', 'JavaScript'),
(42, 'Which method is used to remove the last element from an array?', 'pop', 'removeLast', 'deleteLast', 'last', 'a', 'JavaScript'),
(43, 'Which method is used to add new elements to the end of an array?', 'push', 'add', 'append', 'insert', 'a', 'JavaScript'),
(44, 'What is the result of 5 + 2?', '52', '7', '52', '7', 'b', 'JavaScript'),
(45, 'What type of variable can store true or false values?', 'boolean', 'str', 'float', 'bigint', 'a', 'JavaScript'),
(46, 'Which event occurs when the user clicks on an HTML element?', 'onclick', 'onchange', 'onmouseover', 'onmouseout', 'a', 'JavaScript'),
(47, 'How do you write an IF statement in JavaScript?', 'if (i == 5)', 'if i == 5 then', 'if i = 5 then', 'if i = 5', 'a', 'JavaScript'),
(48, 'How do you write an IF statement for executing some code if \"i\" is NOT equal to 5?', 'if (i != 5)', 'if i not equals 5', 'if (i not equals 5)', 'if i =! 5 then', 'a', 'JavaScript'),
(49, 'How does a FOR loop start?', 'for (i = 0; i < 5; i++)', 'for (i = 0; i <= 5; i++)', 'for i = 1 to 5', 'for (i <= 5; i++)', 'a', 'JavaScript'),
(50, 'What is the correct way to round a number to the nearest integer?', 'Math.round(x)', 'round(x)', 'rnd(x)', 'Math.rnd(x)', 'a', 'JavaScript'),
(51, 'Which operator is used for concatenation in JavaScript?', '+', '.', ',', '&', 'a', 'JavaScript'),
(52, 'Which method is used to remove the last element from an array?', 'pop()', 'removeLast()', 'deleteLast()', 'last()', 'a', 'JavaScript'),
(53, 'Which method is used to add new elements to the end of an array?', 'push()', 'add()', 'append()', 'insert()', 'a', 'JavaScript'),
(54, 'What is the result of \"5\" + 2?', '\"52\"', '7', '\"52\"', '7', 'a', 'JavaScript'),
(55, 'What type of variable can store true or false values?', 'boolean', 'string', 'number', 'array', 'a', 'JavaScript'),
(56, 'What does PHP stand for?', 'Personal Home Page', 'Private Home Page', 'PHP: Hypertext Preprocessor', 'Public Home Page', 'c', 'PHP'),
(57, 'Which symbol is used to declare a variable in PHP?', '$', '#', '@', '&', 'a', 'PHP'),
(58, 'Which function is used to output text in PHP?', 'echo', 'print', 'write', 'output', 'a', 'PHP'),
(59, 'Which of the following is a PHP superglobal?', '$_GET', '$_POST', '$_SESSION', 'All of the above', 'd', 'PHP'),
(60, 'Which function is used to include a file in PHP?', 'include()', 'require()', 'Both include() and require()', 'None of the above', 'c', 'PHP'),
(61, 'Which function is used to start a session in PHP?', 'session_start()', 'session_begin()', 'session_init()', 'session_open()', 'a', 'PHP'),
(62, 'Which function is used to end a session in PHP?', 'session_destroy()', 'session_end()', 'session_close()', 'session_stop()', 'a', 'PHP'),
(63, 'Which function is used to connect to a MySQL database in PHP?', 'mysql_connect()', 'mysqli_connect()', 'pdo_connect()', 'db_connect()', 'b', 'PHP'),
(64, 'Which function is used to fetch a result row as an associative array in PHP?', 'mysql_fetch_assoc()', 'mysqli_fetch_assoc()', 'pdo_fetch_assoc()', 'db_fetch_assoc()', 'b', 'PHP'),
(65, 'Which function is used to get the length of a string in PHP?', 'strlen()', 'strlength()', 'string_length()', 'length()', 'a', 'PHP'),
(66, 'Which function is used to convert a string to lowercase in PHP?', 'strtolower()', 'strlower()', 'stringtolower()', 'tolower()', 'a', 'PHP'),
(67, 'Which function is used to convert a string to uppercase in PHP?', 'strtoupper()', 'strupper()', 'stringtoupper()', 'toupper()', 'a', 'PHP'),
(68, 'Which function is used to replace a substring in PHP?', 'str_replace()', 'substr_replace()', 'string_replace()', 'replace()', 'a', 'PHP'),
(69, 'Which function is used to split a string by a delimiter in PHP?', 'explode()', 'split()', 'str_split()', 'string_split()', 'a', 'PHP'),
(70, 'Which function is used to join array elements into a string in PHP?', 'implode()', 'join()', 'array_join()', 'array_implode()', 'a', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `set_number` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `result_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rollno` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `collegename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mcqs`
--
ALTER TABLE `mcqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
