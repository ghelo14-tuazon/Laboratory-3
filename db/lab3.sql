-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2023 at 10:48 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(18, 'admin', 'admin@gmail.com', '$2y$10$3MAa1gOm7ZIG00nA0xYB5e0CvsiYGvxbAGlVZaA.GqwbjxQdQ6dB.', '2023-10-01 10:55:05', '2023-10-01 10:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Desert'),
(6, 'Drinks'),
(7, 'Main Dish'),
(8, 'Filipino Dishes'),
(9, 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `category` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_data` longblob NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `category`, `description`, `quantity`, `price`, `image_data`, `image_name`, `category_id`) VALUES
(163, 'Ice Cream', 'Desert', 'Introducing our newest ice cream sensation, ', 30, '95.50', 0x75706c6f61642f313639363132383130395f37613639613864383338363164326235643338662e706e67, '1696128109_7a69a8d83861d2b5d38f.png', NULL),
(164, 'Chicken Wings', 'Main Dish', 'Save money with this Chicken Bundle which is equivalent to 6 chickens. There is approximately 34 pounds of chicken included in this bundle. This bundle gives you a discount of up to 15% from our retail prices.', 21, '500.00', 0x75706c6f61642f313639363036353337305f32313534363937643434383232323339643436652e706e67, '1696065370_2154697d44822239d46e.png', NULL),
(165, 'Pancit', 'Filipino Dishes', 'Pancit is a staple Filipino dish found at numerous feasts and celebrations, consisting of stir-fried noodles with meat and vegetables such as chicken, pork, shrimp, celery, carrots, onions, garlic, and cabbage.', 40, '250.00', 0x75706c6f61642f313639363134393533345f62653030393833393237333931333534323632312e706e67, '1696149534_be009839273913542621.png', NULL),
(166, 'Strawberry Shake', 'Desert', ' A delicious drink made with strawberries, milk, ice cream and flavoring ingredients like vanilla extract or strawberry syrup. Optionally topped with whipped cream, strawberry syrup and the options are endless, it can be easily dressed to a dessert drink!', 45, '100.00', 0x75706c6f61642f313639363133373833315f64636437663165336430656137343533393264622e706e67, '1696137831_dcd7f1e3d0ea745392db.png', NULL),
(167, 'Pineapple Pal', 'Drinks', 'Pineapple juice is a juice made from pressing the natural liquid out from the pulp of the pineapple (a fruit from a tropical plant). ', 100, '20.00', 0x75706c6f61642f313639363134393235365f62313435383038623739656230343630396162642e706e67, '1696149256_b145808b79eb04609abd.png', NULL),
(168, 'Burger', 'Snack', 'A burger is a patty of ground beef grilled and placed between two halves of a bun. Slices of raw onion, lettuce, bacon, mayonnaise, and other ingredients add flavor. Burgers are considered an American food but are popular around the world.', 32, '100.00', 0x75706c6f61642f313639363133393531305f35323239333965616362333063653830353066332e706e67, '1696139510_522939eacb30ce8050f3.png', NULL),
(169, 'Carbonara', 'Main Dish', 'There may be no more beloved Italian dish than carbonara: hot pasta tossed with a creamy sauce of raw beaten eggs, accentuated with crisp bits of guanciale, and finished with a shower of grated aged Pecorino Romano cheese plus freshly ground black pepper.', 50, '99.00', 0x75706c6f61642f313639363134393630315f39353338653732636466396631653539303666652e706e67, '1696149601_9538e72cdf9f1e5906fe.png', NULL),
(170, 'Lumpia ', 'Filipino Dishes', 'Lumpia are various types of spring rolls commonly found in Indonesia and the Philippines. Lumpia are made of thin paper-like or crepe-like pastry skin called \"lumpia wrapper\" enveloping savory or sweet fillings.', 50, '65.00', 0x75706c6f61642f313639363134393731335f37346431323962356437316539663262616135342e706e67, '1696149713_74d129b5d71e9f2baa54.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'tuazon_ghelo', 'user.test@gmail.com', '$2y$10$WKbPEdKbeQpMCaCf5Q.vJOATz5SFvJyDfz.8fYdUtFf9yxBne3qpq'),
(2, 'ghelo06', 'chix.patrol.2023@gmail.com', '$2y$10$II/sdwkmu7Q0k8CkVO7.k.KmTzL7uICcafurnW0Cjxizhs9VURt6m'),
(3, 'kentaro14', 'acustomer1195@gmail.com', '$2y$10$asIBYu1nxWXoTWip7.eio.F/xuaxifvQbWRJr2a5MFxumObdrcEEq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
