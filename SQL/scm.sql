-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2023 at 08:06 PM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 7.3.33-12+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalsearchapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `clinic_id` int NOT NULL,
  `url` text,
  `title` varchar(555) DEFAULT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `address` varchar(555) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country_code` varchar(2) DEFAULT NULL,
  `website` varchar(555) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `phone_unformatted` varchar(20) DEFAULT NULL,
  `claim_this_business` tinyint(1) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `location_name` varchar(555) DEFAULT NULL,
  `total_score` decimal(3,2) DEFAULT NULL,
  `permanently_closed` tinyint(1) DEFAULT NULL,
  `temporarily_closed` tinyint(1) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `reviews_count` int DEFAULT NULL,
  `reviews_one_star` int DEFAULT NULL,
  `reviews_two_star` int DEFAULT NULL,
  `reviews_three_star` int DEFAULT NULL,
  `reviews_four_star` int DEFAULT NULL,
  `reviews_five_star` int DEFAULT NULL,
  `images_count` int DEFAULT NULL,
  `scraped_at` datetime DEFAULT NULL,
  `reserve_table_url` varchar(255) DEFAULT NULL,
  `google_food_url` varchar(255) DEFAULT NULL,
  `hotel_stars` int DEFAULT NULL,
  `hotel_description` text,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `similar_hotels_nearby` text,
  `opening_hours` text,
  `amenities` text,
  `accepts_new_patients` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_keywords`
--

CREATE TABLE `clinic_keywords` (
  `clinic_id` int NOT NULL,
  `keyword_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_subcategories`
--

CREATE TABLE `clinic_subcategories` (
  `clinic_id` int NOT NULL,
  `subcategory_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `geographicdata`
--

CREATE TABLE `geographicdata` (
  `city_id` int NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT 'IQ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peoplealsosearch`
--

CREATE TABLE `peoplealsosearch` (
  `search_id` int DEFAULT NULL,
  `related_category` varchar(100) DEFAULT NULL,
  `related_title` varchar(255) DEFAULT NULL,
  `related_reviews_count` int DEFAULT NULL,
  `related_total_score` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `searchhistory`
--

CREATE TABLE `searchhistory` (
  `search_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `search_string` varchar(255) NOT NULL,
  `rank` int DEFAULT NULL,
  `search_page_url` varchar(255) DEFAULT NULL,
  `search_page_loaded_url` varchar(255) DEFAULT NULL,
  `is_advertisement` tinyint(1) DEFAULT NULL,
  `search_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usersubscriptions`
--

CREATE TABLE `usersubscriptions` (
  `subscription_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `subscription_type` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`clinic_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `clinic_keywords`
--
ALTER TABLE `clinic_keywords`
  ADD PRIMARY KEY (`clinic_id`,`keyword_id`),
  ADD KEY `keyword_id` (`keyword_id`);

--
-- Indexes for table `clinic_subcategories`
--
ALTER TABLE `clinic_subcategories`
  ADD PRIMARY KEY (`clinic_id`,`subcategory_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `geographicdata`
--
ALTER TABLE `geographicdata`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keyword` (`keyword`);

--
-- Indexes for table `peoplealsosearch`
--
ALTER TABLE `peoplealsosearch`
  ADD KEY `search_id` (`search_id`);

--
-- Indexes for table `searchhistory`
--
ALTER TABLE `searchhistory`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `usersubscriptions`
--
ALTER TABLE `usersubscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `clinic_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geographicdata`
--
ALTER TABLE `geographicdata`
  MODIFY `city_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `searchhistory`
--
ALTER TABLE `searchhistory`
  MODIFY `search_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersubscriptions`
--
ALTER TABLE `usersubscriptions`
  MODIFY `subscription_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinics`
--
ALTER TABLE `clinics`
  ADD CONSTRAINT `clinics_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `geographicdata` (`city_id`);

--
-- Constraints for table `clinic_keywords`
--
ALTER TABLE `clinic_keywords`
  ADD CONSTRAINT `clinic_keywords_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`clinic_id`),
  ADD CONSTRAINT `clinic_keywords_ibfk_2` FOREIGN KEY (`keyword_id`) REFERENCES `keywords` (`id`);

--
-- Constraints for table `clinic_subcategories`
--
ALTER TABLE `clinic_subcategories`
  ADD CONSTRAINT `clinic_subcategories_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`clinic_id`),
  ADD CONSTRAINT `clinic_subcategories_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `peoplealsosearch`
--
ALTER TABLE `peoplealsosearch`
  ADD CONSTRAINT `fk_search_id` FOREIGN KEY (`search_id`) REFERENCES `searchhistory` (`search_id`);

--
-- Constraints for table `searchhistory`
--
ALTER TABLE `searchhistory`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `usersubscriptions`
--
ALTER TABLE `usersubscriptions`
  ADD CONSTRAINT `fk_user_id_subscriptions` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;