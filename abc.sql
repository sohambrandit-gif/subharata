-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2025 at 07:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `sl_id` int(11) NOT NULL,
  `artist1_name` varchar(255) NOT NULL,
  `artist1_img` varchar(255) NOT NULL,
  `artist2_name` varchar(255) NOT NULL,
  `artist2_img` varchar(255) NOT NULL,
  `artist3_name` varchar(255) NOT NULL,
  `artist3_img` varchar(255) NOT NULL,
  `artist4_name` varchar(255) NOT NULL,
  `artist4_img` varchar(255) NOT NULL,
  `artist5_name` varchar(255) NOT NULL,
  `artist5_img` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`sl_id`, `artist1_name`, `artist1_img`, `artist2_name`, `artist2_img`, `artist3_name`, `artist3_img`, `artist4_name`, `artist4_img`, `artist5_name`, `artist5_img`, `event_id`, `valid`) VALUES
(0, 'Subhabrata', 'artist_250728053941_1.png', 'Lopamudra', 'artist_250728054729_2.png', '', '', '', '', '', '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `sl_id` int(11) NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `boldtext` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_tags` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `valid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`sl_id`, `banner_image`, `boldtext`, `description`, `seo_title`, `seo_description`, `seo_tags`, `timestamp`, `valid`) VALUES
(1, NULL, 'How to Choose the Best Men’s Beauty Salon Near You', '<p>dfsdf</p>', 'How to Choose the Best Men’s Beauty Salon Near You', '', '', '2025-08-05 20:41:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `sl_id` int(11) NOT NULL,
  `memb_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `cgst` int(11) NOT NULL DEFAULT 0,
  `sgst` int(11) NOT NULL DEFAULT 0,
  `igst` int(11) NOT NULL DEFAULT 0,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `sl_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL DEFAULT 0,
  `valid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`sl_id`, `name`, `image`, `position`, `featured`, `valid`) VALUES
(2, 'Audio', NULL, 1, 0, 1),
(3, 'Magazines', NULL, 2, 0, 1),
(4, 'Merchandise ', NULL, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `sl_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_tag` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1,
  `instructor` varchar(255) NOT NULL,
  `instructor_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`sl_id`, `title`, `course_tag`, `duration`, `valid`, `instructor`, `instructor_img`) VALUES
(1, 'Class1', 'voice art', '5 weeks', 1, 'Subhabrata', 'events250805025945.png'),
(2, 'Class 2', 'poetry', '5 weeks', 1, 'Subhabrata', 'classes250805051324.png');

-- --------------------------------------------------------

--
-- Table structure for table `class_access`
--

CREATE TABLE `class_access` (
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_details`
--

CREATE TABLE `class_details` (
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `sl_id` int(11) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1,
  `class_id` int(11) NOT NULL,
  `age` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_details`
--

INSERT INTO `class_details` (`title`, `description`, `duration`, `category`, `language`, `sl_id`, `valid`, `class_id`, `age`) VALUES
('Class Details 1', '', '8 weeks', '', 'Bengali', 1, 1, 1, '8-10'),
('Class 2 details', '', '', '', '', 3, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `class_video`
--

CREATE TABLE `class_video` (
  `sl_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `upload_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valid` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sl_id` int(11) NOT NULL,
  `office1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `office2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tw` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `insta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `footer_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `sl_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `caption` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `referral_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT 0,
  `expire_date` date NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `sl_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `mode` varchar(255) NOT NULL,
  `artist_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`sl_id`, `title`, `image`, `description`, `start_date`, `mode`, `artist_info`, `valid`, `created_at`, `position`) VALUES
(1, 'Event 1', 'events250723105250.avif', 'An \"event sample image description\" should focus on clearly and concisely conveying the visual elements of an image related to an event.', '2025-08-24', 'Offline', '', 1, '2025-07-28 16:02:07', 1),
(2, 'Event 2', 'events250728105827.avif', '<p>Very Good Event</p>', '2025-08-10', 'Offline', '', 1, '2025-07-28 08:59:11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `event_location`
--

CREATE TABLE `event_location` (
  `sl_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `total_seat` int(11) DEFAULT NULL,
  `booked` int(11) DEFAULT 0,
  `location` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `addressiframe` text NOT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `language` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type1` varchar(50) DEFAULT NULL,
  `seat1` int(11) DEFAULT NULL,
  `booked1` int(11) DEFAULT 0,
  `type2` varchar(50) DEFAULT NULL,
  `seat2` int(11) DEFAULT NULL,
  `booked2` int(11) DEFAULT 0,
  `type3` varchar(50) DEFAULT NULL,
  `seat3` int(11) DEFAULT NULL,
  `booked3` int(11) DEFAULT 0,
  `type4` varchar(50) DEFAULT NULL,
  `seat4` int(11) DEFAULT NULL,
  `booked4` int(11) DEFAULT 0,
  `type5` varchar(50) DEFAULT NULL,
  `seat5` int(11) DEFAULT NULL,
  `booked5` int(11) DEFAULT 0,
  `lastbooking_date` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `time` varchar(255) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1,
  `price1` int(11) NOT NULL,
  `price2` int(11) NOT NULL,
  `price3` int(11) NOT NULL,
  `price4` int(11) NOT NULL,
  `price5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_location`
--

INSERT INTO `event_location` (`sl_id`, `event_id`, `date`, `total_seat`, `booked`, `location`, `address`, `addressiframe`, `pin`, `contact_no`, `language`, `category`, `type1`, `seat1`, `booked1`, `type2`, `seat2`, `booked2`, `type3`, `seat3`, `booked3`, `type4`, `seat4`, `booked4`, `type5`, `seat5`, `booked5`, `lastbooking_date`, `image`, `description`, `time`, `valid`, `price1`, `price2`, `price3`, `price4`, `price5`) VALUES
(3, 1, '2025-07-31', 500, 0, 'Bhowani', '50/5e, Harish Mukherjee Rd, Bhowanipore, Kolkata, West Bengal 700025', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117925.08523751747!2d88.19970464335935!3d22.5357191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8501aade659bc4e7%3A0x7549c9efa412bccb!2sBrandIT%20Consultancy!5e0!3m2!1sen!2sin!4v1753275866530!5m2!1sen!2sin\"width=\"600\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '711102', '9874563211', 'Bengali', 'Voice Art', 'VIP', 20, 0, 'DIAMOND', 50, 0, 'GOLD', 150, 0, 'SILVER', 200, 0, 'BALCONY', 5, 0, '0000-00-00', 'event_250728055626.jpg', '<p>Join this masterclass to explore the pathways to a thriving career in education. From classroom management to leveraging technology for effective teaching, this event covers the essentials for aspiring and current educators. Learn from experienced professionals and gain practical insights to enhance your teaching strategies.</p>', '5:30pm-8:30pm', 1, 250, 200, 150, 100, 50);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `sl_id` int(11) NOT NULL,
  `ques` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ans` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `sl_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` int(11) DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `sl_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL DEFAULT 0,
  `ship_rocket` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`sl_id`, `name`, `image`, `position`, `featured`, `ship_rocket`, `valid`) VALUES
(1, 'subhabrata', NULL, 1, 0, 'subhabrata', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sl_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL DEFAULT 0,
  `manufacturer_price` float DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `usage` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `precautions` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `hsn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sku_id` varchar(255) NOT NULL,
  `featured` int(11) NOT NULL DEFAULT 0,
  `mrp` int(11) DEFAULT 0,
  `stock` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'In Stock',
  `tags` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgst` float NOT NULL DEFAULT 0,
  `sgst` float NOT NULL DEFAULT 0,
  `igst` float NOT NULL DEFAULT 0,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `valid` int(11) NOT NULL DEFAULT 1,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `sl_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` int(11) DEFAULT 1,
  `posted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sample_audios`
--

CREATE TABLE `sample_audios` (
  `sl_id` int(11) NOT NULL,
  `sample_audio_a1_title` varchar(255) NOT NULL,
  `sample_audio_a1` varchar(255) NOT NULL,
  `sample_audio_a2_title` varchar(255) NOT NULL,
  `sample_audio_a2` varchar(255) NOT NULL,
  `sample_audio_b1_title` varchar(255) NOT NULL,
  `sample_audio_b1` varchar(255) NOT NULL,
  `sample_audio_b2` varchar(255) NOT NULL,
  `sample_audio_c1` varchar(255) NOT NULL,
  `sample_audio_c2` varchar(255) NOT NULL,
  `sample_audio_d1` varchar(255) NOT NULL,
  `sample_audio_d2` varchar(255) NOT NULL,
  `sample_audio_d3` varchar(255) NOT NULL,
  `sample_audio_d4` varchar(255) NOT NULL,
  `sample_audio_b2_title` varchar(255) NOT NULL,
  `sample_audio_c1_title` varchar(255) NOT NULL,
  `sample_audio_c2_title` varchar(255) NOT NULL,
  `sample_audio_d1_title` varchar(255) NOT NULL,
  `sample_audio_d2_title` varchar(255) NOT NULL,
  `sample_audio_d3_title` varchar(255) NOT NULL,
  `sample_audio_d4_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_audios`
--

INSERT INTO `sample_audios` (`sl_id`, `sample_audio_a1_title`, `sample_audio_a1`, `sample_audio_a2_title`, `sample_audio_a2`, `sample_audio_b1_title`, `sample_audio_b1`, `sample_audio_b2`, `sample_audio_c1`, `sample_audio_c2`, `sample_audio_d1`, `sample_audio_d2`, `sample_audio_d3`, `sample_audio_d4`, `sample_audio_b2_title`, `sample_audio_c1_title`, `sample_audio_c2_title`, `sample_audio_d1_title`, `sample_audio_d2_title`, `sample_audio_d3_title`, `sample_audio_d4_title`) VALUES
(1, 'Baborer Prarthana', 'sample_audio_a1250804025354.mp3', '', '', 'Paye Chalar Path (Part)', 'sample_audio_b1250804025636.mp3', '', 'sample_audio_c1250804025636.mp3', '', 'sample_audio_d1250804025636.mp3', 'sample_audio_d2250804025636.mp3', 'sample_audio_d3250804025636.mp3', '', '', 'Nalanda', '', 'Shantinir', 'Freshcafe', 'Shritama Bastralay', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sl_id` int(11) NOT NULL,
  `image1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title1` text CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `description1` text CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sk_order`
--

CREATE TABLE `sk_order` (
  `sl_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `sku_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sgst` float DEFAULT NULL,
  `cgst` float DEFAULT NULL,
  `igst` float NOT NULL,
  `rate` float NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `add_bill` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `landmark_bill` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_bill` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_bill` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_bill` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_nopad_ci DEFAULT 'India',
  `zip_bill` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship` int(11) NOT NULL DEFAULT 0,
  `add_ship` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `landmark_ship` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_ship` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_ship` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_ship` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'India',
  `zip_ship` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bill_lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bill_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ship_name` varchar(255) DEFAULT NULL,
  `ship_email` varchar(255) DEFAULT NULL,
  `ship_phone` varchar(255) DEFAULT NULL,
  `ordernote` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `signature` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Not Paid',
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `track` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `other_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` float NOT NULL,
  `coupon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `coupon_val` float DEFAULT NULL,
  `tax` float NOT NULL DEFAULT 0,
  `total` float NOT NULL,
  `hsn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shiprocket_orderid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shiprocket_shippingid` varchar(255) DEFAULT NULL,
  `manufacture_id` int(11) NOT NULL DEFAULT 0,
  `shiprocket_manufacturer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sl_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_section`
--

CREATE TABLE `student_section` (
  `sl_id` int(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `class_a1_audio` varchar(255) NOT NULL,
  `class_a_pdf` varchar(255) NOT NULL,
  `class_b1_audio` varchar(255) NOT NULL,
  `class_b_pdf` varchar(255) NOT NULL,
  `class_c1_audio` varchar(255) NOT NULL,
  `class_c_pdf` varchar(255) NOT NULL,
  `class_d1_audio` varchar(255) NOT NULL,
  `class_d_pdf` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1,
  `duration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sample_a_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sample_b_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sample_c_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sample_d_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_a2_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_b2_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_c2_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_d2_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_a3_audio` varchar(255) NOT NULL,
  `class_a4_audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_section`
--

INSERT INTO `student_section` (`sl_id`, `title`, `image`, `class_a1_audio`, `class_a_pdf`, `class_b1_audio`, `class_b_pdf`, `class_c1_audio`, `class_c_pdf`, `class_d1_audio`, `class_d_pdf`, `description`, `valid`, `duration`, `sample_a_audio`, `sample_b_audio`, `sample_c_audio`, `sample_d_audio`, `class_a2_audio`, `class_b2_audio`, `class_c2_audio`, `class_d2_audio`, `class_a3_audio`, `class_a4_audio`) VALUES
(1, 'Student Section', 'classes250710011446.png', 'class_a_audio250710011446.mp3', 'class_a_pdf250801053104.pdf', 'class_b_audio250710011446.mp3', 'class_b_pdf250801052034.pdf', 'class_c_audio250710011446.mp3', 'class_c_pdf250801052049.pdf', 'class_d1_audio250723083602.mp3', 'class_d_pdf250801052049.pdf', '', 1, '5 weeks', 'sample_a_audio250723083602.mp3', 'sample_b_audio250723083602.mp3', 'sample_c_audio250723083602.mp3', 'sample_d_audio250723083602.mp3', 'class_a2_audio250723083602.mp3', 'class_b2_audio250723083602.mp3', 'class_c2_audio250723083602.mp3', 'class_d2_audio250723083602.mp3', 'class_a3_audio250804103422.mp3', 'class_a4_audio250804103448.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `sl_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `passkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sl_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'dummy-profile.png',
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` int(11) DEFAULT 1,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `referral_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `student` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sl_id`, `image`, `fname`, `lname`, `phone`, `email`, `password`, `country`, `state`, `city`, `zip`, `address`, `landmark`, `valid`, `timestamp`, `referral_code`, `student`) VALUES
(1, 'dummy-profile.png', 'Soham', 'Chatterjee', '9073228524', 'soham.brandit@gmail.com', '22122003', 'India', 'West Bengal', 'Kolkata', '700025', '50/5e, Harish Mukherjee Rd, Bhowanipore, Kolkata, West Bengal', '', 1, '2025-07-22 03:12:34', NULL, 1),
(2, 'dummy-profile.png', 'Srinjay', 'Chatterjee', '9331010720', 'anindita.business@gmail.com', '14789632', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-08-01 02:43:04', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `device` varchar(255) DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `page`, `datetime`, `device`, `country`, `region`, `city`, `platform`, `phone`) VALUES
(1, 'http://localhost:8080/subhabrata/xadmin/', '2025-07-08 04:38:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(2, 'http://localhost:8080/subhabrata/xadmin/index.php?error', '2025-07-08 04:41:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(3, 'http://localhost:8080/subhabrata/xadmin/index.php?error', '2025-07-08 04:42:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(4, 'http://localhost:8080/subhabrata/xadmin/order.php', '2025-07-08 04:49:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(5, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 04:50:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(6, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 04:50:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(7, 'http://localhost:8080/subhabrata/xadmin/manufacture.php', '2025-07-08 04:50:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(8, 'http://localhost:8080/subhabrata/xadmin/add_blog.php', '2025-07-08 04:50:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(9, 'http://localhost:8080/subhabrata/xadmin/blogs.php', '2025-07-08 04:50:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(10, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 04:50:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(11, 'http://localhost:8080/subhabrata/xadmin/index.php', '2025-07-08 04:50:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(12, 'http://localhost:8080/subhabrata/xadmin/index.php', '2025-07-08 04:55:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(13, 'http://localhost:8080/subhabrata/xadmin/index.php', '2025-07-08 04:57:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(14, 'http://localhost:8080/subhabrata/xadmin/index.php', '2025-07-08 04:57:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(15, 'http://localhost:8080/subhabrata/xadmin/order.php', '2025-07-08 04:57:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(16, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 04:58:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(17, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 05:00:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(18, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 05:00:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(19, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 05:01:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(20, 'http://localhost:8080/subhabrata/xadmin/blogs.php', '2025-07-08 05:02:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(21, 'http://localhost:8080/subhabrata/xadmin/home.php', '2025-07-08 05:03:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(22, 'http://localhost:8080/subhabrata/xadmin/manufacture.php', '2025-07-08 05:11:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(23, 'http://localhost:8080/subhabrata/xadmin/home.php', '2025-07-08 05:11:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(24, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 05:11:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(25, 'http://localhost:8080/subhabrata/xadmin/faq.php', '2025-07-08 05:11:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(26, 'http://localhost:8080/subhabrata/xadmin/testimonial.php', '2025-07-08 05:11:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(27, 'http://localhost:8080/subhabrata/xadmin/testimonial.php', '2025-07-08 05:12:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(28, 'http://localhost:8080/subhabrata/xadmin/testimonial.php', '2025-07-08 05:12:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(29, 'http://localhost:8080/subhabrata/xadmin/testimonial.php', '2025-07-08 05:12:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(30, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 05:13:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(31, 'http://localhost:8080/subhabrata/xadmin/contact.php', '2025-07-08 05:14:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(32, 'http://localhost:8080/subhabrata/xadmin/product.php?cat=', '2025-07-08 05:14:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(33, 'http://localhost:8080/subhabrata/xadmin/product.php?cat=', '2025-07-08 05:15:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(34, 'http://localhost:8080/subhabrata/xadmin/team.php', '2025-07-08 05:15:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(35, 'http://localhost:8080/subhabrata/xadmin/home.php', '2025-07-08 05:17:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(36, 'http://localhost:8080/subhabrata/xadmin/home.php', '2025-07-08 05:17:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(37, 'http://localhost:8080/subhabrata/xadmin/home.php', '2025-07-08 05:18:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(38, 'http://localhost:8080/subhabrata/xadmin/team.php', '2025-07-08 05:18:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(39, 'http://localhost:8080/subhabrata/xadmin/home.php', '2025-07-08 05:22:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(40, 'http://localhost:8080/subhabrata/xadmin/category.php', '2025-07-08 05:22:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(41, 'http://localhost:8080/subhabrata/xadmin/manufacture.php', '2025-07-08 05:22:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(42, 'http://localhost:8080/subhabrata/xadmin/blogs.php', '2025-07-08 05:22:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(43, 'http://localhost:8080/subhabrata/xadmin/certificate.php', '2025-07-08 05:22:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(44, 'http://localhost:8080/subhabrata/xadmin/certificate.php', '2025-07-08 05:23:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(45, 'http://localhost:8080/subhabrata/xadmin/product.php?cat=', '2025-07-08 05:23:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(46, 'http://localhost:8080/subhabrata/xadmin/category.php', '2025-07-08 05:23:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(47, 'http://localhost:8080/subhabrata/xadmin/category.php?success', '2025-07-08 05:23:58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(48, 'http://localhost:8080/subhabrata/xadmin/category.php?success', '2025-07-08 05:24:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(49, 'http://localhost:8080/subhabrata/xadmin/manufacture.php', '2025-07-08 05:24:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(50, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Influencer', '2025-07-08 05:24:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(51, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Influencer', '2025-07-08 05:24:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(52, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Influencer', '2025-07-08 05:24:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(53, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Influencer', '2025-07-08 05:24:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(54, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Influencer', '2025-07-08 05:25:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(55, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Users', '2025-07-08 05:25:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(56, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Influencer', '2025-07-08 05:25:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(57, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Users', '2025-07-08 05:25:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(58, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Users', '2025-07-08 05:26:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(59, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Users', '2025-07-08 05:26:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(60, 'http://localhost:8080/subhabrata/xadmin/lead.php?Influencer=Users', '2025-07-08 05:26:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(61, 'http://localhost:8080/subhabrata/xadmin/index.php', '2025-07-08 05:26:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(62, 'http://localhost:8080/subhabrata/xadmin/order.php', '2025-07-08 05:26:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(63, 'http://localhost:8080/subhabrata/xadmin/order.php', '2025-07-08 05:29:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(64, 'http://localhost:8080/subhabrata/xadmin/lead.php?type=Normal&Influencer=Users', '2025-07-08 05:29:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(65, 'http://localhost:8080/subhabrata/xadmin/manufacture.php', '2025-07-08 05:32:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(66, 'http://localhost:8080/subhabrata/xadmin/manufacture.php', '2025-07-08 05:36:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(67, 'http://localhost:8080/subhabrata/xadmin/slider.php', '2025-07-08 05:36:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(68, 'http://localhost:8080/subhabrata/xadmin/add_blog.php', '2025-07-08 05:36:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(69, 'http://localhost:8080/subhabrata/xadmin/add_blog.php', '2025-07-08 05:37:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(70, 'http://localhost:8080/subhabrata/xadmin/slider.php', '2025-07-08 05:37:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(71, 'http://localhost:8080/subhabrata/xadmin/add_blog.php', '2025-07-08 07:21:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', ''),
(72, 'http://localhost:8080/subhabrata/xadmin/classes.php', '2025-07-08 07:21:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'http://ipinfo.io/::1/geo', '', '', 'pc', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `sl_id` int(11) NOT NULL,
  `memb_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `class_details`
--
ALTER TABLE `class_details`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `event_location`
--
ALTER TABLE `event_location`
  ADD PRIMARY KEY (`sl_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `sample_audios`
--
ALTER TABLE `sample_audios`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `sk_order`
--
ALTER TABLE `sk_order`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `student_section`
--
ALTER TABLE `student_section`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`sl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_details`
--
ALTER TABLE `class_details`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_location`
--
ALTER TABLE `event_location`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sample_audios`
--
ALTER TABLE `sample_audios`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_order`
--
ALTER TABLE `sk_order`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_section`
--
ALTER TABLE `student_section`
  MODIFY `sl_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `temp_user`
--
ALTER TABLE `temp_user`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
