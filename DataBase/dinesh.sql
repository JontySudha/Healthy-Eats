-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 12:18 PM
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
-- Database: `dinesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `diet_type` varchar(50) NOT NULL,
  `meal_type` varchar(50) NOT NULL,
  `day` varchar(20) NOT NULL,
  `meal` varchar(20) NOT NULL,
  `meal_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `diet_type`, `meal_type`, `day`, `meal`, `meal_description`) VALUES
(1, 'muscle_gain', 'veg', 'Monday', 'Breakfast', 'Oatmeal with fruits and nuts'),
(2, 'muscle_gain', 'veg', 'Monday', 'Lunch', 'Mixed bean salad with avocado and lime dressing'),
(3, 'muscle_gain', 'veg', 'Monday', 'Dinner', 'Stir-fried vegetables with brown rice'),
(4, 'muscle_gain', 'veg', 'Tuesday', 'Breakfast', 'Stir-fried vegetables with brown rice'),
(5, 'muscle_gain', 'veg', 'Tuesday', 'Lunch', 'Mediterranean salad with chickpeas and olives'),
(6, 'muscle_gain', 'veg', 'Tuesday', 'Dinner', 'Vegetable stir-fry with tofu and brown rice'),
(7, 'muscle_gain', 'veg', 'Wednesday', 'Breakfast', 'Greek yogurt with berries and honey'),
(8, 'muscle_gain', 'veg', 'Wednesday', 'Lunch', 'Vegetable curry with lentils and naan bread'),
(9, 'muscle_gain', 'veg', 'Wednesday', 'Dinner', 'Spaghetti squash with marinara sauce and vegan meatballs'),
(10, 'muscle_gain', 'veg', 'Thursday', 'Breakfast', 'Smoothie with protein powder, spinach, and almond milk'),
(11, 'muscle_gain', 'veg', 'Thursday', 'Lunch', 'Baked cod with couscous and steamed asparagus'),
(12, 'muscle_gain', 'veg', 'Thursday', 'Dinner', 'Vegetarian chili with cornbread'),
(13, 'muscle_gain', 'veg', 'Friday', 'Breakfast', 'Whole wheat pancakes with berries and maple syrup'),
(14, 'muscle_gain', 'veg', 'Friday', 'Lunch', 'Chickpea and vegetable stew with quinoa'),
(15, 'muscle_gain', 'veg', 'Friday', 'Dinner', 'Lentil and vegetable curry with brown rice'),
(16, 'muscle_gain', 'veg', 'Saturday', 'Breakfast', 'Avocado and tomato toast'),
(17, 'muscle_gain', 'veg', 'Saturday', 'Lunch', 'Tofu and vegetable kebabs with quinoa salad'),
(18, 'muscle_gain', 'veg', 'Saturday', 'Dinner', 'Grilled vegetable kebabs with couscous'),
(19, 'muscle_gain', 'veg', 'Sunday', 'Breakfast', 'Yogurt parfait with granola and fresh berries'),
(20, 'muscle_gain', 'veg', 'Sunday', 'Lunch', 'Quinoa and black bean burgers with sweet potato fries'),
(21, 'muscle_gain', 'veg', 'Sunday', 'Dinner', 'Roasted vegetable and chickpea curry with rice'),
(22, 'muscle_gain', 'vegan', 'Monday', 'Breakfast', 'Smoothie with kale, banana, and almond milk'),
(23, 'muscle_gain', 'vegan', 'Monday', 'Lunch', 'Chickpea salad wrap with hummus'),
(24, 'muscle_gain', 'vegan', 'Monday', 'Dinner', 'Stir-fried tofu with vegetables and brown rice'),
(25, 'muscle_gain', 'vegan', 'Tuesday', 'Breakfast', 'Chia seed pudding with coconut milk and berries'),
(26, 'muscle_gain', 'vegan', 'Tuesday', 'Lunch', 'Quinoa stuffed bell peppers'),
(27, 'muscle_gain', 'vegan', 'Tuesday', 'Dinner', 'Lentil soup with whole grain bread'),
(28, 'muscle_gain', 'vegan', 'Wednesday', 'Breakfast', 'Vegan pancakes with maple syrup'),
(29, 'muscle_gain', 'vegan', 'Wednesday', 'Lunch', 'Black bean and sweet potato tacos'),
(30, 'muscle_gain', 'vegan', 'Wednesday', 'Dinner', 'Roasted vegetable and quinoa salad'),
(31, 'muscle_gain', 'vegan', 'Thursday', 'Breakfast', 'Avocado toast with tomatoes and balsamic glaze'),
(32, 'muscle_gain', 'vegan', 'Thursday', 'Lunch', 'Tempeh stir-fry with broccoli and cashews'),
(33, 'muscle_gain', 'vegan', 'Thursday', 'Dinner', 'Coconut curry with tofu and vegetables'),
(34, 'muscle_gain', 'vegan', 'Friday', 'Breakfast', 'Green smoothie with spinach, mango, and coconut water'),
(35, 'muscle_gain', 'vegan', 'Friday', 'Lunch', 'Vegan Caesar salad with tofu croutons'),
(36, 'muscle_gain', 'vegan', 'Friday', 'Dinner', 'Chickpea and vegetable curry with quinoa'),
(37, 'muscle_gain', 'vegan', 'Saturday', 'Breakfast', 'Acai bowl with granola and fresh fruit'),
(38, 'muscle_gain', 'vegan', 'Saturday', 'Lunch', 'Falafel wrap with tahini sauce and salad'),
(39, 'muscle_gain', 'vegan', 'Saturday', 'Dinner', 'Spaghetti squash with marinara and vegan meatballs'),
(40, 'muscle_gain', 'vegan', 'Sunday', 'Breakfast', 'Vegan French toast with berries and maple syrup'),
(41, 'muscle_gain', 'vegan', 'Sunday', 'Lunch', 'Veggie burger with sweet potato fries'),
(42, 'muscle_gain', 'vegan', 'Sunday', 'Dinner', 'Stuffed portobello mushrooms with quinoa'),
(43, 'muscle_gain', 'non_veg', 'Monday', 'Breakfast', 'Egg and avocado toast'),
(44, 'muscle_gain', 'non_veg', 'Monday', 'Lunch', 'Grilled salmon with sweet potato and asparagus'),
(45, 'muscle_gain', 'non_veg', 'Monday', 'Dinner', 'Beef steak with roasted vegetables'),
(46, 'muscle_gain', 'non_veg', 'Tuesday', 'Breakfast', 'Protein shake with fruits and spinach'),
(47, 'muscle_gain', 'non_veg', 'Tuesday', 'Lunch', 'Chicken Caesar salad'),
(48, 'muscle_gain', 'non_veg', 'Tuesday', 'Dinner', 'Pasta with shrimp and garlic'),
(49, 'muscle_gain', 'non_veg', 'Wednesday', 'Breakfast', 'Scrambled eggs with whole grain toast'),
(50, 'muscle_gain', 'non_veg', 'Wednesday', 'Lunch', 'Turkey and cheese sandwich with mixed greens'),
(51, 'muscle_gain', 'non_veg', 'Wednesday', 'Dinner', 'Grilled chicken with quinoa and steamed broccoli'),
(52, 'muscle_gain', 'non_veg', 'Thursday', 'Breakfast', 'Greek yogurt with nuts and honey'),
(53, 'muscle_gain', 'non_veg', 'Thursday', 'Lunch', 'Salmon salad with avocado and tomatoes'),
(54, 'muscle_gain', 'non_veg', 'Thursday', 'Dinner', 'Steak fajitas with peppers and onions'),
(55, 'muscle_gain', 'non_veg', 'Friday', 'Breakfast', 'Whole wheat pancakes with berries and maple syrup'),
(56, 'muscle_gain', 'non_veg', 'Friday', 'Lunch', 'Grilled tuna with quinoa and roasted vegetables'),
(57, 'muscle_gain', 'non_veg', 'Friday', 'Dinner', 'Lamb chops with couscous and grilled asparagus'),
(58, 'muscle_gain', 'non_veg', 'Saturday', 'Breakfast', 'Omelette with mushrooms and cheese'),
(59, 'muscle_gain', 'non_veg', 'Saturday', 'Lunch', 'Fish tacos with slaw and avocado'),
(60, 'muscle_gain', 'non_veg', 'Saturday', 'Dinner', 'Roast chicken with sweet potato and green beans'),
(61, 'muscle_gain', 'non_veg', 'Sunday', 'Breakfast', 'Bacon and eggs with toast'),
(62, 'muscle_gain', 'non_veg', 'Sunday', 'Lunch', 'Pasta with chicken and pesto sauce'),
(63, 'muscle_gain', 'non_veg', 'Sunday', 'Dinner', 'Beef stew with potatoes and carrots'),
(64, 'fat_loss', 'veg', 'Monday', 'Breakfast', 'Smoothie with spinach, kale, and protein powder'),
(65, 'fat_loss', 'veg', 'Monday', 'Lunch', 'Grilled vegetables with quinoa'),
(66, 'fat_loss', 'veg', 'Monday', 'Dinner', 'Stuffed bell peppers with lentils and brown rice'),
(67, 'fat_loss', 'veg', 'Tuesday', 'Breakfast', 'Greek yogurt with berries and chia seeds'),
(68, 'fat_loss', 'veg', 'Tuesday', 'Lunch', 'Salad with grilled tofu and vinaigrette'),
(69, 'fat_loss', 'veg', 'Tuesday', 'Dinner', 'Zucchini noodles with marinara sauce'),
(70, 'fat_loss', 'veg', 'Wednesday', 'Breakfast', 'Omelette with mushrooms and spinach'),
(71, 'fat_loss', 'veg', 'Wednesday', 'Lunch', 'Cauliflower rice stir-fry with tofu'),
(72, 'fat_loss', 'veg', 'Wednesday', 'Dinner', 'Baked cod with steamed vegetables'),
(73, 'fat_loss', 'veg', 'Thursday', 'Breakfast', 'Avocado toast with tomatoes and poached egg'),
(74, 'fat_loss', 'veg', 'Thursday', 'Lunch', 'Quinoa salad with chickpeas and vegetables'),
(75, 'fat_loss', 'veg', 'Thursday', 'Dinner', 'Stir-fried vegetables with tempeh'),
(76, 'fat_loss', 'veg', 'Friday', 'Breakfast', 'Chia seed pudding with almond milk and berries'),
(77, 'fat_loss', 'veg', 'Friday', 'Lunch', 'Black bean and corn salad with lime dressing'),
(78, 'fat_loss', 'veg', 'Friday', 'Dinner', 'Spaghetti squash with marinara and grilled chicken'),
(79, 'fat_loss', 'veg', 'Saturday', 'Breakfast', 'Whole grain cereal with almond milk and fruit'),
(80, 'fat_loss', 'veg', 'Saturday', 'Lunch', 'Stuffed mushrooms with quinoa and spinach'),
(81, 'fat_loss', 'veg', 'Saturday', 'Dinner', 'Turkey chili with beans and vegetables'),
(82, 'fat_loss', 'veg', 'Sunday', 'Breakfast', 'Peanut butter and banana smoothie'),
(83, 'fat_loss', 'veg', 'Sunday', 'Lunch', 'Grilled portobello mushroom burger with salad'),
(84, 'fat_loss', 'veg', 'Sunday', 'Dinner', 'Vegetable curry with brown rice'),
(85, 'fat_loss', 'vegan', 'Monday', 'Breakfast', 'Vegan protein shake with berries and almond milk'),
(86, 'fat_loss', 'vegan', 'Monday', 'Lunch', 'Vegan sushi rolls with avocado and cucumber'),
(87, 'fat_loss', 'vegan', 'Monday', 'Dinner', 'Quinoa and vegetable stir-fry'),
(88, 'fat_loss', 'vegan', 'Tuesday', 'Breakfast', 'Coconut yogurt with granola and fruit'),
(89, 'fat_loss', 'vegan', 'Tuesday', 'Lunch', 'Sweet potato and black bean burrito bowl'),
(90, 'fat_loss', 'vegan', 'Tuesday', 'Dinner', 'Chickpea and vegetable curry'),
(91, 'fat_loss', 'vegan', 'Wednesday', 'Breakfast', 'Green smoothie with kale, pineapple, and coconut water'),
(92, 'fat_loss', 'vegan', 'Wednesday', 'Lunch', 'Mushroom and lentil stew'),
(93, 'fat_loss', 'vegan', 'Wednesday', 'Dinner', 'Roasted vegetable and quinoa salad'),
(94, 'fat_loss', 'vegan', 'Thursday', 'Breakfast', 'Acai bowl with almond butter and berries'),
(95, 'fat_loss', 'vegan', 'Thursday', 'Lunch', 'Tofu and vegetable stir-fry with brown rice'),
(96, 'fat_loss', 'vegan', 'Thursday', 'Dinner', 'Spaghetti squash with marinara and vegan meatballs'),
(97, 'fat_loss', 'vegan', 'Friday', 'Breakfast', 'Vegan pancakes with maple syrup and fruit'),
(98, 'fat_loss', 'vegan', 'Friday', 'Lunch', 'Cauliflower rice and black bean tacos'),
(99, 'fat_loss', 'vegan', 'Friday', 'Dinner', 'Stuffed bell peppers with quinoa and vegetables'),
(100, 'fat_loss', 'vegan', 'Saturday', 'Breakfast', 'Chia seed pudding with almond milk and berries'),
(101, 'fat_loss', 'vegan', 'Saturday', 'Lunch', 'Veggie burger with sweet potato fries'),
(102, 'fat_loss', 'vegan', 'Saturday', 'Dinner', 'Tofu and vegetable kebabs with quinoa'),
(103, 'fat_loss', 'vegan', 'Sunday', 'Breakfast', 'Oatmeal with almond milk, nuts, and berries'),
(104, 'fat_loss', 'vegan', 'Sunday', 'Lunch', 'Chickpea salad with tahini dressing'),
(105, 'fat_loss', 'vegan', 'Sunday', 'Dinner', 'Zucchini noodles with pesto and cherry tomatoes'),
(106, 'fat_loss', 'non_veg', 'Monday', 'Breakfast', 'Scrambled eggs with whole wheat toast'),
(107, 'fat_loss', 'non_veg', 'Monday', 'Lunch', 'Grilled chicken salad with balsamic vinaigrette'),
(108, 'fat_loss', 'non_veg', 'Monday', 'Dinner', 'Salmon with quinoa and roasted vegetables'),
(109, 'fat_loss', 'non_veg', 'Tuesday', 'Breakfast', 'Protein pancakes with berries and maple syrup'),
(110, 'fat_loss', 'non_veg', 'Tuesday', 'Lunch', 'Turkey and cheese sandwich with mixed greens'),
(111, 'fat_loss', 'non_veg', 'Tuesday', 'Dinner', 'Shrimp stir-fry with vegetables and brown rice'),
(112, 'fat_loss', 'non_veg', 'Wednesday', 'Breakfast', 'Greek yogurt with granola and honey'),
(113, 'fat_loss', 'non_veg', 'Wednesday', 'Lunch', 'Beef and vegetable stir-fry with noodles'),
(114, 'fat_loss', 'non_veg', 'Wednesday', 'Dinner', 'Grilled chicken with quinoa and steamed broccoli'),
(115, 'fat_loss', 'non_veg', 'Thursday', 'Breakfast', 'Bacon and eggs with whole wheat toast'),
(116, 'fat_loss', 'non_veg', 'Thursday', 'Lunch', 'Caesar salad with grilled shrimp'),
(117, 'fat_loss', 'non_veg', 'Thursday', 'Dinner', 'Pasta with meatballs and marinara sauce'),
(118, 'fat_loss', 'non_veg', 'Friday', 'Breakfast', 'Whole grain toast with avocado and poached egg'),
(119, 'fat_loss', 'non_veg', 'Friday', 'Lunch', 'Chicken and vegetable stir-fry with rice noodles'),
(120, 'fat_loss', 'non_veg', 'Friday', 'Dinner', 'Beef steak with baked potato and green beans'),
(121, 'fat_loss', 'non_veg', 'Saturday', 'Breakfast', 'Omelette with mushrooms, cheese, and spinach'),
(122, 'fat_loss', 'non_veg', 'Saturday', 'Lunch', 'Grilled fish with quinoa and steamed vegetables'),
(123, 'fat_loss', 'non_veg', 'Saturday', 'Dinner', 'Pork chops with mashed sweet potatoes and peas'),
(124, 'fat_loss', 'non_veg', 'Sunday', 'Breakfast', 'Sausage and hash browns with scrambled eggs'),
(125, 'fat_loss', 'non_veg', 'Sunday', 'Lunch', 'Spaghetti with meat sauce'),
(126, 'fat_loss', 'non_veg', 'Sunday', 'Dinner', 'Roast beef with roasted potatoes and carrots'),
(127, 'maintain', 'Veg', 'Monday', 'Breakfast', 'Whole grain cereal with almond milk and berries.'),
(128, 'maintain', 'Veg', 'Monday', 'Lunch', 'Mediterranean salad with olives and feta cheese.'),
(129, 'maintain', 'Veg', 'Monday', 'Dinner', 'Vegetable lasagna with marinara sauce and mixed greens.'),
(130, 'maintain', 'Veg', 'Tuesday', 'Breakfast', 'Avocado toast with cherry tomatoes and poached eggs.'),
(131, 'maintain', 'Veg', 'Tuesday', 'Lunch', 'Quinoa stuffed bell peppers with salsa.'),
(132, 'maintain', 'Veg', 'Tuesday', 'Dinner', 'Cauliflower rice stir-fry with tofu and vegetables.'),
(133, 'maintain', 'Veg', 'Wednesday', 'Breakfast', 'Greek yogurt with honey and mixed berries.'),
(134, 'maintain', 'Veg', 'Wednesday', 'Lunch', 'Spinach and mushroom omelette with whole wheat toast.'),
(135, 'maintain', 'Veg', 'Wednesday', 'Dinner', 'Stuffed zucchini boats with brown rice and marinara sauce.'),
(136, 'maintain', 'Veg', 'Thursday', 'Breakfast', 'Smoothie with spinach, banana, and almond milk.'),
(137, 'maintain', 'Veg', 'Thursday', 'Lunch', 'Caprese salad with whole grain bread.'),
(138, 'maintain', 'Veg', 'Thursday', 'Dinner', 'Vegetable stir-fry with tofu and quinoa.'),
(139, 'maintain', 'Veg', 'Friday', 'Breakfast', 'Oatmeal with almond butter and mixed berries.'),
(140, 'maintain', 'Veg', 'Friday', 'Lunch', 'Greek pasta salad with olives and cucumber.'),
(141, 'maintain', 'Veg', 'Friday', 'Dinner', 'Grilled vegetable kebabs with couscous.'),
(142, 'maintain', 'Veg', 'Saturday', 'Breakfast', 'Whole grain pancakes with maple syrup and berries.'),
(143, 'maintain', 'Veg', 'Saturday', 'Lunch', 'Quinoa salad with chickpeas, cucumber, and lemon dressing.'),
(144, 'maintain', 'Veg', 'Saturday', 'Dinner', 'Eggplant Parmesan with whole wheat spaghetti.'),
(145, 'maintain', 'Veg', 'Sunday', 'Breakfast', 'Smoothie bowl with mixed berries, granola, and coconut flakes.'),
(146, 'maintain', 'Veg', 'Sunday', 'Lunch', 'Mushroom and spinach quiche with side salad.'),
(147, 'maintain', 'Veg', 'Sunday', 'Dinner', 'Stir-fried vegetables with tofu and brown rice.'),
(148, 'maintain', 'Non Veg', 'Monday', 'Breakfast', 'Scrambled eggs with whole grain toast.'),
(149, 'maintain', 'Non Veg', 'Monday', 'Lunch', 'Grilled chicken breast with quinoa and mixed greens.'),
(150, 'maintain', 'Non Veg', 'Monday', 'Dinner', 'Baked fish with roasted vegetables and couscous.'),
(151, 'maintain', 'Non Veg', 'Tuesday', 'Breakfast', 'Protein smoothie with oats and almond milk.'),
(152, 'maintain', 'Non Veg', 'Tuesday', 'Lunch', 'Turkey burger with whole wheat bun and side salad.'),
(153, 'maintain', 'Non Veg', 'Tuesday', 'Dinner', 'Beef stir-fry with brown rice and vegetables.'),
(154, 'maintain', 'Non Veg', 'Wednesday', 'Breakfast', 'Greek yogurt with berries and nuts.'),
(155, 'maintain', 'Non Veg', 'Wednesday', 'Lunch', 'Tuna salad with mixed greens and vinaigrette.'),
(156, 'maintain', 'Non Veg', 'Wednesday', 'Dinner', 'Grilled shrimp with quinoa and steamed broccoli.'),
(157, 'maintain', 'Non Veg', 'Thursday', 'Breakfast', 'Cottage cheese with pineapple slices.'),
(158, 'maintain', 'Non Veg', 'Thursday', 'Lunch', 'Chicken stir-fry with brown rice and vegetables.'),
(159, 'maintain', 'Non Veg', 'Thursday', 'Dinner', 'Grilled salmon with sweet potato and mixed greens.'),
(160, 'maintain', 'Non Veg', 'Friday', 'Breakfast', 'Smoothie with spinach, banana, and almond milk.'),
(161, 'maintain', 'Non Veg', 'Friday', 'Lunch', 'Turkey wrap with whole wheat tortilla and side salad.'),
(162, 'maintain', 'Non Veg', 'Friday', 'Dinner', 'Baked chicken with quinoa and roasted vegetables.'),
(163, 'maintain', 'Non Veg', 'Saturday', 'Breakfast', 'Omelette with spinach, mushrooms, and cheese.'),
(164, 'maintain', 'Non Veg', 'Saturday', 'Lunch', 'Grilled chicken breast with quinoa and steamed vegetables.'),
(165, 'maintain', 'Non Veg', 'Saturday', 'Dinner', 'Beef steak with baked potato and green beans.'),
(166, 'maintain', 'Non Veg', 'Sunday', 'Breakfast', 'Pancakes with berries and maple syrup.'),
(167, 'maintain', 'Non Veg', 'Sunday', 'Lunch', 'Chickpea salad with mixed greens and lemon vinaigrette.'),
(168, 'maintain', 'Non Veg', 'Sunday', 'Dinner', 'Grilled shrimp with quinoa and sautéed spinach.'),
(169, 'maintain', 'Vegan', 'Monday', 'Breakfast', 'Smoothie bowl with mixed berries and chia seeds.'),
(170, 'maintain', 'Vegan', 'Monday', 'Lunch', 'Quinoa salad with black beans, corn, and avocado.'),
(171, 'maintain', 'Vegan', 'Monday', 'Dinner', 'Stuffed bell peppers with quinoa and vegetables.'),
(172, 'maintain', 'Vegan', 'Tuesday', 'Breakfast', 'Avocado toast with cherry tomatoes and hemp seeds.'),
(173, 'maintain', 'Vegan', 'Tuesday', 'Lunch', 'Chickpea and vegetable stir-fry with brown rice.'),
(174, 'maintain', 'Vegan', 'Tuesday', 'Dinner', 'Cauliflower fried rice with tofu and mixed vegetables.'),
(175, 'maintain', 'Vegan', 'Wednesday', 'Breakfast', 'Chia seed pudding with almond milk and berries.'),
(176, 'maintain', 'Vegan', 'Wednesday', 'Lunch', 'Mediterranean quinoa salad with olives and cucumbers.'),
(177, 'maintain', 'Vegan', 'Wednesday', 'Dinner', 'Tofu and vegetable stir-fry with soba noodles.'),
(178, 'maintain', 'Vegan', 'Thursday', 'Breakfast', 'Green smoothie with spinach, kale, and banana.'),
(179, 'maintain', 'Vegan', 'Thursday', 'Lunch', 'Crispy tofu with sesame ginger sauce and brown rice.'),
(180, 'maintain', 'Vegan', 'Thursday', 'Dinner', 'Stuffed sweet potatoes with black beans and salsa.'),
(181, 'maintain', 'Vegan', 'Friday', 'Breakfast', 'Oatmeal with almond butter and mixed berries.'),
(182, 'maintain', 'Vegan', 'Friday', 'Lunch', 'Chickpea and spinach curry with quinoa.'),
(183, 'maintain', 'Vegan', 'Friday', 'Dinner', 'Vegetable stir-fry with tofu and brown rice.'),
(184, 'maintain', 'Vegan', 'Saturday', 'Breakfast', 'Acai bowl with granola, coconut flakes, and fruit.'),
(185, 'maintain', 'Vegan', 'Saturday', 'Lunch', 'Mixed greens salad with grilled tempeh and balsamic dressing.'),
(186, 'maintain', 'Vegan', 'Saturday', 'Dinner', 'Lentil and vegetable stew with whole grain bread.'),
(187, 'maintain', 'Vegan', 'Sunday', 'Breakfast', 'Smoothie with mango, banana, and almond milk.'),
(188, 'maintain', 'Vegan', 'Sunday', 'Lunch', 'Quinoa salad with roasted vegetables and tahini dressing.'),
(189, 'maintain', 'Vegan', 'Sunday', 'Dinner', 'Vegan pasta primavera with tomato basil sauce.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `email`, `phone`, `password`) VALUES
('Dinesh', 'Dinesh_Sudha', 'dineshsudha2003@gmail.com', 6280155616, '123'),
('Jonty', 'Jonty_Sudha', 'jontysudha14@gmail.com', 123456, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
