-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 19 jan. 2019 à 16:55
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

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`montant`) VALUES
(10000);

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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`, `photo`) VALUES
(17, 'SANDWISH', ''),
(16, 'BOISSON FRAICHE', ''),
(15, 'FAST FOOD', ''),
(36, 'PLATS', ''),
(35, 'PETIT DEJEUNER', ''),
(18, 'SALADES', ''),
(30, 'POULETS', ''),
(20, 'BŒUF', ''),
(24, 'COUPE DE GLACES', ''),
(27, 'GLACE', ''),
(28, 'ACCOMPAGNEMENT', '');

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

--
-- Déchargement des données de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('gtnjqdh7h8ck74ngtmfpgf63qtdmuaim', '::1', 1547895342, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373839353232333b69645f757365727c733a313a2231223b6c6f67696e5f757365727c733a31303a22697a616e616d69343131223b6c6f67696e41747c733a31393a22323031392d30312d30352031373a34373a3033223b6c6f67696e456e647c733a31393a22323031392d30312d30352031373a35313a3435223b7374617475747c733a313a2231223b6e69766561757c733a313a2231223b6c6f676765645f696e7c623a313b6c6f6741747c733a31393a22323031392d30312d31392031303a33353a3236223b),
('1n9bs5uo3upl4kr2nfe5rirfcaas3pos', '::1', 1547891185, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373839313137363b69645f757365727c733a313a2231223b6c6f67696e5f757365727c733a31303a22697a616e616d69343131223b6c6f67696e41747c733a31393a22323031392d30312d30352031373a34373a3033223b6c6f67696e456e647c733a31393a22323031392d30312d30352031373a35313a3435223b7374617475747c733a313a2231223b6e69766561757c733a313a2231223b6c6f676765645f696e7c623a313b6c6f6741747c733a31393a22323031392d30312d31392030393a34363a3234223b),
('9qon8j67g03qe1kpsbia2msjl39h4rfr', '::1', 1547892781, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373839323635313b69645f757365727c733a313a2231223b6c6f67696e5f757365727c733a31303a22697a616e616d69343131223b6c6f67696e41747c733a31393a22323031392d30312d30352031373a34373a3033223b6c6f67696e456e647c733a31393a22323031392d30312d30352031373a35313a3435223b7374617475747c733a313a2231223b6e69766561757c733a313a2231223b6c6f676765645f696e7c623a313b6c6f6741747c733a31393a22323031392d30312d31392031303a31333a3031223b),
('6p9a8rvgala41bdmqgl8rvg56voqddkl', '::1', 1547888695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373838383639353b),
('utkbq9tb6o42j85t9bmnko3r413e385d', '::1', 1547888695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373838383639353b),
('0bi9idnm3ufrahckf3s7fn1p00n9kr2h', '::1', 1547888976, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373838383936353b69645f757365727c733a313a2231223b6c6f67696e5f757365727c733a31303a22697a616e616d69343131223b6c6f67696e41747c733a31393a22323031392d30312d30352031373a34373a3033223b6c6f67696e456e647c733a31393a22323031392d30312d30352031373a35313a3435223b7374617475747c733a313a2231223b6e69766561757c733a313a2231223b6c6f676765645f696e7c623a313b6c6f6741747c733a31393a22323031392d30312d31392030393a30393a3336223b),
('t8au9d3i68qq30edk5f1e8k9va31qatv', '::1', 1547591489, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539313436363b),
('7727hgs10hf3rnckstbtd4ek861h4gon', '::1', 1547591469, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539313436363b),
('ljumivelspifof1eii64oak6kcdnj9sh', '::1', 1547592186, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539323039383b69645f757365727c733a313a2231223b6c6f67696e5f757365727c733a31303a22697a616e616d69343131223b6c6f67696e41747c733a31393a22323031392d30312d30352031373a34373a3033223b6c6f67696e456e647c733a31393a22323031392d30312d30352031373a35313a3435223b7374617475747c733a313a2231223b6e69766561757c733a313a2231223b6c6f676765645f696e7c623a313b6c6f6741747c733a31393a22323031392d30312d31352032323a34313a3533223b);

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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_plat`, `id_user`, `prix`, `quantite`, `date_commande`, `id_table`) VALUES
(37, 1, 1, '500', 2, '2019-01-13 22:03:21', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id_plat`, `nom_plat`, `prix`, `id_cat`, `quantite`, `quantite_seuil`, `statut`) VALUES
(1, 'THE', 250, 35, 48, 10, 1),
(2, 'SPAGUETTI BOLONIESE', 1300, 36, NULL, NULL, 1),
(4, 'VANILLE', 500, 27, 24, 10, 1),
(5, 'FRAISE', 500, 27, 24, 10, 1),
(6, 'FRAISE1', 600, 27, 25, 5, 1),
(7, 'SANDWISH AUX OMELETTES', 750, 17, NULL, NULL, 1),
(8, 'POULET GRILLE A LAIL', 4000, 30, 1, 0, 1),
(9, 'ALOCO', 1000, 28, 0, 0, 0),
(13, 'SPAGHETTI', 1200, 36, 8, 4, 1),
(14, 'ŒUF AU PLAT 03 ŒUFS', 800, 35, 0, 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `slug`, `niveau`) VALUES
(1, 'admin_general', 1),
(2, 'patron', 2),
(3, 'caisse', 3);

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
  `mail_user` varchar(100) NOT NULL,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `phone1_user` varchar(20) NOT NULL,
  `phone2_user` varchar(20) NOT NULL,
  `add_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `login_user`, `password_user`, `loginAt`, `loginEnd`, `statut`, `niveau`, `mail_user`, `nom_user`, `prenom_user`, `phone1_user`, `phone2_user`, `add_user`) VALUES
(1, 'izanami411', '12e29314399379a59deac5a9a4cce07d5e0ba9c5ee080d71b24f21ed89ad7314d5e566a5489c93393cc009e70a84d4aa5b641a312c9ebe64c295e6131dcb9e82ikVZhofrvgedVKLUqR7nd51n4k6HgKfi2c0v65u4wEI=', '2019-01-05 17:47:03', '2019-01-05 17:51:45', 1, 1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `van_table`
--

DROP TABLE IF EXISTS `van_table`;
CREATE TABLE IF NOT EXISTS `van_table` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `code_table` int(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `nb_place` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `van_table`
--

INSERT INTO `van_table` (`id`, `code_table`, `nb_place`) VALUES
(3, 01, NULL),
(4, 02, NULL),
(8, 03, NULL),
(9, 04, NULL),
(10, 05, NULL),
(11, 06, NULL),
(12, 07, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
