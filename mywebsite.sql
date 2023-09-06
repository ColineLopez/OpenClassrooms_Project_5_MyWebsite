-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 sep. 2023 à 17:10
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mywebsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `content` longtext NOT NULL,
  `creationDate` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`articleID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articleID`, `title`, `chapo`, `content`, `creationDate`, `image`, `email`) VALUES
(1, 'Mon premier article', 'Voici un chapo d\'article très intéressant', 'Le contenu du premier article', '2023-07-27 09:40:43', 'images/image1.jpg', 'coline.llopez@gmail.com'),
(2, 'Mon second article.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Le contenu du deuxième article', '2023-07-27 09:44:54', 'images/image2.jpg', 'coline.llopez@gmail.com'),
(6, 'Bonjour moi c\'est Jean Charles', 'Je suis un rédacteur hors pair. Lis mon article pour vérifier cette affirmation !', 'En fait j\'ai menti, mais j\'ai gagné puisque tu as cliqué dessus ! ', '2023-08-24 19:13:04', 'images/image3.jpg', 'jeancharles@example.com'),
(7, 'Josette à l\'écrit', 'chapo', 'article', '2023-08-24 20:33:27', '', 'josette@email.com'),
(8, 'Bonjour, Jean Charles à nouveau', 'J\'écris un deuxième article car 1 ne m\'a pas suffit', 'Hey, it\'s me again !', '2023-08-24 20:34:32', '', 'jeancharles@email.com'),
(9, 'Piotr', 'Le saviez-vous ?', 'Moi non plus, et encore moins aujourd\'hui ', '2023-08-25 10:51:52', '', 'piotr@example.com');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `articleID` int NOT NULL,
  `creationDate` datetime NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `moderationDate` datetime NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`commentID`, `userID`, `articleID`, `creationDate`, `author`, `content`, `status`, `moderationDate`) VALUES
(16, 0, 2, '2023-08-09 12:40:47', 'test', 'test 14h', 1, '0000-00-00 00:00:00'),
(17, 0, 2, '2023-08-09 14:46:27', 'test', 'test 14h', 1, '0000-00-00 00:00:00'),
(18, 0, 2, '2023-08-09 14:47:22', 'test', 'test 15h', 1, '0000-00-00 00:00:00'),
(19, 0, 1, '2023-08-09 15:39:46', 'Test', 'Commentaire article 1, 15h', 1, '0000-00-00 00:00:00'),
(20, 0, 1, '2023-08-09 15:45:39', 'test2', 'test2', 1, '0000-00-00 00:00:00'),
(21, 0, 1, '2023-08-09 15:48:09', 'juuhfe', 'uihuige', 1, '0000-00-00 00:00:00'),
(22, 0, 1, '2023-08-09 15:49:29', 'juuhfe', 'uihuige', 1, '0000-00-00 00:00:00'),
(23, 0, 1, '2023-08-09 15:55:56', 'Auteur', 'Commentaire', 1, '0000-00-00 00:00:00'),
(24, 0, 2, '2023-08-09 16:05:00', 'Auteur', 'Commentaire', 1, '0000-00-00 00:00:00'),
(25, 0, 2, '2023-08-09 16:07:28', 'Auteur 2', 'Commentaire 2', 1, '0000-00-00 00:00:00'),
(15, 0, 2, '2023-08-09 08:12:15', 'test', 'test 9 aout', 1, '0000-00-00 00:00:00'),
(26, 0, 2, '2023-08-09 16:13:18', 'iogjrpoij', 'opigjrpzi', 3, '0000-00-00 00:00:00'),
(27, 0, 2, '2023-08-09 16:15:51', 'test', 'test', 3, '0000-00-00 00:00:00'),
(28, 0, 2, '2023-08-09 16:16:08', 'nouveau', 'nouveau\r\n', 2, '0000-00-00 00:00:00'),
(29, 0, 2, '2023-08-09 16:16:19', 'trois', 'trois', 2, '0000-00-00 00:00:00'),
(30, 0, 2, '2023-08-13 17:13:55', 'test', '13 aout', 2, '0000-00-00 00:00:00'),
(31, 0, 0, '2023-08-23 12:12:07', 'test', 'test', 2, '0000-00-00 00:00:00'),
(32, 0, 0, '2023-08-23 12:13:36', 'test', 'test', 2, '0000-00-00 00:00:00'),
(33, 0, 2, '2023-08-23 12:19:19', 'test', 'test', 2, '0000-00-00 00:00:00'),
(34, 0, 2, '2023-09-03 17:50:37', 'Laura', 'voila un commentaire', 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contactID` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`contactID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`contactID`, `lastname`, `firstname`, `email`, `content`, `creationDate`) VALUES
(11, 'nom', 'prenom', 'test@example.com', '16 aout', '2023-08-16 15:43:07'),
(12, 'test2', 'test2', 'ok@example.com', 'test2', '2023-08-16 15:46:28'),
(13, 'test 3', 'test 3', 'test@example.com', 'test 4', '2023-08-16 15:49:54'),
(7, 'test', 'test', 'aout9@test.com', 'test contact 9 aout', '2023-08-09 08:57:23'),
(14, 'testa', 'test', 'test@example.com', 'teoist', '2023-08-17 16:39:51');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `FOREIGN KEY` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `ip`, `admin`, `name`) VALUES
(13, 'coline.llopez@gmail.com', 'bfb301b26ca5590c4cd741bea37c36d5b4e5fb92dc4880e8c89448bf82b2b94c', '::1', 1, 'Coline Lopez'),
(19, 'josette@email.com', '09d0d6c31ad25eb7a8ca3bcba1953cc01453665d1f5a298d716ba46b6e3e40d5', '::1', 0, 'Josette'),
(18, 'jeancharles@email.com', '5f2042377309bb3ae253794b0b36b80fc689b5cc82cf050d772345fe7d4860f2', '::1', 0, 'Jean Charles'),
(20, 'piotr@example.com', '51e00b415c7a12ab6e7ab591b37a5cd1b7435dfd05f24e025fcb2872a418c90d', '::1', 0, 'Piotr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
