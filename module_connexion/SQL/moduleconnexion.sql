-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 09:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'derroce', 'arthur', 'descourvieres', '$2y$10$5xhMh3gN0q0ScMsQGsyeVexEAJBNl3LljwzCAl2gRlbol.49VAq3W'),
(5, 'paul', 'àçà&&', '___', '$2y$10$UDELl4IRiXAzJ1GabAiQqeqghzaUyse8eTDaExdQfMHIRSQW8EIJ.'),
(6, 'dqs', '&', 'qsdq', '$2y$10$8A8rZO1NkE8WHzAFC4IPdeOWeDsdbiElkjln3Dic6DMy.c6Hhlcgy'),
(7, 'dqs', '&', 'qsdq', '$2y$10$5YYpgJjK6AbfMSHE2BhvF.65treONO3zRXHVB5MtaBQS/wphShyLW'),
(8, 'dqs', '&', 'qsdq', '$2y$10$LB7tVKHC4r2vFAwUs5no/uOElcXKNM9M5KdXEuyAKNeFwWOt742FK'),
(9, 'dqs', '&', 'qsdq', '$2y$10$DeMz8/nwqPhRhF.f2XVjAO3wXXewGy2971B/ISlcgDj8EzyuZUfrm'),
(10, 'cedric', 'cedric', 'grolet', '$2y$10$hgEi0FF1FH0172lr2L7BUOCrYY9DEtIyTJ2pq5qTlRI.Ow.K/Wvka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
