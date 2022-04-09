-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour monprojet
CREATE DATABASE IF NOT EXISTS `monprojet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `monprojet`;

-- Listage de la structure de la table monprojet. articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.articles : ~6 rows (environ)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `title`, `content`, `img`, `comment`, `created_at`) VALUES
	(3, 'Mon troisième article ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae recusandae obcaecati cupiditate vitae officiis harum. Ducimus iure animi amet, iste, at itaque quo odit accusantium facilis laudantium necessitatibus recusandae officiis?', NULL, NULL, '2022-03-24 09:06:34'),
	(4, 'Mon quatrième article', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae recusandae obcaecati cupiditate vitae officiis harum. Ducimus iure animi amet, iste, at itaque quo odit accusantium facilis laudantium necessitatibus recusandae officiis?', NULL, NULL, '2022-03-24 09:26:02'),
	(5, 'Mon cinquième article édité', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae recusandae obcaecati cupiditate vitae officiis harum. Ducimus iure animi amet, iste, at itaque quo odit accusantium facilis laudantium necessitatibus recusandae officiis?', '/public/upload/624599b8827025.14742371.png', NULL, '2022-03-24 09:26:18'),
	(6, 'Mon sixième article !!!!', 'mon super article ', '/public/upload/62482d65b575e8.32435718.png', NULL, '2022-03-24 09:26:50'),
	(8, 'Le 6 qui surprend', 'Pour fêter ses 25 ans de succès, le fameux jeu de cartes 6 qui prend revient dans cette version spéciale comprenant 28 cartes supplémentaires et un bloc de score. Ouvrir une cinquième ligne, augmenter sa capacité à 7 ou encore échanger une carte,... autant d’actions qui pourront peut-être vous sauver la mise et vous éviter de prendre ses maudites têtes de boeufs !', '/public/upload/624d8625a2c762.63188425.webp', NULL, '2022-04-02 13:16:44'),
	(9, 'Les Loups-garous de Thiercelieux', 'Les Loups-Garous de Thiercelieux est un jeu de société d&#039;ambiance dans lequel chaque joueur incarne un villageois ou un loup-garou, et dont le but général est :\r\n\r\n    pour les villageois (dont certains ont des pouvoirs ou des particularités) : démasquer et tuer tous les loups-garous ;\r\n    pour les loups-garous : d&#039;éliminer tous les villageois et ne pas se faire démasquer ;\r\n\r\nLes versions ultérieures introduisent des personnages aux caractères spécifiques, dont certains ont pour but de gagner seul et sont par conséquent en dehors des deux camps de base. ', '/public/upload/624d85b3ce5a12.17788075.jpg', NULL, '2022-04-03 12:47:59'),
	(10, 'Dixit', 'Dixit est un jeu de société enchanteur qui vous invite à vous laisser porter par votre imagination. Découvrez 84 illustrations oniriques sur de grandes cartes sans texte et interprétez ces images énigmatiques. Accessible et familial, Dixit est un jeu idéal pour jouer en famille ou entre amis et découvrir votre entourage d’une nouvelle manière.', '/public/upload/624d85aacb2384.67969958.jpg', NULL, '2022-04-04 09:06:19');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. article_tag
CREATE TABLE IF NOT EXISTS `article_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_tag_articles` (`article_id`),
  KEY `FK_article_tag_tags` (`tag_id`),
  CONSTRAINT `FK_article_tag_articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_article_tag_tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.article_tag : ~12 rows (environ)
/*!40000 ALTER TABLE `article_tag` DISABLE KEYS */;
INSERT INTO `article_tag` (`id`, `article_id`, `tag_id`) VALUES
	(4, 3, 4),
	(5, 3, 5),
	(6, 4, 1),
	(204, 5, 3),
	(205, 5, 2),
	(206, 5, 1),
	(251, 6, 6),
	(290, 10, 2),
	(291, 10, 1),
	(292, 9, 6),
	(293, 9, 5),
	(294, 8, 1);
/*!40000 ALTER TABLE `article_tag` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. board_game_card
CREATE TABLE IF NOT EXISTS `board_game_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.board_game_card : ~2 rows (environ)
/*!40000 ALTER TABLE `board_game_card` DISABLE KEYS */;
INSERT INTO `board_game_card` (`id`, `title`, `content`, `img`, `created_at`) VALUES
	(1, 'mon premier jeu', 'lorem ipsum dolor sit', NULL, '2022-03-23 06:24:47'),
	(2, 'mon deuxième jeu\r\n', 'lorem ipsum dolor sit', NULL, '2022-03-23 06:26:27');
/*!40000 ALTER TABLE `board_game_card` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. board_game_card_category
CREATE TABLE IF NOT EXISTS `board_game_card_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_game_card_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_board_game_card_category_board_game_card` (`board_game_card_id`),
  KEY `FK_board_game_card_category_categories` (`categorie_id`),
  CONSTRAINT `FK_board_game_card_category_board_game_card` FOREIGN KEY (`board_game_card_id`) REFERENCES `board_game_card` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_board_game_card_category_categories` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.board_game_card_category : ~2 rows (environ)
/*!40000 ALTER TABLE `board_game_card_category` DISABLE KEYS */;
INSERT INTO `board_game_card_category` (`id`, `board_game_card_id`, `categorie_id`) VALUES
	(1, 1, 1),
	(2, 2, 2);
/*!40000 ALTER TABLE `board_game_card_category` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.categories : ~2 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
	(1, 'cartes', '2022-04-04 14:17:26'),
	(2, 'dés', '2022-04-04 14:18:07');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_articles` (`id_article`),
  KEY `FK_comment_users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.comment : ~0 rows (environ)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.contact : ~0 rows (environ)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.tags : ~6 rows (environ)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
	(1, 'cartes', '2022-03-24 09:02:37'),
	(2, 'plateau', '2022-03-24 09:02:52'),
	(3, 'dés', '2022-03-24 09:03:31'),
	(4, 'adresse', '2022-03-24 09:03:51'),
	(5, 'ambiance', '2022-03-24 09:04:03'),
	(6, 'bluff', '2022-03-24 09:05:16');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.users : ~4 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
	(1, 'admin', '$2y$10$kiqZipmDnWorPvkkebT8GeSUXzWbI0mwr03DWG.rJnKGW53NsAf2C', 'admin@gmail', 1, '2022-03-23 16:03:32'),
	(2, 'user', '$2y$10$hKx44z50zn9sr078BN7a..nnk9U1sa2G9sx5O44JrYdMpDVwLAV.C', 'user@gmail', 0, '2022-04-02 13:57:19'),
	(7, 'florent', '$2y$10$ttvhQjtLVG5.VE2i9fXcCetlV0qh1xCOf5T.Pt1XTEixRAAIM/awC', 'florent@gmail.com', 0, '2022-04-03 12:10:32'),
	(10, 'Florent', '$2y$10$L6nVOtIX.VoE8ZE/zyCnjORdCBmCBlfz8bsrl18k2SDU4SZYVICDO', 'florent@gmail', 0, '2022-04-03 12:45:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
