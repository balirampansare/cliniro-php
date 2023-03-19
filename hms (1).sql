-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 12:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@123', '03-02-2023 11:11:02 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'ENT', 1, 1, 500, '2022-11-10', '12:45 PM', '2022-11-06 12:21:48', 1, 0, '2022-11-06 12:23:35'),
(2, 'ENT', 1, 2, 500, '2022-11-17', '7:00 PM', '2022-11-06 13:16:18', 1, 1, NULL),
(3, 'ENT', 1, 3, 500, '2023-02-01', '9:00 AM', '2023-02-01 03:21:55', 1, 1, NULL),
(4, 'Neurologists', 5, 1, 500, '2023-02-07', '10:30 PM', '2023-02-04 16:53:08', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `Billid` int(10) NOT NULL,
  `Docid` int(10) NOT NULL,
  `Patid` int(10) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`Billid`, `Docid`, `Patid`, `Description`, `Amount`, `Created`) VALUES
(1, 1, 5, 'mucotic ', 500, '2023-02-22 17:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `clinic_name` varchar(50) DEFAULT NULL,
  `clinic_contact` bigint(11) DEFAULT NULL,
  `clinic_timing` varchar(50) DEFAULT NULL,
  `closed` varchar(50) DEFAULT '-',
  `clinic_locality` varchar(50) DEFAULT NULL,
  `clinic_city` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `gender`, `age`, `dob`, `clinic_name`, `clinic_contact`, `clinic_timing`, `closed`, `clinic_locality`, `clinic_city`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'ENT', 'Baliram Pansare', 'Ground Floor, Canara Apartment, Dr N.A Nair Road, RTO Colony ', '200', 8965887451, 'anujk123@test.com', 'male', '21', '2001-05-30', 'Bali Clinic', 9854758745, '9 am to 2 pm | 6 pm to 9 pm', 'Sunday', 'bali adda', 'bhaubali', '5c428d8875d2948607f3e3fe134d71b4', '2022-10-30 18:16:52', '2023-03-05 11:26:04'),
(4, 'Dermatologists', 'Mrunmai Patil', '15, Alan Vihar, Kalyan West', '500', 9865478547, 'mrunmai@test.com', '', '', '', '', 0, NULL, NULL, '', '', 'f925916e2754e5e03f75dd58a5733251', '2023-02-02 12:10:53', NULL),
(5, 'Neurologists', 'Sai Gadge', '15, louis lane, kajuwadi', '500', 9004560015, 'sai@test.com', 'male', '25', '2002-06-24', 'sai clinic ', 8965478547, '10 am to 3 pm | 7 pm to 9 pm', NULL, 'louiswadi', 'thane', 'f925916e2754e5e03f75dd58a5733251', '2023-02-02 16:48:35', '0000-00-00 00:00:00'),
(6, 'Anesthesia', 'Gauri Pansare1', 'somewhere on earth1', '1001', 9874563211, 'gauri1@test.com', 'male', '25', '1999-09-13', 'gauri clinic1', 9856985691, NULL, NULL, 'airoli1', 'navi mumbai1', 'f925916e2754e5e03f75dd58a5733251', '2023-02-02 16:55:13', '2023-02-02 18:17:04'),
(7, 'Dermatology', 'Vinay Agarwal', ' Bakery Lane, Near. Building No. 21, Kopri Colony, Guru Nanak Rd, Kopri, Thane East, Thane, Maharashtra 400603', '200', 9854785698, 'drvinay@gmail.com', 'male', '58', '1965-01-14', 'Vinay Clinics', 9865874589, NULL, 'Sunday', 'Kopri', 'Thane', '5c428d8875d2948607f3e3fe134d71b4', '2023-03-19 07:43:56', NULL),
(8, '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-03-19 07:50:10', NULL),
(9, '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-03-19 07:50:14', NULL),
(10, 'Dental Care', 'Suyash Bendre', ' Gokhale Rd, Above Mango Art and Stationery, Shivaji Path, Naupada, Thane West, Thane, Maharashtra 400602', '500', 9856987458, 'suyashclinic@gmail.com', 'male', '58', '1965-01-15', 'Suyash Clinic', 9856987458, '9 am to 2 pm | 6 pm to 9 pm', 'Sunday,Wednesday', 'Naupada', 'Thane', '5c428d8875d2948607f3e3fe134d71b4', '2023-03-19 07:55:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(20, NULL, 'gfdgdf', 0x3a3a3100000000000000000000000000, '2022-11-04 01:02:16', NULL, 0),
(21, 2, 'charudua12@test.com', 0x3a3a3100000000000000000000000000, '2022-11-06 11:59:40', '06-11-2022 05:35:18 PM', 1),
(22, 2, 'charudua12@test.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:06:37', '06-11-2022 05:36:40 PM', 1),
(23, 2, 'charudua12@test.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:08:56', '06-11-2022 05:42:53 PM', 1),
(24, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:23:18', '06-11-2022 05:53:40 PM', 1),
(25, 2, 'charudua12@test.com', 0x3a3a3100000000000000000000000000, '2022-11-06 13:16:53', '06-11-2022 06:47:07 PM', 1),
(26, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2022-11-06 13:17:33', '06-11-2022 06:50:28 PM', 1),
(27, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-01 03:19:53', NULL, 1),
(28, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-01 03:22:39', '01-02-2023 10:21:44 AM', 1),
(29, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 04:23:48', '03-02-2023 09:54:12 AM', 1),
(30, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 04:56:10', NULL, 1),
(31, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 04:56:31', '03-02-2023 10:29:23 AM', 1),
(32, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 04:59:46', NULL, 1),
(33, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 05:00:39', '03-02-2023 11:03:33 AM', 1),
(34, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 05:44:58', '03-02-2023 12:01:08 PM', 1),
(35, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 06:31:19', NULL, 0),
(36, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 06:31:35', '03-02-2023 12:02:23 PM', 1),
(37, 6, 'gauri1@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 06:32:36', '03-02-2023 12:02:39 PM', 1),
(38, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 06:32:47', '03-02-2023 02:50:31 PM', 1),
(39, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 09:20:41', '03-02-2023 03:32:41 PM', 1),
(40, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 10:03:06', '03-02-2023 03:33:41 PM', 1),
(41, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 10:05:27', NULL, 1),
(42, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 10:09:27', '03-02-2023 06:02:10 PM', 1),
(43, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 13:40:27', NULL, 1),
(44, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 13:51:36', '03-02-2023 07:46:52 PM', 1),
(45, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 14:17:02', '03-02-2023 07:47:39 PM', 1),
(46, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-03 14:17:56', NULL, 1),
(47, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 03:39:36', NULL, 1),
(48, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 05:29:53', '04-02-2023 01:29:31 PM', 1),
(49, NULL, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 07:59:59', NULL, 0),
(50, NULL, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 08:00:08', NULL, 0),
(51, NULL, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 08:00:32', NULL, 0),
(52, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 08:02:06', NULL, 0),
(53, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 08:05:14', NULL, 0),
(54, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 08:05:41', NULL, 0),
(55, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 09:45:45', '04-02-2023 03:15:56 PM', 1),
(56, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 09:46:05', '04-02-2023 03:16:26 PM', 1),
(57, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 09:46:36', '04-02-2023 05:54:37 PM', 1),
(58, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 13:59:07', NULL, 1),
(59, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-05 04:20:46', '05-02-2023 10:49:33 AM', 1),
(60, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-05 06:53:17', NULL, 1),
(61, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-05 10:56:20', '05-02-2023 05:12:27 PM', 1),
(62, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-06 14:09:22', NULL, 1),
(63, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-06 17:19:13', '06-02-2023 11:40:20 PM', 1),
(64, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:04:45', NULL, 1),
(65, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:07:44', '07-02-2023 09:37:57 AM', 1),
(66, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:09:28', NULL, 1),
(67, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:09:41', '07-02-2023 09:39:46 AM', 1),
(68, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:11:04', NULL, 1),
(69, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:11:17', '07-02-2023 09:41:22 AM', 1),
(70, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:13:10', NULL, 1),
(71, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:13:26', '07-02-2023 09:43:32 AM', 1),
(72, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:13:52', NULL, 0),
(73, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 04:14:08', '07-02-2023 02:36:31 PM', 1),
(74, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 09:06:40', '07-02-2023 02:37:42 PM', 1),
(75, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 09:52:21', NULL, 1),
(76, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 14:05:15', NULL, 1),
(77, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 16:51:14', '07-02-2023 10:24:36 PM', 1),
(78, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 16:59:11', '07-02-2023 11:04:55 PM', 1),
(79, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 04:49:48', NULL, 1),
(80, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 14:16:36', '08-02-2023 08:11:54 PM', 1),
(81, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 14:42:00', '08-02-2023 08:17:17 PM', 1),
(82, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 14:47:24', NULL, 1),
(83, 6, 'gauri1@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 14:52:26', '08-02-2023 08:57:05 PM', 1),
(84, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 15:27:10', NULL, 0),
(85, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 15:27:25', '08-02-2023 09:00:53 PM', 1),
(86, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 15:41:58', '08-02-2023 10:52:22 PM', 1),
(87, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 03:18:32', '09-02-2023 09:03:09 AM', 1),
(88, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 03:33:24', NULL, 1),
(89, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 04:56:29', '09-02-2023 11:56:39 AM', 1),
(90, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 14:14:40', NULL, 1),
(91, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 14:26:40', '09-02-2023 10:43:20 PM', 1),
(92, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-10 06:27:12', '10-02-2023 12:48:25 PM', 1),
(93, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-10 07:18:36', '10-02-2023 12:50:46 PM', 1),
(94, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-10 07:20:56', '10-02-2023 02:05:31 PM', 1),
(95, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-10 12:06:50', NULL, 1),
(96, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-10 14:04:46', NULL, 1),
(97, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-10 17:02:13', NULL, 1),
(98, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-10 18:20:45', '10-02-2023 11:55:33 PM', 1),
(99, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-11 04:19:33', '11-02-2023 06:19:45 PM', 1),
(100, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-11 12:50:17', NULL, 1),
(101, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-11 12:51:30', '11-02-2023 06:21:52 PM', 1),
(102, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-11 14:44:04', '11-02-2023 08:14:26 PM', 1),
(103, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-13 05:44:06', NULL, 1),
(104, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-13 11:41:40', NULL, 0),
(105, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-13 11:41:59', NULL, 1),
(106, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-13 16:58:32', NULL, 1),
(107, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-14 03:32:24', '14-02-2023 12:41:25 PM', 1),
(108, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-14 07:11:37', '14-02-2023 12:44:09 PM', 1),
(109, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-14 07:14:18', '14-02-2023 01:08:47 PM', 1),
(110, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-14 09:09:28', NULL, 1),
(111, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-14 10:29:13', NULL, 1),
(112, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-15 05:37:54', '15-02-2023 11:28:06 AM', 1),
(113, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-15 05:58:15', NULL, 1),
(114, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-15 06:12:47', '15-02-2023 12:21:27 PM', 1),
(115, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-15 09:05:55', NULL, 1),
(116, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 04:17:19', NULL, 0),
(117, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 04:23:04', NULL, 0),
(118, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 04:23:19', '17-02-2023 10:55:37 AM', 1),
(119, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 05:25:43', NULL, 0),
(120, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 05:25:52', '17-02-2023 10:57:50 AM', 1),
(121, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 05:27:59', NULL, 1),
(122, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:13:10', '17-02-2023 12:50:43 PM', 1),
(123, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:20:50', '17-02-2023 12:51:36 PM', 1),
(124, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:21:43', '17-02-2023 12:54:24 PM', 1),
(125, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:24:31', '17-02-2023 12:54:59 PM', 1),
(126, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:25:10', NULL, 0),
(127, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:26:49', '17-02-2023 12:58:49 PM', 1),
(128, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:29:00', '17-02-2023 01:00:24 PM', 1),
(129, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:30:30', '17-02-2023 01:10:09 PM', 1),
(130, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:40:24', '17-02-2023 01:13:04 PM', 1),
(131, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:43:15', NULL, 0),
(132, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:43:23', '17-02-2023 01:13:50 PM', 1),
(133, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:43:58', '17-02-2023 01:20:15 PM', 1),
(134, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:50:24', '17-02-2023 01:21:13 PM', 1),
(135, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:51:55', '17-02-2023 01:28:41 PM', 1),
(136, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:58:46', '17-02-2023 01:29:22 PM', 1),
(137, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:59:33', NULL, 0),
(138, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 07:59:46', NULL, 1),
(139, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 08:06:01', '17-02-2023 01:38:34 PM', 1),
(140, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 08:08:41', NULL, 1),
(141, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 08:15:21', NULL, 0),
(142, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 08:15:27', '17-02-2023 01:53:18 PM', 1),
(143, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 08:23:23', '17-02-2023 01:54:49 PM', 1),
(144, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 08:25:02', '17-02-2023 01:55:05 PM', 1),
(145, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 09:52:05', NULL, 0),
(146, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 09:52:15', NULL, 1),
(147, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 14:44:48', NULL, 0),
(148, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-17 14:44:57', '17-02-2023 10:43:53 PM', 1),
(149, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-18 04:25:31', NULL, 0),
(150, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-18 04:25:38', '18-02-2023 10:01:30 AM', 1),
(151, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-18 04:31:56', NULL, 1),
(152, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-18 04:37:03', '18-02-2023 10:15:15 AM', 1),
(153, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-18 16:49:14', '18-02-2023 11:27:47 PM', 1),
(154, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 04:23:38', NULL, 1),
(155, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 09:04:53', '19-02-2023 04:56:32 PM', 1),
(156, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 11:26:40', '19-02-2023 05:34:34 PM', 1),
(157, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 12:19:44', '19-02-2023 06:14:17 PM', 1),
(158, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 14:24:33', '19-02-2023 08:16:58 PM', 1),
(159, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 14:47:13', NULL, 0),
(160, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 14:47:29', '19-02-2023 10:05:00 PM', 1),
(161, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 16:35:07', '19-02-2023 10:05:29 PM', 1),
(162, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-19 16:35:36', NULL, 1),
(163, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-20 14:36:50', '20-02-2023 08:59:35 PM', 1),
(164, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-20 15:29:44', '20-02-2023 11:47:13 PM', 1),
(165, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-21 12:48:11', '21-02-2023 06:41:45 PM', 1),
(166, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-21 14:40:17', '21-02-2023 08:16:35 PM', 1),
(167, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-21 14:46:42', '21-02-2023 08:27:53 PM', 1),
(168, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-21 14:58:02', '21-02-2023 11:38:26 PM', 1),
(169, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-21 18:11:07', '21-02-2023 11:41:43 PM', 1),
(170, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-22 05:57:33', NULL, 1),
(171, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-22 12:00:22', NULL, 1),
(172, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-22 16:15:17', NULL, 1),
(173, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-23 04:17:43', NULL, 1),
(174, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-23 07:43:02', NULL, 1),
(175, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-23 08:51:30', '23-02-2023 03:25:44 PM', 1),
(176, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-23 14:50:56', NULL, 1),
(177, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-24 03:08:45', NULL, 1),
(178, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-24 14:31:43', '24-02-2023 11:30:18 PM', 1),
(179, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-24 18:00:38', NULL, 1),
(180, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-25 03:52:37', NULL, 1),
(181, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-25 04:31:25', NULL, 1),
(182, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-25 06:56:50', '25-02-2023 01:00:12 PM', 1),
(183, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-25 09:54:52', '25-02-2023 04:44:45 PM', 1),
(184, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-25 11:32:55', '25-02-2023 05:31:56 PM', 1),
(185, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-25 12:12:17', '25-02-2023 06:00:28 PM', 1),
(186, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 04:53:49', '26-02-2023 10:37:14 AM', 1),
(187, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 14:45:51', NULL, 0),
(188, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-27 06:05:25', '27-02-2023 11:35:55 AM', 1),
(189, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-05 10:38:38', '05-03-2023 05:17:44 PM', 1),
(190, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-11 12:07:03', '11-03-2023 06:02:00 PM', 1),
(191, NULL, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-03-11 12:32:07', NULL, 0),
(192, NULL, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-03-11 12:32:19', NULL, 0),
(193, NULL, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-03-11 12:32:26', NULL, 0),
(194, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-11 12:48:57', '11-03-2023 11:47:52 PM', 1),
(195, 5, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-03-11 18:18:22', '11-03-2023 11:49:00 PM', 1),
(196, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-12 03:14:29', '12-03-2023 10:54:21 AM', 1),
(197, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-12 09:23:17', '12-03-2023 05:35:38 PM', 1),
(198, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-12 14:43:52', '12-03-2023 11:12:38 PM', 1),
(199, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-13 03:27:03', '13-03-2023 10:09:22 AM', 1),
(200, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-13 09:22:37', NULL, 1),
(201, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-13 10:43:27', NULL, 1),
(202, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-14 12:35:31', '14-03-2023 06:24:50 PM', 1),
(203, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-14 13:05:10', '14-03-2023 06:49:53 PM', 1),
(204, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-14 13:25:35', '14-03-2023 07:15:23 PM', 1),
(205, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-14 13:52:43', '14-03-2023 07:27:03 PM', 1),
(206, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 05:36:17', NULL, 1),
(207, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 05:40:55', NULL, 1),
(208, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 08:07:17', NULL, 1),
(209, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 13:23:36', '15-03-2023 07:58:16 PM', 1),
(210, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 14:28:25', NULL, 0),
(211, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 14:28:41', NULL, 1),
(212, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 14:30:22', NULL, 1),
(213, NULL, 'anujk@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 14:37:24', NULL, 0),
(214, NULL, 'anujk@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 14:37:49', NULL, 0),
(215, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 14:38:28', '15-03-2023 08:29:38 PM', 1),
(216, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 16:46:19', NULL, 1),
(217, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 04:09:48', '16-03-2023 09:56:42 AM', 1),
(218, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 09:57:49', '16-03-2023 03:36:21 PM', 1),
(219, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 05:12:50', '17-03-2023 11:02:19 AM', 1),
(220, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 05:41:39', '17-03-2023 11:12:32 AM', 1),
(221, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 05:44:20', NULL, 1),
(222, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 09:26:36', NULL, 1),
(223, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-18 07:08:43', '18-03-2023 04:13:21 PM', 1),
(224, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-18 11:21:21', '18-03-2023 04:58:02 PM', 1),
(225, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-18 11:50:03', '18-03-2023 05:20:59 PM', 1),
(226, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-18 12:46:39', '18-03-2023 07:50:07 PM', 1),
(227, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-19 03:03:24', '19-03-2023 09:19:06 AM', 1),
(228, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-19 05:18:25', '19-03-2023 10:48:38 AM', 1),
(229, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-19 05:36:29', '19-03-2023 12:49:03 PM', 1),
(230, 10, 'suyashclinic@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-19 07:56:14', '19-03-2023 01:26:40 PM', 1),
(231, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-19 07:57:09', '19-03-2023 01:28:11 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Orthopedics', '2022-10-30 18:09:46', '2023-02-02 09:15:36'),
(2, 'Internal Medicine', '2022-10-30 18:09:57', NULL),
(3, 'Obstetrics and Gynecology', '2022-10-30 18:10:18', NULL),
(4, 'Dermatology', '2022-10-30 18:10:28', NULL),
(5, 'Pediatrics', '2022-10-30 18:10:37', NULL),
(6, 'Radiology', '2022-10-30 18:10:46', NULL),
(7, 'General Surgery', '2022-10-30 18:10:56', NULL),
(8, 'Ophthalmology', '2022-10-30 18:11:03', NULL),
(9, 'Anesthesia', '2022-10-30 18:11:15', NULL),
(10, 'Pathology', '2022-10-30 18:11:22', NULL),
(11, 'ENT', '2022-10-30 18:11:30', NULL),
(12, 'Dental Care', '2022-10-30 18:11:39', NULL),
(13, 'Dermatologists', '2022-10-30 18:12:02', NULL),
(14, 'Endocrinologists', '2022-10-30 18:12:10', NULL),
(15, 'Neurologists', '2022-10-30 18:12:30', NULL),
(19, 'Orthopedics', '2023-02-01 04:53:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Eventid` int(10) NOT NULL,
  `Docid` int(10) NOT NULL,
  `Event_name` varchar(50) NOT NULL,
  `Event_date` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Event_time` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Event_address` varchar(500) NOT NULL,
  `Event_other` varchar(500) NOT NULL,
  `Event_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Eventid`, `Docid`, `Event_name`, `Event_date`, `Event_time`, `Event_address`, `Event_other`, `Event_created`) VALUES
(2, 1, 'Doctors Summit', '2023-02-25', '12:30', 'Thane 1, near gadkari, Talav Pali, rangayat, Thane, Maharashtra 400601', 'Summit pass is compulsory for entry', '2023-02-24'),
(3, 1, 'International Derma conference', '2023-03-30', '11:00', 'Noida, Delhi', '', '2023-03-12'),
(4, 1, 'Cliniro Presentation', '2023-03-15', '11:00', 'k c college', 'no ', '2023-03-14'),
(5, 1, 'IEEE Presentation', '2023-03-20', '11:00', 'Virtual Meet google meet', '', '2023-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Inventid` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Timing` varchar(50) DEFAULT NULL,
  `Contact` bigint(11) NOT NULL,
  `Closed` varchar(50) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Website` varchar(500) DEFAULT NULL,
  `Locality` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `InventCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventid`, `Type`, `Name`, `Timing`, `Contact`, `Closed`, `Address`, `Website`, `Locality`, `City`, `InventCreated`) VALUES
(1, 'Medical', 'Patel Chemist And General Stores', '9:00 am - 11:00 pm', 8286091062, 'None', 'Shop No. 6, Raj Darshan CHS, Pipeline Rd, near Sai Baba Mandir, Louis Wadi, Thane, Maharashtra 400606', '', 'Louiswadi', 'Thane', '2023-02-25 15:24:20'),
(2, 'Medical', 'Shree Siddhi Vinayak Medical', '10:30 am–10:30 pm', 9920960352, 'Sunday', 'Louis Wadi, Shop No. 9 Raj Krupa Society, Thane West, Thane, Maharashtra 400604', '', 'Louiswadi', 'Thane', '2023-02-25 16:51:44'),
(3, 'Medical', 'Arihant Medico', '10 am to 10 pm', 0, 'Sunday', '9 jeevap prakash opp union bank, loucewadi, thane, Pipeline Road, Thane, Maharashtra 400604', '', 'Louiswadi', 'Thane', '2023-02-25 16:59:07'),
(4, 'Medical', 'Dhanlaxami Medical', '10 am to 11 pm', 9967284312, 'None', 'Shop No. 4, Patil Chawl, Laxmi Chirag Nagar, Road No. 9, Thane West, Complex No. Laxmi Nagar /Chirag', '', 'Laxmi Chirag Nagar', 'Thane', '2023-02-25 17:01:21'),
(5, 'Laboratory', 'Esha Laboratory', '8 am–9:30 pm ', 9819489216, 'Sunday after 1:30 pm', 'Shop no 11, Louis Wadi, Thane West, Thane, Maharashtra 400604', '', 'Kajuwadi', 'Thane', '2023-02-25 17:33:38'),
(6, 'Laboratory', 'SRL Dr. Avinash Phadke Labs', '7:30 am to 9 pm', 9870492600, 'Sun after 1pm', 'Shop no 4, Rajkripa Society, near Saibaba Temple, Louis Wadi, Thane West, Maharashtra 400604', '', 'Kajuwadi', 'Thane', '2023-02-25 17:35:37'),
(7, 'Blood Bank', 'Navjivan Blood Bank', '24/7', 2225371000, '', 'Prakash Bhuvan, Gokhale Rd, Next to Cosmos Bank, Naupada, Thane West, Thane, Maharashtra 400602', '', 'Naupada', 'Thane', '2023-02-25 17:37:41'),
(8, 'Ambulance', 'Ekvira Ambulance Services', '24/7', 0, '', 'S 3 ,shop 57,vedant commercial complex, Vartak Nagar, Thane West, Thane, Maharashtra 400606', 'https://ekviraambulanceservice.business.site/?utm_source=gmb&utm_medium=referral', 'Vartak Nagar', 'Thane', '2023-02-25 17:40:09'),
(9, 'Hospital', 'Kaushalya Medical Foundation Trust Hospital', '24/7', 2245454000, '', 'Ganeshwadi, behind Nitin Company, Panch Pakhdi, Thane, Maharashtra 400601', 'https://kaushalyahospitalthane.com/', 'Panch Pakhdi', 'Thane', '2023-02-25 17:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `Noteid` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`Noteid`, `Docid`, `Description`, `Created`) VALUES
(2, 1, 'get the sidebar and header in include', '2023-02-19'),
(3, 1, 'internal competion march end', '2023-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `patappointments`
--

CREATE TABLE `patappointments` (
  `Apptid` int(10) NOT NULL,
  `Appt_Docid` int(10) NOT NULL,
  `Appt_Patid` int(10) NOT NULL,
  `Appt_Descrip` varchar(500) NOT NULL,
  `Appt_Date` date NOT NULL,
  `Appt_Time` varchar(10) NOT NULL,
  `Appt_Status` int(1) NOT NULL,
  `Appt_Created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patappointments`
--

INSERT INTO `patappointments` (`Apptid`, `Appt_Docid`, `Appt_Patid`, `Appt_Descrip`, `Appt_Date`, `Appt_Time`, `Appt_Status`, `Appt_Created`) VALUES
(1, 6, 5, 'no description', '2023-02-28', '', 0, '2023-02-23'),
(2, 1, 5, 'follow up', '2023-02-24', '7:00', 0, '2023-02-23'),
(3, 1, 5, 'no description', '2023-02-24', '', 0, '2023-02-23'),
(4, 1, 5, '', '2023-02-25', '11:45', 1, '2023-02-23'),
(5, 1, 6, 'reports checkup', '2023-02-24', '20:30', 1, '2023-02-23'),
(6, 5, 5, 'Stomach Pain', '2023-02-27', '19:30', 1, '2023-02-27'),
(7, 1, 5, 'routine checkup', '2023-02-27', '20:00', 1, '2023-02-27'),
(8, 1, 5, '', '2023-02-27', '20:34', 0, '2023-02-27'),
(9, 1, 3, '', '2023-03-05', '20:00', 1, '2023-03-05'),
(10, 1, 3, '', '2023-03-14', '21:29', 1, '2023-03-14'),
(11, 1, 6, '', '2023-03-21', '10:44', 1, '2023-03-14'),
(12, 5, 5, '', '2023-03-16', '12:00', 1, '2023-03-16'),
(13, 1, 5, '', '2023-03-16', '19:30', 1, '2023-03-16'),
(14, 1, 5, 'routine checkup', '2023-03-24', '19:00', 1, '2023-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratingid` int(10) NOT NULL,
  `ratedocid` int(10) NOT NULL,
  `ratepatid` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratingid`, `ratedocid`, `ratepatid`, `rating`, `comment`) VALUES
(1, 1, 5, 4, 'get well soon buddy'),
(5, 5, 5, 3, 'one get well soon'),
(6, 1, 6, 5, 'Dr. is a great doctor! He’s very understanding and listens to your concerns. He takes time with the patient to help them with their health issues! I highly recommend him to anyone looking for a specialist.'),
(7, 1, 1, 3, 'The services that I receive from doctor is excellent.'),
(8, 1, 2, 4, 'best doctor. recommended by most of the people in our area.');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'Anuj kumar', 'anujk30@test.com', 1425362514, 'This is for testing purposes.   This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.', '2022-10-30 16:52:03', NULL, NULL, NULL),
(2, 'Anuj kumar', 'ak@gmail.com', 1111122233, 'This is for testing', '2022-11-06 13:13:41', 'Contact the patient', '2022-11-06 13:13:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `DocId` int(100) NOT NULL,
  `PatientName` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `bloodgrp` varchar(5) DEFAULT NULL,
  `symptoms` varchar(500) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `tabname1` varchar(100) DEFAULT NULL,
  `tabpat1` varchar(10) DEFAULT NULL,
  `tabped1` varchar(50) DEFAULT NULL,
  `tabday1` varchar(20) DEFAULT NULL,
  `tabother` varchar(500) DEFAULT NULL,
  `tests` varchar(500) DEFAULT NULL,
  `PayDescription` varchar(500) DEFAULT NULL,
  `PayAmount` int(10) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `DocId`, `PatientName`, `gender`, `age`, `bloodgrp`, `symptoms`, `BloodPressure`, `Weight`, `Temperature`, `tabname1`, `tabpat1`, `tabped1`, `tabday1`, `tabother`, `tests`, `PayDescription`, `PayAmount`, `CreationDate`) VALUES
(1, 1, 0, NULL, NULL, NULL, NULL, NULL, '80/120', '85', '98', NULL, NULL, NULL, NULL, NULL, NULL, '', 100, '2023-03-11 14:57:01'),
(2, 1, 0, NULL, NULL, NULL, NULL, NULL, '125', '86', '98', NULL, NULL, NULL, NULL, NULL, NULL, '', 150, '2023-03-11 14:57:05'),
(3, 3, 0, 'Baliram Narkar', 'Male', 22, 'O+', 'cough - soar throat\njoins pain\nfever\nmucotic pain', '80', '52', '98', 'calpol', '1-1-1', 'After Meal', '', 'no tablet other info', 'cbc test\r\nmuctoic sample test daily\r\notpr repet', '', 200, '2023-03-11 14:57:11'),
(4, 4, 0, 'Baliram Narkar', 'Male', 21, 'O+', 'trying out with symptoms', '80', '50', '98', 'dolo ', '1-1-1', 'After Meal', '2 weeks', 'nothing much', 'ghari bas baki kahi nahi', '', 100, '2023-03-11 14:57:15'),
(5, 3, 0, 'Baliram Narkar', 'Male', 21, 'O+', 'dobule2', '34', '50', '34', 'calpol', '1-1-1', 'After Meal', '4', 'sd', 'dfs', '', 100, '2023-03-11 14:57:19'),
(6, 5, 0, 'Baliram Pansare', 'Male', 21, '', 'no symptoms', '120', '52', '98', 'bali dose', '1-1-1', 'After Meal', '2 days', '--', '--', '', 150, '2023-03-11 14:57:25'),
(7, 5, 0, 'Baliram Pansare', 'Male', 21, '', 'high fever with soar skin', '180', '52', '102', 'Levocet', '1-1-1', 'After Meal', '2 weeks', 'gapchup ghari basa', 'eor skin test', NULL, 150, '2023-03-11 14:58:12'),
(8, 5, 1, 'Baliram Pansare', 'Male', 21, '', 'headache, red eyes, joint pains', '120', '52', '98', 'omni ge', '1-1-1', 'Take Anytime', '15 days', 'no other info to be added', 'nothing to do', 'make it happen', 500, '2023-03-11 15:00:04'),
(9, 5, 5, 'Baliram Pansare', 'Male', 21, '', 'symptoms by sai gadge doc', '130', '52', '99', 'dolo', '1-1-1', 'After Meal', '1 week', '---', '---', NULL, 200, '2023-03-11 14:58:16'),
(10, 5, 1, 'Baliram Pansare', 'Male', 21, '', 'doke dukhi', '145', '52', '99', 'calpol', '1-1-1', 'After Meal', '4days', 'no', 'no', 'normal flue desaease', 500, '2023-02-14 04:14:12'),
(11, 5, 1, 'Baliram Pansare', 'Male', 21, '', 'no sleep, nausea', '130', '52', '98', 'crocin', '1-1-1', 'After Meal', '3 days', 'if symptoms still exist then take dolo for 3 days after meal', 'no need of any tests.', 'normal flue desaease', 500, '2023-02-14 04:14:12'),
(12, 5, 1, 'Baliram Pansare', 'Male', 21, '', 'Chest Pain', '150', '52', '99', 'Mulin', '1-0-1', 'After Meal', '2 weeks', 'tublo if required', 'follow up after 5 days', 'Chest Pain', 111, '2023-02-14 06:39:19'),
(13, 5, 1, 'Baliram Pansare', 'Male', 21, '', 'nothing follow up', '120', '52', '98', 'mucolin', '1-1-1', 'After Meal', '3 days', '--', '--', 'follow up charges for mucolin', 300, '2023-02-14 07:16:15'),
(14, 6, 1, 'Sai Gadge', 'Male', 20, '', 'no symtoms normal body checkup', '120', '50', '98', 'vitmain d3', '0-0-1', 'Take Anytime', '3 months', 'take that vitamin d3 once in a month', 'dont eat oily', 'body checkup', 500, '2023-03-11 15:00:24'),
(15, 3, 1, 'bali bhau', 'male', 28, '', 'body checkup', '120', '56', '99', 'dolo', '1-1-1', 'After Meal', '2 days', '', '', 'normal flue', 300, '2023-03-11 15:00:31'),
(16, 5, 1, 'Baliram Pansare', 'Male', 21, '', 'kjhiu', '125', '52', '98', 'jh', '1-1-1', 'After Meal', '25', '', '', 'y', 100, '2023-02-15 06:15:35'),
(17, 5, 1, 'Baliram Pansare', 'Male', 21, '', 'cough', '80', '52', '98', 'dolo', '1-1-1', 'Before Meal', '2 days', '', '', 'egsd', 700, '2023-03-12 15:00:22'),
(18, 6, 1, 'Sai Gadge', 'Male', 20, '', 'headache\r\n', '120', '50', '98', 'calpol', '1-1-1', 'After Meal', '3 days', '', '', 'heacache -calpol', 500, '2023-03-14 12:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp(),
  `OpenningTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `OpenningTime`) VALUES
(1, 'aboutus', 'About Us', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em; margin-left: 1.655em;\" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: left;\"><font color=\"#000000\">The Hospital Management System (HMS) is designed for Any Hospital to replace their existing manual, paper based system. The new system is to control the following information; patient information, room availability, staff and operating room schedules, and patient invoices. These services are to be provided in an efficient, cost effective manner, with the goal of reducing the time and resources currently required for such tasks.</font></li><li style=\"text-align: left;\"><font color=\"#000000\">A significant part of the operation of any hospital involves the acquisition, management and timely retrieval of great volumes of information. This information typically involves; patient personal information and medical history, staff information, room and ward scheduling, staff scheduling, operating theater scheduling and various facilities waiting lists. All of this information must be managed in an efficient and cost wise fashion so that an institution\'s resources may be effectively utilized HMS will automate the management of the hospital making it more efficient and error free. It aims at standardizing data, consolidating data ensuring data integrity and reducing inconsistencies.&nbsp;</font></li></ul>', NULL, NULL, '2020-05-20 07:21:52', NULL),
(2, 'contactus', 'Contact Details', 'D-204, Hole Town South West, Delhi-110096,India', 'info@gmail.com', 1122334455, '2020-05-20 07:24:07', '9 am To 8 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `bloodgrp` varchar(5) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `sugar` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `allergy` varchar(50) DEFAULT NULL,
  `locality` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `ename` varchar(50) DEFAULT NULL,
  `erelation` varchar(50) DEFAULT NULL,
  `ephone` bigint(10) DEFAULT NULL,
  `refdrname` varchar(50) DEFAULT NULL,
  `refdrclinic` varchar(50) DEFAULT NULL,
  `refdrcontact` bigint(10) DEFAULT NULL,
  `refdrlocality` varchar(50) DEFAULT NULL,
  `refdremail` varchar(50) DEFAULT NULL,
  `refdradd` varchar(100) DEFAULT NULL,
  `patother` varchar(500) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `bloodgrp`, `height`, `sugar`, `dob`, `weight`, `allergy`, `locality`, `city`, `ename`, `erelation`, `ephone`, `refdrname`, `refdrclinic`, `refdrcontact`, `refdrlocality`, `refdremail`, `refdradd`, `patother`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Amit Kumar', 1231231230, 'amitk@gmail.com', 'male', 'New Delhi india', 35, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-06 13:18:31', NULL),
(2, 1, 'trialpat', 7896541123, 'trial1@test.com', 'male', 'no address', 21, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 13:52:30', NULL),
(3, 1, 'Baliram Narkar', 1296541121, 'no1@test.com', 'Male', 'no address1', 21, 'no medication1', 'O+', '151', 'none', '2000-05-30', 50, 'no allergy1', 'kajuwadi1', 'thane1', 'rr1', 'uncle1', 1236547311, 'kamat1', 'kamat clinic1', 7896541451, 'kajuwadi1', 'kamat1@test.com', 'kajuwadi road lane1', 'jaa na re', '2023-02-03 13:58:47', '2023-02-05 07:50:40'),
(4, 5, 'Baliram Narkar', 1296541121, 'no1@test.com', 'Male', 'no address1', 21, 'no allergy', 'O+', '151', 'none', '2001-05-30', 50, 'no medication', 'kajuwadi1', 'thane1', 'rr1', 'uncle1', 1236547311, 'kamat1', 'kamat clinic1', 7896541451, 'kajuwadi1', 'kamat1@test.com', 'kajuwadi road lane1', 'no details to add', '2023-02-08 14:20:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:14:11', NULL, 1),
(2, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:21:20', '01-02-2023 08:50:52 AM', 1),
(3, NULL, 'amitk@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 13:15:43', NULL, 0),
(4, 2, 'amitk@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 13:15:58', '06-11-2022 06:50:46 PM', 1),
(5, 3, 'dontno@test.com', 0x3a3a3100000000000000000000000000, '2023-02-01 03:18:16', NULL, 1),
(6, 3, 'dontno@test.com', 0x3a3a3100000000000000000000000000, '2023-02-01 03:21:30', '01-02-2023 08:52:16 AM', 1),
(7, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-04 16:49:17', '04-02-2023 10:26:18 PM', 1),
(8, 2, 'amitk@gmail.com', 0x3a3a3100000000000000000000000000, '2023-02-04 16:56:41', NULL, 1),
(9, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-07 16:54:51', '07-02-2023 10:27:03 PM', 1),
(10, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 04:07:00', NULL, 1),
(11, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-08 04:11:55', '08-02-2023 10:01:45 AM', 1),
(12, 2, 'amitk@gmail.com', 0x3a3a3100000000000000000000000000, '2023-02-08 04:32:11', '08-02-2023 10:19:17 AM', 1),
(13, 2, 'amitk@gmail.com', 0x3a3a3100000000000000000000000000, '2023-02-08 15:31:06', '08-02-2023 09:11:41 PM', 1),
(14, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 06:27:33', NULL, 1),
(15, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 08:10:53', NULL, 1),
(16, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 08:15:21', NULL, 1),
(17, NULL, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 08:59:33', NULL, 0),
(18, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 08:59:44', '09-02-2023 02:46:19 PM', 1),
(19, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 09:16:43', '09-02-2023 04:07:48 PM', 1),
(20, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 12:21:20', '09-02-2023 05:57:05 PM', 1),
(21, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 12:31:33', NULL, 0),
(22, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-09 12:31:43', '09-02-2023 06:02:23 PM', 1),
(23, 6, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-23 06:38:18', '23-02-2023 01:12:50 PM', 1),
(24, NULL, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 04:01:49', NULL, 0),
(25, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 04:01:57', '26-02-2023 09:33:33 AM', 1),
(26, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 04:03:59', '26-02-2023 09:34:34 AM', 1),
(27, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 04:06:59', '26-02-2023 09:44:36 AM', 1),
(28, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 04:16:57', '26-02-2023 09:57:35 AM', 1),
(29, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 04:47:01', '26-02-2023 10:23:36 AM', 1),
(30, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 05:07:23', '26-02-2023 01:14:21 PM', 1),
(31, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 07:44:32', NULL, 1),
(32, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 14:46:00', NULL, 0),
(33, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-26 14:46:07', NULL, 1),
(34, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-27 05:49:02', '27-02-2023 11:35:15 AM', 1),
(35, 6, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-02-27 06:06:06', '27-02-2023 11:36:16 AM', 1),
(36, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-27 06:06:46', '27-02-2023 12:59:45 PM', 1),
(37, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-27 07:29:55', '27-02-2023 02:52:15 PM', 1),
(38, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-02-27 09:59:53', NULL, 1),
(39, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-03-11 12:32:36', '11-03-2023 06:18:50 PM', 1),
(40, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-13 04:39:32', NULL, 0),
(41, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-13 04:39:39', '13-03-2023 02:51:54 PM', 1),
(42, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-14 12:54:58', NULL, 0),
(43, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-14 12:55:04', '14-03-2023 06:35:02 PM', 1),
(44, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-15 08:08:10', NULL, 1),
(45, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 04:26:52', NULL, 1),
(46, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 06:59:55', NULL, 0),
(47, NULL, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 07:00:03', NULL, 0),
(48, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 07:00:11', '16-03-2023 03:27:43 PM', 1),
(49, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 10:06:34', '16-03-2023 10:44:02 PM', 1),
(50, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 17:14:12', '16-03-2023 11:15:34 PM', 1),
(51, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-16 17:45:51', NULL, 1),
(52, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:06:33', '17-03-2023 09:43:22 AM', 1),
(53, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:13:30', NULL, 0),
(54, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:13:43', NULL, 0),
(55, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:18:29', NULL, 0),
(56, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:19:05', NULL, 0),
(57, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:20:35', NULL, 0),
(58, NULL, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:23:39', NULL, 0),
(59, 5, 'bali1@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:23:50', NULL, 1),
(60, 5, 'bali1@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:23:50', '17-03-2023 09:53:58 AM', 1),
(61, 5, 'bali1@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:27:33', '17-03-2023 09:57:36 AM', 1),
(62, 5, 'bali1@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 04:28:21', '17-03-2023 10:28:42 AM', 1),
(63, 6, 'sai@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 05:32:47', '17-03-2023 11:06:21 AM', 1),
(64, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 05:39:16', '17-03-2023 11:09:43 AM', 1),
(65, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2023-03-17 05:40:01', '17-03-2023 11:11:31 AM', 1),
(66, 2, 'amitk@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-17 05:43:03', '17-03-2023 11:14:05 AM', 1),
(67, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-18 11:28:13', '18-03-2023 05:10:40 PM', 1),
(68, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-18 11:56:26', '18-03-2023 06:16:21 PM', 1),
(69, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-18 14:20:17', '18-03-2023 07:51:55 PM', 1),
(70, 5, 'bali@test.com', 0x3a3a3100000000000000000000000000, '2023-03-19 07:58:34', '19-03-2023 01:31:39 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Age` int(3) DEFAULT NULL,
  `Height` int(4) DEFAULT NULL,
  `Weight` int(3) DEFAULT NULL,
  `Medication` varchar(200) DEFAULT NULL,
  `Allergy` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Locality` varchar(100) DEFAULT NULL,
  `Ename` varchar(50) DEFAULT NULL,
  `Erelation` varchar(50) DEFAULT NULL,
  `Econtact` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`, `Age`, `Height`, `Weight`, `Medication`, `Allergy`, `Phone`, `Locality`, `Ename`, `Erelation`, `Econtact`) VALUES
(1, 'John Doe', 'A 123 ABC Apartment GZB 201017', 'Ghaziabad', 'male', 'johndoe12@test.com', '5c428d8875d2948607f3e3fe134d71b4', '2022-11-06 12:13:56', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Amit kumar', 'new Delhi india', 'New Delhi', 'male', 'amitk@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-11-06 13:15:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'bali bhau', 'wada', 'thane', 'male', 'dontno@test.com', 'Test@123', '2023-02-01 03:17:54', '2023-03-17 05:38:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Baliram Pansare', '15, Sai Om, ekta vihar,ekta nagar', 'Thane', 'Male', 'bali@test.com', 'f925916e2754e5e03f75dd58a5733251', '2023-02-09 12:19:04', '2023-03-17 04:29:00', 21, 165, 50, 'no medication taken', 'no allergies', 2147483641, 'Kajuwadi', 'Nishant', 'Friend', 2147483641),
(6, 'Sai Gadge', '6, chawl, ramchandra', 'Thane', 'Male', 'sai@test.com', 'f925916e2754e5e03f75dd58a5733251', '2023-02-09 12:28:32', NULL, 20, 150, 50, 'nothing medication ', 'no', 9324025123, 'Ramchandra', 'Bali', 'Brother', 7738986445);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`Billid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Eventid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Inventid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`Noteid`);

--
-- Indexes for table `patappointments`
--
ALTER TABLE `patappointments`
  ADD PRIMARY KEY (`Apptid`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingid`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `Billid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Eventid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `Noteid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patappointments`
--
ALTER TABLE `patappointments`
  MODIFY `Apptid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
