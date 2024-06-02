-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 juin 2024 à 10:37
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sportify`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CodePostal` int NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Numero` int NOT NULL,
  `Carte` int NOT NULL,
  `Mot_de_passe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`Carte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Nom`, `Prenom`, `Adresse`, `Ville`, `CodePostal`, `Pays`, `Numero`, `Carte`, `Mot_de_passe`) VALUES
('Mathurin', 'Elodie', '15 rue du 18 juin 1940  Asnières-sur-seine Matrys Frane', '', 0, '', 615446227, 132645, 'Matrys'),
('He', 'Max', '13 avenue   Levallois  Mx2  Frane', '', 0, '', 752952, 3955, 'Mx2');

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `ID_coach` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Telephone` int NOT NULL,
  `CV` varchar(255) NOT NULL,
  `Tarif` int NOT NULL,
  `Mot_de_passe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_coach`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`ID_coach`, `Nom`, `Specialite`, `Photo`, `Adresse`, `Mail`, `Telephone`, `CV`, `Tarif`, `Mot_de_passe`) VALUES
(1, 'Guy DUMAIS', 'Boxe', 'guydumais.jpeg', 'Salle de Sport Omnes, 12 Rue de l\'Université, 75005 Paris\r\n', 'guy.dumais@sportify.com\r\n', 2147483647, 'guydumais.pdf', 20, 'Box1'),
(2, 'Jean Dupont', 'Tennis', 'jeandupont.jpeg', '123 Rue de la Raquette, 75001 Paris', 'jeans.dupont@sportify.com', 612345678, 'jeandupont.pdf', 30, 'Ten1'),
(3, 'Marie Dubois', 'Basket', 'marinedubois.jpeg', '45 Avenue du Dribble, 75012 Paris', 'marine.dubois@sportify.com', 698765432, 'marinedubois.pdf', 25, 'Bas1'),
(4, 'Paul Martin', 'Football', 'paulmartin.jpeg', '88 Boulevard du But,75015 Paris', 'paul.martin@sportify.com', 687654321, 'paulmartin.pdf', 25, 'Foot1'),
(5, 'Clara Petit', 'Danse', 'clarapetit.jpeg', '77 Rue de la Danse, 75009 Paris', 'clara.petit@sportify.com', 676543210, 'clarapetit.pdf', 40, 'Dan1'),
(6, 'Lucie Bertrand', 'Natation', 'luciebertrand.jpeg', '01 Piscine Municipale, 92100 Boulogne-Billancourt', 'lucie.bertrand@sportify.com', 645321009, 'luciebertrand.pdf', 25, 'Pis1\r\n'),
(7, 'Kevin Moreau', 'Musculation', 'kevinmoreau.jpeg', '60 Gymnase Central, 75011 Paris', 'kevin.moreau@sportify.com', 665432109, 'kevinmoreau.pdf', 15, 'Mus1'),
(8, 'Sophie Leroy', 'Fitness', 'sophieleroy.jpeg', '32 Rue du Fitness, 75015 Paris', 'sophie.leroy@sportify.com', 654321098, 'sophieleroy.pdf', 20, 'Fit1'),
(9, 'Nicolas Dubreuil', 'Biking', 'nicolasdubreuil.jpeg', '15 Rue du Vélo, 75014 Paris', 'nicolas.dubreuil@sportify.com', 678654321, 'nicolasdubreuil.pdf', 25, 'Bik1'),
(10, 'Elisa Garnier', 'Cardio training', 'elisagarnier.jpeg', '50 Rue du Coeur, 75011 Paris', 'elisa.garnier@sportify.com', 643210987, 'elisagarnier.pdf', 20, 'Car1'),
(11, 'Marc Leclerc', 'Cours Collectifs', 'marcleclerc.jpeg', '22 Studio de l\'Activité, 75010 Paris', 'marc.leclerc@sportify.com', 621098765, 'marcleclerc.pdf', 15, 'Cou1\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `dispo_coach`
--

DROP TABLE IF EXISTS `dispo_coach`;
CREATE TABLE IF NOT EXISTS `dispo_coach` (
  `Nom` varchar(255) NOT NULL,
  `Jour` varchar(255) DEFAULT NULL,
  `Horaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lieu_sport`
--

DROP TABLE IF EXISTS `lieu_sport`;
CREATE TABLE IF NOT EXISTS `lieu_sport` (
  `Nom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Dispo_lundi` varchar(255) NOT NULL,
  `Dispo_mardi` varchar(255) NOT NULL,
  `Dispo_mercredi` varchar(255) NOT NULL,
  `Dispo_jeudi` varchar(255) NOT NULL,
  `Dispo_vendredi` varchar(255) NOT NULL,
  `Dispo_samedi` varchar(255) NOT NULL,
  `Dispo_dimanche` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `source` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=255 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `source`, `dest`, `message`) VALUES
(153, 'Jean Dupont', '132645', 'feur'),
(152, 'Jean Dupont', '132645', 'Helooo'),
(151, 'Jean Dupont', '', ''),
(150, '132645', 'Jean Dupont', 'Bonjour'),
(149, '132645', '', ''),
(148, '132645', 'Jean Dupont', 'hello'),
(147, '132645', '', ''),
(146, 'Jean Dupont', '132645', 'feur'),
(145, 'Jean Dupont', '132645', 'hello'),
(142, 'Jean Dupont', '', ''),
(143, 'Jean Dupont', '132645', 'ko'),
(144, 'Jean Dupont', '', ''),
(141, 'Jean Dupont', '132645', 'hool'),
(140, 'Jean Dupont', '', ''),
(139, 'Jean Dupont', '', ''),
(138, 'Jean Dupont', '', ''),
(137, 'Jean Dupont', '132645', 'Coucou'),
(136, 'Jean Dupont', '', ''),
(135, 'Jean Dupont', '', 'Coucou'),
(134, 'Jean Dupont', 'Mathurin', 'Yooo'),
(133, 'jeans.dupont@sportify.com', 'He', 'Kimchi'),
(132, 'jeans.dupont@sportify.com', 'Mathurin', 'Bonsswar c\'est dupont'),
(57, '132645', 'Guy DUMAIS', 'Coucou'),
(58, '132645', '', ''),
(59, '132645', 'Guy DUMAIS', 'Helooo'),
(60, '132645', '', ''),
(61, '132645', 'Marc Leclerc', 'yooo'),
(62, '132645', '', ''),
(63, '132645', 'Marc Leclerc', 'lo'),
(64, '132645', '', ''),
(65, '132645', '', ''),
(66, '132645', 'Guy DUMAIS', 'lol'),
(67, '132645', '', ''),
(68, '132645', '', ''),
(69, '132645', '', ''),
(70, '132645', 'Guy DUMAIS', 'heloo'),
(71, '132645', '', ''),
(72, '132645', 'Elisa Garnier', 'ok'),
(73, '132645', '', ''),
(74, '132645', 'Nicolas Dubreuil', 'ok'),
(75, '132645', 'Nicolas Dubreuil', 'ok'),
(76, '132645', 'Nicolas Dubreuil', 'ok'),
(77, '132645', '', ''),
(78, '132645', '', ''),
(79, '132645', 'Paul Martin', 'Coucou Ca VA'),
(80, '132645', 'Guy DUMAIS', 'hello '),
(81, '132645', '', ''),
(82, '132645', '', ''),
(83, '132645', '', ''),
(84, 'jeans.dupont@sportify.com', '', ''),
(85, 'jeans.dupont@sportify.com', '', ''),
(86, 'jeans.dupont@sportify.com', '', ''),
(87, 'jeans.dupont@sportify.com', '', ''),
(88, 'jeans.dupont@sportify.com', 'Mathurin', 'Hello'),
(89, 'jeans.dupont@sportify.com', '', ''),
(90, '132645', '', ''),
(91, '132645', 'Jean Dupont', 'Bonsoir'),
(92, '132645', '', ''),
(93, '132645', 'Sophie Leroy', 'Helooo'),
(94, 'jeans.dupont@sportify.com', '', ''),
(95, 'jeans.dupont@sportify.com', 'Mathurin', 'yo'),
(96, 'jeans.dupont@sportify.com', 'Mathurin', 'YO'),
(97, '132645', '', ''),
(98, '132645', 'Jean Dupont', '17411'),
(99, '132645', '', ''),
(100, '132645', 'Nicolas Dubreuil', 'lo'),
(101, 'jeans.dupont@sportify.com', '', ''),
(102, 'jeans.dupont@sportify.com', '', ''),
(103, 'jeans.dupont@sportify.com', '', ''),
(104, 'jeans.dupont@sportify.com', '', ''),
(105, 'jeans.dupont@sportify.com', '', ''),
(106, 'jeans.dupont@sportify.com', 'Mathurin', 'Coucou'),
(107, 'jeans.dupont@sportify.com', 'Mathurin', 'Coucou'),
(108, 'jeans.dupont@sportify.com', '', ''),
(109, 'jeans.dupont@sportify.com', '', ''),
(110, 'jeans.dupont@sportify.com', '', ''),
(111, 'jeans.dupont@sportify.com', '', ''),
(112, 'jeans.dupont@sportify.com', '', ''),
(113, 'jeans.dupont@sportify.com', '', ''),
(114, 'jeans.dupont@sportify.com', '', ''),
(115, 'jeans.dupont@sportify.com', '', ''),
(116, 'jeans.dupont@sportify.com', '', ''),
(117, 'jeans.dupont@sportify.com', '', ''),
(118, 'jeans.dupont@sportify.com', '', ''),
(119, 'jeans.dupont@sportify.com', 'Mathurin', 'Coucou'),
(120, 'jeans.dupont@sportify.com', '', ''),
(121, 'jeans.dupont@sportify.com', 'Mathurin', 'lo'),
(122, '$me_coach[Mail]', '$client', '$mess'),
(123, '$me_coach[Mail]', '$client', '$mess'),
(124, '$me_coach[Mail]', '$client', '$mess'),
(125, '132645', '', ''),
(126, '132645', 'Guy DUMAIS', 'heloo'),
(127, '132645', '', ''),
(128, '132645', '', ''),
(129, '132645', 'Marc Leclerc', 'Bonswar'),
(130, 'jeans.dupont@sportify.com', '', ''),
(131, 'jeans.dupont@sportify.com', 'Mathurin', 'Coucou'),
(154, '132645', '', ''),
(155, '132645', 'Jean Dupont', 'Helooo'),
(156, 'Jean Dupont', '', ''),
(157, 'Jean Dupont', '', ''),
(158, 'Jean Dupont', '', ''),
(159, 'Jean Dupont', '', ''),
(160, 'Jean Dupont', '', ''),
(161, 'Jean Dupont', '', ''),
(162, 'Jean Dupont', '', ''),
(163, 'Jean Dupont', '', ''),
(164, 'Jean Dupont', '', ''),
(165, '132645', '', ''),
(166, '132645', 'Guy DUMAIS', 'Coucou'),
(167, '132645', 'Jean Dupont', 'Helooo'),
(168, '132645', '', ''),
(169, 'Jean Dupont', '', ''),
(170, 'Jean Dupont', '132645', 'lo'),
(171, 'Jean Dupont', '', ''),
(172, 'Jean Dupont', '132645', 'yo'),
(173, 'Jean Dupont', '', ''),
(174, 'Jean Dupont', '', ''),
(175, 'Jean Dupont', '', ''),
(176, 'Jean Dupont', '', ''),
(177, 'Jean Dupont', '', ''),
(178, 'Jean Dupont', '', ''),
(179, 'Jean Dupont', '', ''),
(180, 'Jean Dupont', '', ''),
(181, 'Jean Dupont', '132645', 'Helooo'),
(182, 'Jean Dupont', '', ''),
(183, 'Jean Dupont', '', ''),
(184, 'Jean Dupont', '', ''),
(185, 'Jean Dupont', '132645', 'Hello '),
(186, 'Jean Dupont', '', ''),
(187, 'Jean Dupont', '', ''),
(188, 'Jean Dupont', '', ''),
(189, 'Jean Dupont', '', ''),
(190, 'Jean Dupont', '', ''),
(191, 'Jean Dupont', '', ''),
(192, 'Jean Dupont', '', ''),
(193, 'Jean Dupont', '', ''),
(194, 'Jean Dupont', '', ''),
(195, 'Jean Dupont', '', ''),
(196, 'Jean Dupont', '', ''),
(197, 'Jean Dupont', '', ''),
(198, 'Jean Dupont', '', ''),
(199, 'Jean Dupont', '', ''),
(200, 'Jean Dupont', '', ''),
(201, 'Jean Dupont', '', ''),
(202, 'Jean Dupont', '', ''),
(203, 'Jean Dupont', '', ''),
(204, 'Jean Dupont', '', ''),
(205, 'Jean Dupont', '', ''),
(206, '132645', '', ''),
(207, 'Jean Dupont', '', ''),
(208, 'Jean Dupont', '', ''),
(209, 'Jean Dupont', '', ''),
(210, 'Jean Dupont', '', ''),
(211, 'Jean Dupont', '', ''),
(212, 'Jean Dupont', '', ''),
(213, 'Jean Dupont', '', ''),
(214, 'Jean Dupont', '', ''),
(215, 'Jean Dupont', '', ''),
(216, 'Jean Dupont', '', ''),
(217, 'Jean Dupont', '', ''),
(218, 'Jean Dupont', '', ''),
(219, 'Jean Dupont', '', ''),
(220, 'Jean Dupont', '', ''),
(221, 'Jean Dupont', '', ''),
(222, 'Jean Dupont', '', ''),
(223, 'Jean Dupont', '', ''),
(224, 'Jean Dupont', '', ''),
(225, 'Jean Dupont', '', ''),
(226, 'Jean Dupont', '', ''),
(227, 'Jean Dupont', '', ''),
(228, 'Jean Dupont', '', ''),
(229, 'Jean Dupont', '', ''),
(230, 'Jean Dupont', '', ''),
(231, 'Jean Dupont', '', ''),
(232, 'Jean Dupont', '', ''),
(233, 'Jean Dupont', '', ''),
(234, 'Jean Dupont', '', ''),
(235, 'Jean Dupont', '', ''),
(236, 'Jean Dupont', '', ''),
(237, 'Jean Dupont', '', ''),
(238, 'Jean Dupont', '', ''),
(239, 'Jean Dupont', '', ''),
(240, 'Jean Dupont', '', ''),
(241, 'Jean Dupont', '', ''),
(242, 'Jean Dupont', '', ''),
(243, 'Jean Dupont', '', ''),
(244, 'Jean Dupont', '', ''),
(245, 'Jean Dupont', '', ''),
(246, 'Jean Dupont', '', ''),
(247, 'Jean Dupont', '', ''),
(248, 'Jean Dupont', '132645', 'lo'),
(249, 'Jean Dupont', '', ''),
(250, 'Jean Dupont', '', ''),
(251, 'Jean Dupont', '', ''),
(252, 'Jean Dupont', '', ''),
(253, 'Jean Dupont', '', ''),
(254, 'Jean Dupont', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `ID_coach` int NOT NULL,
  `Carte` int NOT NULL,
  `Heure` varchar(255) NOT NULL,
  `Lieu` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
