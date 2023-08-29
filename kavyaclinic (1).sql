-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 10:27 AM
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
-- Database: `kavyaclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `dname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`dname`) VALUES
('acanthosis'),
('acne'),
('ACNE SCAR'),
('ACNE TRUE'),
('ACNEFOR'),
('ALOPECIA AREATA'),
('Atopic dermetitis'),
('Boils'),
('Burn'),
('callosity'),
('Chickenpox'),
('Contact Allergic dermetitis'),
('Corn'),
('diffuse alopecia'),
('eczema'),
('Erythema'),
('Facial dermetrtis'),
('Fix drug reaction'),
('Folliculitis'),
('Freckle'),
('Fryoderma'),
('Hair removal'),
('Herpes'),
('Hlrsulism'),
('Hypermelanosis'),
('Hyperpignientation'),
('Hypomelanosis'),
('Ichtyosis vulgens'),
('Injury'),
('Inset bite'),
('Keloed Iceratoderma'),
('Keloid'),
('keratoderma'),
('Keratosis pilaris'),
('kerion'),
('lichen planus'),
('lipoma'),
('lips'),
('lock jaw'),
('macular amyloidosis'),
('melasma'),
('milia'),
('miliaria'),
('misselenius'),
('mole'),
('molescule'),
('molluscum contagioscum'),
('mouth ulcer'),
('naevus'),
('nail'),
('paraphimosis'),
('periorbital hypermelanosis'),
('pernphigus vulgairs'),
('photodermetitis'),
('pityriasis alba'),
('pityriasis rosesea'),
('pompholyx'),
('post burn hypermelanosis'),
('post inflamatory scar'),
('premature graying of hair'),
('psoriasis'),
('psorisiform dermetitis'),
('puffiness'),
('purpular articaria'),
('scabies'),
('sebohhoric dermetitis'),
('SMF'),
('stomatitis'),
('striae'),
('surgery'),
('syphilis'),
('tinea'),
('tonsilitis'),
('trichotilomania'),
('urticaria'),
('verruca vulgaris'),
('vitiligo'),
('warts'),
('winter dermetitis'),
('xanthelesma palpebrai');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` bigint(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `mobnum` int(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `images` blob NOT NULL,
  `medicines` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`dname`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dname` (`dname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `dname` FOREIGN KEY (`dname`) REFERENCES `disease` (`dname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
