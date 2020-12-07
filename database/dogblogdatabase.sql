-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 05:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dogblogdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactmessage`
--

CREATE TABLE `contactmessage` (
  `id` int(11) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactmessage`
--

INSERT INTO `contactmessage` (`id`, `firstName`, `lastName`, `email`, `country`, `message`, `user`) VALUES
(1, 'Mihael', 'Belko', 'mihael.belko@windowslive.com', 'Croatia', 'Pozdrav!', 0),
(2, 'Dogg', 'Dogg', 'Dogg@dogs.com', 'Barbados', 'Dogg is cool', 0),
(3, 'Mihael', 'Belko', 'mihael.belko@windowslive.com', 'Afghanistan', 'dsafs', 0),
(4, 'asda', 'sadas', 'sadas', 'Bangladesh', 'asdad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua and Barbuda'),
(7, 'Argentina'),
(8, 'Armenia'),
(9, 'Australia'),
(10, 'Austria'),
(11, 'Azerbaijan'),
(12, 'Bahamas, The'),
(13, 'Bahrain'),
(14, 'Bangladesh'),
(15, 'Barbados'),
(16, 'Belarus'),
(17, 'Belgium'),
(18, 'Belize'),
(19, 'Benin'),
(20, 'Bhutan'),
(21, 'Bolivia'),
(22, 'Bosnia and Herzegovina'),
(23, 'Botswana'),
(24, 'Brazil'),
(25, 'Brunei'),
(26, 'Bulgaria'),
(27, 'Burkina Faso'),
(28, 'Burma'),
(29, 'Burundi'),
(30, 'Cambodia'),
(31, 'Cameroon'),
(32, 'Canada'),
(33, 'Cape Verde'),
(34, 'Central Africa'),
(35, 'Chad'),
(36, 'Chile'),
(37, 'China'),
(38, 'Colombia'),
(39, 'Comoros'),
(40, 'Congo, Democratic Republic of the'),
(41, 'Costa Rica'),
(42, 'Cote dIvoire'),
(43, 'Crete'),
(44, 'Croatia'),
(45, 'Cuba'),
(46, 'Cyprus'),
(47, 'Czech Republic'),
(48, 'Denmark'),
(49, 'Djibouti'),
(50, 'Dominican Republic'),
(51, 'East Timor'),
(52, 'Ecuador'),
(53, 'Egypt'),
(54, 'El Salvador'),
(55, 'Equatorial Guinea'),
(56, 'Eritrea'),
(57, 'Estonia'),
(58, 'Ethiopia'),
(59, 'Fiji'),
(60, 'Finland'),
(61, 'France'),
(62, 'Gabon'),
(63, 'Gambia, The'),
(64, 'Georgia'),
(65, 'Germany'),
(66, 'Ghana'),
(67, 'Greece'),
(68, 'Grenada'),
(69, 'Guadeloupe'),
(70, 'Guatemala'),
(71, 'Guinea'),
(72, 'Guinea-Bissau'),
(73, 'Guyana'),
(74, 'Haiti'),
(75, 'Holy See'),
(76, 'Honduras'),
(77, 'Hong Kong'),
(78, 'Hungary'),
(79, 'Iceland'),
(80, 'India'),
(81, 'Indonesia'),
(82, 'Iran'),
(83, 'Iraq'),
(84, 'Ireland'),
(85, 'Israel'),
(86, 'Italy'),
(87, 'Ivory Coast'),
(88, 'Jamaica'),
(89, 'Japan'),
(90, 'Jordan'),
(91, 'Kazakhstan'),
(92, 'Kenya'),
(93, 'Kiribati'),
(94, 'Korea, North'),
(95, 'Korea, South'),
(96, 'Kosovo'),
(97, 'Kuwait'),
(98, 'Kyrgyzstan'),
(99, 'Laos'),
(100, 'Latvia'),
(101, 'Lebanon'),
(102, 'Lesotho'),
(103, 'Liberia'),
(104, 'Libya'),
(105, 'Liechtenstein'),
(106, 'Lithuania'),
(107, 'Macau'),
(108, 'Macedonia'),
(109, 'Madagascar'),
(110, 'Malawi'),
(111, 'Malaysia'),
(112, 'Maldives'),
(113, 'Mali'),
(114, 'Malta'),
(115, 'Marshall Islands'),
(116, 'Mauritania'),
(117, 'Mauritius'),
(118, 'Mexico'),
(119, 'Micronesia'),
(120, 'Moldova'),
(121, 'Monaco'),
(122, 'Mongolia'),
(123, 'Montenegro'),
(124, 'Morocco'),
(125, 'Mozambique'),
(126, 'Namibia'),
(127, 'Nauru'),
(128, 'Nepal'),
(129, 'Netherlands'),
(130, 'New Zealand'),
(131, 'Nicaragua'),
(132, 'Niger'),
(133, 'Nigeria'),
(134, 'North Korea'),
(135, 'Norway'),
(136, 'Oman'),
(137, 'Pakistan'),
(138, 'Palau'),
(139, 'Panama'),
(140, 'Papua New Guinea'),
(141, 'Paraguay'),
(142, 'Peru'),
(143, 'Philippines'),
(144, 'Poland'),
(145, 'Portugal'),
(146, 'Qatar'),
(147, 'Romania'),
(148, 'Russia'),
(149, 'Rwanda'),
(150, 'Saint Lucia'),
(151, 'Saint Vincent and the Grenadines'),
(152, 'Samoa'),
(153, 'San Marino'),
(154, 'Sao Tome and Principe'),
(155, 'Saudi Arabia'),
(156, 'Scotland'),
(157, 'Senegal'),
(158, 'Serbia'),
(159, 'Seychelles'),
(160, 'Sierra Leone'),
(161, 'Singapore'),
(162, 'Slovakia'),
(163, 'Slovenia'),
(164, 'Solomon Islands'),
(165, 'Somalia'),
(166, 'South Africa'),
(167, 'South Korea'),
(168, 'Spain'),
(169, 'Sri Lanka'),
(170, 'Sudan'),
(171, 'Suriname'),
(172, 'Swaziland'),
(173, 'Sweden'),
(174, 'Switzerland'),
(175, 'Syria'),
(176, 'Taiwan'),
(177, 'Tajikistan'),
(178, 'Tanzania'),
(179, 'Thailand'),
(180, 'Tibet'),
(181, 'Timor-Leste'),
(182, 'Togo'),
(183, 'Tonga'),
(184, 'Trinidad and Tobago'),
(185, 'Tunisia'),
(186, 'Turkey'),
(187, 'Turkmenistan'),
(188, 'Tuvalu'),
(189, 'Uganda'),
(190, 'Ukraine'),
(191, 'United Arab Emirates'),
(192, 'United Kingdom'),
(193, 'United States'),
(194, 'Uruguay'),
(195, 'Uzbekistan'),
(196, 'Vanuatu'),
(197, 'Venezuela'),
(198, 'Vietnam'),
(199, 'Yemen'),
(200, 'Zambia'),
(201, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `picture` longtext NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_news` int(11) NOT NULL,
  `by_user` int(11) NOT NULL,
  `archive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `picture`, `title`, `description`, `date`, `id_news`, `by_user`, `archive`) VALUES
(1, 'image1.jpg', 'Stress in dogs performance', 'Stress in dogs performance', '2020-11-24 17:48:02', 1, 1, 0),
(2, 'image2.jpg', 'Dogs agility', 'Dogs agility', '2020-11-24 17:56:04', 2, 1, 0),
(3, 'image3.jpg', 'Training Your Dog', 'Training Your Dog', '2020-11-24 17:56:26', 3, 1, 0),
(4, 'image4.jpg', 'Take it slow', 'Take it slow', '2020-11-24 17:56:59', 4, 2, 0),
(5, 'image5.jpg', 'Separation Anxiety', 'Separation Anxiety', '2020-11-24 17:57:33', 5, 2, 0),
(6, 'image6.jpg', 'Doberman Breed Guide', 'Doberman Breed Guide', '2020-11-24 17:58:50', 6, 3, 0),
(7, 'image8.jpg', 'Dog random', 'Dog random', '2020-11-24 18:11:06', 2, 1, 0),
(8, 'image7.jpg', 'Random dog', 'Random dog', '2020-11-24 18:45:02', 3, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(512) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `picture` varchar(55) NOT NULL,
  `by_user` int(11) NOT NULL,
  `archive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `date`, `picture`, `by_user`, `archive`) VALUES
(1, 'Dog agility', 'Dog agility is a wonderful way to offer your pup physical and mental exercise. Canine agility is not only an outlet to burn off extra energy, but also a way to improve your dog’s mental skills. An agility course can keep your dog in shape, help them meet their daily exercise needs, and even improve their critical thinking skills. With so many benefits to offer, it’s no wonder so many dog owners are turning to dog agility.', '2020-11-24 19:05:22', 'image3.jpg', 1, 0),
(3, 'The Miniature Pinscher', 'It is believed that the energetic Miniature Pinscher, also known as the Min Pin, goes back several centuries. This dog breed originated in Germany in the 1600s. The Min Pin is not a miniature Doberman Pinscher, but is in fact much older in origin. This breed belongs to the AKC Toy Group.', '2020-11-24 19:06:58', 'image6.jpg', 2, 0),
(5, '11', '11', '2020-11-24 19:13:04', '11', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `email`) VALUES
(1, 'miha', 'b12fe84c942fb07623a20fb005ec0841', 'miha@tvz.hr'),
(2, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 'student@tvz.hr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactmessage`
--
ALTER TABLE `contactmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactmessage`
--
ALTER TABLE `contactmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
