-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2014 at 04:57 PM
-- Server version: 5.5.40-0+wheezy1
-- PHP Version: 5.4.34-0+deb7u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `base_auth_app`
--
CREATE DATABASE IF NOT EXISTS `base_auth_app` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `base_auth_app`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` char(64) COLLATE utf8_bin NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `encrypted_password` char(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `encrypted_password`) VALUES
(1, 'sample_user@gmail.com', 'Петров Иван Иванович', '$2y$10$a07rXT7xXVf3V0DsXD7xa.4KcpttGHLOrlIwn.fpWDFcrExAfhEg6'),
(3, 'heyzea1@gmail.com', 'Чернышев Даниил Дмитриевич', '$2y$10$a07rXT7xXVf3V0DsXD7xa.J.Av4SsUes/X4XFPsn2FSk/Fy0MyTD2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;