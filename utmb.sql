-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 25 Novembre 2014 à 02:00
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `utmb`
--

-- --------------------------------------------------------

--
-- Structure de la table `BENEVOLE`
--

CREATE TABLE `BENEVOLE` (
`idBenevole` int(10) unsigned NOT NULL,
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
  `idCentre` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `BENEVOLE`
--

INSERT INTO `BENEVOLE` (`idBenevole`, `login`, `mdp`, `nom`, `prenom`, `adresse`, `codePostal`, `ville`, `pays`, `telephone`, `courriel`, `sexe`, `dateNaissance`, `taille`, `permisConduire`, `diplomeSecouriste`, `niveauRando`, `niveauInfo`, `idTypePoste`, `idCentre`) VALUES
(1, 'gberger', '873e44861121144eed2c63beb170b14f0a02f5e6', 'Berger', 'Gaston', 'Avenue Gaston Berger', '59000', 'LILLE', 'FRANCE', '0320493159', 'gaston@gastonberger.fr', 'M', '1896-10-01', 'M', 1, 0, 1, 2, 3, 1),
(2, '', '', 'toto', 'titi', NULL, NULL, NULL, '', '0312345678', 'toto@gmail.fr', 'M', '1994-10-01', 'M', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `CENTRE`
--

CREATE TABLE `CENTRE` (
`idCentre` int(10) unsigned NOT NULL,
  `libelleCentre` varchar(50) NOT NULL,
  `plageHoraireCentre` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `CENTRE`
--

INSERT INTO `CENTRE` (`idCentre`, `libelleCentre`, `plageHoraireCentre`) VALUES
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
-- Structure de la table `COMPETENCE`
--

CREATE TABLE `COMPETENCE` (
  `idCompetence` char(3) NOT NULL DEFAULT '',
  `libelleCompetence` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `COMPETENCE`
--

INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('AAE', 'Etre à son aise avec les appareils électroniques'),
('ATE', 'Aimer travailler en équipe'),
('BCP', 'Bonne condition physique '),
('DSE', 'Diplôme de secourisme'),
('EAA', 'Etre un audio animatronic'),
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
-- Structure de la table `EXIGE`
--

CREATE TABLE `EXIGE` (
  `idTypePoste` int(10) unsigned NOT NULL DEFAULT '0',
  `idCentre` int(10) unsigned NOT NULL DEFAULT '0',
  `nbBenevole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `EXIGE`
--

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`, `nbBenevole`) VALUES
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
-- Structure de la table `NECESSITE`
--

CREATE TABLE `NECESSITE` (
  `idTypePoste` int(10) unsigned NOT NULL DEFAULT '0',
  `idCompetence` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `NECESSITE`
--

INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
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
-- Structure de la table `SOUHAIT`
--

CREATE TABLE `SOUHAIT` (
  `idBenevole` int(11) NOT NULL,
  `idCentre` int(11) NOT NULL,
  `idTypePoste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TYPEPOSTE`
--

CREATE TABLE `TYPEPOSTE` (
`idTypePoste` int(10) unsigned NOT NULL,
  `libelleTypePoste` varchar(50) NOT NULL,
  `interetPoste` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `TYPEPOSTE`
--

INSERT INTO `TYPEPOSTE` (`idTypePoste`, `libelleTypePoste`, `interetPoste`) VALUES
(1, 'Equipe technique', 'Etre plongé au cœur de l’organisation. Vivre l’évènement dans ses différentes facettes'),
(2, 'Secours', 'Un poste en pleine nature pour contribuer à assurer la sécurité de tous'),
(3, 'Contrôle informatique', 'Participer à un challenge technologique qui permet à des milliers d’internautes de suivre la course '),
(4, 'Ravitaillement', 'Un poste en pleine nature pour assurer le premier des services attendus par les coureurs'),
(5, 'OpÃ©rateur attraction', 'Fait fonctionner les attractions. Se charge de la vÃ©rification de la de sÃ©curitÃ©, contrÃ´le la ca'),
(6, 'Autre', 'Ajout d''un autre');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `BENEVOLE`
--
ALTER TABLE `BENEVOLE`
 ADD PRIMARY KEY (`idBenevole`), ADD KEY `idTypePoste` (`idTypePoste`), ADD KEY `idCentre` (`idCentre`);

--
-- Index pour la table `CENTRE`
--
ALTER TABLE `CENTRE`
 ADD PRIMARY KEY (`idCentre`);

--
-- Index pour la table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
 ADD PRIMARY KEY (`idCompetence`);

--
-- Index pour la table `EXIGE`
--
ALTER TABLE `EXIGE`
 ADD PRIMARY KEY (`idTypePoste`,`idCentre`), ADD KEY `idCentre` (`idCentre`);

--
-- Index pour la table `NECESSITE`
--
ALTER TABLE `NECESSITE`
 ADD PRIMARY KEY (`idTypePoste`,`idCompetence`), ADD KEY `idCompetence` (`idCompetence`);

--
-- Index pour la table `SOUHAIT`
--
ALTER TABLE `SOUHAIT`
 ADD PRIMARY KEY (`idBenevole`,`idCentre`,`idTypePoste`), ADD KEY `idBenevole` (`idBenevole`), ADD KEY `idCentre` (`idCentre`), ADD KEY `idTypePoste` (`idTypePoste`);

--
-- Index pour la table `TYPEPOSTE`
--
ALTER TABLE `TYPEPOSTE`
 ADD PRIMARY KEY (`idTypePoste`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `BENEVOLE`
--
ALTER TABLE `BENEVOLE`
MODIFY `idBenevole` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `CENTRE`
--
ALTER TABLE `CENTRE`
MODIFY `idCentre` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `TYPEPOSTE`
--
ALTER TABLE `TYPEPOSTE`
MODIFY `idTypePoste` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `BENEVOLE`
--
ALTER TABLE `BENEVOLE`
ADD CONSTRAINT `benevole_ibfk_1` FOREIGN KEY (`idTypePoste`) REFERENCES `TYPEPOSTE` (`idTypePoste`),
ADD CONSTRAINT `benevole_ibfk_2` FOREIGN KEY (`idCentre`) REFERENCES `CENTRE` (`idCentre`);

--
-- Contraintes pour la table `EXIGE`
--
ALTER TABLE `EXIGE`
ADD CONSTRAINT `exige_ibfk_1` FOREIGN KEY (`idTypePoste`) REFERENCES `TYPEPOSTE` (`idTypePoste`),
ADD CONSTRAINT `exige_ibfk_2` FOREIGN KEY (`idCentre`) REFERENCES `CENTRE` (`idCentre`);

--
-- Contraintes pour la table `NECESSITE`
--
ALTER TABLE `NECESSITE`
ADD CONSTRAINT `necessite_ibfk_1` FOREIGN KEY (`idTypePoste`) REFERENCES `TYPEPOSTE` (`idTypePoste`),
ADD CONSTRAINT `necessite_ibfk_2` FOREIGN KEY (`idCompetence`) REFERENCES `COMPETENCE` (`idCompetence`);
