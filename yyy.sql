-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 07:39 PM
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
-- Database: `yyy`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profile` longblob DEFAULT NULL,
  `confirm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `email`, `username`, `password`, `profile`, `confirm`) VALUES
(6, 'admin@gmail.com', 'admin', '$2y$10$zayKp5di787rNGMh/4qE7ODtiEXBxXbNkZzTDlx9r/W3tIOgumola', 0x75706c6f6164732f61646d696e2e6a7067, '12345'),
(7, 'clarhenceashley01@gmail.com', 'ashren', '$2y$10$Wr47QGpeLrjgvWOPXvYUeOrdlJ8mPnuZUucHgV0TM6tIiWiddoAJ6', 0x75706c6f6164732f6173682e6a7067, 'oliveros'),
(8, 'arthur@hotmail.com', 'morgan', '$2y$10$nT7u2HoVzQ0qYt.h2d12ye8LuDFFxLZzLNPR1l0GtfDj9PEm42NN6', 0x75706c6f6164732f6172746875722e6a7067, '1899'),
(10, 'sample@gmail.com', 'sample', '$2y$10$nxMJg5UdNKoE/raPI/pQDuk2EZwnx6Du2eKFb4tl2cjQY65SSqZaq', 0x75706c6f6164732f39613331313761633831333963393936303161656630396663616634363832392e6a7067, '12345'),
(11, 'marienorelynegomez@gmail.com', 'ohlaskie', '$2y$10$//iNxwKLXM.gNpWvhCntV.QPXD1fziIVhBISLWGKZA09lRqn4FXN6', 0x75706c6f6164732f39613331313761633831333963393936303161656630396663616634363832392e6a7067, '12345'),
(12, 'tzuyubaby07@gmail.com', 'plsp', '$2y$10$26S/q1ADDJZy9U8V49onau4AK73jz9cS4beqx2jc96oaZtZoA1HUS', 0x75706c6f6164732f616b6f2e6a7067, '12345'),
(13, 'riggsr56@gmail.com', 'JustineTimberlake', '$2y$10$bCai2TrVF5qBnrskQkZqsuI62u8.B./jvqRKw9OJLRtvYSwHZZuKq', 0x75706c6f6164732f5265612e706e67, 'Dec520028'),
(14, 'marienorelynegomez@gmail.com', 'gomez', '$2y$10$8LDfsQQQ7Dq/qQ6IUWGfbeeLC8Bf70A.4135wf73vDZphU.GfkF1W', 0x75706c6f6164732f4f686c612e706e67, '12345'),
(15, 'marienorelynegomez@gmail.com', 'marienorelyne', '$2y$10$9bNZFZRd9gCExjBi0.B4p.rMAkTQjG2VWCGpze29FwJwzgziD2Z.6', 0x75706c6f6164732f4f686c612e706e67, '12345'),
(16, 'riggsr56@gmail.com', 'Justine Riggs', '$2y$10$TX/wjA5OicTF86xqMpNxr.2nfAq2g7ODNw3a7x.6Fe/.v5A0NlKtS', 0x75706c6f6164732f5265612e706e67, '12345'),
(17, 'karasig@gmail.com', 'raedan', '$2y$10$.ItHWIcXZF1lN0yjJIo1MeS7KEZcu4hS9L509x4o2PQxgYh6G3leK', 0x75706c6f6164732f4964616e2e706e67, '12345'),
(18, 'john1914@gmail.com', 'Marston', '$2y$10$4KIYOuAbrSFconWCoAK33OUpFxCcrUXfKzPfwbxibfuzvDaUq9zQm', 0x75706c6f6164732f6a6d2e6a7067, 'milton');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `no.` int(10) NOT NULL,
  `profile` longblob DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `dateAT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`no.`, `profile`, `username`, `email`, `title`, `image`, `description`, `genre`, `dateAT`) VALUES
(17, 0x75706c6f6164732f6173682e6a7067, 'ashren', 'clarhenceashley01@gmail.com', 'Tortang Talong', 0x2e2e2f75706c6f6164656470686f746f2f746f7274612e706e67, 'Tortang Talong is a Filipino dish made of grilled eggplants and fluffy eggs. This Filipino-style omelet is easy to make with simple ingredients and in under 30 minutes.  It\'s an economical yet satisfying meal that pairs well with steamed rice.', 'Hot Takes', '2024-01-14 06:34:14'),
(18, 0x75706c6f6164732f5265612e706e67, 'Justine Riggs', 'riggsr56@gmail.com', 'Adobong Talong', 0x2e2e2f75706c6f6164656470686f746f2f61646f626f742e6a7067, 'Enjoy classic adobo flavors with this super easy and tasty Adobong Talong recipe! The pan-fried eggplants soak up the tangy, savory, and garlicky marinade for the perfect side dish!', 'Recipe', '2024-01-14 06:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `no` int(10) NOT NULL,
  `dishname` varchar(100) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `origin` varchar(100) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `steps` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`no`, `dishname`, `image`, `author`, `origin`, `genre`, `steps`) VALUES
(4, 'Toasty Cheesy Garlic Bread', 0x2e2e2f7265636970652f6761726c69632062726561642e6a7067, 'Remy Lindsay', 'Italy', 'Pastries', 'How To Make This Garlic Bread Step 1: Soften your butter. I do this in the microwave, in short increments, and then whisk it to get it smooth-ish. Cutting it into uniform chunks (like the photo above) will help it soften at an even rate.  Step 2: Grate that garlic right in there. My hot take: anything more than one clove is overpowering and generally unpleasant. Stop at one!  It doesn’t seem like it will be enough, but trust me. Even for me – a self-proclaimed garlic lover – one clove is plenty.  Step 3: Add Parmesan and parsley. Finely grated Parmesan cheese is where it’s at! That savory flavor and golden browning – YUM.  I also like to add a little bit of garlic powder at this point just to slightly extend my garlick-ing of things (but with more subtlety than fresh garlic).  Step 4: Spread that amazingness on your bread. I find this amount of butter mixture is good for half of a long loaf of French bread.  Step 5: Bake it! If you don’t want any browning, first of all, why? It’s delightful. Second of all, you’ll just want to go for more like 375 to 400 degrees for 7-10 minutes.  If you like it a little golden brown, like I do, with a bit of texture on top, shoot for 10 minutes at 400 to 425 degrees. Just keep an eye on it and nudge it up as needed.  Garlic bread slices on a cutting board. HOUSE FAVORITE GARLIC BREAD Author: Lindsay  Total Time: 15 minutes  Yield: 5 servings (about 2 pieces per person) × 1 Ingredients  half a loaf of French bread  1 stick (1/2 cup) salted butter, cut into chunks  1 large clove garlic  1/4 teaspoon garlic powder  1/2 cup finely grated Parmesan cheese  2 tablespoons minced fresh parsley Instructions Preheat the oven to 400 degrees.  Soften the butter in the microwave in short increments. I like to whisk it to get it smoothed out a bit. Grate the garlic directly into the butter. Add the garlic powder, Parmesan, and parsley; stir to combine. Cut the French bread in half and spread with the butter mixture (this amount of butter is good f'),
(5, 'Filipino Spaghetti', 0x2e2e2f7265636970652f737061672e6a7067, 'Marienorelyne Gomez', 'Philippines', 'Meats', 'How To Make This Filipino Spaghetti\r\nStep 1: Brown the hot dogs.\r\nFor an authentic feel, use Filipino \"red\" hot dogs. If not available, you can also use diced ham or sliced Vienna sausages to add a smoky flavor.\r\n\r\nStep 2: Brown the meat.\r\nCook the ground beef using the SAUTE feature on NORMAL. You can substitute with ground chicken or turkey for a leaner option.\r\n\r\nStep 3: Add Parmesan and parsley.\r\nFinely grated Parmesan cheese is where it’s at! That savory flavor and golden browning – YUM.\r\n\r\nI also like to add a little bit of garlic powder at this point just to slightly extend my garlick-ing of things (but with more subtlety than fresh garlic).\r\n\r\nStep 4: Spread that amazingness on your bread.\r\nI find this amount of butter mixture is good for half of a long loaf of French bread.\r\n\r\nStep 5: Bake it!\r\nIf you don’t want any browning, first of all, why? It’s delightful. Second of all, you’ll just want to go for more like 375 to 400 degrees for 7-10 minutes.\r\n\r\nIf you like it a little golden brown, like I do, with a bit of texture on top, shoot for 10 minutes at 400 to 425 degrees. Just keep an eye on it and nudge it up as needed.'),
(6, 'Creamy Pesto Pasta with Chicken', 0x2e2e2f7265636970652f437265616d792d506573746f2d50617374612d776974682d436869636b656e2e6a7067, 'Italian Chef', 'Italy', 'Pasta', 'How To Make This Creamy Pesto Pasta with Chicken\r\nStep 1: Prepare the pasta.\r\nGet a large pot of water going and make sure to salt the water generously when it boils. Allow the pasta to cook for a minute or two less than the package directions so that you can finish cooking the pasta in the sauce at the end. You’ll want to save a splash of pasta water before you drain the penne. Pasta cooking water is perfect for creating a silky, glossy sauce!\r\n\r\nStep 2: Season and sear the chicken.\r\nSprinkle both sides of the chicken with kosher salt, black pepper, and garlic powder. Add a drizzle of oil to a sauté pan (I like to use a cast iron casserole pan) and when it’s hot, cook the chicken, flipping halfway through until the chicken is done. Remove it to a cutting board or a plate and keep warm for later.\r\n\r\nStep 3: Make the sauce in the same pan.\r\nAdd the butter to the sauce pan and saute the garlic and red pepper flakes. When the garlic is fragrant, add the flour and stir to combine. You want to make sure to let the flour cook in the butter for at least a minute so you cook out the raw flavor. Then, slowly pour in the chicken broth as you whisk to scrape up all that stuck on flavor. Allow the chicken stock to heat through. The flour will cause the sauce to thicken. Then, pour in the half and half and pesto and stir to combine. Add parmesan cheese, let the sauce simmer, when the sauce starts to thicken, add the prepared pasta and broccoli to the sauce. You can also chop the chicken and add it right in or just slice and lay the chicken on top. It the pesto sauce gets too thick at any point, you can thin it out with a splash of pasta water.\r\n\r\nStep 4: Serve warm.\r\nI usually slice the chicken and serve it right on top– family style! You can also stir it all together and just serve in plates.'),
(7, 'Chocolate Chip Cookies', 0x2e2e2f7265636970652f43686f636f6c6174652d436869702d436f6f6b6965732d5265636970652e6a7067, 'Marzia', 'America', 'Pastries', 'How To Make This Chocolate Chip Cookies\r\nStep 1: Preheat Oven.\r\nPreheat Oven to 350 degrees and cover 3 cookie sheets with parchment paper or Silpat mats. Cream the butter and sugars together for 5 minutes until light and fluffy—this is the most important step to get a chewy cookie. Be sure to beat for the full amount of time!\r\n\r\nStep 2: Beat eggs.\r\nBeat eggs into the butter mixture one at a time followed by the vanilla extract.\r\n\r\nStep 3: Combine.\r\nCombine the dry ingredients (flour, salt, and sifted baking soda) in a separate bowl, and then add the dry ingredients into the wet ingredients in thirds. Finally, fold the chocolate chips into the dough. Be sure not to over-mix (this can cause the dough to become tough).\r\n\r\nStep 4: Roll.\r\nRoll balls of dough or use a trigger release scoop to scoop 3 Tbsp balls onto the prepared cookie sheets.\r\n\r\nStep 5: Bake.\r\nBake one cookie sheet at a time for 12-15 minutes. The tops should still look a bit wet and not browned. We usually bake 1/3 of the cookies at a time and refrigerate or freeze the rest for later, so see our tips below.\r\n\r\nStep 6: Rest.\r\nRest the cookies on the baking sheet for about 5 minutes, then transfer to a cooling rack. Store cookies in an airtight container on the counter for 5 days. To warm the cookies, try toasting in a toaster oven or baking at 350 for 2-3 minutes.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`no.`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `no.` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
