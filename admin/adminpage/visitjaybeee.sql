-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 02:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitjaybeee`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `adname` text NOT NULL,
  `explaination` text NOT NULL,
  `task` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `adname`, `explaination`, `task`) VALUES
(2, 'Nadia Ainaa', 'Translation for the page', 'Translation'),
(3, 'Fazreen Laila', 'Places in Johor Bahru', 'Places'),
(4, 'Dini Farizah', 'Routes and Transportation update.', 'Routes and Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(60) NOT NULL,
  `category` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `image`, `category`, `link`) VALUES
(42, 'Danga Bay Funfair', 'funfair.jpeg', 'Entertainment', 'https://shorturl.at/bhtyN'),
(45, 'Legoland', 'legoland.jpg', 'Entertainment', 'https://www.legoland.com.my/'),
(46, 'Skyscape Komtar JBCC', 'sky.jpg', 'Entertainment', 'https://shorturl.at/eELRV'),
(47, 'Blue Ice Skating Rink', 'skating.jpg', 'Entertainment', 'https://shorturl.at/isDY6'),
(48, 'Austin Heights Water & Adventure Park', 'austin.jpg', 'Entertainment', 'https://www.funtime.my/'),
(49, 'X Park Sunway Iskandar', 'xpark.jpg', 'Entertainment', 'https://www.xparkmalaysia.com/Index.aspx'),
(50, 'Jb Lost In The Haunted House', 'lost.jpg', 'Entertainment', 'https://lostinjb.com/en'),
(51, 'Dinosaurs Alive Water Theme Park', 'ksl.jpg', 'Entertainment', 'https://shorturl.at/knsH0'),
(53, 'Bazar Karat', 'bazar.jpg', 'Shopping Place', 'https://sikidang.com/pasar-karat-johor/'),
(55, 'B5 Street Market', 'b5.jpg', 'Shopping Place', 'https://www.damansaraassets.com.my/project/b5-johor-street-market/'),
(56, 'Johor Premium Outlets', 'jpo.jpeg', 'Shopping Place', 'https://shorturl.at/ikpBL'),
(57, 'Paradigm Mall', 'paradigm.jpg', 'Shopping Place', 'https://www.paradigmmall.com.my/jb/'),
(58, 'Mid Valley Southkey', 'midvalley.JPG', 'Shopping Place', 'https://www.midvalleysouthkey.com/shop/directory/'),
(59, 'Angsana Mall', 'angsana.jpg', 'Shopping Place', 'https://www.udamalls.com.my/angsana-johor-bahru-mall'),
(60, 'Pasar Borong Pandan', 'pandan.jpg', 'Shopping Place', 'https://foursquare.com/v/pasar-borong-pandan-city/4b76b55cf964a520d3592ee3'),
(61, 'Dataran Johor Bahru', 'dataran.jpeg', 'Hangout Place', 'https://shorturl.at/ckKX3'),
(62, 'Tebing', 'tebing.jpg', 'Hangout Place', 'https://www.tebing.my/'),
(63, 'Country Garden Danga Bay', 'country.jpg', 'Hangout Place', 'https://dangabaycondo.com/en'),
(64, 'Marina Puteri Harbour', 'puteri.jpg', 'Hangout Place', 'https://www.one15marina.com/puteriharbour/'),
(65, 'Hutan Bandar MBJB', 'hutan.jpg', 'Hangout Place', 'https://shorturl.at/iMNV8'),
(66, 'Jalan Tan Hiok Nee', 'jalan.jpg', 'Hangout Place', 'https://shorturl.at/cKS29'),
(67, 'Masjid Sultan Abu Bakar', 'masjid.jpeg', 'Unique Attraction', 'https://shorturl.at/exDX0'),
(68, 'Istana Bukit Serene', 'istana.jpg', 'Unique Attraction', 'https://www.mbjb.gov.my/ms/destinasi-menarik/laman-mahkota-istana-bukit-serene'),
(69, 'Istana Besar', 'istanalama.jpg', 'Unique Attraction', 'https://aa.johor.gov.my/istana/'),
(70, 'Johor Ancient Temple', 'temple.jpg', 'Unique Attraction', 'https://shorturl.at/dkxO5'),
(71, 'Arulmigu Sri Rajakaliamman Glass Temple', 'glass.jpg', 'Unique Attraction', 'https://shorturl.at/buBDG'),
(72, 'Church Of The Immaculate Conception', 'church.jpg', 'Unique Attraction', 'https://www.cicjb.org/'),
(73, 'Warung Saga', 'saga.jpg', 'Popular Eatery', 'https://shorturl.at/enpFX'),
(74, 'Onn Kitchen', 'onn.jpg', 'Popular Eatery', 'https://saji.my/onn-kitchen/'),
(75, 'Cafe Ikhwan', 'ikhwan.jpg', 'Popular Eatery', 'https://shorturl.at/xDO19'),
(76, 'The Marco Polo Kitchen', 'marco.jpg', 'Popular Eatery', 'http://www.themarcopolokitchen.com.my/'),
(77, 'Murtabak Singapura', 'murtabak.jpg', 'Popular Eatery', 'https://shorturl.at/sKY69'),
(78, 'The Banana Leaf Kitchen', 'banana.jpg', 'Popular Eatery', 'https://shorturl.at/jqB59'),
(79, 'Doña Bakehouse', 'dona.jpg', 'Popular Eatery', 'https://www.donabakehouse.com/'),
(80, 'Lazy Monday', 'monday.jpeg', 'Popular Eatery', 'https://shorturl.at/kEIW6'),
(81, 'Nimmies Pastry Cafe', 'nim.jpg', 'Popular Eatery', 'https://shorturl.at/fpsvP'),
(82, 'Keijometo', 'keijometo.jpg', 'Popular Eatery', 'https://shorturl.at/pCDM8'),
(83, 'The FOUNDERS Cafe', 'founders.jpg', 'Popular Eatery', 'https://thefounderscafemy.com/'),
(84, 'Cafe Takdak Nama', 'takdak.jpg', 'Popular Eatery', 'https://shorturl.at/drxJS'),
(85, 'The Lightwood by Mues', 'light.jpg', 'Popular Eatery', 'https://shorturl.at/kCLSY'),
(86, '3littlechef', 'little.png', 'Popular Eatery', 'https://shorturl.at/GHJK0'),
(87, 'Dusk by Mok Mok', 'dus.jpg', 'Popular Eatery', 'https://shorturl.at/dNX24'),
(88, 'Halaman by Dapur Western', 'halaman.jpg', 'Popular Eatery', 'https://shorturl.at/mKUV7'),
(89, 'Bloom by MokMok', 'bloom.jpg', 'Popular Eatery', 'https://shorturl.at/cdGKT'),
(90, 'SIGNATURE by Nosh', 'signaturen.jpg', 'Popular Eatery', 'https://shorturl.at/uZ238'),
(91, 'Soil', 'soil.jpg', 'Popular Eatery', 'https://soil.storehub.me/'),
(92, 'Dari Korean', 'dari.jpg', 'Popular Eatery', 'https://johorfoodie.com/dari-korean-restaurant-johor-bahru/'),
(93, 'K Fry Urban Korean', 'kfryk.jpg', 'Popular Eatery', 'https://www.kfry.my/location/k-fry-holiday-villa-johor-bahru/'),
(94, 'Dookki', 'dooki.jpg', 'Popular Eatery', 'https://shorturl.at/apT28'),
(95, 'Merah Kitchen & Bar', 'merah.jpg', 'Popular Eatery', 'https://merah-kitchen-bar.business.site/'),
(96, 'Woodfire', 'wood.jpg', 'Popular Eatery', 'https://woodfire.com.my/locate-us/'),
(97, 'Korea House Restaurant', 'korea.jpg', 'Popular Eatery', 'https://shorturl.at/euvyE'),
(98, 'Roast & Coffee - Retro Garden 1968s', 'roast.JPG', 'Popular Eatery', 'https://shorturl.at/aorA6'),
(99, 'Re Patisserie', 're.jpg', 'Popular Eatery', 'https://shorturl.at/yBCEL'),
(100, 'Flowers in the Window', 'flower.jpg', 'Popular Eatery', 'https://shorturl.at/lGPQ6'),
(101, 'TIP, The Ice-Cream Project', 'tip.jpg', 'Popular Eatery', 'https://theicecreamproject.store/'),
(102, 'Sarcasteak Cafe', 'sarcasteak.jpg', 'Popular Eatery', 'https://shorturl.at/JLWY1'),
(103, 'Olive Musicafe', 'olive.jpg', 'Popular Eatery', 'https://shorturl.at/cjrY6'),
(104, 'The Pinggan Cafe', 'piggan.jpg', 'Popular Eatery', 'https://shorturl.at/afkmO'),
(105, 'Bubur Nasi Istimewa No. 1', 'bubur.jpg', 'Popular Eatery', 'https://shorturl.at/lotP5'),
(106, 'Bawal Power Sempoi', 'bawal.jpg', 'Popular Eatery', 'https://bawal-power-sempoi-johor-bahru.business.site/'),
(107, 'Al Mizan Satay House', 'mizan.jpg', 'Popular Eatery', 'https://almizansatayhouse.com/'),
(108, 'Mee Rebus Haji Wahid', 'rebus.jpg', 'Popular Eatery', 'https://shorturl.at/SVZ38'),
(109, 'Pondok Santapan Larkin', 'pondok.jpg', 'Popular Eatery', 'https://shorturl.at/bmHMT'),
(110, 'Warung Soto Perdana Madu 4', 'soto4.jpg', 'Popular Eatery', 'https://jbfoodclub.com/2021/11/02/warung-soto-perdana-madu-4-skudai-kiri/'),
(111, 'Restoran Sup Tulang ZZ', 'zz.jpg', 'Popular Eatery', 'https://saji.my/restoran-z-sup-tulang/'),
(112, 'The Belly Treats bakeshop', 'belly.jpg', 'Popular Eatery', 'http://ppunlimited.blogspot.com/2018/07/the-belly-treats-bakeshop.html'),
(113, 'Jobox Food Truck', 'jobox.jpg', 'Popular Eatery', 'https://shorturl.at/rGNV6'),
(114, 'Big Food F&B', 'bigfood.jpg', 'Popular Eatery', 'http://bigfoodfnb.biz/bigfood/about.php'),
(115, 'Anjung Senibong Restoran', 'senibong.jpg', 'Popular Eatery', 'https://shorturl.at/djDE3'),
(116, 'KopiLoco', 'kopi.JPG', 'Popular Eatery', 'https://shorturl.at/sJKPX'),
(117, 'Menate Steak Hub', 'menate.jpeg', 'Popular Eatery', 'https://menate.com.my/our-menu/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phoneNum` int(11) NOT NULL,
  `profileImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `phoneNum`, `profileImg`) VALUES
(16, 'dini2001@graduate.ut', 'rtyty', 'Nur Dini Farizah Yazid', 1123741164, 'default.png'),
(19, 'athirahyzd12@gmail.c', '12345678', 'athirah yazid', 123588654, 'default.png'),
(21, 'fazreenlaila@gmail.c', 'fazreen', 'fazreen laila ', 123456789, 'default.png'),
(22, 'dinifarizahyazid@gma', '12345', 'nugu', 1123741164, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
