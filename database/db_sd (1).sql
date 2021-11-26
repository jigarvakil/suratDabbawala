-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 10:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminname`, `userid`, `password`, `email`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'jigarvakil011@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allocation`
--

CREATE TABLE `tbl_allocation` (
  `aid` int(11) NOT NULL,
  `adate` date NOT NULL DEFAULT current_timestamp(),
  `dbuserid` int(11) NOT NULL,
  `dabbaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_allocation`
--

INSERT INTO `tbl_allocation` (`aid`, `adate`, `dbuserid`, `dabbaid`) VALUES
(1, '0000-00-00', 8, 23),
(2, '0000-00-00', 5, 18),
(3, '2020-05-31', 5, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aprofile`
--

CREATE TABLE `tbl_aprofile` (
  `aid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aprofile`
--

INSERT INTO `tbl_aprofile` (`aid`, `fname`, `email`, `address`, `username`) VALUES
(2, 'Pooja And Pintu', 'suratdabbawala@gmail.com', 'Surat 395006', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `areaid` int(11) NOT NULL,
  `areaname` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`areaid`, `areaname`, `pincode`, `latitude`, `longitude`) VALUES
(1, 'vesu', 395009, 21.1418, 72.7709),
(6, 'adajan', 30000, 21.1959, 72.7933),
(8, 'pal gam', 12345, 21.198, 72.7739),
(11, 'varchhaa', 395006, 24.908, 78.901);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chargeinfo`
--

CREATE TABLE `tbl_chargeinfo` (
  `cid` int(11) NOT NULL,
  `normal` int(11) NOT NULL,
  `urgent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chargeinfo`
--

INSERT INTO `tbl_chargeinfo` (`cid`, `normal`, `urgent`) VALUES
(7, 10, 5),
(9, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `compid` int(11) NOT NULL,
  `ctype` varchar(20) NOT NULL COMMENT '0-deliverytime 1-foodquality 2-others',
  `date` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`compid`, `ctype`, `date`, `title`, `description`, `userid`, `oid`, `status`) VALUES
(16, '0', '2020-03-01', 'late delivery', 'dabba late deliverd', 1, 1, 1),
(17, '1', '2020-03-02', 'thali food quantity', 'thali food quantity', 11, 2, 0),
(18, '1', '2020-06-01', 'asdasas', 'sadsadsadasdasdaaddsd', 23, 16, 0),
(19, '1', '2020-06-01', 'asdasas', 'sadsadsadasdasdaaddsd', 23, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contactid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contactid`, `userid`, `subject`, `message`) VALUES
(1, 1, 'dabbawala', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(2, 1, 'dabbawala', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(3, 1, 'dabbawala', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(4, 1, 'dabbawala', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(5, 1, 'dabbawala', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dabbainfo`
--

CREATE TABLE `tbl_dabbainfo` (
  `dabbaid` int(11) NOT NULL,
  `dabbacode` varchar(40) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dabbainfo`
--

INSERT INTO `tbl_dabbainfo` (`dabbaid`, `dabbacode`, `userid`) VALUES
(1, '2020-03-14-Pintu', 6),
(2, '2020-03-14-Pintu1', 12),
(3, 'Team work-23', 23),
(4, 'Rahul Modi-24', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dabbawala`
--

CREATE TABLE `tbl_dabbawala` (
  `dbuserid` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mobileno` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `licence` varchar(20) NOT NULL,
  `doj` date NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT '0-Pending 1- Approved 2- Notapproved',
  `areaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dabbawala`
--

INSERT INTO `tbl_dabbawala` (`dbuserid`, `firstname`, `lastname`, `mobileno`, `email`, `password`, `photo`, `licence`, `doj`, `dob`, `address`, `status`, `areaid`) VALUES
(5, 'Kapil', 'Sharma', 1234567890, 'poojawankhede999@gmail.com', '202cb962ac59075b964b07152d234b70', '2.png', 'l.jpg', '2020-03-01', '2000-06-26', 'b-109,Rachna soc', '1', 11),
(6, 'kartik', 'joshi', 2147483647, 'pinusavani25@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user4.jpg', '1.jpg', '2020-03-13', '1999-03-01', 'a-1, tulsi soc.,', '', 11),
(8, 'krushang', 'chauhan', 2147483647, 'krushang666@gmail.com', '202cb962ac59075b964b07152d234b70', 'Screenshot (1).png', '', '2020-03-04', '2020-03-03', 'gharma', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliveryhistory`
--

CREATE TABLE `tbl_deliveryhistory` (
  `histid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `d_date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 not deliver,1- deliver,2-cancel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_deliveryhistory`
--

INSERT INTO `tbl_deliveryhistory` (`histid`, `aid`, `d_date`, `status`) VALUES
(3, 1, '2020-05-29', 1),
(4, 1, '2020-05-30', 1),
(5, 1, '2020-05-31', 2),
(6, 2, '2020-05-31', 1),
(7, 3, '2020-05-31', 1),
(8, 1, '2020-05-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dishtype`
--

CREATE TABLE `tbl_dishtype` (
  `tid` int(11) NOT NULL,
  `typename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dishtype`
--

INSERT INTO `tbl_dishtype` (`tid`, `typename`) VALUES
(3, 'south indian'),
(16, 'chinese'),
(29, 'Gujrati'),
(35, 'panjabi'),
(37, 'Rajasthani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holiday`
--

CREATE TABLE `tbl_holiday` (
  `holidayid` int(11) NOT NULL,
  `gdate` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `holidaydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_holiday`
--

INSERT INTO `tbl_holiday` (`holidayid`, `gdate`, `title`, `reason`, `holidaydate`) VALUES
(9, '2020-01-15', 'abc', 'ssc', '2020-01-17'),
(29, '2020-02-09', 'abc', 'Dabbawala strike', '2020-03-05'),
(30, '2020-03-01', 'weather issues', 'Weather issues', '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lat_long`
--

CREATE TABLE `tbl_lat_long` (
  `lid` int(11) NOT NULL,
  `areaid` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `leaveid` int(11) NOT NULL,
  `date` date NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `status` int(20) NOT NULL COMMENT '0-pending , 1- accept. 2-reject',
  `dbuserid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`leaveid`, `date`, `no_of_days`, `reason`, `status`, `dbuserid`) VALUES
(8, '2020-03-01', 1, 'not well', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `oid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `odate` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0-pending for res approve 1-res approve 2-delivered 3-res canceled 4-user cancle',
  `thaliid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`oid`, `userid`, `odate`, `description`, `status`, `thaliid`) VALUES
(3, 1, '0000-00-00', 'thali', 0, 13),
(5, 1, '2020-03-11', 'thali', 0, 20),
(10, 1, '2020-03-11', 'thali', 0, 20),
(12, 1, '2020-03-11', 'thali', 0, 20),
(13, 1, '2020-03-12', 'thali', 0, 20),
(14, 18, '2020-03-19', '', 1, 22),
(15, 18, '2020-03-19', '', 0, 20),
(16, 23, '2020-05-30', '', 1, 22),
(17, 23, '2020-06-02', '', 0, 22),
(18, 23, '2020-06-02', '', 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `pid` int(11) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `remark` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`pid`, `pname`, `remark`, `price`, `description`, `days`) VALUES
(4, 'Monthly Package', '1 km', 3, '1 km = 5 Rs for monthly package', 30),
(5, '3 Monthly Package', '1 km', 2, '1 km = 3 Rs for 3 monthly package', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packageinfo`
--

CREATE TABLE `tbl_packageinfo` (
  `packid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `packstartdate` date NOT NULL,
  `packenddate` date NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packageinfo`
--

INSERT INTO `tbl_packageinfo` (`packid`, `pid`, `packstartdate`, `packenddate`, `userid`, `amount`, `discount`, `remark`, `status`) VALUES
(2, 4, '2020-03-14', '2020-04-13', 23, 300, 30, 'Welcome', 1),
(3, 5, '2020-05-30', '2020-07-29', 23, 1260, 0, 'package for 3 months', 0),
(4, 4, '2020-05-31', '2020-06-30', 24, 630, 0, 'package for 1 month', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pid` int(11) NOT NULL,
  `paymentno` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `walletid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reference`
--

CREATE TABLE `tbl_reference` (
  `refid` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `restid` int(11) NOT NULL,
  `restname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0-Pending 1- Approved 2- Notapproved',
  `email` varchar(30) NOT NULL,
  `ownername` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `doj` date NOT NULL,
  `mobileno` int(11) NOT NULL,
  `opentime` int(11) NOT NULL,
  `closetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`restid`, `restname`, `password`, `photo`, `status`, `email`, `ownername`, `address`, `doj`, `mobileno`, `opentime`, `closetime`) VALUES
(1, 'food cheff', '0', '5.jpg', 1, 'poojawankede999@gmail.com', 'kartik', 'abc', '2020-01-01', 1234567890, 10, 11),
(7, 'yammy', '68ad621b70e433167be70b23ce8b99ee', '1.jpg', 1, 'abc@gmail.com', 'arjun', 'xyz abc', '0000-00-00', 2147483647, 0, 0),
(9, 'Enjoy Restaurant', '0', '3.jpg', 1, 'pintusavani25@gmail.com', 'Arjun Patel', 'Sarthana Jakatnaka ', '2020-01-10', 2147483647, 9, 11),
(10, 'Trainian Express Restaurant', '202cb962ac59075b964b07152d234b70', '6.jpg', 0, 'poojawankhede999@gmail.com', 'Arjun ', 'Trainian Express Restaurant , Vesu Address: UG-47/48 Atlanta Shoppers near Reliance Market, Vesu, Su', '2020-03-01', 1234567890, 11, 11),
(11, 'The ropeway restaurant', '202cb962ac59075b964b07152d234b70', '4.jpg', 0, 'poojawankhede999@gmail.com', 'Varun', 'The Ropeway Restaurant Location ⤵️ shop 101-104, Aakash Retail, Nr. Prime Shoppers, Surat, Gujarat 3', '2019-08-10', 546463456, 10, 11),
(12, 'Jelly Berry Restaurant', 'da4fb5c6e93e74d3df8527599fa62642', '2.jpg', 1, 'poojawankhede999@gmail.com', 'jelly', 'First Floor, Silver Point, Green City Road, Pal Bhatha, Surat - 394510, Near Galaxy Circle', '2018-06-12', 325687346, 11, 11),
(20, 'Fahad', '', 'Screenshot (1).png', 0, 'fahadvohra143@gmail.com', 'Fahad', 'surat', '2020-06-02', 2147483647, 9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restroadmin`
--

CREATE TABLE `tbl_restroadmin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(20) NOT NULL,
  `restid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_restroadmin`
--

INSERT INTO `tbl_restroadmin` (`adminid`, `adminname`, `restid`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'da4fb5c6e93e74d3df8527599fa62642', 'poojawankhede999@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `rid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `massage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`rid`, `userid`, `massage`) VALUES
(1, 0, ''),
(2, 0, ''),
(3, 18, 'good service'),
(4, 18, 'good service'),
(5, 18, 'good service'),
(6, 18, 'good service');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `rolename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `rolename`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Dabbawala'),
(4, 'Restro');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route`
--

CREATE TABLE `tbl_route` (
  `routeid` int(11) NOT NULL,
  `sourceaddr` varchar(100) NOT NULL,
  `destinationaddr` varchar(100) NOT NULL,
  `km` int(11) NOT NULL,
  `sourceareaid` int(11) NOT NULL,
  `destinationareaid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_route`
--

INSERT INTO `tbl_route` (`routeid`, `sourceaddr`, `destinationaddr`, `km`, `sourceareaid`, `destinationareaid`, `userid`) VALUES
(2, 'sdcsd', 'sdcs', 7, 1, 6, 1),
(3, 'yntyrbergvregr43', 'jnjbhn', 2, 11, 11, 18),
(6, 'prime arcade', 'vip road', 7, 6, 1, 23),
(7, 'adajan gam', 'vesu char rasta', 7, 6, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salaryinfo`
--

CREATE TABLE `tbl_salaryinfo` (
  `sid` int(11) NOT NULL,
  `date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `deduction` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `dbuserid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_salaryinfo`
--

INSERT INTO `tbl_salaryinfo` (`sid`, `date`, `salary`, `deduction`, `bonus`, `total_amount`, `dbuserid`) VALUES
(9, '2020-03-12', 12000, 0, 0, 12000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thali`
--

CREATE TABLE `tbl_thali` (
  `thaliid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `thaliname` varchar(20) NOT NULL,
  `pic` varchar(20) NOT NULL,
  `restid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_thali`
--

INSERT INTO `tbl_thali` (`thaliid`, `tid`, `thaliname`, `pic`, `restid`, `price`, `description`) VALUES
(13, 3, 'pav bhaji', '18.jpg', 7, 100, '3 pav + bhaji + aachar'),
(20, 3, 'Edli Sabhar', '9.jpg', 1, 130, '6 Idli + 1 Chatni + 1 Sambhar'),
(21, 16, 'Chinese Mix Bhel', '3.jpg', 10, 240, 'Manchurian + Chinese Rice + Noodles'),
(22, 3, 'Masala Dhosa', '10.jpg', 12, 130, '2 masala dhosa + chatani + sambhar'),
(23, 35, 'Chole bhature', '6.jpg', 1, 159, '2 Bhatura + 1 Chhole Sabji + Achhar + Salad'),
(25, 37, 'Dal Bti', '14.jpg', 1, 200, '3 Bati + 1 Dal + 1 laddu + achhae'),
(26, 35, 'pav bhaji', '18.jpg', 1, 130, '3 pav + bhaji + aachar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking`
--

CREATE TABLE `tbl_tracking` (
  `tid` int(11) NOT NULL,
  `date` date NOT NULL,
  `starttime` varchar(10) NOT NULL,
  `endtime` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remark` varchar(20) NOT NULL,
  `dabbaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tracking`
--

INSERT INTO `tbl_tracking` (`tid`, `date`, `starttime`, `endtime`, `status`, `remark`, `dabbaid`) VALUES
(13, '0000-00-00', '12:00', '3:00', '0', 'dummy', 1),
(14, '0000-00-00', '12:00', '3:00', '0', 'dummy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transation`
--

CREATE TABLE `tbl_transation` (
  `transid` int(11) NOT NULL,
  `transdate` date NOT NULL,
  `transno` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transation`
--

INSERT INTO `tbl_transation` (`transid`, `transdate`, `transno`, `type`, `amount`, `status`, `userid`, `description`) VALUES
(1, '0000-00-00', '93', 'Card ', 100, 'success', 1, 'Thali order'),
(4, '2020-03-11', '93cc4b22430a35905ab9', 'Card ', 100, 'success', 1, 'Thali order'),
(9, '2020-03-11', '888e61ef1efc8a971c67', 'Card ', 130, 'success', 1, 'Thali order'),
(11, '2020-03-11', 'f48bf03c7afb802c58e8', 'Card ', 130, 'success', 1, 'Thali order'),
(12, '2020-03-12', '4518fe69b5b6e30a4df9', 'Card ', 130, 'success', 1, 'Thali order'),
(13, '2020-03-17', '', 'Card ', 0, '', 18, 'Thali order'),
(14, '2020-03-17', '97777ffa39991a10c642', 'Card ', 630, 'success', 18, ''),
(15, '2020-03-19', '0f4e195c5127301c62f2', 'Card ', 130, 'success', 18, 'Thali order'),
(16, '2020-03-19', '817a157ff05f7a01d630', 'Card ', 130, 'success', 18, 'Thali order'),
(17, '2020-05-30', '56db1eb6be1de6a7eada', 'Card ', 130, 'success', 23, 'Thali order'),
(18, '2020-05-30', '9fe96bdedeccd2a1afbb', 'Card ', 630, 'success', 23, ''),
(19, '2020-05-30', 'f84f11187a1e554b8aba', 'Card ', 1260, 'success', 23, ''),
(20, '2020-05-30', '3fa83aa30953d56136e8', 'Card ', 1260, 'success', 23, ''),
(21, '2020-05-30', '8b27391383d1c06a2927', 'Card ', 1260, 'success', 23, ''),
(22, '2020-05-31', '90b258b4476e2c5b8d64', 'Card ', 630, 'success', 24, ''),
(23, '2020-06-02', 'df7a32a01bae75335c45', 'Card ', 130, 'success', 23, 'Thali order'),
(24, '2020-06-02', 'e80b1201473140dc93e8', 'Card ', 130, 'success', 23, 'Thali order');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL COMMENT '0-male 1-female',
  `mobileno` bigint(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `refcode` varchar(11) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `firstname`, `lastname`, `gender`, `mobileno`, `email`, `password`, `address`, `photo`, `doj`, `dob`, `refcode`, `areaid`) VALUES
(1, 'team', 'work', '0', 8401495064, 'jigarvakil1116@gmail.com', 'da4fb5c6e93e74d3df8527599fa62642', 'lalgate netx', 'Screenshot (1).png', '2020-05-30', '1993-05-14', 'team7349', 6),
(6, 'Pintu', 'Savani', '', 9087654321, 'pintusavani@gmail.com', '', 'b-12, kiran park', '1.png', '0000-00-00', '2000-07-25', '0', 11),
(8, 'pooja', 'Vankhede', '1', 9012345678, 'poojawankhede999@gmail.com', '', 'b-12, \r\nAadarsh soc.,', '1.png', '0000-00-00', '2000-06-10', '0', 11),
(11, 'kartik', 'joshi', '', 987654321, '', '', 'a-1, tulsi soc.,', '', '2020-03-13', '1999-07-25', '0', 11),
(12, 'kartik', 'joshi', '', 4365876959, '', '', 'a-1, tulsi soc.,', 'user4.jpg', '2020-03-13', '1999-09-19', '0', 11),
(16, NULL, NULL, NULL, NULL, 'jigarvakil111@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, 'poojawankhede999@gmail.com', 'b706835de79a2b4e80506f582af3676a', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'pooja', 'Savani', '1', 9726367433, 'pintusavani25@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', 'asdadcaascasc', 'Screenshot (1).png', '2020-03-14', '2020-03-14', 'pooja5306', 1),
(23, 'Team', 'work', '0', 8401495064, 'teamwork7861@gmail.com', 'da4fb5c6e93e74d3df8527599fa62642', 'surat lalgate', 'Screenshot (1).png', '2020-05-30', '1993-12-17', 'Team2377', 11),
(24, 'Rahul', 'Modi', '0', 987, 'rahul@gmail.com', 'da4fb5c6e93e74d3df8527599fa62642', 'Rampura, Surat', 'Screenshot (1).png', '2020-05-31', '1993-12-14', 'Rahul4225', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `walletid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`walletid`, `amount`, `status`, `userid`) VALUES
(1, 10000, 'add', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `tbl_allocation`
--
ALTER TABLE `tbl_allocation`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `did` (`dbuserid`),
  ADD KEY `dabbaid` (`dabbaid`),
  ADD KEY `dbuserid` (`dbuserid`),
  ADD KEY `dabbaid_2` (`dabbaid`);

--
-- Indexes for table `tbl_aprofile`
--
ALTER TABLE `tbl_aprofile`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`areaid`);

--
-- Indexes for table `tbl_chargeinfo`
--
ALTER TABLE `tbl_chargeinfo`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`compid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`),
  ADD KEY `oid` (`oid`),
  ADD KEY `oid_2` (`oid`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contactid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tbl_dabbainfo`
--
ALTER TABLE `tbl_dabbainfo`
  ADD PRIMARY KEY (`dabbaid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tbl_dabbawala`
--
ALTER TABLE `tbl_dabbawala`
  ADD PRIMARY KEY (`dbuserid`),
  ADD KEY `areaid` (`areaid`);

--
-- Indexes for table `tbl_deliveryhistory`
--
ALTER TABLE `tbl_deliveryhistory`
  ADD PRIMARY KEY (`histid`);

--
-- Indexes for table `tbl_dishtype`
--
ALTER TABLE `tbl_dishtype`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  ADD PRIMARY KEY (`holidayid`);

--
-- Indexes for table `tbl_lat_long`
--
ALTER TABLE `tbl_lat_long`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `areaid` (`areaid`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`leaveid`),
  ADD KEY `du` (`dbuserid`),
  ADD KEY `dbuserid` (`dbuserid`),
  ADD KEY `dbuserid_2` (`dbuserid`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `thaliid` (`thaliid`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_packageinfo`
--
ALTER TABLE `tbl_packageinfo`
  ADD PRIMARY KEY (`packid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `userid_2` (`userid`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `walletid` (`walletid`);

--
-- Indexes for table `tbl_reference`
--
ALTER TABLE `tbl_reference`
  ADD PRIMARY KEY (`refid`),
  ADD KEY `status` (`status`),
  ADD KEY `as` (`userid`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`restid`);

--
-- Indexes for table `tbl_restroadmin`
--
ALTER TABLE `tbl_restroadmin`
  ADD PRIMARY KEY (`adminid`),
  ADD KEY `restid` (`restid`) USING BTREE;

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD PRIMARY KEY (`routeid`),
  ADD KEY `sourceareaid` (`sourceareaid`),
  ADD KEY `destinationareaid` (`destinationareaid`),
  ADD KEY `destinationareaid_2` (`destinationareaid`),
  ADD KEY `sourceareaid_2` (`sourceareaid`),
  ADD KEY `routeid` (`routeid`),
  ADD KEY `ackas` (`userid`);

--
-- Indexes for table `tbl_salaryinfo`
--
ALTER TABLE `tbl_salaryinfo`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `db` (`dbuserid`);

--
-- Indexes for table `tbl_thali`
--
ALTER TABLE `tbl_thali`
  ADD PRIMARY KEY (`thaliid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `restid` (`restid`) USING BTREE;

--
-- Indexes for table `tbl_tracking`
--
ALTER TABLE `tbl_tracking`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `dabbaid` (`dabbaid`);

--
-- Indexes for table `tbl_transation`
--
ALTER TABLE `tbl_transation`
  ADD PRIMARY KEY (`transid`),
  ADD KEY `walletid` (`userid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `areaid` (`areaid`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`walletid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_allocation`
--
ALTER TABLE `tbl_allocation`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_aprofile`
--
ALTER TABLE `tbl_aprofile`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `areaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_chargeinfo`
--
ALTER TABLE `tbl_chargeinfo`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `compid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dabbainfo`
--
ALTER TABLE `tbl_dabbainfo`
  MODIFY `dabbaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dabbawala`
--
ALTER TABLE `tbl_dabbawala`
  MODIFY `dbuserid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_deliveryhistory`
--
ALTER TABLE `tbl_deliveryhistory`
  MODIFY `histid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_dishtype`
--
ALTER TABLE `tbl_dishtype`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  MODIFY `holidayid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_lat_long`
--
ALTER TABLE `tbl_lat_long`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `leaveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_packageinfo`
--
ALTER TABLE `tbl_packageinfo`
  MODIFY `packid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_reference`
--
ALTER TABLE `tbl_reference`
  MODIFY `refid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `restid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_restroadmin`
--
ALTER TABLE `tbl_restroadmin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_route`
--
ALTER TABLE `tbl_route`
  MODIFY `routeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_salaryinfo`
--
ALTER TABLE `tbl_salaryinfo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_thali`
--
ALTER TABLE `tbl_thali`
  MODIFY `thaliid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_tracking`
--
ALTER TABLE `tbl_tracking`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_transation`
--
ALTER TABLE `tbl_transation`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `walletid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_allocation`
--
ALTER TABLE `tbl_allocation`
  ADD CONSTRAINT `ab` FOREIGN KEY (`dbuserid`) REFERENCES `tbl_dabbawala` (`dbuserid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD CONSTRAINT `hgh` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD CONSTRAINT `h` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dabbainfo`
--
ALTER TABLE `tbl_dabbainfo`
  ADD CONSTRAINT `ui` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dabbawala`
--
ALTER TABLE `tbl_dabbawala`
  ADD CONSTRAINT `ai` FOREIGN KEY (`areaid`) REFERENCES `tbl_area` (`areaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD CONSTRAINT `dui` FOREIGN KEY (`dbuserid`) REFERENCES `tbl_dabbawala` (`dbuserid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `a` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aa` FOREIGN KEY (`thaliid`) REFERENCES `tbl_thali` (`thaliid`);

--
-- Constraints for table `tbl_packageinfo`
--
ALTER TABLE `tbl_packageinfo`
  ADD CONSTRAINT `p` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pi` FOREIGN KEY (`pid`) REFERENCES `tbl_package` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `wid` FOREIGN KEY (`walletid`) REFERENCES `tbl_wallet` (`walletid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_reference`
--
ALTER TABLE `tbl_reference`
  ADD CONSTRAINT `as` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD CONSTRAINT `ackas` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dai` FOREIGN KEY (`destinationareaid`) REFERENCES `tbl_area` (`areaid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sai` FOREIGN KEY (`sourceareaid`) REFERENCES `tbl_area` (`areaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_salaryinfo`
--
ALTER TABLE `tbl_salaryinfo`
  ADD CONSTRAINT `db` FOREIGN KEY (`dbuserid`) REFERENCES `tbl_dabbawala` (`dbuserid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_thali`
--
ALTER TABLE `tbl_thali`
  ADD CONSTRAINT `r` FOREIGN KEY (`restid`) REFERENCES `tbl_restaurant` (`restid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t` FOREIGN KEY (`tid`) REFERENCES `tbl_dishtype` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tracking`
--
ALTER TABLE `tbl_tracking`
  ADD CONSTRAINT `di` FOREIGN KEY (`dabbaid`) REFERENCES `tbl_dabbainfo` (`dabbaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transation`
--
ALTER TABLE `tbl_transation`
  ADD CONSTRAINT `aaa` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `yy` FOREIGN KEY (`areaid`) REFERENCES `tbl_area` (`areaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD CONSTRAINT `wa` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `ev1` ON SCHEDULE EVERY 1 DAY STARTS '2020-05-30 11:33:00' ON COMPLETION NOT PRESERVE ENABLE DO insert into tbl_deliveryhistory(aid) select aid from tbl_allocation$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
