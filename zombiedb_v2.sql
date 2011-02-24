/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : zombiedb

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2011-02-22 22:10:20
*/

DROP DATABASE IF EXISTS `zombiedb`;
CREATE DATABASE IF NOT EXISTS `zombiedb`;
USE `zombiedb`;
GRANT ALL PRIVILEGES ON zombiedb.* to 'zombieUser'@'localhost' identified by 'zombie';

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `building_types`
-- ----------------------------
DROP TABLE IF EXISTS `building_types`;
CREATE TABLE `building_types` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_type` varchar(20) DEFAULT NULL,
  `safety_rating` int(11) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of building_types
-- ----------------------------
INSERT INTO `building_types` VALUES ('1', 'Gazebo', '1', 'Generally, during a zombie apocalypse, its a good idea to choose a shelter with walls.');
INSERT INTO `building_types` VALUES ('2', 'Underground Bunker', '10', 'If they can figure out where you are, there are limited access points - provided your zombies don’t have superhuman tunneling capabilities.');
INSERT INTO `building_types` VALUES ('3', 'House', '4', 'The security of houses can vary; but with windows and doors, there are too many points of entry to make one truly safe from zombies.');
INSERT INTO `building_types` VALUES ('4', 'Jail', '9', 'Although they’re meant to keep people in, they’re great for keeping zombies out. Watch towers give you a combative edge, and the high barbed wire fences keep undead invaders at bay.');
INSERT INTO `building_types` VALUES ('5', 'Office Building', '6', 'Office buildings have as many (if not more) windows and doors as houses. However, their height gives you tactical advantage; you can see them coming and take defensive measures.');

-- ----------------------------
-- Table structure for `safe_zones`
-- ----------------------------
DROP TABLE IF EXISTS `safe_zones`;
CREATE TABLE `safe_zones` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_number` int(11) DEFAULT NULL,
  `street_address` varchar(35) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `building_type` varchar(25) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of safe_zones
-- ----------------------------
INSERT INTO `safe_zones` VALUES ('1', '203', 'Safe Haven St.', 'Happy Hills', 'VA', 'House', 'T', '2011-02-22');
INSERT INTO `safe_zones` VALUES ('2', '1301', 'College Ave., Trinkle Basement', 'Fredericksburg', 'VA', 'Underground Bunker', 'T', '2011-02-22');

-- ----------------------------
-- Table structure for `stores`
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(25) DEFAULT NULL,
  `website` varchar(40) DEFAULT NULL,
  `corporate_number` char(10) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stores
-- ----------------------------
INSERT INTO `stores` VALUES ('1', 'Walmart', 'www.walmart.com', '1-800-925-');
INSERT INTO `stores` VALUES ('2', 'Gander Mountain', 'www.gandermountain.com', '888-5GANDE');
INSERT INTO `stores` VALUES ('3', 'Lowe\'s', 'www.lowes.com', '336-658-40');
INSERT INTO `stores` VALUES ('4', 'Zombies R Us', 'www.zombiesrus.com', '866-ZOMBIE');

-- ----------------------------
-- Table structure for `store_inventory`
-- ----------------------------
DROP TABLE IF EXISTS `store_inventory`;
CREATE TABLE `store_inventory` (
  `store_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `weapon_id` int(11) DEFAULT NULL,
  `firearm_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of store_inventory
-- ----------------------------

-- ----------------------------
-- Table structure for `supply_list`
-- ----------------------------
DROP TABLE IF EXISTS `supply_list`;
CREATE TABLE `supply_list` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) DEFAULT NULL,
  `item_type` varchar(15) DEFAULT NULL,
  `priority_status` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `usage` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supply_list
-- ----------------------------
INSERT INTO `supply_list` VALUES ('1', 'bandages', 'medical', '8', '10', 'Surviving a zombie apocalypse is bound to leave you with a few gaping wounds. Control bleeding and keep cuts clean with fresh bandages.');
INSERT INTO `supply_list` VALUES ('2', 'flint', 'generic', '8', '1', 'Paired with steel, flint means fire, which (as we all know) is crucial to survival in dealings with the undead. Use the flames you make for cooking, light, warmth, or weaponry.');
INSERT INTO `supply_list` VALUES ('3', 'steel', 'generic', '8', '1', 'Paired with flint, steel means fire, which (as we all know) is crucial to survival in dealings with the undead. Use the flames you make for cooking, light, warmth, or weaponry.');
INSERT INTO `supply_list` VALUES ('4', 'iodine tablets', 'generic', '7', '50', 'It might be something in the water!! Use iodine tablets to quickly and conveniently sanitize your drinking water.');
INSERT INTO `supply_list` VALUES ('5', 'MRE', 'generic', '10', '15', 'Escaping swarms of killer zombies can be draining. Calorie-packed MREs will keep you energized and on your toes.');
INSERT INTO `supply_list` VALUES ('6', 'lighter', 'generic', '10', '3', 'Lighters are quicker and less cumbersome than flint and steel - problem is they have limited use, so stock up');
INSERT INTO `supply_list` VALUES ('7', 'clean shirt', 'generic', '2', '1', 'You have bigger things to worry about than laundry, leave the clean clothes behind - you can only carry so much.');
INSERT INTO `supply_list` VALUES ('8', 'radio', 'generic', '8', '1', 'You’ll need a means of contacting other survivors. Radios are a bit bulky, but they are worth the space they take up.');
INSERT INTO `supply_list` VALUES ('9', 'hydrogen peroxide', 'medical', '8', '1', 'Keep your wounds clean and stave off infection with this antiseptic.');

-- ----------------------------
-- Table structure for `weapons_firearms`
-- ----------------------------
DROP TABLE IF EXISTS `weapons_firearms`;
CREATE TABLE `weapons_firearms` (
  `firearm_id` int(11) NOT NULL AUTO_INCREMENT,
  `weapon_name` varchar(255) DEFAULT NULL,
  `caliber` varchar(30) DEFAULT NULL,
  `rounds_per_reload` int(11) DEFAULT NULL,
  `usage` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`firearm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of weapons_firearms
-- ----------------------------
INSERT INTO `weapons_firearms` VALUES ('1', 'magnum revolver', '.45', '6', 'A good choice for exploding zombie heads like a cowboy - yeehaw!');
INSERT INTO `weapons_firearms` VALUES ('2', 'glock', '9mm', '15', 'Ammo is cheap and the magazine is large. Great choice for zombie encounters that are up close and personal!');
INSERT INTO `weapons_firearms` VALUES ('3', 'Barrett M107A1', '.50', '10', 'The perfect choice for long distance zombie defense. BOOM headshot!');
INSERT INTO `weapons_firearms` VALUES ('4', 'Remington 870', '12 guage', '5', 'Lock and load with this pump action gem. Now you see \'em, now you don\'t!');
INSERT INTO `weapons_firearms` VALUES ('5', 'M249 SAW', '5.56', '300', 'Is your lawn riddled with unwanted undead? Mow them down without breaking a sweat!');

-- ----------------------------
-- Table structure for `weapons_general`
-- ----------------------------
DROP TABLE IF EXISTS `weapons_general`;
CREATE TABLE `weapons_general` (
  `weapon_id` int(11) NOT NULL AUTO_INCREMENT,
  `weapon_name` varchar(25) DEFAULT NULL,
  `weapon_type` varchar(15) DEFAULT NULL,
  `durability` varchar(30) DEFAULT NULL,
  `provider` varchar(25) DEFAULT NULL,
  `usage` varchar(240) DEFAULT NULL,
  `maintenance` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`weapon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of weapons_general
-- ----------------------------
INSERT INTO `weapons_general` VALUES ('1', 'machete', 'blade', '7', null, 'For slicing, hacking or stabbing zombies. Can also be used for generic survival tasks.', 'regular sharpening');
INSERT INTO `weapons_general` VALUES ('2', 'metal pipe', 'cudgel', '10', null, 'Bash and smash zombie heads like your favorite plumber!', 'none');
INSERT INTO `weapons_general` VALUES ('8', 'katana', 'blade', '5', null, 'A daintier alternative to the machete. Slice and dice your zombies ninja style!', 'sharpening');
INSERT INTO `weapons_general` VALUES ('3', 'chainsaw', 'blade', '3', null, 'An unwieldy but effective means of tearing up the undead. Also potentially useful for building shelters.', 'greasing, refueling, replacing chains');
INSERT INTO `weapons_general` VALUES ('7', 'axe', 'blade', '8', null, 'For chopping and lopping zombie bits. A generally handy survival tool.', 'sharpening');
INSERT INTO `weapons_general` VALUES ('9', 'grenade', 'explosive', '1', null, 'Fire in the hole! Just pull the pin and you\'re done!', 'none');
INSERT INTO `weapons_general` VALUES ('10', 'molotov cocktail', 'explosive', '1', null, 'Do you like your zombies well-done? Invite your fellow survivors for s\'mores!', 'none');

-- ----------------------------
-- Table structure for `z_books`
-- ----------------------------
DROP TABLE IF EXISTS `z_books`;
CREATE TABLE `z_books` (
  `isbn` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `author_firstname` varchar(15) DEFAULT NULL,
  `author_lastname` varchar(20) DEFAULT NULL,
  `page_count` int(11) DEFAULT NULL,
  `year_published` int(11) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of z_books
-- ----------------------------
INSERT INTO `z_books` VALUES ('978-1400049622', 'The Zombie Survival Guide: Complete Protection fro', null, null, '288', '2003', 'Survival Guide');
INSERT INTO `z_books` VALUES ('978-0060931841', 'World War Z: An Oral History of the Zombie War', null, null, '352', '2007', 'Zombie War Information');
INSERT INTO `z_books` VALUES ('978-1402220128', 'Zombies for Zombies: Advice and Etiquette for the ', null, null, '272', '2009', 'Guide for Zombie Etiquette');
INSERT INTO `z_books` VALUES ('978-1453720011', 'A Zombie Apocalypse', null, null, '70', '2010', null);
INSERT INTO `z_books` VALUES ('978-0982949597', 'The Dying Times (a zombie apocalypse novel)', null, null, '282', '2010', null);
INSERT INTO `z_books` VALUES ('978-0452296398', 'You Might Be a Zombie and Other Bad News: Shocking', null, null, '320', '2010', 'Zombie Identification');
INSERT INTO `z_books` VALUES ('978-1449564872', 'The Zombie Survival Guide: How to Live Like a King', null, null, '128', '2009', 'Survival Guide');
INSERT INTO `z_books` VALUES ('978-0307405777', 'The Zombie Survival Guide: Recorded Attacks ', null, null, '144', '2009', 'Survival Guide');

-- ----------------------------
-- Table structure for `z_films`
-- ----------------------------
DROP TABLE IF EXISTS `z_films`;
CREATE TABLE `z_films` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `mpaa_rating` varchar(4) DEFAULT NULL,
  `run_time` int(4) DEFAULT NULL,
  `year_released` int(4) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of z_films
-- ----------------------------
INSERT INTO `z_films` VALUES ('1', 'Dawn of the Dead', 'R', '101', '2004', 'This movie will prepare you for the worst and make you ready for anything in your own fight for survival - the first ten minutes of Dawn of the Dead gives this remake possibly one of the scariest openings in zombie film history. ');
INSERT INTO `z_films` VALUES ('2', 'The Return of the Living Dead', 'R', '91', '1985', 'The Return of the Living Dead will help you know your enemy as it introduces an important theory on zombie creation. This film suggests the undead are the result of a toxic disaster which leaves its v');
INSERT INTO `z_films` VALUES ('3', 'White Zombie', 'UR', '69', '1932', 'If you need to know about zombies, why not go to the movie that started it all? This 1932 film boasts the original undead and introduces the first zombie creation theory as a man transforms humans into zombies with his mind.');
INSERT INTO `z_films` VALUES ('4', '28 Days Later', 'R', '113', '2002', 'This film offers the first modern revision in the portrayal of zombie abilities. Rather than showing sluggish undead limping after their prey, these zombies can book it. A good film to prepare you for zombies who are quick on their feet.');
INSERT INTO `z_films` VALUES ('5', 'Day of the Dead', 'UR', '102', '1985', 'You survived the first wave of undead, but now what? Day of the Dead offers a look at the the breakdown of social and government order one can expect in the event of a zombie epidemic.');

-- ----------------------------
-- Table structure for `z_games`
-- ----------------------------
DROP TABLE IF EXISTS `z_games`;
CREATE TABLE `z_games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `esrb_rating` varchar(5) DEFAULT NULL,
  `year_released` int(11) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of z_games
-- ----------------------------
INSERT INTO `z_games` VALUES ('1', 'Dead Rising', 'M', '2006', 'Trapped in a mall with a zombie horde, anything can be a weapon. This game will make you an anti-zombie MacGyver!');
INSERT INTO `z_games` VALUES ('2', 'Left 4 Dead', 'M', '2008', 'You can’t do it alone - learn how to fight off zombies with a team of fellow survivors!');
INSERT INTO `z_games` VALUES ('3', 'Stubbs the Zombie', 'M', '2005', 'Get inside the mind of your enemy! This game puts you in the shoes of a brain-devouring zombie.');
INSERT INTO `z_games` VALUES ('4', 'Resident Evil', 'M', '1996', 'This game will teach you to manage your resources as ammo is scarce and medical supplies are limited.');
INSERT INTO `z_games` VALUES ('5', 'Zombies Ate My Neighbors', 'E10+', '1993', 'Be a good neighbor! Saving people is always good, especially during a zombie apocalypse.');
INSERT INTO `z_games` VALUES ('6', 'The House of the Dead', 'NR', '1996', 'Get out the old light gun and brush up on your shot - accuracy is key if you plan on surviving swarms of undead.');

-- ----------------------------
-- Table structure for `z_sites`
-- ----------------------------
DROP TABLE IF EXISTS `z_sites`;
CREATE TABLE `z_sites` (
  `website_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(40) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `reasoning` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`website_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of z_sites
-- ----------------------------
INSERT INTO `z_sites` VALUES ('1', 'Zombie Survival & Defense Wiki - Zombie ', 'www.zombiesurvivalwiki.com', 'Survival Guide');
INSERT INTO `z_sites` VALUES ('2', 'Zombie Survival', 'www.zombiehub.com/zombie-survival.html', 'Survival Guide');
INSERT INTO `z_sites` VALUES ('3', 'Zombie apocalypse', 'http://en.wikipedia.org/wiki/Zombie_apocalypse', 'Apocalypse Information');
INSERT INTO `z_sites` VALUES ('4', '5 Scientific Reasons a Zombie Apocalypse', 'http://snipurl.com/246th0', null);
INSERT INTO `z_sites` VALUES ('5', 'The Ultimate Zombie Apocalypse Survival ', 'http://zomboid.com/zombie/', 'Survival Guide');
