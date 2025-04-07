-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 05:39 PM
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
-- Database: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `appointment_date`, `status`) VALUES
(10, 2, '2025-04-24 00:00:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `billing_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `patient_name`, `service`, `cost`, `billing_date`) VALUES
(1, '123', 'dd', 132.00, '2025-04-07 01:57:56'),
(2, 'Shantel Stacy', 'Treatment', 300.00, '2025-04-07 16:38:28'),
(3, 'Lewis Jade', 'Treatment', 500.00, '2025-04-07 16:39:52'),
(4, 'John runmila', 'Treatment', 400.00, '2025-04-07 16:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `dispensed`
--

CREATE TABLE `dispensed` (
  `dispense_id` int(11) NOT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `med_name` varchar(100) DEFAULT NULL,
  `quantity_dispensed` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `dispensed_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispensed`
--

INSERT INTO `dispensed` (`dispense_id`, `patient_name`, `med_name`, `quantity_dispensed`, `total_price`, `dispensed_date`) VALUES
(1, 'Lewis Jade', 'choclata medicinos', 1, 0.02, '2025-04-07 13:12:41'),
(2, 'Shantel Stacy', 'choclata medicinos', 1, 0.02, '2025-04-07 13:16:19'),
(3, 'John runmila', 'paracetamol', 3, 135.00, '2025-04-07 17:05:28'),
(4, 'Lewis Jade', 'Amoxil', 2, 20.00, '2025-04-07 17:09:04'),
(5, 'Shantel Stacy', 'Amoxil', 2, 20.00, '2025-04-07 17:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctors_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctors_id`, `firstname`, `lastname`, `specialty`, `contact`, `email`, `password`, `created_at`) VALUES
(1, 'Lewis', 'mudaida', 'Neuro sugion', '0796319394', 'mudaidalewis@gmail.com', '$2y$10$7l3sZSgn44/iDls/Ah6C8.xvfl.SJf8WxK4Al3Kneblyzaui.OTWS', '2025-04-03 18:38:50'),
(2, 'Joy', 'Tracy', 'Nurse', '0711432501', 'joytracy@gmail.com', '$2y$10$XfnLORdLFpZ2/W08b8rtf.BSS4TcfSGvSHHLepjGRn1a5GCqPTFpi', '2025-04-03 18:46:32'),
(3, 'Beldine', 'Reina', 'Nurse', '074252', 'belle@gmail.com', '$2y$10$04CISJikGdareD1u7/hJ/.UyhOvAlwcbMZcvE.Cy2vaaEApM3yve2', '2025-04-04 10:18:40'),
(4, 'Linet', 'Joe', 'Nurse', '074853', 'joe@gmail.com', '$2y$10$/WO0M4CV/xILfuSygeF6z.k3MvRrjODZ9xgjoBu3lXX9BhivcmR82', '2025-04-04 11:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `med_id` int(11) NOT NULL,
  `med_name` varchar(100) DEFAULT NULL,
  `med_type` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`med_id`, `med_name`, `med_type`, `quantity`, `unit_price`, `expiry_date`) VALUES
(1, 'choclata medicinos', 'Teab', 0, 0.02, '2025-04-02'),
(2, 'Amoxil', 'tablet', 0, 10.00, '2025-04-18'),
(3, 'paracetamol', 'tablet', 1, 45.00, '2025-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patientid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientid`, `firstname`, `lastname`, `contact`, `email`, `gender`, `created_at`) VALUES
(2, 'Lewis', 'Jade', '0736231726', 'lewis@gmail.com', 'Male', '2025-04-04 11:25:39'),
(10, 'Gilbert', 'Ombalo', '0736231726', 'john@gmail.com', 'Male', '2025-04-07 15:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `dispensed`
--
ALTER TABLE `dispensed`
  ADD PRIMARY KEY (`dispense_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctors_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dispensed`
--
ALTER TABLE `dispensed`
  MODIFY `dispense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patientid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
