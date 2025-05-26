-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 03:49 PM
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
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `JobRef` varchar(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Suburb` varchar(50) NOT NULL,
  `State` varchar(3) NOT NULL,
  `Postcode` varchar(4) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Skills` text NOT NULL,
  `Status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `JobRef`, `FirstName`, `LastName`, `DOB`, `Gender`, `Address`, `Suburb`, `State`, `Postcode`, `Email`, `Phone`, `Skills`, `Status`) VALUES
(1, 'AR001', 'Alice', 'Johnson', '1992-06-15', 'Female', '123 Main Street', 'Sydney', 'NSW', '2000', 'alice.johnson@example.com', '0412345678', 'Java, Python, Teamwork', 'New'),
(2, 'NT027', 'Bob', 'Smith', '1988-11-23', 'Male', '456 King Road', 'Melbourne', 'VIC', '3001', 'bob.smith@example.com', '0423456789', 'Networking, Troubleshooting, Windows Server', 'Current'),
(3, 'DA042', 'Carol', 'Nguyen', '1995-02-10', 'Female', '789 Queen St', 'Brisbane', 'QLD', '4000', 'carol.nguyen@example.com', '0434567890', 'SQL, Excel, Tableau', 'New'),
(4, 'CS035', 'David', 'Lee', '1990-08-05', 'Male', '321 George Ave', 'Adelaide', 'SA', '5000', 'david.lee@example.com', '0445678901', 'Penetration Testing, IDS, Firewalls', 'Final'),
(5, 'IT042', 'Ella', 'Wang', '1993-04-18', 'Non-binary', '654 Swan Blvd', 'Perth', 'WA', '6000', 'ella.wang@example.com', '0456789012', 'macOS, Windows 10, Helpdesk', 'New'),
(6, 'CE403', 'Frank', 'O’Connor', '1985-09-09', 'Male', '987 River Way', 'Hobart', 'TAS', '7000', 'frank.oconnor@example.com', '0467890123', 'AWS, Terraform, CI/CD', 'Current');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
