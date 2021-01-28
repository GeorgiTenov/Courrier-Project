-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 22, 2021 at 08:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eurojob`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`` PROCEDURE `getAutomobilesByOfficeId` (IN `id` INT)  NO SQL
SELECT * FROM automobile WHERE office_id = id$$

CREATE DEFINER=`` PROCEDURE `getCourrierByAutomobileId` (IN `id` INT)  NO SQL
SELECT * FROM courrier WHERE automobile_id = id$$

CREATE DEFINER=`` PROCEDURE `getCourriersByOfficeId` (IN `id` INT)  NO SQL
SELECT * FROM courrier WHERE office_id = id$$

CREATE DEFINER=`` PROCEDURE `getOfficesBySettlementId` (IN `id` INT)  NO SQL
SELECt * FROM office WHERE settlement_id = id$$

CREATE DEFINER=`` PROCEDURE `getSettlementsByOfficeId` (IN `id` INT)  NO SQL
SELECT * FROM settlement WHERE office_id = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `automobile`
--

CREATE TABLE `automobile` (
  `automobile_id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `registration` varchar(255) DEFAULT NULL,
  `consumption` varchar(255) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `automobile`
--

INSERT INTO `automobile` (`automobile_id`, `brand`, `model`, `registration`, `consumption`, `office_id`) VALUES
(1, 'Honda', 'Civic', 'A5513A', '3.2 gal/100 mi', 1),
(2, 'BMW', 'M550I', 'PB2341PB', '5.2 gal/100 mi', 8),
(3, 'Seat', '6652', 'A8713A', '2.4 gal/100 mi', 9),
(4, 'Mercedes', '6655', 'SF2341SF', '6.4 gal/100 mi', 10),
(5, 'Toyota', 'Yaris', 'PB7676PB', '4.9 gal/100 mi', 11);

-- --------------------------------------------------------

--
-- Table structure for table `courrier`
--

CREATE TABLE `courrier` (
  `courrier_id` int(11) NOT NULL,
  `personal_number` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass_word` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `mid_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `automobile_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courrier`
--

INSERT INTO `courrier` (`courrier_id`, `personal_number`, `username`, `pass_word`, `first_name`, `mid_name`, `last_name`, `telephone`, `automobile_id`, `office_id`) VALUES
(2, '94650081', 'k_9431', 'k43k51', 'Kaloqn', 'Kolev', 'Mladenov', '0897651234', 1, 1),
(4, '92456101', 'courrier_92', '9276451', 'Ivan', 'Ivanov', 'Ivanov', '08755124213', 4, 8),
(6, '5672', 'Stoqn', '1246752', 'kolev', 'Palazov', 'Hristov', '0895123213', 2, 10),
(7, '9000', 'Petur323', 'Georgiev', 'Vladimirov', 'Boqnov', 'Petrov', '088655412342', 3, 11),
(8, '875563', 'Vladimir', 'o9l23123', 'Vladimir', 'Spasov', 'Petrov', '08876123421', 5, 12),
(9, '75588', '9o123', '00765123', 'Mariqn', 'Kostadinov', 'Zaprqnov', '0896514236421', NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `manager` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `working_hours` varchar(255) DEFAULT NULL,
  `settlement_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `name`, `manager`, `address`, `telephone`, `working_hours`, `settlement_id`) VALUES
(1, 'Tiger Express', 'Stanislav Grozev', 'Kardzhali street 133', '450891', '09:00 - 18:00', 1),
(8, '101 Express', 'Nikola Zagorov', 'ulitsa Dimitur Talev', '0897123124', '09:00:18:00', 1),
(9, 'Express No Stress', 'Tanya Ivanova', 'ulitsa 1010', '0865123412', '08:00:17:00', 2),
(10, 'Go', 'Elena Stoilova', 'bulevard 123', '0896512341', '09:00-18:00', 3),
(11, 'Express Number One', 'Hristo Filipov', 'blok 32,ulitsa 45', '0887612341', '08:00:18:00', 4),
(12, 'Power Express', 'Petq Koleva', 'ulitsa 666', '0875123421', '09:00-18:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `settlement`
--

CREATE TABLE `settlement` (
  `settlement_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settlement`
--

INSERT INTO `settlement` (`settlement_id`, `name`, `region`, `municipality`, `post_code`, `office_id`) VALUES
(1, 'Plovdiv', 'Kiuchuk Paris', 'Plovdiv', '4000', 1),
(2, 'Sofia', 'Ovcha Kupel', 'Sofia', '4000', 1),
(3, 'Burgas', 'Burgas', 'Burgas', '1245', 8),
(4, 'Popovica', 'Popovica street 24', 'Plovdiv', '4000', 9),
(5, 'Purvomai', 'Purvomai 244', 'Purvomai', '2470', 10),
(6, 'Pleven', 'Pleven', 'Samokov', '500', 11),
(7, 'Kaloqnovo', 'Pleven', 'Pleven', '6000', 12);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_getallautomobiles`
-- (See below for the actual view)
--
CREATE TABLE `view_getallautomobiles` (
`automobile_id` int(11)
,`brand` varchar(255)
,`model` varchar(255)
,`registration` varchar(255)
,`consumption` varchar(255)
,`office_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_getallcouriers`
-- (See below for the actual view)
--
CREATE TABLE `view_getallcouriers` (
`courrier_id` int(11)
,`personal_number` varchar(255)
,`username` varchar(255)
,`pass_word` varchar(255)
,`first_name` varchar(255)
,`mid_name` varchar(255)
,`last_name` varchar(255)
,`telephone` varchar(255)
,`automobile_id` int(11)
,`office_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_getalloffices`
-- (See below for the actual view)
--
CREATE TABLE `view_getalloffices` (
`office_id` int(11)
,`name` varchar(255)
,`manager` varchar(255)
,`address` varchar(255)
,`telephone` varchar(255)
,`working_hours` varchar(255)
,`settlement_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_getallsettlements`
-- (See below for the actual view)
--
CREATE TABLE `view_getallsettlements` (
`settlement_id` int(11)
,`name` varchar(255)
,`region` varchar(255)
,`municipality` varchar(255)
,`post_code` varchar(255)
,`office_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_getallautomobiles`
--
DROP TABLE IF EXISTS `view_getallautomobiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view_getallautomobiles`  AS SELECT `automobile`.`automobile_id` AS `automobile_id`, `automobile`.`brand` AS `brand`, `automobile`.`model` AS `model`, `automobile`.`registration` AS `registration`, `automobile`.`consumption` AS `consumption`, `automobile`.`office_id` AS `office_id` FROM `automobile` ORDER BY `automobile`.`automobile_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_getallcouriers`
--
DROP TABLE IF EXISTS `view_getallcouriers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view_getallcouriers`  AS SELECT `courrier`.`courrier_id` AS `courrier_id`, `courrier`.`personal_number` AS `personal_number`, `courrier`.`username` AS `username`, `courrier`.`pass_word` AS `pass_word`, `courrier`.`first_name` AS `first_name`, `courrier`.`mid_name` AS `mid_name`, `courrier`.`last_name` AS `last_name`, `courrier`.`telephone` AS `telephone`, `courrier`.`automobile_id` AS `automobile_id`, `courrier`.`office_id` AS `office_id` FROM `courrier` ORDER BY `courrier`.`courrier_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_getalloffices`
--
DROP TABLE IF EXISTS `view_getalloffices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view_getalloffices`  AS SELECT `office`.`office_id` AS `office_id`, `office`.`name` AS `name`, `office`.`manager` AS `manager`, `office`.`address` AS `address`, `office`.`telephone` AS `telephone`, `office`.`working_hours` AS `working_hours`, `office`.`settlement_id` AS `settlement_id` FROM `office` ORDER BY `office`.`office_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_getallsettlements`
--
DROP TABLE IF EXISTS `view_getallsettlements`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view_getallsettlements`  AS SELECT `settlement`.`settlement_id` AS `settlement_id`, `settlement`.`name` AS `name`, `settlement`.`region` AS `region`, `settlement`.`municipality` AS `municipality`, `settlement`.`post_code` AS `post_code`, `settlement`.`office_id` AS `office_id` FROM `settlement` ORDER BY `settlement`.`settlement_id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automobile`
--
ALTER TABLE `automobile`
  ADD PRIMARY KEY (`automobile_id`),
  ADD KEY `office_id` (`office_id`);

--
-- Indexes for table `courrier`
--
ALTER TABLE `courrier`
  ADD PRIMARY KEY (`courrier_id`),
  ADD UNIQUE KEY `automobile_id` (`automobile_id`),
  ADD UNIQUE KEY `personal_number` (`personal_number`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `office_id` (`office_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `settlement_id` (`settlement_id`);

--
-- Indexes for table `settlement`
--
ALTER TABLE `settlement`
  ADD PRIMARY KEY (`settlement_id`),
  ADD KEY `office_id` (`office_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automobile`
--
ALTER TABLE `automobile`
  MODIFY `automobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courrier`
--
ALTER TABLE `courrier`
  MODIFY `courrier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settlement`
--
ALTER TABLE `settlement`
  MODIFY `settlement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `automobile`
--
ALTER TABLE `automobile`
  ADD CONSTRAINT `automobile_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE SET NULL;

--
-- Constraints for table `courrier`
--
ALTER TABLE `courrier`
  ADD CONSTRAINT `courrier_ibfk_1` FOREIGN KEY (`automobile_id`) REFERENCES `automobile` (`automobile_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `courrier_ibfk_2` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE CASCADE;

--
-- Constraints for table `office`
--
ALTER TABLE `office`
  ADD CONSTRAINT `office_ibfk_1` FOREIGN KEY (`settlement_id`) REFERENCES `settlement` (`settlement_id`) ON DELETE SET NULL;

--
-- Constraints for table `settlement`
--
ALTER TABLE `settlement`
  ADD CONSTRAINT `settlement_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
