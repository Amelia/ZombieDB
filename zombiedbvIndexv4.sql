-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2011 at 01:52 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zombiedb`
--
CREATE DATABASE `zombiedb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zombiedb`;

-- --------------------------------------------------------

--
-- Table structure for table `building_types`
--

CREATE TABLE IF NOT EXISTS `building_types` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_type` varchar(20) DEFAULT NULL,
  `safety_rating` int(11) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=6 ;

--
-- Dumping data for table `building_types`
--

INSERT INTO `building_types` (`building_id`, `building_type`, `safety_rating`, `reasoning`) VALUES
(1, 'Gazebo', 1, 'Generally, during a zombie apocalypse, its a good idea to choose a shelter with walls.'),
(2, 'Underground Bunker', 10, 'If they can figure out where you are, there are limited access points - provided your zombies donâ€™t have superhuman tunneling capabilities.'),
(3, 'House', 4, 'The security of houses can vary; but with windows and doors, there are too many points of entry to make one truly safe from zombies.'),
(4, 'Jail', 9, 'Although theyâ€™re meant to keep people in, theyâ€™re great for keeping zombies out. Watch towers give you a combative edge, and the high barbed wire fences keep undead invaders at bay.'),
(5, 'Office Building', 6, 'Office buildings have as many (if not more) windows and doors as houses. However, their height gives you tactical advantage; you can see them coming and take defensive measures.');

-- --------------------------------------------------------

--
-- Table structure for table `safe_zones`
--

CREATE TABLE IF NOT EXISTS `safe_zones` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_number` int(11) DEFAULT NULL,
  `street_address` varchar(35) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `building_type` varchar(25) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `safe_zones`
--

INSERT INTO `safe_zones` (`zone_id`, `street_number`, `street_address`, `city`, `state`, `building_type`, `status`, `last_updated`) VALUES
(1, 203, 'Safe Haven St.', 'Happy Hills', 'VA', 'House', 'T', '2011-02-22'),
(2, 1301, 'College Ave., Trinkle Basement', 'Fredericksburg', 'VA', 'Underground Bunker', 'T', '2011-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(25) DEFAULT NULL,
  `website` varchar(40) DEFAULT NULL,
  `corporate_number` char(15) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `store_name`, `website`, `corporate_number`) VALUES
(1, 'Walmart', 'www.walmart.com', '1-800-925-6278'),
(2, 'Gander Mountain', 'www.gandermountain.com', '888-5GANDER'),
(3, 'Lowe''s', 'www.lowes.com', '336-658-4000'),
(4, 'Zombies R Us', 'www.zombiesrus.com', '866-ZOMBIES');

-- --------------------------------------------------------

--
-- Table structure for table `supply_list`
--

CREATE TABLE IF NOT EXISTS `supply_list` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) DEFAULT NULL,
  `item_type` varchar(15) DEFAULT NULL,
  `priority_status` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `usage` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `supply_list`
--

INSERT INTO `supply_list` (`item_id`, `item_name`, `item_type`, `priority_status`, `quantity`, `usage`) VALUES
(1, 'bandages', 'medical', 8, 10, 'Surviving a zombie apocalypse is bound to leave you with a few gaping wounds. Control bleeding and keep cuts clean with fresh bandages.'),
(2, 'flint', 'generic', 8, 1, 'Paired with steel, flint means fire, which (as we all know) is crucial to survival in dealings with the undead. Use the flames you make for cooking, light, warmth, or weaponry.'),
(3, 'steel', 'generic', 8, 1, 'Paired with flint, steel means fire, which (as we all know) is crucial to survival in dealings with the undead. Use the flames you make for cooking, light, warmth, or weaponry.'),
(4, 'iodine tablets', 'generic', 7, 50, 'It might be something in the water!! Use iodine tablets to quickly and conveniently sanitize your drinking water.'),
(5, 'MRE', 'generic', 10, 15, 'Escaping swarms of killer zombies can be draining. Calorie-packed MREs will keep you energized and on your toes.'),
(6, 'lighter', 'generic', 10, 3, 'Lighters are quicker and less cumbersome than flint and steel - problem is they have limited use, so stock up'),
(7, 'clean shirt', 'generic', 2, 1, 'You have bigger things to worry about than laundry, leave the clean clothes behind - you can only carry so much.'),
(8, 'radio', 'generic', 8, 1, 'Youâ€™ll need a means of contacting other survivors. Radios are a bit bulky, but they are worth the space they take up.'),
(9, 'hydrogen peroxide', 'medical', 8, 1, 'Keep your wounds clean and stave off infection with this antiseptic.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL DEFAULT '',
  `password` char(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`username`),
  KEY `user_id` (`user_id`),
  KEY `user_index` (`username`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(5, 'admin', '4f57181dcaade980555f2ce6755ca425f00658be');

-- --------------------------------------------------------

--
-- Table structure for table `weapon_firearm_preferences`
--

CREATE TABLE IF NOT EXISTS `weapon_firearm_preferences` (
  `weapon_firearm_preference_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firearm_id` int(11) NOT NULL,
  PRIMARY KEY (`weapon_firearm_preference_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `firearm_id` (`firearm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=6 ;

--
-- Dumping data for table `weapon_firearm_preferences`
--


-- --------------------------------------------------------

--
-- Table structure for table `weapon_preferences`
--

CREATE TABLE IF NOT EXISTS `weapon_preferences` (
  `weapon_preference_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `weapon_id` int(11) NOT NULL,
  PRIMARY KEY (`weapon_preference_id`),
  KEY `weapon_id` (`weapon_id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=7 ;

--
-- Dumping data for table `weapon_preferences`
--


-- --------------------------------------------------------

--
-- Table structure for table `weapons_firearms`
--

CREATE TABLE IF NOT EXISTS `weapons_firearms` (
  `firearm_id` int(11) NOT NULL AUTO_INCREMENT,
  `weapon_name` varchar(255) DEFAULT NULL,
  `caliber` varchar(30) DEFAULT NULL,
  `rounds_per_reload` int(11) DEFAULT NULL,
  `usage` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`firearm_id`),
  KEY `firearms_index` (`weapon_name`,`firearm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `weapons_firearms`
--

INSERT INTO `weapons_firearms` (`firearm_id`, `weapon_name`, `caliber`, `rounds_per_reload`, `usage`) VALUES
(1, 'magnum revolver', '.45', 6, 'A good choice for exploding zombie heads like a cowboy - yeehaw!'),
(2, 'glock', '9mm', 15, 'Ammo is cheap and the magazine is large. Great choice for zombie encounters that are up close and personal!'),
(3, 'Barrett M107A1', '.50', 10, 'The perfect choice for long distance zombie defense. BOOM headshot!'),
(4, 'Remington 870', '12 guage', 5, 'Lock and load with this pump action gem. Now you see ''em, now you don''t!'),
(5, 'M249 SAW', '5.56', 300, 'Is your lawn riddled with unwanted undead? Mow them down without breaking a sweat!');

-- --------------------------------------------------------

--
-- Table structure for table `weapons_general`
--

CREATE TABLE IF NOT EXISTS `weapons_general` (
  `weapon_id` int(11) NOT NULL AUTO_INCREMENT,
  `weapon_name` varchar(25) DEFAULT NULL,
  `weapon_type` varchar(15) DEFAULT NULL,
  `durability` varchar(30) DEFAULT NULL,
  `usage` varchar(240) DEFAULT NULL,
  `maintenance` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`weapon_id`),
  KEY `generalWep_index` (`weapon_name`,`weapon_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `weapons_general`
--

INSERT INTO `weapons_general` (`weapon_id`, `weapon_name`, `weapon_type`, `durability`, `usage`, `maintenance`) VALUES
(1, 'machete', 'blade', '7', 'For slicing, hacking or stabbing zombies. Can also be used for generic survival tasks.', 'regular sharpening'),
(2, 'metal pipe', 'cudgel', '10', 'Bash and smash zombie heads like your favorite plumber!', 'none'),
(3, 'katana', 'blade', '5', 'A daintier alternative to the machete. Slice and dice your zombies ninja style!', 'sharpening'),
(4, 'chainsaw', 'blade', '3', 'An unwieldy but effective means of tearing up the undead. Also potentially useful for building shelters.', 'greasing, refueling, replacing chains'),
(5, 'axe', 'blade', '8', 'For chopping and lopping zombie bits. A generally handy survival tool.', 'sharpening'),
(6, 'grenade', 'explosive', '1', 'Fire in the hole! Just pull the pin and you''re done!', 'none'),
(7, 'molotov cocktail', 'explosive', '1', 'Do you like your zombies well-done? Invite your fellow survivors for s''mores!', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `z_book_preferences`
--

CREATE TABLE IF NOT EXISTS `z_book_preferences` (
  `book_preference_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`book_preference_id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_book_preferences`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_books`
--

CREATE TABLE IF NOT EXISTS `z_books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `author_firstname` varchar(15) DEFAULT NULL,
  `author_lastname` varchar(20) DEFAULT NULL,
  `page_count` int(11) DEFAULT NULL,
  `year_published` int(11) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`book_id`,`isbn`),
  KEY `book_id` (`book_id`),
  KEY `book_index` (`title`,`book_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `z_books`
--

INSERT INTO `z_books` (`book_id`, `isbn`, `title`, `author_firstname`, `author_lastname`, `page_count`, `year_published`, `reasoning`) VALUES
(1, '978-1400049622', 'The Zombie Survival Guide: Complete Protection fro', NULL, NULL, 288, 2003, 'Survival Guide'),
(2, '978-0060931841', 'World War Z: An Oral History of the Zombie War', NULL, NULL, 352, 2007, 'Zombie War Information'),
(3, '978-1402220128', 'Zombies for Zombies: Advice and Etiquette for the ', NULL, NULL, 272, 2009, 'Guide for Zombie Etiquette'),
(4, '978-1453720011', 'A Zombie Apocalypse', NULL, NULL, 70, 2010, NULL),
(5, '978-0982949597', 'The Dying Times (a zombie apocalypse novel)', NULL, NULL, 282, 2010, NULL),
(6, '978-0452296398', 'You Might Be a Zombie and Other Bad News: Shocking', NULL, NULL, 320, 2010, 'Zombie Identification'),
(7, '978-1449564872', 'The Zombie Survival Guide: How to Live Like a King', NULL, NULL, 128, 2009, 'Survival Guide'),
(8, '978-0307405777', 'The Zombie Survival Guide: Recorded Attacks ', NULL, NULL, 144, 2009, 'Survival Guide');

-- --------------------------------------------------------

--
-- Table structure for table `z_film_preferences`
--

CREATE TABLE IF NOT EXISTS `z_film_preferences` (
  `film_preference_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`film_preference_id`),
  KEY `film_id` (`film_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_film_preferences`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_films`
--

CREATE TABLE IF NOT EXISTS `z_films` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `mpaa_rating` varchar(4) DEFAULT NULL,
  `run_time` int(4) DEFAULT NULL,
  `year_released` int(4) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`film_id`),
  KEY `film_index` (`title`,`film_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `z_films`
--

INSERT INTO `z_films` (`film_id`, `title`, `mpaa_rating`, `run_time`, `year_released`, `reasoning`) VALUES
(1, 'Dawn of the Dead', 'R', 101, 2004, 'This movie will prepare you for the worst and make you ready for anything in your own fight for survival - the first ten minutes of Dawn of the Dead gives this remake possibly one of the scariest openings in zombie film history. '),
(2, 'The Return of the Living Dead', 'R', 91, 1985, 'The Return of the Living Dead will help you know your enemy as it introduces an important theory on zombie creation. This film suggests the undead are the result of a toxic disaster which leaves its v'),
(3, 'White Zombie', 'UR', 69, 1932, 'If you need to know about zombies, why not go to the movie that started it all? This 1932 film boasts the original undead and introduces the first zombie creation theory as a man transforms humans into zombies with his mind.'),
(4, '28 Days Later', 'R', 113, 2002, 'This film offers the first modern revision in the portrayal of zombie abilities. Rather than showing sluggish undead limping after their prey, these zombies can book it. A good film to prepare you for zombies who are quick on their feet.'),
(5, 'Day of the Dead', 'UR', 102, 1985, 'You survived the first wave of undead, but now what? Day of the Dead offers a look at the the breakdown of social and government order one can expect in the event of a zombie epidemic.');

-- --------------------------------------------------------

--
-- Table structure for table `z_game_preferences`
--

CREATE TABLE IF NOT EXISTS `z_game_preferences` (
  `game_preference_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`game_preference_id`),
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_game_preferences`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_games`
--

CREATE TABLE IF NOT EXISTS `z_games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `esrb_rating` varchar(5) DEFAULT NULL,
  `year_released` int(11) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`game_id`),
  KEY `game_index` (`title`,`game_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `z_games`
--

INSERT INTO `z_games` (`game_id`, `title`, `esrb_rating`, `year_released`, `reasoning`) VALUES
(1, 'Dead Rising', 'M', 2006, 'Trapped in a mall with a zombie horde, anything can be a weapon. This game will make you an anti-zombie MacGyver!'),
(2, 'Left 4 Dead', 'M', 2008, 'You canâ€™t do it alone - learn how to fight off zombies with a team of fellow survivors!'),
(3, 'Stubbs the Zombie', 'M', 2005, 'Get inside the mind of your enemy! This game puts you in the shoes of a brain-devouring zombie.'),
(4, 'Resident Evil', 'M', 1996, 'This game will teach you to manage your resources as ammo is scarce and medical supplies are limited.'),
(5, 'Zombies Ate My Neighbors', 'E10+', 1993, 'Be a good neighbor! Saving people is always good, especially during a zombie apocalypse.'),
(6, 'The House of the Dead', 'NR', 1996, 'Get out the old light gun and brush up on your shot - accuracy is key if you plan on surviving swarms of undead.');

-- --------------------------------------------------------

--
-- Table structure for table `z_sites`
--

CREATE TABLE IF NOT EXISTS `z_sites` (
  `website_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(40) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`website_id`),
  KEY `site_index` (`site_name`,`website_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `z_sites`
--

INSERT INTO `z_sites` (`website_id`, `site_name`, `url`, `reasoning`) VALUES
(1, 'Zombie Survival & Defense Wiki - Zombie ', 'www.zombiesurvivalwiki.com', 'Survival Guide'),
(2, 'Zombie Survival', 'www.zombiehub.com/zombie-survival.html', 'Survival Guide'),
(3, 'Zombie apocalypse', 'http://en.wikipedia.org/wiki/Zombie_apocalypse', 'Apocalypse Information'),
(4, '5 Scientific Reasons a Zombie Apocalypse', 'http://snipurl.com/246th0', NULL),
(5, 'The Ultimate Zombie Apocalypse Survival ', 'http://zomboid.com/zombie/', 'Survival Guide');
