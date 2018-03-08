-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2016 at 09:01 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acharyadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `avail_diagnosis`
--

CREATE TABLE IF NOT EXISTS `avail_diagnosis` (
  `d_id` int(10) NOT NULL COMMENT 'diagnosis id',
  `d_name` varchar(20) NOT NULL,
  `price` int(10) NOT NULL COMMENT 'cost',
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avail_diagnosis`
--

INSERT INTO `avail_diagnosis` (`d_id`, `d_name`, `price`, `remarks`) VALUES
(1, 'diagnosis_100', 2350, 'avail_diag 1'),
(2, 'diagnosis_200', 7000, 'avail_diag 2'),
(3, 'kjsdo', 3156, 'kjs d'),
(4, 'diagnosis_300', 500, 'avail_diag 3'),
(5, 'diagnosis_500', 1000, 'avail_diag 4'),
(6, 'test', 123, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `avail_treatment`
--

CREATE TABLE IF NOT EXISTS `avail_treatment` (
  `t_id` int(10) NOT NULL COMMENT 'id',
  `t_name` varchar(20) NOT NULL,
  `price` int(10) NOT NULL COMMENT 'cost',
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avail_treatment`
--

INSERT INTO `avail_treatment` (`t_id`, `t_name`, `price`, `remarks`) VALUES
(1, 'treatment_100', 10000, 'avail treat_1'),
(2, 'treatment_200', 12000, 'avail treat_2'),
(3, 'okay', 453, 'kba'),
(4, 'treatment_300', 5000, 'avail treat_3'),
(5, 'treatment_400', 3000, 'avail treat_3');

-- --------------------------------------------------------

--
-- Table structure for table `bedside_record`
--

CREATE TABLE IF NOT EXISTS `bedside_record` (
  `record_id` int(10) NOT NULL DEFAULT '0',
  `patient_id` int(10) DEFAULT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `medicine` tinyint(1) DEFAULT NULL,
  `temp` decimal(10,0) DEFAULT NULL,
  `bpm` int(3) DEFAULT NULL,
  `bp_low` decimal(10,0) DEFAULT NULL,
  `bp_high` decimal(10,0) NOT NULL,
  `water` int(3) DEFAULT NULL,
  `rec_date` date DEFAULT NULL,
  `rec_time` time DEFAULT NULL,
  `stool` int(3) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bedside_record`
--

INSERT INTO `bedside_record` (`record_id`, `patient_id`, `emp_id`, `medicine`, `temp`, `bpm`, `bp_low`, `bp_high`, `water`, `rec_date`, `rec_time`, `stool`, `remarks`) VALUES
(1, 2, 3, 2, '32', 70, '120', '140', 1, '2016-02-02', '00:00:10', 0, NULL),
(1, 6, 3, 0, '26', 70, '100', '130', 0, '2016-02-13', '00:00:11', 1, NULL),
(2, 2, 3, 1, '26', 75, '110', '120', 1, '2016-02-02', '00:00:14', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `bill_no` int(10) NOT NULL DEFAULT '0',
  `patient_id` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_no`, `patient_id`, `date`, `total`) VALUES
(101, 1, '2016-02-14', 1000),
(102, 7, '2016-02-12', 10000),
(103, 4, '2016-02-09', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE IF NOT EXISTS `diagnosis` (
  `patient_id` int(10) DEFAULT NULL,
  `diag_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `emp_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`patient_id`, `diag_id`, `name`, `price`, `date`, `remarks`, `emp_id`) VALUES
(2, 1, 'brain tumor', 5000, '2016-02-03', 'defective', 0),
(3, 2, 'nerve damage', 3000, '2016-02-04', 'nerve damage', 0),
(4, 7, 'check up', 1000, '2016-02-09', 'routine checkup', 0),
(2, 2, 'nerve damage', 1500, '2016-03-02', 'critical', 0),
(2, 3, 'hamerage', 7500, '2016-03-04', 'normal', 0),
(12, 312, 'xyz', 7121, '2016-01-05', 'testing', 0),
(13, 456, 'yzr', 552, '2015-12-03', 'uubkj', 0),
(2, 4, 'xyz', 500, '2016-01-01', 'okay', 0),
(2, 5, 'xyz', 500, '2016-01-01', 'okay', 0),
(1, 1, 'kbsk', 311, '2016-01-01', 'kjbsd', 0),
(3, 0, '1', 1, '0000-00-00', '', 0),
(2, 6, '', 0, '2016-01-01', 'ksdkbsd', 0),
(2, 7, '', 0, '2019-01-01', 'abc', 0),
(2, 8, '', 0, '2010-01-01', 'final', 0),
(2, 9, '', 0, '2010-01-01', 'final', 0),
(2, 10, '', 0, '2013-01-01', 'okay done', 0),
(2, 11, '', 0, '2016-01-02', 'in', 0),
(2, 12, '', 0, '2016-01-01', '123', 0),
(2, 13, '', 0, '2016-01-01', 'oo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `category` varchar(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `qualification` varchar(10) DEFAULT NULL,
  `specialization` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `salary`, `category`, `email`, `password`, `phone_no`, `qualification`, `specialization`) VALUES
(1, 'rajesh doctor', 65000, 'd', 'doctor', 'doctor', '9840872536', 'MD', 'Brain'),
(2, 'jignesh receptionist ', 25000, 'r', 'rec', 'rec', '9069673075', NULL, NULL),
(3, 'swatiben nurse', 10000, 'n', 'nurse', 'nurse', '7330927596', '', ''),
(4, 'prakash pharma', 40000, 'p', 'pharma', 'pharma', '9876345608', 'b.pharm', NULL),
(5, 'admin', 50000, 'a', 'admin', 'admin', '9998959699', 'BE', NULL),
(6, 'Dr Ravikant ', 10000000, 'd', 'ravi@gmail.com', 'ravikant', '9998959642', 'MD', 'surgeon');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `med_id` varchar(10) NOT NULL DEFAULT '',
  `med_name` varchar(50) DEFAULT NULL,
  `patient_id` int(11) NOT NULL COMMENT 'patient_id',
  `emp_id` int(10) NOT NULL,
  `med_date` date DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_name`, `patient_id`, `emp_id`, `med_date`, `price`, `quantity`, `remarks`) VALUES
('1', 'kbjsd', 1, 0, '2016-01-01', 788, 2, 'kjbsdk'),
('1', 'killer', 2, 0, '2016-02-16', 600, 6, 'smapleremark'),
('2', 'killer2', 2, 0, '2016-02-19', 600, 16, 'smapleremarkssss'),
('3', 'killer3', 2, 0, '2016-02-13', 1600, 30, 'smaplesample'),
('2', 'kbjsd', 1, 0, '2016-01-01', 788, 2, 'kjbsdk'),
('3', 'kbjsd', 1, 1, '2016-01-01', 788, 2, 'kjbsdk'),
('4', 'kbjsd', 1, 1, '2016-01-01', 788, 2, 'kjbsdk'),
('1', 'lopox', 11, 1, '2016-01-01', 1000, 10, 'okay'),
('2', 'lopox', 11, 1, '2016-01-01', 1000, 10, 'okay'),
('3', 'aaaa', 11, 1, '2016-01-02', 600, 6, 'jsd'),
('4', 'abc', 11, 1, '2016-01-01', 400, 4, 'lksjnd'),
('5', 'kjbsd', 11, 1, '2015-12-30', 235, 6, 'sldnk'),
('5', 'crosin', 1, 1, '2016-01-01', 20, 10, 'ok'),
('1', 'crosin', 7, 1, '2016-01-01', 50, 10, 'ljk');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `category` varchar(3) NOT NULL DEFAULT 'out' COMMENT 'in/out',
  `admission_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_no` varchar(20) NOT NULL,
  `height` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `emp_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `sex`, `category`, `admission_date`, `discharge_date`, `address`, `age`, `email`, `phone_no`, `height`, `weight`, `emp_id`) VALUES
(0, 'jivani', 'm', 'in', '2016-03-31', '2016-04-11', 'sample', 24, 'sample@sample.com', '', 0, 0, 1),
(1, 'jagdish bharucha', 'm', 'out', '2016-02-14', '2016-03-25', '5 lina park society, behind mother''s school, gotri road', 21, 'ma.jagdish@yahoo.com', '', 0, 0, 1),
(2, 'pratik jivani', 'm', 'in', '2016-02-01', '2016-03-24', 'jivani''s address', 21, 'pratikjivani35@gmail.com', '', 0, 0, 1),
(3, 'ravikant makwana', 'm', 'in', '2016-02-03', '2016-02-06', 'ravi''s address', 22, 'makwanarav29@gmail.com', '', 0, 0, 3),
(4, 'chinmay deshpande', 'm', 'out', '2016-02-09', '2016-03-16', 'chinmay''s address', 21, 'chinmaydeshpande2012@gmail.com', '', 0, 0, 2),
(5, 'nikhil patel', 'm', 'out', '2016-02-15', '2016-03-18', 'nikhil''s address', 22, 'nikhil_patel_7@yahoo.com', '', 0, 0, 4),
(6, 'hardik mangukiya', 'm', 'in', '2016-02-12', '2016-03-01', 'hardik''s address', 21, 'hardik.mangukiya.003@gmail.com', '', 0, 0, 3),
(7, 'aakash soni', 'm', 'in', '2016-02-10', '2016-02-12', 'aakash''s address', 21, 'soniaakash07@gmail.com', '', 0, 0, 1),
(8, 'Rayansh Shah', 'm', 'in', '2016-12-01', '2021-01-31', '3029 Hoffman Avenue', 21, 'jone.ywren@gmail.com', '', 0, 0, 1),
(9, 'dfdf', 'm', 'in', '2016-01-01', '2022-01-01', '3029 Hoffman Avenue', 29, 'jone.ywren@gmail.com', '', 0, 0, 1),
(11, 'Ravikant Makwana', 'm', 'In', '2015-12-31', '2016-12-01', '3029 Hoffman Avenue', 19, 'makwanaravi29@gmail.com', '', 0, 0, 1),
(12, 'xyzw', 'f', 'out', '2015-01-01', '2016-01-31', '3029 Hoffman Avenue', 27, 'xyz@gmail.com', '', 0, 0, NULL),
(13, 'yzr', 'f', 'out', '2015-01-31', '2016-01-31', '3029 Hoffman Avenue', 12, 'yzr@yahoo.com', '', 0, 0, NULL),
(14, 'hhhh', 'm', 'in', '2015-01-01', '2016-01-04', 'jhjkj', 23, 'jhvjhs@gmail.com', '', 0, 0, 1),
(15, 'Rayansh Shah', 'f', 'in', '2016-01-01', '2018-01-01', '3029 Hoffman Avenue', 21, 'jone.ywren@gmail.com', '', 0, 0, 1),
(16, 'kbsd', 'f', 'out', '2015-12-02', '2016-12-01', 'skjldb', 37, 'kshdkhsd@gmail.com', '', 0, 0, NULL),
(17, 'kbkjsbd', 'm', 'out', '2015-12-01', '2016-12-01', 'lkns', 51, 'kbsd@yahoo.com', '', 0, 0, NULL),
(18, 'jagdish bharucha', 'm', 'out', '2013-01-31', '2014-01-02', 'sdslnsd', 21, 'kabskj@gmail.com', '', 0, 0, NULL),
(19, 'kjbsd', 'f', 'in', '2015-01-01', '2018-01-01', 'kjbkjbds', 65, 'kjjbskjd@gmail.com', '', 0, 0, 1),
(20, 'hjvh ', 'm', 'in', '2014-01-02', '2020-01-01', 'kh ', 62, 'hvmsd@gmail.com', '', 0, 0, 1),
(23, 'jjhvb', 'm', 'in', '2016-01-02', NULL, 'kjsdk', 23, 'kjgjsd@gmail.com', '', 0, 0, 6),
(77, 'Rayansh Shah', 'm', 'out', '2015-06-01', '2016-12-31', 'kbbdks', 45, 'shah@gmail.com', '', 0, 0, NULL),
(100, 'pratik', 'm', 'in', '2016-04-07', '2016-04-04', 'f', 12, 'pratik.jivani@we.ccdd', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE IF NOT EXISTS `treatment` (
  `t_id` varchar(10) NOT NULL DEFAULT '',
  `t_name` varchar(30) DEFAULT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `t_date` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`t_id`, `t_name`, `emp_id`, `patient_id`, `price`, `t_date`, `remarks`) VALUES
('1', 'treatment 1', 1, 1, 30000, '2016-02-12', NULL),
('2', 'treatment 2', 1, 7, 20000, '2016-02-11', NULL),
('5', 'treatment 5', 1, 1, 5000, '2016-02-10', NULL),
('1', 'pratik', 2, 11, 1000, '0000-00-00', 'done'),
('13', 'yzr', 1, 13, 6320, '2016-01-01', 'hvj'),
('3', 'kjbksd', 1, 1, 351, '2017-01-02', 'kjbsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avail_diagnosis`
--
ALTER TABLE `avail_diagnosis`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `avail_treatment`
--
ALTER TABLE `avail_treatment`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `bedside_record`
--
ALTER TABLE `bedside_record`
  ADD KEY `patient_id` (`patient_id`), ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_no`), ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`), ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avail_diagnosis`
--
ALTER TABLE `avail_diagnosis`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'diagnosis id',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `avail_treatment`
--
ALTER TABLE `avail_treatment`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bedside_record`
--
ALTER TABLE `bedside_record`
ADD CONSTRAINT `bedside_record_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
ADD CONSTRAINT `bedside_record_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
ADD CONSTRAINT `diagnosis_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
