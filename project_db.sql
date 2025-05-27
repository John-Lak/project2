-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 07:35 AM
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
(1, 'AR001', 'Alice', 'Johnson', '1992-06-15', 'Female', '123 Main Street', 'Sydney', 'NSW', '2048', 'alice.johnson@example.com', '0412345678', 'Java, Python, Teamwork', 'New'),
(2, 'NT027', 'Bob', 'Smith', '1988-11-23', 'Male', '456 King Road', 'Melbourne', 'VIC', '3174', 'bob.smith@example.com', '0423456789', 'Networking, Troubleshooting, Windows Server', 'Current'),
(3, 'DA042', 'Carol', 'Nguyen', '1995-02-10', 'Female', '789 Queen St', 'Brisbane', 'QLD', '4349', 'carol.nguyen@example.com', '0434567890', 'SQL, Excel, Tableau', 'New'),
(4, 'CS035', 'David', 'Lee', '1990-08-05', 'Male', '321 George Ave', 'Adelaide', 'SA', '5194', 'david.lee@example.com', '0445678901', 'Penetration Testing, IDS, Firewalls', 'Final'),
(5, 'IT042', 'Ella', 'Wang', '1993-04-18', 'Female', '654 Swan Blvd', 'Perth', 'WA', '6969', 'ella.wang@example.com', '0456789012', 'macOS, Windows 10, Helpdesk', 'New'),
(6, 'CE403', 'Frank', 'O’Connor', '1985-09-09', 'Male', '987 River Way', 'Hobart', 'TAS', '7498', 'frank.oconnor@example.com', '0467890123', 'AWS, Terraform, CI/CD', 'Current'),
(7, 'AR001', 'Grace', 'Taylor', '1991-03-12', 'Female', '12 Market Ln', 'Newcastle', 'NSW', '2345', 'grace.taylor@example.com', '0411234567', 'C++, Git, Agile', 'New'),
(8, 'NT027', 'Henry', 'Zhao', '1987-07-29', 'Male', '89 Ocean Dr', 'Geelong', 'VIC', '3229', 'henry.zhao@example.com', '0422345678', 'DHCP, DNS, Cisco', 'Current'),
(9, 'DA042', 'Isla', 'Murphy', '1994-01-08', 'Female', '234 Sunset Blvd', 'Toowoomba', 'QLD', '4354', 'isla.murphy@example.com', '0433456789', 'Excel, R, Data Mining', 'Final'),
(10, 'CS035', 'Jack', 'Singh', '1990-12-20', 'Male', '77 Tech Park', 'Mount Gambier', 'SA', '5297', 'jack.singh@example.com', '0444567890', 'Ethical Hacking, Security Audits', 'New'),
(11, 'IT042', 'Kylie', 'Ng', '1996-05-15', 'Female', '56 Forest Ave', 'Bunbury', 'WA', '6847', 'kylie.ng@example.com', '0455678901', 'Helpdesk, OS Support, Device Setup', 'Current'),
(12, 'CE403', 'Liam', 'Patel', '1989-10-03', 'Male', '90 Cloud Rd', 'Devonport', 'TAS', '7310', 'liam.patel@example.com', '0466789012', 'Azure, Ansible, CI/CD', 'Final'),
(13, 'AR001', 'Maya', 'Chowdhury', '1993-09-17', 'Female', '11 Harbour Way', 'Canberra', 'ACT', '0247', 'maya.chowdhury@example.com', '0477890123', 'Python, React, Unit Testing', 'New'),
(14, 'NT027', 'Nathan', 'Brown', '1986-06-30', 'Male', '22 Bay View', 'Darwin', 'NT', '0874', 'nathan.brown@example.com', '0488901234', 'Firewall Configs, VPN, Network Mapping', 'Final'),
(15, 'AR001', 'John', 'Lakshmalla', '2006-05-16', 'male', '21 Jump Street', 'Endeavouring Hillings', 'VIC', '3802', 'john.lakshmalla@outlook.com', '0460873256', 'Programming, Data Analysis, Cloud Computing, Other', 'New'),
(16, 'NT027', 'Nam', 'Vo', '2006-07-21', 'male', '21 Flemming Street', 'Airport East', 'VIC', '3154', 'nam.vo@outlook.com', '0460873256', 'Programming, Data Analysis, Cloud Computing, C++, HTML, PHP', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_ref` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `salary_range` varchar(50) DEFAULT NULL,
  `reports_to` varchar(100) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `full_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_ref`, `title`, `salary_range`, `reports_to`, `responsibilities`, `qualifications`, `full_description`) VALUES
(1, 'AR001', 'Software Engineer', '$80,000 - $100,000', 'Senior Software Engineer', 'Develop and maintain software applications; Collaborate with cross-functional teams; Participate in code reviews; Troubleshoot and debug issues', 'Bachelors degree in Computer Science or related field; Strong programming skills in Java, Python, or C++; 2+ years of experience in software development', 'We are seeking a skilled and passionate Software Engineer to join our development team. This role involves designing, building, and maintaining high-quality software applications that support the operations and goals of our organization. The ideal candidate thrives in collaborative environments, embraces continuous learning, and is committed to writing clean, efficient, and scalable code. You will be involved in all stages of the software development lifecycle, from concept and design to testing and deployment.'),
(2, 'NT027', 'Network Administrator', '$70,000 - $90,000', 'IT Manager', 'Manage network infrastructure and servers; Configure and monitor network hardware; Implement security protocols; Troubleshoot connectivity issues', 'Bachelors degree in Information Technology or related field; Experience with network protocols (TCP/IP, DNS, DHCP); 3+ years of experience in network administration', 'We are looking for a proactive and detail-oriented Network Administrator to oversee and optimize our company’s network infrastructure. This role includes managing servers, configuring network hardware, monitoring system performance, and implementing security protocols. The successful candidate will ensure the smooth operation of LAN, WAN, and other network segments, respond to network issues in a timely manner, and maintain comprehensive documentation for troubleshooting and upgrades.'),
(3, 'DA042', 'Data Analyst', '$65,000 - $85,000', 'Business Intelligence Manager', 'Interpret data and analyze results using statistical techniques; Develop and maintain dashboards and reports; Identify trends and patterns; Gather data requirements from stakeholders', 'Bachelor degree in Statistics, Mathematics, or related field; Proficiency in SQL, Excel, and data visualization tools (e.g., Tableau, Power BI); 2+ years of experience in data analysis', 'We are seeking a Data Analyst to transform complex data into actionable insights that support strategic decision-making across the company. You will be responsible for collecting, analyzing, and interpreting large data sets, building visual dashboards, and presenting trends that help drive business performance. The ideal candidate will have strong analytical skills, attention to detail, and the ability to communicate findings effectively to both technical and non-technical stakeholders.'),
(4, 'CS035', 'Cybersecurity Specialist', '$90,000 - $115,000', 'Chief Information Security Officer', 'Monitor systems for security breaches; Conduct vulnerability assessments and penetration testing; Implement security measures and controls; Respond to security incidents', 'Bachelor degree in Cybersecurity, Computer Science, or related field; Familiarity with firewalls, IDS/IPS, and antivirus software; 2+ years of experience in cybersecurity or information security', 'We are hiring a Cybersecurity Specialist to protect our digital infrastructure from cyber threats. The role involves continuous monitoring, assessment, and improvement of security protocols to ensure data integrity and confidentiality. The right candidate will be well-versed in identifying vulnerabilities, conducting penetration testing, and implementing threat prevention measures. This position requires fast thinking, technical expertise, and a deep understanding of cybersecurity trends and tools.'),
(5, 'IT042', 'IT Support Technician', '$50,000 - $65,000', 'IT Manager', 'Troubleshoot hardware and software issues; Set up and configure workstations and devices; Provide support for OS and applications; Maintain IT inventory and assist with upgrades', 'Associate or Bachelor degree in IT, Computer Science, or related field; Knowledge of Windows and macOS environments; 1+ years of experience in IT support or help desk roles', 'We are looking for a hands-on IT Support Technician to provide first-level technical assistance to our staff. This role includes setting up devices, resolving technical issues, and maintaining software and hardware systems. A successful candidate will have a friendly attitude, strong problem-solving abilities, and a desire to improve the IT support experience for all users. You will serve as the first point of contact for technical help and be integral to ensuring operational continuity.'),
(6, 'CE403', 'Cloud Engineer', '$95,000 - $120,000', 'Infrastructure Lead', 'Design and implement cloud-based solutions; Manage cloud resources for performance and cost; Automate deployments using IaC tools; Ensure cloud security and compliance', 'Bachelor degree in Computer Science or related field; Experience with AWS, Azure, or Google Cloud; 2+ years of experience in cloud infrastructure or DevOps', 'We are looking for a Cloud Engineer to lead the design and deployment of scalable, secure, and high-performing cloud infrastructure. In this role, you will be responsible for architecting cloud-native applications, automating infrastructure with Infrastructure-as-Code (IaC), and ensuring cost-effective usage of cloud services. The ideal candidate will be experienced in platforms such as AWS, Azure, or Google Cloud, and have a strong background in DevOps practices, cloud security, and system automation.');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$10$RabgjvNARrhZ8WfkwSVLCu.lEzyAlvgYKO/3dr0GiZKSyrB9CUIve');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('Admin', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
