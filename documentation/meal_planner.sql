-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 30, 2024 at 06:28 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meal_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `meal_id` int(11) DEFAULT NULL,
  `comment` text,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `meal_id`, `comment`, `rating`, `created_at`) VALUES
(1, 9, 1, 'i dont know yet', 3, '2024-04-20 04:57:37'),
(2, 9, 15, 'So healthy and delicious', 5, '2024-04-20 05:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `diet_categories`
--

CREATE TABLE `diet_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(11) NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `meal_category` varchar(50) NOT NULL,
  `ingredients` text NOT NULL,
  `prep_time` time NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `meal_name`, `meal_category`, `ingredients`, `prep_time`, `image_path`) VALUES
(1, 'Grilled Salmon with Roasted Vegetables', 'Gluten-free', 'Salmon, bell peppers, zucchini, olive oil, salt, pepper', '00:30:00', '/Meals/Images/Grilled-Salmon-With-Vegetables.png'),
(2, 'Quinoa Stuffed Bell Peppers', 'Gluten-free', 'Quinoa, bell peppers, black beans, corn, onion, tomato, cheese', '00:45:00', '/Meals/Images/Stuffed-Peppers-5.png'),
(3, 'Chicken and Vegetable Stir-Fry with Tamari Sauce', 'Gluten-free', 'Chicken, broccoli, bell peppers, snap peas, tamari sauce, garlic, ginger, sesame oil', '00:25:00', 'http://localhost:90/Meals/Images//Meals/Images/chicken-vegetables-stir-fry.png'),
(4, 'Lentil Soup with Spinach and Carrots', 'Gluten-free', 'Lentils, spinach, carrots, onion, garlic, vegetable broth, cumin, salt, pepper', '01:00:00', 'http://localhost:90/Meals/Images//Meals/Images/lentil-soup-carrots-spinach.jfif'),
(5, 'Zucchini Noodles with Pesto and Cherry Tomatoes', 'Gluten-free', 'Zucchini, basil pesto, cherry tomatoes, pine nuts, Parmesan cheese, olive oil, garlic', '00:20:00', 'http://localhost:90/Meals/Images//Meals/Images/pesto-tomatoes.jfif'),
(6, 'Baked Chicken with Sweet Potato Wedges', 'Gluten-free', 'Chicken, sweet potatoes, olive oil, paprika, garlic powder, salt, pepper', '00:40:00', 'http://localhost:90/Meals/Images//Meals/Images/baked-chicken-sweetpotatoes.jpg'),
(7, 'Shrimp and Avocado Salad with Citrus Dressing', 'Gluten-free', 'Shrimp, avocado, mixed greens, cherry tomatoes, red onion, lime juice, olive oil, honey, salt, pepper', '00:15:00', 'http://localhost:90/Meals/Images//Meals/Images/shrimp-avocadosalad.jfif'),
(8, 'Turkey Chili with Black Beans and Corn', 'Gluten-free', 'Ground turkey, black beans, corn, onion, bell pepper, tomatoes, chili powder, cumin, paprika, salt, pepper', '01:30:00', 'http://localhost:90/Meals/Images//Meals/Images/turkey-chilli with black beans.jfif'),
(9, 'Spinach and Feta Stuffed Chicken Breast', 'Gluten-free', 'Chicken breast, spinach, feta cheese, garlic, lemon juice, olive oil, salt, pepper', '00:35:00', 'http://localhost:90/Meals/Images//Meals/Images/s-feta-stuffed-chicken.jfif'),
(10, 'Cauliflower Fried Rice with Mixed Vegetables', 'Gluten-free', 'Cauliflower, mixed vegetables (carrots, peas, corn), eggs, soy sauce, sesame oil, garlic, ginger', '00:25:00', 'http://localhost:90/Meals/Images//Meals/Images/cauliflower-fried-rice.jfif'),
(11, 'Gluten-Free Pizza with Tomato Sauce and Fresh Basil', 'Gluten-free', 'Gluten-free pizza crust, tomato sauce, mozzarella cheese, fresh basil, olive oil, garlic powder', '00:30:00', NULL),
(12, 'Eggplant Parmesan with Marinara Sauce', 'Gluten-free', 'Eggplant, gluten-free breadcrumbs, Parmesan cheese, marinara sauce, mozzarella cheese, olive oil, salt, pepper', '01:00:00', NULL),
(13, 'Tofu and Vegetable Curry with Coconut Milk', 'Gluten-free', 'Tofu, mixed vegetables (bell peppers, broccoli, carrots), coconut milk, curry paste, garlic, ginger, soy sauce', '00:45:00', NULL),
(14, 'Steak Lettuce Wraps with Sautéed Mushrooms', 'Gluten-free', 'Steak, lettuce leaves, mushrooms, onion, garlic, soy sauce, sesame oil, rice vinegar', '00:35:00', NULL),
(15, 'Quinoa Salad with Cucumber, Tomato, and Feta Cheese', 'Gluten-free', 'Quinoa, cucumber, tomato, red onion, feta cheese, lemon juice, olive oil, salt, pepper', '00:20:00', NULL),
(16, 'Greek Yogurt Parfait with Mixed Berries and Almonds', 'High-protein', 'Greek yogurt, mixed berries (strawberries, blueberries, raspberries), almonds', '00:05:00', NULL),
(17, 'Tuna Salad Wrap', 'High-protein', 'Canned tuna, Greek yogurt, celery, red onion, lemon juice, whole grain wrap, lettuce, tomato, avocado', '00:10:00', NULL),
(18, 'Chicken and Vegetable Stir-Fry', 'High-protein', 'Chicken breast, mixed vegetables (bell peppers, broccoli, snap peas), soy sauce, garlic, quinoa or brown rice', '00:15:00', NULL),
(19, 'Egg and Spinach Omelette', 'High-protein', 'Eggs, spinach, cheese, oil, whole grain toast', '00:10:00', NULL),
(20, 'Classic Spaghetti Bolognese', 'No Preference', 'Spaghetti, ground beef, onion, garlic, tomato sauce, Worcestershire sauce, Italian seasoning, olive oil, salt, black pepper', '00:00:40', NULL),
(21, 'Pasta Alfredo with Chicken', 'No Preference', 'Fettuccine, chicken breast, heavy cream, Parmesan cheese, garlic, butter, parsley, salt, black pepper', '00:00:30', NULL),
(22, 'Spinach and Ricotta Stuffed Shells', 'No Preference', 'Jumbo pasta shells, ricotta cheese, spinach, mozzarella cheese, Parmesan cheese, egg, garlic powder, marinara sauce, salt, black pepper', '00:00:45', NULL),
(23, 'Creamy Carbonara', 'No Preference', 'Spaghetti, bacon, eggs, Parmesan cheese, garlic, black pepper, heavy cream', '00:00:25', NULL),
(24, 'Roasted Chicken Breast with Asparagus', 'low-sodium', 'Chicken breast, asparagus, olive oil, garlic, lemon, black pepper', '00:00:35', NULL),
(25, 'Spinach and Feta Stuffed Bell Peppers', 'low-sodium', 'Bell peppers, spinach, feta cheese, onion, garlic, olive oil, black pepper', '00:00:40', NULL),
(26, 'Lentil Soup with Spinach', 'low-sodium', 'Lentils, spinach, carrots, celery, onion, garlic, low sodium vegetable broth, cumin, coriander, bay leaf', '00:00:45', NULL),
(28, 'Fish Amandine', 'Gluten-free', 'skinless tilapia, trout or halibut fillets, buttermilk, bread crumbs, parsley, salt, dry mustard, Parmesan cheese, butter, crushed red pepper', '00:00:20', NULL),
(29, 'fish a', 'Heart-healthy', 'testing', '00:00:20', 'Images/fish-amandine.jpg'),
(30, 'Fruit Bowl', 'No-preference', 'fruits', '00:00:10', 'Images/Fresh-Fruit-Bowl-1.jpg'),
(31, 'Roasted Root Veggies', 'Gluten-free', 'carrots, red peppers, green peppers, salt, olive oil, beets, onions', '00:00:25', 'Images/roasted-root-vegetables.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list`
--

CREATE TABLE `shopping_list` (
  `item_id` int(11) NOT NULL,
  `meal_id` int(11) DEFAULT NULL,
  `ingredient_name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT '1',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_lists`
--

CREATE TABLE `shopping_lists` (
  `list_id` varchar(36) NOT NULL,
  `user_id` int(11) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `item_name` varchar(266) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_lists`
--

INSERT INTO `shopping_lists` (`list_id`, `user_id`, `list_name`, `item_name`, `quantity`, `created_at`) VALUES
('1', 9, 'weekend', '0', 0, '2024-04-16 01:38:15'),
('2', 9, 'monday', '0', 0, '2024-04-16 01:42:27'),
('3', 9, 'list-1', '0', 3, '2024-04-16 04:23:48'),
('4', 9, 'list-1', '0', 4, '2024-04-16 04:24:10'),
('5', 9, 'list-1', '0', 2, '2024-04-16 04:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(5, 'wendy3', 'wendyy@yahoo.com', '$2y$10$r7nQ1YKu4dmCTUgDHhOZaeK0xjmiOgl0p/noCVC7D94lpfG7IEGue'),
(6, 'erick2', 'erick2@hotmail.com', '$2y$10$wIviqTs1/4bsFtsLNJkFMODM5Fx3YXA9c/7JvCc5Sm0laRRFiZice'),
(7, '123', '123@yahoo.com', '$2y$10$TB5JyVbdIg84WatTkHBPJuDy//NiwodrQ3lIBn3FoLUjjISsqtJLa'),
(8, 'whyisntthisworking', 'whyisntthisworking@hotmail.com', '$2y$10$6/F9tO.d/jqhCFOeaau0Yu/MNbNs6lJVRUEMPOOXJEH3Xle62cwV6'),
(9, 'taragirl', 'tarawalker@yahoo.com', '$2y$10$4xEqxYzwgk7B.AD9va9gWO42yjCYEtkpHrQl96jpTAWMy8l/cnhb2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `diet_categories`
--
ALTER TABLE `diet_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diet_categories`
--
ALTER TABLE `diet_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shopping_list`
--
ALTER TABLE `shopping_list`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`meal_id`);

--
-- Constraints for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  ADD CONSTRAINT `shopping_lists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
