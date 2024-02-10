-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 04:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofo`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_id`
--

CREATE TABLE `booking_id` (
  `id` int(12) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `created_at` tinyint(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_id`
--

INSERT INTO `booking_id` (`id`, `booking_id`, `created_at`) VALUES
(46, 637114245, 127);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(12) NOT NULL,
  `name` varchar(191) NOT NULL,
  `icon` varchar(191) NOT NULL,
  `brief` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `brief`, `created_at`) VALUES
(27, 'Icream', '1696406964.jpeg', '\"Ice cream is a frozen dessert with creamy textures and various flavors, a delightful treat for all ages.\"\r\n\r\n\r\n\r\n\r\n', '2023-10-04 08:09:26'),
(28, 'Pizza', '1696420812.png', '\"Pizza is a tasty Italian dish with a crispy base, tangy sauce, and cheesy toppings, enjoyed by people everywhere.\"\r\n\r\n', '2023-10-04 12:00:14'),
(29, 'Zinger Burger', '1696421200.png', '\"Zinger burger is a flavorful sandwich featuring a crispy, seasoned chicken patty, fresh lettuce, and zesty mayo, providing a satisfying bite.\"\r\n\r\n\r\n\r\n\r\n', '2023-10-04 12:06:42'),
(30, 'Fresh Drink', '1696421682.png', '\"A fresh cold drink is a thirst-quenching beverage, often bubbly and fruity, offering a cool and revitalizing taste sensation.\"\r\n\r\n\r\n\r\n\r\n', '2023-10-04 12:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_odbk_id`
--

CREATE TABLE `confirm_odbk_id` (
  `id` int(11) NOT NULL,
  `odbk_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirm_odbk_id`
--

INSERT INTO `confirm_odbk_id` (`id`, `odbk_id`) VALUES
(28, 438884530),
(30, 839295564),
(31, 1036758164),
(32, 1057025800);

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order`
--

CREATE TABLE `confirm_order` (
  `id` int(11) NOT NULL,
  `confirm_order_id` bigint(20) NOT NULL,
  `created_at` tinyint(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirm_order`
--

INSERT INTO `confirm_order` (`id`, `confirm_order_id`, `created_at`) VALUES
(0, 1270319080, 127),
(0, 980222097, 127),
(0, 137061047, 127),
(0, 253830630, 127);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `guest` bigint(20) NOT NULL,
  `table_no` bigint(20) NOT NULL,
  `time` int(12) NOT NULL,
  `price` varchar(191) NOT NULL,
  `comment` text NOT NULL,
  `waiter_status` varchar(12) NOT NULL,
  `chef_status` varchar(12) NOT NULL,
  `payment` varchar(12) NOT NULL,
  `created_at` bigint(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `order_id`, `booking_id`, `name`, `guest`, `table_no`, `time`, `price`, `comment`, `waiter_status`, `chef_status`, `payment`, `created_at`) VALUES
(231, 1270319080, 0, 'nauman', 2, 12, 0, 'PKR 90.00', 'fast', 'Done', 'Ready', 'Yes', 1694885233633),
(232, 1582178596, 0, 'nauman', 2, 12, 0, 'PKR 90.00', 'fast', '', '', '', 1694885548067),
(233, 980222097, 0, 'nauman', 2, 12, 0, 'PKR 90.00', 'fast', 'Done', 'Ready', 'Yes', 1694885685118),
(234, 137061047, 137061047, 'Nauman ', 8, 123, 30, 'PKR 765.00', 'tasty', '', 'Ready', 'Yes', 1694885739235),
(235, 0, 1281051016, 'Nauman ', 8, 0, 30, 'PKR 765.00', 'tasty', '', '', '', 1694885811156),
(236, 0, 783576580, 'Nauman ', 8, 0, 30, 'PKR 765.00', 'tasty', '', '', '', 1694885814764),
(237, 438884530, 438884530, 'Nauman ', 8, 12, 30, 'PKR 765.00', 'tasty', 'Done', 'Ready', '', 1694885835476),
(238, 1777633065, 0, 'Ahmad', 5, 10, 0, '', '', '', '', '', 0),
(239, 458487760, 0, 'Ahmad', 5, 10, 0, '10', 'good', '', '', '', 0),
(240, 350488576, 0, 'Ahmad', 5, 10, 0, '10', 'good', '', '', '', 0),
(241, 844970971, 0, 'Ahmad', 5, 10, 0, '10', 'good', '', '', '', 0),
(242, 253830630, 0, 'Ahmad', 5, 10, 0, '10', 'good', '', '', 'Yes', 0),
(243, 839295564, 0, 'Ahmad', 5, 10, 0, '10', 'good', 'Done', '', '', 0),
(244, 926441534, 0, 'Farhan Ali', 2, 15, 0, 'PKR 800.00', 'Fast', '', '', '', 1697082053612),
(245, 0, 637114245, 'Farhan', 5, 0, 20, 'PKR 800.00', 'Good', '', '', '', 1697082106879),
(246, 1057025800, 0, 'Ahmad', 5, 10, 0, '10', 'good', '', '', '', 0),
(247, 1036758164, 0, 'Ahmad', 5, 10, 0, '10', 'good', '', '', '', 0),
(248, 0, 1388053778, 'Ahmad', 5, 0, 123, '230', 'grest', '', '', '', 1645144704466);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(12) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(17, 'Farhan Ali', 'admin@gmail.com', '03116685763', '123', 0, NULL),
(21, 'Waqas Ch', 'm@gmail.com', '03116685763', '123', 1, NULL),
(22, 'Umair Aslam', 'w@gmail.com', '03116685763', '123', 3, NULL),
(24, 'Zeeshan', 'c@gmail.com', '03116685763', '123', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(12) NOT NULL,
  `title` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` tinyint(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `title`, `image`, `created_at`) VALUES
(8, 'Zinger Burger', '1696433291.png', 127);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(12) NOT NULL,
  `odbk_id` bigint(30) NOT NULL,
  `product_id` int(20) NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `amount` int(11) NOT NULL,
  `price_item` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `odbk_id`, `product_id`, `product_name`, `amount`, `price_item`) VALUES
(203, 1270319080, 29, 'rtret', 2, 45.00),
(204, 1582178596, 29, 'rtret', 2, 45.00),
(205, 980222097, 29, 'rtret', 2, 45.00),
(206, 137061047, 29, 'rtret', 17, 45.00),
(207, 1281051016, 29, 'rtret', 17, 45.00),
(208, 783576580, 29, 'rtret', 17, 45.00),
(209, 438884530, 29, 'rtret', 17, 45.00),
(210, 1777633065, 3, 'food', 2, 400.00),
(211, 458487760, 3, 'food', 2, 400.00),
(212, 350488576, 3, 'food', 2, 400.00),
(213, 844970971, 3, 'food', 2, 400.00),
(214, 253830630, 3, 'food', 2, 400.00),
(215, 839295564, 3, 'food', 2, 400.00),
(216, 926441534, 31, 'Pizza', 1, 100.00),
(217, 926441534, 32, 'Zinger Burger', 1, 450.00),
(218, 926441534, 33, 'Fresh Drink', 1, 250.00),
(219, 637114245, 31, 'Pizza', 1, 100.00),
(220, 637114245, 32, 'Zinger Burger', 1, 450.00),
(221, 637114245, 33, 'Fresh Drink', 1, 250.00),
(222, 1057025800, 3, 'food', 2, 400.00),
(223, 1036758164, 3, 'food', 2, 400.00),
(224, 1388053778, 3, 'food', 233, 400.00),
(225, 1388053778, 4, 'dddfffd', 43, 329398.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_id`
--

CREATE TABLE `order_id` (
  `id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created_at` tinyint(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_id`
--

INSERT INTO `order_id` (`id`, `order_id`, `created_at`) VALUES
(53, 926441534, 127);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(12) NOT NULL,
  `name` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `long_description` longtext NOT NULL,
  `price` double NOT NULL,
  `offerprice` varchar(191) NOT NULL,
  `tex` varchar(191) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `small_description`, `long_description`, `price`, `offerprice`, `tex`, `quantity`, `image`, `status`, `created_at`) VALUES
(31, 0, 'Pizza', '\"Pizza: A crispy crust layered with tangy sauce, melted cheese, and your favorite toppings, baked to perfection for a flavorful delight.\"\r\n\r\n\r\n\r\n\r\n', '\"Pizza, a beloved Italian dish, is a mouthwatering combination of crispy crust, savory sauce, melted cheese, and a variety of delectable toppings, offering a perfect blend of flavors in every bite.\"\r\n\r\n\r\n\r\n\r\n', 100, '50', '', 2, '1696432653.png', 0, '2023-10-04 15:17:35'),
(32, 0, 'Zinger Burger', '\"Zinger Burger: A delicious sandwich with a crispy chicken patty, fresh lettuce, and zesty mayo, delivering a flavorful bite in every bite.\"\r\n\r\n\r\n\r\n\r\n', '\"Zinger Burger, a popular fast-food delight, comprises a crispy, seasoned chicken patty, topped with fresh lettuce and drizzled with zesty mayonnaise, all nestled within a soft bun, delivering a satisfying combination of flavors and textures in each mouthwatering bite.\"\r\n\r\n\r\n\r\n\r\n', 450, '50', '', 5, '1696432877.png', 0, '2023-10-04 15:21:19'),
(33, 0, 'Fresh Drink', '\"Fresh Drink: A refreshing beverage that quenches your thirst and delights your taste buds with its cool and invigorating flavors.\"\r\n\r\n\r\n\r\n\r\n', '\"Fresh Drink: A revitalizing beverage bursting with crisp, natural flavors, perfect for hydrating and enjoying the pure taste of refreshment.\"\r\n\r\n\r\n\r\n\r\n', 250, '50', '', 2, '1696433066.png', 0, '2023-10-04 15:24:28'),
(34, 0, 'ice cream', '\"Ice cream, a delightful frozen dessert, offers a creamy, sweet escape from the heat in every spoonful.\"\r\n\r\n\r\n\r\n\r\n', '\"Ice cream is a timeless treat, a frozen wonderland of creamy textures and a symphony of flavors, cooling and comforting the senses with each delectable scoop.\"\r\n\r\n\r\n\r\n\r\n', 100, '50', '', 5, '1696433233.png', 0, '2023-10-04 15:27:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_id`
--
ALTER TABLE `booking_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_odbk_id`
--
ALTER TABLE `confirm_odbk_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_id`
--
ALTER TABLE `order_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_id`
--
ALTER TABLE `booking_id`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `confirm_odbk_id`
--
ALTER TABLE `confirm_odbk_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `order_id`
--
ALTER TABLE `order_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
