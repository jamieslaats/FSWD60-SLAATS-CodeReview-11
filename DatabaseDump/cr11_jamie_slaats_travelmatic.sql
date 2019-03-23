-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 06:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_jamie_slaats_travelmatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressdata`
--

CREATE TABLE `addressdata` (
  `Address_ID` int(11) NOT NULL,
  `Street` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Postcode` int(11) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addressdata`
--

INSERT INTO `addressdata` (`Address_ID`, `Street`, `City`, `Postcode`, `State`, `Country`, `Created`, `Modified`, `fk_User_ID`) VALUES
(2, '2 Dvortsovaya Ploschad', 'St. Petersburg', 190000, NULL, 'Russia', '2019-03-22 14:02:30', '2019-03-22 14:02:30', 1),
(4, '1 Teatralnaya Ploshchad', 'St. Petersburg', 190000, '', 'Russia', '2019-03-22 16:30:18', '2019-03-22 16:30:18', 1),
(5, '4 Isaakievskaya Square', 'St. Petersburg', 190000, '', 'Russia', '2019-03-22 16:34:30', '2019-03-22 16:34:30', 1),
(6, 'Zayachy (Hare) Island', 'St. Petersburg', 190000, '', 'Russia', '2019-03-22 16:36:01', '2019-03-22 16:36:01', 1),
(7, '12 Sadovaya Street, St', 'St. Petersburg', 190000, '', 'Russia', '2019-03-22 16:40:18', '2019-03-22 16:40:18', 2),
(8, '12 Sadovaya Street St.', 'St. Petersburg', 190000, NULL, 'Russia', '2019-03-22 18:41:35', '2019-03-22 18:41:35', 1),
(9, '47 Nevskiy Avenue St.', 'St. Petersburg', 191025, '', 'Russia', '2019-03-22 18:41:35', '2019-03-23 08:33:04', 2),
(10, '10 Naberezhnaya reki Karpovki', 'St. Petersburg', 197022, '', 'Russia', '2019-03-22 18:41:35', '2019-03-23 07:18:13', 2),
(11, '16 Bolshaya Morskaya St.', 'St. Petersburg', 191186, NULL, 'Russia', '2019-03-22 18:41:35', '2019-03-22 18:41:35', 1),
(12, '6 Ligovsky Pr, St.', 'St. Petersburg', 190000, NULL, 'Russia', '2019-03-22 18:41:35', '2019-03-22 18:41:35', 1),
(13, '1 Teatralnaya Pl, St.', 'St. Petersburg', 190000, NULL, 'Russia', '2019-03-22 18:41:35', '2019-03-22 18:41:35', 2),
(14, '1/7 Mikhailovskaya Ul. St.', 'St. Petersburg', 191186, NULL, 'Russia', '2019-03-22 18:41:35', '2019-03-22 18:41:35', 1),
(15, '2 Pl. Ostrovskogo St.', 'St. Petersburg', 191011, NULL, 'Russia', '2019-03-22 18:41:35', '2019-03-22 18:41:35', 2),
(21, 'Rocker Road 5', 'Moscow', 234543, '', 'Russia', '2019-03-23 12:37:37', '2019-03-23 12:37:37', 5),
(22, 'Wienstrasse 45', 'Vienna', 1010, '', 'Austria', '2019-03-23 12:39:58', '2019-03-23 12:39:58', 2),
(23, 'Weareway 89', 'Singapore', 2345, '', 'Singapore', '2019-03-23 12:43:52', '2019-03-23 12:43:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contentdata`
--

CREATE TABLE `contentdata` (
  `Content_ID` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Locationtype` varchar(255) DEFAULT NULL,
  `Locationname` varchar(255) DEFAULT NULL,
  `fk_Address_ID` int(11) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Webaddress` varchar(255) DEFAULT NULL,
  `Metrostop` varchar(255) DEFAULT NULL,
  `OpenTimes` text,
  `Value` varchar(255) DEFAULT NULL,
  `Eventplacename` varchar(255) DEFAULT NULL,
  `Style` varchar(255) NOT NULL,
  `Entrycost` varchar(255) DEFAULT NULL,
  `Eventtime` time DEFAULT NULL,
  `Eventdate` date DEFAULT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contentdata`
--

INSERT INTO `contentdata` (`Content_ID`, `Image`, `Locationtype`, `Locationname`, `fk_Address_ID`, `Telephone`, `Webaddress`, `Metrostop`, `OpenTimes`, `Value`, `Eventplacename`, `Style`, `Entrycost`, `Eventtime`, `Eventdate`, `Created`, `Modified`, `fk_User_ID`) VALUES
(1, './IMG/0.jpg', 'Sights', 'The Hermitage (The Winter Palace)', 2, '+7 (812) 571-3420', NULL, 'Admiralteyskaya', 'Daily 10:30am to 6pm. Last admission is at 5:30pm. Wednesday and Friday, till 9pm. Last admission is at 8:30pm', NULL, NULL, '', '600 Rbl', NULL, NULL, '2019-03-22 14:04:41', '2019-03-22 14:04:41', 1),
(2, './IMG/1.jpg', 'Sights', 'The Mariinsky Theatre', 4, '+7 (812) 326-4141', '', 'Admiralteyskaya, Sadovaya / Sennaya Ploshchad / Spasskaya', 'Daily 5pm to 12pm', '', '', '', '50 Rbl', '00:00:00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(3, './IMG/st-isaacs-cathedral-in-st-petersburg.jpg', 'Sights', 'St. Isaacs Cathedral & Colonnade', 5, '+7 (812) 315-9732', '', 'Admiralteyskaya', 'Daily 10.30 am to 6 pm. Last admission is at 5.30 pm. Night openings of the Colonnade in the White Nights only (June 1 - August 20), 10.30 pm to 4.30 am.', '', '', '', 'Adult: 250 Rbl, Child: 50 Rbl', '00:00:00', '0000-00-00', '2019-03-22 18:21:32', '2019-03-22 18:21:32', 1),
(4, './IMG/peterpaulfortress.jpg', 'Sights', 'The Peter & Paul Fortress', 6, '+7 (812) 326-4141', '', 'Gorkovskaya / Sportivnaya', 'The grounds of the fortress at open 6am to 10pm. All exhibitions are open daily, except Wednesdays, 10 am to 6 pm. Last admission is at 5 pm. Tuesdays, 10 am to 5 pm. Last admission is at 4 pm.', '', '', '', '350 Rbl', '00:00:00', '0000-00-00', '2019-03-22 18:25:26', '2019-03-22 18:25:26', 2),
(5, './IMG/2.jpg', 'Eatery', 'TSAR', 7, '+7 (812) 640-1616', 'http://en.ginza.ru/spb/restaurant/tsar', '', '', '', '$$$$', 'European, Russian, Vegetarian Friendly', '', '00:00:00', '0000-00-00', '2019-03-22 19:04:44', '2019-03-23 12:28:56', 1),
(6, './IMG/3.jpg', 'Eatery', 'Palkin', 9, '+7 (812) 703-5371', 'www.palkin.ru', '', '', '', '$$$$', 'European, Russian, Vegetarian Friendly', '', '00:00:00', '0000-00-00', '2019-03-22 19:04:44', '2019-03-22 21:12:43', 1),
(7, './IMG/flakerscafe.jpg', 'Eatery', 'Flakers Cafe', 10, '+7 (921) 644-0664', 'www.facebook.com/flakerscafe/?', '', '', '', '$', 'Cafe, European, Vegetarian Friendly', '', '00:00:00', '0000-00-00', '2019-03-22 19:04:44', '2019-03-22 21:12:55', 2),
(8, './IMG/cafebarbonch.jpg', 'Eatery', 'Cafe Bar Bonch', 11, '+7 (812) 703-5371', 'www.facebook.com/bonchcoffebar?', '', '', '', '$$-$$$', 'European, Russian, Vegetarian Friendly', '', '00:00:00', '0000-00-00', '2019-03-22 19:04:44', '2019-03-22 21:13:08', 2),
(9, './IMG/4.jpg', 'Event', 'Bel Suono', 12, '+7 (812) 275-1300', '', '', '', '', 'Oktyabrsky Grand Concert Hall (BKZ)', '', '1,300 - 5,000 Rbl', '19:00:00', '2019-04-07', '2019-03-22 19:04:44', '2019-03-22 19:04:44', 1),
(10, './IMG/5.jpg', 'Event', 'Eugene Onegin', 13, '+7 (812) 326-4141', '', '', '', '', 'Mariinsky Theatre', '', '2,800 - 5,000Rbl', '19:00:00', '2019-04-11', '2019-03-22 19:04:44', '2019-03-22 19:04:44', 2),
(11, './IMG/balletathotel.jpg', 'Event', 'Tchaikovsky Nights', 14, '+7 (812) 329-6622', '', '', '', '', 'L\'Europe Restaurant, Belmond Grand Hotel Europe', '', 'N/A', '19:00:00', '2019-05-24', '2019-03-22 19:04:44', '2019-03-22 19:08:26', 1),
(12, './IMG/hamletrussian.jpg', 'Event', 'Russian Hamlet', 15, '+7 (812) 312-1545', '', '', '', '', 'Alexandrinsky Theatre', '', '1,000 - 7,000 Rbl', '20:00:00', '2019-01-01', '2019-03-22 19:04:44', '2019-03-22 19:04:44', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `User_ID` int(11) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT 'User',
  `Empl_ID` varchar(255) DEFAULT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`User_ID`, `Firstname`, `Surname`, `Email`, `Password`, `Status`, `Empl_ID`, `Created`, `Modified`) VALUES
(1, 'Jamie', 'Slaats', 'jamie@happyfeet.com', '123456789', 'Admin', '123458', '2019-03-22 14:01:45', '2019-03-23 06:17:37'),
(2, 'John', 'Doe', 'john@happyfeet.com', '123456789', 'Admin', '122134', '2019-03-22 16:39:31', '2019-03-22 16:39:31'),
(4, 'George', 'Hallo', 'george@hallo.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'User', NULL, '2019-03-23 10:01:22', '2019-03-23 10:01:22'),
(5, 'Fred', 'Mallo', 'fred@happyfeet.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'Admin', '123987', '2019-03-23 10:02:56', '2019-03-23 16:42:17'),
(6, 'Freddy', 'Mercury', 'freddy@mercury.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'User', NULL, '2019-03-23 10:49:24', '2019-03-23 10:49:24'),
(7, 'Josh', 'Wedon', 'josh@wedon.fr', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'User', NULL, '2019-03-23 13:29:10', '2019-03-23 13:29:10'),
(8, 'Picolo', 'Manager', 'picolo@manager.at', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'User', NULL, '2019-03-23 14:10:48', '2019-03-23 14:10:48'),
(10, 'Franz', 'Haberstroh', 'franz@franz.at', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'User', NULL, '2019-03-23 14:12:10', '2019-03-23 14:12:10'),
(12, 'Hal', 'Bur', 'hal@bur.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'User', NULL, '2019-03-23 15:00:54', '2019-03-23 15:00:54'),
(15, 'Joseph', 'Kobler', 'jk@jk.org', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'User', NULL, '2019-03-23 15:41:13', '2019-03-23 15:41:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressdata`
--
ALTER TABLE `addressdata`
  ADD PRIMARY KEY (`Address_ID`),
  ADD KEY `fk_User_ID` (`fk_User_ID`);

--
-- Indexes for table `contentdata`
--
ALTER TABLE `contentdata`
  ADD PRIMARY KEY (`Content_ID`),
  ADD KEY `fk_Address_ID` (`fk_Address_ID`),
  ADD KEY `fk_User_ID` (`fk_User_ID`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addressdata`
--
ALTER TABLE `addressdata`
  MODIFY `Address_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contentdata`
--
ALTER TABLE `contentdata`
  MODIFY `Content_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addressdata`
--
ALTER TABLE `addressdata`
  ADD CONSTRAINT `addressdata_ibfk_1` FOREIGN KEY (`fk_User_ID`) REFERENCES `userdata` (`User_ID`),
  ADD CONSTRAINT `addressdata_ibfk_2` FOREIGN KEY (`fk_User_ID`) REFERENCES `userdata` (`User_ID`);

--
-- Constraints for table `contentdata`
--
ALTER TABLE `contentdata`
  ADD CONSTRAINT `contentdata_ibfk_1` FOREIGN KEY (`fk_Address_ID`) REFERENCES `addressdata` (`Address_ID`),
  ADD CONSTRAINT `contentdata_ibfk_2` FOREIGN KEY (`fk_User_ID`) REFERENCES `userdata` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
