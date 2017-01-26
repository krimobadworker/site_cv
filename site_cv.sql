-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 24 Janvier 2017 à 16:41
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE `t_competences` (
  `id_competence` int(11) NOT NULL,
  `competence` varchar(50) DEFAULT NULL,
  `niveau` int(3) NOT NULL,
  `type` enum('langage','logiciel','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`, `niveau`, `type`) VALUES
(1, 'Photoshop', 70, 'logiciel'),
(2, 'Illustrator', 80, 'logiciel'),
(4, 'InDesign', 50, 'logiciel'),
(6, 'After Effects ', 50, 'logiciel'),
(7, 'Premiere Pro', 80, 'logiciel'),
(8, 'Dreamweaver', 50, 'logiciel'),
(9, 'HTML5', 70, 'langage'),
(10, 'CSS3', 70, 'langage'),
(11, 'PHP', 40, 'langage'),
(12, 'JavaScript', 20, 'langage'),
(13, 'MySQL', 50, 'langage');

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

CREATE TABLE `t_experiences` (
  `id_experience` int(11) NOT NULL,
  `experience` text NOT NULL,
  `titre_e` text,
  `dates` text,
  `description` text NOT NULL,
  `competence_id` int(11) NOT NULL,
  `utlisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id_experience`, `experience`, `titre_e`, `dates`, `description`, `competence_id`, `utlisateur_id`) VALUES
(7, 'BdM Calvin Klein', 'Vendeur Conseillé ', '05/2010 05/2011', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?', 0, 0),
(16, 'McDonald''s Paris Luxembourg', 'Équipier puis Formateur Chargé de Dépôts\r\n', '06/2011 09/2013', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?', 0, 1),
(18, 'Café Concerto Londres Shepherd''s Bush', 'Serveur Barista', '09/2013 05/2014', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formation`
--

CREATE TABLE `t_formation` (
  `id_formation` int(11) NOT NULL,
  `titre_f` varchar(45) NOT NULL,
  `sous_titre_f` varchar(45) NOT NULL,
  `dates_f` varchar(45) NOT NULL,
  `description_f` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_formation`
--

INSERT INTO `t_formation` (`id_formation`, `titre_f`, `sous_titre_f`, `dates_f`, `description_f`, `utilisateur_id`) VALUES
(7, 'Baccalauréat', 'Scientifique', '06/2009', 'Tu vois, ce n''est pas un simple sport car il y a de bonnes règles, de bonnes rules et finalement tout refaire depuis le début. Ça respire le meuble de Provence, hein ? ', 0),
(8, 'Cerfification Professionelle', 'Intégrateur / Developpeur Web', '05/2017', 'Tu vois, ce n''est pas un simple sport car il y a de bonnes règles, de bonnes rules et finalement tout refaire depuis le début. Ça respire le meuble de Provence, hein ? ', 0),
(9, 'Licence', 'Physique Mécanique', '06/2010', 'Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formulaire`
--

CREATE TABLE `t_formulaire` (
  `id_formulaire` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_langue`
--

CREATE TABLE `t_langue` (
  `id_langue` int(11) NOT NULL,
  `langue` varchar(20) NOT NULL,
  `niveau` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_langue`
--

INSERT INTO `t_langue` (`id_langue`, `langue`, `niveau`) VALUES
(22, 'Anglais', 70),
(25, 'Arabe', 80),
(26, 'Bosniaque', 40);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisir`
--

CREATE TABLE `t_loisir` (
  `id_loisir` int(11) NOT NULL,
  `loisir` text NOT NULL,
  `fa_icon` varchar(255) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_loisir`
--

INSERT INTO `t_loisir` (`id_loisir`, `loisir`, `fa_icon`, `utilisateur_id`) VALUES
(3, 'Photographie', 'fa fa-camera-retro', 1),
(4, 'Cinéma', 'fa fa-play', 1),
(6, 'Dessin', 'fa fa-paint-brush', 1),
(7, 'Infographie', 'fa fa-laptop', 1),
(9, 'Mode', 'fa fa-shopping-bag', 1),
(10, 'Sport', 'fa fa-futbol-o', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_portfolio`
--

CREATE TABLE `t_portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `nom_img` varchar(50) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titre`
--

CREATE TABLE `t_titre` (
  `id_titre` smallint(6) NOT NULL,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titres`
--

CREATE TABLE `t_titres` (
  `id_titres` int(11) NOT NULL,
  `titre_01` varchar(45) NOT NULL,
  `titre_02` varchar(45) NOT NULL,
  `titre_03` varchar(45) NOT NULL,
  `titre_04` varchar(45) NOT NULL,
  `titre_05` varchar(45) NOT NULL,
  `titre_06` varchar(45) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `id_utilisateur` smallint(5) NOT NULL,
  `membre` varchar(11) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL COMMENT 'varchar car 0 n''est pas un entier',
  `mdp` varchar(13) NOT NULL,
  `pseudo` varchar(13) NOT NULL,
  `avatar` varchar(13) NOT NULL,
  `age` smallint(5) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` enum('Femme','Homme') NOT NULL,
  `etat_civil` enum('M.','Mme') NOT NULL,
  `statut_marital` varchar(13) NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(25) NOT NULL,
  `note` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`id_utilisateur`, `membre`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_de_naissance`, `sexe`, `etat_civil`, `statut_marital`, `adresse`, `code_postal`, `ville`, `pays`, `note`) VALUES
(1, 'krimo', 'Abdelkrim', 'Benbakhti', 'abdelkrimbenbakhti@gmail.com', '0663853518', 'krimo92390', 'krimo92390', '', 27, '1990-01-17', 'Homme', 'M.', 'Célibataire', '254 boulevard Charles de Gaulle', '92390', 'Villeneuve La Garenne', 'France', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_competences`
--
ALTER TABLE `t_competences`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `id_competence` (`competence_id`);

--
-- Index pour la table `t_formation`
--
ALTER TABLE `t_formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `t_formulaire`
--
ALTER TABLE `t_formulaire`
  ADD PRIMARY KEY (`id_formulaire`);

--
-- Index pour la table `t_langue`
--
ALTER TABLE `t_langue`
  ADD PRIMARY KEY (`id_langue`);

--
-- Index pour la table `t_loisir`
--
ALTER TABLE `t_loisir`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Index pour la table `t_titre`
--
ALTER TABLE `t_titre`
  ADD PRIMARY KEY (`id_titre`);

--
-- Index pour la table `t_titres`
--
ALTER TABLE `t_titres`
  ADD PRIMARY KEY (`id_titres`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_competences`
--
ALTER TABLE `t_competences`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `t_formation`
--
ALTER TABLE `t_formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `t_formulaire`
--
ALTER TABLE `t_formulaire`
  MODIFY `id_formulaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_langue`
--
ALTER TABLE `t_langue`
  MODIFY `id_langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `t_loisir`
--
ALTER TABLE `t_loisir`
  MODIFY `id_loisir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_titres`
--
ALTER TABLE `t_titres`
  MODIFY `id_titres` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `id_utilisateur` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
