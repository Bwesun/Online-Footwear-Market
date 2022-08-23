CREATE TABLE `admin` (
  `id` int(4) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`id`, `username`, `password`) VALUES 
(1, 'admin', 'admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `cart`
-- 

CREATE TABLE `cart` (
  `id` int(4) NOT NULL auto_increment,
  `item_id` int(4) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_price` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `quantity` int(7) NOT NULL,
  `user_id` int(4) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `cart`
-- 

INSERT INTO `cart` (`id`, `item_id`, `item_name`, `item_price`, `status`, `quantity`, `user_id`, `total_price`) VALUES 
(3, 11, 'Loafer', '16000', 'sent', 1, 1, 16000.00),
(4, 13, 'Runners Sneaker', '4800', 'sent', 1, 2, 4800.00),
(5, 14, 'Chelsea Oxford Boot', '4800', 'sent', 1, 2, 4800.00),
(6, 12, 'Loafer', '26000', 'sent', 1, 2, 26000.00),
(7, 17, 'Blessing Ado Ajala', '23000', 'sent', 1, 1, 23000.00),
(8, 15, 'Chelsea Oxford Boot', '26000', 'sent', 6, 1, 156000.00);

-- --------------------------------------------------------

-- 
-- Table structure for table `items`
-- 

CREATE TABLE `items` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(8) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `items`
-- 

INSERT INTO `items` (`id`, `name`, `price`, `description`, `category`, `pic`) VALUES 
(7, 'Casual Shoe', '45000', 'Item Description', 'Shoes', 'AAlUxYX.img.jfif'),
(9, 'Moccassine', '9800', 'Color: Black, Size 42', 'Shoes', 'hkhwpa1491877047219.jpg'),
(10, 'Casual Shoe', '12000', 'Color: Yellow, Size 43', 'Boots', 'FB_IMG_1533555622715.jpg'),
(11, 'Loafer', '16000', 'Color: Cold-Black, Size 41', 'Shoes', 'ZXQ-Fashion-Flats-font-b-Shoes-b-font-font-b-Men-b-font-font-b-Loafers.jpg'),
(12, 'Loafer', '26000', 'Color: Black, Size 42', 'Boots', 'Luxury-Limited-Edition-ITALY-type-font-b-Men-s-b-font-font-b-loafers-b-font.jpg'),
(13, 'Runners Sneaker', '4800', 'Color: Red, Size 42, Chewing Gum sole', 'Shoes', 'img-20170913-wa0050.jpg'),
(14, 'Chelsea Oxford Boot', '4800', 'Color: Black, Size 42', 'Boots', 'hkhwpa1491877047219.jpg'),
(15, 'Chelsea Oxford Boot', '26000', 'The security of the System needs to be very high as it is used online where nefarious activities of web devils are rampant.', 'Boots', 'img-20170913-wa0050.jpg'),
(17, 'Blessing Ado Ajala', '23000', 'k.j', 'Shoes', 'FB_IMG_1533555622715.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `sent`
-- 

CREATE TABLE `sent` (
  `id` int(7) NOT NULL auto_increment,
  `user_id` int(5) NOT NULL,
  `trans_pin` int(8) NOT NULL,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `total` double NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `sent`
-- 

INSERT INTO `sent` (`id`, `user_id`, `trans_pin`, `datetime`, `total`, `status`) VALUES 
(1, 2, 42061821, '2020-02-21 18:49:35', 35600, 'processing'),
(2, 1, 33636843, '2020-02-24 10:00:00', 39000, ''),
(3, 1, 82461055, '2020-02-24 11:42:16', 156000, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(6) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `customer_type` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `email`, `address`, `password`, `customer_type`) VALUES 
(1, 'Aliyu Hassan Ibrahim', 'Altukry', '09063334420', 'altukry@gmail.com', 'Tukur tukur, Jusshi Waje, Near Gokoih', 'altukry', 'Individual'),
(2, 'philip  john', 'phil j', '0806754321', 'john@yahoo.com', 'samaru', 'philip', 'Individual');
