-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2024 at 04:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iftar`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `message`, `name`, `email`, `subject`, `created_at`) VALUES
(1, 'Make sure to replace \"your_form_page.php\" with the actual filename or path of your form page. On the form page, you can then check for the presence of these session variables and display the appropriate messages.Make sure to replace \"your_form_page.php\" with the actual filename or path of your form page. On the form page, you can then check for the presence of these session variables and display the appropriate messages.Make sure to replace \"your_form_page.php\" with the actual filename or path of your form page. On the form page, you can then check for the presence of these session variables and display the appropriate messages.', 'Badr AZAOU', 'azaoubadr@gmail.com', 'this is the subject !', '2023-12-08 15:29:40'),
(2, 'Make sure to replace \"your_form_page.php\" with the actual filename or path of your form page. On the form page, you can then check for the presence of these session variables and display the appropriate messages.Make sure to replace \"your_form_page.php\" with the actual filename or path of your form page. On the form page, you can then check for the presence of these session variables and display the appropriate messages.Make sure to replace \"your_form_page.php\" with the actual filename or path of your form page. On the form page, you can then check for the presence of these session variables and display the appropriate messages.', 'Badr AZAOU', 'azaoubadr@gmail.com', 'this is the subject !', '2023-12-08 15:31:43'),
(3, 'success_messagesuccess_messagesuccess_messagesuccess_messagesuccess_message', 'Badr AZAOU', 'azawbadr@gmail.com', 'this is the subject !', '2023-12-08 15:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `pointage`
--

CREATE TABLE `pointage` (
  `id` int(11) NOT NULL,
  `jour` int(11) DEFAULT NULL,
  `jour_details` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pointage`
--

INSERT INTO `pointage` (`id`, `jour`, `jour_details`, `status`) VALUES
(1, 11, '11 mars 2024', 0),
(2, 12, '12 mars 2024', 0),
(3, 13, '13 mars 2024', 0),
(4, 14, '14 mars 2024', 0),
(5, 15, '15 mars 2024', 0),
(6, 16, '16 mars 2024', 0),
(7, 17, '17 mars 2024', 0),
(8, 18, '18 mars 2024', 0),
(9, 19, '19 mars 2024', 0),
(10, 20, '20 mars 2024', 0),
(11, 21, '21 mars 2024', 0),
(12, 22, '22 mars 2024', 0),
(13, 23, '23 mars 2024', 0),
(14, 24, '24 mars 2024', 0),
(15, 25, '25 mars 2024', 0),
(16, 26, '26 mars 2024', 0),
(17, 27, '27 mars 2024', 0),
(18, 28, '28 mars 2024', 0),
(19, 29, '29 mars 2024', 0),
(20, 30, '30 mars 2024', 0),
(21, 31, '31 mars 2024', 0),
(22, 1, '1 avril 2024', 0),
(23, 2, '2 avril 2024', 0),
(24, 3, '3 avril 2024', 0),
(25, 4, '4 avril 2024', 0),
(26, 5, '5 avril 2024', 0),
(27, 6, '6 avril 2024', 0),
(28, 7, '7 avril 2024', 0),
(29, 8, '8 avril 2024', 0),
(30, 9, '9 avril 2024', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studata`
--

CREATE TABLE `studata` (
  `id` int(11) NOT NULL,
  `cne` varchar(20) DEFAULT NULL,
  `resident` int(11) DEFAULT NULL,
  `bourse` int(11) DEFAULT NULL,
  `orphelin` int(11) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `cite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studata`
--

INSERT INTO `studata` (`id`, `cne`, `resident`, `bourse`, `orphelin`, `location`, `cite`) VALUES
(2, 'G136712581', 3, 3, 0, 0, 0),
(3, 'G136712581', 3, 3, 0, 1, 0),
(4, 'G138712566', 2, 0, 0, 1, 0),
(5, 'G138712566', 2, 0, 1, 0, 0),
(6, 'G138712566', 2, 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `cne` varchar(255) DEFAULT NULL,
  `appogee` varchar(255) DEFAULT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `adresse_parents` varchar(255) DEFAULT NULL,
  `adresse_actuel` varchar(255) DEFAULT NULL,
  `location` enum('oui','non') DEFAULT NULL,
  `cite` enum('oui','non') DEFAULT NULL,
  `etat_bourse` enum('complet','demi','non') DEFAULT NULL,
  `adresse_email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `orphelin` enum('oui','non') DEFAULT NULL,
  `nb_membres_famille` int(11) DEFAULT NULL,
  `agreement` tinyint(1) DEFAULT NULL,
  `abac` varchar(255) DEFAULT NULL,
  `etablissement` varchar(255) DEFAULT NULL,
  `cycle` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nom`, `prenom`, `cne`, `appogee`, `cin`, `adresse_parents`, `adresse_actuel`, `location`, `cite`, `etat_bourse`, `adresse_email`, `telephone`, `photo`, `orphelin`, `nb_membres_famille`, `agreement`, `abac`, `etablissement`, `cycle`, `created_at`, `updated_at`) VALUES
(2, 'Badr', 'Azaou', 'G136712581', '2021339', 'EC73179', 'Marrakech', 'marrakech', 'oui', 'non', 'complet', 'azawbadr@gmail.com', '0705276071', '../uploads/students/me.jpeg', 'non', 5, 0, '2020', 'FSSM', 2, '2023-12-13 10:51:32', '2023-12-13 10:51:32'),
(3, 'Badr', 'Azaou', 'G136712581', '2021339', 'EC73179', 'Marrakech', 'marrakech', 'oui', 'non', 'complet', 'azawbadr@gmail.com', '0705276071', '../uploads/students/me.jpeg', 'non', 5, 0, '2020', 'FSSM', 2, '2023-12-13 10:54:22', '2023-12-13 10:54:22'),
(4, 'Badr', 'Azaou', 'G138712566', '2021339', 'EC73179', 'Marrakech', 'marrakech', 'oui', 'non', 'non', 'azawbadr@gmail.com', '0705276071', '../uploads/students/407422561_337000482293189_968786267454240779_n.jpg', 'non', 5, 0, '2021', 'FSSM', 1, '2023-12-13 10:59:39', '2023-12-13 10:59:39'),
(5, 'Badr', 'Azaou', 'G138712566', '2021339', 'EC73179', 'Marrakech', 'marrakech', 'non', 'non', 'complet', 'azawbadr@gmail.com', '0705276071', '../uploads/students/Am Sal.png', 'oui', 5, 0, '2021', 'FSSM', 1, '2023-12-13 11:03:25', '2023-12-13 11:03:25'),
(6, 'Badr', 'Azaou', 'G138712566', '2021339', 'EC73179', 'Marrakech', 'marrakech', 'oui', 'oui', 'non', 'azawbadr@gmail.com', '0705276071', '../uploads/students/Projet de IT Club.png', 'non', 5, 0, '2021', 'FSSM', 1, '2023-12-13 11:51:11', '2023-12-13 11:51:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pointage`
--
ALTER TABLE `pointage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studata`
--
ALTER TABLE `studata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pointage`
--
ALTER TABLE `pointage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `studata`
--
ALTER TABLE `studata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
