-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 30 Novembre 2014 à 22:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `brainit`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reference` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `prix` float NOT NULL,
  `quantiteStock` int(11) NOT NULL,
  UNIQUE KEY `idProduit` (`idArticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idArticle`, `reference`, `libelle`, `description`, `idCategorie`, `prix`, `quantiteStock`) VALUES
(1, 'BX80646I74790K', 'Intel Core i7 4790K Processeur 4 coeurs 4,4 GHz Socket LGA1150', '\r\n\r\n    Description du produit: Intel i7-4790K Core\r\n    Famille de processeur: Intel Core i7\r\n    Vitesse du processeur: 4 GHz\r\n    Socket de processeur (réceptable de processeur): Socket H3 (LGA 1150)\r\n    Maximum RAM supportée: 32 Go\r\n    Types de mémoire pris en charge: DDR3-SDRAM\r\n    Prise en charge de la mémoire vitesse d''horloge: 1333. 1600 MHz\r\n    Modèle d''adaptateur graphique à bord: Intel HD Graphics 4600. fréquence graphics de base: 350 MHz\r\n    Graphics max dynamique de fréquence: 1250 MHz\r\n    Puissance thermique: 88W\r\n    Version des emplacements PCI Express: 3.0\r\n    Configurations de PCI Express: 1x16, 2x8, 1x8+2x4\r\n    Set d''instructions pris en charge: AVX 2.0, SSE4.1, SSE4.2\r\n', 4, 300.5, 11),
(2, 'N770 TF 2GD5/OC', 'MSI N770 TF 2GD5/OC Carte graphique Nvidia GeForce GTX 770 1098 MHz 2048 Mo PCI-Express', 'JOUEZ MAINTENANT AVEC MSI\r\nUne carte graphique est l''élément le plus important pour obtenir plus de FPS. En tant que gamer, toutes les cartes graphiques ne proposent pas des performances élevées. C''est pour cette raison que nous vous apportons le top du top.avec les nouvelles cartes graphiques MSI GAMING, la N770 TF 2GD5/OC est la carte parfaite pour jouer dans des conditions optimales.\r\n\r\nPERFORMANCE PRÉ OVERCLOCKÉ\r\nLa plupart de cartes graphiques GAMING MSI sont pré-overclocké d’usine. Cela signifie simplement que vous obtenez plus de performance d’entrée de jeu, sans avoir l’obligation de passer du temps à régler les fréquences pour obtenir des performances maximales. La garantie couvre cet overclocking d’usine et vous permettra de profiter pleinement des performances de notre carte graphique GAMING N770 TF 2GD5/OC.\r\n\r\nGAMING APP\r\n\r\nEASY TUNE, EASY PLAY\r\n\r\nMode Gaming\r\n- Boost la fréquence du GPU et optimise la vitesse des ventilateurs ( plus de performances dans les jeux )\r\n\r\nMode Eco\r\n- Réduit la fréquence du GPU ainsi que la vitesse des ventilateurs ( économie d''énergie, carte silencieuse )\r\n\r\nMode par Défaut\r\n- Retour aux réglages d''origine\r\n\r\nTWIN FORZR IV ADVANCED\r\nLa solution MSI Twin Frozr a été la première solution haut de gamme à double ventilateur et est à ce jour la référence en termes de solution performante et ultra silencieuse. Les dernières versions Twin Frozr IV utilisent 2 ventilateurs large Ppropeller Blade avec technologie Dust Removal ce qui vous assure une dissipation optimale le tout dans un silence absolu.\r\n\r\nL''autre partie que le dissipateur Twin Frozr utilise est un radiateur en aluminium avec des ailettes qui offre une grande surface pour un refroidissement optimal. La chaleur du GPU est transférée sur l''ensemble du radiateur via les caloducs avec la technologie SuperPipe MSI. Grâce à notre technologie Superpipe, la carte chauffe moins que la concurrence et dispose d’une meilleure dissipation de chaleur.\r\n\r\nLa N770 TF 2GD5/OC offre une meilleure dissipation de manière générale et sera la carte idéale pour tout GAMERS souhaitant jouer dans des conditions idéales dans les jeux, silence et performances sont au rendez-vous.\r\n\r\nCOMPOSANT MILITARY CLASS\r\nL''un des facteurs déterminants dans la performance reste la qualité des composants utilisés. C''est pourquoi MSI utilise uniquement des composants certifiés MIL-STD-810G pour ses cartes graphiques gamers, parce que ces éléments se sont avérés capables de résister aux conditions les plus extrêmes et ce même en cas d’overclocking.\r\n\r\nSOLID CAP\r\nLes Solid CAP''s avec leur coeur en Aluminium, vous permet d''avoir une plus grande durée de vie avec une longévité d''au moins 10 ans.\r\n\r\nHi-C CAP\r\nLe Hi-c CAP est un composant extrêmement petit et le cœur est composé de Tantale, un métal rare connu pour ses nombreuses qualités. La capacité d''auto-régénération du Hi-c CAP garantit un fonctionnement même dans des températures extrêmes et offre une efficacité et stabilité accrue. Nos cartes graphiques haut de gammes sont les plus efficace du marché.\r\n\r\nNOUVEAU SUPER FERRITE CHOKES\r\nLes nouveaux composants SFC ont jusqu''à 20% de puissance électrique supplémentaire comparés aux bobines traditionnelles et ont une capacité de rendement jusqu''à 30% plus importante et ce, dans le but d''avoir une tension plus stable et fiable, surtout en cas d''overclocking poussé.\r\n\r\nEXPERIENCE - PREDATOR\r\n\r\nPARTAGER POUR LE FUN\r\n\r\nMSI Predator est un utilitaire de capture audio/vidéo gratuit qui vous permettra d’enregistrer vos exploits dans vos jeux favoris.\r\n\r\nAFTERBURNER\r\n\r\nMSI Afterburner est rapidement devenu le logiciel d''overclocking de prédilection pour les médias, les overclockers et les utilisateurs finaux. En raison de son interface simple, il est facile à apprendre, mais il propose beaucoup de fonctionnalités comme un utilitaire de benchmark intégré appelé Kombustor qui permet de vérifier les performances de votre système en mode benchmark, ou lancer un test de stabilité.\r\n\r\nVous ne parlez pas anglais? Pas de problème: MSI Afterburner est traduit dans de nombreuses langues, dont le russe, l''espagnol, le chinois et le coréen! Pas satisfait de son look ? Il suffit de changer l''un des nombreux skins proposés ou vous pouvez vous-même le créer en toute simplicité.\r\n\r\nEncore mieux, vous pouvez exécuter Afterburner directement à partir de votre smartphone! Télécharger MSI Afterburner App depuis Google Play ou sur l''Apple Store !\r\n', 2, 259.99, 4);

-- --------------------------------------------------------

--
-- Structure de la table `articlecommande`
--

CREATE TABLE IF NOT EXISTS `articlecommande` (
  `idCommande` int(11) NOT NULL,
  `reference` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `articlecommande`
--

INSERT INTO `articlecommande` (`idCommande`, `reference`, `libelle`, `prix`, `idCategorie`, `quantite`) VALUES
(1, 'N770 TF 2GD5/OC', 'MSI N770 TF 2GD5/OC ', 230.5, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `articlepanier`
--

CREATE TABLE IF NOT EXISTS `articlepanier` (
  `idPanier` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelle`, `description`) VALUES
(1, 'Carte mere', 'La carte mère (motherboard ou mainboard en anglais) est le cœur de tout ordinateur. Elle est essentiellement composée de circuits imprimés et de ports de connexion, par le biais desquels elle assure la connexion de tous les composants et périphériques propres à un micro-ordinateur (disques durs, mémoire vive, microprocesseur, cartes filles,...) afin qu''ils puissent être reconnus et configurés par la carte lors du démarrage.'),
(2, 'Carte graphique', 'Une carte graphique ou carte vidéo (anciennement par abus de langage une carte VGA), ou encore un adaptateur graphique, est une carte d’extension d’ordinateur dont le rôle est de produire une image affichable sur un écran. La carte graphique envoie à l’écran des images stockées dans sa propre mémoire, à une fréquence et dans un format qui dépendent d’une part de l’écran branché et du port sur lequel il est branché (grâce au Plug and Play) et de sa configuration interne d’autre part.'),
(3, 'Memoire vive', 'La mémoire vive, ou mémoire système aussi appelée RAM de l''anglais Random Access Memory (que l''on traduit en français par mémoire à accès direct1), est la mémoire informatique dans laquelle un ordinateur place les données lors de leur traitement.\r\n\r\nLes caractéristiques de cette mémoire sont sa rapidité d''accès, essentielle pour fournir rapidement les données au processeur, et sa volatilité qui implique une perte totale de toutes les données mémoire dès que l''ordinateur cesse d''être alimenté en électricité. Cette caractéristique a tendance à disparaitre avec les dernières évolutions technologiques conduisant à des types de mémoire RAM non-volatile, comme les MRAM.'),
(4, 'Processeur', 'Le processeur (ou CPU de l''anglais Central Processing Unit, « Unité centrale de traitement ») est le composant de l''ordinateur qui exécute les instructions machine des programmes informatiques. Avec la mémoire notamment, c''est l''un des composants qui existent depuis les premiers ordinateurs et qui sont présents dans tous les ordinateurs. Un processeur construit en un seul circuit intégré est un microprocesseur.'),
(5, 'Souris', 'Une souris est un dispositif de pointage pour ordinateur. Elle est composée d''un petit boîtier fait pour tenir sous la main, sur lequel se trouvent un ou plusieurs boutons, et une molette dans la plupart des cas.'),
(6, 'Clavier', 'Un clavier d’ordinateur est une interface homme-machine, un périphérique d’entrée de l’ordinateur composé de touches envoyant des instructions à la machine une fois actionnées. Plusieurs normes régissent les dispositifs claviers1. Un clavier est parfois accompagné de pédales, de la même manière que peut l’être le clavier d’un instrument de musique.');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `genre` tinyint(1) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` int(5) NOT NULL,
  `dateCreation` date NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `datNais` date NOT NULL,
  `telephone` int(10) DEFAULT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `idClient` (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `nom`, `prenom`, `genre`, `email`, `password`, `adresse`, `codePostal`, `dateCreation`, `actif`, `datNais`, `telephone`) VALUES
(2, 'Goncalves', 'Jojo Bernard', 1, 'jojax94@hotmail.fr', '4124bc0a9335c27f086f24ba207a4912', '', 0, '0000-00-00', 0, '1995-02-08', 658957588),
(3, 'Rocheron', 'Victor', 1, 'victor.rocheron@gmail.com', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', '', 0, '0000-00-00', 0, '1995-09-25', 664293505);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dateLivraison` date NOT NULL,
  UNIQUE KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `idClient`, `status`, `dateLivraison`) VALUES
(1, 2, 1, '2014-11-26');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `idPanier` (`idPanier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
