-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 02 Juin 2023 à 19:18
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `famille`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAd` int(11) NOT NULL,
  `login` text NOT NULL,
  `pwd` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAd`, `login`, `pwd`) VALUES
(1, 'sa', '123');

-- --------------------------------------------------------

--
-- Structure de la table `typemembre`
--

CREATE TABLE `typemembre` (
  `idTm` int(255) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typemembre`
--

INSERT INTO `typemembre` (`idTm`, `name`) VALUES
(1, 'Tante'),
(6, 'Père'),
(7, 'Mère'),
(8, 'Cousine'),
(9, 'Frère');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUt` int(255) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `mail` text NOT NULL,
  `birth_date` text NOT NULL,
  `birth_city` text NOT NULL,
  `pwd` text NOT NULL,
  `idTm` int(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUt`, `f_name`, `l_name`, `mail`, `birth_date`, `birth_city`, `pwd`, `idTm`, `code`) VALUES
(2, 'FFEF', 'FEFEF', 'FE@gmail.com', '12/25/2025', 'cotonou', '$2y$10$VVOzjKC2N9wRfXphAUvHFOq1ZzPIJI6ihYfcX9g1Nfp8srHZYNe6u', 2, '58462656'),
(4, 'sa', 'sa', 'sa1@gmail.com', '12/25/45', 'ccfec', '$2y$10$wk3Tzp4raNriWv9eVZJ2ieTe5QZVTk5MpEZMD4QGKKdq8ooZgETw6', 7, '54421212'),
(5, 'se', 'sa', 'b@gmail.com', '12/15/2021', 'cotonou', '$2y$10$gwZCw6fUkG/1nuLrQZQ7FOdFwndNieHFJ.ALvOxVAuTv87avhfGz.', 7, '51202452'),
(7, 'sa', 'sa', 'a1@gmail.com', '01/25/1454', 'ccd', '$2y$10$4PlQ6xqVyiD/NINA3QSRK.HbFsZ5mMzW131oG5CL5zoFpt2rR52gG', 1, '54421212');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAd`);

--
-- Index pour la table `typemembre`
--
ALTER TABLE `typemembre`
  ADD PRIMARY KEY (`idTm`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUt`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `typemembre`
--
ALTER TABLE `typemembre`
  MODIFY `idTm` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUt` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
