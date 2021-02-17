-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2021 at 03:40 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediatheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `acteurs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `synopsis` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `realisateur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `datesortiefilm` date DEFAULT NULL,
  `affiche` varchar(255) NOT NULL,
  `dateempruntfilm` date DEFAULT NULL,
  `dateretourfilm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `titre`, `acteurs`, `synopsis`, `realisateur`, `datesortiefilm`, `affiche`, `dateempruntfilm`, `dateretourfilm`) VALUES
(1, 'Death note', 'Mamoru Miyano, Shido Nakamura, Kappei Yamaguchi', 'Light Yagami, un jeune étudiant surdoué, ramasse un jour le \"Death Note\", un carnet abandonné par un dieu de la mort, Ryuk, qui apparemment s\'ennuyait dans son monde. Il suffit d\'écrire le nom d\'une personne dans ce carnet, et celle-ci meurt. C\'est ainsi qu\'avec le \"Death Note\" entre les mains, Light décide de débarrasser la planète de tous les criminels pour en faire un monde juste, un monde parfait. ', 'Tsugumi Ōba', '2021-02-02', 'https://cdn.radiofrance.fr/s3/cruiser-production/2020/01/d142ab89-3fb2-45a0-baa7-bc4ac4181cc7/801x410_deathnote.jpg', '2021-02-02', '2021-02-01'),
(2, 'Good Morning Call', 'Mamoru Miyano, Shido Nakamura, Kappei Yamaguchi', 'Quand ses parents partent à la campagne reprendre la ferme de ses grand-parents, Yoshikawa Nao se retrouve enfin à vivre seule dans son propre appartement ! Cependant, elle va devoir le partager avec un colocataire quelque peu particulier... Il s\'agit de Uehara Hisashi, le garçon le plus populaire de son école. Leur colocation doit absolument rester secrète. Mais les deux jeunes gens vont devoir faire face à différents problèmes au sein de cette colocation peu commune, comme par exemple la fermeture de leur agence et les problèmes d\'argent !', 'Yoshihisa Kawahara', '2021-02-01', 'https://fr.web.img5.acsta.net/c_310_420/pictures/17/11/24/14/19/5794289.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
