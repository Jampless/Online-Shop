-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 02:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(2, 'admin', 'admin', 'admin01', 'admin01@gmail.com', '18c6d818ae35a3e8279b5330eda01498');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `status`, `amount_paid`) VALUES
(15, 'Jake Longares', 'jake@gmail.com', '09999999', 'Hindi Makita St. Nagtatago Village, Swert City', 'COD', 'Telescope Stand(4), Perfect Skin Detox(3), Ryx Panty Liners(3)', '', '1490');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_qty`, `product_price`, `product_image`, `product_code`) VALUES
(1, 'Clip Fan', 43, '90', 'image/1.jpg', 'p01'),
(2, 'Telescope Stand', 10, '50', 'image/2.jpg', 'p02'),
(3, 'Kojic Soap', 23, '120', 'image/3.jpg', 'p03'),
(4, 'Perfect Skin Detox', 60, '180', 'image/4.jpg', 'p04'),
(5, 'Perfect Brow', 26, '250', 'image/5.jpg', 'p05'),
(6, 'Ryx Panty Liners', 0, '250', 'image/6.jpg', 'p06'),
(7, 'Vitamin E Cream', 0, '120', 'image/7.jpg', 'p07'),
(8, 'Dr. Alvin Scrap Soap', 0, '100', 'image/8.jpg', 'p08'),
(9, 'Downy Fabcon 1 litter', 0, '150', 'image/9.jpg', 'p09'),
(10, 'Frontrow Soap', 0, '250', 'image/10.jpg', 'p10'),
(11, 'Joy Dishwashing Liquid', 0, '150', 'image/11.jpg', 'p11'),
(12, 'Body Bag', 0, '100', 'image/12.jpg', 'p12'),
(13, 'Mens Bag', 0, '150', 'image/13.jpg', 'p13'),
(14, 'Pinky Secret', 0, '120', 'image/14.jpg', 'p14'),
(15, 'Rechargeable Fan W/Light', 0, '110', 'image/15.jpg', 'p15'),
(16, 'Goree Day & Night Cream', 0, '250', 'image/16.jpg', 'p16'),
(17, 'Skin Perfect Rejuvenating', 0, '250', 'image/17.jpg', 'p17'),
(18, 'Brilliant Rejuvenating Set', 0, '320', 'image/18.jpg', 'p18'),
(19, 'Skin Magical Rejuvenating Set', 0, '320', 'image/19.jpg', 'p19'),
(20, 'Bag Dual Purpose ,Sling/Bag pack', 0, '120', 'image/20.jpg', 'p20'),
(21, 'Fruit/Flower Headband for Kids', 0, '50', 'image/21.jpg', 'p21'),
(22, 'Korean Fashion Pearl Headband', 0, '35', 'image/22.jpg', 'p22'),
(23, 'Creations Spa Essentials Pain Relief Rub 50g', 0, '100', 'image/23.jpg', 'p23'),
(37, 'Cake', 30, '120', 'image/03.jpg', 'p77');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `pname` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `pname`, `image`, `price`) VALUES
(1, 'Clip Fan', '1.jpg', 90.00),
(2, 'Telescopec Stand', '2.jpg', 50.00),
(3, 'Kojic Soap', '3.jpg', 120.00),
(4, 'Perfect Skin Detox', '4.jpg', 180.00),
(7, 'Vitamin E Cream', '7.jpg', 120.00),
(8, 'Dr. Alvin Scrap Soap', '8.jpg', 100.00),
(9, 'Downy Fabcon 1 litter', '9.jpg', 150.00),
(10, 'Frontrow Soap (1, 2, 3)', '10.jpg', 250.00),
(12, 'Body Bag', '12.jpg', 100.00),
(13, 'Mens Bag', '13.jpg', 150.00),
(14, 'Pinky Secret', '14.jpg', 120.00),
(15, 'Rechargeable Fan W/Light', '15.jpg', 110.00),
(16, 'Goree Day & Night Cream', '16.jpg', 250.00),
(17, 'Skin Perfect Rejuvenating', '17.jpg', 250.00),
(18, 'Brilliant Rejuvenating Set', '18.jpg', 320.00),
(19, 'Skin Magical Rejuvenating Set', '19.jpg', 320.00),
(20, 'Bag Dual Purpose ,Sling/Bag pack', '20.jpg', 120.00),
(21, 'Fruit/Flower Headband for Kids', '21.jpg', 50.00),
(22, 'Korean Fashion Pearl Headband', '22.jpg', 35.00),
(23, 'Creations Spa Essentials Pain Relief Rub 50g', '23.jpg', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(9, 'jake', 'jake', 'jake', 'jake@gmail.com', '1200cf8ad328a60559cf5e7c5f46ee6d'),
(10, 'marc', 'marc', 'marc', 'marc@gmail.com', '97e1e59c0375e0f55c10d4314db20466'),
(11, 'karen', 'corona', 'karen', 'karen@gmail.com', 'ba952731f97fb058035aa399b1cb3d5c'),
(12, 'jean', 'belarma', 'jean', 'jean@gmail.com', 'b71985397688d6f1820685dde534981b'),
(13, 'Longares', 'yuguigx', 'jampless', 'longaresjake192@gmail.com', '4297f44b13955235245b2497399d7a93'),
(15, 'Jake', 'Longares', 'jake19', 'Jake19@gmail.com', '4297f44b13955235245b2497399d7a93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
