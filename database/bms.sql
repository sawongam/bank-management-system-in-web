-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 04:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `AccNo` int(11) NOT NULL,
  `Balance` decimal(15,0) DEFAULT NULL,
  `Interest` decimal(15,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`AccNo`, `Balance`, `Interest`) VALUES
(197, '35', '2'),
(198, '5', '0'),
(199, '40', '2'),
(200, '212', '12');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `AccNo` int(11) NOT NULL,
  `Pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`AccNo`, `Pass`) VALUES
(197, '$2y$10$7IIfksddC.juTraxmYGTceLp.81mwMB2e2NOBB9YZy.ii9oY1Li8W'),
(198, '$2y$10$TJGtCn8Nd4ZHng8OY/K1LODLWd3SMnbXjIlzHo8vjPy5pGK6qocPO'),
(199, '$2y$10$h6Eq4XrzBTudR7Vo2fZ/IemkyV8DgPPfe.CBv0UI1Bbm.kJOYfeYi'),
(200, '$2y$10$dop1oPiHyey.V.86PakZCuDrZbgOCtOqRDOE8vT3.U4Of4RpeIqXS');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Sender` int(11) NOT NULL,
  `Receiver` int(11) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Remarks` varchar(50) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` time NOT NULL DEFAULT current_timestamp(),
  `SenBalance` decimal(10,0) NOT NULL,
  `RecBalance` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Sender`, `Receiver`, `Amount`, `Remarks`, `Date`, `Time`, `SenBalance`, `RecBalance`) VALUES
(200, 197, '10', 'Hired as Accountant', '2024-01-28', '15:46:17', '59', '79'),
(200, 198, '10', 'Hired as Sales Manager', '2024-01-28', '15:47:02', '49', '79'),
(200, 199, '30', 'Hired as Operation Manager', '2024-01-28', '15:47:37', '19', '99'),
(200, 199, '19', 'Investment', '2024-01-28', '15:48:40', '0', '118'),
(197, 200, '10', 'First Income', '2024-01-28', '15:49:17', '69', '10'),
(198, 197, '40', 'ROI Again', '2024-01-28', '15:50:00', '39', '109'),
(198, 197, '30', 'Miscellaneous Costs', '2024-01-28', '15:50:22', '9', '139'),
(199, 197, '30', 'Sales Income', '2024-01-28', '15:50:47', '88', '169'),
(199, 200, '20', 'Advetisers Payout', '2024-01-28', '15:51:14', '68', '30'),
(197, 200, '100', 'Regular Income now', '2024-01-28', '15:51:36', '69', '130'),
(197, 200, '50', 'More Sales', '2024-01-28', '15:51:55', '19', '180'),
(199, 200, '30', 'Providers Funding', '2024-01-28', '15:52:40', '38', '210'),
(200, 197, '10', 'Tax Cuts', '2024-01-28', '15:54:24', '200', '29'),
(198, 197, '4', 'All remaining Bal', '2024-01-28', '22:13:47', '5', '33');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `AccNo` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`AccNo`, `Name`, `Address`, `Email`) VALUES
(197, 'Ram Bahadur', 'Syanjga', 'ram@bahadur.com'),
(198, 'Jaja Bahadur', 'Jhapa', 'haha@bahadur.com'),
(199, 'Dam Bahadur', 'Dhanghadi', 'dam@bahadur.com'),
(200, 'Sangam Adhikari', 'Pokhara', 'sangam@adhikari.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`AccNo`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`AccNo`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`AccNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `AccNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`AccNo`) REFERENCES `credentials` (`AccNo`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`AccNo`) REFERENCES `credentials` (`AccNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
