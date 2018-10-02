-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 27 sep 2018 kl 11:04
-- Serverversion: 10.1.34-MariaDB
-- PHP-version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `pjamasc`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `page_body` text COLLATE utf8_swedish_ci NOT NULL,
  `page_weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `page`
--

INSERT INTO `page` (`page_id`, `page_title`, `page_body`, `page_weight`) VALUES
(1, 'Om Oss', '#PJAMASC\r\nPJAMASC siktar mot att bli världsledande inom kasinoutveckling...\r\n\r\n#Vilka är vi\r\n...\r\n\r\n#Hitta hit\r\nVi befinner oss i Kista...', 0),
(2, 'Kontakt', '#Kontakt\r\n...', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `product_description` mediumtext COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`) VALUES
(1, 'Slots', 'Klassiskt Slots-spel.');

-- --------------------------------------------------------

--
-- Tabellstruktur `review`
--

CREATE TABLE `review` (
  `review_author` int(11) NOT NULL,
  `review_product` int(11) NOT NULL,
  `review_creation` datetime NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_comment` mediumtext COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `review`
--

INSERT INTO `review` (`review_author`, `review_product`, `review_creation`, `review_rating`, `review_comment`) VALUES
(1, 1, '2018-09-25 11:06:00', 10, 'Helt klart 10/10!');

-- --------------------------------------------------------

--
-- Tabellstruktur `rfp`
--

CREATE TABLE `rfp` (
  `rfp_id` int(11) NOT NULL,
  `rfp_owner` int(11) DEFAULT NULL,
  `rfp_notes` text COLLATE utf8_swedish_ci NOT NULL,
  `rfp_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `rfp`
--

INSERT INTO `rfp` (`rfp_id`, `rfp_owner`, `rfp_notes`, `rfp_creation`) VALUES
(1, 1, 'Hoppas ni kan hjälpa till!', '2018-09-25 11:00:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `user_name` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `user_org_name` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `user_org_no` char(10) COLLATE utf8_swedish_ci NOT NULL,
  `user_password` char(60) COLLATE utf8_swedish_ci NOT NULL,
  `user_type` enum('unconfirmed_customer','customer','admin') COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_org_name`, `user_org_no`, `user_password`, `user_type`) VALUES
(1, 'benter@kth.se', 'William', 'Cantaloupe', '5555550000', '$2y$12$DWDeZyfb9BebP8LkYTfXoO6iYFnAdwENFS1mw2Sm8FMapZWAwmIwi', 'admin');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Index för tabell `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Index för tabell `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_author`,`review_product`),
  ADD KEY `review_author` (`review_author`),
  ADD KEY `review_product` (`review_product`);

--
-- Index för tabell `rfp`
--
ALTER TABLE `rfp`
  ADD PRIMARY KEY (`rfp_id`),
  ADD KEY `rfp_owner` (`rfp_owner`) USING BTREE;

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `rfp`
--
ALTER TABLE `rfp`
  MODIFY `rfp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`review_author`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`review_product`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `rfp`
--
ALTER TABLE `rfp`
  ADD CONSTRAINT `rfp_ibfk_1` FOREIGN KEY (`rfp_owner`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 11:37 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjamasc`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `description` varchar(225) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `description`, `telephone`, `email`, `address`) VALUES
(1, 'shoo', '2234444', 'foo@hotmail.com', 'KistagÃ¥ngen 22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
