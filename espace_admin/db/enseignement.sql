-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 23 oct. 2021 à 15:36
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `enseignement`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(50) NOT NULL,
  `postnom_admin` varchar(50) NOT NULL,
  `admin_numero` varchar(20) NOT NULL,
  `img_admin` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `nom_admin`, `postnom_admin`, `admin_numero`, `img_admin`, `admin_email`, `admin_password`) VALUES
(1, 'Ishara', 'Butikima', '09754213258', 'Apple (5).jpg', 'isharapascal@gmail.com', '1221');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id_classe` int(10) NOT NULL,
  `description` varchar(5) NOT NULL,
  `section` varchar(50) NOT NULL,
  `id_titulaire` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id_classe`, `description`, `section`, `id_titulaire`) VALUES
(1, '3', 'Pedagogie Generale', 3),
(2, '3', 'Commerciale de Gestion', 2),
(3, '3', 'Mecanique Generale', 5),
(5, '3', 'Electricite Indistrielle', 6);

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id_compte` int(10) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `utilisateur_type` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `utilisateur_password` varchar(10) NOT NULL,
  `acces` text NOT NULL,
  `statut` text NOT NULL,
  `utilisateur_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id_compte`, `nom_utilisateur`, `utilisateur_type`, `login`, `utilisateur_password`, `acces`, `statut`, `utilisateur_id`) VALUES
(2, 'Baraka Badesirhe', 'eleve', '202120547', '693479622', 'Permis', 'connecter', 6),
(3, 'Bazibuhe  Bahizirhe', 'eleve', '202120087', '144543676', 'Permis', 'deconneter', 8),
(4, 'Furaha Mitamba', 'eleve', '202120343', '314999686', 'Permis', 'deconneter', 5),
(5, 'Jonas Mumbere', 'eleve', '201820456', '1531479345', 'Permis', 'deconneter', 4),
(6, 'Neema Mirimba', 'eleve', '2020347', '54434815', 'Permis', 'deconneter', 1),
(7, 'Shamuhobe Bwingo', 'eleve', '201820036', '195126336', 'Permis', 'deconneter', 2),
(8, 'Tsongo Tahakava', 'eleve', '202121174', '303406847', 'Permis', 'deconneter', 9),
(9, 'Aganze Faustin', 'Professeur', '202120434', '685438573', 'Permis', 'deconneter', 2),
(10, 'Aganze Johnson', 'Professeur', '2020346', '1628578373', 'Permis', 'connecter', 3),
(12, 'Amina Alliance', 'Titulaire', '202120340', '1831859515', 'Permis', 'connecter', 6),
(13, 'Amina Esther', 'Titulaire', '2020888', '520508577', 'Permis', 'deconneter', 5),
(14, 'Balyamwabo Chihinda', 'eleve', '202120038', '495506168', 'Permis', 'deconneter', 7),
(15, 'ISHARA ALLIER', 'Professeur', '2420', '122629375', 'Interdit', 'deconneter', 7),
(16, 'AMANI MUKESSE', 'eleve', '12345', '1348845550', 'Permis', 'connecter', 10);

-- --------------------------------------------------------

--
-- Structure de la table `discussions`
--

CREATE TABLE `discussions` (
  `message_id` int(10) NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `id_exp` int(10) NOT NULL,
  `statut` text NOT NULL,
  `id_cour` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `discussions`
--

INSERT INTO `discussions` (`message_id`, `contenu`, `date`, `id_exp`, `statut`, `id_cour`) VALUES
(2, 'Autres message de teste', '2021-10-23 06:30:30.000000', 1, 'question', 7),
(3, 'Test pour savoir si ca marche', '2021-10-23 06:34:18.000000', 1, 'question', 7),
(4, 'Autre message pour simplement tester', '2021-10-23 06:35:52.000000', 1, 'question', 7),
(5, 'Becoups de textes pour tester', '2021-10-23 06:38:33.000000', 1, 'question', 6),
(6, 'Becoups Becoups Becoups de textes pour tester', '2021-10-23 06:38:53.000000', 1, 'question', 6),
(7, 'je suis la', '2021-10-23 15:19:16.000000', 10, 'question', 4);

-- --------------------------------------------------------

--
-- Structure de la table `ecole_info`
--

CREATE TABLE `ecole_info` (
  `id_info` int(10) NOT NULL,
  `nom_ecole` varchar(50) NOT NULL,
  `adresse_ecole` varchar(100) NOT NULL,
  `numero_telephone` varchar(20) NOT NULL,
  `adresse_email` varchar(50) NOT NULL,
  `devise_ecole` varchar(250) NOT NULL,
  `details_ecole` varchar(250) NOT NULL,
  `photo_ecole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecole_info`
--

INSERT INTO `ecole_info` (`id_info`, `nom_ecole`, `adresse_ecole`, `numero_telephone`, `adresse_email`, `devise_ecole`, `details_ecole`, `photo_ecole`) VALUES
(1, 'Institut Nova Stella', 'Bukavu/Panzi/Av.Mbogo. No356, Sud-kivu/RDC', '0974685245', 'novastella.info@gmail.com', 'TRAVAIL DISCIPLINE ENDURENCE', '                                 Le complexe scolaire Nova Stella est une institution scolaire privée agréée qui a vu le jour depuis 2003 sous l’initiative de deux promoteurs dont LWABOSHI MUNYAMPARA Toussaint et Albert NGWARAMUHERO JOMBA.           ', 'DFGH.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id_eleves` int(10) NOT NULL,
  `nom_eleves` varchar(50) NOT NULL,
  `postnom_eleves` varchar(50) NOT NULL,
  `prenom_eleves` varchar(50) NOT NULL,
  `classe_id` int(10) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `Sexe` text NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `eleve_img` varchar(50) NOT NULL,
  `annee_insc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id_eleves`, `nom_eleves`, `postnom_eleves`, `prenom_eleves`, `classe_id`, `matricule`, `Sexe`, `adresse`, `eleve_img`, `annee_insc`) VALUES
(1, 'Neema', 'Mirimba', 'Francine', 5, '2020347', 'Feminin', 'Mulengeza1', 'Beach (4).jpg', '2021-2022'),
(2, 'Shamuhobe', 'Bwingo', 'Joseph', 3, '201820036', 'Masculin', 'Kazaroho1', 'Beach (6).jpg', '2021-2022'),
(4, 'Jonas', 'Mumbere', 'Pacifique', 3, '201820456', 'Masculin', 'Mulengeza2', 'Other (8).jpg', '2021-2022'),
(5, 'Furaha', 'Mitamba', 'Aimee', 2, '202120343', 'Feminin', 'Mushununu', 'Landscape (12).jpg', '2021-2022'),
(6, 'Baraka', 'Badesirhe', 'Christian', 1, '202120547', 'Masculin', 'Mulengeza1', 'Male Celebrities (4).jpg', '2021-2022'),
(7, 'Balyamwabo', 'Chihinda', 'Emanuel', 1, '202120038', 'Masculin', 'Mushununu1', 'avatar2.jpg', '2021-2022'),
(8, 'Bazibuhe ', 'Bahizirhe', 'Emanuel', 2, '202120087', 'Masculin', 'Mulengeza1', 'CELPQ.jpg', '2021-2022'),
(9, 'Tsongo', 'Tahakava', 'Philippe', 5, '202121174', 'Masculin', 'Mushununu', 'Landscape (13).jpg', '2021-2022'),
(10, 'AMANI', 'MUKESSE', 'GASTON', 5, '12345', 'Masculin', 'PANZI', 'd492c1c1f95c1a6b830c09f8d0310ee2.jpg', '2021-2022');

-- --------------------------------------------------------

--
-- Structure de la table `eleves_notes`
--

CREATE TABLE `eleves_notes` (
  `note_id` int(10) NOT NULL,
  `reponse` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `question_id` int(11) NOT NULL,
  `cours_id` int(10) NOT NULL,
  `eleve_id` int(11) NOT NULL,
  `prof_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves_notes`
--

INSERT INTO `eleves_notes` (`note_id`, `reponse`, `date`, `question_id`, `cours_id`, `eleve_id`, `prof_id`) VALUES
(1, 'assertion1', '2021-10-22', 1, 4, 7, 3),
(2, 'assertion2', '2021-10-22', 2, 4, 7, 3),
(3, 'assertion3', '2021-10-22', 3, 4, 7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(11) NOT NULL,
  `nom_enseignant` varchar(50) NOT NULL,
  `postnom_enseignant` varchar(50) NOT NULL,
  `prenom_enseignant` varchar(50) NOT NULL,
  `matricule` int(50) NOT NULL,
  `etat_civile` varchar(20) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `numero_telephone` varchar(20) NOT NULL,
  `addresse` varchar(10) NOT NULL,
  `date_insc` varchar(10) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom_enseignant`, `postnom_enseignant`, `prenom_enseignant`, `matricule`, `etat_civile`, `sexe`, `numero_telephone`, `addresse`, `date_insc`, `photo`) VALUES
(2, 'Aganze', 'Badesirhe', 'Faustin', 202120434, 'MariÃ©(e)', 'Masculin', '09752412564', 'Kazaroho1', '2021-2022', 'Male Celebrities (1).jpg'),
(3, 'Aganze', 'Mirimba', 'Johnson', 2020346, 'MariÃ©(e)', 'Masculin', '097452980', 'Mulengeza2', '2021-2022', 'Male Celebrities (3).jpg'),
(5, 'Amina', 'Ansima', 'Esther', 2020888, 'Celibataire', 'Feminin', '0974523865', 'Mushununu1', '2021-2022', 'Female Celebrities (2).jpg'),
(6, 'Amina', 'Bahizirhe', 'Alliance', 202120340, 'Celibataire', 'Feminin', '0975823265', 'Mushununu1', '2021-2022', 'Female Celebrities (7).jpg'),
(7, 'ISHARA', 'ILUNDU', 'ALLIER', 2420, 'Celibataire', 'Masculin', '0994479899', 'ESSENCE', '2021-2022', 'fd05ffc653eaf5c11203b8fd3a65775a.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `evaluation_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ponderation` int(10) NOT NULL,
  `duree` int(10) NOT NULL,
  `assertion1` varchar(100) NOT NULL,
  `assertion2` varchar(100) NOT NULL,
  `assertion3` varchar(100) NOT NULL,
  `assertion4` varchar(100) NOT NULL,
  `assertion5` varchar(100) NOT NULL,
  `reponse` varchar(100) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`evaluation_id`, `question`, `ponderation`, `duree`, `assertion1`, `assertion2`, `assertion3`, `assertion4`, `assertion5`, `reponse`, `cours_id`, `date`) VALUES
(1, 'Quelle est...', 1, 60, 'assert1', 'assert2', 'assert3', 'assert4', 'assert5', 'assertion5', 4, '2021-10-22'),
(2, 'Quelle est...', 1, 60, 'assert1', 'assert2', 'assert3', '', '', 'assertion2', 4, '2021-10-22'),
(3, 'Quelle est...', 1, 60, 'assert1', 'assert2', 'assert3', 'assert4', '', 'assertion1', 4, '2021-10-22');

-- --------------------------------------------------------

--
-- Structure de la table `horaire_classe`
--

CREATE TABLE `horaire_classe` (
  `horaire_id` int(10) NOT NULL,
  `jour` varchar(20) NOT NULL,
  `premiere_h` varchar(50) NOT NULL,
  `deuxieme_h` varchar(50) NOT NULL,
  `troisieme_h` varchar(50) NOT NULL,
  `quatrieme_h` varchar(50) NOT NULL,
  `cinquieme_h` varchar(50) NOT NULL,
  `sixieme_h` varchar(50) NOT NULL,
  `septieme_h` varchar(50) NOT NULL,
  `huitieme_h` varchar(50) NOT NULL,
  `classe_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `horaire_classe`
--

INSERT INTO `horaire_classe` (`horaire_id`, `jour`, `premiere_h`, `deuxieme_h`, `troisieme_h`, `quatrieme_h`, `cinquieme_h`, `sixieme_h`, `septieme_h`, `huitieme_h`, `classe_id`) VALUES
(1, 'Lundi', 'Math', 'Math', 'Psychologie', 'Geographie', 'Physique', 'Pedagogie', 'Pedagogie', '', 1),
(2, 'Lundi', 'Francais', 'Francais', 'Tecom', 'Histoire', 'Math', 'Docom', '', '', 2),
(3, 'Mardi', 'Francais', 'Physique', 'Chimie', 'Biologie', 'Anglais', 'Gymna', '', '', 1),
(4, 'Mardi', 'Conptabilite', 'Conptabilite', 'Geographie', 'Anglais', 'Physique', 'Tecom', '', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `horaire_cours`
--

CREATE TABLE `horaire_cours` (
  `horaire_cours_id` int(10) NOT NULL,
  `nom_cours` varchar(50) NOT NULL,
  `jour` varchar(20) NOT NULL,
  `endroit` varchar(20) NOT NULL,
  `heure_debut` varchar(10) NOT NULL,
  `heure_fin` varchar(10) NOT NULL,
  `class_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `horaire_cours`
--

INSERT INTO `horaire_cours` (`horaire_cours_id`, `nom_cours`, `jour`, `endroit`, `heure_debut`, `heure_fin`, `class_id`) VALUES
(1, 'Didactique generale', 'Lundi', 'En ligne', ' 8:00', '10:00', 1),
(2, 'Didactique generale', 'Mardi', 'En classe', '7:30', '12:45', 1),
(3, 'Didactique generale', 'Jeudi', 'En ligne', '16:15', '18:00', 1),
(4, 'Didactique generale', 'Samedi', 'En ligne', '9:00', '10:30', 1),
(5, 'Socaf', 'Lundi', 'En classe', '01:00', '02:00', 1),
(10, 'Chimie', 'Lundi', 'En ligne', '01:00', '02:00', 1),
(11, 'Chimie', 'Mardi', 'En ligne', '14:00', '15:00', 1),
(12, 'Chimie', 'Mercredi', 'En ligne', '16:00', '18:00', 1),
(13, 'Chimie', 'Jeudi', 'En classe', '10:00', '11:00', 1),
(14, 'Chimie', 'Vendredi', 'En classe', '08:00', '14:00', 1),
(15, 'ECM', 'Lundi', 'En ligne', '08:00', '09:30', 1),
(16, 'ECM', 'Mardi', 'En ligne', '15:00', '16:30', 1),
(17, 'Histoire', 'Lundi', 'En ligne', '08:00', '10:00', 1),
(18, 'Histoire', 'Mardi', 'En ligne', '08:30', '10:00', 1),
(19, 'Histoire', 'Mercredi', 'En ligne', '07:00', '09:00', 1),
(20, 'Histoire', 'Jeudi', 'En ligne', '16:00', '18:00', 1),
(21, 'Pedagogie', 'Lundi', 'En ligne', '07:00', '08:00', 1),
(22, 'Pedagogie', 'Mardi', 'En ligne', '08:00', '09:00', 1),
(23, 'Pedagogie', 'Mercredi', 'En classe', '09:00', '10:00', 1),
(24, 'Pedagogie', 'Jeudi', 'En ligne', '10:00', '11:00', 1),
(25, 'Pedagogie', 'Samedi', 'En ligne', '11:00', '00:00', 1),
(26, 'Chimie', 'Mercredi', 'En ligne', '01:00', '01:00', 1),
(27, 'Chimie', 'Mercredi', 'En ligne', '01:00', '01:00', 1),
(28, 'Chimie', 'Mercredi', 'En ligne', '01:00', '01:00', 1),
(29, 'Informatique', 'Jeudi', 'En ligne', '16:00', '17:00', 1),
(30, 'Psychologie', 'Lundi', 'En classe', '09:00', '10:00', 1),
(31, 'Psychologie', 'Mercredi', 'En ligne', '07:00', '08:00', 1),
(32, 'Psychologie', 'Jeudi', 'En ligne', '15:00', '16:00', 1),
(33, 'Psychologie', 'Samedi', 'En ligne', '14:00', '15:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_img` int(10) NOT NULL,
  `img_nom` varchar(50) NOT NULL,
  `img_fichier` varchar(50) NOT NULL,
  `annee_sco` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_img`, `img_nom`, `img_fichier`, `annee_sco`) VALUES
(1, 'Baniere_accueil', 'Baniere_accueil.jpg', '2021-2022'),
(2, 'Baniere_apropos', 'DFF.jpg', '2021-2022'),
(3, 'Baniere_cours', '520159-livres-3d-empilés-sur-l-eachother.jpg', '2021-2022'),
(4, 'Baniere_contact', '8dc7318dc7df8315977dd7d5cfa25e09.jpg', '2021-2022'),
(5, 'Baniere_connexion', 'hacker-wallpaper15.jpg', '2021-2022'),
(7, 'Cours_img', 'cours_img.jpg', '2021-2022');

-- --------------------------------------------------------

--
-- Structure de la table `lecons`
--

CREATE TABLE `lecons` (
  `id_lecons` int(11) NOT NULL,
  `cours` varchar(50) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` varchar(900) NOT NULL,
  `id_class` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lecons`
--

INSERT INTO `lecons` (`id_lecons`, `cours`, `titre`, `contenu`, `id_class`) VALUES
(1, 'Didactique de discipline', 'Chap1.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', 1),
(2, 'Didactique de discipline', 'Chap2.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', 1),
(3, 'Didactique de discipline', 'Chap3.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', 1),
(4, 'Didactique de discipline', 'Chap5.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', 1),
(5, 'Psychologie', 'Chapitre1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.', 1),
(6, 'Psychologie', 'Chapitre2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.', 1),
(7, 'Psychologie', 'Chapitre3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.', 1),
(8, 'Psychologie', 'Chapitre4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.', 1),
(9, 'Psychologie', 'Chapitre5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.', 1),
(10, 'Informatique', 'Lesson1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.', 1),
(11, 'Informatique', 'Lesson2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.', 1),
(12, 'Informatique', 'Lesson', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsam rerum fuga labore veniam fugiat? Laborum nulla minus reprehenderit officia quia autem ad! Incidunt adipisci obcaecati asperiores eum officia quam.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messages_recu`
--

CREATE TABLE `messages_recu` (
  `massage_id` int(10) NOT NULL,
  `nom_exp` varchar(100) NOT NULL,
  `email_exp` varchar(100) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `contenu_msg` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id_section` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `annee` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`id_section`, `description`, `annee`) VALUES
(1, 'Pedagogie Generale', '2021-2022'),
(2, 'Commerciale de Gestion', '2021-2022'),
(3, 'Mecanique Generale', '2021-2022'),
(5, 'Electricite Indistrielle', '2021-2022');

-- --------------------------------------------------------

--
-- Structure de la table `t_cours`
--

CREATE TABLE `t_cours` (
  `id_cours` int(10) NOT NULL,
  `titre_cours` varchar(50) NOT NULL,
  `nombre_heures` int(5) NOT NULL,
  `introduction_gene` varchar(1200) NOT NULL,
  `synthese_gene` varchar(600) NOT NULL,
  `fichier_pdf` varchar(500) NOT NULL,
  `id_classe` int(10) NOT NULL,
  `id_enseignant` int(10) NOT NULL,
  `date` date NOT NULL,
  `cours_disponibilite` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_cours`
--

INSERT INTO `t_cours` (`id_cours`, `titre_cours`, `nombre_heures`, `introduction_gene`, `synthese_gene`, `fichier_pdf`, `id_classe`, `id_enseignant`, `date`, `cours_disponibilite`) VALUES
(1, 'Informatique', 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem error cumque tenetur aperiam iste amet libero iure, harum porro possimus, dolore quos delectus adipisci, maxime culpa suscipit dolor aliquam nam.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Autem error cumque tenetur aperiam iste amet libero iure, harum porro possimus, dolore quos delectus adipisci, maxime culpa suscipit dolor aliquam nam.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Autem error cumque tenetur aperiam iste amet libero iure, harum porro possimus, dolore quos delectus adipisci, maxime culpa suscipit dolor aliquam nam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem error cumque tenetur aperiam iste amet libero iure, harum porro possimus, dolore quos delectus adipisci, maxime culpa suscipit dolor aliquam nam.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Autem error cumque tenetur aperiam iste amet libero iure, harum porro possimus, dolore quos delectus adipisci, maxime culpa suscipit dolor aliquam nam.', '1_Informatique.xlsx', 1, 6, '2021-10-22', 1),
(2, 'Informatique', 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!', '2_Informatique.xlsx', 2, 6, '2021-10-22', 1),
(3, 'Comptabilite', 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis similique delectus voluptatibus expedita rerum iste nihil hic vero. Cumque totam recusandae laboriosam pariatur laudantium amet, aut ipsum assumenda minus!', '2_Comptabilite.docx', 2, 6, '2021-10-22', 1),
(4, 'Pedagogie ', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', '1_Pedagogie .xlsx', 1, 3, '2021-10-22', 1),
(5, 'Psychologie', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', '1_Psychologie.docx', 1, 3, '2021-10-22', 1),
(6, 'Didactique generale', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', '1_Didactique generale.xlsx', 1, 3, '2021-10-22', 1),
(7, 'Didactique de discipline', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', '1_Didactique de discipline.docx', 1, 3, '2021-10-22', 1),
(8, 'Informatique', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dicta deserunt, minima unde est quidem repudiandae, explicabo mollitia similique officia reiciendis molestias cum a labore placeat cupiditate impedit maiores consectetur!', '5_Informatique.xlsx', 5, 3, '2021-10-22', 1),
(9, 'BASE DE DONNEE', 10, 'L’application des nouvelles technologies de l’information et de la communication (NTIC) au domaine de la formation a conduit à la création massive d’une nouvelle réalité technique de l’enseignement tant en mode présentiel qu’à distance. Cette technologie dans la formation à distance a fait apparaitre un nouveau mode d’apprentissage appelé le e-learning. L’e-learning est un terme anglais qui veut dire « apprentissage par des moyens électroniques ».', 'Il s’agit d’une évolution rapide des technologies pour l’apprentissage, rendue possible par le développement planétaire de l’Internet. Ce mode d’apprentissage est basé sur l’accès à des formations en ligne, Internet ou Intranet ou d’un autre média électronique. Cet accès permet de développer les compétences des apprenants, tout en rendant le processus d’apprentissage indépendant du temps et du lieu.', '1_BASE DE DONNEE.pdf', 1, 7, '2021-10-23', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id_compte`);

--
-- Index pour la table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `ecole_info`
--
ALTER TABLE `ecole_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id_eleves`);

--
-- Index pour la table `eleves_notes`
--
ALTER TABLE `eleves_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`evaluation_id`);

--
-- Index pour la table `horaire_classe`
--
ALTER TABLE `horaire_classe`
  ADD PRIMARY KEY (`horaire_id`);

--
-- Index pour la table `horaire_cours`
--
ALTER TABLE `horaire_cours`
  ADD PRIMARY KEY (`horaire_cours_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `lecons`
--
ALTER TABLE `lecons`
  ADD PRIMARY KEY (`id_lecons`);

--
-- Index pour la table `messages_recu`
--
ALTER TABLE `messages_recu`
  ADD PRIMARY KEY (`massage_id`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- Index pour la table `t_cours`
--
ALTER TABLE `t_cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id_compte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ecole_info`
--
ALTER TABLE `ecole_info`
  MODIFY `id_info` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id_eleves` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `eleves_notes`
--
ALTER TABLE `eleves_notes`
  MODIFY `note_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `horaire_classe`
--
ALTER TABLE `horaire_classe`
  MODIFY `horaire_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `horaire_cours`
--
ALTER TABLE `horaire_cours`
  MODIFY `horaire_cours_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_img` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `lecons`
--
ALTER TABLE `lecons`
  MODIFY `id_lecons` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `messages_recu`
--
ALTER TABLE `messages_recu`
  MODIFY `massage_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_cours`
--
ALTER TABLE `t_cours`
  MODIFY `id_cours` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
