-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 25 Novembre 2014 à 10:15
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `utmb`
--

-- --------------------------------------------------------

--
-- Structure de la table `benevole`
--

CREATE TABLE IF NOT EXISTS `benevole` (
  `idBenevole` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `codePostal` char(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(50) NOT NULL,
  `telephone` char(10) NOT NULL,
  `courriel` varchar(100) NOT NULL,
  `sexe` char(1) NOT NULL,
  `dateNaissance` date NOT NULL,
  `taille` varchar(3) DEFAULT NULL,
  `permisConduire` int(11) DEFAULT NULL,
  `diplomeSecouriste` int(11) DEFAULT NULL,
  `niveauRando` int(11) DEFAULT NULL,
  `niveauInfo` int(11) DEFAULT NULL,
  `idTypePoste` int(10) unsigned DEFAULT NULL,
  `idCentre` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idBenevole`),
  KEY `idTypePoste` (`idTypePoste`),
  KEY `idCentre` (`idCentre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `benevole`
--

INSERT INTO `benevole` (`idBenevole`, `login`, `mdp`, `nom`, `prenom`, `adresse`, `codePostal`, `ville`, `pays`, `telephone`, `courriel`, `sexe`, `dateNaissance`, `taille`, `permisConduire`, `diplomeSecouriste`, `niveauRando`, `niveauInfo`, `idTypePoste`, `idCentre`) VALUES
(1, 'gberger', '873e44861121144eed2c63beb170b14f0a02f5e6', 'Berger', 'Gaston', 'Avenue Gaston Berger', '59000', 'LILLE', 'FRANCE', '0320493159', 'gaston@gastonberger.fr', 'M', '1896-10-01', 'M', 1, 0, 1, 2, 3, 1),
(2, '', '', 'toto', 'titi', NULL, NULL, NULL, '', '0312345678', 'toto@gmail.fr', 'M', '1994-10-01', 'M', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE IF NOT EXISTS `centre` (
  `idCentre` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelleCentre` varchar(50) NOT NULL,
  `plageHoraireCentre` varchar(100) NOT NULL,
  PRIMARY KEY (`idCentre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `centre`
--

INSERT INTO `centre` (`idCentre`, `libelleCentre`, `plageHoraireCentre`) VALUES
(1, 'Organisation Centrale / Chamonix /', 'du vendredi après-midi au dimanche après-midi'),
(2, 'Les Houches ', 'vendredi après-midi et soirée'),
(3, 'Saint Gervais ', 'vendredi après-midi et soirée'),
(4, 'Les Contamines ', 'vendredi après-midi et soirée'),
(5, 'Les Chapieux (Bourg Saint-Maurice)', 'du vendredi à 16h au samedi matin'),
(6, 'Courmayeur', 'du vendredi matin au samedi après-midi'),
(7, 'La Fouly', 'du vendredi midi au samedi 30 vers minuit'),
(8, 'Champex', 'du vendredi après-midi jusqu’au dimanche à l’aube'),
(9, 'Trient', 'du vendredi après-midi au dimanche matin'),
(10, 'Vallorcine', 'du vendredi fin d’après-midi au dimanche midi'),
(11, 'Argentière', 'du vendredi soir au dimanche en début d’après-midi'),
(12, 'ooo', 'du vendredi matin au samedi vers minuit'),
(13, '544', 'du vendredi matin au samedi vers minuit'),
(14, 'oopop', 'du vendredi matin au samedi vers minuit');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `idCompetence` char(3) NOT NULL DEFAULT '',
  `libelleCompetence` varchar(100) NOT NULL,
  PRIMARY KEY (`idCompetence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`idCompetence`, `libelleCompetence`) VALUES
('AAE', 'Etre à son aise avec les appareils électroniques'),
('ATE', 'Aimer travailler en équipe'),
('BCP', 'Bonne condition physique '),
('DSE', 'Diplôme de secourisme'),
('ESE', 'Avoir une expérience du secours'),
('ESP', 'Esprit pratique '),
('FSE', 'Si possible être déjà intégré à une formation de secours:pisteur, pompier, gendarme, Croix- rouge…  '),
('PER', 'précision/rigueur'),
('PIN', 'Passion pour l’informatique '),
('SAU', 'Sens de l’autorité'),
('SCO', 'Sens du contact'),
('SOR', 'Sens de l'' organisation');

-- --------------------------------------------------------

--
-- Structure de la table `exige`
--

CREATE TABLE IF NOT EXISTS `exige` (
  `idTypePoste` int(10) unsigned NOT NULL DEFAULT '0',
  `idCentre` int(10) unsigned NOT NULL DEFAULT '0',
  `nbBenevole` int(11) NOT NULL,
  PRIMARY KEY (`idTypePoste`,`idCentre`),
  KEY `idCentre` (`idCentre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `exige`
--

INSERT INTO `exige` (`idTypePoste`, `idCentre`, `nbBenevole`) VALUES
(1, 1, 26),
(1, 2, 2),
(1, 3, 2),
(1, 4, 2),
(1, 5, 4),
(1, 6, 2),
(1, 7, 2),
(1, 8, 5),
(1, 9, 2),
(1, 10, 3),
(1, 11, 3),
(2, 1, 16),
(2, 2, 4),
(2, 3, 4),
(2, 4, 4),
(2, 5, 7),
(2, 6, 0),
(2, 7, 0),
(2, 8, 10),
(2, 9, 4),
(2, 10, 5),
(2, 11, 3),
(3, 1, 32),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(3, 5, 0),
(3, 6, 4),
(3, 7, 4),
(3, 8, 1),
(3, 9, 0),
(3, 10, 0),
(3, 11, 0),
(4, 1, 50),
(4, 2, 4),
(4, 3, 2),
(4, 4, 2),
(4, 5, 4),
(4, 6, 2),
(4, 7, 2),
(4, 8, 5),
(4, 9, 2),
(4, 10, 3),
(4, 11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `necessite`
--

CREATE TABLE IF NOT EXISTS `necessite` (
  `idTypePoste` int(10) unsigned NOT NULL DEFAULT '0',
  `idCompetence` char(3) NOT NULL,
  PRIMARY KEY (`idTypePoste`,`idCompetence`),
  KEY `idCompetence` (`idCompetence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `necessite`
--

INSERT INTO `necessite` (`idTypePoste`, `idCompetence`) VALUES
(3, 'AAE'),
(1, 'ATE'),
(4, 'ATE'),
(1, 'BCP'),
(3, 'BCP'),
(2, 'DSE'),
(2, 'ESE'),
(1, 'ESP'),
(3, 'ESP'),
(4, 'ESP'),
(2, 'FSE'),
(3, 'PER'),
(3, 'PIN'),
(4, 'SCO'),
(1, 'SOR');

-- --------------------------------------------------------

--
-- Structure de la table `souhait`
--

CREATE TABLE IF NOT EXISTS `souhait` (
  `idBenevole` int(11) NOT NULL,
  `idCentre` int(11) NOT NULL,
  `idTypePoste` int(11) NOT NULL,
  PRIMARY KEY (`idBenevole`,`idCentre`,`idTypePoste`),
  KEY `idBenevole` (`idBenevole`),
  KEY `idCentre` (`idCentre`),
  KEY `idTypePoste` (`idTypePoste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typeposte`
--

CREATE TABLE IF NOT EXISTS `typeposte` (
  `idTypePoste` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelleTypePoste` varchar(50) NOT NULL,
  `interetPoste` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idTypePoste`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `typeposte`
--

INSERT INTO `typeposte` (`idTypePoste`, `libelleTypePoste`, `interetPoste`) VALUES
(1, 'Equipe technique', 'Etre plongé au cœur de l’organisation. Vivre l’évènement dans ses différentes facettes'),
(2, 'Secours', 'Un poste en pleine nature pour contribuer à assurer la sécurité de tous'),
(3, 'Contrôle informatique', 'Participer à un challenge technologique qui permet à des milliers d’internautes de suivre la course '),
(4, 'Ravitaillement', 'Un poste en pleine nature pour assurer le premier des services attendus par les coureurs'),
(6, 'Autre', 'Ajout d''un autre');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `benevole`
--
ALTER TABLE `benevole`
  ADD CONSTRAINT `benevole_ibfk_1` FOREIGN KEY (`idTypePoste`) REFERENCES `typeposte` (`idTypePoste`),
  ADD CONSTRAINT `benevole_ibfk_2` FOREIGN KEY (`idCentre`) REFERENCES `centre` (`idCentre`);

--
-- Contraintes pour la table `exige`
--
ALTER TABLE `exige`
  ADD CONSTRAINT `exige_ibfk_1` FOREIGN KEY (`idTypePoste`) REFERENCES `typeposte` (`idTypePoste`),
  ADD CONSTRAINT `exige_ibfk_2` FOREIGN KEY (`idCentre`) REFERENCES `centre` (`idCentre`);

--
-- Contraintes pour la table `necessite`
--
ALTER TABLE `necessite`
  ADD CONSTRAINT `necessite_ibfk_1` FOREIGN KEY (`idTypePoste`) REFERENCES `typeposte` (`idTypePoste`),
  ADD CONSTRAINT `necessite_ibfk_2` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`idCompetence`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
