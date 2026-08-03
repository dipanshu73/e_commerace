-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2026 at 12:45 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', '2026-07-17 06:17:59'),
(2, 'Adhikari', 'adhikari@gmail.com', '2005', '2026-07-17 11:15:48'),
(3, 'Diya Adhikari', 'diya@gmail.com', '005', '2026-07-17 11:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text,
  `course_id` int(11) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `applied_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `student_name`, `father_name`, `mother_name`, `email`, `phone`, `gender`, `dob`, `address`, `course_id`, `qualification`, `status`, `applied_at`) VALUES
(1, 'mahi', 'madhan singh', 'mahima devi', 'mahi23@gamil.com', '6395564408', 'Female', '2026-07-18', 'tanakpur', 1, '12th', 'Rejected', '2026-07-18 06:53:05'),
(2, 'mahima', 'madhan singh', 'mohini devi', 'mohini23@gmail.com', '8798789668', 'Female', '2005-06-17', 'chamapwat', 1, '12th', 'Rejected', '2026-07-18 06:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Diya', 'diya@gmail.com', 'Admission Query', 'CSE course ki fees ke baare me jankari chahiye', '2026-07-17 07:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_year_fee` decimal(10,2) DEFAULT NULL,
  `second_year_fee` decimal(10,2) DEFAULT NULL,
  `third_year_fee` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `duration`, `fees`, `description`, `created_at`, `first_year_fee`, `second_year_fee`, `third_year_fee`) VALUES
(1, 'Computer Science Engineering (CSE)', '3 Years', '12000.00', 'First Year: ₹12,000\r\nSecond Year: ₹12,800\r\nThird Year: ₹12,500', '2026-07-17 06:43:20', NULL, NULL, NULL),
(2, 'Civil Engineering', '3 Years', '12000.00', 'First Year: ₹12,000\r\nSecond Year: ₹12,800\r\nThird Year: ₹12,500', '2026-07-17 06:43:20', NULL, NULL, NULL),
(3, 'Computer Science Engineering (CSE)', '3 Years', NULL, 'Diploma in Computer Science Engineering', '2026-07-17 06:44:23', '12000.00', '12800.00', '12500.00'),
(4, 'Civil Engineering', '3 Years', NULL, 'Diploma in Civil Engineering', '2026-07-17 06:44:23', '12000.00', '12800.00', '12500.00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_name`, `department`, `qualification`, `experience`, `email`, `phone`, `image`, `created_at`) VALUES
(1, 'Mr. K.K. Srivastav', 'Main Administration', 'Principal', '20+ Years', NULL, NULL, 'kk_srivastav.jpeg', '2026-07-18 05:29:10'),
(2, 'Mr. Vijay Singh Negi', 'Basic Sciences', 'M.Sc. Physics', '15 Years', NULL, NULL, 'vijay_negi.jpeg', '2026-07-18 05:29:10'),
(3, 'Mrs. Bhawana Verma', 'Basic Sciences', 'M.Sc. Chemistry', '10 Years', NULL, NULL, 'bhawana_verma.jpg', '2026-07-18 05:29:10'),
(4, 'Mr. Shailendra Kumar', 'Basic Sciences', 'M.Sc. Physics', '12 Years', NULL, NULL, 'shailendra_kumar.jpg', '2026-07-18 05:29:10'),
(5, 'Mrs. Richa Khakwal', 'Basic Sciences', 'M.Sc. Mathematics', '8 Years', NULL, NULL, 'richa_khakwal.jpg', '2026-07-18 05:29:10'),
(6, 'Mr. Virendra Singh Taragi', 'Civil Engineering', 'M.Tech Civil', '14 Years', NULL, NULL, 'virendra_taragi.jpg', '2026-07-18 05:29:10'),
(7, 'Mr. Jitendra Parsad', 'Computer Science & Engineering', 'Ph.D. CSE', '18 Years', NULL, NULL, 'jitendra_parsad.jpeg', '2026-07-18 05:29:10'),
(8, 'Mrs. Bhawana Bisht', 'Computer Science & Engineering', 'M.Tech CSE', '9 Years', NULL, NULL, 'bhawana_bisht.jpeg', '2026-07-18 05:29:10'),
(9, 'Mrs. Anita', 'Computer Science & Engineering', 'M.Tech CSE', '7 Years', NULL, NULL, 'anita.jpeg', '2026-07-18 05:29:10'),
(10, 'Mrs. Dinesh Saxena', 'Computer Science & Engineering', 'Lecturer CSE (Second Year)', '6 Years', NULL, NULL, 'dinesh_saxena.jpg', '2026-07-18 05:29:10'),
(11, 'Mrs. Gunjan Joshi', 'Administration', 'Assistant Accountant', '10 Years', NULL, NULL, 'gunjan_joshi.jpg', '2026-07-18 05:29:10'),
(12, 'Mr. Ankit Kumar', 'Workshop', 'Workshop Instructor', '5 Years', NULL, NULL, 'ankit_kumar.jpg', '2026-07-18 05:29:10'),
(13, 'Mr. Prem Prakash Joshi', 'Library', 'Librarian', '12 Years', NULL, NULL, 'prem_joshi.jpeg', '2026-07-18 05:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_title` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_title`, `image`, `uploaded_at`) VALUES
(1, 'College Building', 'building.jpeg', '2026-07-17 06:52:05'),
(2, 'Computer Lab', 'lab.jpg', '2026-07-17 06:52:05'),
(3, 'Civil Engineering Lab', 'civil_lab.jpeg', '2026-07-17 06:52:05'),
(4, 'Library', 'library.jpg', '2026-07-17 06:52:05'),
(5, 'Sports Day', 'img-3.jpeg', '2026-07-17 06:52:05'),
(6, 'Annual Function', 'annual_function.jpeg', '2026-07-17 06:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `publish_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `publish_date`, `created_at`) VALUES
(1, 'Admission Open 2026', 'Admissions are now open for Computer Science Engineering and Civil Engineering Diploma courses.', '2026-07-17', '2026-07-17 06:49:43'),
(2, 'Semester Examination', 'The semester examinations will begin from 15 August 2026.', '2026-08-15', '2026-07-17 06:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `enrollment_no` int(11) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `address` text,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `enrollment_no`, `full_name`, `email`, `phone`, `gender`, `dob`, `course_id`, `address`, `password`, `created_at`) VALUES
(1, 1234, 'Ritika Ritika', 'rr3635449@gmail.com', '8798789668', 'Female', NULL, NULL, NULL, '123456', '2026-07-18 09:46:58'),
(2, 2, 'priya', 'priya12@gmail.com', '9012458990', 'Female', NULL, NULL, NULL, '1234567', '2026-07-18 10:06:01'),
(3, 3, 'shivani', 'shivni12@gmail.com', '8923449012', 'Female', NULL, NULL, NULL, '$2y$10$vn8PdiNpYxpZ1F9tzq89Fu7hKD8hHBY0vfPn7Kw7Gv/YuHhduJn0e', '2026-07-20 05:04:54'),
(12, 4, 'ridhima', 'ridh@gmail.com', '9785526189', 'Female', NULL, NULL, NULL, '$2y$10$WpHppgOhyrG1AUoqky6TA.BdHwkCRd2FpmO1eEVqySxFC/GNkWM8a', '2026-07-20 05:19:28'),
(15, 5, 'Abhimanyu', 'Abhimanyu@gmail.com', '9025678541', 'Male', NULL, NULL, NULL, '$2y$10$iVR.JO2fjZS0OLXFdFT2aOJVMzEuSDw2mLXJ5a6gqXGj6xFzXuAJO', '2026-07-20 05:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'diya', 'diya567@gmail.com', 'diya567', 'student'),
(2, 'diya1', 'diya56@gmail.com', 'diya567', 'student'),
(3, 'Admin', 'admin@example.com', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admission_course` (`course_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `enrollment_no_2` (`enrollment_no`),
  ADD KEY `fk_student_course` (`course_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admissions`
--
ALTER TABLE `admissions`
  ADD CONSTRAINT `fk_admission_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_student_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
