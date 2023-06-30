-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 07:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiesta_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_ID` varchar(3) NOT NULL,
  `Dept_Name` varchar(4) DEFAULT NULL,
  `Dept_FullName` varchar(50) DEFAULT NULL,
  `HOD` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_ID`, `Dept_Name`, `Dept_FullName`, `HOD`) VALUES
('PG1', 'MCom', 'Masters in Commerce', 'Mr MCOM'),
('PG2', 'MBA', 'Masters in Business Administration', 'Mr MBA'),
('PG3', 'MFA', 'Masters in Financial Analysis', 'Mr MFA'),
('PG4', 'MSW', 'Masters in Social Work', 'Mr MSW'),
('UG1', 'BCA', 'Bachelors in Computer Applications', 'Mr BCA'),
('UG2', 'BSc', 'Bachelors in Science', 'Mr BSc'),
('UG3', 'BCom', 'Bachelors in Commerce', 'Mr BCom'),
('UG4', 'BBA', 'Bachelors in Business Administration', 'Mr BBA'),
('UG5', 'BHM', 'Bachelors in Hotel Management', 'Mr BHM'),
('UG6', 'BA', 'Bachelors in Arts', 'Mr BA');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` bigint(11) NOT NULL,
  `Type` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `Department` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Faculty_Coordinator` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Student_Coordinator` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Description` varchar(1024) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Venue` varchar(64) NOT NULL,
  `Registration` varchar(50) DEFAULT NULL,
  `Status` bit(1) NOT NULL,
  `Image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Type`, `Title`, `Department`, `Faculty_Coordinator`, `Student_Coordinator`, `Description`, `Date`, `Venue`, `Registration`, `Status`, `Image`) VALUES
(1675679865, 'E01', 'Workshop on Sustainability', 'UG1', 'Henry P Sherman', 'Samuel L J', 'A Workshop hosted in conjunction with NGOs from around the country that are currently striving to promote the UNSDGs and make India a leader in net-zero emmision status holder.', '2023-02-24', 'Auditorium', NULL, b'1', '2017_workshop_Brussels-2371299141.jpg'),
(1676165355, 'E01', 'Meganium', 'PG1', 'Henry P Sherman', 'Samuel L J', 'A fan-base only event for hardcore pokemon fans. Come, meet, greet, eat and catch em all!', '2023-03-12', 'East West Mall', 'forms.goggle.com/pokemon_registration', b'0', 'th-86871562.jpg'),
(1676268450, 'E07', 'Winter Wonderland Ball', 'UG1', 'Amanda Brown', 'Adam Patel', 'Get ready for a magical winter night filled with snow, lights, and music. This event will be a true celebration of winter and all that it brings. Guests can dance the night away to the sounds of live music and enjoy delicious food and drinks. The venue wi', '2023-02-25', 'Auditorium', '12345678', b'1', 'corporate-event-ideas-3-1.jpg'),
(1676268605, 'E04', 'College Sports Day', 'UG1', 'Henry P Sherman', 'Samuel L J', ' Get ready for an action-packed day of sports and activities! The college&#039;s sports day will feature a variety of sports competitions and activities for students, staff, and alumni. Guests can watch or participate in events such as a 5k run, soccer to', '2023-03-05', 'College Grounds', '1234354534543', b'1', 'th-4201119046.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `Etype_id` varchar(3) NOT NULL,
  `type_Name` varchar(20) NOT NULL,
  `tagline` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`Etype_id`, `type_Name`, `tagline`) VALUES
('E01', 'Fest', 'Embrace the excitement: The Fest awaits.'),
('E02', 'Workshop', 'Discover new skills, unlock new opportunities.'),
('E03', 'Exibhition', 'Where creativity meets innovation: Join the Exhibition.'),
('E04', 'Sports', 'Unite, Compete, Win: Experience the exhilaration.'),
('E05', 'Community Service', 'Empowering communities, one act at a time.'),
('E06', 'Industrial Visit', 'Peer through to beyond your horizon.'),
('E07', 'Ceremony', 'To honor success, and embrace the future.');

-- --------------------------------------------------------

--
-- Table structure for table `fac_user`
--

CREATE TABLE `fac_user` (
  `Uname` varchar(32) NOT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Name` varchar(32) DEFAULT NULL,
  `Dept` varchar(3) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Contact` varchar(32) DEFAULT NULL,
  `Profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fac_user`
--

INSERT INTO `fac_user` (`Uname`, `Password`, `Name`, `Dept`, `Description`, `Contact`, `Profile`) VALUES
(' MRodriguez', 'MR1234', 'Maria Rodriguez', 'UG2', 'A specialist in event sustainability and responsible event management, with a focus on reducing the environmental impact of events.', '0770699095', 'Faculty 3.jpg'),
('ABrown', 'AB1234', 'Amanda Brown', 'UG1', 'A leading researcher in the field of event technology, who has published numerous articles on the use of technology in event management, such as event apps and virtual events.', '6121660334', 'Faculty 5.jpg'),
('JLee', 'JL1234', 'James Lee', 'UG4', 'An experienced marketer with a strong background in event branding and promotion, who has helped to launch successful events across the country.', '9086762553', 'Faculty 4.jpg'),
('MLeena', '1234', 'Leena M U', 'PG1', NULL, '1212232345', 'osama.jpg'),
('MSmith', 'MS1234', 'Michael Smith', 'PG2', 'A seasoned event manager with over 20 years of experience in organizing large-scale events, such as concerts and festivals', '8906354239 ', 'Faculty 2.jpg'),
('PSherman', '1234', 'Henry P Sherman', 'UG1', NULL, '7722335511', 'default.jpg'),
('SJohnson', 'SJ1234', 'Sarah Johnson', 'UG5', 'An expert in event planning and management, with a PhD in Hospitality and Tourism Management.', '5494433595 ', 'Faculty 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pending_proposals`
--

CREATE TABLE `pending_proposals` (
  `Event_Name` varchar(64) NOT NULL,
  `Author` varchar(32) DEFAULT NULL,
  `Dept` varchar(3) DEFAULT NULL,
  `Description` varchar(2048) DEFAULT NULL,
  `Media` varchar(256) DEFAULT NULL,
  `Type` varchar(3) DEFAULT NULL,
  `Upvotes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_proposals`
--

INSERT INTO `pending_proposals` (`Event_Name`, `Author`, `Dept`, `Description`, `Media`, `Type`, `Upvotes`) VALUES
('', 'Abdul', 'UG3', 'I believe i can effectively ocntribute to this evetn cause im god', '', '', 0),
('Around the world in 80 days', 'Dreyfus', 'UG5', 'This would probably be the world&#039;s first ever localized tour trip that can be conducted from one location.', 'img1.JPG img2.JPG img4.JPG', 'E03', 0),
('Awareness Walk', 'Azim', 'PG4', 'Awareness walk for eye donation campaign.', 'img3.JPG img4.JPG img1.JPG', 'E05', 0),
('Cook Off', 'Peter', 'UG5', 'A cooking competition between all the department. Just because were BHM, we shouldn\'t be doing all the cooking and just because the others aren\'t BHM, they shouldn\'t skip on the delicious, yum, yum, cooking.', 'img1.JPG img3.JPG img4.JPG img2.JPG', 'E04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stu_user`
--

CREATE TABLE `stu_user` (
  `Uname` varchar(32) NOT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Name` varchar(32) DEFAULT NULL,
  `Dept` varchar(3) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Contact` varchar(32) DEFAULT NULL,
  `Profile` varchar(255) DEFAULT NULL,
  `Semester` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_user`
--

INSERT INTO `stu_user` (`Uname`, `Password`, `Name`, `Dept`, `Description`, `Contact`, `Profile`, `Semester`) VALUES
('AMartinez', 'AM1234', 'Alex Martinez', 'PG1', 'A senior with a focus on event sustainability and environmental responsibility, who is eager to bring his knowledge and experience to the college group.', '3773841483', 'Student 6.jpg', '7th'),
('APatel', 'AP1234', 'Adam Patel', 'UG1', 'A junior with experience in event technology, who is interested in exploring the use of virtual events and event apps.', '3437212340', 'Student 10.jpeg', '2nd'),
('DKim', 'DK1234', 'David Kim', 'UG5', 'A senior with a passion for event production, who has already taken on leadership roles in several student-run events on campus', '4326936866', 'Student 2.jpg', '8th'),
('EDavis', 'ED1234', 'Emily Davis', 'PG2', 'A freshman with a talent for networking and interpersonal skills, who is eager to get involved in event management and make connections in the industry.', '7970074455 ', 'Student 5.jpg', '1st'),
('JWilson', 'JW1234', 'Jake Wilson', 'PG4', 'A junior with experience in event planning, who has helped organize charity events in his community and is eager to bring his skills to the college group.', '7577823412 ', 'Student 4.jpg', '2nd'),
('LChen', 'LC1234', 'Lily Chen', 'UG6', 'A sophomore with a strong background in design, who is interested in exploring the creative side of event management.', '1434743014', 'Student 3.jpg', '4th'),
('RGreene', 'RG1234', 'Rachel Greene', 'UG2', 'A junior majoring in Event Management and Marketing, who has already gained valuable experience volunteering at local events.', '0919082949', 'Student 1.jpg', '4th'),
('Sam', '1234', 'Samuel L J', 'UG1', 'Description should be beeg af so that word wrapping can be tested along with the other features that the ui dev thought they integrated into their application but  being a sore loser hid from them.', '8888888888', 'profile_pc.jpg', '5th'),
('SLee', 'SL1234', 'Samantha Lee', 'UG4', 'A junior with a background in event marketing and promotions, who is eager to bring her skills to the college group.', '1463480404', 'Student 7.jpeg', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `volunteerlist`
--

CREATE TABLE `volunteerlist` (
  `EventID` bigint(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Dept` varchar(3) NOT NULL,
  `Semester` varchar(3) NOT NULL,
  `Why` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteerlist`
--

INSERT INTO `volunteerlist` (`EventID`, `Name`, `Dept`, `Semester`, `Why`) VALUES
(1676165355, 'A', 'PG1', '1st', 'Reasons');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_ID`),
  ADD KEY `Dept_ID` (`Dept_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `Department` (`Department`),
  ADD KEY `Type` (`Type`),
  ADD KEY `Faculty_Coordinator` (`Faculty_Coordinator`),
  ADD KEY `Student_Coordinator` (`Student_Coordinator`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD UNIQUE KEY `Etype_id_2` (`Etype_id`);

--
-- Indexes for table `fac_user`
--
ALTER TABLE `fac_user`
  ADD PRIMARY KEY (`Uname`),
  ADD KEY `Dept` (`Dept`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `pending_proposals`
--
ALTER TABLE `pending_proposals`
  ADD PRIMARY KEY (`Event_Name`);

--
-- Indexes for table `stu_user`
--
ALTER TABLE `stu_user`
  ADD PRIMARY KEY (`Uname`),
  ADD KEY `Dept` (`Dept`),
  ADD KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000000001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `department` (`Dept_ID`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`Type`) REFERENCES `event_type` (`Etype_id`),
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`Faculty_Coordinator`) REFERENCES `fac_user` (`Name`),
  ADD CONSTRAINT `events_ibfk_4` FOREIGN KEY (`Student_Coordinator`) REFERENCES `stu_user` (`Name`);

--
-- Constraints for table `fac_user`
--
ALTER TABLE `fac_user`
  ADD CONSTRAINT `fac_user_ibfk_1` FOREIGN KEY (`Dept`) REFERENCES `department` (`Dept_ID`);

--
-- Constraints for table `stu_user`
--
ALTER TABLE `stu_user`
  ADD CONSTRAINT `stu_user_ibfk_1` FOREIGN KEY (`Dept`) REFERENCES `department` (`Dept_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
