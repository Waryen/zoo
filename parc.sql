-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 01, 2020 at 10:42 AM
-- Server version: 5.7.30
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `parc`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `pk` int(11) NOT NULL,
  `race` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `fk_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`pk`, `race`, `name`, `gender`, `diet`, `fk_area`) VALUES
(1, 'Lion', 'Simba', 'male', 'carnivore', 2),
(2, 'Giraffe', 'Melman', 'male', 'herbivore', 2),
(3, 'Ours', 'Macha', 'female', 'omnivore', 1),
(6, 'Pangolin', 'Kevin', 'female', 'omnivore', 5),
(9, 'Orc', 'Paul', 'female', 'omnivore', 3),
(12, 'Lion', 'Louis', 'male', 'carnivore', 2),
(13, 'Jument', 'Lena', 'female', 'herbivore', 5),
(17, 'Chat', 'Simba', 'male', 'carnivore', 1),
(19, 'Cheval', 'Gandalf', 'male', 'herbivore', 2),
(20, 'Porc', 'Saruman', 'male', 'carnivore', 12),
(21, 'Lémurien', 'Frodon', 'male', 'omnivore', 2),
(26, 'Ogre', 'Shrek', 'male', 'carnivore', 23);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `pk` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`pk`, `name`, `status`) VALUES
(1, 'Tundra', 'open'),
(2, 'Afrique', 'work'),
(3, 'Aquarium', 'closed'),
(5, 'Asie', 'closed'),
(12, 'Jungle', 'closed'),
(23, 'Marécage', 'closed'),
(24, 'Plaine', 'open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_area` (`fk_area`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `fk_area_relation` FOREIGN KEY (`fk_area`) REFERENCES `areas` (`pk`);
