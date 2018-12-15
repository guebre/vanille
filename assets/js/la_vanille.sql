-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 15 déc. 2018 à 23:12
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `la_vanille`
--

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

DROP TABLE IF EXISTS `caisse`;
CREATE TABLE IF NOT EXISTS `caisse` (
  `montant` double UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(3) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(200) NOT NULL,
  `photo` blob NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(5) NOT NULL AUTO_INCREMENT,
  `id_plat` int(5) DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `quantite` int(5) DEFAULT NULL,
  `date_commande` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_table` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `id_plat` int(6) NOT NULL AUTO_INCREMENT,
  `nom_plat` varchar(255) NOT NULL,
  `prix` int(5) UNSIGNED NOT NULL,
  `id_cat` int(5) NOT NULL,
  `quantite` int(4) DEFAULT NULL,
  `quantite_seuil` int(4) DEFAULT NULL,
  `statut` int(1) DEFAULT '1',
  PRIMARY KEY (`id_plat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_prod` int(5) NOT NULL AUTO_INCREMENT,
  `nom_prod` varchar(80) NOT NULL,
  `prix_unit` double NOT NULL,
  `quantite` int(5) NOT NULL,
  `photo_prod` blob NOT NULL,
  `qte_alert` int(5) NOT NULL,
  `date_appro` date NOT NULL,
  `categorie` int(3) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(3) NOT NULL AUTO_INCREMENT,
  `slug` varchar(30) DEFAULT NULL,
  `niveau` int(2) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `login_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `loginAt` datetime DEFAULT NULL,
  `loginEnd` datetime DEFAULT NULL,
  `statut` int(1) DEFAULT '1',
  `niveau` int(3) DEFAULT NULL COMMENT 'racourci de role_id',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `van_table`
--

DROP TABLE IF EXISTS `van_table`;
CREATE TABLE IF NOT EXISTS `van_table` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `code_table` char(10) DEFAULT NULL,
  `nb_place` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id_vente` int(15) NOT NULL AUTO_INCREMENT,
  `id_plat` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int(5) NOT NULL,
  `code_facture` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `date_commande` datetime DEFAULT NULL,
  `vente_status` int(1) DEFAULT '0',
  PRIMARY KEY (`id_vente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
