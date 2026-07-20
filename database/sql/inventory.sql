-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2026 at 05:38 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` double NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'Haylie Hansen', 'shaley@example.net', '01794468634', '2026-07-20 12:23:51', '2026-07-20 12:23:51'),
(2, 'Mr. Sedrick Leannon', 'roxane.dubuque@example.net', '01749254945', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(3, 'Juston Torp', 'qpfannerstill@example.net', '01758399382', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(4, 'Dr. Dax Hyatt', 'angelita99@example.com', '01793227557', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(5, 'Nathan Kihn Jr.', 'peter.rutherford@example.com', '01704628129', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(6, 'Pat Koepp', 'rodolfo.schaden@example.net', '01779162759', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(7, 'Karli Hoppe', 'tobin62@example.org', '01712511836', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(8, 'Tanner Stracke', 'albina.little@example.com', '01766787537', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(9, 'Samantha Schulist', 'orland17@example.com', '01775990530', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(10, 'Prof. Alejandrin Renner', 'alfreda53@example.net', '01756758861', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(11, 'Prof. Javier Beahan', 'rzemlak@example.net', '01730992783', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(12, 'Ms. Brooke Kirlin V', 'elmer.pagac@example.com', '01792455172', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(13, 'Omari Harris', 'mylene37@example.org', '01730459495', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(14, 'Prof. Fiona Stokes Sr.', 'elinor.fadel@example.net', '01717370856', '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(15, 'Korbin Batz', 'jaime98@example.org', '01772169174', '2026-07-20 12:23:52', '2026-07-20 12:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_19_121641_create_products_table', 1),
(5, '2026_07_19_121816_create_customers_table', 1),
(6, '2026_07_19_133217_create_sales_table', 1),
(7, '2026_07_19_133235_create_sale_items_table', 1),
(8, '2026_07_19_143712_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `sku`, `price`, `quantity`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'corporis quod amet', 'Est architecto omnis nam temporibus natus atque. Tempora quos magni asperiores exercitationem et. Rerum quisquam ut sequi quibusdam aut esse. Eos voluptas non ullam alias id unde qui.', 'SKU-56854PQ', 510.07, 4, 1, '2026-07-20 12:23:52', '2026-07-20 12:25:02'),
(2, 'veritatis accusantium aperiam', 'Alias deserunt sit dolores ratione facere est. Voluptate aliquam voluptas quia non. Sequi qui doloribus ea placeat numquam nam quia debitis. Fuga rerum libero dolores ea.', 'SKU-24215BM', 74.03, 17, 1, '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(3, 'magnam voluptas tenetur', 'Pariatur at consectetur incidunt debitis quis. Sequi dolorum id a maiores. Earum vitae at qui dolor. Repudiandae rerum consequatur ut. Harum in aperiam maxime iusto autem.', 'SKU-51420IE', 932.79, 260, 1, '2026-07-20 12:23:52', '2026-07-20 12:31:52'),
(4, 'et error reiciendis', 'Sint fuga porro officiis voluptas. Qui et sequi ut occaecati explicabo repellendus. Recusandae recusandae laudantium sunt voluptatibus impedit doloremque voluptatem sint. Dolores dolorem voluptas quisquam.', 'SKU-80869TE', 1368.65, 402, 1, '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(5, 'molestias velit sed', 'Facilis molestiae ut possimus hic laborum quos. Et et sint error sint ut maxime et suscipit. Dolores omnis possimus eius necessitatibus architecto. Dolore voluptatibus vel dolorem rerum est veniam. Omnis culpa vel et eos dolorum alias numquam.', 'SKU-45789VL', 1419.52, 256, 1, '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(6, 'ratione iste hic', 'Consequatur adipisci omnis molestiae qui aut minus exercitationem. Et voluptas repudiandae blanditiis impedit alias est quidem. Quia quisquam dolorem atque dolorem et tempore earum. Sed ea et quas aliquam.', 'SKU-78311ZW', 3325.34, 191, 1, '2026-07-20 12:23:52', '2026-07-20 12:33:40'),
(7, 'iste et aut', 'Aut qui natus atque aut. Sit iste sed reprehenderit officia. Autem dolorum mollitia asperiores nostrum recusandae doloribus. Cum et vitae enim eos laborum. Laboriosam illum et qui maiores.', 'SKU-38150AP', 4716.75, 334, 1, '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(8, 'excepturi quis nam', 'Et est qui officiis ducimus id ut dolorem. Rerum dolorum quibusdam iste pariatur odit. Consequatur recusandae id et voluptatem expedita excepturi.', 'SKU-21829HA', 492.96, 358, 1, '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(9, 'inventore minima quas', 'Illum ipsa sit quisquam facilis dicta dicta. Vel amet ut fugiat rem sunt facere fugit ut. Quis quaerat architecto quo sit perspiciatis architecto.', 'SKU-16135PS', 4516.38, 317, 1, '2026-07-20 12:23:52', '2026-07-20 12:23:52'),
(10, 'dolorum hic ipsa', 'Qui nobis consectetur magnam ut libero. Nisi excepturi ipsa quidem voluptatem.', 'SKU-56205US', 2147.15, 33, 1, '2026-07-20 12:23:52', '2026-07-20 12:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `due_amount` decimal(10,2) NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_no`, `customer_id`, `total_amount`, `paid_amount`, `due_amount`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2026-0001', 2, 510.07, 510.07, 0.00, NULL, '2026-07-20 12:25:02', '2026-07-20 12:25:02'),
(2, '2026-0002', 3, 932.79, 932.79, 0.00, NULL, '2026-07-20 12:31:52', '2026-07-20 12:31:52'),
(3, '2026-0003', 3, 3325.34, 3325.34, 0.00, NULL, '2026-07-20 12:33:40', '2026-07-20 12:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `quantity` double NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `product_id`, `sale_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 510.07, '2026-07-20 12:25:02', NULL),
(2, 3, 2, 1, 932.79, '2026-07-20 12:31:52', NULL),
(3, 6, 3, 1, 3325.34, '2026-07-20 12:33:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nWFjSz5095KzkHiPm950bhCHoPwYUG1OkwkWlKLb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ6MVZkTGoyYXRUZHdpRTJ5OVJxQk54MTFYVXR4Qml5WENGMXZFVE41IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2Rhc2hib2FyZCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2Rhc2hib2FyZFwvcHJvbW90aW9uc1wvZW1haWwiLCJyb3V0ZSI6ImRhc2hib2FyZC5lbWFpbC5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1784525854);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$6moQ2nYMGx74lbpan77PveYaAwXNffRCF/gPGlAC/gDfOXdx0vZ4y', 2, NULL, '2026-07-20 12:23:45', '2026-07-20 12:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_mobile_unique` (`mobile`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
