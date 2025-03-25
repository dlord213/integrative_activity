-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 09:26 PM
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
-- Database: `integrative_activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `user_id`, `status`, `created_at`) VALUES
(1, 7, 2, 'Pending', '2025-03-25 19:17:47'),
(2, 7, 2, 'To deliver', '2025-03-25 19:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `quantity`, `price`, `image_url`) VALUES
(1, 'Red Roses', '', 17, 500, 'https://gallery.yopriceville.com/downloadfullsize/send/4947'),
(2, 'Sunflowers', '', 15, 300, 'https://pngimg.com/d/sunflower_PNG13403.png'),
(3, 'Tulips', '', 25, 400, 'https://pngimg.com/d/tulip_PNG8989.png'),
(4, 'Orchids', '', 10, 600, 'https://static.vecteezy.com/system/resources/thumbnails/023/564/907/small_2x/purple-orchid-flower-watercolor-illustration-ai-generated-png.png'),
(5, 'Lilies', '', 18, 450, 'https://png.pngtree.com/png-vector/20230909/ourmid/pngtree-white-lily-flower-png-image_10012327.png'),
(6, 'Daisies', '', 30, 200, 'https://gallery.yopriceville.com/downloadfullsize/send/21263'),
(7, 'Peonies', '', 10, 550, 'https://png.pngtree.com/png-clipart/20240312/original/pngtree-pink-peony-flower-png-image_14573492.png'),
(8, 'Carnations', '', 22, 260, 'https://png.pngtree.com/png-clipart/20230421/original/pngtree-carnation-pink-illustration-png-image_9072264.png'),
(9, 'Hydrangeas', '', 8, 700, 'https://png.pngtree.com/png-vector/20240309/ourmid/pngtree-cool-blue-hydrangeas-flowers-png-image_11898704.png'),
(10, 'Lavender', '', 16, 350, 'https://png.pngtree.com/png-vector/20230413/ourmid/pngtree-purple-lavender-plant-flowers-photo-png-image_6681530.png'),
(11, 'Sativa Leaf', '', 3, 2500, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Sativa_leaf.png/706px-Sativa_leaf.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` text NOT NULL,
  `type` text NOT NULL,
  `phone_number` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `created_at`, `username`, `type`, `phone_number`, `address`) VALUES
(2, 'viernes.jhonlloydd@gmail.com', '$2y$10$wAsh6c8HSeRbyL3n93UOA.stQEaz6JHx3t01AlgbkMWWvbjOyhH4S', '2025-03-25 18:15:46', 'dlord213', 'user', '09673948765', 'Calaanan'),
(3, 'admin1@gmail.com', '$2y$10$0nCQUnI333eKSZ0VOcm4WeQj71uD738vF6FzEk5KTYM1GUlbo50nW', '2025-03-25 17:13:34', 'dlord213', 'admin', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
