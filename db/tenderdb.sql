-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 07:59 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenderdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital_table`
--

CREATE TABLE `hospital_table` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_phone_no` varchar(20) NOT NULL,
  `hospital_mail_id` varchar(50) NOT NULL,
  `login_id` int(11) NOT NULL,
  `hospital_unique_number` varchar(50) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `poc_name` varchar(50) NOT NULL,
  `poc_phone_no` varchar(20) NOT NULL,
  `poc_email` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_table`
--

INSERT INTO `hospital_table` (`hospital_id`, `hospital_name`, `hospital_phone_no`, `hospital_mail_id`, `login_id`, `hospital_unique_number`, `hospital_address`, `poc_name`, `poc_phone_no`, `poc_email`, `createdAt`, `updatedAt`) VALUES
(1, 'Apollo', '1234123412', 'support@apollo.com', 6, '123', 'Perungudi, Chennai', 'ramesh', '1234567890', 'ramesh@apollo.com', '2018-05-08 12:14:33', '2018-05-12 14:45:06'),
(3, 'aa', '123131', 'ss@js.co', 14, '12331', 'aasd', 'asdn', '23112312', 'sdfa@dsfa.ca', '2018-05-05 00:33:01', '2018-05-09 13:24:18'),
(4, 'aaa', '123', 'rr@cc.cc', 16, '1234', 'aaa', 'test', '1131', 'test@tes.c', '2018-05-05 12:22:31', '0000-00-00 00:00:00'),
(5, 'ee', '1231', 'gg@df.cc', 25, '456', 'wew', 'qqq', '5411', 'erw@sdfs.cc', '2018-05-05 13:41:13', '0000-00-00 00:00:00'),
(6, 'MJK Hospital', '989787656', 'mjk@mjk.com', 27, '986', 'Bettiah', 'Aatisha', '2147483647', 'cyrillaatisha@gmail.com', '2018-05-08 16:05:44', '0000-00-00 00:00:00'),
(8, 'City Hospital', '1231231231', 'city@city.com', 29, 'city123', 'abc road, xyz', 'Aatisha Cyrill', '9812092391', 'cyrillaatisha@gmail.com', '2018-05-12 13:41:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `logintable`
--

CREATE TABLE `logintable` (
  `login_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`login_id`, `username`, `password`, `role`, `createdAt`, `updatedAt`) VALUES
(6, 'ramesh', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '2018-05-09 12:39:07'),
(11, 'rakesh', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'quser', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00 00:00:00', '2018-05-09 12:43:20'),
(14, 'stdio', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'test1', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '123t', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'eee', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '65tt', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'ff', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'ccc', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'rr', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'gggr', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'abc', '202cb962ac59075b964b07152d234b70', 1, '2018-05-08 16:05:44', '0000-00-00 00:00:00'),
(29, 'abc11', 'eb245dea56a0eac3cf221fa0a4b637ec', 1, '2018-05-12 13:41:21', '0000-00-00 00:00:00'),
(30, 'sindhu', 'eb245dea56a0eac3cf221fa0a4b637ec', 0, '2018-05-12 13:44:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer_table`
--

CREATE TABLE `manufacturer_table` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `manufacturer_phone_no` varchar(20) NOT NULL,
  `manufacturer_mail_id` varchar(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `caddr` varchar(255) NOT NULL,
  `cphone` varchar(20) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `login_id` int(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer_table`
--

INSERT INTO `manufacturer_table` (`manufacturer_id`, `manufacturer_name`, `manufacturer_phone_no`, `manufacturer_mail_id`, `cname`, `caddr`, `cphone`, `cemail`, `gst`, `login_id`, `createdAt`, `updatedAt`) VALUES
(3, 'rakesh', '1234567671', 'rakesh@phzer.co', 'Phyzer', 'navalur', '1245123412', 'support@phyzer', '1234', 11, '2018-05-05 00:28:10', '2018-05-12 14:34:50'),
(4, 'Happy Singh', '2147483647', 'happy@djsd.vo', 'medicals', 'aaa', '1231124111', 'rr@jd.c', '543', 12, '2018-05-05 00:31:07', '2018-05-09 13:33:18'),
(6, 'test', '123', 'test@tes.c', '123ff', '13md', '1234', 'dd@dd.v', '123', 17, '2018-05-05 12:24:53', '0000-00-00 00:00:00'),
(8, 'aaa', '124124', 'asda@ss.cc', 'rt', 'dfs ', '4242', 'rr@sds.vc', '354', 19, '2018-05-05 12:28:29', '0000-00-00 00:00:00'),
(9, 'tyt', '436463', 'werw@sdf.c', 'dsfds', 'sfs', '5464', 'fss@sf.v', '564', 20, '2018-05-05 12:29:43', '0000-00-00 00:00:00'),
(10, 'rett', '522352', 'rwwe@asa.ca', 'sds', 'sfes', '2424', 'dfgd@csd.c', '5464', 21, '2018-05-05 12:30:54', '0000-00-00 00:00:00'),
(13, 'erw', '34242', 'dfwse@sd.ty', 'weew', 'weq', '4234', 'tyt@sdf.cc', '676', 26, '2018-05-05 13:42:02', '0000-00-00 00:00:00'),
(14, 'SIndhu', '1231239806', 'sindhu@gmail.com', 'xyz corp', 'abc road,xyz asa', '4536728191', 'support@xyzcopr.cos', '29ABCDE1234F2Z5', 30, '2018-05-12 13:44:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tenders_details`
--

CREATE TABLE `tenders_details` (
  `tender_id` int(11) NOT NULL,
  `tender_number` int(255) NOT NULL,
  `hospital_id` int(255) NOT NULL,
  `components_name` varchar(255) NOT NULL,
  `composition` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `expected_rate` decimal(5,2) NOT NULL,
  `expected_qty` int(255) NOT NULL,
  `expected_dod` date NOT NULL,
  `tender_start_date` date NOT NULL,
  `tender_end_date` date NOT NULL,
  `tender_display_status` int(5) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `closedAt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenders_details`
--

INSERT INTO `tenders_details` (`tender_id`, `tender_number`, `hospital_id`, `components_name`, `composition`, `description`, `expected_rate`, `expected_qty`, `expected_dod`, `tender_start_date`, `tender_end_date`, `tender_display_status`, `createdAt`, `updatedAt`, `closedAt`) VALUES
(1, 123, 1, 'Saradon', 'xyz mix', 'for heache', '1.20', 100, '2018-05-25', '2018-05-09', '2018-05-19', 1, '0000-00-00 00:00:00', '2018-05-12 16:09:31', '0000-00-00 00:00:00'),
(2, 567, 3, 'Almox', 'aaa mix', 'for xyz disease', '0.80', 900, '2018-05-26', '2018-05-01', '2018-05-07', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 206718119, 5, 'rasas', 'ss', 'qweq edq', '1.50', 200, '2018-05-31', '2018-05-07', '2018-05-25', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 266735473, 1, 'bicosule', 'qwe wqq', 'for aaa', '1.30', 300, '2018-05-12', '2018-05-02', '2018-05-09', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-05-09 17:16:58'),
(10, 25740242, 1, 'polybian', 'yqwi', 'asd asfa asf a', '20.00', 50, '2018-05-09', '2018-05-01', '2018-05-08', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 111277243, 1, 'sprout', 'wq eqw qwr', 'for loosemotion', '1.60', 100, '2018-05-24', '2018-05-06', '2018-05-18', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 214500448, 4, 'Betadine', 'mmadn', 'testing', '3.00', 100, '2018-05-17', '2018-05-08', '2018-05-15', 1, '2018-05-09 11:24:32', '2018-05-09 11:25:09', '0000-00-00 00:00:00'),
(13, 35470479, 1, 'Carlpol', 'ss fefe', 'The product must be fresh and be manufactured this year', '1.40', 500, '2018-06-02', '2018-05-12', '2018-05-25', 1, '2018-05-12 15:45:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 6433200, 1, 'XYZ med', 'qwe', 'Hi testing', '2.00', 2000, '2018-05-31', '2018-05-14', '2018-05-23', 0, '2018-05-12 15:56:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tender_applied`
--

CREATE TABLE `tender_applied` (
  `tender_applied_id` int(11) NOT NULL,
  `manufacturer_id` int(255) NOT NULL,
  `tender_id` int(255) NOT NULL,
  `mrp` decimal(5,2) NOT NULL,
  `bid_rate` decimal(5,2) NOT NULL,
  `bid_qty` int(255) NOT NULL,
  `bid_dod` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `bid_status` int(3) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `closedAt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender_applied`
--

INSERT INTO `tender_applied` (`tender_applied_id`, `manufacturer_id`, `tender_id`, `mrp`, `bid_rate`, `bid_qty`, `bid_dod`, `description`, `bid_status`, `createdAt`, `updatedAt`, `closedAt`) VALUES
(4, 4, 11, '2.00', '1.60', 300, '2018-05-23', 'I can only accept the tender when order is atleast 300', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 4, 2, '3.00', '2.10', 200, '2018-05-18', 'Yes I am interested', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 4, 8, '2.40', '2.00', 150, '2018-05-17', 'Test', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-05-09 17:16:58'),
(8, 3, 8, '2.00', '1.70', 500, '2018-05-18', 'hey', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-05-09 17:16:58'),
(9, 8, 12, '4.00', '3.20', 200, '2018-05-16', 'hi', 0, '2018-05-09 11:26:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 8, 5, '4.00', '3.30', 100, '2018-05-19', 'test', 0, '2018-05-09 11:28:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 3, 11, '2.30', '1.80', 200, '2018-05-26', 'Yes I am Interested', 0, '2018-05-12 21:04:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital_table`
--
ALTER TABLE `hospital_table`
  ADD PRIMARY KEY (`hospital_id`),
  ADD UNIQUE KEY `hospital_phone_no` (`hospital_phone_no`),
  ADD UNIQUE KEY `hospital_mail_id` (`hospital_mail_id`),
  ADD UNIQUE KEY `hospital_unique_number` (`hospital_unique_number`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `logintable`
--
ALTER TABLE `logintable`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `manufacturer_table`
--
ALTER TABLE `manufacturer_table`
  ADD PRIMARY KEY (`manufacturer_id`),
  ADD UNIQUE KEY `manufacturer_phone_no` (`manufacturer_phone_no`),
  ADD UNIQUE KEY `manufacturer_mail_id` (`manufacturer_mail_id`),
  ADD UNIQUE KEY `gst` (`gst`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `tenders_details`
--
ALTER TABLE `tenders_details`
  ADD PRIMARY KEY (`tender_id`),
  ADD UNIQUE KEY `tender_number` (`tender_number`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `tender_applied`
--
ALTER TABLE `tender_applied`
  ADD PRIMARY KEY (`tender_applied_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `tender_id` (`tender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital_table`
--
ALTER TABLE `hospital_table`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `logintable`
--
ALTER TABLE `logintable`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `manufacturer_table`
--
ALTER TABLE `manufacturer_table`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tenders_details`
--
ALTER TABLE `tenders_details`
  MODIFY `tender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tender_applied`
--
ALTER TABLE `tender_applied`
  MODIFY `tender_applied_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hospital_table`
--
ALTER TABLE `hospital_table`
  ADD CONSTRAINT `hospital_table_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `logintable` (`login_id`);

--
-- Constraints for table `manufacturer_table`
--
ALTER TABLE `manufacturer_table`
  ADD CONSTRAINT `manufacturer_table_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `logintable` (`login_id`);

--
-- Constraints for table `tenders_details`
--
ALTER TABLE `tenders_details`
  ADD CONSTRAINT `tenders_details_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital_table` (`hospital_id`);

--
-- Constraints for table `tender_applied`
--
ALTER TABLE `tender_applied`
  ADD CONSTRAINT `tender_applied_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer_table` (`manufacturer_id`),
  ADD CONSTRAINT `tender_applied_ibfk_2` FOREIGN KEY (`tender_id`) REFERENCES `tenders_details` (`tender_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
