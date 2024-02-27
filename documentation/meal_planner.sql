-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 22, 2024 at 07:55 AM
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
  `prep_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `meal_name`, `meal_category`, `ingredients`, `prep_time`) VALUES
(1, 'Grilled Salmon with Roasted Vegetables', 'Gluten-free', 'Salmon, bell peppers, zucchini, olive oil, salt, pepper', '00:30:00'),
(2, 'Quinoa Stuffed Bell Peppers', 'Gluten-free', 'Quinoa, bell peppers, black beans, corn, onion, tomato, cheese', '00:45:00'),
(3, 'Chicken and Vegetable Stir-Fry with Tamari Sauce', 'Gluten-free', 'Chicken, broccoli, bell peppers, snap peas, tamari sauce, garlic, ginger, sesame oil', '00:25:00'),
(4, 'Lentil Soup with Spinach and Carrots', 'Gluten-free', 'Lentils, spinach, carrots, onion, garlic, vegetable broth, cumin, salt, pepper', '01:00:00'),
(5, 'Zucchini Noodles with Pesto and Cherry Tomatoes', 'Gluten-free', 'Zucchini, basil pesto, cherry tomatoes, pine nuts, Parmesan cheese, olive oil, garlic', '00:20:00'),
(6, 'Baked Chicken with Sweet Potato Wedges', 'Gluten-free', 'Chicken, sweet potatoes, olive oil, paprika, garlic powder, salt, pepper', '00:40:00'),
(7, 'Shrimp and Avocado Salad with Citrus Dressing', 'Gluten-free', 'Shrimp, avocado, mixed greens, cherry tomatoes, red onion, lime juice, olive oil, honey, salt, pepper', '00:15:00'),
(8, 'Turkey Chili with Black Beans and Corn', 'Gluten-free', 'Ground turkey, black beans, corn, onion, bell pepper, tomatoes, chili powder, cumin, paprika, salt, pepper', '01:30:00'),
(9, 'Spinach and Feta Stuffed Chicken Breast', 'Gluten-free', 'Chicken breast, spinach, feta cheese, garlic, lemon juice, olive oil, salt, pepper', '00:35:00'),
(10, 'Cauliflower Fried Rice with Mixed Vegetables', 'Gluten-free', 'Cauliflower, mixed vegetables (carrots, peas, corn), eggs, soy sauce, sesame oil, garlic, ginger', '00:25:00'),
(11, 'Gluten-Free Pizza with Tomato Sauce and Fresh Basil', 'Gluten-free', 'Gluten-free pizza crust, tomato sauce, mozzarella cheese, fresh basil, olive oil, garlic powder', '00:30:00'),
(12, 'Eggplant Parmesan with Marinara Sauce', 'Gluten-free', 'Eggplant, gluten-free breadcrumbs, Parmesan cheese, marinara sauce, mozzarella cheese, olive oil, salt, pepper', '01:00:00'),
(13, 'Tofu and Vegetable Curry with Coconut Milk', 'Gluten-free', 'Tofu, mixed vegetables (bell peppers, broccoli, carrots), coconut milk, curry paste, garlic, ginger, soy sauce', '00:45:00'),
(14, 'Steak Lettuce Wraps with Sautéed Mushrooms', 'Gluten-free', 'Steak, lettuce leaves, mushrooms, onion, garlic, soy sauce, sesame oil, rice vinegar', '00:35:00'),
(15, 'Quinoa Salad with Cucumber, Tomato, and Feta Cheese', 'Gluten-free', 'Quinoa, cucumber, tomato, red onion, feta cheese, lemon juice, olive oil, salt, pepper', '00:20:00'),
(16, 'Greek Yogurt Parfait with Mixed Berries and Almonds', 'High-protein', 'Greek yogurt, mixed berries (strawberries, blueberries, raspberries), almonds', '00:05:00'),
(17, 'Tuna Salad Wrap', 'High-protein', 'Canned tuna, Greek yogurt, celery, red onion, lemon juice, whole grain wrap, lettuce, tomato, avocado', '00:10:00'),
(18, 'Chicken and Vegetable Stir-Fry', 'High-protein', 'Chicken breast, mixed vegetables (bell peppers, broccoli, snap peas), soy sauce, garlic, quinoa or brown rice', '00:15:00'),
(19, 'Egg and Spinach Omelette', 'High-protein', 'Eggs, spinach, cheese, oil, whole grain toast', '00:10:00');

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
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
