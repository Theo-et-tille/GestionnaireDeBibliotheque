-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 déc. 2024 à 08:18
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
-- Base de données : `sle_biblio_structure`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id_auteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `ref_pays` int NOT NULL,
  PRIMARY KEY (`id_auteur`),
  KEY `fk_auteur_pays` (`ref_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom`, `prenom`, `date_naissance`, `ref_pays`) VALUES
(2, 'Hugo', 'Victor', '1802-02-18', 1),
(3, 'Sartre', 'Jean-Paul', '1905-06-18', 1),
(5, 'Lemoine', 'Sébastien', '0001-01-01', 2),
(6, 'Zola', 'Emile', '2000-12-12', 7),
(8, 'De Maupassant', 'Guy', '1850-08-05', 1),
(10, 'Goodkind', 'Terry', '1974-12-12', 3);

-- --------------------------------------------------------

--
-- Structure de la table `ecrire`
--

DROP TABLE IF EXISTS `ecrire`;
CREATE TABLE IF NOT EXISTS `ecrire` (
  `ref_livre` int NOT NULL,
  `ref_auteur` int NOT NULL,
  PRIMARY KEY (`ref_livre`,`ref_auteur`),
  KEY `fk_ecrire_auteur` (`ref_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecrire`
--

INSERT INTO `ecrire` (`ref_livre`, `ref_auteur`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 3),
(5, 3),
(6, 5),
(10, 6),
(7, 10),
(8, 10),
(9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

DROP TABLE IF EXISTS `edition`;
CREATE TABLE IF NOT EXISTS `edition` (
  `id_edition` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_edition`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `edition`
--

INSERT INTO `edition` (`id_edition`, `nom`) VALUES
(1, 'Lemoine'),
(2, 'Pocket'),
(3, 'Le Livre de poche jeunesse'),
(4, 'Folio classique'),
(5, 'Le Livre de poche'),
(6, 'Gallimard'),
(7, ' Bragelonne');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_emprunt` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `delais` int NOT NULL,
  `ref_exemplaire` int NOT NULL,
  `ref_inscrit` int NOT NULL,
  PRIMARY KEY (`id_emprunt`),
  KEY `fk_emprunt_exemplaire` (`ref_exemplaire`),
  KEY `fk_emprunt_inscrit` (`ref_inscrit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `date`, `delais`, `ref_exemplaire`, `ref_inscrit`) VALUES
(1, '2021-01-01', 365, 1, 1),
(2, '2024-11-12', 3, 14, 2),
(3, '2024-11-12', 6, 15, 2),
(4, '2024-11-12', 9, 16, 2);

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `id_exemplaire` int NOT NULL AUTO_INCREMENT,
  `ref_livre` int NOT NULL,
  `ref_edition` int NOT NULL,
  PRIMARY KEY (`id_exemplaire`),
  KEY `fk_exemplaire_edition` (`ref_edition`),
  KEY `fk_exemplaire_livre` (`ref_livre`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`id_exemplaire`, `ref_livre`, `ref_edition`) VALUES
(1, 6, 1),
(2, 1, 2),
(3, 1, 2),
(4, 2, 3),
(5, 2, 3),
(6, 2, 4),
(7, 3, 5),
(8, 4, 6),
(9, 6, 1),
(10, 6, 1),
(11, 6, 1),
(12, 6, 1),
(13, 6, 1),
(14, 7, 7),
(15, 8, 7),
(16, 9, 7);

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
CREATE TABLE IF NOT EXISTS `inscrit` (
  `id_inscrit` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel_fixe` varchar(15) NOT NULL,
  `tel_portable` varchar(15) NOT NULL,
  `rue` varchar(80) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `role` int DEFAULT NULL,
  PRIMARY KEY (`id_inscrit`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrit`
--

INSERT INTO `inscrit` (`id_inscrit`, `nom`, `prenom`, `email`, `tel_fixe`, `tel_portable`, `rue`, `cp`, `ville`, `mdp`, `role`) VALUES
(1, 'Lemoine', 'Sébastien', 's.lemoine@lprs.fr', '0', '33675574985', '5 Avenue du Général de Gaulle', '93440', 'Dugny', '', NULL),
(2, 'enfedaque', 'theo', 'llflflld@fjsld.com', '0112345678', '0612345678', 'rue du rue', '95470', 'FOsses', '', NULL),
(4, 'Enfedaque', 'Theo', 'a@a', '30394095', '3933249', '60 square d\'alsace', '95470', 'FOSSES', '1234', 0),
(9, 'rez', 'kkjhkj', 'kjbkj@khlk', 'nkjgkj', 'jkhgbj', 'vhjkbjhf', 'jkhkl', 'vjhkbklbh', 'khlmjomi', NULL),
(10, 'Sucebite', 'maqueue', 'lechouille@pute.fr', '01847518', '093584858', 'rue du zeub', '97706', 'Paris', '1234', NULL),
(13, 'test', 'test', 'test@test', 'test', 'test', 'test', 'test', 'test', 'test', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `annee` varchar(4) NOT NULL,
  `resume` text NOT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `annee`, `resume`) VALUES
(1, 'Le Dernier Jour d\'un condamné', '1832', 'Ce roman se présente comme le journal d\'un condamné à mort écrit durant les vingt-quatre dernières heures de son existence dans lequel il raconte ce qu\'il a vécu depuis le début de son procès jusqu\'au moment de son exécution, soit environ cinq semaines de sa vie. [...]'),
(2, 'Notre-Dame de Paris', '1831', 'L\'intrigue se déroule à Paris en 1482. Les deux premiers livres (I et II) du roman suivent Pierre Gringoire, poète sans le sou. Gringoire est l\'auteur d\'un mystère qui doit être représenté le 6 janvier 1482 au Palais de justice en l\'honneur d\'une ambassade flamande. [...]'),
(3, 'Les Misérables', '1862', 'L\'action se déroule en France au cours du premier tiers du XIXe siècle, entre la bataille de Waterloo (1815) et les émeutes de juin 1832. On y suit, sur cinq tomes3, la vie de Jean Valjean, de sa sortie du bagne jusqu\'à sa mort. [...]'),
(4, 'L\'Être et le Néant', '1943', 'L\'être ne saurait engendrer que l\'être et, l\'homme étant englobé dans un processus générationnel, il ne sortira de lui que de « l\'être ».[...]'),
(5, 'L\'existentialisme est un humanisme', '1946', 'Sartre y présente son existentialisme et répond aux critiques faites par des penseurs chrétiens ou marxistes, et en particulier par les communistes - dont il souhaite se rapprocher. Ce texte constitue une sorte d\'introduction à l\'existentialisme. Toutefois sa simplicité a par la suite conduit Sartre à le renier. [...]'),
(6, 'Le dieu de la programmation', '2005', 'En fait, je suis trop fort'),
(7, 'l’épée de vérité tome 1', '2000', 'La flemme '),
(8, 'l’épée de vérité tome 2', '2001', 'la flememe'),
(9, 'l’épée de vérité tome 3', '2002', 'kelsoe'),
(10, 'Germinal', '2004', 'clskjlkjlkfsjlkjlkdsfjkklfjlks');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom`) VALUES
(1, 'France'),
(2, 'Espagne'),
(3, 'Portugal'),
(4, 'Amerique'),
(5, 'Belgique'),
(6, 'Allemagne'),
(7, 'Italie'),
(8, 'Suisse'),
(9, 'Grèce');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `fk_auteur_pays` FOREIGN KEY (`ref_pays`) REFERENCES `pays` (`id_pays`);

--
-- Contraintes pour la table `ecrire`
--
ALTER TABLE `ecrire`
  ADD CONSTRAINT `fk_ecrire_auteur` FOREIGN KEY (`ref_auteur`) REFERENCES `auteur` (`id_auteur`),
  ADD CONSTRAINT `fk_ecrire_livre` FOREIGN KEY (`ref_livre`) REFERENCES `livre` (`id_livre`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `fk_emprunt_exemplaire` FOREIGN KEY (`ref_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`),
  ADD CONSTRAINT `fk_emprunt_inscrit` FOREIGN KEY (`ref_inscrit`) REFERENCES `inscrit` (`id_inscrit`);

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `fk_exemplaire_edition` FOREIGN KEY (`ref_edition`) REFERENCES `edition` (`id_edition`),
  ADD CONSTRAINT `fk_exemplaire_livre` FOREIGN KEY (`ref_livre`) REFERENCES `livre` (`id_livre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
