-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 05:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(34, 'Gift', 1),
(32, 'kitchen', 0),
(33, 'gadgets', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(55, 'Best Bread Slicer for Homemade', 'If you’re still cutting your bread loaves with a regular knife in an age of convenience and technology, you’re doing it wrong. Utilizing a customary blade is a truly challenging undertaking to cut bread uniformly and without any problem. I’ve come up with the best knife alternative for precisely slicing bread. In this article, we’ll look at the 10 best bread slicers in terms of quality, price, and durability. This list is based on my opinion and an hour of research.\r\n\r\nThere are multifarious bread slicers made of sturdy wood with equally spaced slots that will miraculously alter the way you slice bread. These tools, which come in a variety of designs, make it simple to produce uniformly thick bread slices.\r\n\r\nConsider the following key facts:\r\nBefore you buy, you should know which one is best for you based on your specific requirements! I have listed the key factors to consider before buying the best bread slicer.\r\n\r\n·       Material:\r\nThe material of the slicer should be your first and most important focus. The bread slicer is made of plastic or wood. Let’s examine each one separately.\r\n\r\nPlastic:\r\n\r\nPlastic bread slicers are compact. It is necessary to properly sanitize the plastic slicers. Purchase a plastic bread slicer with non-slip feet or pads on the bottom because plastic bread slicers are more likely to slip when used. In addition, a plastic bread slicer may require replacement sooner than a wooden model.', '32', '30 Dec, 2022', 38, 'featured image (11).png'),
(56, 'What is GMT Watch?', 'What is GMT watch?\r\nGMT stands for Greenwich Mean Time that point at 0 on the 24-hour international time scale. GMT watch is one of the most fascinating watch complications ever manufactured in the history of watchmaking. GMT watch is one that provides both a 24-hour time scale and a 12-hour time watch. Thus, any person traveling in different locations overseas can track time using the GMT watch. As this watch time is measured to be 0 points on the international time scale, so all other countries’ time is measured with reference to this watch. The time in Pakistan is GMT + 5. And that of the US is GMT -5. Any person traveling abroad can keep track of the time of their country using GMT. GMT comes in handy when traveling for business or other purposes.\r\n\r\nGMT watch was first manufactured by Rolex on demand. With the passage of time, it became popular among the usage of pilots and for aviation purposes.\r\nPAGANI watch is a mechanical watch that provides Greenwich time for time measurement at different locations. It does not require a battery for its movement but needs natural arm movement only. It provides water resistance with its ability to bear water splashes and is waterproof. It can be used in water activities like swimming, car washing, and showering but not for hot water. Its sapphire glass provides resistance against scratches and splashes also. It can be given as a gift on birthdays or celebrations. It is comfortable to wear with its beautiful appearance. PAGANI provides its customers with a warranty of 1 year and a trial of 60 days on the product. They encourage their customers’ preferences.', '34', '30 Dec, 2022', 38, 'Best Headphone for piano (6).png'),
(57, 'Best Micro Drone in Cheap Price', 'Nearly anywhere may be reached by drones for an efficient inspection. A UAV can collect data more quickly in emergency scenarios where gathering and processing satellite photos can take some time. All the pleasure that drones provide is captured by micro and nano drones, which bring it in a minute amount of packing. They have lots of surprises, are adorable, and are tons of fun. Before digging into the best micro drones let’s first look into what is micro drone.\r\nA micro drone is smaller than a nano drone, yet it is still small enough to fly both inside and outside.\r\n\r\nBudget, experience, and intention should all be considered before taking to the skies. Each of them will differ depending on the customer because no two people have the same ideal drone. Here are a few short ideas to consider before making a purchase:\r\n\r\nFlight Mode: It’s important to understand whether the drone can do VTOLs (vertical takeoff and landing) or HTOLs (horizontal takeoff and landing). Knowing this will enable you to fly your drones in the proper location.\r\n\r\nNavigations: Some drones may not come with a remote controller for navigation. In this situation, you need to link your smartphone to the drone by downloading an app. Navigations could become confusing, especially if sales personnel fail to advise customers of this issue.\r\n\r\nDurability: You must secure the hardware design of your drone if you intend to use it despite a weather disturbance. The drone needs sturdy hardware, such as a carbon fiber body, to withstand severe weather forecasts.\r\n\r\nSensors: Drones have a variety of sensors. While some may have multispectral sensors, others may have primary or critical sensors like those for detecting debris. Extended field data collection enables drones to detect thermal imaging, terrain mapping, and much more.', '33', '30 Dec, 2022', 38, 'Electric (4).png'),
(58, '10 Best Tourbillon Watches for Decent Look', 'Tourbillon watches improve the accuracy of the timepieces by eliminating the influence of gravity on the watch. The ability of tourbillon watches makes them superior to other watches and a fine piece of art. Tourbillon watches are a fine piece that is the best indication of Haute horology. Haute horology is the art of high watchmaking. It takes patience and skills to make out this product with delicate attention. Tourbillon watches are very attractive because of their detailed and intricate design and watchmaking skills.\r\n\r\nTourbillon is a French word that means whirlwind. Tourbillon increases the accuracy of the watch with it as an addition to the watch escapement. It has a balance wheel and escapement that is mounted on a rotating cage to eliminate errors in balance by giving a uniform weight. This, as a result, increases the accuracy of watches by overcoming the effect of gravity on the watch. Tourbillon watches are expensive because of their detailed watchmaking mechanism and the skills required in their manufacturing. But in this modern era, there is a solution to every problem we might face in our daily life. Thus, these expensive tourbillon watches have a solution too that is Chinese manufacturers that must provide the general public with affordable tourbillon watches. Thus, tourbillon watches are now within reach of every watch lover.', '34', '30 Dec, 2022', 38, 'featured image (10).png'),
(59, 'Best Ukulele for beginners in 2023', 'The ukulele is a small four stringed guitar that is perfect for beginners. Whether you are just starting your journey as a musician or an experienced player, there is something special about strumming this little beauty into lively impromptu music wherever you are. These ukuleles are great for beginners who want to learn the art and mastery of this wonderful instrument. It comes with one stand, a ukulele cord and a music stand, allowing anyone to start learning how to play the ukulele in no time. The ukulele is a member of the lute family of instruments, which have been popular in Hawaii since the late 19th century. The craftsmanship, tone and quality of this instrument make it a delightful gift for any musician or beginner. If you are looking for a best Ukulele for beginners. We have collected some the best from Amazon, and we are sure that you people will also love these. These Ukuleles are not only good for beginners but also for those who are already good in this instrument.\r\nThere is lot of brands that are selling ukuleles all over the world. But the real question is they all are worth buying it? My answer after long research is ‘No’. Some brands are known from there Ukuleles. They produce one the best in the market. When you use there instruments it sounds exactly what you are looking for. They show no delay and produce one the best quality sound. This soprano ukulele is designed especially for beginners, with a smaller body size and open strings to prevent cramping. Its saddle construction, frets, and tuners all help create an ideal balance between playability and sound quality. With a mahogany finish – which has become the standard in high-quality ukuleles – this ukulele is a perfect first instrument.\r\n\r\nSome of the qualities or you can say the features of this Ukulele is:\r\n\r\nSuperior Quality: The body, neck, and fingerboard are all made of solid wood in this 21? classic soprano ukulele, with the bridge and fingerboard being made of blackwood. It will become your favorite musical instrument thanks to the nylon strings and environmentally friendly construction.\r\nLearn while using: The multicolored strings on this soprano ukulele each correspond to a distinct note. In this manner, you can enhance your learning process and effortlessly retain the notes. The majority of string instruments require some initial adjustment time to the environment. If it goes out of tune, keep tuning it every time; eventually it will correct itself.\r\nSave Money: You can save your hard-earned money instead of spending on expensive brands. This ukulele is designed to save you from investing in learning lesson also. There I can say that this is the best ukulele for beginners.', '33', '30 Dec, 2022', 38, 'featured image (7).png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(38, 'ammar', 'raza', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(39, 'Ahtisham', 'Khalid', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(43, 'Ali', 'khan', 'alaikhan', 'bea5bf325b95ace0f4220146484356a8', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
