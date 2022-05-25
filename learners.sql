-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 04:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learners`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `a_id` int(11) NOT NULL,
  `correct_ans` tinyint(1) NOT NULL DEFAULT 0,
  `choice` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`a_id`, `correct_ans`, `choice`, `qid`) VALUES
(1, 0, 'Steve Jobs', 1),
(2, 0, 'James Gosling', 1),
(3, 1, 'Dennis Ritchie', 1),
(4, 0, 'Rasmus Lerdorf', 1),
(5, 0, ' int number;', 2),
(6, 0, 'float rate;', 2),
(7, 0, 'int variable_count;', 2),
(8, 1, 'int $main;', 2),
(9, 1, 'Hypertext Preprocessor', 3),
(10, 0, 'Pretext Hypertext Preprocessor', 3),
(11, 0, 'Personal Home Processor', 3),
(12, 0, 'None of the above', 3),
(13, 0, 'Dennis Ritchie', 4),
(14, 0, 'Ken Thompson', 4),
(15, 0, 'Brian Kernighan', 4),
(16, 1, 'Bjarne Stroustrup', 4),
(17, 1, 'volatile', 5),
(18, 0, 'true', 5),
(19, 0, 'friend', 5),
(20, 0, 'export', 5),
(21, 0, 'The basic data type of C', 6),
(22, 0, 'Qualifier', 6),
(23, 1, ' Short is the qualifier and int is the basic data type', 6),
(24, 0, ' All of the mentioned', 6),
(25, 1, 'String str;', 7),
(26, 0, 'char *str;', 7),
(27, 0, 'float str = 3e2;', 7),
(28, 0, 'Both String str; & float str = 3e2;', 7),
(29, 0, 'Drek Kolkevi', 8),
(30, 0, 'List Barely', 8),
(31, 1, 'Rasmus Lerdrof', 8),
(32, 0, 'None of the above', 8),
(33, 1, 'Preprocessor directive', 9),
(35, 0, 'Inclusion directive', 9),
(37, 0, 'File inclusion directive', 9),
(39, 0, 'None of the mentioned', 9),
(41, 0, 'Left-right', 11),
(42, 0, 'Left-right', 12),
(43, 0, 'Right-left', 11),
(44, 0, 'Right-left', 12),
(45, 1, 'Bottom-up', 11),
(46, 1, 'Bottom-up', 12),
(47, 0, ' Top-down', 11),
(48, 0, ' Top-down', 12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `course_category` varchar(255) NOT NULL,
  `category_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `course_category`, `category_img`) VALUES
(1, 'Programming Language', ''),
(2, 'Web Development', ''),
(3, 'Computer Fundamental', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_description` text NOT NULL,
  `course_img` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `duration` text NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_description`, `course_img`, `category_id`, `duration`, `status`, `created`) VALUES
(1, 'C', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system.', '../images/accounting.jpg', 1, '14days', 'active', '2021-12-29 21:18:25'),
(2, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup ', '../images/business.jpg', 1, '8 days', 'active', '2021-12-29 21:19:38'),
(3, 'PHP', 'PHP is a general-purpose scripting language', '../images/', 2, '7days', 'active', '2021-12-29 21:23:16'),
(4, 'HTML', 'The HyperText Markup Language, or HTML is the standard markup language', '../images/accounting.jpg', 2, '7days', 'active', '2022-01-09 21:16:27'),
(5, 'JAVA', 'Java is a high-level, class-based, object-oriented programming language', '../images/it.png', 1, '3 months', 'active', '2022-01-10 01:00:23'),
(6, 'ffd', 'fsdfs', '../images/digital-art.jpg', 2, '14days', 'active', '2022-04-04 01:24:48'),
(7, 'w', 'C is mid level language', '../images/it.png', 1, '7days', 'active', '2022-04-04 01:32:44'),
(8, 'edg', 'rrtre', '../images/bg-01.jpg', 1, '14days', 'active', '2022-04-04 01:47:31'),
(9, 'ggt', 'gedgdg', '../images/background-2.jpg', 2, '6days', 'active', '2022-04-04 01:51:59'),
(10, 'ss', 'ssf', '../images/bg-01.jpg', 1, '3 months', 'active', '2022-04-04 01:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_note` text NOT NULL,
  `lesson_desc` text NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_note`, `lesson_desc`, `course_id`) VALUES
(1, 'C++ Introduction', '../notes/C++.pdf', 'C++ is a popular programming language.  C++ is used to create computer programs', 2),
(2, 'C - Basic Syntax', '../notes/C.pdf', 'You have seen the basic structure of a C program, so it will be easy to understand other basic building blocks of the C programming language', 1),
(3, 'C - Data Types', '../notes/C.pdf', 'Data types in c refer to an extensive system used for declaring variables or functions of different types. The type of a variable determines how much space it occupies in storage and how the bit pattern stored is interpreted.', 1),
(4, 'C - Variables', 'A variable is nothing but a name given to a storage area that our programs can manipulate. Each variable in C has a specific type, which determines the size and layout of the variable\'s memory;', '', 1),
(5, 'C - Operators', 'An operator is a symbol that tells the compiler to perform specific mathematical or logical functions. ', '', 1),
(6, 'C - Loop', '../notes/C.pdf', 'A loop statement allows us to execute a statement or group of statements multiple times.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question_number`, `course_id`, `question`) VALUES
(1, 1, 1, 'Who is the father of C language?'),
(2, 2, 1, 'Which of the following is not a valid C variable name?'),
(3, 1, 3, 'PHP stands for -'),
(4, 1, 2, ' Who invented C++?'),
(5, 3, 1, 'Which of the following cannot be a variable name in C?'),
(6, 4, 1, 'What is short int in C programming?'),
(7, 5, 1, ' Which of the following declaration is not supported by C language?'),
(8, 2, 3, 'Who is known as the father of PHP?'),
(9, 6, 1, ' What is #include <stdio.h>?'),
(11, 2, 2, 'Which of the following approach is used by C++?'),
(12, 2, 2, 'Which of the following approach is used by C++?');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `qid` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `correct_ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `user_email` varchar(55) NOT NULL,
  `user_password` varchar(55) NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_name`, `user_email`, `user_password`, `status`, `timestamp`) VALUES
(9, 'xyz', 'xyz@xyz.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', '2021-10-31 00:37:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
