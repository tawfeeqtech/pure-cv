-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 01:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hours` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `institution` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `hours`, `start_date`, `end_date`, `institution`, `url`, `notes`) VALUES
(1, 'PHP', 120, '2023-05-01', '2023-05-15', 'Al-Azher', '91bf2e1a652b.jpg', 'Aenean aliquet, tor quam.'),
(2, 'android', 130, '2023-05-01', '2023-05-15', 'IUG', '91bf2e1a652b.jpg', 'Proin quis convallis lectus. Nam non neque sit amet metus imperdiet pellentesque sollicitudin at leo.');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hours` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `institution` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `name`, `hours`, `start_date`, `end_date`, `institution`, `notes`, `course_id`) VALUES
(1, 'Web Development', 120, '2023-05-01', '2023-05-15', 'Al-Azher', 'Aenean aliquet, massa ut rhoncus lobortis, nisl mi hendrerit justo, quis sodales risus erat tincidunt ipsum.', 1),
(2, 'Mobile Development', 130, '2023-05-01', '2023-05-15', 'Al-Azher', 'Proin quis convallis lectus. Nam non neque sit amet metus imperdiet pellentesque sollicitudin at leo. Proin vehicula maximus justo at efficitur. Curabitur quam lorem, scelerisque eu tortor eget, mollis auctor quam.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `full_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `country` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `years_experience` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `img` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `gender`, `birth_date`, `country`, `city`, `job_title`, `years_experience`, `img`) VALUES
(1, 'ahmed mohammed', 'male', '2000-05-01', 'Palestine', 'Gaza', 'Software Engineering', '3', '5c5baf40ff51.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
