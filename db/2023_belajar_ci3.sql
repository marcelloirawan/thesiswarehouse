-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 03:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2023_belajar_ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_product`, `id_customer`, `id_users`, `qty`, `remark`, `created_at`, `updated_at`) VALUES
(4, 6, 1, 1, 10, '-', '2023-10-17 20:37:53', '2023-10-17 20:37:53'),
(5, 7, 2, 1, 10, '-', '2023-10-17 20:37:59', '2023-10-17 20:37:59'),
(7, 6, 1, 1, 10, '-', '2023-10-18 13:33:22', '2023-10-18 13:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_product`, `id_supplier`, `id_users`, `qty`, `remark`, `created_at`, `updated_at`) VALUES
(8, 6, 2, 1, 100, '-', '2023-10-17 20:37:18', '2023-10-17 20:37:18'),
(9, 7, 3, 1, 250, '-', '2023-10-17 20:37:25', '2023-10-17 20:37:25'),
(11, 8, 3, 1, 250, '-', '2023-10-18 13:11:25', '2023-10-18 13:11:25'),
(12, 8, 3, 1, 250, '-', '2023-09-18 13:11:25', '2023-09-18 13:11:25'),
(13, 6, 2, 1, 100, '-', '2023-10-21 16:17:42', '2023-10-21 16:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(130) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', 'catatan category 1', '2023-10-12 12:32:06', '2023-10-12 12:32:06'),
(2, 'Category 2 Upd', 'Update', '2023-10-15 08:14:19', '2023-10-17 18:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(130) NOT NULL,
  `pic` varchar(130) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(130) NOT NULL,
  `address` varchar(255) NOT NULL,
  `npwp` varchar(130) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `pic`, `phone`, `email`, `address`, `npwp`, `created_at`, `updated_at`) VALUES
(1, 'Nama Customer 1', 'Cus 1', '089789003', 'cus1@mail.com', 'Bekasi', '9182-291-212', '2023-10-12 12:17:01', '2023-10-12 12:17:01'),
(2, 'Nama Customer 2', 'Cus 2', '089790', 'cus2@mail.com', 'Cikarang', '9182-291-212-345345', '2023-10-12 12:17:33', '2023-10-12 14:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `barcode` varchar(130) NOT NULL,
  `image` varchar(130) NOT NULL,
  `product` varchar(130) NOT NULL,
  `stock` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `barcode`, `image`, `product`, `stock`, `uom`, `remark`, `created_at`, `updated_at`) VALUES
(6, 1, '112233', 'bucket5.jpg', 'Product 1 Update', 180, 'pcs', '-', '2023-10-16 02:15:13', '2023-10-21 16:17:42'),
(7, 1, '112234', 'bucket6.jpg', 'Lorem Ipsum', 240, 'box', '-', '2023-10-16 02:15:59', '2023-10-17 20:37:59'),
(8, 2, '112235', 'bucket8.jpg', 'Nama Product Tes up', 250, 'box', '-', '2023-10-18 13:09:39', '2023-10-21 15:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `request_material`
--

CREATE TABLE `request_material` (
  `id_request_material` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_material`
--

INSERT INTO `request_material` (`id_request_material`, `id_product`, `id_supplier`, `id_users`, `qty`, `remark`, `created_at`, `updated_at`) VALUES
(2, 6, 3, 1, 100, 'stok awal', '2023-10-19 13:59:55', '2023-10-19 13:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `role` varchar(130) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-10-10 14:34:18', '2023-10-10 14:34:18'),
(2, 'Staff', '2023-10-10 14:34:18', '2023-10-10 14:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `supplier` varchar(130) NOT NULL,
  `pic` varchar(130) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(130) NOT NULL,
  `address` varchar(255) NOT NULL,
  `npwp` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `supplier`, `pic`, `phone`, `email`, `address`, `npwp`, `created_at`, `updated_at`) VALUES
(2, 'Supplier 1 ASDASDA', 'Sup PIC', '0898798', 'sup@mail.com', 'Jakarta', '9890-979-76876', '2023-10-12 14:11:15', '2023-10-12 14:31:25'),
(3, 'Supplier 2 Update', 'Sup 2 Update', '089709889879', 'supasd2@mail.com', 'Jakarta Update', '2313', '2023-10-12 14:15:10', '2023-10-12 14:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `email` varchar(130) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(130) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `id_roles`, `name`, `email`, `password`, `phone`, `image`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Muhammad Faruq Update', 'faruq@mail.com', '$2y$10$5aUln/MQjjuNYnnJwsZhYeRx.MfE9UzR1hKGA6RXuyzqi8/F4PkYS', '', 'default.svg', '', 1, '2023-09-21 17:20:12', '2023-10-18 13:26:51'),
(4, 2, 'Staff', 'staff@mail.com', '$2y$10$69nKZWhQ1vHIKtNOxviFtOGsJXcnkwMfDwEiIHiyLwAdfB85dPsjO', '', 'default.svg', '', 1, '2023-10-18 13:05:35', '2023-10-18 13:05:58'),
(5, 1, 'Administrator Default', 'admin@mail.com', '$2y$10$WiagDUoGgl9cr7rkWAULG.WQlIg1HedHhNurOqU8V3fmSPaPNTqZO', '', 'default.svg', '', 1, '2023-10-21 15:48:28', '2023-10-21 15:48:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `request_material`
--
ALTER TABLE `request_material`
  ADD PRIMARY KEY (`id_request_material`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_material`
--
ALTER TABLE `request_material`
  MODIFY `id_request_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
