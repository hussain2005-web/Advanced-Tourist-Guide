-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 07:07 PM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `p_id` int(50) NOT NULL,
  `booking_date` datetime NOT NULL,
  `arrival_date` date NOT NULL,
  `num_guests` int(100) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('confirmed','cancelled') DEFAULT 'confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `p_id`, `booking_date`, `arrival_date`, `num_guests`, `total_price`, `status`) VALUES
(1, 4, 14, '2024-04-10 18:59:50', '2024-04-25', 3, 35527.05, 'cancelled'),
(2, 1, 3, '2024-04-10 19:05:28', '2024-04-30', 3, 38745.00, 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(50) NOT NULL,
  `login_email` varchar(500) NOT NULL,
  `login_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_email`, `login_password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `p_id` int(50) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_description` varchar(500) NOT NULL,
  `p_places` varchar(500) NOT NULL,
  `p_hotel` varchar(500) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_discount` int(10) NOT NULL,
  `p_rating` decimal(2,1) NOT NULL DEFAULT 0.0,
  `p_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`p_id`, `p_name`, `p_description`, `p_places`, `p_hotel`, `p_price`, `p_discount`, `p_rating`, `p_image`) VALUES
(1, 'Andaman tour', 'Delight in the summers at Port Blair with scattered rains. Indulge in adventurous activities like snorkelling and scuba diving. Experience clear blue skies with pleasantly cool weather in Havelock. Enjoy sightseeing and water sports at the pristine beaches.', 'Elephant beach , Radhanagar beach.', 'TSG AURA.', 27574, 37, 3.0, 'img-1.jpg'),
(2, 'Dreamy Kashmir Tour', 'Discover the magic of Kashmir on this vacation. Admire the Dal Lake in Srinagar, explore the beautiful valleys of Gulmarg and enjoy white water rafting in Pahalgam.', 'Gulmarg, Pahalgam, Aru and Betab valley.', 'HOTEL RIVIERA By Mountview.', 27026, 36, 4.5, 'img-2.jpg'),
(3, 'Classic Rajasthan Tour', 'Relax in the pleasant weather of Jaipur with sunny days. Feel the nip in the air during the evenings and indulge in a unique experience at the Kite Festival. Get great discounts on stays during summer with pleasantly warm days and cool nights. Indulge in a desert safari and enjoy camel rides in Jodhpur.', 'Jaipur, Jaisalmer, Jodhpur, Udaypur.', 'Hotel Silver Pride.', 20500, 37, 3.5, 'img-3.jpg'),
(4, 'Vietnam Delights', 'Vietnam from North to South with a beach holiday. On this sensational tour from North to South, you will experience some of Vietnam\'s absolute highlights.', 'Hanoi , Danang ,Ho chi Minh City,Ba Na Hills.', 'Diamond Legend', 102166, 40, 4.5, 'img-4.jpg'),
(5, 'Dazzling Malaysia and Singapore Trip', 'Marvel at the beautiful skyscrapers of Malaysia and Singapore on this weeklong vacation! Visit the glorious Petronas Towers in Kuala Lumpur, admire the Cloud Forest in Singapore and go on a thrilling cable car ride at Sentosa Island.', 'Kuala lumpur, Singapur', 'Citin Hotel', 114232, 41, 4.0, 'img-5.jpg'),
(6, 'Serene Bali', 'Experience a memorable vacation in the mystical land of Bali. Head to the famous Nusa Penida Island and marvel at the magnificent views. Get an extra dose of thrill as you enjoy water sports at Tanjung Benoa Beach.', 'Ulun Danu Temple, Handara Gate, Twin Lakes, Banyumala Waterfall and Wanagiri Hidden Hills.', 'Adi Dharma Hotel Kuta.', 112389, 36, 4.0, 'img-6.jpg'),
(7, 'Spectacular Dubai and Abu Dhabi', 'Unwind with your loved ones amidst the shimmering skyscrapers and islands of Dubai. Experience the thrill of amusement parks and grandeur in Abu Dhabi.', 'Abu Dhabi, Dubai.', 'Holiday Inn ABU DHABI, Raviz Center Point Hotel.', 115389, 40, 5.0, 'img-7.jpg'),
(8, 'Trip to Kerala', 'Experience the wonders of God\'s own country! Learn more about tea-making in Munnar and delve into history at the Hill Palace Museum in . Meet elephants at Periyar National Park and relax on the serene Alappuzha Beach.', ' Cochin, Munnar, Thekkady,  Alleppey.', 'Diana Heights, The Fog Munnar Resort & Spa, The Mountain Courtyard Thekkady, Uday Backwater Resort.', 20145, 35, 4.0, 'img-8.jpg'),
(9, 'Thailand on a Budget!', 'Discover the bright city life of Thailand on this short trip. Witness the fun pub-hopping scenes on the magical beaches of Pattaya and immerse yourself in the rich culture of Bangkok.', 'Coral Island, Tiger Park Pattaya, Bangkok City.', 'Journeyhub Pattaya Central, Oakwood Hotel & Residence.', 88254, 36, 4.0, 'img-9.jpg'),
(10, 'Thar Desert', 'Experience The Rugged Beauty Of The Thar Desert With Our Guided Tours. Camel Safaris, Dune Bashing, And Cultural Immersion Await...', 'Jaisalmer, Sam Sand Dunes.', 'Le Royal Camps.', 18121, 35, 3.0, 'img-10.jpg'),
(11, 'Maldives', 'Experience Paradise On Earth With Maldives Tour - Pristine Beaches,  Crystal Clear Waters, Coral Reefs, Water Sports, And Luxurious Resorts...', 'Vaadhoo Island.', 'Coco Bodu Hithi.', 139953, 42, 4.0, 'img-11.jpg'),
(14, 'Goan Escape', 'Rejoice in the cool nights and occasional rains during summers in Goa. Explore secluded beaches and visit architectural gems.', 'Cafe Mambo\'s, Calangute Beach.', 'Hotel Regent Laguna', 18219, 35, 4.0, 'img-12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(50) NOT NULL,
  `booking_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `payment_date` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `user_id`, `payment_date`, `amount`, `payment_method`) VALUES
(1, 1, 4, '2024-04-10 00:00:00', 35527.05, 'Credit Card'),
(2, 2, 1, '2024-04-10 00:00:00', 38745.00, 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Tauqir Shaikh', 'TauqirShaikh1012@gmail.com', '7738710455', 'Tauqir$0546'),
(2, 'Bilal', 'bilal@gmail.com', '7900194522', 'Bilal$123'),
(3, 'khalid', 'khalid@gmail.com', '9323358140', 'Khalid$123'),
(4, 'zaid shaikh', 'zaid22@gmail.com', '9967721145', 'Zaidshaikh$22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `p_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `package` (`p_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
