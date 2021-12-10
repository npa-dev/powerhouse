-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 09:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `powerhouse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Username` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `DID` int(11) NOT NULL,
  `DOV` date NOT NULL,
  `mode` varchar(15) NOT NULL,
  `time` time NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `name`, `gender`, `years_of_experience`, `tel`, `email`) VALUES
(1, 'Colin Abrams', 'male', 4, '0243567895', 'colinabrams@gmail.com'),
(2, 'Sarah Appiah', 'female', 5, '0245667805', 'sarahappiah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availability`
--

CREATE TABLE `doctor_availability` (
  `did` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_availability`
--

INSERT INTO `doctor_availability` (`did`, `day`, `starttime`, `endtime`) VALUES
(1, 'Monday', '09:00:00', '15:00:00'),
(1, 'Monday', '08:00:00', '15:00:00'),
(1, 'Wednesday', '09:00:00', '15:00:00'),
(1, 'Thursday', '09:00:00', '16:00:00'),
(1, 'Friday', '10:00:00', '18:00:00'),
(2, 'Monday', '08:00:00', '18:00:00'),
(2, 'Tuesday', '08:00:00', '18:00:00'),
(2, 'Wednesday', '08:00:00', '17:00:00'),
(2, 'Thursday', '10:00:00', '18:00:00'),
(2, 'Friday', '08:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`) VALUES
(5, 'PTSD', 'Hi there. I served in the army for some time. I can tell you, mine was a really brutal experience. I lost both limbs and an arm during a bomb attack, and my life was never the same since then. I have been in therapy with powerhouse for 5 years now, and I am beginning to feel more and more like myself each day.', '2021-12-10 01:14:52'),
(6, 'Dealing with the loss of a dear one', 'Hi guys. I lost someone really dear to me last summer, and it felt like my world was going to come to an end. \r\nShe has been my rock for so many years, and it has been so tough moving on without her.', '2021-12-10 18:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `First_name`, `Last_name`, `email`, `password`) VALUES
(51, 'precious', 'Njeck', 'precious.njeck@ashesi.edu.gh', '6f0e0bed7e9f0bb75711b1d3731728ea'),
(52, 'Oliver', 'Ngong', 'Oliver.ngong@ashesi.edu.gh', '9afb3a59b3f874c893faf179163459e6'),
(53, 'Caleb', 'Gb', 'precious.njeck@ashesi.edu.gh', 'e123b76b6f7ba22a338c16e0091a195f'),
(54, 'Pamela', 'Niyongere', 'pamela.niyongere@ashesi.edu.gh', '99a575522624bbcb12cc2405f083e0d8'),
(55, 'prenahosih', 'hflws', 'oliver.ngong@ashesi.edu.gh', '59d37218148feecec160bb468efc781f'),
(56, 'pamela', 'Niyongere2', 'pamela.niyon@ashesi.edu.gh', '59d37218148feecec160bb468efc781f'),
(57, 'Oliver', 'Chiambah', 'oliver.chiambah@ashesi.edu.gh', '0cef1fb10f60529028a71f58e54ed07b'),
(58, 'caleb', 'Yaw', 'caleb.yaw@ashesi.edu.gh', '06c2982539fb45bf7cf731584bca0896'),
(59, 'jane', 'victory', 'fjanevic@ashesi.edu.gh', 'd440d36c4f9e6187d6e63d3510a16a4e'),
(60, 'Anne', 'Marie', 'annemarie@ashesi.edu.gh', '6f0e0bed7e9f0bb75711b1d3731728ea'),
(61, 'James', 'Corden', 'jamescorden@gmail', '22f686be7642c05602a2f6b0deeb3743'),
(62, 'James', 'Corden', 'j.p', '6f0e0bed7e9f0bb75711b1d3731728ea'),
(63, 'precious', 'Njeck', 'pre@yahoo.com', '6f0e0bed7e9f0bb75711b1d3731728ea'),
(64, 'Precious', 'Njeck', 'preciousabeck@gmail.com', '6f0e0bed7e9f0bb75711b1d3731728ea'),
(65, 'Precious', 'Njeck', 'preciou@gmail.com', '6f0e0bed7e9f0bb75711b1d3731728ea'),
(66, 'Precious', 'Njeck', 'precious@gmail.com', '6f0e0bed7e9f0bb75711b1d3731728ea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
