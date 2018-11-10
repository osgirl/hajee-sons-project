-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2018 at 08:23 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `haji`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribute`
--

CREATE TABLE IF NOT EXISTS `distribute` (
  `id` int(11) NOT NULL,
  `point` varchar(111) NOT NULL,
  `product` varchar(111) NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `date` varchar(111) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distribute_ok`
--

CREATE TABLE IF NOT EXISTS `distribute_ok` (
  `id` int(44) NOT NULL,
  `point` varchar(44) NOT NULL,
  `total` double NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribute_ok`
--

INSERT INTO `distribute_ok` (`id`, `point`, `total`, `date`) VALUES
(1, 'kalaiya', 4.6, '2017-12-24'),
(2, 'kalaiya', 1122, '2017-12-24'),
(3, 'kalaiya', 552, '2017-12-12'),
(4, 'kalaiya', 777, '2017-12-10'),
(5, 'kalaiya', 2.4, '2017-12-02'),
(6, 'à¦¬à¦°à¦—à§à¦¨à¦¾(Borguna)', 429, '2017-12-30'),
(7, 'à¦¬à¦°à¦—à§à¦¨à¦¾(Borguna)', 429, '2017-12-30'),
(8, '', 0, '2017-12-30'),
(9, '', 0, '2017-12-30'),
(10, 'à¦ªà¦Ÿà§à§Ÿà¦¾à¦–à¦¾à¦²à§€(Potuakhali) ', 4.6, '2017-12-30'),
(11, 'à¦ªà¦Ÿà§à§Ÿà¦¾à¦–à¦¾à¦²à§€(Potuakhali) ', 14, '2017-12-30'),
(12, 'à¦ªà¦Ÿà§à§Ÿà¦¾à¦–à¦¾à¦²à§€(Potuakhali) ', 14, '2017-12-30'),
(13, '', 0, '2017-12-30'),
(14, 'à¦¦à§à¦®à¦•à¦¿(Dumki)', 0, '2017-12-30'),
(15, 'à¦¦à§à¦®à¦•à¦¿(Dumki)', 0, '2017-12-30'),
(16, 'à¦¦à§à¦®à¦•à¦¿(Dumki)', 0, '2017-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL,
  `image` text NOT NULL,
  `fname` varchar(44) NOT NULL,
  `mname` varchar(44) NOT NULL,
  `gender` varchar(22) NOT NULL,
  `religion` varchar(22) NOT NULL,
  `age` int(22) NOT NULL,
  `bank_ac` int(22) NOT NULL,
  `bank_name` varchar(22) NOT NULL,
  `mobile` int(22) NOT NULL,
  `mail` text NOT NULL,
  `nid` int(22) NOT NULL,
  `address` text NOT NULL,
  `marital` varchar(22) NOT NULL,
  `join_date` varchar(22) NOT NULL,
  `salary` int(22) NOT NULL,
  `job_title` varchar(22) NOT NULL,
  `job_location` varchar(22) NOT NULL,
  `reference` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL,
  `user` varchar(222) NOT NULL,
  `type` varchar(222) NOT NULL,
  `amount` float NOT NULL,
  `date` varchar(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_list`
--

CREATE TABLE IF NOT EXISTS `expense_list` (
  `id` int(11) NOT NULL,
  `name` varchar(66) NOT NULL,
  `date` varchar(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_list`
--

INSERT INTO `expense_list` (`id`, `name`, `date`) VALUES
(2, 'à¦—à¦¾à§œà§€à¦° à¦¤à§‡à¦² à¦–à¦°à¦š', '2017-11-05'),
(3, 'à¦—à¦¾à§œà§€à¦° à¦®à§‡à¦°à¦¾à¦®à¦¤', '2017-11-05'),
(4, 'à¦ªà¦¾à¦¨à¦¿à¦° à¦¬à¦¿à¦²', '2017-11-05'),
(5, 'à¦¬à¦¿à¦¦à§à¦¯à§à§Ž à¦¬à¦¿à¦²', '2017-11-05'),
(6, 'à¦Ÿà§‡à¦²à¦¿à¦«à§‹à¦¨ à¦¬à¦¿à¦²', '2017-11-05'),
(7, 'à¦ªà§‡à¦ªà¦¾à¦° à¦¬à¦¿à¦²', '2017-11-05'),
(8, 'à¦…à¦«à¦¿à¦¸ à¦–à¦°à¦š', '2017-11-05'),
(11, 'à¦˜à¦° à¦­à¦¾à§œà¦¾', '2017-11-05'),
(12, 'à¦—à¦¾à§œà¦¿à¦° à¦—à§à¦¯à¦¾à¦°à§‡à¦œ à¦­à¦¾à§œà¦¾', '2017-11-05'),
(13, 'TEA BILL', '2017-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE IF NOT EXISTS `import` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `quantity` float NOT NULL,
  `price` int(111) NOT NULL,
  `date` varchar(111) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `import_account`
--

CREATE TABLE IF NOT EXISTS `import_account` (
  `id` int(11) NOT NULL,
  `product` text NOT NULL,
  `total` float NOT NULL,
  `paid` float NOT NULL,
  `payment_type` varchar(22) NOT NULL,
  `bank_name` varchar(22) NOT NULL,
  `bkash_num` varchar(22) NOT NULL,
  `due` float NOT NULL,
  `date` varchar(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `quantity` float NOT NULL,
  `price` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_check`
--

CREATE TABLE IF NOT EXISTS `list_check` (
  `id` int(11) NOT NULL,
  `product` text NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `tprice` float NOT NULL,
  `point` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_check_point`
--

CREATE TABLE IF NOT EXISTS `list_check_point` (
  `id` int(11) NOT NULL,
  `product` text NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `tprice` float NOT NULL,
  `point` varchar(66) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL,
  `username` varchar(111) NOT NULL,
  `pass` int(40) NOT NULL,
  `user` varchar(100) NOT NULL,
  `type` enum('ADMIN','USER') NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `pass`, `user`, `type`) VALUES
(1, 'admin', 123, 'admin', 'ADMIN'),
(2, 'borguna', 123, 'à¦¬à¦°à¦—à§à¦¨à¦¾(Borguna)', 'USER'),
(3, 'dumki', 123, 'à¦¦à§à¦®à¦•à¦¿(Dumki)', 'USER'),
(4, 'potuakhali', 123, 'à¦ªà¦Ÿà§à§Ÿà¦¾à¦–à¦¾à¦²à§€(Potuakhali) ', 'USER'),
(5, 'kolatoli', 123, 'Kolatoli', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `point_account`
--

CREATE TABLE IF NOT EXISTS `point_account` (
  `id` int(11) NOT NULL,
  `point` varchar(44) NOT NULL,
  `product` text NOT NULL,
  `due` double NOT NULL,
  `paid` double NOT NULL,
  `date` varchar(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point_inventory`
--

CREATE TABLE IF NOT EXISTS `point_inventory` (
  `id` int(11) NOT NULL,
  `point` varchar(111) NOT NULL,
  `product` varchar(111) NOT NULL,
  `quantity` float NOT NULL,
  `price` int(111) NOT NULL,
  `p_id` int(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point_list`
--

CREATE TABLE IF NOT EXISTS `point_list` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `code` varchar(111) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_list`
--

INSERT INTO `point_list` (`id`, `name`, `code`) VALUES
(1, 'à¦¦à§à¦®à¦•à¦¿(Dumki)', 'DP'),
(3, 'à¦ªà¦Ÿà§à§Ÿà¦¾à¦–à¦¾à¦²à§€(Potuakhali) ', 'PK'),
(4, 'à¦¬à¦°à¦—à§à¦¨à¦¾(Borguna)', 'BS'),
(5, 'Kolatoli', 'kt'),
(6, 'kalaiya', 'kl');

-- --------------------------------------------------------

--
-- Table structure for table `point_sale`
--

CREATE TABLE IF NOT EXISTS `point_sale` (
  `id` int(11) NOT NULL,
  `point` varchar(111) NOT NULL,
  `product` varchar(111) NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `date` varchar(111) NOT NULL,
  `p_id` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point_sale_account`
--

CREATE TABLE IF NOT EXISTS `point_sale_account` (
  `id` int(11) NOT NULL,
  `point` varchar(66) NOT NULL,
  `product` varchar(66) NOT NULL,
  `amount` float NOT NULL,
  `date` varchar(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE IF NOT EXISTS `product_list` (
  `id` int(11) NOT NULL,
  `name` varchar(111) CHARACTER SET utf8 NOT NULL,
  `price` int(111) NOT NULL,
  `sprice` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `price`, `sprice`) VALUES
(13, 'BH S', 10, 12),
(14, 'BH BG 20s', 12, 14),
(15, 'BH BG 20s LEP', 11, 16),
(16, 'BH BG 12s', 22, 24),
(17, 'BH SF 20s', 22, 25),
(18, 'BH SF 20s LEP', 22, 23),
(19, 'BH SF 12s', 11, 12),
(20, 'BH Family', 11, 14),
(21, 'PGF20L', 15, 17),
(22, 'PG SPL20H', 16, 19),
(23, 'PGF 12HL', 12, 14),
(24, 'PG SW', 11, 13),
(25, 'PG Family', 11, 13),
(26, 'PMB20H', 44, 46),
(27, 'PM Family', 33, 37),
(28, 'CAF20H', 11, 12),
(29, 'CA Family', 44, 48),
(30, 'SRF Touch Pack 20H', 22, 26),
(31, 'SRFTouch Pack 10H', 15, 17),
(32, 'STAR 20H LEP', 22, 25),
(33, 'STAR 10H LEP', 22, 26),
(34, 'SR Parents', 22, 26),
(35, 'SRN20H', 22, 26),
(36, 'SRN10H', 11, 15),
(37, 'SR Next', 44, 55),
(38, 'SR Family', 11, 14),
(39, 'PL 20HL', 11, 22),
(40, 'PL Family', 122, 126),
(41, 'DB20H', 11, 22),
(42, 'DB10S', 121, 222),
(43, 'DB10H', 111, 222),
(44, 'DB Special 20HL', 12, 23),
(45, 'DB Special 10HL', 121, 133),
(46, 'DB Style20H', 12, 21),
(47, 'DB Style10H', 11, 22),
(48, 'DB Family', 111, 22),
(49, 'HW20HL', 11, 22),
(50, 'HW10SS', 11, 22),
(51, 'HW Family', 11, 22);

-- --------------------------------------------------------

--
-- Table structure for table `salary_paid`
--

CREATE TABLE IF NOT EXISTS `salary_paid` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(22) NOT NULL,
  `basic_paid` int(22) NOT NULL,
  `add_paid` int(22) NOT NULL,
  `total_paid` int(22) NOT NULL,
  `due` int(22) NOT NULL,
  `month` varchar(22) NOT NULL,
  `pay_date` varchar(22) NOT NULL,
  `pay_method` varchar(22) NOT NULL,
  `bank` varchar(22) NOT NULL,
  `bkash_num` varchar(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `send_money`
--

CREATE TABLE IF NOT EXISTS `send_money` (
  `id` int(11) NOT NULL,
  `user` varchar(111) NOT NULL,
  `paid` float NOT NULL,
  `payment_type` varchar(111) NOT NULL,
  `bank_name` varchar(111) NOT NULL,
  `bkash_num` text NOT NULL,
  `due` float NOT NULL,
  `date` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `take_due`
--

CREATE TABLE IF NOT EXISTS `take_due` (
  `id` int(11) NOT NULL,
  `point` varchar(111) NOT NULL,
  `paid` float NOT NULL,
  `payment_type` varchar(111) NOT NULL,
  `bank_name` varchar(111) NOT NULL,
  `bkash_num` text NOT NULL,
  `due` float NOT NULL,
  `date` varchar(111) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribute`
--
ALTER TABLE `distribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribute_ok`
--
ALTER TABLE `distribute_ok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_list`
--
ALTER TABLE `expense_list`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_account`
--
ALTER TABLE `import_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `list_check`
--
ALTER TABLE `list_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_check_point`
--
ALTER TABLE `list_check_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`username`), ADD UNIQUE KEY `user_2` (`username`);

--
-- Indexes for table `point_account`
--
ALTER TABLE `point_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_inventory`
--
ALTER TABLE `point_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_list`
--
ALTER TABLE `point_list`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `point_sale`
--
ALTER TABLE `point_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_sale_account`
--
ALTER TABLE `point_sale_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_paid`
--
ALTER TABLE `salary_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_money`
--
ALTER TABLE `send_money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take_due`
--
ALTER TABLE `take_due`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribute`
--
ALTER TABLE `distribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `distribute_ok`
--
ALTER TABLE `distribute_ok`
  MODIFY `id` int(44) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `expense_list`
--
ALTER TABLE `expense_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `import_account`
--
ALTER TABLE `import_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `point_account`
--
ALTER TABLE `point_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `point_inventory`
--
ALTER TABLE `point_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `point_list`
--
ALTER TABLE `point_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `point_sale`
--
ALTER TABLE `point_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `point_sale_account`
--
ALTER TABLE `point_sale_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `salary_paid`
--
ALTER TABLE `salary_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `send_money`
--
ALTER TABLE `send_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `take_due`
--
ALTER TABLE `take_due`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
