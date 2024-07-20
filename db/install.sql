-- TABLE `category`

-- -------------------------------------------
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- -------------------------------------------

-- -------------------------------------------

-- TABLE `todo`

-- -------------------------------------------
CREATE TABLE `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
);


--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Category A'),
(2, 'Category B'),
(3, 'Category C'),
(4, 'Category D');

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `name`, `category_id`, `timestamp`) VALUES
(1, 'Item 1', 1, '2023-11-24 07:28:08'),
(2, 'Item 2', 1, '2023-11-24 07:28:15'),
(3, 'Item 3', 3, '2023-11-24 07:28:25'),
(4, 'Item n', 2, '2023-11-24 07:28:42');