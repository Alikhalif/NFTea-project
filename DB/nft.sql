-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 24 nov. 2022 à 09:21
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nft`
--

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE `collection` (
  `idC` int(8) NOT NULL,
  `nomC` varchar(255) NOT NULL,
  `nomartiste` varchar(255) NOT NULL,
  `imgartist` varchar(1000) NOT NULL,
  `imgCollection` varchar(2000) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idAd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `collection`
--

INSERT INTO `collection` (`idC`, `nomC`, `nomartiste`, `imgartist`, `imgCollection`, `idUser`, `idAd`) VALUES
(43, 'milano', 'marsello', '637e3df98402d457-1664881990.jfif', '637e3df98443bnike1.jpg', NULL, 100),
(44, 'Khalif Abdelali', 'Khalif Abdelali', '637ce43715cb5map.png', '637ce43715e1dCapture d’écran 2022-10-13 104040.png', NULL, 100);

-- --------------------------------------------------------

--
-- Structure de la table `nfts`
--

CREATE TABLE `nfts` (
  `idN` int(8) NOT NULL,
  `nomN` varchar(255) NOT NULL,
  `descriptionN` varchar(1000) NOT NULL,
  `prixN` float NOT NULL,
  `imageN` varchar(2000) NOT NULL,
  `idCol` int(11) NOT NULL,
  `idAd` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nfts`
--

INSERT INTO `nfts` (`idN`, `nomN`, `descriptionN`, `prixN`, `imageN`, `idCol`, `idAd`, `idUser`) VALUES
(9, 'boura mousta', 'sergtsergs', 22, '637d250db746enike3.jpg', 44, 100, NULL),
(11, 'hitaka', 'hitaka', 23, '637cf3a4f2275bg.jpg', 44, 100, NULL),
(12, 'ossama', 'msjkdfngkjsnd', 22, '637d32e51b87cnike2.jpg', 43, NULL, 13);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idL` int(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idL`, `email`, `password`, `name`) VALUES
(13, 'ali@hhhh', '123', 'ali');

-- --------------------------------------------------------

--
-- Structure de la table `xadmin`
--

CREATE TABLE `xadmin` (
  `idAdmin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `xadmin`
--

INSERT INTO `xadmin` (`idAdmin`, `email`, `pass`) VALUES
(100, 'admin', 'azer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`idC`),
  ADD KEY `collection_ibfk_1` (`idUser`),
  ADD KEY `idAd` (`idAd`);

--
-- Index pour la table `nfts`
--
ALTER TABLE `nfts`
  ADD PRIMARY KEY (`idN`),
  ADD KEY `idCol` (`idCol`),
  ADD KEY `idAd` (`idAd`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idL`);

--
-- Index pour la table `xadmin`
--
ALTER TABLE `xadmin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `collection`
--
ALTER TABLE `collection`
  MODIFY `idC` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `nfts`
--
ALTER TABLE `nfts`
  MODIFY `idN` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idL` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `xadmin`
--
ALTER TABLE `xadmin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collection_ibfk_2` FOREIGN KEY (`idAd`) REFERENCES `xadmin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `nfts`
--
ALTER TABLE `nfts`
  ADD CONSTRAINT `nfts_ibfk_1` FOREIGN KEY (`idCol`) REFERENCES `collection` (`idC`) ON DELETE CASCADE,
  ADD CONSTRAINT `nfts_ibfk_2` FOREIGN KEY (`idAd`) REFERENCES `xadmin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nfts_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `user` (`idL`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
