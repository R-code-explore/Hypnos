-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 avr. 2022 à 18:00
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hypnos`
--

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`id`, `nom`, `ville`, `adresse`, `description`) VALUES
(1, 'Hypnos-Paris', 'Paris', '4 rue du Test', 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les annÃ©es 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour rÃ©aliser un livre spÃ©cimen de polices de texte.'),
(3, 'Hypnos-Fort-Mahon', 'Fort-Mahon', '16 rue du Test', 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les annÃ©es 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour rÃ©aliser un livre spÃ©cimen de polices de texte.');

-- --------------------------------------------------------

--
-- Structure de la table `mess`
--

DROP TABLE IF EXISTS `mess`;
CREATE TABLE IF NOT EXISTS `mess` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `choix_sujet` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mess`
--

INSERT INTO `mess` (`id`, `nom`, `email`, `choix_sujet`) VALUES
(1, 'Eduard Test', 'test@message.com', 'Je souhaite commander un service supplÃ©mentaire'),
(3, 'Raimond test', 'test@message.com', 'Je souhaite poser une rÃ©clamation');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_debut` varchar(50) NOT NULL,
  `date_fin` varchar(50) NOT NULL,
  `suite` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `nom`, `adresse`, `date_debut`, `date_fin`, `suite`, `id_user`, `hotel_id`) VALUES
(1, 'Hypnos-Paris', '4 rue du Test Paris', '2022-04-29', '2022-04-30', 'Suite 1', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `suites`
--

DROP TABLE IF EXISTS `suites`;
CREATE TABLE IF NOT EXISTS `suites` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `first_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` varchar(50) NOT NULL,
  `glr_image1` varchar(255) NOT NULL,
  `glr_image2` varchar(255) NOT NULL,
  `glr_image3` varchar(255) NOT NULL,
  `dispo` varchar(10) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `suites`
--

INSERT INTO `suites` (`id`, `nom`, `first_image`, `description`, `prix`, `glr_image1`, `glr_image2`, `glr_image3`, `dispo`, `id_hotel`) VALUES
(1, 'Suite 1', 'couverture_suite_1.jpg', 'Description de la suite aura lieu Ã§ cet endroit. Et elle est modifiable.', '150.00', 'room_1_suite_1.jpg', 'room_2_suite_1.jpg', 'room_3_suite_1.jpg', 'Oui', 1),
(3, 'Suite 1 - Hypnos-Fort Mahon', 'couverture_suite_2.jpg', 'Description ici mÃªme pour la suite', '150.00', 'room_1_suite_2.jpg', 'room_2_suite_2.jpg', 'room_3_suite_2.jpg', 'Oui', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `mdp`, `role`, `hotel_id`) VALUES
(1, 'Eduard', 'mail@test.com', '$argon2id$v=19$m=65536,t=4,p=1$TDhJZk9mVndtOFZ1VjZQSw$aVL4rUSuEcLZWUUYwn1/C+3y5J3efIwtkIx9GD3yvHc', 'user', NULL),
(2, 'Administrateur', 'admin@hypnos.com', '$argon2id$v=19$m=65536,t=4,p=1$NmcyNnJJUUdEcmJKNFppYQ$J+WnwlEs1mBXj0qLpuZgeExz7leUp3Lk+ljyiPHT+0k', 'Admin', NULL),
(3, 'GÃ©rant Eduard', 'gerant1@hypnos.com', '$argon2id$v=19$m=65536,t=4,p=1$ejJrTUJUd1M3VVVDakxXVA$4u1kKSpAkUnhRc3F8BROMmOhwIVYKOnYw98mJqicuvo', 'gerant', 1),
(5, 'GÃ©rant JosÃ©', 'gerant3@hypnos.com', '$argon2id$v=19$m=65536,t=4,p=1$QWswa0tycEFxdDN1ZHN1dA$0NeGeoiQL7q4RnZ13VXhvlE3/2tL3TwRiQ+LkC5QLDM', 'gerant', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
