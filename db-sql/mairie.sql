-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 juin 2023 à 12:38
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `acte_deces`
--

CREATE TABLE `acte_deces` (
  `num_registre` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_deces` date NOT NULL,
  `lieu_deces` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  `lieu_residence` varchar(50) NOT NULL,
  `matrimoniale` varchar(50) NOT NULL,
  `nom_conjoint` varchar(50) NOT NULL,
  `prenom_conjoint` varchar(255) NOT NULL,
  `nom_pere` varchar(50) NOT NULL,
  `prenom_pere` varchar(255) NOT NULL,
  `nom_mere` varchar(50) NOT NULL,
  `prenom_mere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `acte_deces`
--

INSERT INTO `acte_deces` (`num_registre`, `nom`, `prenom`, `date_deces`, `lieu_deces`, `age`, `profession`, `nationalite`, `lieu_residence`, `matrimoniale`, `nom_conjoint`, `prenom_conjoint`, `nom_pere`, `prenom_pere`, `nom_mere`, `prenom_mere`) VALUES
(1, 'coul', 'pat', '2010-02-21', 'abobo', 39, 'plombier', 'ivoirienne', 'abobo', 'celibataire', 'neant', 'neant', 'coul', 'pet', 'pat', 'ama'),
(2, 'coul', 'pat', '2010-02-21', 'abobo', 39, 'plombier', 'ivoirienne', 'abobo', 'celibataire', 'neant', 'neant', 'coul', 'pet', 'pat', 'ama');

-- --------------------------------------------------------

--
-- Structure de la table `acte_mariage`
--

CREATE TABLE `acte_mariage` (
  `num_registre` int(11) NOT NULL,
  `date` date NOT NULL,
  `nom_cjt` varchar(50) NOT NULL,
  `prenom_cjt` varchar(255) NOT NULL,
  `date_naissance_cjt` date NOT NULL,
  `profession_cjt` varchar(50) NOT NULL,
  `lieu_hab_cjt` varchar(50) NOT NULL,
  `nom_pere_cjt` varchar(50) NOT NULL,
  `prenom_pere_cjt` varchar(255) NOT NULL,
  `nom_cjte` varchar(50) NOT NULL,
  `prenom_cjte` varchar(255) NOT NULL,
  `date_naissance_cjte` date NOT NULL,
  `profession_cjte` varchar(50) NOT NULL,
  `lieu_hab_cjte` varchar(50) NOT NULL,
  `nom_pere_cjte` varchar(50) NOT NULL,
  `prenom_pere_cjte` varchar(255) NOT NULL,
  `nom_mere_cjte` varchar(50) NOT NULL,
  `prenom_mere_cjte` varchar(255) NOT NULL,
  `nom_mere_cjt` varchar(50) NOT NULL,
  `prenom_mere_cjt` varchar(255) NOT NULL,
  `bien` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `acte_mariage`
--

INSERT INTO `acte_mariage` (`num_registre`, `date`, `nom_cjt`, `prenom_cjt`, `date_naissance_cjt`, `profession_cjt`, `lieu_hab_cjt`, `nom_pere_cjt`, `prenom_pere_cjt`, `nom_cjte`, `prenom_cjte`, `date_naissance_cjte`, `profession_cjte`, `lieu_hab_cjte`, `nom_pere_cjte`, `prenom_pere_cjte`, `nom_mere_cjte`, `prenom_mere_cjte`, `nom_mere_cjt`, `prenom_mere_cjt`, `bien`) VALUES
(1, '2023-05-29', 'doh', 'sam', '1999-05-29', 'electricien', 'cocody', 'doh', 'pat', 'dah', 'lil', '2001-01-01', 'etudiante', 'cocody', 'dah', 'bien', 'hat', 'imir', 'hat', 'trix', 'communauté de bien');

-- --------------------------------------------------------

--
-- Structure de la table `acte_naissance`
--

CREATE TABLE `acte_naissance` (
  `num_registre` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(50) NOT NULL,
  `nom_pere` varchar(50) NOT NULL,
  `prenom_pere` varchar(255) NOT NULL,
  `nationalite_pere` varchar(50) NOT NULL,
  `nom_mere` varchar(50) NOT NULL,
  `prenom_mere` varchar(255) NOT NULL,
  `nationalite_mere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `acte_naissance`
--

INSERT INTO `acte_naissance` (`num_registre`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `nom_pere`, `prenom_pere`, `nationalite_pere`, `nom_mere`, `prenom_mere`, `nationalite_mere`) VALUES
(2, 'mad', 'max', '2001-01-01', 'cocody', 'mad', 'pax', 'ivoirienne', 'mid', 'mix', 'ivoirienne'),
(3, 'mad', 'max', '2001-01-01', 'cocody', 'mad', 'pax', 'ivoirienne', 'mid', 'mix', 'ivoirienne'),
(4, 'mad', 'max', '2001-01-01', 'cocody', 'mad', 'pax', 'ivoirienne', 'mid', 'mix', 'ivoirienne'),
(5, 'mad', 'max', '2001-01-01', 'cocody', 'mad', 'pax', 'ivoirienne', 'mid', 'mix', 'ivoirienne'),
(6, 'kouandio', 'pacome akichi', '2003-07-11', 'attecoube', 'ago ', 'dominique', 'ivoirienne', 'assaba', 'esther', 'ivoirienne'),
(7, 'kouandio', 'pacome akichi', '2003-07-11', 'attecoube', 'ago ', 'dominique', 'ivoirienne', 'assaba', 'esther', 'ivoirienne');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `num_demande` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `num_registre` int(11) NOT NULL,
  `type_acte` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'en attente',
  `date_demande` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`num_demande`, `id_user`, `num_registre`, `type_acte`, `status`, `date_demande`) VALUES
(2, 24, 1, 'acte de Décès', 'en attente', '2023-05-29'),
(3, 24, 1, 'acte de Mariage', 'en attente', '2023-05-29'),
(4, 26, 6, 'acte de naissance', 'en attente', '2023-06-01'),
(5, 27, 6, 'acte de naissance', 'en attente', '2023-06-01');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `pseudo`, `nom`, `prenom`, `email`, `password`, `isadmin`) VALUES
(23, 'aa', 'aa', 'aa', 'kingachi@gmail.com', '$2y$10$My31MDPSqFTvp8hkydUUOupW7is8lrt79ztWJybfhK/SNopSVtt.q', 0),
(24, 'king', 'atse', 'achi', 'atseachi7@gmail.com', '$2y$10$ya64Dey.stV3KDwjf0LfKeREkK22AmGytBvRLtPBn0WzCcdnr4aOq', 0),
(26, 'admin', 'admin', 'admin', 'mairiedesassandra@gmail.com', '$2y$10$2jAe3rOs4K3LvgjgoD.tmuoltpNQlrFAzMMmpthWQZh8BUrw4LJay', 1),
(27, 'paco', 'kouandio', 'pacome akichi', 'kouandioangepacome@gmail.com', '$2y$10$liSvFlw5IQvkxkHv/9zlnecTA6VkjkoHxAzOiyxPUfGtz6s0qM17q', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acte_deces`
--
ALTER TABLE `acte_deces`
  ADD PRIMARY KEY (`num_registre`);

--
-- Index pour la table `acte_mariage`
--
ALTER TABLE `acte_mariage`
  ADD PRIMARY KEY (`num_registre`);

--
-- Index pour la table `acte_naissance`
--
ALTER TABLE `acte_naissance`
  ADD PRIMARY KEY (`num_registre`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`num_demande`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acte_deces`
--
ALTER TABLE `acte_deces`
  MODIFY `num_registre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `acte_mariage`
--
ALTER TABLE `acte_mariage`
  MODIFY `num_registre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `acte_naissance`
--
ALTER TABLE `acte_naissance`
  MODIFY `num_registre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `num_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
