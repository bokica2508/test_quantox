-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2019 at 12:18 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf16_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `email`) VALUES
(1, 'ana', '276b6c4692e78d4799c12ada515bc3e4', 'ana@live.com'),
(2, 'ivana', '4eb274593fde2b15697a325349d89aa4', 'ivana@gmail.com'),
(3, 'bojana', '2bbeabdd0fee4730d976c3f3b09f937a', 'bojana@gmail.com'),
(4, 'predrad', '300addf78c779711e5916a58aa4f93c4', 'predrag@gmail.com'),
(5, 'ivanaIka', '4eb274593fde2b15697a325349d89aa4', 'ika@gmail.com'),
(7, 'Lena Perović', '10d42bdbf7168920182ee3e20db381db', 'lenica@gmail.com'),
(8, 'Milica', '932e512d0da2821efe2b81539f0b82c5', 'milica@yahoo.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
