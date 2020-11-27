-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2020 at 05:22 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `price`, `user_id`) VALUES
(67, 'NASI GORENG TELUR', 18000, 1),
(68, 'AQUA', 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `invoice_number` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `suplier` varchar(50) NOT NULL,
  `cost` int(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE IF NOT EXISTS `purchases_item` (
  `invoice_number` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `invoice_number` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `cash` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Customer_name` varchar(50) NOT NULL,
  `Customer_Telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`invoice_number`, `date`, `amount`, `cash`, `user_id`, `Customer_name`, `Customer_Telp`) VALUES
('JL-18012019-011849', '01/17/19', '46000', '50000', 1, '', ''),
('JL-18012019-171446', '01/18/19', '46000', '50000', 1, '', ''),
('JL-19112020-015111', '11/18/20', '18000', '50000', 1, '', ''),
('JL-19112020-020845', '11/18/20', '5000', '10000', 1, '', ''),
('JL-19112020-021224', '11/18/20', '72000', '100000', 1, '', ''),
('JL-19112020-021244', '11/18/20', '46000', '50000', 1, 'Putri', '087746357213');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
  `invoice_number` varchar(20) NOT NULL,
  `product` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`invoice_number`, `product`, `qty`, `amount`, `product_code`, `price`, `date`) VALUES
('JL-18012019-011849', '67', 2, '36000', 'NASI GORENG TELUR', '18000', '01/18/19'),
('JL-18012019-011849', '68', 2, '10000', 'AQUA', '5000', '01/18/19'),
('JL-18012019-171446', '67', 1, '18000', 'NASI GORENG TELUR', '18000', '01/18/19'),
('JL-18012019-171446', '68', 2, '10000', 'AQUA', '5000', '01/18/19'),
('JL-18012019-171446', '67', 1, '18000', 'NASI GORENG TELUR', '18000', '01/18/19'),
('JL-19112020-015111', '67', 1, '18000', 'NASI GORENG TELUR', '18000', '11/19/20'),
('JL-19112020-020845', '68', 1, '5000', 'AQUA', '5000', '11/19/20'),
('JL-19112020-021124', '67', 3, '54000', 'NASI GORENG TELUR', '18000', '11/19/20'),
('JL-19112020-021224', '67', 4, '72000', 'NASI GORENG TELUR', '18000', '11/19/20'),
('JL-19112020-021244', '67', 1, '18000', 'NASI GORENG TELUR', '18000', '11/19/20'),
('JL-19112020-021244', '67', 1, '18000', 'NASI GORENG TELUR', '18000', '11/19/20'),
('JL-19112020-021244', '68', 2, '10000', 'AQUA', '5000', '11/19/20'),
('JL-19112020-024716', '67', 3, '54000', 'NASI GORENG TELUR', '18000', '11/19/20'),
('JL-19112020-190224', '67', 1, '18000', 'NASI GORENG TELUR', '18000', '11/19/20');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE IF NOT EXISTS `supliers` (
`suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(50) NOT NULL,
  `suplier_address` varchar(50) NOT NULL,
  `suplier_contact` varchar(50) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  `note` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'kasir', 'kasir', 'kasir cafe', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
 ADD PRIMARY KEY (`invoice_number`), ADD KEY `userid` (`user_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
 ADD KEY `inv` (`invoice_number`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`invoice_number`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
 ADD KEY `inv` (`invoice_number`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
 ADD PRIMARY KEY (`suplier_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `supliers`
--
ALTER TABLE `supliers`
ADD CONSTRAINT `supliers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
