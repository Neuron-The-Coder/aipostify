-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 04:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aipostify`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Dairies'),
(2, 'Vegetables'),
(3, 'Fruits'),
(4, 'Instants'),
(5, 'Utensils'),
(6, 'Meats'),
(7, 'Fishes'),
(8, 'Tools'),
(9, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `customer_informations`
--

CREATE TABLE `customer_informations` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_informations`
--

INSERT INTO `customer_informations` (`id`, `age`, `gender`, `address`) VALUES
('1eb35744-198d-4d4c-9be4-4c82825b2049', 51, 'Male', 'Berlin, German'),
('51ff7cc6-2da1-4346-8c81-a4bdf6b048c7', 45, 'Male', NULL),
('7b7bb420-b0bf-45c5-a9af-7afea96c3d61', NULL, NULL, NULL),
('7bff3e54-c1d5-45ec-8d6d-d981baf3b6a2', NULL, NULL, NULL),
('a45836e6-73ba-11ec-b1f4-8e73979b4484', 21, 'Female', 'Jawa Tengah, Indonesia'),
('ce256f9f-e723-491f-9430-3f462f895d25', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_unit` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transactions`
--

INSERT INTO `detail_transactions` (`id`, `product_id`, `quantity`, `price_per_unit`, `total_price`) VALUES
('1eb35744-198d-4d4c-9be4-4c82825b2049', 10, 10, 12000, 120000),
('51ff7cc6-2da1-4346-8c81-a4bdf6b048c7', 3, 12, NULL, 123000),
('51ff7cc6-2da1-4346-8c81-a4bdf6b048c7', 4, 1, 50000, 50000),
('7b7bb420-b0bf-45c5-a9af-7afea96c3d61', 3, 1, 120000, 120000),
('7b7bb420-b0bf-45c5-a9af-7afea96c3d61', 7, 10, 22000, 220000),
('7bff3e54-c1d5-45ec-8d6d-d981baf3b6a2', 11, 5, 64000, 320000),
('a45836e6-73ba-11ec-b1f4-8e73979b4484', 6, 5, 5000, 25000),
('a45836e6-73ba-11ec-b1f4-8e73979b4484', 13, 1, 5000, 4000),
('ce256f9f-e723-491f-9430-3f462f895d25', 10, 10, 1000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_transactions`
--

CREATE TABLE `header_transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT uuid(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_transactions`
--

INSERT INTO `header_transactions` (`id`, `user_id`, `customer_name`, `transaction_date`) VALUES
('1eb35744-198d-4d4c-9be4-4c82825b2049', 1, 'Dolfy Shitler', '2022-01-05 10:00:00'),
('51ff7cc6-2da1-4346-8c81-a4bdf6b048c7', 1, 'Heinrich Himmler', '2022-01-04 10:00:00'),
('7b7bb420-b0bf-45c5-a9af-7afea96c3d61', 1, 'C', '2022-01-08 10:00:00'),
('7bff3e54-c1d5-45ec-8d6d-d981baf3b6a2', 1, 'B', '2022-01-07 10:00:00'),
('a45836e6-73ba-11ec-b1f4-8e73979b4484', 1, 'Adella', '2022-01-12 22:15:54'),
('ce256f9f-e723-491f-9430-3f462f895d25', 1, 'A', '2022-01-06 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_07_070721_create_products_table', 1),
(6, '2021_12_07_070908_create_categories_table', 1),
(7, '2021_12_07_070946_create_product_categories_table', 1),
(8, '2022_01_07_081919_new_stocks', 1),
(9, '2022_01_07_082915_header_transactions', 1),
(10, '2022_01_07_082933_detail_transactions', 1),
(11, '2022_01_07_083700_customer_informations', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_stocks`
--

CREATE TABLE `new_stocks` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT uuid(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_per_unit` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_stocks`
--

INSERT INTO `new_stocks` (`id`, `user_id`, `product_id`, `price_per_unit`, `quantity`, `total_price`, `transaction_date`) VALUES
('4408331b-73ba-11ec-b1f4-8e73979b4484', 1, 13, NULL, 5, 74000, '2022-01-12 22:13:12'),
('750c0e8e-7282-11ec-b1f4-8e73979b4484', 1, 7, 2000, 10, NULL, '2022-01-11 09:01:23'),
('b46a4167-71e9-11ec-b1f4-8e73979b4484', 1, 1, 5000, 12, 60000, '2020-01-01 10:00:00'),
('b46a79d0-71e9-11ec-b1f4-8e73979b4484', 1, 1, NULL, 3, 13000, '2020-01-01 12:00:00'),
('b46aade7-71e9-11ec-b1f4-8e73979b4484', 1, 7, NULL, 12, 30000, '2020-01-01 15:00:00'),
('b46ae1cd-71e9-11ec-b1f4-8e73979b4484', 1, 8, 1000, 1, 1000, '2020-01-02 10:00:00'),
('b46b40f1-71e9-11ec-b1f4-8e73979b4484', 1, 10, 2500, 1, 2500, '2021-01-01 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `stock`, `deleted_at`) VALUES
(1, 'Almond Nut', 'http://localhost:8000/storage/product_image/almond_nut.PNG', 'One bite of this crunchy nut and it\'s easy to see why almonds are the world\'s best friend.', 5, NULL),
(2, 'Bamboo', 'http://localhost:8000/storage/product_image/bamboo.PNG', 'Bamboo is the basic building block for castaway construction. It\'s strong, versatile, and goes well with the whole island milleu.', 9, NULL),
(3, 'Banana', 'http://localhost:8000/storage/product_image/banana.PNG', 'The common, everyday banana exudes dietary complexity. Although difficult for some people to swallow, the banana nontheless contains just the right amount of fun and health to highlight any breakfast or snack time.', 7, NULL),
(4, 'Cheese', 'http://localhost:8000/storage/product_image/cheese.PNG', 'Fromarket All Purpose Cheese Product contains just the right amount of calcium and highly cultured cheese fungus to relax your mind and your spirit. Tastes not unlike cheese.', 2, NULL),
(5, 'Cherry', 'http://localhost:8000/storage/product_image/cherry.PNG', 'This slightly suggestive, impossibly rich morsel of fruit flesh has been carefully suppurated with omega rays to guarantee maximum sensuality.', 6, NULL),
(6, 'Corn', 'http://localhost:8000/storage/product_image/corn.PNG', 'Any way you shuck it, this grain is aMAIZEing.', 6, NULL),
(7, 'Egg', 'http://localhost:8000/storage/product_image/egg.PNG', 'Fresh Hill Farms genetically modifies its eggs to minimize bio-nuclear impurities and to maximize healthy goodness.', 12, NULL),
(8, 'Fauxlestra', 'http://localhost:8000/storage/product_image/fauxlestra.PNG', 'Derived from recycled tractor tires, Fauxlestra brand fat free oil is great for making you sick. It\'s not even healthy. It\'s repulsive.', 5, NULL),
(9, 'Milk', 'http://localhost:8000/storage/product_image/milk.PNG', 'Fresh Hill Farms organic milk is as healthy as it is delicious.', 9, NULL),
(10, 'Rope', 'http://localhost:8000/storage/product_image/rope.PNG', 'When you reach the end of your rope, tie it off and weave a new one.', 9, NULL),
(11, 'Tomato', 'http://localhost:8000/storage/product_image/tomato.PNG', 'Tomatoes. People either love them or hate them, but one thing is for sure: They are fun to throw and they provide just the right amount of zest to your favorite dinner dish.', 4, NULL),
(12, 'White Flour', 'http://localhost:8000/storage/product_image/white_flour.PNG', 'Hand grown by industrial grade steel pistons, King Cookie All-Purpose Flour is an essential part of any sensible kitchen.', 7, NULL),
(13, 'Beef', 'http://localhost:8000/storage/product_image/Beef.PNG', 'Fresh Hills Farms feeds high quality corn and flax seed oil to its cattle in order to give its meat a silky, shiny coat. Greasy, but good.', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(1, 2),
(2, 6),
(3, 3),
(4, 1),
(5, 3),
(6, 2),
(6, 3),
(7, 1),
(8, 6),
(9, 1),
(10, 5),
(11, 2),
(11, 3),
(12, 9),
(13, 6),
(13, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`) VALUES
(1, 'Jokowo', 'Jokowo & Mug Jaman Old', '0123 4567 8901', 'jokowo@mail.com', NULL, '$2y$10$z0dCB3C8SIJsahEK1dkB1uy9vlZkLKerY4MvkcSzLfr49wfAFqD5C', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_informations`
--
ALTER TABLE `customer_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`id`,`product_id`),
  ADD KEY `detail_transactions_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `header_transactions`
--
ALTER TABLE `header_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `header_transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_stocks`
--
ALTER TABLE `new_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_stocks_user_id_foreign` (`user_id`),
  ADD KEY `new_stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_informations`
--
ALTER TABLE `customer_informations`
  ADD CONSTRAINT `customer_informations_id_foreign` FOREIGN KEY (`id`) REFERENCES `header_transactions` (`id`);

--
-- Constraints for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `detail_transactions_id_foreign` FOREIGN KEY (`id`) REFERENCES `header_transactions` (`id`),
  ADD CONSTRAINT `detail_transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `header_transactions`
--
ALTER TABLE `header_transactions`
  ADD CONSTRAINT `header_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `new_stocks`
--
ALTER TABLE `new_stocks`
  ADD CONSTRAINT `new_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `new_stocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
