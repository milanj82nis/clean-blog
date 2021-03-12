-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 10:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clean-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(211) NOT NULL,
  `slug` varchar(211) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(9, 'Category 1', 'Category-1', '2021-03-11 22:50:39', '2021-03-11 22:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(211) NOT NULL,
  `slug` varchar(211) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `tag_id` int(11) UNSIGNED NOT NULL,
  `featured_image` varchar(211) NOT NULL,
  `excerpt` text NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL DEFAULT 0,
  `soft_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(211) NOT NULL,
  `slug` varchar(211) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tag 1', 'Tag-1', '2021-03-12 11:26:59', '2021-03-12 11:26:59'),
(2, 'Tag 23', 'Tag-23', '2021-03-12 11:27:30', '2021-03-12 11:27:30'),
(3, 'My  tag', 'My-tag', '2021-03-12 11:30:45', '2021-03-12 11:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(211) NOT NULL,
  `slug` varchar(211) NOT NULL,
  `email` varchar(211) NOT NULL,
  `password` varchar(211) NOT NULL,
  `is_admin` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `banned` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `ip_address` varchar(211) NOT NULL,
  `featured_image` varchar(211) DEFAULT 'https://usapng.com/images/thumb/200_/user-icon-6.webp',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `password`, `is_admin`, `banned`, `active`, `ip_address`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 'Milan Janković', '', 'milanj31@gmail.com', '$2y$10$NJ8eUVwNqRrhEbDNUA4MuePBGJUpdZG0pcwDn8waakDHcsNnNPj1.', 1, 0, 1, '::1', 'https://usapng.com/images/thumb/200_/user-icon-6.webp', '2021-03-10 14:32:31', '2021-03-10 14:32:31'),
(2, 'Milan Janković', 'Milan-Jankovi-', 'milanj31@gmial.comm', '$2y$10$4VtG64haw5CXkgZt66DveOiNwQWfQn.CaYzuPB5xqSzCjL2UUylLa', 1, 0, 1, '', 'https://usapng.com/images/thumb/200_/user-icon-6.webp', '2021-03-12 22:19:39', '2021-03-12 22:19:39'),
(3, 'This is test user', 'This-is-test-user', 'test@gmail.com', '$2y$10$Vd3wAb92O0cj4Of5fFo9Lewr/LaRlA7yI.6BaZWcgNe556aWusb.m', 0, 0, 0, '', 'https://usapng.com/images/thumb/200_/user-icon-6.webp', '2021-03-12 22:23:45', '2021-03-12 22:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`slug`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
