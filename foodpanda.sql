-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 02:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodpanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `OrderID` int(10) NOT NULL,
  `Cus_nameID` varchar(20) NOT NULL,
  `RiderID` int(10) NOT NULL,
  `bk_menuID` varchar(255) NOT NULL,
  `Total_Price` float NOT NULL,
  `PaymentID` int(255) NOT NULL,
  `Datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cus_nameID` varchar(20) NOT NULL,
  `Cus_Password` varchar(16) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Cus_Tel` text NOT NULL,
  `Cus_Location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cus_nameID`, `Cus_Password`, `Email`, `Cus_Tel`, `Cus_Location`) VALUES
('', 'Wine1902', 'Wine1902@hotmail.com', '0902159661', '24/7 ม.4 ต.บางกะเจ้า อ.พระประแดง จ.สมุทรปราการ 10130'),
('Arnon1234', 'Arnon1234', 'asdasd@email.com', '02145212255', '24/7 ม.4 ต.บางกะเจ้า อ.พระประแดง จ.สมุทรปราการ 10130'),
('Wine1502', 'Wine1502', 'Wine1502@hotmail.com', '0967436859', '24/7 ม.4 ต.บางกะเจ้า อ.พระประแดง จ.สมุทรปราการ 10130'),
('Wine1702', 'Wine1702', ' wine.valentino12@gmail.com', '0535330375', 'sas'),
('Wine1802', 'Wine1802', 'lin_bm@hotmail.com', '0967436958', 'bangkok');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int(10) NOT NULL,
  `Res_nameID` varchar(20) NOT NULL,
  `Price` float NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `Res_nameID`, `Price`, `Name`, `Image`) VALUES
(105, 'Sawaros501', 85, 'บลูเบอร์รี่ชีสเค้ก', '202010051614314349.jpg'),
(106, 'Sawaros501', 85, 'ช็อคโกเเลตเค้ก', '202010051750215878.jpg'),
(107, 'Sawaros501', 75, 'ชีสเค้กหน้าไหม้', '202010051483824517.jpg'),
(108, 'Sawaros501', 75, 'เครปเค้กเรนโบว์', '202010051493650614.jpg'),
(109, 'Sawaros601', 105, 'กุ้งทอดกระเทียม', '202010051008952342.jpg'),
(111, 'Sawaros601', 55, 'ผัดมาม่า', '20201005947964832.jpg'),
(112, 'Sawaros601', 55, 'ผัดคะน้าหมูกรอบ+ไข่ด', '202010061015800100.jpg'),
(113, 'Sawaros601', 65, 'ผัดไทยกุ้งสด', '20201006262552282.jpg'),
(114, 'Tamsang2542', 139, 'สเต๊กเนื้อ', '20201006789420854.jpg'),
(115, 'Tamsang2542', 119, 'สเต๊กไก่', '20201006882094179.webp'),
(116, 'Tamsang2542', 95, 'สลัดผัก', '20201006907682764.jpg'),
(117, 'Tamsang2542', 79, 'เฟรนช์ฟราย', '202010061389750732.jpg'),
(118, 'Water1234', 50, 'โกโก้ปั่น', '20201006245651492.jpg'),
(119, 'Water1234', 65, 'ชานมไข่มุก', '202010061213293378.jfif'),
(120, 'Water1234', 50, 'แตงโมปั่น', '202010061822907043.jpg'),
(121, 'Water1234', 50, 'แอปเปิ้ลเขียวปั่น', '202010061484068881.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(10) NOT NULL,
  `Payment Method` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `Payment Method`) VALUES
(40626301, 'cash'),
(40626302, 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Res_nameID` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Tel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Res_nameID`, `Name`, `Email`, `Password`, `Tel`) VALUES
('Sawaros501', 'Captain Bakery ', 'lin_bm@hotmail.com', 'Sawaros501', '0967436958'),
('Sawaros601', 'Pink panther', 'lin.bm@hotmail.com', 'Sawaros601', '0967436958'),
('Tamsang2542', 'Check in', 'Tanat_09@gmail.com', 'Tamsang2542', '0899877878'),
('Water1234', 'i-fresh', 'Rosemary@gmail.com', 'Water1234', '0998656363');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `RiderID` (`RiderID`),
  ADD KEY `PaymentID` (`PaymentID`),
  ADD KEY `Cus_nameID` (`Cus_nameID`),
  ADD KEY `bk_menuID` (`bk_menuID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cus_nameID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Res_nameID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`RiderID`) REFERENCES `rider` (`RiderID`),
  ADD CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`PaymentID`),
  ADD CONSTRAINT `bill_ibfk_4` FOREIGN KEY (`Cus_nameID`) REFERENCES `customer` (`Cus_nameID`),
  ADD CONSTRAINT `bill_ibfk_5` FOREIGN KEY (`bk_menuID`) REFERENCES `bucket` (`bk_menuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
