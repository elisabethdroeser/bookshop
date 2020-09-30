-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 30, 2020 at 10:52 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `stripe`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
('cus_I70pPXcjj2gajJ', 'Jane', 'Doe', 'jane@gmail.com', '2020-09-29 19:39:53'),
('cus_I70rcmWTsJvye2', 'Erik', 'Uppenberg', 'erik@gmail.com', '2020-09-29 19:41:54'),
('cus_I70u0DCLjuuTYn', 'Tompa', 'Lompa', 'tompa@gmail.com', '2020-09-29 19:44:51'),
('cus_I716qQEguFaIpH', 'Anna', 'Christell', 'anna@gmail.com', '2020-09-29 19:57:01'),
('cus_I7FGEsRaO3aaL0', 'Kristin', 'Nordin', 'kristin@gmail.com', '2020-09-30 10:34:22'),
('cus_I7FgmNquhWFafs', 'Peter', 'Kollarik', 'peter@kollarik.se', '2020-09-30 11:01:04'),
('cus_I7FkEdzRX93tF5', 'Hejsvej', 'vilkengrej', 'hej@gmail.com', '2020-09-30 11:05:04'),
('cus_I7HDJEYquboGLs', 'Anders', 'Nyman', 'nyman@nyman.se', '2020-09-30 12:35:50'),
('cus_I7HTKurROfvsjN', 'Patrik', 'Karlsson', 'putte@knutte.com', '2020-09-30 12:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `product`, `amount`, `currency`, `status`, `created_at`) VALUES
('ch_1HWmsgH0Gegg1QyLJPHLxG05', 'cus_I70u0DCLjuuTYn', 'Nedladdning posts', '2000', 'sek', 'succeeded', '2020-09-29 19:44:51'),
('ch_1HWn4TH0Gegg1QyLb491BriZ', 'cus_I716qQEguFaIpH', 'Nedladdning posts', '2000', 'sek', 'succeeded', '2020-09-29 19:57:01'),
('ch_1HX0lVH0Gegg1QyLdu6w3kmm', 'cus_I7FGEsRaO3aaL0', 'Nedladdning posts', '2000', 'sek', 'succeeded', '2020-09-30 10:34:22'),
('ch_1HX1BLH0Gegg1QyLdbq5zK1F', 'cus_I7FgmNquhWFafs', 'Nedladdning posts', '2000', 'sek', 'succeeded', '2020-09-30 11:01:04'),
('ch_1HX1FEH0Gegg1QyLRBfaE128', 'cus_I7FkEdzRX93tF5', 'Nedladdning posts', '2000', 'sek', 'succeeded', '2020-09-30 11:05:04'),
('ch_1HX2f3H0Gegg1QyLQJMYInWV', 'cus_I7HDJEYquboGLs', 'Nedladdning posts', '2000', 'sek', 'succeeded', '2020-09-30 12:35:50'),
('ch_1HX2u6H0Gegg1QyLZuwdxRna', 'cus_I7HTKurROfvsjN', 'Nedladdning posts', '2000', 'sek', 'succeeded', '2020-09-30 12:51:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`