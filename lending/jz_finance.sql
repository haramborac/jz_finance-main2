-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 09:55 AM
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
-- Database: `jz_finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `insert_client`
--

CREATE TABLE `insert_client` (
  `id` int(11) NOT NULL,
  `cbranch` varchar(255) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `cphoto` text NOT NULL,
  `cfirstname` varchar(255) NOT NULL,
  `cmidname` varchar(255) NOT NULL,
  `clastname` varchar(255) NOT NULL,
  `csuffix` varchar(255) NOT NULL,
  `ccarea` varchar(255) NOT NULL,
  `ccycle` int(11) NOT NULL DEFAULT 1,
  `cchnumber` varchar(255) NOT NULL,
  `ccstreet` varchar(255) NOT NULL,
  `ccbarangay` varchar(255) NOT NULL,
  `cccity` varchar(255) NOT NULL,
  `ccontact` varchar(255) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `cage` varchar(255) NOT NULL,
  `cgender` varchar(255) NOT NULL,
  `cbirthday` date NOT NULL,
  `chnumber` varchar(255) NOT NULL,
  `cstreet` varchar(255) NOT NULL,
  `cbarangay` varchar(255) NOT NULL,
  `ccity` varchar(255) NOT NULL,
  `chome` varchar(255) NOT NULL,
  `cother` varchar(255) NOT NULL,
  `cnationality` varchar(255) NOT NULL,
  `ccivilstatus` varchar(255) NOT NULL,
  `cspouse` varchar(255) NOT NULL,
  `cchildren` varchar(255) NOT NULL,
  `ccomaker` varchar(255) NOT NULL,
  `cccontact` varchar(255) NOT NULL,
  `ccreditanalyst` varchar(255) NOT NULL,
  `cloanrequest` int(11) NOT NULL DEFAULT 0,
  `cloanamount` int(11) NOT NULL DEFAULT 0,
  `cloanstatus` varchar(255) NOT NULL DEFAULT 'Pending',
  `camountpaid` int(11) NOT NULL DEFAULT 0,
  `cadvance` int(11) DEFAULT 0,
  `csecdep` int(11) NOT NULL,
  `paydate` datetime DEFAULT current_timestamp(),
  `cbalance` int(11) NOT NULL DEFAULT 0,
  `coverdue` int(11) NOT NULL DEFAULT 0,
  `cinterest` int(11) NOT NULL,
  `clisteddate` datetime NOT NULL DEFAULT current_timestamp(),
  `creleaseddate` datetime DEFAULT NULL,
  `cmaturitydate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_client`
--

INSERT INTO `insert_client` (`id`, `cbranch`, `clientid`, `cphoto`, `cfirstname`, `cmidname`, `clastname`, `csuffix`, `ccarea`, `ccycle`, `cchnumber`, `ccstreet`, `ccbarangay`, `cccity`, `ccontact`, `cemail`, `cage`, `cgender`, `cbirthday`, `chnumber`, `cstreet`, `cbarangay`, `ccity`, `chome`, `cother`, `cnationality`, `ccivilstatus`, `cspouse`, `cchildren`, `ccomaker`, `cccontact`, `ccreditanalyst`, `cloanrequest`, `cloanamount`, `cloanstatus`, `camountpaid`, `cadvance`, `csecdep`, `paydate`, `cbalance`, `coverdue`, `cinterest`, `clisteddate`, `creleaseddate`, `cmaturitydate`) VALUES
(1, 'tandangsora', 'JZMB00001', 'CANATOY, CHARLEY B..jpg', 'charley', 'badlis', 'canatoy', '', '1', 1, '104', 'justina st. san miguel village', 'pasong tamo', 'quezon city', '09388002171', '', '53', 'Female', '1969-02-25', '104', 'justina st. san miguel village', 'pasong tamo', 'quezon city', '', '', 'Filipino', 'married', 'siesnando canatoy', '5', 'jezebel juanico badlis', '09305279691', 'Shieanne', 6000, 6000, 'OnGoing', 1300, 100, 400, '2022-08-30 17:49:07', 4700, 0, 17, '2022-08-09 17:50:42', '2022-08-09 00:00:00', '2022-11-18 00:00:00'),
(2, 'tandangsora', 'JZMB00002', 'TAN ID PIC.jpg', 'zenaida', 'peralta', 'tan', '', '1', 1, '1', 'blk 1, lot 1, villa corrina', 'pasong tamo', 'quezon city', '09498055917', '', '61', 'Female', '1960-09-30', '1', 'blk 1, lot 1, villa corrina', 'pasong tamo', 'quezon city', 'rent', '', 'Filipino', 'married', 't-V - DTERIO', '5', 'mark anthony p. tan', '09665507849', 'Shieanne', 8000, 8000, 'OnGoing', 1740, 140, 400, '2022-08-30 17:49:57', 6260, 0, 17, '2022-08-09 18:05:06', '2022-08-09 00:00:00', '2022-11-18 00:00:00'),
(3, 'tandangsora', 'JZMB00003', 'Julia ID PIC.jpg', 'catherine', 'resultay', 'julia', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09124010136', '', '34', 'Female', '1987-11-28', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'edward p. julia', '3', 'isabel resultay', '09983761655', 'Shieanne', 6000, 6000, 'OnGoing', 1260, 60, 380, '2022-08-26 17:53:24', 4740, 0, 17, '2022-08-09 18:18:55', '2022-08-09 00:00:00', '2022-11-18 00:00:00'),
(4, 'tandangsora', 'JZMB00004', '299130530_2437951939677158_1264219278934060214_n.jpg', 'Genelita', 'Hongria', 'Montenegro', '', '1', 1, '100', 'Tandang sora', 'Pasong Tamo', 'Quezon City', '09692960913', '123', '64', 'Female', '1957-08-27', '100', 'Tandang sora', 'Pasong Tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'Ponchito Montenegro', '3', 'Charles H. Montenegro', '09092472685', 'Shieanne', 10000, 10000, 'OnGoing', 1544, 244, 220, '2022-08-30 17:50:26', 8456, 0, 17, '2022-08-16 15:17:49', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(8, 'tandangsora', 'JZMB00005', '299332797_465641072074769_7737000898313695014_n.jpg', 'Isabel', 'Resurreccion', 'Resultay', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09708352754', '', '56', 'Female', '1966-07-02', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'teofilo j. resultay', '', 'Teofilo jimenez', '09983761655', 'Shieanne', 6000, 6000, 'OnGoing', 912, 132, 220, '2022-08-30 17:51:35', 5088, 0, 17, '2022-08-16 18:22:36', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(9, 'tandangsora', 'JZMB00009', '298640386_1117253612559621_4508552675503772136_n.jpg', 'julieta', 'romeo', 'ocay', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09318521765', '', '52', 'Female', '1970-04-03', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '', '', 'Filipino', 'married', 'enerio balida ocay', '', 'enerio balida ocay', '09510007964', 'Shieanne', 6000, 6000, 'OnGoing', 948, 168, 220, '2022-08-30 17:51:21', 5052, 0, 17, '2022-08-16 18:29:51', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(10, 'tandangsora', 'JZMB00010', '298430612_1063636507847080_2936601223415798881_n.jpg', 'lilyn', 'mirice', 'balcena', '', '1', 1, '5', 'a #60 sitio mabilog', 'culiat', 'quezon city', '09155915994', '', '36', 'Female', '1986-01-07', '5', 'a #60 sitio mabilog', 'culiat', 'quezon city', '', '', 'Filipino', 'married', 'Bryan Carlo Gerona', '', 'Bryan Carlo Gerona', '09950731905', 'Shieanne', 8000, 8000, 'OnGoing', 1120, 80, 280, '2022-08-30 17:50:41', 6880, 0, 17, '2022-08-16 18:41:44', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(11, 'tandangsora', 'JZMB00011', '298595398_743059856767608_6090124223446758443_n.jpg', 'sonia', 'sabino', 'leona', '', '1', 1, '260', 'panlinio compound', 'pasong tampo', 'quezon city', '09707490006', '', '56', 'Female', '1965-12-28', '260', 'panlinio compound', 'pasong tampo', 'quezon city', 'owned', '', 'Filipino', 'married', 'edgardo leona', '', 'Eugene leona', '09489367913', 'Shieanne', 10000, 10000, 'OnGoing', 1430, 130, 260, '2022-08-30 17:50:11', 8570, 0, 17, '2022-08-16 18:50:44', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(12, 'tandangsora', 'JZMB00012', '299110268_3102452663304721_6135334482094343722_n.jpg', 'aleli', 'ferran', 'beriso', '', '1', 1, '55', 'lot 5 magic circle housing', 'pasong tamo', 'Quezon City', '09617363619', '', '48', 'Female', '1973-09-28', '55', 'lot 5 magic circle housing', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'efren beriso', '', 'Mery grace ferran', '09617363619', 'Shieanne', 8000, 8000, 'OnGoing', 880, 80, 220, '2022-08-30 17:52:05', 7120, 0, 17, '2022-08-16 19:00:02', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(13, 'tandangsora', 'JZMB00013', '298032472_1266096054218875_6649944944996468416_n.jpg', 'rodora', 'bulakja', 'tupas', '', '1', 1, '15', 'lot srcc magic circle pingkian II', 'pasong tamo', 'Quezon City', '09365386971', '', '39', 'Female', '1982-11-23', '15', 'lot srcc magic circle pingkian II', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'single', '', '', 'rodora bulakja tupas', '09365386971', 'Shieanne', 8000, 8000, 'OnGoing', 880, 80, 220, '2022-08-30 17:52:19', 7120, 0, 17, '2022-08-16 19:13:51', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(14, 'tandangsora', 'JZMB00014', '298000201_1511008416013898_7752476333828725217_n.jpg', 'maricel', 'datu', 'ferrer', '', '1', 1, '15', 'lot 7 srcc magic circle housing pingkian II  ', 'Pasong Tamo', 'Quezon City', '09278543310', '', '52', 'Female', '1970-06-24', '15', 'lot 7 srcc magic circle housing pingkian II  ', 'Pasong Tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'arnez f ferrer', '', 'Maricel Datu ferrer', '09278543310', 'Shieanne', 8000, 8000, 'OnGoing', 880, 80, 220, '2022-08-30 17:51:51', 7120, 0, 17, '2022-08-16 19:22:49', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(15, 'tandangsora', 'JZMB00015', '298176493_7998117473564173_298503957760055298_n.jpg', 'marilyn', 'gonzales', 'teopiz', '', '1', 1, '25', 'emerald street', 'pasong tamo', 'quezon city', '09122820527', '', '57', 'Female', '1965-03-01', '25', 'emerald street', 'pasong tamo', 'quezon city', '', 'caretaker', 'Filipino', 'married', 'nestor urigna', '', 'nestor urigna', '09122820527', 'Shieanne', 8000, 6000, 'OnGoing', 1027, 187, 260, '2022-08-30 17:51:02', 4973, 0, 17, '2022-08-16 19:59:14', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(16, 'tandangsora', 'JZMB00016', '300852950_1690967004613112_8943840191983186903_n.jpg', 'caselyn', 'resultay', 'guerrero', '', '1', 1, '2', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09266970060', '', '30', 'Female', '1992-01-01', '2', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', '', '3', 'Nick Resultay', '09124010649', 'Shieanne', 5000, 5000, 'Released', 0, 0, 0, '2022-09-01 10:36:02', 5000, 50, 17, '2022-09-01 11:34:39', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(27, 'tandangsora', 'JZMB00017', '302051725_915500119854211_7223094226471966749_n.jpg', 'helen', 'san pedro', 'villa', '', '1', 1, '297', 'san miguel village', 'pasong tamo', 'Quezon City', '09979104922', '', '55', 'Female', '1967-03-20', '297', 'san miguel village', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', '', '1', 'franklino a. villa', '09979104921', 'Shieanne', 8000, 8000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 8000, 80, 17, '2022-09-01 18:34:32', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(28, 'tandangsora', 'JZMB00028', '301800851_440140858176647_6180970070001995586_n.jpg', 'franklino', 'acaso', 'villa', '', '1', 1, '297', 'san miguel village', 'pasong tamo', 'Quezon City', '09979104921', '', '65', 'Male', '1956-11-10', '297', 'san miguel village', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'helen villa', '2', 'helen villa', '09979104922', 'Shieanne', 8000, 8000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 8000, 80, 17, '2022-09-01 18:43:30', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(29, 'tandangsora', 'JZMB00029', '300747479_1040829143289751_5174201594039267928_n.jpg', 'teofilo', 'jimenez', 'resultay', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09983761655', '', '59', 'Male', '1962-09-20', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'isabel resultay', '', 'johnmark navarro', '09309314242', 'Shieanne', 6000, 6000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 6000, 60, 17, '2022-09-01 18:54:18', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(30, 'tandangsora', 'JZMB00030', '301983832_1071557100386981_6478995984809670634_n.jpg', 'flordeliza', 'pilambato', 'banag-banag', '', '1', 1, '16', 'esmeralda ext. pangilinan compound', 'bahay-toro', 'Quezon City', '09774835218', '', '54', 'Female', '1968-01-17', '16', 'esmeralda ext. pangilinan compound', 'bahay-toro', 'Quezon City', 'owned', '', 'Filipino', 'married', 'danica pilambato', '5', 'danica pilambato', '09197320495', 'Shieanne', 6000, 6000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 6000, 60, 17, '2022-09-01 19:03:06', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(31, 'tandangsora', 'JZMB00031', '301506829_394721242854321_1683596424470472442_n.jpg', 'meralgin', 'polinar', 'sabella', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09704799519', '', '19', 'Female', '2002-09-02', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'rent', '', 'Filipino', 'single', '', '', 'edward pilapil julia', '09124010136', 'Shieanne', 6000, 6000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 6000, 60, 17, '2022-09-01 19:12:36', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(32, 'tandangsora', 'JZMB00032', '301523037_1216344932550452_3144987611829200377_n.jpg', 'Edward', 'pilapil', 'julia', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '009124010136', '', '34', 'Male', '1987-08-25', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'catherine julia', '3', 'rosalinda navarro', '009559167991', 'Shieanne', 6000, 6000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 6000, 60, 17, '2022-09-01 19:26:03', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(33, 'tandangsora', 'JZMB00033', '301200209_444504717700958_4818911805762181801_n.jpg', 'annilyn', 'agapay', 'andalas', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09517761066', '', '31', 'Female', '1991-08-07', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'rent', '', 'Filipino', 'single', '', '', 'christopher montefalcon', '09270562712', 'Shieanne', 5000, 5000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 5000, 50, 17, '2022-09-01 19:31:48', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(34, 'tandangsora', 'JZMB00034', '301541014_455343749853015_6738438451415548886_n.jpg', 'victoria', 'Resurreccion', 'nolasco', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09123018118', '', '59', 'Female', '1962-12-23', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'edwardo nolasco', '1', 'raymond jumilla', '09123018118', 'Shieanne', 6000, 6000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 6000, 60, 17, '2022-09-01 19:41:18', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(35, 'tandangsora', 'JZMB00035', '300513405_641984497481402_5911564992327250760_n.jpg', 'enerio', 'balida', 'ocay', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09510007964', '', '56', 'Male', '1966-05-12', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'rent', '', 'Filipino', 'married', 'julieta ocay', '', 'catherine julia', '9124010136', 'Shieanne', 6000, 6000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 6000, 60, 17, '2022-09-01 19:46:45', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(36, 'tandangsora', 'JZMB00036', '301320827_439295831555589_3297955451825791540_n.jpg', 'Jherlyn', 'aguirre', 'donor', '', '1', 1, '800', 'G Cornus st. dominic 6 ', 'pasong tamo', 'Quezon City', '09566083436', '', '57', 'Female', '1964-11-09', '800', 'G Cornus st. dominic 6 ', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'tito donor', '2', 'tito donor ', '09566083436', 'Shieanne', 10000, 10000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 10000, 100, 17, '2022-09-01 19:53:57', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(37, 'tandangsora', 'JZMB00037', '301050562_1383266242200434_961416161398430282_n.jpg', 'susan ', 'reyes ', 'resurreccion', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '009983761655', '', '60', 'Female', '1961-07-08', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'ricardo resurreccion', '', 'ricardo sarmiento resurreccion', '009309314242', 'Shieanne', 6000, 6000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 6000, 60, 17, '2022-09-01 19:59:54', '2022-09-01 00:00:00', '2022-12-11 00:00:00'),
(38, 'tandangsora', 'JZMB00038', '300992562_3159786397655462_5423991869600520653_n (2).jpg', 'cesar', 'Resurreccion', 'Resultay', '', '1', 1, '02', 'sarmiento Compound', 'pasong tamo', 'Quezon City', '0938133790', '', '32', 'Male', '1989-10-17', '02', 'sarmiento Compound', 'pasong tamo', 'Quezon City', '', '', 'Filipino', 'married', '', '', 'rosalinda.navarro', '938133790', 'Shieanne', 6000, 6000, 'Released', 0, 0, 0, '2022-09-01 00:00:00', 6000, 60, 17, '2022-09-01 20:07:20', '2022-09-01 00:00:00', '2022-12-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `insert_comaker`
--

CREATE TABLE `insert_comaker` (
  `id` int(11) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `cmcontact` varchar(255) NOT NULL,
  `cmaddress` varchar(255) NOT NULL,
  `cmgender` varchar(255) NOT NULL,
  `cmage` varchar(255) NOT NULL,
  `cmbday` date NOT NULL,
  `cmprofession` varchar(255) NOT NULL,
  `cmnationality` varchar(255) NOT NULL,
  `cmcivil` varchar(255) NOT NULL,
  `cmbusiness` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_comaker`
--

INSERT INTO `insert_comaker` (`id`, `clientid`, `cmcontact`, `cmaddress`, `cmgender`, `cmage`, `cmbday`, `cmprofession`, `cmnationality`, `cmcivil`, `cmbusiness`) VALUES
(1, 'JZMB00001', '09305279691', '01 masiu st. maharlika village', 'Female', '44', '1978-07-04', 'business owner', 'filipino', 'Single', 'mings pigery'),
(2, 'JZMB00002', '09665507849', 'villa corina', 'Male', '26', '1996-05-15', 'grab food', 'filipino', 'Single', 'none'),
(3, 'JZMB00003', '09983761655', '#02 sarmiento compound himalayan road pasong tamo q.c.', 'Female', '55', '1966-07-02', 'none', 'filipino', 'Single', 'ukay-ukay'),
(7, 'JZMB00004', '09092472685', '#100 Tandang Sora, Brgy. Pasong Tamo, Q.C.', 'Male', '25', '1997-07-26', 'BPO', 'filipino', 'Single', 'None'),
(8, 'JZMB00005', '09983761655', '02 sarmiento compound pasong tamo quezon city', 'Male', '59', '1962-09-20', 'traffic enforcer', 'filipino', 'Married', 'none'),
(9, 'JZMB00009', '09510007964', '02 sarmiento compound pasong tamo quezon city', 'Male', '56', '1962-09-20', 'tricycle driver', 'filipino', 'Married', 'none'),
(10, 'JZMB00010', '09950731905', '5a #60 gnacle drive sition mabilog culiat quezon city', 'Male', '31', '1990-07-26', 'lalamove rider', 'filipino', 'Single', 'none'),
(11, 'JZMB00011', '09489367913', '260 panlino compound pasong tamo quezon city', 'Male', '30', '1992-06-16', 'tricycle driver', 'filipino', 'Single', 'none'),
(12, 'JZMB00012', '09617363619', 'blk 55 lot 5 magic circle pingkiaw 2 pasong tamo qc', 'Female', '25', '1996-12-03', 'office staff', 'filipino', 'Married', 'none'),
(13, 'JZMB00013', '09365386971', 'blk 15 lot 9 srcc magic housing pingkian 2 brgy pasong tamo qc', 'Male', '39', '1982-11-23', 'none', 'filipino', 'Married', 'none'),
(14, 'JZMB00014', '09278543310', 'b15 lot 7 srcc magic circle housing pingkian II pasong tamo quezon city', 'Female', '52', '1970-06-24', 'cook', 'filipino', 'Married', 'eatery'),
(15, 'JZMB00015', '09122820527', '25 emerald street marcel village pasong tamo quezon city', 'Male', '46', '1975-12-29', 'tuner', 'filipino', 'Married', 'tuning services'),
(16, 'JZMB00016', '09124010649', '02 sarmiento compound pasong tamo quezon city', 'Male', '47', '1998-10-29', 'None', 'filipino', 'Single', 'Online clothing & Cup'),
(17, 'JZMB00017', '09979104921', '02 sarmiento compound pasong tamo quezon city', 'Male', '65', '1956-11-10', 'None', 'filipino', 'Married', 'none'),
(18, 'JZMB00028', '09979104922', '02 sarmiento compound pasong tamo quezon city', 'Female', '55', '1967-03-20', 'None', 'filipino', 'Married', 'Carinderia'),
(19, 'JZMB00029', '09309314242', '02 sarmiento compound pasong tamo quezon city', 'Male', '62', '1960-04-01', 'repair man', 'filipino', 'Married', 'none'),
(20, 'JZMB00030', '09197320495', '16 esmeralda street pangilinan compound tandang sora', 'Female', '21', '2001-06-26', 'cashier', 'filipino', 'Single', 'none'),
(21, 'JZMB00031', '09124010136', '02 sarmiento compound pasong tamo quezon city', 'Male', '35', '1987-08-25', 'tricycle driver', 'filipino', 'Married', 'none'),
(22, 'JZMB00032', '009559167991', '02 sarmiento compound pasong tamo quezon city', 'Male', '34', '1947-11-10', 'None', 'filipino', 'Single', 'none'),
(23, 'JZMB00033', '09270562712', '02 sarmiento compound pasong tamo quezon city', 'Male', '34', '1987-09-09', 'driver', 'filipino', 'Married', 'none'),
(24, 'JZMB00034', '09123018118', '02 sarmiento compound pasong tamo quezon city', 'Male', '38', '1984-08-04', 'none', 'filipino', 'Single', 'none'),
(25, 'JZMB00035', '9124010136', '02 sarmiento compound pasong tamo quezon city', 'Female', '34', '1987-11-28', 'vendor', 'filipino', 'Married', 'vendor'),
(26, 'JZMB00036', '09566083436', '800 g cornus st. st dominic 6 tandang sora quezon city', 'Male', '74', '1947-12-08', 'none', 'filipino', 'Married', 'none'),
(27, 'JZMB00037', '009309314242', '02 sarmiento compound pasong tamo quezon city', 'Male', '34', '1960-04-01', 'repair man', 'filipino', 'Single', 'none'),
(28, 'JZMB00038', '938133790', '02 sarmiento compound pasong tamo quezon city', 'Male', '50', '1971-09-09', 'vendor', 'filipino', 'Single', 'vendor');

-- --------------------------------------------------------

--
-- Table structure for table `insert_creditanalyst`
--

CREATE TABLE `insert_creditanalyst` (
  `id` int(11) NOT NULL,
  `cabranch` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_creditanalyst`
--

INSERT INTO `insert_creditanalyst` (`id`, `cabranch`, `name`, `area`) VALUES
(1, 'tandangsora', 'Shieanne', '1'),
(7, 'tandangsora', 'Rock', '2');

-- --------------------------------------------------------

--
-- Table structure for table `insert_cssaccount`
--

CREATE TABLE `insert_cssaccount` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_cssaccount`
--

INSERT INTO `insert_cssaccount` (`id`, `branch`, `fullname`, `username`, `password`) VALUES
(1, 'all', 'Chatspeak Admin', 'Chatspeak Admin', '$2y$10$GCijT05ApPegI1cCuiI85uUBt5Km0/vLIKBsw6eg7WGtyAOdBRD.y'),
(10, 'stamaria', 'stamaria', 'stamaria', '$2y$10$ADHzR1V.PZOzl.qL/Yu0GOB55GCFHVNSbFFbhbmp5Co4E0H5sodiW'),
(12, 'tandangsora', 'tandang sora', 'tandangsora', '$2y$10$wFVPyECzhjgk1h4GwnyQs.kSNcJ5lT0aAyaclsJvo4cUnRIz7npPi'),
(13, 'meycauayan', 'meycauayan', 'meycauayan', '$2y$10$JNbeN2FjcG/2QNpaqLfy/.cVSMaCmCNiKfk1Pry04x3cnTEA/GlYi'),
(15, 'tandangsora', 'Mae Viado', 'mae', '$2y$10$e9gtc7ZaVOhQf/0752.mde2zuq/GrloxUovkmuQAetRMBRwsawMba');

-- --------------------------------------------------------

--
-- Table structure for table `insert_deduction`
--

CREATE TABLE `insert_deduction` (
  `id` int(11) NOT NULL,
  `loan_amount` int(255) NOT NULL DEFAULT 0,
  `daily_collection` int(255) NOT NULL DEFAULT 0,
  `processing_fee` int(255) NOT NULL DEFAULT 0,
  `ins_premium` int(255) NOT NULL DEFAULT 0,
  `sec_deposit` int(255) NOT NULL DEFAULT 0,
  `others` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_deduction`
--

INSERT INTO `insert_deduction` (`id`, `loan_amount`, `daily_collection`, `processing_fee`, `ins_premium`, `sec_deposit`, `others`) VALUES
(1, 5000, 50, 200, 95, 25, 0),
(2, 6000, 60, 200, 160, 30, 0),
(3, 7000, 70, 200, 160, 35, 0),
(4, 8000, 80, 200, 160, 40, 0),
(5, 9000, 90, 200, 160, 45, 0),
(6, 10000, 100, 250, 160, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `insert_id`
--

CREATE TABLE `insert_id` (
  `id` int(11) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `clanalyst` varchar(255) NOT NULL,
  `clvalidid1` varchar(255) NOT NULL,
  `clidtype1` varchar(255) NOT NULL,
  `clidcode1` varchar(255) NOT NULL,
  `clvalidid2` varchar(255) NOT NULL,
  `clidtype2` varchar(255) NOT NULL,
  `clidcode2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_id`
--

INSERT INTO `insert_id` (`id`, `clientid`, `clanalyst`, `clvalidid1`, `clidtype1`, `clidcode1`, `clvalidid2`, `clidtype2`, `clidcode2`) VALUES
(1, 'JZMB00001', 'Shieanne', 'TIN ID.jpg', 'Tin', '399-584-495-000', '', 'Others', '76070450AB2569'),
(2, 'JZMB00002', 'Shieanne', 'TIN ID.jpg', 'Tin', '505-651-114-0000', '', '', ''),
(3, 'JZMB00003', 'Shieanne', 'TIN ID.jpg', 'Tin', '430-731-682-000', '', '', ''),
(7, 'JZMB00004', 'Shieanne', '', '', '', '298515486_801029117571923_6830275758004008101_n.jpg', 'Others', '08400000603136'),
(8, 'JZMB00005', 'Shieanne', '', '', '', '298302527_1851777195171615_7390273372058895177_n.jpg', 'Others', '08400000662710'),
(9, 'JZMB00009', 'Shieanne', '298016021_485701490227476_5494755109484835929_n.jpg', 'Tin', '452-842-693-000', '', '', ''),
(10, 'JZMB00010', 'Shieanne', '298533658_1179584662773697_681531422013631853_n.jpg', 'Philhealth', '03-026351857-4', '', '', '08400000662710'),
(11, 'JZMB00011', 'Shieanne', '', '', '', '298210984_1145086749552925_6318235181351646727_n.jpg', '', '08400000370593'),
(12, 'JZMB00012', 'Shieanne', '298804210_469267231431261_6866534424474248487_n.jpg', 'Philhealth', '03-200470283-1', '', '', ''),
(13, 'JZMB00013', 'Shieanne', '297523809_584164853335708_3430489723033220457_n.jpg', 'Tin', '370-372-257-000', '', '', ''),
(14, 'JZMB00014', 'Shieanne', '298009661_1120264195250732_6044558008820256115_n.jpg', 'Tin', '505-585-681-00000', '', '', ''),
(15, 'JZMB00015', 'Shieanne', '298986912_620664966371139_4796204947813216605_n.jpg', 'Tin', '386-953-427-000', '', '', ''),
(16, 'JZMB00016', 'Shieanne', '300801757_801790967930616_4774187103656071638_n.jpg', 'UMID', '0111-1690186-9', '', '', ''),
(17, 'JZMB00017', 'Shieanne', '300536713_355286976689862_2963323736380724775_n.jpg', 'Tin', '225-530-219-000', '', '', ''),
(18, 'JZMB00028', 'Shieanne', '', '', '', '299999083_1280366026132197_2140835969939788857_n.jpg', 'Others', ''),
(19, 'JZMB00029', 'Shieanne', '303468606_1019762745338823_394590105099876445_n.jpg', 'Tin', '145-816-448', '', '', ''),
(20, 'JZMB00030', 'Shieanne', '301983832_1071557100386981_6478995984809670634_n (2).jpg', 'Tin', '466-225-419-000', '', '', ''),
(21, 'JZMB00031', 'Shieanne', '', '', '', '300986489_2292477494244394_5948837345139441019_n.jpg', 'Barangay', '0504BP2953'),
(22, 'JZMB00032', 'Shieanne', '300742545_643939896961926_4233220140978258300_n.jpg', 'License', 'N02-19-057109', '', '', ''),
(23, 'JZMB00033', 'Shieanne', '301323645_795024208408800_1349621622275213876_n.jpg', 'Tin', '360-070-744-000', '', '', ''),
(24, 'JZMB00034', 'Shieanne', '301324230_768151654444978_6207092447270764609_n.jpg', 'Tin', '431-861-191-000', '', '', ''),
(25, 'JZMB00035', 'Shieanne', '302495804_960823808651961_7751686575378214498_n.jpg', 'Tin', '418-118-118-000', '', '', ''),
(26, 'JZMB00036', 'Shieanne', '302018157_448971477291303_6760389399998330369_n.jpg', 'Tin', '213-746-735-000', '', '', ''),
(27, 'JZMB00037', 'Shieanne', '', '', '', '301301269_652423512625881_6897063681783363860_n.jpg', 'Others', '08488000663387'),
(28, 'JZMB00038', 'Shieanne', '300992562_3159786397655462_5423991869600520653_n.jpg', 'License', 'n01-12-018080', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `insert_interest`
--

CREATE TABLE `insert_interest` (
  `id` int(11) NOT NULL,
  `interest` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_interest`
--

INSERT INTO `insert_interest` (`id`, `interest`) VALUES
(1, 17),
(2, 17),
(3, 17),
(4, 17),
(5, 17),
(6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `insert_payment`
--

CREATE TABLE `insert_payment` (
  `id` int(11) NOT NULL,
  `ipbranch` varchar(255) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `creditanalyst` varchar(255) NOT NULL,
  `date_paid` date NOT NULL,
  `days` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `secdep` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT 'NO COMMENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_payment`
--

INSERT INTO `insert_payment` (`id`, `ipbranch`, `clientid`, `area`, `creditanalyst`, `date_paid`, `days`, `payment`, `secdep`, `type`, `comment`) VALUES
(3, 'tandangsora', 'JZMB00001', '', 'Shieanne', '2022-08-09', 0, 0, 0, '', 'NEW CYCLE'),
(4, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-09', 1, 120, 40, '', '2 days advance payment'),
(6, 'tandangsora', 'JZMB00002', '', 'Shieanne', '2022-08-09', 0, 0, 0, '', 'NEW CYCLE'),
(7, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-09', 1, 160, 0, '', '2 days advance payment'),
(8, 'tandangsora', 'JZMB00003', '', 'Shieanne', '2022-08-09', 0, 0, 0, '', 'NEW CYCLE'),
(9, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-09', 1, 120, 40, '', '2 days advance payment'),
(10, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-10', 2, 80, 20, '', 'august 10, 2022\r\n'),
(11, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-10', 2, 60, 20, '', 'august 10, 2022'),
(12, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-10', 2, 60, 20, '', 'august 9, 2022'),
(13, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-11', 3, 80, 20, '', 'august 11, 2022\r\n'),
(14, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-11', 3, 60, 20, '', 'august 11, 2022'),
(15, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-11', 3, 60, 20, '', 'August 11, 2022'),
(23, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-15', 4, 120, 40, '', 'August 12-13, 2022'),
(24, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-15', 4, 120, 40, '', 'August 14-15, 2022'),
(25, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-15', 4, 120, 40, '', 'August 12-13, 2022'),
(26, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-15', 4, 120, 40, '', 'August 14-15, 2022'),
(27, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-15', 4, 160, 40, '', 'August 12-13, 2022'),
(28, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-15', 4, 160, 40, '', 'August 14-15, 2022'),
(29, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-16', 5, 60, 20, '', 'August 16, 2022'),
(30, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-16', 5, 60, 20, '', 'August 16, 2022'),
(31, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-16', 5, 80, 60, '', 'August 16, 2022 + August 9 (40.00 savings)'),
(32, '', 'JZMB00004', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(33, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-16', 1, 200, 40, '', 'August 16, 2022 - 2 days advance payment'),
(34, '', 'JZMB00005', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(35, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-16', 1, 120, 40, '', 'August 16,2022 2 days advance payment'),
(36, '', 'JZMB00009', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(37, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-16', 1, 120, 40, '', 'August 16,2022 - 2 days advance payment'),
(38, '', 'JZMB00010', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(39, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-16', 1, 160, 40, '', 'August 16, 2022 - 2 days advance payment'),
(40, '', 'JZMB00011', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(41, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-16', 1, 200, 40, '', 'august 16, 2022 - 2 days advance payment'),
(42, '', 'JZMB00012', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(43, 'tandangsora', 'JZMB00012', '1', 'Shieanne', '2022-08-16', 1, 160, 40, '', 'august 16, 2022 - 2 days advance payment'),
(44, '', 'JZMB00013', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(45, 'tandangsora', 'JZMB00013', '1', 'Shieanne', '2022-08-16', 1, 160, 40, '', 'august 16, 2022 - 2 days advance payment'),
(46, '', 'JZMB00014', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(47, 'tandangsora', 'JZMB00014', '1', 'Shieanne', '2022-08-16', 1, 160, 40, '', 'august 16, 2022 - 2 days advance payment'),
(48, '', 'JZMB00015', '', 'Shieanne', '2022-08-16', 0, 0, 0, '', 'NEW CYCLE'),
(49, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-16', 1, 180, 80, '', 'August 16, 2022 - 3 days advance payment'),
(50, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-22', 6, 60, 20, '', 'August 17, 2022'),
(51, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-22', 6, 60, 20, '', 'August 18, 2022'),
(52, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-22', 6, 120, 40, '', 'August 19-20, 2022'),
(53, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-22', 6, 60, 20, '', 'August 17, 2022'),
(54, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-22', 6, 60, 20, '', 'August 18, 2022'),
(55, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-22', 6, 160, 40, '', 'August 19-20, 2022'),
(56, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-22', 6, 100, 20, '', 'August 17, 2022'),
(57, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-22', 6, 80, 20, '', 'August 18, 2022'),
(58, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-22', 6, 180, 40, '', 'August 19-20, 2022'),
(59, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-22', 2, 100, 20, '', 'August 17, 2022'),
(60, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-22', 2, 100, 20, '', 'August 18, 2022'),
(61, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-22', 2, 200, 40, '', 'August 19-20, 2022'),
(63, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-22', 2, 148, 20, '', 'August 17, 2022'),
(64, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-22', 2, 148, 20, '', 'August 18, 2022\r\n'),
(65, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-22', 2, 148, 20, '', 'August 19-20, 2022'),
(66, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'august 17, 2022'),
(67, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'august 18, 2022'),
(68, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-22', 2, 160, 40, '', 'august 19-20, 2022'),
(69, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-22', 2, 92, 20, '', 'August 17, 2022'),
(70, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-22', 2, 100, 20, '', 'August 18, 2022'),
(71, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-22', 2, 92, 20, '', 'August 19-20, 2022'),
(72, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-22', 2, 92, 20, '', 'August 17, 2022'),
(73, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-22', 2, 92, 20, '', 'August 18, 2022'),
(74, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-22', 2, 92, 20, '', 'August 19-20, 2022'),
(75, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-22', 2, 92, 20, '', 'August 17, 2022'),
(76, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-22', 2, 92, 20, '', 'August 18, 2022'),
(77, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-22', 2, 92, 20, '', 'August 19-20, 2022'),
(78, 'tandangsora', 'JZMB00014', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'August 17, 2022\r\n'),
(79, 'tandangsora', 'JZMB00014', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'August 18, 2022'),
(80, 'tandangsora', 'JZMB00012', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'August 17, 2022'),
(81, 'tandangsora', 'JZMB00012', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'August 18, 2022'),
(82, 'tandangsora', 'JZMB00013', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'August 17, 2022\r\n'),
(83, 'tandangsora', 'JZMB00013', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'August 18, 2022'),
(84, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-24', 7, 140, 20, '', 'Aug 22- 2022'),
(85, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-24', 7, 60, 20, '', '8-23-22'),
(86, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-24', 7, 60, 20, '', '8-24-22'),
(87, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-24', 7, 140, 20, '', '8-22-22'),
(88, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-24', 7, 60, 20, '', '8-23-22'),
(89, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-24', 7, 60, 20, '', '8-24-22'),
(90, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-24', 7, 180, 20, '', '8/22/22'),
(91, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-24', 7, 80, 20, '', '8-23-22'),
(92, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-24', 7, 80, 20, '', '8/24/22'),
(93, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-24', 3, 230, 20, '', '8/22/22'),
(94, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-24', 3, 100, 20, '', '8/23/22'),
(95, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-24', 3, 100, 20, '', '8/24/22'),
(96, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-24', 3, 150, 20, '', '8/22/22'),
(97, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-24', 3, 150, 20, '', '8/23/22'),
(98, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-24', 3, 160, 40, '', '8/22/22'),
(99, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-24', 3, 80, 20, '', '8/23/22'),
(100, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-24', 3, 80, 20, '', '8/24/22'),
(101, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-24', 3, 92, 20, '', '8/22/22'),
(102, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-24', 3, 92, 20, '', '8/23/22'),
(103, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-24', 3, 100, 20, '', '8/24/22'),
(104, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-24', 3, 92, 20, '', '8/22/22'),
(105, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-24', 3, 92, 20, '', '8/23/22'),
(106, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-24', 3, 92, 20, '', '8/24/22'),
(107, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-24', 3, 92, 20, '', '8/22/22'),
(108, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-24', 3, 92, 20, '', '8/23/22'),
(109, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-24', 3, 92, 20, '', '8/24/22'),
(110, 'tandangsora', 'JZMB00014', '1', 'Shieanne', '2022-08-24', 3, 160, 40, '', '8/23/22'),
(111, 'tandangsora', 'JZMB00014', '1', 'Shieanne', '2022-08-24', 3, 80, 20, '', '8/24/22'),
(112, 'tandangsora', 'JZMB00012', '1', 'Shieanne', '2022-08-24', 3, 160, 40, '', '8/23/22'),
(113, 'tandangsora', 'JZMB00012', '1', 'Shieanne', '2022-08-24', 3, 80, 20, '', '8/24/22'),
(114, 'tandangsora', 'JZMB00013', '1', 'Shieanne', '2022-08-24', 3, 160, 40, '', '8/23/22'),
(115, 'tandangsora', 'JZMB00013', '1', 'Shieanne', '2022-08-24', 3, 80, 20, '', '8/24/22'),
(116, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-24', 7, 20, 0, '', '8/24 additonal'),
(117, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-25', 8, 80, 20, '', 'August 25, 2022\r\n'),
(118, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-25', 4, 100, 20, '', 'August 25, 2022'),
(119, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-25', 4, 300, 40, '', 'August 24-25, 2022'),
(120, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-25', 4, 80, 20, '', 'August 25, 2022'),
(121, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-25', 4, 92, 20, '', 'August 25, 2022\r\n'),
(122, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-25', 4, 92, 20, '', 'August 25, 2022'),
(124, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-25', 4, 60, 20, '', 'August 25, 2022'),
(125, 'tandangsora', 'JZMB00003', '1', 'Shieanne', '2022-08-26', 8, 180, 60, '', 'August 24,25,26, 2022'),
(126, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-26', 9, 80, 20, '', 'August 26, 2022\r\n'),
(127, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-26', 5, 200, 40, '', 'August 25, 26, 2022'),
(128, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-26', 5, 150, 20, '', 'August 26, 2022'),
(129, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-26', 5, 80, 20, '', 'August 26, 2022'),
(130, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-26', 5, 92, 20, '', 'August 26, 2022'),
(131, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-26', 5, 92, 20, '', 'August 26, 2022'),
(132, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-26', 5, 92, 20, '', 'August 26, 2022'),
(133, 'tandangsora', 'JZMB00014', '1', 'Shieanne', '2022-08-26', 4, 80, 20, '', 'August 26, 2022'),
(134, 'tandangsora', 'JZMB00012', '1', 'Shieanne', '2022-08-26', 4, 80, 20, '', 'August 26, 2022'),
(135, 'tandangsora', 'JZMB00013', '1', 'Shieanne', '2022-08-26', 4, 80, 20, '', 'August 26, 2022\r\n'),
(136, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-26', 5, 8, 0, '', 'August 26, 2022'),
(137, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-26', 8, 60, 20, '', 'August 26, 2022'),
(138, 'tandangsora', 'JZMB00001', '1', 'Shieanne', '2022-08-30', 9, 180, 60, '', 'August 30, 2022'),
(139, 'tandangsora', 'JZMB00002', '1', 'Shieanne', '2022-08-30', 10, 160, 40, '', 'August 30, 2022'),
(140, 'tandangsora', 'JZMB00011', '1', 'Shieanne', '2022-08-30', 6, 100, 20, '', 'August 30, 2022'),
(141, 'tandangsora', 'JZMB00004', '1', 'Shieanne', '2022-08-30', 6, 150, 20, '', 'August 30, 2022'),
(142, 'tandangsora', 'JZMB00010', '1', 'Shieanne', '2022-08-30', 6, 160, 40, '', 'August 30, 2022'),
(143, 'tandangsora', 'JZMB00015', '1', 'Shieanne', '2022-08-30', 6, 95, 20, '', 'August 30, 2022'),
(144, 'tandangsora', 'JZMB00009', '1', 'Shieanne', '2022-08-30', 6, 92, 20, '', 'August 30, 2022'),
(145, 'tandangsora', 'JZMB00005', '1', 'Shieanne', '2022-08-30', 6, 80, 20, '', 'August 30, 2022'),
(146, 'tandangsora', 'JZMB00014', '1', 'Shieanne', '2022-08-30', 5, 240, 60, '', 'August 30, 2022'),
(147, 'tandangsora', 'JZMB00012', '1', 'Shieanne', '2022-08-30', 5, 240, 60, '', 'August 30, 2022'),
(148, 'tandangsora', 'JZMB00013', '1', 'Shieanne', '2022-08-30', 5, 240, 60, '', 'August 30, 2022'),
(149, '', 'JZMB00016', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(150, '', 'JZMB00017', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(151, '', 'JZMB00028', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(152, '', 'JZMB00029', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(153, '', 'JZMB00030', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(154, '', 'JZMB00031', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(155, '', 'JZMB00032', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(156, '', 'JZMB00033', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(157, '', 'JZMB00034', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(158, '', 'JZMB00035', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(159, '', 'JZMB00036', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(160, '', 'JZMB00037', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE'),
(161, '', 'JZMB00038', '', 'Shieanne', '2022-09-01', 0, 0, 0, '', 'NEW CYCLE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insert_client`
--
ALTER TABLE `insert_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insert_comaker`
--
ALTER TABLE `insert_comaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insert_creditanalyst`
--
ALTER TABLE `insert_creditanalyst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insert_cssaccount`
--
ALTER TABLE `insert_cssaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insert_deduction`
--
ALTER TABLE `insert_deduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insert_id`
--
ALTER TABLE `insert_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insert_interest`
--
ALTER TABLE `insert_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insert_payment`
--
ALTER TABLE `insert_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insert_client`
--
ALTER TABLE `insert_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `insert_comaker`
--
ALTER TABLE `insert_comaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `insert_creditanalyst`
--
ALTER TABLE `insert_creditanalyst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `insert_cssaccount`
--
ALTER TABLE `insert_cssaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `insert_deduction`
--
ALTER TABLE `insert_deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insert_id`
--
ALTER TABLE `insert_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `insert_interest`
--
ALTER TABLE `insert_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insert_payment`
--
ALTER TABLE `insert_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `deduc_advance` ON SCHEDULE EVERY 1 DAY STARTS '2022-08-30 16:45:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE insert_client SET cadvance = cadvance - (cloanamount/100) WHERE cloanstatus IN('OnGoing','Released') AND cadvance>0$$

CREATE DEFINER=`root`@`localhost` EVENT `update_overdue` ON SCHEDULE EVERY 1 DAY STARTS '2022-08-30 17:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE insert_client SET coverdue = coverdue + (cloanamount/100) WHERE cloanstatus in('OnGoing','Released') AND paydate < CURDATE() AND cadvance = 0$$

CREATE DEFINER=`root`@`localhost` EVENT `update_payment` ON SCHEDULE EVERY 1 DAY STARTS '2022-08-30 16:30:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE insert_client SET coverdue = coverdue-(cadvance), cadvance = 0 WHERE cloanstatus in ('Ongoing','Released') AND paydate < CURDATE() AND cadvance < 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
