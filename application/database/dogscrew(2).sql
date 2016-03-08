-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Février 2016 à 17:52
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

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

CREATE TABLE `article` (
  `idArticle` int(3) NOT NULL,
  `idUser` int(3) NOT NULL,
  `idLangue` int(3) DEFAULT NULL,
  `date` date NOT NULL,
  `Titre` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `texte` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idPage` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idArticle`, `idUser`, `idLangue`, `date`, `Titre`, `texte`, `idPage`) VALUES
(1, 1, 2, '2016-01-09', 'English try', 'It''s a article in english. I love wrote in English but I don''t speak very well this language. This article is a test article. It''s a article in english. I love wrote in English but I don''t speak very well this language. This article is a test article. Test up to 300 characters : reload !', 1),
(2, 1, 1, '2015-04-28', 'Latin', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun', NULL),
(3, 1, 1, '2015-10-29', 'nouvel article', 'Ceci est un nouvel article.\r\n', NULL),
(4, 1, 1, '2016-02-01', 'actualité du site', 'Hey, bonjour tout le monde !!! Une petite news pour vous informer que nous avons un nouvelle page sur ce site. Cette page à pour but de vous expliquer un peu ce que pouvez être le monde pendant le X et XI siècle lorsque les vikings était présent ! <br></br>\r\nA bientôt pour de nouvelle aventure !!!', 1),
(5, 1, 3, '2016-02-01', 'tests', 'arzgtyuiop', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `articletemp`
--

CREATE TABLE `articletemp` (
  `idArticleTemp` int(3) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `idUserTemp` int(11) DEFAULT NULL,
  `idLangueTemp` int(11) NOT NULL,
  `idPageTemp` int(11) NOT NULL,
  `dateTemp` date NOT NULL,
  `titreTemp` text NOT NULL,
  `texteTemp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

CREATE TABLE `compagnie` (
  `idCompagnie` int(3) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idlangue` int(3) NOT NULL,
  `titre` text NOT NULL,
  `texte` text NOT NULL,
  `image` text,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compagnie`
--

INSERT INTO `compagnie` (`idCompagnie`, `idUser`, `idlangue`, `titre`, `texte`, `image`, `date`) VALUES
(1, 1, 1, 'Compagnie', 'Ceci est la page de la compagnie', 'imagesPage/bc7ff8bc00199ebb7ed1b81b6983254b.jpg', '2016-01-19'),
(2, 1, 2, 'Company', 'It''s a description of the dogs crew company, in english.', 'imagesPage/IMAG0173.jpg', '2016-01-19'),
(3, 1, 3, 'Kompanie', 'Ceci est la page de la compagnie en allemand', 'imagesPage/IMAG0173.jpg', '2016-01-19');

-- --------------------------------------------------------

--
-- Structure de la table `compagnietemp`
--

CREATE TABLE `compagnietemp` (
  `idCompagnieTemp` int(3) NOT NULL,
  `idCompagnie` int(3) NOT NULL,
  `idUser` int(3) NOT NULL,
  `idLangue` int(3) NOT NULL,
  `imageTemp` text,
  `date` date NOT NULL,
  `titreTemp` text NOT NULL,
  `texteTemp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
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

CREATE TABLE `droit` (
  `idDroit` int(3) NOT NULL,
  `controller` text CHARACTER SET utf8 NOT NULL,
  `action` varchar(50) CHARACTER SET utf8 NOT NULL,
  `idRole` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `IDIMAGE` int(3) NOT NULL,
  `idUser` int(3) DEFAULT NULL,
  `TITRE` text CHARACTER SET utf8 NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 NOT NULL,
  `URL` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `langue` (
  `id` int(3) NOT NULL,
  `langue` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `languenavbar` (
  `idLangueNavBar` int(3) NOT NULL,
  `idLangue` int(3) NOT NULL,
  `texte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `languenavbar`
--

INSERT INTO `languenavbar` (`idLangueNavBar`, `idLangue`, `texte`) VALUES
(1, 1, 'Plus-Accueil-Compagnie-Article-Galerie-Contact'),
(2, 2, 'More-Home-Group-Article-Gallery-Contact'),
(3, 3, 'Merh-Startseite-Kompanie-Artikel-Galerie-Kontakt');

-- --------------------------------------------------------

--
-- Structure de la table `mdpsalt`
--

CREATE TABLE `mdpsalt` (
  `idMdpSalt` int(3) NOT NULL,
  `saltR` text NOT NULL,
  `saltL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mdpsalt`
--

INSERT INTO `mdpsalt` (`idMdpSalt`, `saltR`, `saltL`) VALUES
(1, 'b00dd4d36267997070646276b520b4c0b4e074aa', '450cf53a9f682e26272642215de9fe2137633cbd');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `idPage` int(3) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idLangue` int(3) DEFAULT NULL,
  `titre` varchar(60) NOT NULL,
  `texte` text NOT NULL,
  `image` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`idPage`, `idUser`, `idLangue`, `titre`, `texte`, `image`, `date`) VALUES
(1, 1, 1, 'histoire', 'Un Viking (vieux norrois víkingr ; pluriel, víkingar) est un explorateur, commerçant, pillard mais aussi pirate scandinave au cours d’une période s’étendant du VIIIe au XIe siècle3. Par extension, on emploie le terme en français pour désigner la civilisation scandinave de l''âge du fer tardif c''est-à-dire à partir de la fin du IIe siècle à l''âge du fer romain (en). C''est le point de vue adopté dans une partie du présent article. Ils sont souvent appelés « Normands », c''est-à-dire les « hommes du Nord », dans la bibliographie ancienne.', NULL, '2015-05-21'),
(2, 1, 1, 'page avec image', '<p><u>Ceci est une écroce d''arbre.</u></p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun</p>\r\n', 'imagesPage/ecorse.jpg', '2015-10-30'),
(3, 1, 1, 'essai', 'Ceci est un texte de test pour la page intitulé "essai".', NULL, '2015-10-29'),
(4, 1, 3, 'titre', 'textes', 'imagesPage/1000-catalogue-cherbourg.jpg', '2016-01-29');

-- --------------------------------------------------------

--
-- Structure de la table `pagetemp`
--

CREATE TABLE `pagetemp` (
  `idPageTemp` int(3) NOT NULL,
  `idPage` int(3) NOT NULL,
  `idLangueTemp` int(3) NOT NULL,
  `idUserTemp` int(3) NOT NULL,
  `imageTemp` text,
  `date` date NOT NULL,
  `titre` text NOT NULL,
  `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `textsite`
--

CREATE TABLE `textsite` (
  `idText` int(3) NOT NULL,
  `idUser` int(3) DEFAULT NULL,
  `idLangue` int(3) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `libelle` varchar(60) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `textsite`
--

INSERT INTO `textsite` (`idText`, `idUser`, `idLangue`, `type`, `libelle`, `text`) VALUES
(1, 1, 1, 'presentation', 'Présentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun.'),
(2, 1, 1, 'footer', 'footerFR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n	    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciun'),
(3, 1, 2, 'presentation', 'Presentation', 'ceci est une presentation en anglais'),
(4, 1, 3, 'presentation', 'Darstellung', 'ceci est une présentation en allemand'),
(5, 1, 1, 'contact', 'Nous contacter', 'Si vous voulez nous contacter, envoyé nous un message !'),
(6, 1, 2, 'contact', 'Contact us', ''),
(7, 1, 3, 'contact', 'Kommunizieren Sie mit uns', ''),
(8, 1, 1, 'message_accueil', 'Le site Officiel', ''),
(9, 1, 2, 'message_accueil', 'The Official Website', ''),
(10, 1, 3, 'message_accueil', 'Die offizielle Website', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(3) NOT NULL,
  `idType` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` text NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `idType`, `nom`, `prenom`, `mail`, `mdp`) VALUES
(1, 1, 'Brossault', 'Nicolas', 'ni.brossault@laposte.net', '0d160d453dbbd492437b4dfd1b15bc8ad6babcfc');

-- --------------------------------------------------------

--
-- Structure de la table `usertype`
--

CREATE TABLE `usertype` (
  `idType` int(11) NOT NULL,
  `libelle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `usertype`
--

INSERT INTO `usertype` (`idType`, `libelle`) VALUES
(1, 'admin'),
(2, 'redacteur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD UNIQUE KEY `idPage` (`idArticle`),
  ADD KEY `FK_LARTICLE` (`idUser`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Index pour la table `articletemp`
--
ALTER TABLE `articletemp`
  ADD PRIMARY KEY (`idArticleTemp`),
  ADD UNIQUE KEY `idArticle` (`idArticle`),
  ADD UNIQUE KEY `idLangueTemp` (`idLangueTemp`),
  ADD UNIQUE KEY `idPageTemp` (`idPageTemp`),
  ADD UNIQUE KEY `idUserTemp` (`idUserTemp`) USING BTREE;

--
-- Index pour la table `compagnie`
--
ALTER TABLE `compagnie`
  ADD PRIMARY KEY (`idCompagnie`),
  ADD KEY `user` (`idUser`),
  ADD KEY `langue` (`idlangue`);

--
-- Index pour la table `compagnietemp`
--
ALTER TABLE `compagnietemp`
  ADD PRIMARY KEY (`idCompagnieTemp`),
  ADD KEY `idCompagnie` (`idCompagnie`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idCompte`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`idDroit`);

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
  ADD PRIMARY KEY (`idLangueNavBar`),
  ADD UNIQUE KEY `idLangue` (`idLangue`);

--
-- Index pour la table `mdpsalt`
--
ALTER TABLE `mdpsalt`
  ADD PRIMARY KEY (`idMdpSalt`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`idPage`),
  ADD KEY `IDUSER` (`idUser`),
  ADD KEY `IdLangue` (`idLangue`);

--
-- Index pour la table `pagetemp`
--
ALTER TABLE `pagetemp`
  ADD PRIMARY KEY (`idPageTemp`),
  ADD UNIQUE KEY `idPage` (`idPage`),
  ADD UNIQUE KEY `idLangueTemp` (`idLangueTemp`),
  ADD UNIQUE KEY `idUserTemp` (`idUserTemp`);

--
-- Index pour la table `textsite`
--
ALTER TABLE `textsite`
  ADD PRIMARY KEY (`idText`),
  ADD KEY `IDUSER` (`idUser`,`idLangue`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `FK_LETYPEUSER` (`idType`);

--
-- Index pour la table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`idType`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `articletemp`
--
ALTER TABLE `articletemp`
  MODIFY `idArticleTemp` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `compagnie`
--
ALTER TABLE `compagnie`
  MODIFY `idCompagnie` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `compagnietemp`
--
ALTER TABLE `compagnietemp`
  MODIFY `idCompagnieTemp` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `idCompte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `idDroit` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `IDIMAGE` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `languenavbar`
--
ALTER TABLE `languenavbar`
  MODIFY `idLangueNavBar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `idPage` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `pagetemp`
--
ALTER TABLE `pagetemp`
  MODIFY `idPageTemp` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `textsite`
--
ALTER TABLE `textsite`
  MODIFY `idText` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `articletemp`
--
ALTER TABLE `articletemp`
  ADD CONSTRAINT `articletemp_ibfk_1` FOREIGN KEY (`idLangueTemp`) REFERENCES `langue` (`id`),
  ADD CONSTRAINT `articletemp_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `articletemp_ibfk_3` FOREIGN KEY (`idUserTemp`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `compagnietemp`
--
ALTER TABLE `compagnietemp`
  ADD CONSTRAINT `compagnietemp_ibfk_1` FOREIGN KEY (`idCompagnie`) REFERENCES `compagnie` (`idCompagnie`),
  ADD CONSTRAINT `compagnietemp_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `compagnietemp_ibfk_3` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `languenavbar`
--
ALTER TABLE `languenavbar`
  ADD CONSTRAINT `languenavbar_ibfk_1` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`);

--
-- Contraintes pour la table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `page_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `textsite`
--
ALTER TABLE `textsite`
  ADD CONSTRAINT `FK_TEXTSITE` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `textsite_ibfk_1` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `usertype` (`idType`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
