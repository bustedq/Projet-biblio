-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 29 oct. 2020 à 12:15
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_diogo_biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(300) NOT NULL,
  `prenom` varchar(300) NOT NULL,
  `nationalite` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom`, `prenom`, `nationalite`) VALUES
(1, 'Machin', 'Bidule', 'Chinois'),
(9, 'Jean', 'Marie', 'Français'),
(10, 'Emile', 'Zola', 'Français'),
(11, 'Fourty', 'Two', '42');

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

CREATE TABLE `bibliotheque` (
  `id_bibliotheque` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bibliotheque`
--

INSERT INTO `bibliotheque` (`id_bibliotheque`, `nom`, `prenom`, `telephone`) VALUES
(1, 'BNF', 'François', '0658785979'),
(3, 'Quillot', 'Alain', '0123456789'),
(4, 'Bibliotheque Diogo', 'Bidule ', '09349523478'),
(11, '12345', '67890', '01010100101'),
(15, 'York', 'New', '0901020304');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(300) NOT NULL,
  `prenom` varchar(300) NOT NULL,
  `telephone` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `telephone`) VALUES
(1, 'Casskoui', 'Jacquie', '0123456789'),
(2, 'Gentil', 'Michel', '0987654321');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `id_editeur` int(11) NOT NULL,
  `nom` varchar(300) NOT NULL,
  `adresse` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id_editeur`, `nom`, `adresse`) VALUES
(1, 'Gallimard', '12, Rue de la paix'),
(4, 'PIKA', '42, fourty-two');

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `id_client` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_emprunt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunter`
--

INSERT INTO `emprunter` (`id_client`, `id_livre`, `date_emprunt`) VALUES
(1, 1, '2020-09-22'),
(2, 4, '2020-09-23'),
(1, 8, '2020-09-24');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(300) NOT NULL,
  `genre` varchar(300) NOT NULL,
  `id_bibliotheque` int(11) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `pages` varchar(200) NOT NULL,
  `prix` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `genre`, `id_bibliotheque`, `logo`, `pages`, `prix`, `description`) VALUES
(1, 'Les Accords Toltèque', 'Spirituel', 4, '', '', '', ''),
(4, 'Le petit chaperon rouge', 'Enfants', 1, '', '', '', ''),
(6, 'The Simpsons', 'Comédie', 4, '', '', '', ''),
(7, 'Machin chose', 'Rien', 4, '', '', '', ''),
(8, 'Les 3 petits cochons', 'Enfants', 3, '', '', '', ''),
(22, 'Armin', 'snk', 4, '5f855f9acae98-armin.jpg', '', '', ''),
(23, 'Mikasa', 'SNK', 4, '5f845a68a0fc0-snk.jpg', '', '', ''),
(24, 'test', 'test', 11, '../uploads/levi2.png', '', '', ''),
(25, 'Le nom de la Rose', 'Policier Historique', 4, '5f99643580d76-armin.jpg', '', '', ''),
(26, 'test7', 'test7', 11, '../uploads/levi2.png', '', '', ''),
(27, 'Testouille', 'Testouilles', 15, '5f8809f1d2e00-ps5-logo.jpg', '', '', ''),
(28, 'Gon', 'HxH', 15, '5f880bb5187fc-gon.jpg', '', '', ''),
(29, 'Essai', 'Essai', 3, '5f99692e4abea-gon.jpg', '350', '400', 'Essai'),
(30, 'Titre', 'Genre', 4, '5f99471eb0a0b-levi2.png', 'Description', 'Prix', 'Pages');

-- --------------------------------------------------------

--
-- Structure de la table `publier`
--

CREATE TABLE `publier` (
  `id_publier` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_editeur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_publication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publier`
--

INSERT INTO `publier` (`id_publier`, `id_auteur`, `id_editeur`, `id_livre`, `date_publication`) VALUES
(7, 11, 4, 22, '2020-10-09'),
(8, 9, 1, 23, '2020-10-07'),
(9, 1, 1, 25, '2020-10-03'),
(10, 9, 1, 26, '2020-10-23'),
(11, 11, 4, 27, '2020-11-05'),
(12, 11, 4, 28, '2020-10-22'),
(13, 1, 1, 29, '2020-10-07'),
(14, 9, 4, 30, '2020-10-29');

-- --------------------------------------------------------

--
-- Structure de la table `rendre`
--

CREATE TABLE `rendre` (
  `id_rendre` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `age` int(200) NOT NULL,
  `sexe` varchar(200) NOT NULL,
  `pays` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `prenom`, `mail`, `mdp`, `age`, `sexe`, `pays`, `role`) VALUES
(1, 'azer', 'azer@gmail.com', '5641', 22, 'homme', 'france', 'admin'),
(2, 'zer', 'zer@gmail.com', 'ezmkr', 22, 'homme', 'france', 'admin'),
(3, 'Diogo', 'Diogo@gmail.com', 'Diogo', 22, 'homme', 'france', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD PRIMARY KEY (`id_bibliotheque`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`id_editeur`);

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `id_bibliotheque` (`id_bibliotheque`);

--
-- Index pour la table `publier`
--
ALTER TABLE `publier`
  ADD PRIMARY KEY (`id_publier`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_editeur` (`id_editeur`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `rendre`
--
ALTER TABLE `rendre`
  ADD PRIMARY KEY (`id_rendre`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  MODIFY `id_bibliotheque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `id_editeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `publier`
--
ALTER TABLE `publier`
  MODIFY `id_publier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `rendre`
--
ALTER TABLE `rendre`
  MODIFY `id_rendre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `emprunter_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `emprunter_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`id_bibliotheque`) REFERENCES `bibliotheque` (`id_bibliotheque`);

--
-- Contraintes pour la table `publier`
--
ALTER TABLE `publier`
  ADD CONSTRAINT `publier_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`),
  ADD CONSTRAINT `publier_ibfk_2` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id_editeur`),
  ADD CONSTRAINT `publier_ibfk_3` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`);

--
-- Contraintes pour la table `rendre`
--
ALTER TABLE `rendre`
  ADD CONSTRAINT `rendre_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `rendre_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
