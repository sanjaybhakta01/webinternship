-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 09:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `modrating`
--

CREATE TABLE `modrating` (
  `slno` int(4) NOT NULL,
  `module` varchar(100) NOT NULL,
  `rating` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modref`
--

CREATE TABLE `modref` (
  `masterjob` varchar(50) NOT NULL,
  `module` varchar(100) NOT NULL,
  `rating` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modref`
--

INSERT INTO `modref` (`masterjob`, `module`, `rating`) VALUES
(' Architect', ' 1.EE Design', 1),
(' Architect', ' 2.EE Analysis', 2),
(' Architect', ' 3.Verification and Validation Test', 2),
(' Designer', ' 1.EE Design', 3),
(' FSM', ' 1.EE Design', 3),
(' Test Engineer', ' 3.Verification and Validation Test', 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `masterjob` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`masterjob`) VALUES
('Architect'),
('Designer'),
('FSM'),
('Test Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `module` varchar(100) NOT NULL,
  `skillset` varchar(100) DEFAULT NULL,
  `units` varchar(10000) DEFAULT NULL,
  `learning` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`module`, `skillset`, `units`, `learning`) VALUES
('1.EE Design', 'Analog circuit design', 'Analog Circuit Design (R/C/L, diodes, op-amps, etc.) ', 'Digital'),
('1.EE Design', 'Digital Circuit Design', 'logic ICs ,MCUs, BJT, FET etc.\r\n', ''),
('2.EE Analysis', 'Worst Case Analysis (Mathcad)', '.', ''),
('3.Verification and Validation Test', 'Tools and Equipments know how', 'PS,Oscilloscope,Multimeter,Function generator\r\n', ''),
('3.Verification and Validation Test', 'Advanced Measurement/Instrumentation', '.', ''),
('3.Verification and Validation Test', 'Understanding of schematic blocks', '.\r\n', ''),
('3.Verification and Validation Test', 'Test cases and Test plan creation', '(EV,EMC and PTS)\r\n', ''),
('4.Requirement Engineering', 'EE Requiremnt Engineering', '.', ''),
('4.Requirement Engineering', 'EE Architecture', '.', ''),
('4.Requirement Engineering', 'System Architecture', '.', ''),
('4.Requirement Engineering', 'HW SW interface', '.', ''),
('5.Manufacture and Sample building', 'General Manufacturing Flow', '.', ''),
('5.Manufacture and Sample building', 'Soldering Technology (reflow, wave, point)', '.', ''),
('5.Manufacture and Sample building', 'Test Technology (AOI/AXI, ICT, EOL)', '.', ''),
('5.Manufacture and Sample building', 'Interface Sample Build & Production', '.', ''),
('5.Manufacture and Sample building', 'Parts Ordering for Sample Build', '.', ''),
('5.Manufacture and Sample building', 'ECU-Prototyps & Modification', '.', ''),
('5.Manufacture and Sample building', 'Sample Handling Flashing, Delivery', '.', ''),
('5.Manufacture and Sample building', 'Soldering & Sample modification', '.', ''),
('6.Tools,Process and Methods', 'Product life cycle (PLC)', '.', ''),
('6.Tools,Process and Methods', 'RE EE Doors', '.', ''),
('6.Tools,Process and Methods', 'ECDM and WST tools', '.', ''),
('6.Tools,Process and Methods', 'SAP PDM and WISE PDM ', '.', ''),
('6.Tools,Process and Methods', 'Problem solving (Fishbone/8D)', '.', ''),
('6.Tools,Process and Methods', 'PCB CAM tools', '.', ''),
('7.Project Leadership', 'Effort estimation', '.', ''),
('7.Project Leadership', 'Project planning and execution', '.', ''),
('7.Project Leadership', 'Problem Solving (Fish bone/8D)', '.', ''),
('7.Project Leadership', 'Risk assesment and countermeasure', '.', ''),
('7.Project Leadership', 'Agile development(KANBAN/SCRUM)', '.', ''),
('8.Soft Skills', 'Communication', '.', 'Digital'),
('8.Soft Skills', 'TeamWork', '.', ''),
('8.Soft Skills', 'Responsibility', '.', ''),
('8.Soft Skills', 'Flexibility', '.', ''),
('8.Soft Skills', 'Cultural Diversity', '.', ''),
('8.Soft Skills', 'Decision Making', '.', ''),
('8.Soft Skills', 'Managing Internal and External Stakeholders', '.', '');

-- --------------------------------------------------------

--
-- Table structure for table `skillrating`
--

CREATE TABLE `skillrating` (
  `slno` int(4) NOT NULL,
  `skillset` varchar(100) NOT NULL,
  `rating` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skillref`
--

CREATE TABLE `skillref` (
  `masterjob` varchar(50) NOT NULL,
  `skillset` varchar(100) NOT NULL,
  `rating` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skillref`
--

INSERT INTO `skillref` (`masterjob`, `skillset`, `rating`) VALUES
(' Architect', ' Analog circuit design', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `slno` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `masterjob` varchar(50) NOT NULL,
  `inconti` varchar(30) NOT NULL,
  `currentfuncarea` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`slno`, `name`, `masterjob`, `inconti`, `currentfuncarea`) VALUES
(123, 'sanjay', ' Designer', '2016', 'FSM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'sanjay', 'sanjay01@gmail.com', '54a8c7aa7fa0088b2a0acb6d4a951165', '2020-01-16 09:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modrating`
--
ALTER TABLE `modrating`
  ADD UNIQUE KEY `module` (`module`),
  ADD KEY `slno` (`slno`);

--
-- Indexes for table `modref`
--
ALTER TABLE `modref`
  ADD KEY `role` (`masterjob`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`masterjob`),
  ADD UNIQUE KEY `masterjob` (`masterjob`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD KEY `skillset` (`skillset`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `skillrating`
--
ALTER TABLE `skillrating`
  ADD KEY `slno` (`slno`),
  ADD KEY `skillset` (`skillset`);

--
-- Indexes for table `skillref`
--
ALTER TABLE `skillref`
  ADD KEY `masterjob` (`masterjob`),
  ADD KEY `skillset` (`skillset`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `masterjob` (`masterjob`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `modrating`
--
ALTER TABLE `modrating`
  ADD CONSTRAINT `modrating_ibfk_1` FOREIGN KEY (`slno`) REFERENCES `team` (`slno`),
  ADD CONSTRAINT `modrating_ibfk_2` FOREIGN KEY (`module`) REFERENCES `skill` (`module`);

--
-- Constraints for table `skillrating`
--
ALTER TABLE `skillrating`
  ADD CONSTRAINT `skillrating_ibfk_1` FOREIGN KEY (`slno`) REFERENCES `team` (`slno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `skillrating_ibfk_2` FOREIGN KEY (`skillset`) REFERENCES `skill` (`skillset`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
