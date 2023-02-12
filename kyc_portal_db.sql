-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2023 at 06:52 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyc_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` varchar(16) NOT NULL,
  `institution` int(11) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `institution`, `status`) VALUES
('202102082359', 4, 'Accepted'),
('202102083905', 5, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `application_statuses`
--

CREATE TABLE `application_statuses` (
  `status` varchar(32) NOT NULL,
  `description` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_statuses`
--

INSERT INTO `application_statuses` (`status`, `description`) VALUES
('Accepted', NULL),
('Pending', NULL),
('Rejected', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `filename` varchar(50) NOT NULL,
  `application` varchar(16) DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holders`
--

CREATE TABLE `holders` (
  `id` varchar(16) NOT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `other_name` varchar(32) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `nationality` varchar(8) DEFAULT NULL,
  `phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holders`
--

INSERT INTO `holders` (`id`, `surname`, `other_name`, `first_name`, `sex`, `dob`, `issue_date`, `expiry_date`, `nationality`, `phone`) VALUES
('OOO', 'Doe', '', 'Jane', 'F', '2000-02-01', '2020-02-08', '2022-02-01', 'MWI', ''),
('PHP', 'Mponda', '', 'Mada', 'F', '2000-02-02', '2020-03-03', '2024-03-03', 'MWI', ''),
('SQL', 'Phiri', '', 'Uje', 'M', '2001-01-07', '2020-01-01', '2022-01-01', 'MWI', ''),
('VVV', 'Doe', '', 'John', 'M', '2000-05-01', '2020-03-04', '2022-05-21', 'MWI', '');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(32) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `isic_number` varchar(16) DEFAULT NULL,
  `industry` varchar(64) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `location` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `registration_number`, `name`, `isic_number`, `industry`, `phone`, `email`, `address`, `location`) VALUES
(1, 'MBS001', 'NBM', '145556', 'Banking', '0111444555', 'info@nb.mw', '990, BT', 'BT'),
(2, 'MBS0005', 'Prime Insurance', '1554477', 'Insurance', '0222555444', 'info@prime.mw', '001,ll', 'LL'),
(3, 'MBS008', 'Canopy Insurance', '11145', 'Insurance', '0111445', 'info@canopy.com', '821,ll', 'LL'),
(4, 'MSB82828', 'Getfair', '18189', 'Insurance', '9888219', 'info@getfairmw.com', '1818 st, LL', 'BT'),
(5, 'MSB1990', 'GWS', '19191', 'Banking', '2020', 'info@gwsmalawi.com', '911920, BT', 'BT'),
(6, '12341234', 'NRB', '1234', 'Reg', '123456', 'nrb@nrb.com', '1918, ll, mwi', 'LL');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `code` varchar(8) NOT NULL,
  `location` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`code`, `location`) VALUES
('BT', 'Blantrye'),
('LL', 'Lilongwe'),
('MZ', 'Mzuzu'),
('ZA', 'Zomba');

-- --------------------------------------------------------

--
-- Table structure for table `representatives`
--

CREATE TABLE `representatives` (
  `id` int(11) NOT NULL,
  `NID_number` varchar(16) DEFAULT NULL,
  `institution` int(11) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `representatives`
--

INSERT INTO `representatives` (`id`, `NID_number`, `institution`, `first_name`, `surname`, `phone`, `email`) VALUES
(1, 'uqyw', 4, 'Ash', 'Mohn', '08882717', 'it@getfairmw.com'),
(2, 'BAVGHU', 5, 'Steph', 'Cheni', '099888178', 'it@gss.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(16) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `institution` int(11) NOT NULL,
  `NID_number` varchar(16) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `institution`, `NID_number`, `first_name`, `surname`, `email`, `phone`, `password`) VALUES
('10102', 3, 1, 'XXX', 'Test', 'User', 'testuser@email.com', '044888777', '827ccb0eea8a706c4c34a16891f84e7b'),
('123', 1, 6, 'twyweur', 'admin', 'admin', 'admin@nrb.com', '01929', '827ccb0eea8a706c4c34a16891f84e7b'),
('1i2102054701', 3, 3, 'UUU', 'Ande', 'Animos', 'animo@email.com', '0111444555', '827ccb0eea8a706c4c34a16891f84e7b'),
('1i2102055004', 3, 1, 'YYY', 'Willi', 'Nkane', 'wk@email.com', '0222444', '827ccb0eea8a706c4c34a16891f84e7b'),
('202010', 2, 1, 'MMS', 'Samson', 'Tons', 'sam@email.com', '0222444', '827ccb0eea8a706c4c34a16891f84e7b'),
('4i2102085719', 2, 4, 'uqyw', 'Ash', 'Mohn', 'it@getfairmw.com', '08882717', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(16) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `description`) VALUES
(1, 'NRBAdmin', NULL),
(2, 'Admin', NULL),
(3, 'Staff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verification_log`
--

CREATE TABLE `verification_log` (
  `log_code` varchar(16) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `holder` varchar(16) DEFAULT NULL,
  `input` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification_log`
--

INSERT INTO `verification_log` (`log_code`, `date`, `time`, `user`, `holder`, `input`) VALUES
('20210205033240', '2021-02-05', '03:32:40', '10102', 'sql', NULL),
('20210205033458', '2021-02-05', '03:34:58', '10102', NULL, 'yyy'),
('20210205033541', '2021-02-05', '03:35:41', '10102', NULL, 'ttt'),
('20210205033548', '2021-02-05', '03:35:48', '10102', 'php', NULL),
('20210205033742', '2021-02-05', '03:37:42', '10102', 'PHP', NULL),
('20210205060217', '2021-02-05', '06:02:17', '10102', NULL, 'NNN'),
('20210205060234', '2021-02-05', '06:02:34', '10102', 'OOO', NULL),
('20210206044653', '2021-02-06', '04:46:53', '10102', 'OOO', NULL),
('20210206044728', '2021-02-06', '04:47:28', '10102', 'VVV', NULL),
('20210206044741', '2021-02-06', '04:47:41', '10102', 'VVV', NULL),
('20210206045808', '2021-02-06', '04:58:08', '10102', 'PHP', NULL),
('20210206051651', '2021-02-06', '05:16:51', '10102', 'VVV', NULL),
('20210206052718', '2021-02-06', '05:27:18', '10102', 'OOO', NULL),
('20210206052739', '2021-02-06', '05:27:39', '10102', 'VVV', NULL),
('20210206052934', '2021-02-06', '05:29:34', '10102', NULL, 'QQQQ'),
('20210206052958', '2021-02-06', '05:29:58', '10102', NULL, 'QQQQ'),
('20210206053023', '2021-02-06', '05:30:23', '10102', NULL, 'ASDF'),
('20210206053407', '2021-02-06', '05:34:07', '10102', NULL, 'ASDASD'),
('20210206053520', '2021-02-06', '05:35:20', '10102', NULL, 'ASDA'),
('20210206053640', '2021-02-06', '05:36:40', '10102', NULL, 'ASDA'),
('20210206053807', '2021-02-06', '05:38:07', '10102', NULL, 'R'),
('20210206053817', '2021-02-06', '05:38:17', '10102', 'VVV', NULL),
('20210206063730', '2021-02-06', '06:37:30', '10102', 'VVV', NULL),
('20210206064024', '2021-02-06', '06:40:24', '10102', 'VVV', NULL),
('20210206064030', '2021-02-06', '06:40:30', '10102', NULL, 'XXX'),
('20210206064036', '2021-02-06', '06:40:36', '10102', 'VVV', NULL),
('20210206064042', '2021-02-06', '06:40:42', '10102', 'OOO', NULL),
('20210206065209', '2021-02-06', '06:52:09', '10102', NULL, 'SSS'),
('20210206065321', '2021-02-06', '06:53:21', '10102', NULL, 'ASDF'),
('20210206065341', '2021-02-06', '06:53:41', '10102', NULL, 'ASDF'),
('20210206065348', '2021-02-06', '06:53:48', '10102', NULL, 'ASDF'),
('20210206065433', '2021-02-06', '06:54:33', '10102', 'VVV', NULL),
('20210206065437', '2021-02-06', '06:54:37', '10102', NULL, 'AEER'),
('20210206065444', '2021-02-06', '06:54:44', '10102', NULL, 'FFF'),
('20210206065543', '2021-02-06', '06:55:43', '10102', 'OOO', NULL),
('20210206141517', '2021-02-06', '14:15:17', '1i2102055004', NULL, 'YYY'),
('20210206141521', '2021-02-06', '14:15:21', '1i2102055004', 'VVV', NULL),
('20210207161326', '2021-02-07', '16:13:26', '10102', NULL, 'YYY'),
('20210207161331', '2021-02-07', '16:13:31', '10102', 'VVV', NULL),
('20210325154733', '2021-03-25', '15:47:33', '1i2102055004', 'VVV', NULL),
('20210325154907', '2021-03-25', '15:49:07', '1i2102055004', 'OOO', NULL),
('20210412123508', '2021-04-12', '12:35:08', '1i2102055004', 'VVV', NULL),
('20210412123545', '2021-04-12', '12:35:45', '1i2102055004', 'VVV', NULL),
('20210412123552', '2021-04-12', '12:35:52', '1i2102055004', NULL, 'SDFASDF'),
('20210413080358', '2021-04-13', '08:03:58', '1i2102055004', 'VVV', NULL),
('20210506144855', '2021-05-06', '14:48:55', '1i2102055004', 'VVV', NULL),
('20210506144905', '2021-05-06', '14:49:05', '1i2102055004', NULL, 'WEAESAEA'),
('20210714162515', '2021-07-14', '16:25:15', '1i2102055004', 'VVV', NULL),
('20210727193339', '2021-07-27', '19:33:39', '1i2102055004', 'VVV', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institution` (`institution`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `application_statuses`
--
ALTER TABLE `application_statuses`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`filename`),
  ADD KEY `application` (`application`);

--
-- Indexes for table `holders`
--
ALTER TABLE `holders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`),
  ADD KEY `location` (`location`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `representatives`
--
ALTER TABLE `representatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institution` (`institution`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `institution` (`institution`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_log`
--
ALTER TABLE `verification_log`
  ADD PRIMARY KEY (`log_code`),
  ADD KEY `user` (`user`),
  ADD KEY `holder` (`holder`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `representatives`
--
ALTER TABLE `representatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`institution`) REFERENCES `institutions` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`status`) REFERENCES `application_statuses` (`status`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`application`) REFERENCES `applications` (`id`);

--
-- Constraints for table `institutions`
--
ALTER TABLE `institutions`
  ADD CONSTRAINT `institutions_ibfk_1` FOREIGN KEY (`location`) REFERENCES `locations` (`code`);

--
-- Constraints for table `representatives`
--
ALTER TABLE `representatives`
  ADD CONSTRAINT `representatives_ibfk_1` FOREIGN KEY (`institution`) REFERENCES `institutions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type`) REFERENCES `user_types` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`institution`) REFERENCES `institutions` (`id`);

--
-- Constraints for table `verification_log`
--
ALTER TABLE `verification_log`
  ADD CONSTRAINT `verification_log_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `verification_log_ibfk_2` FOREIGN KEY (`holder`) REFERENCES `holders` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
