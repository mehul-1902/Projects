-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 07:23 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27280881_coder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'coderfun@admin.com', 'coderfun'),
(2, 'coderfun@admin.com', 'coderfun');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'hello', 'hello@gmail.com', '5d41402abc4b2a76b9719d911017c592'),
(5, 'xyz', 'xyz@gmail.com', 'd16fb36f0911f878998c136191af705e'),
(6, 'sid', 'sidshukla2016@gmail.com', '9976913e69a33008756c18e7da9b27cf'),
(7, 'Nitesh', 'niteshchaubey9565@gmail.com', '131903ee15fdbb0209ead53be278b048'),
(8, 'man', 'man@gmail.com', '39c63ddb96a31b9610cd976b896ad4f0'),
(9, 'Hardik', 'hardikrathod1491@gmail.com', 'aca968c94763354bee8b6b236cd56fce');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `user_id` int(10) NOT NULL,
  `ques_id` int(20) NOT NULL,
  `ans_id` int(20) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_file`
--

CREATE TABLE `user_file` (
  `user_id` int(10) NOT NULL,
  `file_id` int(20) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_file`
--

INSERT INTO `user_file` (`user_id`, `file_id`, `file_name`, `date`) VALUES
(1, 3, 'frst', '0000-00-00'),
(8, 8, 'add.java', '2021-03-13'),
(8, 9, 'Evenodd.java', '2021-03-13'),
(8, 10, 'Pr6.java', '2021-03-14'),
(8, 11, 'Pr11.java', '2021-03-14'),
(7, 12, 'TEST.java', '2021-03-14'),
(7, 13, 'Reverseint.java', '2021-03-14'),
(8, 14, 'Num2chr.java', '2021-03-14'),
(8, 15, 'Pr12.java', '2021-03-14'),
(8, 16, 'Sumcmd.java', '2021-03-14'),
(8, 17, 'Reverseint.java', '2021-03-14'),
(8, 18, 'Reverseint.java', '2021-03-14'),
(8, 19, 'Pr8_2.java', '2021-03-14'),
(8, 20, 'Pr8_2.java', '2021-03-14'),
(8, 21, 'Timepass.java', '2021-03-18'),
(9, 22, 'pr7.java', '2021-03-20'),
(9, 23, 'pr8_applt.java', '2021-03-20'),
(9, 24, 'pr8_applt.java', '2021-03-20'),
(9, 25, 'pr8_frame.java', '2021-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `user_question`
--

CREATE TABLE `user_question` (
  `user_id` int(10) NOT NULL,
  `ques_id` int(20) NOT NULL,
  `question` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_question`
--

INSERT INTO `user_question` (`user_id`, `ques_id`, `question`, `date`) VALUES
(1, 1, 'I have doubt in PHP?', '2021-03-22'),
(1, 2, 'HELLOO ***', '2021-03-22'),
(1, 3, 'Hello ***', '2021-03-22'),
(1, 4, '***o ***', '2021-03-22'),
(1, 6, 'Hello ***', '2021-03-22'),
(1, 7, '***', '2021-03-22'),
(1, 8, 'I have no idea in PHP', '2021-03-22'),
(1, 9, 'Hello Guys', '2021-03-23'),
(1, 10, 'i have a doubt ***', '2021-03-23'),
(1, 11, 'Hello ***', '2021-03-23'),
(1, 12, '***o bro dont be ***', '2021-03-23'),
(1, 13, 'I have doubt in java', '2021-03-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD KEY `question_uid_fk` (`user_id`),
  ADD KEY `question_qid_fk` (`ques_id`);

--
-- Indexes for table `user_file`
--
ALTER TABLE `user_file`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `user_question`
--
ALTER TABLE `user_question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `u_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_file`
--
ALTER TABLE `user_file`
  MODIFY `file_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_question`
--
ALTER TABLE `user_question`
  MODIFY `ques_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD CONSTRAINT `user_answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_question` (`user_id`),
  ADD CONSTRAINT `user_answer_ibfk_2` FOREIGN KEY (`ques_id`) REFERENCES `user_question` (`ques_id`);

--
-- Constraints for table `user_file`
--
ALTER TABLE `user_file`
  ADD CONSTRAINT `user_file_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_question`
--
ALTER TABLE `user_question`
  ADD CONSTRAINT `user_question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
