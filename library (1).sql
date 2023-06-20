-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 31 mars 2023 à 11:12
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `Nickname` varchar(150) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `CIN` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Penalty_Count` int(11) DEFAULT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Creation_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`Nickname`, `Name`, `Password`, `Admin`, `Address`, `Email`, `Phone`, `CIN`, `Occupation`, `Penalty_Count`, `Birth_Date`, `Creation_Date`) VALUES
('Ikram12@', 'ELGHALI IKRAM', '$2y$10$nfvQYW13rr5NpDKldBF5Z.xGnj7.y4wmLsVxmGcbH11bqzYCpSfHe', 1, 'Tayert el oulya bloc B ruen N 04', 'IKRAM12@gmail.com', '0687987098', 'ja8hnlk', 'ikram', NULL, '2023-03-16', '2023-03-17'),
('Ikram131@', 'ELGHALI IKRAM', '$2y$10$QgI7n8.hvESKKAIexR9N5.grgdBmF5OfnrRN/Gp63f9Osjm9niwqK', 0, 'Tayert el oulya bloc B ruen N 04', 'elghaliikram12@gmail.com', '0687987098', 'jaw3hnlk', 'ikram', 2, '2023-03-16', '2023-03-17');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `emprunt_Code` int(11) NOT NULL,
  `emprunt_Date` date DEFAULT NULL,
  `emprunt_Return_Date` date DEFAULT NULL,
  `ouvrages_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `Reservation_Code` int(11) NOT NULL,
  `emprunt_confirm` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`emprunt_Code`, `emprunt_Date`, `emprunt_Return_Date`, `ouvrages_Code`, `Nickname`, `Reservation_Code`, `emprunt_confirm`) VALUES
(11, '2023-03-29', '2023-03-29', 1, 'Ikram131@', 17, '1'),
(12, '2023-03-29', '2023-03-29', 1, 'Ikram131@', 18, '1');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

CREATE TABLE `ouvrages` (
  `ouvrages_Code` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author_Name` varchar(100) DEFAULT NULL,
  `Cover_Image` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Edition_Date` date DEFAULT NULL,
  `Buy_Date` date DEFAULT NULL,
  `Status` varchar(150) DEFAULT NULL,
  `Type_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ouvrages`
--

INSERT INTO `ouvrages` (`ouvrages_Code`, `Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Buy_Date`, `Status`, `Type_Code`) VALUES
(1, 'Red,White & Royal blue ', 'Casey McQuiston', 'Group 54.png', 'Available', '2019-05-14', '2019-12-01', 'new', 2),
(2, 'The Cruel Prince', ' Holly Black', 'Group 55.jpg', 'Available', '2017-01-02', '2020-03-01', 'New', 2),
(3, 'Rich Dad Poor Dad', 'Robert Kiyosaki&Sharon L. Lechter', 'Group 53.png', 'Available', '2000-04-01', '2001-03-01', 'New', 3),
(4, 'The Hating Game', 'Peter Hutchings', 'Group 52.png', 'Available', '2021-12-10', '2022-04-11', 'Acceptable', 2),
(5, 'Ugly Love', 'Colleen Hoover', 'Group 49.png', 'Available', '2014-08-05', '2015-05-21', 'Good condition', 5),
(6, 'The law of Human Nature', 'Robert Greene', 'Group 50.png', 'Available', '2018-10-16', '2018-12-04', 'New', 6),
(7, 'The Seven Husbands of Evelyn Hugo', 'Taylor Jenkins Reid', 'Group 51.png', 'Available', '2017-06-13', '2017-09-01', 'Good condition', 2),
(8, 'Ego is The Enemy', 'Ryan Holiday', 'Group 61.jpg', 'Available', '2017-06-14', '2018-01-20', 'Acceptable', 3),
(9, 'The Book Thief', 'Markus Zusak', 'Group 56.webp', 'Available', '2006-03-01', '2007-11-10', 'Quite worn', 3),
(10, 'They Both Die at the End', 'Adam Silvera', 'Group 57.jpg', 'Available', '2017-09-05', '2018-12-21', 'New', 3),
(11, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Group 47.png', 'Available', '2016-09-13', '2017-05-11', 'Good condition', 5),
(12, 'Call me by your Name', 'André Aciman', 'Group 48.png', 'Available', '2007-01-23', '2008-06-21', 'Quite worn', 6),
(13, 'The School for Good and Evil', ' Paul Feig', 'Group 58.jpg', 'Available', '2022-10-18', '2023-01-01', 'Acceptable', 6),
(14, 'Enola Holmes', 'Harry Bradbeer', 'Group 59.jpg', 'Available', '2020-09-23', '2020-12-11', 'Good condition', 5),
(15, 'Red Notice', ' Rawson Marshall Thurber', 'Group 60.jpg', 'Available', '2023-03-01', '2021-11-04', 'Torn', 5);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_Code` int(11) NOT NULL,
  `Reservation_Date` date DEFAULT NULL,
  `Reservation_Expiration_Date` date NOT NULL,
  `ouvrages_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `Reservation_confirm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Reservation_Code`, `Reservation_Date`, `Reservation_Expiration_Date`, `ouvrages_Code`, `Nickname`, `Reservation_confirm`) VALUES
(17, '2023-03-29', '2023-03-30', 1, 'Ikram131@', 1),
(18, '2023-03-29', '2023-03-30', 1, 'Ikram131@', 1);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `Type_Code` int(11) NOT NULL,
  `Type_Name` varchar(50) DEFAULT NULL,
  `Type_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`Type_Code`, `Type_Name`, `Type_Type`) VALUES
(2, 'revue', '120'),
(3, 'revue', '120'),
(5, 'livre', '120'),
(6, 'revue', '30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`Nickname`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`emprunt_Code`),
  ADD UNIQUE KEY `Reservation_Code` (`Reservation_Code`),
  ADD KEY `ouvrages_Code` (`ouvrages_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Index pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD PRIMARY KEY (`ouvrages_Code`),
  ADD KEY `Type_Code` (`Type_Code`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_Code`),
  ADD KEY `ouvrages_Code` (`ouvrages_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`Type_Code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `emprunt_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  MODIFY `ouvrages_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `Type_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`ouvrages_Code`) REFERENCES `ouvrages` (`ouvrages_Code`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `adherent` (`Nickname`),
  ADD CONSTRAINT `emprunt_ibfk_3` FOREIGN KEY (`Reservation_Code`) REFERENCES `reservation` (`Reservation_Code`);

--
-- Contraintes pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD CONSTRAINT `ouvrages_ibfk_1` FOREIGN KEY (`Type_Code`) REFERENCES `types` (`Type_Code`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ouvrages_Code`) REFERENCES `ouvrages` (`ouvrages_Code`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `adherent` (`Nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
