-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2024 at 10:50 AM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amzpnvbe_sereneYachts`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `boat` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `guests` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `boat`, `check_in`, `time_from`, `time_to`, `guests`) VALUES
(5, '1 | Sleek', '2024-08-01', '08:30:00', '18:30:00', 5),
(0, 'Sleek', '2024-08-15', '01:00:00', '01:30:00', 1),
(0, 'Sleek', '2024-08-14', '00:00:00', '00:00:00', 1),
(0, 'Marya', '2024-08-06', '02:00:00', '04:00:00', 1),
(0, 'Marya', '2024-08-06', '02:00:00', '04:00:00', 1),
(0, 'Marya', '2024-08-06', '02:00:00', '04:00:00', 1),
(0, 'Marya', '2024-08-16', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yachtimages`
--

CREATE TABLE `yachtimages` (
  `id` int(11) NOT NULL,
  `yacht_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yachtimages`
--

INSERT INTO `yachtimages` (`id`, `yacht_id`, `image_path`) VALUES
(1, 1, 'sleek-img1.jpeg'),
(2, 1, 'sleek-img2.jpeg'),
(3, 1, 'sleek-img3.jpeg'),
(4, 1, 'sleek-img4.jpeg'),
(5, 1, 'sleek-img5.jpeg'),
(6, 1, 'sleek-img6.jpeg'),
(7, 1, 'sleek-img7.jpeg'),
(8, 1, 'sleek-img8.jpeg'),
(9, 1, 'sleek-img9.jpeg'),
(10, 3, 'marya-img1.jpg'),
(11, 3, 'marya-img2.jpg'),
(12, 3, 'marya-img3.jpg'),
(13, 3, 'marya-img4.jpg'),
(14, 3, 'marya-img5.jpg'),
(15, 3, 'marya-img6.jpg'),
(16, 3, 'marya-img7.jpg'),
(17, 3, 'marya-img8.jpg'),
(18, 3, 'marya-img9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `yachts`
--

CREATE TABLE `yachts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `length` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `cabins` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `inclusions` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_points` text NOT NULL,
  `detailed_text` text NOT NULL,
  `price_per_hour` decimal(10,2) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `bg_img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yachts`
--

INSERT INTO `yachts` (`id`, `name`, `length`, `capacity`, `cabins`, `location`, `inclusions`, `description`, `description_points`, `detailed_text`, `price_per_hour`, `image_path`, `bg_img_path`) VALUES
(1, 'Sleek', '33 ft', 10, 1, 'Dubai Marina', 'Water, Soft drinks, Ice', 'With beautifully designed interiors comprising four spacious cabins, My Serenity is the best choice if you are planning to rent a yacht in Dubai for a party at a cheap price.', 'Fresh fruits, soft beverages, still and sparkling water, Nespresso coffee.|Bathroom facilities, cleaning and hygienic toiletries.|Fuel and Berthing at Bulgari.', '', 350.00, 'assets/images/sleek/sleek.jpeg', 'assets/images/sleek/sleek-bg.jpeg'),
(3, 'Marya', '50 ft', 15, 3, 'Dubai Harbour', 'Water, Soft drinks, Ice', 'With beautifully designed interiors comprising four spacious cabins, My Serenity is the best choice if you are planning to rent a yacht in Dubai for a party at a cheap price.', 'Watersport capabilities - jet ski, seabob and donut.|High-speed internet access.|PlayStation.', 'The 2017 Sunseeker 70ft yacht is a luxurious motor yacht, offering ample space and                                             comfort for owners and guests. The yacht is approximately 70 feet in length and                                             boasts a distinctive and modern exterior design, as well as a luxurious and                                             functional interior.: The full-beam master suite is located at the aft of the yacht and includes a large                                             bed, ample storage space, and an en-suite bathroom. VIP staterooms and additional                                             guest cabins also have en-suite bathrooms, ensuring comfort for all guests. The                                             yacht\'s exterior deck spaces are perfect for both relaxation and entertainment, with                                             a large aft flybridge, a forward sunpad and lounge area, and dining and seating                                             areas.: The yacht\'s fully equipped galley features modern appliances and ample counter                                             space, making meal preparation a breeze. With air conditioning throughout and                                             aaccess to tender, water toys, and audio and visual systems. It is powered by twin                                             diesel engines, providing smooth and efficient performance, and has state-of-the-art                                             navigation and safety systems for peace of mind while out at sea.: In conclusion, the 2017 Sunseeker 70ft yacht is a standout in the world of yachting,                                             offering spacious living spaces, luxurious features, and impressive performance.                                             Whether you\'re looking for a relaxing retreat or an adventure-filled getaway, this                                             yacht is the perfect choice. ', 700.00, 'assets/images/marya/marya.jpg', 'assets/images/marya/marya-bg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yachtimages`
--
ALTER TABLE `yachtimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yacht_id` (`yacht_id`);

--
-- Indexes for table `yachts`
--
ALTER TABLE `yachts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `yachtimages`
--
ALTER TABLE `yachtimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `yachts`
--
ALTER TABLE `yachts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `yachtimages`
--
ALTER TABLE `yachtimages`
  ADD CONSTRAINT `yachtimages_ibfk_1` FOREIGN KEY (`yacht_id`) REFERENCES `yachts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
