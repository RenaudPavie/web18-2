-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 juin 2019 à 10:00
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
-- Base de données :  `cartes`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_news`
--

DROP TABLE IF EXISTS `t_news`;
CREATE TABLE IF NOT EXISTS `t_news` (
  `id_new` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `contenu` text NOT NULL,
  `t_users_id_user` int(10) UNSIGNED NOT NULL,
  `dateredaction` datetime DEFAULT NULL,
  `datepublication` datetime DEFAULT NULL,
  PRIMARY KEY (`id_new`,`t_users_id_user`),
  KEY `fk_t_news_t_users1_idx` (`t_users_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_parties`
--

DROP TABLE IF EXISTS `t_parties`;
CREATE TABLE IF NOT EXISTS `t_parties` (
  `t_users_id_user` int(10) UNSIGNED NOT NULL,
  `t_users_id_user1` int(10) UNSIGNED NOT NULL,
  `partiedebut` datetime NOT NULL,
  `partiefin` datetime DEFAULT NULL,
  `partienbrtours` int(11) NOT NULL DEFAULT '0',
  `score` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`t_users_id_user`,`t_users_id_user1`),
  KEY `fk_t_users_has_t_users_t_users2_idx` (`t_users_id_user1`),
  KEY `fk_t_users_has_t_users_t_users1_idx` (`t_users_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_roles`
--

DROP TABLE IF EXISTS `t_roles`;
CREATE TABLE IF NOT EXISTS `t_roles` (
  `id_roles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rollibelle` varchar(45) NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_users`
--

DROP TABLE IF EXISTS `t_users`;
CREATE TABLE IF NOT EXISTS `t_users` (
  `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usenom` varchar(128) NOT NULL,
  `useprenom` varchar(128) NOT NULL,
  `usemail` varchar(255) NOT NULL,
  `usepwd` varchar(255) NOT NULL,
  `useactif` int(11) NOT NULL DEFAULT '0',
  `usedatetime` datetime NOT NULL,
  `usetoken` char(64) NOT NULL,
  `id_roles` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_t_users_t_roles_idx` (`id_roles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_news`
--
ALTER TABLE `t_news`
  ADD CONSTRAINT `fk_t_news_t_users1` FOREIGN KEY (`t_users_id_user`) REFERENCES `t_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `t_parties`
--
ALTER TABLE `t_parties`
  ADD CONSTRAINT `fk_t_users_has_t_users_t_users1` FOREIGN KEY (`t_users_id_user`) REFERENCES `t_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_users_has_t_users_t_users2` FOREIGN KEY (`t_users_id_user1`) REFERENCES `t_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `t_users`
--
ALTER TABLE `t_users`
  ADD CONSTRAINT `fk_t_users_t_roles` FOREIGN KEY (`id_roles`) REFERENCES `t_roles` (`id_roles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
