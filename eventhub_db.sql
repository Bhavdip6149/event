-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2025 at 04:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EventHub_db'
--
CREATE DATABASE IF NOT EXISTS `EventHub_db`;
USE `EventHub_db`;
-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  id int(11) NOT NULL,
  event_type varchar(50) DEFAULT NULL,
  service_choice varchar(50) DEFAULT NULL,
  client_name varchar(100) NOT NULL,
  client_email varchar(100) DEFAULT NULL,
  client_phone varchar(20) DEFAULT NULL,
  event_date date DEFAULT NULL,
  booking_date timestamp NOT NULL DEFAULT current_timestamp(),
  user_id int(11) DEFAULT NULL,
  status varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO bookings (id, event_type, service_choice, client_name, client_email, client_phone, event_date, booking_date, user_id, status) VALUES
(4, 'wedding', 'Balloon decor', 'patel saumil', 'patelsaumil25688@gmail.com', '94267299444', '1111-11-11', '2025-10-06 14:30:54', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  id int(11) NOT NULL,
  name varchar(100) NOT NULL,
  email varchar(100) DEFAULT NULL,
  phone varchar(20) DEFAULT NULL,
  city varchar(50) DEFAULT NULL,
  fb_date date DEFAULT NULL,
  fb_type varchar(20) DEFAULT NULL,
  comments text DEFAULT NULL,
  submission_time timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO feedback (id, name, email, phone, city, fb_date, fb_type, comments, submission_time) VALUES
(2, 'patel saumil', 'patelsaumil25688@gmail.com', 'fksjfksjk', 'hmt', '1111-11-11', '', 'saumil chu', '2025-10-06 18:02:07'),
(3, 'patel saumil', 'patelsaumil25688@gmail.com', 'fksjfksjk', 'hmt', '1111-11-11', 'Comments', 'saumil chu', '2025-10-06 18:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  id int(11) NOT NULL,
  fullname varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password_hash varchar(255) NOT NULL,
  reg_date timestamp NOT NULL DEFAULT current_timestamp(),
  is_admin tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO users (id, fullname, email, password_hash, reg_date, is_admin) VALUES
(13, 'Test Admin', 'testadmin@example.com', 'dummyhash', '2025-10-06 17:44:39', 1),
(15, 'saumil', 'patelsaumil25688@gmail.com', '$2y$10$L2TOfauTfmFEf2ut8CervOXH0eSjBTG1rOTf4XwbNSGvIikh.wq5e', '2025-10-06 18:00:21', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE bookings
  ADD PRIMARY KEY (id);

--
-- Indexes for table `feedback`
--
ALTER TABLE feedback
  ADD PRIMARY KEY (id);

--
-- Indexes for table `users`
--
ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY email (email);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE bookings
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE feedback
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
