-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 04:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tp_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `figures`
--

CREATE TABLE `figures` (
  `fig_id` bigint(20) NOT NULL,
  `fig_name` varchar(50) DEFAULT NULL,
  `fig_img` varchar(255) DEFAULT NULL,
  `fig_type` int(11) NOT NULL,
  `fig_man` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `figures`
--

INSERT INTO `figures` (`fig_id`, `fig_name`, `fig_img`, `fig_type`, `fig_man`) VALUES
(2, 'Karin Kakudate', 'f7ba188b5451c348e19fa4ef87248114.png', 1, 3),
(3, 'Nendoroid Hitori Gotoh', '291e3dfd76061c2a5b14966f200f8463.png', 2, 1),
(4, 'POP UP PARADE Mori Calliope', 'a1e3ac8ff69e2d87ab8d80be427d35be.png', 3, 1),
(5, 'Shirogane Noel: Swimsuit Ver.', 'e401a57f66d5d86591b33868cc1684f3.png', 1, 1),
(6, 'Time Compass', '498450c5f89334a71b4cdbcd19cffd10.png', 1, 4);

--
-- Triggers `figures`
--
DELIMITER $$
CREATE TRIGGER `add_man_fig` AFTER INSERT ON `figures` FOR EACH ROW begin
update manufacturers set man_figure = man_figure + 1 where man_id = new.fig_man;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_type_fig` AFTER INSERT ON `figures` FOR EACH ROW begin
update figure_type set ftype_figure = ftype_figure + 1 where ftype_id = new.fig_type;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sub_man_fig` BEFORE DELETE ON `figures` FOR EACH ROW begin
update manufacturers set man_figure = man_figure - 1 where man_id = old.fig_man;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sub_type_fig` BEFORE DELETE ON `figures` FOR EACH ROW begin
update figure_type set ftype_figure = ftype_figure - 1 where ftype_id = old.fig_type;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `figure_info`
-- (See below for the actual view)
--
CREATE TABLE `figure_info` (
`id` bigint(20)
,`name` varchar(50)
,`img` varchar(255)
,`type` varchar(20)
,`manufacturer` varchar(255)
,`man_logo` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `figure_type`
--

CREATE TABLE `figure_type` (
  `ftype_id` int(11) NOT NULL,
  `ftype_name` varchar(20) DEFAULT NULL,
  `ftype_figure` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `figure_type`
--

INSERT INTO `figure_type` (`ftype_id`, `ftype_name`, `ftype_figure`) VALUES
(1, '1/7th scale', 3),
(2, 'nendoroid', 1),
(3, 'pop up parade', 1),
(4, 'figma', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `man_id` bigint(20) NOT NULL,
  `man_name` varchar(255) DEFAULT NULL,
  `man_logo` varchar(255) DEFAULT NULL,
  `man_figure` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`man_id`, `man_name`, `man_logo`, `man_figure`) VALUES
(1, 'Good Smile Company', 'goodsmilecompany.png', 2),
(2, 'FREEing', 'freeing.png', 1),
(3, 'Max Factory', 'maxfactory.png', 1),
(4, 'Myethos', 'myethos.jpg', 1);

-- --------------------------------------------------------

--
-- Structure for view `figure_info`
--
DROP TABLE IF EXISTS `figure_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `figure_info`  AS SELECT `a`.`fig_id` AS `id`, `a`.`fig_name` AS `name`, `a`.`fig_img` AS `img`, `figure_type`.`ftype_name` AS `type`, `a`.`man_name` AS `manufacturer`, `a`.`man_logo` AS `man_logo` FROM ((select `figures`.`fig_id` AS `fig_id`,`figures`.`fig_name` AS `fig_name`,`figures`.`fig_img` AS `fig_img`,`figures`.`fig_type` AS `fig_type`,`figures`.`fig_man` AS `fig_man`,`manufacturers`.`man_name` AS `man_name`,`manufacturers`.`man_logo` AS `man_logo` from (`figures` join `manufacturers` on(`figures`.`fig_man` = `manufacturers`.`man_id`))) `a` join `figure_type` on(`a`.`fig_type` = `figure_type`.`ftype_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `figures`
--
ALTER TABLE `figures`
  ADD PRIMARY KEY (`fig_id`),
  ADD UNIQUE KEY `fig_name` (`fig_name`),
  ADD UNIQUE KEY `fig_img` (`fig_img`),
  ADD KEY `fig_type` (`fig_type`),
  ADD KEY `fig_man` (`fig_man`);

--
-- Indexes for table `figure_type`
--
ALTER TABLE `figure_type`
  ADD PRIMARY KEY (`ftype_id`),
  ADD UNIQUE KEY `ftype_name` (`ftype_name`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`man_id`),
  ADD UNIQUE KEY `man_name` (`man_name`),
  ADD UNIQUE KEY `man_logo` (`man_logo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `figures`
--
ALTER TABLE `figures`
  MODIFY `fig_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `figure_type`
--
ALTER TABLE `figure_type`
  MODIFY `ftype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `man_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `figures`
--
ALTER TABLE `figures`
  ADD CONSTRAINT `figures_ibfk_1` FOREIGN KEY (`fig_type`) REFERENCES `figure_type` (`ftype_id`),
  ADD CONSTRAINT `figures_ibfk_2` FOREIGN KEY (`fig_man`) REFERENCES `manufacturers` (`man_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
