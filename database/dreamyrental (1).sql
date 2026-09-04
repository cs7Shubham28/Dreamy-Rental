-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 05:37 PM
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
-- Database: `dreamyrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutcontent`
--

CREATE TABLE `aboutcontent` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content1` varchar(1000) NOT NULL,
  `content2` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutcontent`
--

INSERT INTO `aboutcontent` (`id`, `title`, `content1`, `content2`) VALUES
(1, 'Welcome to Dreamy rental', 'At Dreamy Rental, we are dedicated to helping you find your perfect rental home with ease and confidence. Our platform connects renters with a wide variety of properties, offering something for every lifestyle and budget. From cozy apartments to spacious houses  and shops, we make the search simple with user-friendly tools and verified listings.', 'Our team works closely with property owners to ensure a seamless rental process. We’re committed to delivering a trustworthy experience, where both renters and landlords feel supported every step of the way.');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `email`, `password`, `cpassword`, `contact`, `gender`, `photo`, `dob`) VALUES
(1, 'admin', 'admin123@gmail.com', 'admin123', 'admin123', '9876543210', 'male', 'profile for youtube.jpg', '2002-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `contact`, `message`) VALUES
(1, 'sudha karki', 'sudha@gmail.com', '9876543210', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `bimage` varchar(100) NOT NULL,
  `rating` tinyint(10) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `bimage`, `rating`, `profile`) VALUES
(1, 'Swochhanda karanjeet', 'best website', 'hall-img-3.webp', 5, 'pic-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pprice` varchar(100) NOT NULL,
  `depositeamt` varchar(100) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `offertype` varchar(100) NOT NULL,
  `propertytype` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `furnishedstatus` varchar(100) NOT NULL,
  `BHK` varchar(300) NOT NULL,
  `bedroom` varchar(100) NOT NULL,
  `bathroom` varchar(100) NOT NULL,
  `balcony` varchar(100) NOT NULL,
  `kitchen` varchar(50) NOT NULL,
  `hall` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `totalfloor` varchar(100) NOT NULL,
  `floorroom` varchar(100) NOT NULL,
  `loan` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `extra` varchar(100) NOT NULL,
  `booking` varchar(100) NOT NULL,
  `bookingdate` varchar(100) NOT NULL,
  `isread` tinyint(20) NOT NULL,
  `cancel` tinyint(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `img1` varchar(400) NOT NULL,
  `img2` varchar(400) NOT NULL,
  `img3` varchar(400) NOT NULL,
  `img4` varchar(400) NOT NULL,
  `img5` varchar(400) NOT NULL,
  `Bdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `pname`, `pprice`, `depositeamt`, `paddress`, `offertype`, `propertytype`, `status`, `furnishedstatus`, `BHK`, `bedroom`, `bathroom`, `balcony`, `kitchen`, `hall`, `area`, `age`, `totalfloor`, `floorroom`, `loan`, `description`, `extra`, `booking`, `bookingdate`, `isread`, `cancel`, `user_email`, `img1`, `img2`, `img3`, `img4`, `img5`, `Bdate`) VALUES
(1, 'Shankharapur top villa', '10000', '2000', 'Shankharapur, kathmandu', 'sale', 'house', 'ready to move', 'furnished', '2', '4', '2', '2', '1', '1', '2500', '2y', '4', '2', 'not available', 'Best affortable home', 'play_ground,garden,water_supply,power_backup,parking_area', '1', '2024-11-05 08:55:19', 0, 1, 'sudha@gmail.com', 'property-1.jpg', 'property-1.jpg', 'bathroom-img-3.webp', 'hall-img-2.webp', 'kitchen-img-6.webp', '2024-11-03'),
(2, 'Valley Top villa', '4000', '400', 'Gokarna, Kathmandu', 'rent', 'house', 'ready to move', 'furnished', '1', '2', '1', '1', '1', '0', '1430', '10', '2', '2', 'not available', 'affortable room rent', 'play_ground,garden,water_supply,power_backup', '1', '2024-11-04 19:14:56', 0, 0, 'swochhanda@gmail.com', 'hall-img-2.webp', 'hall-img-2.webp', 'bathroom-img-1.webp', 'kitchen-img-1.webp', 'hall-img-4.webp', '2024-11-03'),
(3, 'Hamro Ghar', '100000', '10000', 'Nagarkot, Bhaktapur', 'sale', 'house', 'ready to move', 'furnished', '2', '4', '3', '2', '2', '1', '2500', '10', '4', '3', 'not available', 'best home where you can also rent it for other.', 'play_ground,garden,water_supply,power_backup,parking_area,market_area', '1', '2024-11-05 08:57:20', 0, 1, 'sudha@gmail.com', 'property-5.jpg', 'property-5.jpg', 'bathroom-img-4.jpg', 'hall-img-2.webp', 'kitchen-img-1.webp', '2024-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `contact`, `password`, `cpassword`, `gender`, `dob`, `photo`) VALUES
(1, 'Swochhanda', 'swochhanda@gmail.com', '9863422162', '12345', '12345', 'male', '2003-09-12', 'pic-3.png'),
(2, 'Sudha', 'sudha@gmail.com', '6613447', '12345', '12345', 'female', '2002-07-13', 'pic-2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutcontent`
--
ALTER TABLE `aboutcontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
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
-- AUTO_INCREMENT for table `aboutcontent`
--
ALTER TABLE `aboutcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
