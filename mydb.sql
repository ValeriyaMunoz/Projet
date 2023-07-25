-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 juil. 2023 à 07:51
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_de_creation` datetime DEFAULT NULL,
  `prix` double(4,2) DEFAULT NULL,
  `statut_echange_ou_paiement` int(1) DEFAULT NULL,
  `frais_supplementaire_publication` double DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `Statut_annonce_validee_bloque` tinyint(1) DEFAULT '4',
  `date_fin_annonce` datetime DEFAULT NULL,
  `idMembre` int(11) DEFAULT NULL,
  `duree_publication` int(11) DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `idEtat` int(11) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Annonce_Membre` (`idMembre`),
  KEY `fk_Annonce_etats1` (`idEtat`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `description`, `date_de_creation`, `prix`, `statut_echange_ou_paiement`, `frais_supplementaire_publication`, `ville`, `Statut_annonce_validee_bloque`, `date_fin_annonce`, `idMembre`, `duree_publication`, `date_validation`, `idEtat`, `idCategorie`) VALUES
(58, 'Polo', 'DFGTBY', '2023-06-20 12:57:57', 10.00, 1, NULL, 'Cannes', 2, '2023-07-23 00:00:00', 2, 30, '2023-06-23 14:13:25', NULL, 3),
(60, 'Polo', 'Polo rouge Homme', '2023-06-23 14:11:12', 10.00, 0, NULL, 'Grasse', 2, '2023-07-23 00:00:00', 2, 30, '2023-06-23 14:13:32', NULL, 2),
(61, 'T-Shirt', 'T-shirt blanc', '2023-06-23 14:11:43', 20.00, 1, NULL, 'Antibes', 4, NULL, 2, NULL, NULL, NULL, 1),
(62, 'Homme', 'Age 30 ans', '2023-06-23 14:12:12', 9.00, 1, NULL, 'Cannes', 4, NULL, 2, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(150) DEFAULT NULL,
  `idAnnonce` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAnnonce` (`idAnnonce`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`, `idAnnonce`) VALUES
(1, 'JOUET&JEUX', NULL),
(2, 'HABILLEMENT', NULL),
(3, 'MAISON ET CUISINE', NULL),
(4, 'ELECTRONIQUE', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut_commande` int(11) DEFAULT NULL,
  `date_livraison` date DEFAULT NULL,
  `date_commande` date DEFAULT NULL,
  `idMembre` int(11) NOT NULL,
  `idAnnonce` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Commande_Membre1` (`idMembre`),
  KEY `fk_Commande_Annonce1` (`idAnnonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut_conversation` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `envoyer_recevoir_message`
--

DROP TABLE IF EXISTS `envoyer_recevoir_message`;
CREATE TABLE IF NOT EXISTS `envoyer_recevoir_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMembre` int(11) NOT NULL,
  `idmessagerie` int(11) NOT NULL,
  `idConversation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_envoyer_recevoir_message_Membre1` (`idMembre`),
  KEY `fk_envoyer_recevoir_message_Messagerie1` (`idmessagerie`),
  KEY `fk_envoyer_recevoir_message_Conversation1` (`idConversation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

DROP TABLE IF EXISTS `etats`;
CREATE TABLE IF NOT EXISTS `etats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `nom`) VALUES
(1, 'Neuf');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `idAnnonce` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  KEY `fk_Favoris_Annonce1` (`idAnnonce`),
  KEY `fk_Favoris_Membre1` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(80) DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `code_postale` varchar(7) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `date_validite_email` datetime DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `montant_cagnotte` float DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `is_admin` int(4) DEFAULT '0',
  `url_photo_profil` varchar(300) DEFAULT 'assets/image_profil/avatar.jpg',
  `username` varchar(45) DEFAULT NULL,
  `token` varchar(150) DEFAULT NULL,
  `date_validite_token` time DEFAULT NULL,
  `actif` int(4) DEFAULT '0',
  `ville` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `adresse`, `code_postale`, `telephone`, `date_inscription`, `hash`, `date_validite_email`, `email`, `montant_cagnotte`, `date_naissance`, `is_admin`, `url_photo_profil`, `username`, `token`, `date_validite_token`, `actif`, `ville`) VALUES
(2, 'Toto', 'Fifi', '7B chemin Ru, 98', '06800', '0766666666', NULL, '$2y$10$HXYz6mTYXw.bkX2KZqLyROgqByjMBJZvLAdllEhrSQ0OgBcyFgV4i', NULL, 'lerart@outlook.com', NULL, '2008-06-25', 1, 'assets/image_profil/AvatarID2.jpg', 'Aura', '20bed96b32219f60e54e7a1e6607d6c0', '00:20:00', 1, 'Antibes');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(150) DEFAULT NULL,
  `date_message` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAnnonce` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Panier_Annonce1` (`idAnnonce`),
  KEY `fk_Panier_Membre1` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier_chemin` varchar(150) DEFAULT NULL,
  `idAnnonce` int(11) NOT NULL,
  `is_main_photo` int(11) DEFAULT NULL,
  `legende` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Photo_Annonce1` (`idAnnonce`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `fichier_chemin`, `idAnnonce`, `is_main_photo`, `legende`) VALUES
(70, 'assets/image_user/ID_user2Annonce-58-0.jpg', 58, 1, NULL),
(71, 'assets/image_user/ID_user2Annonce-58-1.jpg', 58, 0, NULL),
(73, 'assets/image_user/ID_user2Annonce-60-0.jpg', 60, 1, NULL),
(74, 'assets/image_user/ID_user2Annonce-61-0.jpg', 61, 1, NULL),
(75, 'assets/image_user/ID_user2Annonce-61-1.jpg', 61, 0, NULL),
(76, 'assets/image_user/ID_user2Annonce-62-0.jpg', 62, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_transaction` datetime DEFAULT NULL,
  `somme_transaction` double DEFAULT NULL,
  `idExterne` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Transaction_Membre1` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `fk_Annonce_Membre` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Annonce_etats1` FOREIGN KEY (`idEtat`) REFERENCES `etats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`idAnnonce`) REFERENCES `annonce` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_Commande_Annonce1` FOREIGN KEY (`idAnnonce`) REFERENCES `annonce` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_Membre1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `envoyer_recevoir_message`
--
ALTER TABLE `envoyer_recevoir_message`
  ADD CONSTRAINT `fk_envoyer_recevoir_message_Conversation1` FOREIGN KEY (`idConversation`) REFERENCES `conversation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_envoyer_recevoir_message_Membre1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_envoyer_recevoir_message_Messagerie1` FOREIGN KEY (`idmessagerie`) REFERENCES `messagerie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `fk_Favoris_Annonce1` FOREIGN KEY (`idAnnonce`) REFERENCES `annonce` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Favoris_Membre1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_Panier_Annonce1` FOREIGN KEY (`idAnnonce`) REFERENCES `annonce` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Panier_Membre1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_Photo_Annonce1` FOREIGN KEY (`idAnnonce`) REFERENCES `annonce` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_Transaction_Membre1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
