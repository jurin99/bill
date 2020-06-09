-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 juin 2020 à 11:00
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jurinweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `nom`, `image`, `description`, `date`) VALUES
(15, 'oooooo', 'e9fc23762cd01ce36f77a85777f655b0.jpeg', 'hhhh', 'gt'),
(16, 'oooooo', 'ab8aa0f6c16ce35fff2d483ae6c639dd.jpeg', 'hhhh', '12/20/2021');

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `promo`
--

INSERT INTO `promo` (`id`, `nom`, `image`, `prix`, `description`, `date`) VALUES
(3, 'dfgdf', '948e0c70a9fb1b1d40d134b53a128d42.jpeg', 'podegr', 'erg', '20/06/2008'),
(4, 'dfgdf', '7f2b91e7bb718d8f0478d82d0266c748.jpeg', '50 f', 'iuf', 'jfd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
