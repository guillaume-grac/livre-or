-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 nov. 2020 à 14:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'Un commentaire', 1, '2020-11-27 13:53:16'),
(2, 'Un autre commentaire', 1, '2020-11-27 13:53:22'),
(3, 'Encore un commentaire', 1, '2020-11-27 13:53:28'),
(4, 'Un dernier commentaire ', 1, '2020-11-27 13:53:34'),
(5, 'Un commentaire de William test', 2, '2020-11-27 13:54:52'),
(6, 'autre test ', 2, '2020-11-27 13:54:58'),
(7, 'TEST', 1, '2020-11-27 13:56:04'),
(8, 'TEST', 1, '2020-11-27 13:56:07'),
(9, 'TEST Footer', 1, '2020-11-27 13:56:14'),
(10, 'FOOTER', 1, '2020-11-27 13:56:24'),
(11, 'Footer', 1, '2020-11-27 13:56:28'),
(12, 'TEST FOOTER ', 1, '2020-11-27 13:56:41'),
(13, 'DERNIER COMMENTAIRE', 1, '2020-11-27 13:56:47'),
(14, 'Le dernier commentaire de test ', 2, '2020-11-27 14:03:44');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Guillaume', '$2y$10$Law4Z32dQ7T9DFrRfkQVHeF9wtTlOkFimcHuqlgdgkqOaaWWSqeX.'),
(2, 'William', '$2y$10$eRDsAtXVMNHx/qpbFK0DXuMx0t/geec8rSRzDnk2D/uRzL02EbOnK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
