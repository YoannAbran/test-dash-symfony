-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 09 sep. 2020 à 10:59
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_dashboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `password`, `mail`) VALUES
(1, 'yoann', '$2y$10$1JXSEJ9tOXxulymhfnVk6udpak.thwpRR.K2cqDm00wTGp6aL1VXa', 'y.abran@codeur.online'),
(2, 'Warrenn', '$2y$10$oGowHYnFdh5WqUrcm/QD3O/ncSyHelMLqvc8Bx4UHansI/GModlum', 'w.maunier@codeur.online'),
(3, 'Kevin', '$2y$10$odxJdYpWD3/3mZ6aSD7u9OEnDkB1.xMIyN2hL2VWj6GOrhzLLiIBi', 'k.nguma@codeur.online'),
(4, 'bob', '$2y$10$maLGjA5LNcEZ/eR5r.j90uUxyXfQ9h8TmmhPRz3Bt6P.R6Hwjz5ja', 'test@test.test'),
(5, 'bob2', '$2y$10$ev6QnI6rJlUIDrmeIECy..0nGmzphQaA.lM1bCtuKFMP7CzmPrubm', 'test@test.test');

-- --------------------------------------------------------

--
-- Structure de la table `lieux_achat`
--

DROP TABLE IF EXISTS `lieux_achat`;
CREATE TABLE IF NOT EXISTS `lieux_achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_livre` int(11) NOT NULL,
  `vente_direct` text DEFAULT NULL,
  `ecommerce` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_livre` (`id_livre`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lieux_achat`
--

INSERT INTO `lieux_achat` (`id`, `id_livre`, `vente_direct`, `ecommerce`) VALUES
(23, 37, '', 'www.livreachat.com'),
(24, 38, '', 'www.livreachat.com'),
(25, 39, '', 'www.livreachat.com'),
(26, 40, '', 'www.livreachat.com'),
(27, 41, 'Fnac Nevers', ''),
(28, 42, 'Fnac Nevers', ''),
(29, 43, 'Fnac Nevers', ''),
(31, 45, '8 rue de la paix', ''),
(32, 46, '8 rue de la paix', ''),
(33, 47, '8 rue de la paix', ''),
(34, 48, '8 rue de la paix', ''),
(35, 49, '8 rue de la paix', ''),
(36, 50, '8 rue de la paix', ''),
(38, 52, '', 'www.achatlivre.fr'),
(39, 53, '', 'www.achatlivre.fr'),
(40, 54, '', 'www.achatlivre.fr'),
(42, 56, '', 'www.achatlivre.fr'),
(43, 57, '', 'www.achatlivre.fr'),
(44, 58, '', 'www.achatlivre.fr'),
(45, 59, '', 'www.achatlivre.fr'),
(46, 60, 'Fnac Nevers', ''),
(47, 61, 'Fnac Nevers', ''),
(48, 62, 'Fnac Nevers', ''),
(49, 63, 'Fnac Nevers', ''),
(50, 64, 'Fnac Nevers', ''),
(51, 65, 'Fnac Nevers', ''),
(52, 66, 'Fnac Nevers', ''),
(54, 68, 'Fnac Nevers', ''),
(55, 69, 'Fnac Nevers', ''),
(56, 70, 'Fnac Nevers', ''),
(57, 71, '8 rue de la paix', ''),
(58, 72, '8 rue de la paix', ''),
(59, 73, '8 rue de la paix', ''),
(60, 74, '8 rue de la paix', ''),
(61, 75, '', 'www.livreachat.com'),
(62, 76, '', 'www.livreachat.com'),
(63, 77, '', 'www.livreachat.com'),
(64, 78, '', 'www.livreachat.com'),
(65, 79, '', 'www.livreachat.com'),
(66, 80, '', 'www.livreachat.com'),
(67, 81, '', 'www.livreachat.com'),
(68, 82, '', 'www.livreachat.com'),
(69, 83, '', 'www.livreachat.com'),
(70, 84, '', 'www.livreachat.com'),
(71, 85, '', 'www.livreachat.com'),
(72, 86, '', 'www.livreachat.com'),
(73, 87, '', 'www.livreachat.com'),
(74, 88, '', 'www.livreachat.com'),
(75, 89, 'Fnac Nevers', ''),
(76, 90, '', 'www.livreachat.com'),
(77, 91, '3 rue de la paix', '');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `reference` varchar(25) NOT NULL,
  `date_achat` date NOT NULL,
  `date_garantie` date NOT NULL,
  `prix` float NOT NULL,
  `conseil` text NOT NULL,
  `photo_ticket` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `categorie` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `nom`, `reference`, `date_achat`, `date_garantie`, `prix`, `conseil`, `photo_ticket`, `photo`, `categorie`) VALUES
(37, 'Yoga', 'YO1234', '2020-07-24', '2021-10-04', 3, 'Câ€™est l\'histoire dâ€™un livre sur le yoga et la dÃ©pression.', 'public/img/', 'public/img/', 'roman'),
(38, 'Yoga', 'YO1234', '2020-07-24', '2021-10-04', 3, 'Câ€™est l\'histoire dâ€™un livre sur le yoga et la dÃ©pression.', 'public/img/', 'public/img/', 'roman'),
(39, 'Yoga', 'YO1234', '2020-07-24', '2021-10-04', 3, 'Câ€™est l\'histoire dâ€™un livre sur le yoga et la dÃ©pression.', 'public/img/', 'public/img/', 'roman'),
(40, 'Yoga', 'YO1234', '2020-07-24', '2021-10-04', 3, 'Câ€™est l\'histoire dâ€™un livre sur le yoga et la dÃ©pression.', 'public/img/', 'public/img/', 'roman'),
(41, 'fait maison', 'FM1234', '2019-01-04', '2020-10-04', 5, 'Guide sur la cuisine fait maison', 'public/img/', 'public/img/', 'Guide'),
(42, 'fait maison', 'FM1234', '2019-01-04', '2020-10-04', 5, 'Guide sur la cuisine fait maison', 'public/img/', 'public/img/', 'Guide'),
(43, 'fait maison', 'FM1234', '2019-01-04', '2020-10-04', 5, 'Guide sur la cuisine fait maison', 'public/img/', 'public/img/', 'Guide'),
(45, 'The promised neverland', 'PN1234', '2020-09-01', '2023-07-12', 5, 'Suivez les trois orphelins de The Promised Neverland d\'un endroit qu\'ils pensaient idyllique mais qui se rÃ©vÃ¨le Ãªtre tout le contraire... Et attention : rien n\'est ce qu\'il paraÃ®t Ãªtre !', 'public/img/', 'public/img/', 'Manga'),
(46, 'The promised neverland', 'PN1234', '2020-09-01', '2023-07-12', 5, 'Suivez les trois orphelins de The Promised Neverland d\'un endroit qu\'ils pensaient idyllique mais qui se rÃ©vÃ¨le Ãªtre tout le contraire... Et attention : rien n\'est ce qu\'il paraÃ®t Ãªtre !', 'public/img/', 'public/img/', 'Manga'),
(47, 'The promised neverland', 'PN1234', '2020-09-01', '2023-07-12', 5, 'Suivez les trois orphelins de The Promised Neverland d\'un endroit qu\'ils pensaient idyllique mais qui se rÃ©vÃ¨le Ãªtre tout le contraire... Et attention : rien n\'est ce qu\'il paraÃ®t Ãªtre !', 'public/img/', 'public/img/', 'Manga'),
(48, 'The promised neverland', 'PN1234', '2020-09-01', '2023-07-12', 5, 'Suivez les trois orphelins de The Promised Neverland d\'un endroit qu\'ils pensaient idyllique mais qui se rÃ©vÃ¨le Ãªtre tout le contraire... Et attention : rien n\'est ce qu\'il paraÃ®t Ãªtre !', 'public/img/', 'public/img/', 'Manga'),
(49, 'The promised neverland', 'PN1234', '2020-09-01', '2023-07-12', 5, 'Suivez les trois orphelins de The Promised Neverland d\'un endroit qu\'ils pensaient idyllique mais qui se rÃ©vÃ¨le Ãªtre tout le contraire... Et attention : rien n\'est ce qu\'il paraÃ®t Ãªtre !', 'public/img/', 'public/img/', 'Manga'),
(50, 'The promised neverland', 'PN1234', '2020-09-01', '2023-07-12', 5, 'Suivez les trois orphelins de The Promised Neverland d\'un endroit qu\'ils pensaient idyllique mais qui se rÃ©vÃ¨le Ãªtre tout le contraire... Et attention : rien n\'est ce qu\'il paraÃ®t Ãªtre !', 'public/img/', 'public/img/', 'Manga'),
(52, 'Sorceleur', 'SO1234', '2020-09-04', '2021-06-04', 5.5, 'l\'histoire de Geralt de Riv', 'public/img/', 'public/img/', 'fantastique'),
(53, 'Sorceleur', 'SO1234', '2020-09-04', '2021-06-04', 5.5, 'l\'histoire de Geralt de Riv', 'public/img/', 'public/img/', 'fantastique'),
(54, 'Sorceleur', 'SO1234', '2020-09-04', '2021-06-04', 5.5, 'l\'histoire de Geralt de Riv', 'public/img/', 'public/img/', 'fantastique'),
(56, 'Sorceleur', 'SO1234', '2020-09-04', '2021-06-04', 5.5, 'l\'histoire de Geralt de Riv', 'public/img/', 'public/img/', 'fantastique'),
(57, 'Sorceleur', 'SO1234', '2020-09-04', '2021-06-04', 5.5, 'l\'histoire de Geralt de Riv', 'public/img/', 'public/img/', 'fantastique'),
(58, 'Sorceleur', 'SO1234', '2020-09-04', '2021-06-04', 5.5, 'l\'histoire de Geralt de Riv', 'public/img/', 'public/img/', 'fantastique'),
(59, 'Sorceleur', 'SO1234', '2020-09-04', '2021-06-04', 5.5, 'l\'histoire de Geralt de Riv', 'public/img/', 'public/img/', 'fantastique'),
(60, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(61, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(62, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(63, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(64, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(65, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(66, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(68, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(69, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(70, 'Sherlock Holmes', 'SH1234', '2019-02-04', '2020-09-01', 3.8, 'L\'histoire d\'un detective', 'public/img/', 'public/img/', 'policier'),
(71, 'Les Aerostats', 'LA1234', '2020-09-04', '2022-10-13', 5, 'La jeunesse est un talent, il faut des annÃ©es pour l\'acquÃ©rir.', 'public/img/', 'public/img/', 'roman'),
(72, 'Les Aerostats', 'LA1234', '2020-09-04', '2022-10-13', 5, 'La jeunesse est un talent, il faut des annÃ©es pour l\'acquÃ©rir.', 'public/img/', 'public/img/', 'roman'),
(73, 'Les Aerostats', 'LA1234', '2020-09-04', '2022-10-13', 5, 'La jeunesse est un talent, il faut des annÃ©es pour l\'acquÃ©rir.', 'public/img/', 'public/img/', 'roman'),
(74, 'Les Aerostats', 'LA1234', '2020-09-04', '2022-10-13', 5, 'La jeunesse est un talent, il faut des annÃ©es pour l\'acquÃ©rir.', 'public/img/', 'public/img/', 'roman'),
(75, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(76, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(77, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(78, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(79, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(80, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(81, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(82, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(83, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(84, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(85, 'enigme de la chambre 622', 'EC1234', '2019-03-04', '2020-06-04', 2.5, 'Une nuit de dÃ©cembre, un meurtre a lieu au Palace de Verbier, dans les Alpes suisses.', 'public/img/', 'public/img/', 'policier'),
(86, 'Emergence', 'EM1234', '2018-06-04', '2020-09-02', 5, 'Rien ne destinait le chercheur Michel Depraz Ã  intÃ©grer une startup dÃ©diÃ©e Ã  lâ€™intelligence artiï¬cielle.', 'public/img/', 'public/img/', 'science-ficiton'),
(87, 'Emergence', 'EM1234', '2018-06-04', '2020-09-02', 5, 'Rien ne destinait le chercheur Michel Depraz Ã  intÃ©grer une startup dÃ©diÃ©e Ã  lâ€™intelligence artiï¬cielle.', 'public/img/', 'public/img/', 'science-ficiton'),
(88, 'Emergence', 'EM1234', '2018-06-04', '2020-09-02', 5, 'Rien ne destinait le chercheur Michel Depraz Ã  intÃ©grer une startup dÃ©diÃ©e Ã  lâ€™intelligence artiï¬cielle.', 'public/img/', 'public/img/', 'science-ficiton'),
(89, 'Sorceleur', 'SO1234', '2020-05-07', '2020-09-22', 5, 'l\'histoire de Geralt de RIv', 'public/img/', 'public/img/', 'fantastique'),
(90, 'Sorceleur', 'SO1234', '2019-02-07', '2020-09-07', 5, 'Geralt', 'public/img/', 'public/img/', 'fantastique'),
(91, 'Yoga', 'YO1234', '2020-06-07', '2022-06-07', 3, 'Yoga', 'public/img/', 'public/img/', 'roman');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `prix_vente` int(11) NOT NULL,
  `nbre_vente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `nom`, `stock`, `prix_vente`, `nbre_vente`) VALUES
(17, 'Emergence', 3, 12, 4),
(18, 'fait maison', 4, 11, 16),
(19, 'enigme de la chambre 622', 11, 7, 3),
(20, 'Les Aerostats', 4, 9, 11),
(21, 'Sherlock Holmes', 11, 8, 19),
(22, 'Sorceleur', 11, 6, 10),
(23, 'The promised neverland', 7, 8, 5),
(24, 'Yoga', 5, 12, 17);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lieux_achat`
--
ALTER TABLE `lieux_achat`
  ADD CONSTRAINT `lieux_achat_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
