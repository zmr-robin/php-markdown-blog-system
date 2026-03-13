-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2026 at 01:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` int(11) NOT NULL,
  `PostURL` varchar(255) NOT NULL,
  `PostTitle` varchar(255) NOT NULL,
  `PostContent` longtext NOT NULL,
  `PostAuthor` varchar(255) NOT NULL,
  `PostDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `PostURL`, `PostTitle`, `PostContent`, `PostAuthor`, `PostDate`) VALUES
(1, 'test', 'Test #1', '<h1>Hello World</h1><p><b>Lorem ipsum</b> dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorems ipsum dolor sit amet. <mark>Lorem ipsum dolor sit amet</mark>, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><hr><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod <i>tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</i> Stet clita kasd gubergren, no sea takimata <a href=\'http://example.com/\'>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor</a> sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam <a href=\'https://example.com/\'>erat, sed diam</a> voluptua. At vero eos et accusam et justo duo <u>dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</u></p><hr><img src=\'https://placecats.com/300/200\' alt=\'A Cat\'/><hr><ul><li>Lorem Ipsum</li><li>Eirmod tempor invidunt</li><ul><li>et ea rebum</li><li>set <a href=\'https://example.com/\'>clita kasd</a> gubergren</li></ul><li>diam lorem num</li></ul><hr><ol><li value=\'1\'>Test1</li><li value=\'2\'>Test3</li><ol><li value=\'1\'>Test4</li><li value=\'2\'>Test5</li></ol><li value=\'3\'>Test6</li><ul><li>Test 7</li><li>Test 8</li></ul></ol><h2>Hello World 2</h2><p><a href=\'https://example.com/\'>Lorem ipsum</a> dolor sit amet, consetetur sadipscing elitr, sed diam </p><blockquote> Robin Z.</blockquote>', 'Robin Zimmer', '2026-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(256) NOT NULL,
  `userDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD UNIQUE KEY `PostURL` (`PostURL`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
