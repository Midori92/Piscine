-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 mai 2024 à 19:56
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

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `ID_coach` int NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Structure de la table `dispo_lundi`
--

DROP TABLE IF EXISTS `dispo_lundi`;
CREATE TABLE IF NOT EXISTS `dispo_lundi` (
  `Lundi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Mardi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Mercredi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Jeudi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Vendredi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Samedi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Dimanhe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ID_coach` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_coach`)
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
