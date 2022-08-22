-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 10:26 AM
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
  `paydate` datetime DEFAULT NULL,
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
(1, 'tandangsora', 'JZMB00001', 'CANATOY, CHARLEY B..jpg', 'charley', 'badlis', 'canatoy', '', '1', 1, '104', 'justina st. san miguel village', 'pasong tamo', 'quezon city', '09388002171', '', '53', 'Female', '1969-02-25', '104', 'justina st. san miguel village', 'pasong tamo', 'quezon city', '', '', 'Filipino', 'married', 'siesnando canatoy', '5', 'jezebel juanico badlis', '09305279691', 'Shieanne', 6000, 6000, 'OnGoing', 780, 240, 260, '2022-08-22 14:52:16', 5220, 0, 17, '2022-08-09 17:50:42', '2022-08-09 00:00:00', '2022-11-18 00:00:00'),
(2, 'tandangsora', 'JZMB00002', 'TAN ID PIC.jpg', 'zenaida', 'peralta', 'tan', '', '1', 1, '1', 'blk 1, lot 1, villa corrina', 'pasong tamo', 'quezon city', '09498055917', '', '61', 'Female', '1960-09-30', '1', 'blk 1, lot 1, villa corrina', 'pasong tamo', 'quezon city', 'rent', '', 'Filipino', 'married', 't-V - DTERIO', '5', 'mark anthony p. tan', '09665507849', 'Shieanne', 8000, 8000, 'OnGoing', 1080, 360, 260, '2022-08-22 15:08:45', 6920, 0, 17, '2022-08-09 18:05:06', '2022-08-09 00:00:00', '2022-11-18 00:00:00'),
(3, 'tandangsora', 'JZMB00003', 'Julia ID PIC.jpg', 'catherine', 'resultay', 'julia', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09124010136', '', '34', 'Female', '1987-11-28', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'edward p. julia', '3', 'isabel resultay', '09983761655', 'Shieanne', 6000, 6000, 'OnGoing', 820, 280, 260, '2022-08-22 14:57:17', 5180, 0, 17, '2022-08-09 18:18:55', '2022-08-09 00:00:00', '2022-11-18 00:00:00'),
(4, 'tandangsora', 'JZMB00004', '299130530_2437951939677158_1264219278934060214_n.jpg', 'Genelita', 'Hongria', 'Montenegro', '', '1', 1, '100', 'Tandang sora', 'Pasong Tamo', 'Quezon City', '09692960913', '123', '64', 'Female', '1957-08-27', '100', 'Tandang sora', 'Pasong Tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'Ponchito Montenegro', '3', 'Charles H. Montenegro', '09092472685', 'Shieanne', 10000, 10000, 'OnGoing', 644, 444, 100, '2022-08-22 15:52:11', 9356, 0, 17, '2022-08-16 15:17:49', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(8, 'tandangsora', 'JZMB00005', '299332797_465641072074769_7737000898313695014_n.jpg', 'Isabel', 'Resurreccion', 'Resultay', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09708352754', '', '56', 'Female', '1966-07-02', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'teofilo j. resultay', '', 'Teofilo jimenez', '09983761655', 'Shieanne', 6000, 6000, 'OnGoing', 396, 276, 100, '2022-08-22 16:19:16', 5604, 0, 17, '2022-08-16 18:22:36', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(9, 'tandangsora', 'JZMB00009', '298640386_1117253612559621_4508552675503772136_n.jpg', 'julieta', 'romeo', 'ocay', '', '1', 1, '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '09318521765', '', '52', 'Female', '1970-04-03', '02', 'sarmiento compound', 'pasong tamo', 'Quezon City', '', '', 'Filipino', 'married', 'enerio balida ocay', '', 'enerio balida ocay', '09510007964', 'Shieanne', 6000, 6000, 'OnGoing', 396, 276, 100, '2022-08-22 16:10:57', 5604, 0, 17, '2022-08-16 18:29:51', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(10, 'tandangsora', 'JZMB00010', '298430612_1063636507847080_2936601223415798881_n.jpg', 'lilyn', 'mirice', 'balcena', '', '1', 1, '5', 'a #60 sitio mabilog', 'culiat', 'quezon city', '09155915994', '', '36', 'Female', '1986-01-07', '5', 'a #60 sitio mabilog', 'culiat', 'quezon city', '', '', 'Filipino', 'married', 'Bryan Carlo Gerona', '', 'Bryan Carlo Gerona', '09950731905', 'Shieanne', 8000, 8000, 'OnGoing', 480, 320, 120, '2022-08-22 15:54:31', 7520, 0, 17, '2022-08-16 18:41:44', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(11, 'tandangsora', 'JZMB00011', '298595398_743059856767608_6090124223446758443_n.jpg', 'sonia', 'sabino', 'leona', '', '1', 1, '260', 'panlinio compound', 'pasong tampo', 'quezon city', '09707490006', '', '56', 'Female', '1965-12-28', '260', 'panlinio compound', 'pasong tampo', 'quezon city', 'owned', '', 'Filipino', 'married', 'edgardo leona', '', 'Eugene leona', '09489367913', 'Shieanne', 10000, 10000, 'OnGoing', 600, 400, 120, '2022-08-22 15:23:08', 9400, 0, 17, '2022-08-16 18:50:44', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(12, 'tandangsora', 'JZMB00012', '299110268_3102452663304721_6135334482094343722_n.jpg', 'aleli', 'ferran', 'beriso', '', '1', 1, '55', 'lot 5 magic circle housing', 'pasong tamo', 'Quezon City', '09617363619', '', '48', 'Female', '1973-09-28', '55', 'lot 5 magic circle housing', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'efren beriso', '', 'Mery grace ferran', '09617363619', 'Shieanne', 8000, 8000, 'OnGoing', 320, 160, 80, '2022-08-22 16:20:10', 7680, 0, 17, '2022-08-16 19:00:02', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(13, 'tandangsora', 'JZMB00013', '298032472_1266096054218875_6649944944996468416_n.jpg', 'rodora', 'bulakja', 'tupas', '', '1', 1, '15', 'lot srcc magic circle pingkian II', 'pasong tamo', 'Quezon City', '09365386971', '', '39', 'Female', '1982-11-23', '15', 'lot srcc magic circle pingkian II', 'pasong tamo', 'Quezon City', 'owned', '', 'Filipino', 'single', '', '', 'rodora bulakja tupas', '09365386971', 'Shieanne', 8000, 8000, 'OnGoing', 320, 160, 80, '2022-08-22 16:20:36', 7680, 0, 17, '2022-08-16 19:13:51', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(14, 'tandangsora', 'JZMB00014', '298000201_1511008416013898_7752476333828725217_n.jpg', 'maricel', 'datu', 'ferrer', '', '1', 1, '15', 'lot 7 srcc magic circle housing pingkian II  ', 'Pasong Tamo', 'Quezon City', '09278543310', '', '52', 'Female', '1970-06-24', '15', 'lot 7 srcc magic circle housing pingkian II  ', 'Pasong Tamo', 'Quezon City', 'owned', '', 'Filipino', 'married', 'arnez f ferrer', '', 'Maricel Datu ferrer', '09278543310', 'Shieanne', 8000, 8000, 'OnGoing', 320, 160, 80, '2022-08-22 16:19:49', 7680, 0, 17, '2022-08-16 19:22:49', '2022-08-16 00:00:00', '2022-11-25 00:00:00'),
(15, 'tandangsora', 'JZMB00015', '298176493_7998117473564173_298503957760055298_n.jpg', 'marilyn', 'gonzales', 'teopiz', '', '1', 1, '25', 'emerald street', 'pasong tamo', 'quezon city', '09122820527', '', '57', 'Female', '1965-03-01', '25', 'emerald street', 'pasong tamo', 'quezon city', '', 'caretaker', 'Filipino', 'married', 'nestor urigna', '', 'nestor urigna', '09122820527', 'Shieanne', 8000, 6000, 'OnGoing', 464, 284, 140, '2022-08-22 16:07:36', 5536, 0, 17, '2022-08-16 19:59:14', '2022-08-16 00:00:00', '2022-11-25 00:00:00');

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
(15, 'JZMB00015', '09122820527', '25 emerald street marcel village pasong tamo quezon city', 'Male', '46', '1975-12-29', 'tuner', 'filipino', 'Married', 'tuning services');

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
(1, 'tandangsora', 'Shieanne', '1');

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
(13, 'meycauayan', 'meycauayan', 'meycauayan', '$2y$10$JNbeN2FjcG/2QNpaqLfy/.cVSMaCmCNiKfk1Pry04x3cnTEA/GlYi');

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
(15, 'JZMB00015', 'Shieanne', '298986912_620664966371139_4796204947813216605_n.jpg', 'Tin', '386-953-427-000', '', '', '');

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
(83, 'tandangsora', 'JZMB00013', '1', 'Shieanne', '2022-08-22', 2, 80, 20, '', 'August 18, 2022');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `insert_comaker`
--
ALTER TABLE `insert_comaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `insert_creditanalyst`
--
ALTER TABLE `insert_creditanalyst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insert_cssaccount`
--
ALTER TABLE `insert_cssaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `insert_deduction`
--
ALTER TABLE `insert_deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insert_id`
--
ALTER TABLE `insert_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `insert_interest`
--
ALTER TABLE `insert_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insert_payment`
--
ALTER TABLE `insert_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `deduc_advance` ON SCHEDULE EVERY 1 DAY STARTS '2022-05-11 17:59:55' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE insert_client SET cadvance = cadvance - (cloanamount/100) WHERE cloanstatus = 'OnGoing' AND cadvance>0$$

CREATE DEFINER=`root`@`localhost` EVENT `update_overdue` ON SCHEDULE EVERY 1 DAY STARTS '2022-05-11 18:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE insert_client SET coverdue = coverdue + cloanamount/100 WHERE cloanstatus = 'OnGoing' AND paydate < CURDATE() AND cadvance = 0$$$$

CREATE DEFINER=`root`@`localhost` EVENT `update_payment` ON SCHEDULE EVERY 1 DAY STARTS '2022-05-11 18:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE insert_client SET coverdue = coverdue-(cadvance), cadvance = 0 WHERE cloanstatus = 'Ongoing' AND paydate < CURDATE() AND cadvance < 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
