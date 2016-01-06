-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Janvier 2016 à 16:34
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dogscrew`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `IDARTICLE` int(3) NOT NULL,
  `IDUSER` int(3) NOT NULL,
  `idLangue` int(3) DEFAULT NULL,
  `DATE` date NOT NULL,
  `Titre` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TEXTE` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`IDARTICLE`, `IDUSER`, `idLangue`, `DATE`, `Titre`, `TEXTE`) VALUES
(2, 1, 1, '2015-04-28', 'L''essai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(3, 1, 1, '2015-04-28', 'Latin', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun'),
(4, 1, 1, '2015-10-29', 'nouvel article', '<p>Ceci est un nouvel article.</p>\r\n'),
(5, 1, 1, '2015-10-30', 'azertyi', '<p>areytfuligho</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

CREATE TABLE IF NOT EXISTS `compagnie` (
  `idCompgnie` int(3) NOT NULL,
  `titre` text NOT NULL,
  `texte` text NOT NULL,
  `image` text NOT NULL,
  `idlangue` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int(11) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `pays` varchar(60) DEFAULT NULL,
  `region` varchar(60) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `IDDROIT` int(3) NOT NULL,
  `LIBELLE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `droituser`
--

CREATE TABLE IF NOT EXISTS `droituser` (
  `IDTYPE` int(11) NOT NULL,
  `IDDROIT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `IDIMAGE` int(3) NOT NULL,
  `idUser` int(3) DEFAULT NULL,
  `TITRE` text CHARACTER SET utf8 NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 NOT NULL,
  `URL` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`IDIMAGE`, `idUser`, `TITRE`, `DESCRIPTION`, `URL`) VALUES
(2, 1, 'coincé', 'le mur est proche', 'galerie/coince.jpg'),
(4, 1, 'Le grelin', 'Le grelin est un espèce qui a pour but de troller le plus de gens possible. Il appartient au genre grelinaius.', 'galerie/grelin.jpg'),
(5, 1, 'Le décès', 'la mort de martin', 'galerie/martin-mort.jpg'),
(6, 1, 'Niiekaos', 'Nieekaos', 'galerie/niiekaos.jpg'),
(7, 1, 'touché', '<p>touch&eacute; pouet</p>\r\n', 'galerie/touche.jpg'),
(8, 1, 'image', '<p>boobs</p>\r\n', 'galerie/12daf7aab6a1bd162b37e9f5deb067b8.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(3) NOT NULL,
  `langue` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `langue`
--

INSERT INTO `langue` (`id`, `langue`) VALUES
(1, 'Français'),
(2, 'English'),
(3, 'Deutsch');

-- --------------------------------------------------------

--
-- Structure de la table `languenavbar`
--

CREATE TABLE IF NOT EXISTS `languenavbar` (
  `idLangueNavBar` int(3) NOT NULL,
  `idLangue` int(3) NOT NULL,
  `texte` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `languenavbar`
--

INSERT INTO `languenavbar` (`idLangueNavBar`, `idLangue`, `texte`) VALUES
(1, 1, 'Plus-Accueil-Compagnie-Article-Galerie-Contact'),
(2, 2, 'More-Home-Group-Article-Gallery-Contact'),
(3, 3, 'Merh-Startseite-Kompanie-Artikel-Galerie-Kontakt');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `idPage` int(3) NOT NULL,
  `IDUSER` int(11) NOT NULL,
  `idLangue` int(3) DEFAULT NULL,
  `titre` varchar(60) NOT NULL,
  `texte` text CHARACTER SET ucs2 NOT NULL,
  `image` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`idPage`, `IDUSER`, `idLangue`, `titre`, `texte`, `image`, `date`) VALUES
(2, 1, 1, 'histoire', 'En survivant aux exemples de ceux-ci l''Âge de fer germanique (la période de Vendel) les épées avaient des lames mesurant entre 28" et 32" (710 et 810 mm) de longueur et 1.7" à 2.4" (45 à 60 mm) de large. Ces le 45 tours a donné des armes de guerre a batifolé une saveur piquante seulement environ 4" à 5" (100 à 130 mm) longtemps et avait très peu de mèche dans leurs lames finissant dans le bout d''habitude contourné.', NULL, '2015-05-21'),
(3, 1, 1, 'Compagnie', '<p>Ceci est la page de la compagnie en fran&ccedil;ais.</p>\r\n', 'imagesPage/bc7ff8bc00199ebb7ed1b81b6983254b.jpg', '2015-10-07'),
(4, 1, 3, 'Kompanie', '<p>Ceci est la page de la compagnie en allemand</p>\r\n', 'imagesPage/IMAG0173.jpg', '2015-10-07'),
(5, 1, 2, 'essai', '<p><strong>Ceci </strong>est <span style="color:#FF0000">l&#39;essa</span>i<u> d&#39;une page</u>.</p>\r\n', 'imagesPage/earth53.png', '2015-10-29'),
(6, 1, 2, 'Company', '<p>It&#39;s a description of the dogs&#39; crew company, in english.</p>\r\n', 'imagesPage/b36751c4ba.jpg', '2015-10-30'),
(7, 1, 1, 'page avec image', '<p>Ceci est une &eacute;croce d&#39;arbre.</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun</p>\r\n', 'imagesPage/ecorse.jpg', '2015-10-30');

-- --------------------------------------------------------

--
-- Structure de la table `textsite`
--

CREATE TABLE IF NOT EXISTS `textsite` (
  `idText` int(3) NOT NULL,
  `IDUSER` int(3) DEFAULT NULL,
  `idLangue` int(3) DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `libelle` varchar(60) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `textsite`
--

INSERT INTO `textsite` (`idText`, `IDUSER`, `idLangue`, `type`, `libelle`, `text`) VALUES
(1, 1, 1, 'presentation', 'Pr&eacutesentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun.'),
(2, 1, 1, 'footer', 'footerFR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n	    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun'),
(3, 1, 2, 'presentation', 'Presentation', 'ceci est une presentation en anglais'),
(4, 1, 3, 'presentation', 'Darstellung', 'ceci est une présentation en allemand'),
(5, 1, 1, 'contact', 'Nous contacter', 'Si vous voulez nous contacter, envoyé nous un message !'),
(6, 1, 2, 'contact', 'Contact us', ''),
(7, 1, 3, 'contact', 'Kommunizieren Sie mit uns', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `IDUSER` int(3) NOT NULL,
  `IDTYPE` int(11) NOT NULL,
  `NOM` text NOT NULL,
  `PRENOM` text NOT NULL,
  `MAIL` text NOT NULL,
  `MDP` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`IDUSER`, `IDTYPE`, `NOM`, `PRENOM`, `MAIL`, `MDP`) VALUES
(1, 1, 'Brossault', 'Nicolas', 'ni.brossault@laposte.net', 'c940a916c1caf7c665720f73ff8a57d8965c2c03');

-- --------------------------------------------------------

--
-- Structure de la table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `IDTYPE` int(11) NOT NULL,
  `LIBELLE` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usertype`
--

INSERT INTO `usertype` (`IDTYPE`, `LIBELLE`) VALUES
(1, 'admin'),
(2, 'redacteur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`IDARTICLE`),
  ADD KEY `FK_LARTICLE` (`IDUSER`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Index pour la table `compagnie`
--
ALTER TABLE `compagnie`
  ADD PRIMARY KEY (`idCompgnie`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idCompte`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`IDDROIT`);

--
-- Index pour la table `droituser`
--
ALTER TABLE `droituser`
  ADD PRIMARY KEY (`IDTYPE`,`IDDROIT`),
  ADD KEY `FK_DROITUSER2` (`IDDROIT`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`IDIMAGE`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `languenavbar`
--
ALTER TABLE `languenavbar`
  ADD PRIMARY KEY (`idLangueNavBar`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`idPage`),
  ADD KEY `IDUSER` (`IDUSER`),
  ADD KEY `IdLangue` (`idLangue`);

--
-- Index pour la table `textsite`
--
ALTER TABLE `textsite`
  ADD PRIMARY KEY (`idText`),
  ADD KEY `IDUSER` (`IDUSER`,`idLangue`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUSER`),
  ADD KEY `FK_LETYPEUSER` (`IDTYPE`);

--
-- Index pour la table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`IDTYPE`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `IDARTICLE` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `compagnie`
--
ALTER TABLE `compagnie`
  MODIFY `idCompgnie` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `idCompte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `IDDROIT` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `IDIMAGE` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `languenavbar`
--
ALTER TABLE `languenavbar`
  MODIFY `idLangueNavBar` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `idPage` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `textsite`
--
ALTER TABLE `textsite`
  MODIFY `idText` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `IDUSER` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `IDTYPE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `droituser`
--
ALTER TABLE `droituser`
  ADD CONSTRAINT `droituser_ibfk_1` FOREIGN KEY (`IDTYPE`) REFERENCES `usertype` (`IDTYPE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `droituser_ibfk_2` FOREIGN KEY (`IDDROIT`) REFERENCES `droit` (`IDDROIT`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`IDUSER`);

--
-- Contraintes pour la table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `page_ibfk_3` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `textsite`
--
ALTER TABLE `textsite`
  ADD CONSTRAINT `FK_TEXTSITE` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`),
  ADD CONSTRAINT `textsite_ibfk_1` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`IDTYPE`) REFERENCES `usertype` (`IDTYPE`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
