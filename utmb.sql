-- PPE 2013-14 - 2SLAM
-- Lycée Gaston Berger
-- version 1.0.0
-- Script de création de la base de  données utmb
-- Création d'un jeu d'essai



-- supprime la base si elle existe déjà
drop database if exists utmb;
--
-- Base de données: `utmb`
--
CREATE DATABASE utmb DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `utmb`;


-- --------------------------------------------------------

--
-- Structure de la table `COMPETENCE`
--

CREATE TABLE IF NOT EXISTS `COMPETENCE` (
  `idCompetence` CHAR(3),
  `libelleCompetence` VARCHAR(100) NOT NULL,
  PRIMARY KEY(`idCompetence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- ------

--
-- Contenu de la table `COMPETENCE`
--

INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('SOR', 'Sens de l'' organisation');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('ESP', 'Esprit pratique ');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('BCP', 'Bonne condition physique ');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('ATE', 'Aimer travailler en équipe');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('DSE', 'Diplôme de secourisme');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('ESE', 'Avoir une expérience du secours');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('FSE', 'Si possible être déjà intégré à une formation de secours:pisteur, pompier, gendarme, Croix- rouge…  ');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('PIN', 'Passion pour l’informatique ');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('AAE', 'Etre à son aise avec des appareils électroniques');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('SAU', 'Sens de l’autorité');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('PER', 'précision/rigueur');
INSERT INTO `COMPETENCE` (`idCompetence`, `libelleCompetence`) VALUES
('SCO', 'Sens du contact');

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Structure de la table `TYPEPOSTE`
--

CREATE TABLE IF NOT EXISTS `TYPEPOSTE` (
  `idTypePoste` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelleTypePoste` VARCHAR(50) NOT NULL,
  `interetPoste` VARCHAR(100),
  PRIMARY KEY(`idTypePoste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Contenu de la table `TYPEPOSTE`
--

INSERT INTO `TYPEPOSTE` (`libelleTypePoste`, `interetPoste`) VALUES
('Equipe technique', 'Etre plongé au cœur de l’organisation. Vivre l’évènement dans ses différentes facettes');

INSERT INTO `TYPEPOSTE` (`libelleTypePoste`, `interetPoste`) VALUES
('Secours', 'Un poste en pleine nature pour contribuer à assurer la sécurité de tous');

INSERT INTO `TYPEPOSTE` (`libelleTypePoste`, `interetPoste`) VALUES
('Contrôle informatique', 'Participer à un challenge technologique qui permet à des milliers d’internautes de suivre la course en direct');

INSERT INTO `TYPEPOSTE` (`libelleTypePoste`, `interetPoste`) VALUES
('Ravitaillement', 'Un poste en pleine nature pour assurer le premier des services attendus par les coureurs');



--
-- Structure de la table `NECESSITE`
--

CREATE TABLE IF NOT EXISTS `NECESSITE` (
  `idTypePoste` INTEGER UNSIGNED,
  `idCompetence` CHAR(3) NOT NULL,
  FOREIGN KEY(idTypePoste) REFERENCES TYPEPOSTE(idTypePoste),
  FOREIGN KEY(idCompetence) REFERENCES COMPETENCE(idCompetence),
  PRIMARY KEY(`idTypePoste`,`idCompetence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Contenu de la table `NECESSITE`
--

INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(1, 'SOR');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(1, 'ESP');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(1, 'BCP');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(1, 'ATE');

INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(2, 'DSE');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(2, 'ESE');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(2, 'FSE');

INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(3, 'PIN');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(3, 'AAE');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(3, 'ESP');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(3, 'BCP');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(3, 'PER');

INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(4, 'SCO');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(4, 'ESP');
INSERT INTO `NECESSITE` (`idTypePoste`, `idCompetence`) VALUES
(4, 'ATE');


--
-- Structure de la table `CENTRE`
--

CREATE TABLE IF NOT EXISTS `CENTRE` (
  `idCentre` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelleCentre` VARCHAR(50) NOT NULL,
  `plageHoraireCentre` VARCHAR(100) NOT NULL,
  PRIMARY KEY(`idCentre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Contenu de la table `CENTRE`
--

INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Organisation Centrale / Chamonix /', 'du vendredi après-midi au dimanche après-midi');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Les Houches ', 'vendredi après-midi et soirée');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Saint Gervais ', 'vendredi après-midi et soirée');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Les Contamines ', 'vendredi après-midi et soirée');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Les Chapieux (Bourg Saint-Maurice)', 'du vendredi à 16h au samedi matin');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Courmayeur', 'du vendredi matin au samedi après-midi');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('La Fouly', 'du vendredi midi au samedi 30 vers minuit');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Champex', 'du vendredi après-midi jusqu’au dimanche à l’aube');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Trient', 'du vendredi après-midi au dimanche matin');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Vallorcine', 'du vendredi fin d’après-midi au dimanche midi');
INSERT INTO `CENTRE` (`libelleCentre`, `plageHoraireCentre`) VALUES
('Argentière', 'du vendredi soir au dimanche en début d’après-midi');


--
-- Structure de la table `CENTRE`
--

CREATE TABLE IF NOT EXISTS `CENTRE` (
  `idCentre` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelleCentre` VARCHAR(50) NOT NULL,
  `plageHoraireCentre` VARCHAR(100) NOT NULL,
  PRIMARY KEY(`idCentre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Structure de la table `EXIGE`
--

CREATE TABLE IF NOT EXISTS `EXIGE` (
  `idTypePoste` INTEGER UNSIGNED,
  `idCentre` INTEGER UNSIGNED,
  nbBenevole INTEGER NOT NULL, 
  FOREIGN KEY(idTypePoste) REFERENCES TYPEPOSTE(idTypePoste),
  FOREIGN KEY(idCentre) REFERENCES CENTRE(idCentre),
  PRIMARY KEY(`idTypePoste`,`idCentre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Contenu de la table `EXIGE`
--

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,1, 26);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,1, 16);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,1, 32);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,1, 50);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,2, 2);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,2, 4);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,2, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,2, 4);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,3, 2);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,3, 4);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,3, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,3, 2);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,4, 2);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,4, 4);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,4, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,4, 2);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,5, 4);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,5, 7);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,5, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,5, 4);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,6, 2);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,6, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,6, 4);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,6, 2);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,7, 2);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,7, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,7, 4);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,7, 2);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,8, 5);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,8, 10);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,8, 1);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,8, 5);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,9, 2);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,9, 4);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,9, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,9, 2);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,10, 3);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,10, 5);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,10, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,10, 3);

INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(1,11, 3);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(2,11, 3);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(3,11, 0);
INSERT INTO `EXIGE` (`idTypePoste`, `idCentre`,`nbBenevole`) VALUES
(4,11, 3);


--
-- Structure de la table `BENEVOLE`
--

CREATE TABLE IF NOT EXISTS `BENEVOLE` (
  `idBenevole` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prenom` VARCHAR(50) NOT NULL,
  `adresse` VARCHAR(100),
  `codePostal` CHAR(5),
  `ville` VARCHAR(50),
  `pays` VARCHAR(50) NOT NULL,
  `telephone` CHAR(10) NOT NULL,
  `courriel` VARCHAR(100) NOT NULL,
  `sexe` CHAR(1) NOT NULL, 
  `dateNaissance` DATE NOT NULL,
  `taille` VARCHAR(3), 
  `permisConduire` INTEGER, 
  `diplomeSecouriste` INTEGER, 
  `niveauRando` INTEGER, 
  `niveauInfo` INTEGER,
  `idTypePoste` INTEGER UNSIGNED,
  `idCentre` INTEGER UNSIGNED,
  FOREIGN KEY(idTypePoste) REFERENCES TYPEPOSTE(idTypePoste),
  FOREIGN KEY(idCentre) REFERENCES CENTRE(idCentre),
  PRIMARY KEY(`idBenevole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Contenu de la table `BENEVOLE`
--

INSERT INTO `BENEVOLE` (`nom`,`prenom`,`adresse`,`codePostal`,`ville`,`pays`,`telephone`,`courriel`,`sexe`,`dateNaissance`,`taille`,`permisConduire`,`diplomeSecouriste`,`niveauRando`,`niveauInfo`,`idTypePoste`,`idCentre`) VALUES
('Berger','Gaston','Avenue Gaston Berger', '59000','LILLE','FRANCE','0320493159','gaston@gastonberger.fr','M','1896-10-01','M',1,0,1,2,3,1 );
INSERT INTO `BENEVOLE` (`nom`,`prenom`,`telephone`,`courriel`,`sexe`,`dateNaissance`,`taille`,`permisConduire`,`diplomeSecouriste`) VALUES
('toto','titi','0312345678','toto@gmail.fr','M','1994-10-01','M',0,0);
