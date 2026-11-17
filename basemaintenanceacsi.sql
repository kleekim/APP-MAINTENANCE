-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 nov. 2026 à 11:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `basemaintenanceacsi`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('maintenance-acsi-cache-487f57a6e620d38036c25e47521da040', 'i:1;', 1794786022),
('maintenance-acsi-cache-487f57a6e620d38036c25e47521da040:timer', 'i:1794786022;', 1794786022),
('maintenance-acsi-cache-9d91497ed99c8712f1f4994a12a23476', 'i:1;', 1794783991),
('maintenance-acsi-cache-9d91497ed99c8712f1f4994a12a23476:timer', 'i:1794783991;', 1794783991),
('maintenance-acsi-cache-admin@maintenance.localpassword123|127.0.0.1', 'i:1;', 1794783991),
('maintenance-acsi-cache-admin@maintenance.localpassword123|127.0.0.1:timer', 'i:1794783991;', 1794783991),
('maintenance-acsi-cache-ae4f46b10c76baa6266d60c7c909499a', 'i:1;', 1794786046),
('maintenance-acsi-cache-ae4f46b10c76baa6266d60c7c909499a:timer', 'i:1794786046;', 1794786046),
('maintenance-acsi-cache-d04f615a53a6348b83d742fb467a2796', 'i:1;', 1794785932),
('maintenance-acsi-cache-d04f615a53a6348b83d742fb467a2796:timer', 'i:1794785931;', 1794785931),
('maintenance-acsi-cache-d84699e69d94cb52ffba7fd3cfea386b', 'i:1;', 1794786096),
('maintenance-acsi-cache-d84699e69d94cb52ffba7fd3cfea386b:timer', 'i:1794786096;', 1794786096),
('maintenance-acsi-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:35:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:20:\"voir_admin_Dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:19:\"ajouter_utilisateur\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:21:\"supprimer_utilisateur\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:20:\"modifier_utilisateur\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"voir_client\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:14:\"ajouter_client\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:16:\"supprimer_client\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:15:\"modifier_client\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"voir_demande\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:15:\"envoyer_demande\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:16:\"modifier_demande\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:17:\"supprimer_demande\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:18:\"voir fiche_accueil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:23:\"voir fiche_intervention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:12:\"voir facture\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:21:\"voir_Dashboard_client\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:17:\"soumettre_demande\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:21:\"suivre_statut_demande\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:17:\"voir_notification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:26:\"Voir_commerciale_Dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:17:\"consulter_demande\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:21:\"remplir_fiche_accueil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:22:\"modifier_fiche_accueil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:21:\"envoyer_fiche_accueil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:23:\"voir_fiche_intervention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:26:\"remplir_fiche_intervention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:15:\"remplir_facture\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:25:\"Voir_technicien_dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:26:\"envoyer_fiche_intervention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:27:\"modifier_fiche_intervention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:27:\"voir_recouvrement_dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:5;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:17:\"consulter_facture\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:5;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:29:\"Voir_Dashboard_client_contrat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:17:\"consulter_contrat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:26:\"voir_planning_intervention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}}s:5:\"roles\";a:6:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:14:\"administrateur\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:6:\"client\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"commerciale\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"technicien\";s:1:\"c\";s:3:\"web\";}i:4;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"recouvrement\";s:1:\"c\";s:3:\"web\";}i:5;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:14:\"Client_Contrat\";s:1:\"c\";s:3:\"web\";}}}', 1794868000);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_clients` enum('Particuliers','Entreprises') NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `type_clients`, `nom_complet`, `telephone`, `email`, `adresse`, `created_at`, `updated_at`) VALUES
(1, 7, 'Particuliers', 'Patrick Mabiala', '060000001', 'patrickmabiala@gmail.com', 'Tié tié', '2026-11-15 21:35:20', '2026-11-15 21:35:20'),
(2, 8, 'Particuliers', 'Grâce Ngoma', '056664875', 'Grace@gmail.com', 'Centre_Ville', '2026-11-15 21:37:23', '2026-11-15 21:37:23'),
(3, 9, 'Particuliers', 'sara SAMI', '054478552', 'sami@gmail.com', 'Ngoyo', '2026-11-15 21:38:32', '2026-11-15 21:38:32'),
(4, 10, 'Particuliers', 'BELINDA Garcia', '045589636', 'belinda@gmail.com', 'Timbamba', '2026-11-15 21:40:38', '2026-11-15 21:40:38'),
(5, 11, 'Particuliers', 'Veronique', '065239878', 'veronique@gmail.com', 'Loandjili', '2026-11-15 21:41:46', '2026-11-15 21:41:46'),
(6, 12, 'Particuliers', 'CLAIRE Roncia', '041263350', 'claire@gmail.com', 'Tié-Tié', '2026-11-15 21:43:24', '2026-11-15 21:43:24'),
(7, 13, 'Particuliers', 'junior MASSAMBA', '047863211', 'juniormassamba@gmail.com', 'Mpaka', '2026-11-15 21:50:55', '2026-11-15 21:50:55'),
(8, 14, 'Particuliers', 'audrey MALONGA', '048752636', 'audreymalonga@gmail.com', 'Côte Matève', '2026-11-15 21:52:32', '2026-11-15 21:52:32'),
(9, 15, 'Particuliers', 'Natacha', '069987411', 'natacha@gmail.com', 'm	Mvou-Mvou', '2026-11-15 21:53:47', '2026-11-15 21:53:47'),
(10, 16, 'Particuliers', 'VALERIA', '056647800', 'valeria@gmail.com', 'Centre_Ville', '2026-11-15 21:55:21', '2026-11-15 21:55:21');

-- --------------------------------------------------------

--
-- Structure de la table `clients_contractuels`
--

CREATE TABLE `clients_contractuels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `type_contrats` varchar(255) NOT NULL,
  `interventions_par_mois` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients_contractuels`
--

INSERT INTO `clients_contractuels` (`id`, `client`, `telephone`, `email`, `adresse`, `type_contrats`, `interventions_par_mois`, `created_at`, `updated_at`) VALUES
(1, 'DRTV', '+242 22 294 02 65', 'contact@drtv.cg', 'Loandjili', 'maintenance_preventive', 1, '2026-11-15 21:26:07', '2026-11-15 21:26:07'),
(2, 'Télévision Pointe-Noire', '+242 06 000 00 02', 'info@tvpn.cg', 'Rue Mbinda - Camp 31 juillet', 'maintenance_preventive', 1, '2026-11-15 21:26:08', '2026-11-15 21:26:08'),
(3, 'Radio Pointe-Noire', '+242 06 000 00 03', 'radio@rpn.cg', 'Boulevard Charles de Gaulle, Pointe-Noire', 'maintenance_preventive,maintenance_curative', 1, '2026-11-15 21:26:08', '2026-11-15 21:26:08');

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `types_client_id` bigint(20) UNSIGNED NOT NULL,
  `libellé` varchar(255) NOT NULL,
  `durée` varchar(255) NOT NULL,
  `pièces_jointes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `panne` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'en attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `user_id`, `client_id`, `nom_complet`, `telephone`, `email`, `adresse`, `objet`, `panne`, `statut`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'Patrick Mabiala', '060000001', 'patrickmabiala@gmail.com', 'Tié tié', 'panne ordinateur', 'Depuis ce matin, j\'essaie de démarrer mon ordinateur, mais rien ne se passe. Le voyant d\'alimentation ne s\'allume même pas.', 'termine', '2026-11-15 21:35:20', '2026-11-15 22:14:58'),
(2, 8, 2, 'Grâce Ngoma', '056664875', 'Grace@gmail.com', 'Centre_Ville', 'Mon imprimante n\'imprime plus', 'Mon imprimante reçoit les documents, mais aucune impression ne sort. J\'ai essayé de la redémarrer sans succès.', 'termine', '2026-11-15 21:37:23', '2026-11-15 22:30:33'),
(3, 9, 3, 'sara SAMI', '054478552', 'sami@gmail.com', 'Ngoyo', 'Panne réseau', 'Mon ordinateur portable à un problème de réseaux, même quand je mets en mode avion rien et que je redémarre rien ne se passe.', 'en_cours', '2026-11-15 21:38:32', '2026-11-15 22:39:00'),
(4, 10, 4, 'BELINDA Garcia', '045589636', 'belinda@gmail.com', 'Timbamba', 'problème de connexion internet', 'Mon ordinateur est connecté au réseau Wi-Fi, mais je n\'arrive plus à accéder aux sites Internet.', 'termine', '2026-11-15 21:40:38', '2026-11-15 22:22:16'),
(5, 11, 5, 'Veronique', '065239878', 'veronique@gmail.com', 'Loandjili', 'Mon écran affiche des lignes', 'Depuis hier, mon écran affiche des lignes horizontales et l\'image clignote régulièrement.', 'approuve', '2026-11-15 21:41:46', '2026-11-15 22:00:06'),
(6, 12, 6, 'CLAIRE Roncia', '041263350', 'claire@gmail.com', 'Tié-Tié', 'problème de touche clavier', 'Certaines touches de mon clavier ne répondent plus lorsque je les utilise. Cela ralentit mon travail.', 'approuve', '2026-11-15 21:43:24', '2026-11-15 22:00:20'),
(7, 13, 7, 'junior MASSAMBA', '047863211', 'juniormassamba@gmail.com', 'Mpaka', 'problème d\'ordinateur', 'Pendant que je travaille, mon ordinateur s\'éteint sans avertissement, même lorsque la batterie est chargée.', 'approuve', '2026-11-15 21:50:55', '2026-11-15 22:04:25'),
(8, 14, 8, 'audrey MALONGA', '048752636', 'audreymalonga@gmail.com', 'Côte Matève', 'Panne ecran', 'Mon ecran reste noir pendant un long moment', 'en_attente', '2026-11-15 21:52:32', '2026-11-15 21:52:32'),
(9, 15, 9, 'Natacha', '069987411', 'natacha@gmail.com', 'm	Mvou-Mvou', 'Mon écran présente une fissure', 'Mon écran présente un fissure', 'en_attente', '2026-11-15 21:53:47', '2026-11-15 21:53:47'),
(10, 16, 10, 'VALERIA', '056647800', 'valeria@gmail.com', 'Centre_Ville', 'Panne ordinateur', 'L\'écran de mon ordinateur est bleu depuis des jours ça ne s\'allume plus', 'en_attente', '2026-11-15 21:55:21', '2026-11-15 21:55:21');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `demande_id` bigint(20) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `Doit` varchar(255) NOT NULL,
  `Objet` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Montant` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Total_lettres` varchar(255) NOT NULL,
  `statut` enum('Non_facturée','facturée') NOT NULL DEFAULT 'Non_facturée',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `user_id`, `demande_id`, `Date`, `Doit`, `Objet`, `Designation`, `Montant`, `Total`, `Total_lettres`, `statut`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2026-11-19', 'Patrick Mabiala', 'Réparation ordinateur', 'Réparation ordinateur portable, maintenance curative client particulier, désinstallation de logiciels et installattion d\'un antivirus .', '30000 FCFA', '30000', 'Trente mille francs CFA', 'facturée', '2026-11-15 22:14:57', '2026-11-15 22:14:57'),
(2, 3, 4, '2026-11-20', 'BELINDA Garcia', 'Reparation', 'Réparation ordinateur, changement de pièce de port wifi', '25000 FCFA', '25000', 'Vingt-cinq mille francs CFA', 'facturée', '2026-11-15 22:22:16', '2026-11-15 22:22:16'),
(3, 3, 2, '2026-11-19', 'Grâce Ngoma', 'Reparation imprimante', 'Reapration imprimante, nettoyage,soufflage et restockage', '40000', '40000', 'Quarante mille francs CFA', 'facturée', '2026-11-15 22:30:33', '2026-11-15 22:30:33');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiches_accueils`
--

CREATE TABLE `fiches_accueils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `demande_id` bigint(20) UNSIGNED NOT NULL,
  `type_machine` varchar(255) NOT NULL,
  `accessoires` varchar(255) NOT NULL,
  `informations_commerciale` varchar(255) NOT NULL,
  `informations_technicien` varchar(255) DEFAULT NULL,
  `Nom_agent_commercial` varchar(255) DEFAULT NULL,
  `Nom_technicien` varchar(255) DEFAULT NULL,
  `statut` enum('brouillon','completee') NOT NULL DEFAULT 'brouillon',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fiches_accueils`
--

INSERT INTO `fiches_accueils` (`id`, `user_id`, `demande_id`, `type_machine`, `accessoires`, `informations_commerciale`, `informations_technicien`, `Nom_agent_commercial`, `Nom_technicien`, `statut`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Ordinateur HP', 'Neant', 'Le client déclare que son ordinateur portable ne s\'allume pas et que le voyant d\'alimentation ne fonctionne plus.', 'Problème de surchauffe', 'Commercial', 'Technicien', 'completee', '2026-11-15 22:08:30', '2026-11-15 22:09:37'),
(2, 3, 4, 'Ordinateur DELL', 'chargeur', 'Le client dit que il a un problème pour se connecter au réseau wifi', 'Problème de port wifi, dysfonctionnement du port wifi', 'Commercial', 'Technicien', 'completee', '2026-11-15 22:17:44', '2026-11-15 22:18:53'),
(3, 3, 2, 'imprimente', 'Neant', 'Problème d\'impression', 'Saturation d\'encre', 'Commercial', 'Technicien', 'completee', '2026-11-15 22:24:59', '2026-11-15 22:34:36'),
(4, 3, 3, 'Ordinateur Lenovo', 'chargeur', 'Le client dit avoir un problème de réseaux avec son ordinateur', 'Problème de chauffage et de surplus d\'onglet', 'Commercial', 'Technicien', 'completee', '2026-11-15 22:33:21', '2026-11-15 22:35:15');

-- --------------------------------------------------------

--
-- Structure de la table `fiches_interventions`
--

CREATE TABLE `fiches_interventions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `demande_id` bigint(20) UNSIGNED NOT NULL,
  `date_arrivee` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `motif_intervention` varchar(255) DEFAULT NULL,
  `Technicien_Nom` varchar(255) DEFAULT NULL,
  `Compte_rendues_Intervention` varchar(255) DEFAULT NULL,
  `Proposition_Montant` varchar(255) DEFAULT NULL,
  `statut` enum('en_cours','completee') NOT NULL DEFAULT 'en_cours',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fiches_interventions`
--

INSERT INTO `fiches_interventions` (`id`, `user_id`, `demande_id`, `date_arrivee`, `date_sortie`, `motif_intervention`, `Technicien_Nom`, `Compte_rendues_Intervention`, `Proposition_Montant`, `statut`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2026-11-16', '2026-11-18', 'Reparation ordinateur', 'NDONDELET BAYAMBIDIKA Armel Fabrice', 'Refroidissement du disque dure, désinstallation des logiciels lourds, installation anti virus.', '30000 FCFA', 'completee', '2026-11-15 22:11:38', '2026-11-15 22:11:38'),
(2, 4, 4, '2026-11-16', '2026-11-18', 'Réparation ordinateur', 'AKOUALA ANGHA Hermann Recherchey', 'Changement de pièce et installation', '25000 FCFA', 'completee', '2026-11-15 22:20:53', '2026-11-15 22:20:53'),
(3, 4, 2, '2026-11-17', '2026-11-22', 'Réparation imprimante', 'OTTO NGOUEM\'BONZE Chancel Juscard', 'Remplacement de pièce, nettoyage et souflage', '40000', 'completee', '2026-11-15 22:28:30', '2026-11-15 22:28:30'),
(4, 4, 3, '2026-11-20', '2026-11-22', 'reparation ordinateur , problème d\'intervention', 'BELIMBA Marck Gabrielle', 'Amelioration et installation', '50000', 'completee', '2026-11-15 22:39:00', '2026-11-15 22:39:00');

-- --------------------------------------------------------

--
-- Structure de la table `fiches_interventions_clients_entreprises`
--

CREATE TABLE `fiches_interventions_clients_entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_contractuel_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `direction` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `date_service` date NOT NULL,
  `heure` time NOT NULL,
  `motif_demandeur` text NOT NULL,
  `intervenants` text NOT NULL,
  `compte_rendu_intervention` text NOT NULL,
  `observation_agent` text NOT NULL,
  `observation_service` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `contenu` text NOT NULL,
  `deleted_by_sender_at` timestamp NULL DEFAULT NULL,
  `deleted_by_receiver_at` timestamp NULL DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_02_075243_add_two_factor_columns_to_users_table', 1),
(5, '2025_11_06_155429_create_contrats_table', 1),
(6, '2025_11_06_155429create_clients_contractuels_table', 1),
(7, '2025_11_06_155430_create_planning_table', 1),
(8, '2025_11_06_155522_create_services_table', 1),
(9, '2025_11_06_155552_create_sections_table', 1),
(10, '2025_11_11_113835_add_services', 1),
(11, '2025_11_11_115254_add_sections', 1),
(12, '2025_11_23_163305_create_permission_tables', 1),
(13, '2025_12_09_074855_create_clients_table', 1),
(14, '2025_12_09_074856_create_demandes_table', 1),
(15, '2025_12_09_074857_create_fiches_accueils_table', 1),
(16, '2025_12_09_074858_create_fiche_interventions_table', 1),
(17, '2025_12_09_074859__create_fiches_interventions_clients_entreprises_table', 1),
(18, '2025_12_09_074900_create_factures_table', 1),
(19, '2025_12_14_160746_create_personal_access_tokens_table', 1),
(20, '2025_12_14_163912_add_role_to_users_table', 1),
(21, '2026_01_25_220022_add_phone_to_users_table', 1),
(22, '2026_03_16_135706_create_notifications_table', 1),
(23, '2026_05_02_203653_create_messages_table', 1),
(24, '2026_05_28_000000_add_password_setup_token_to_users', 1),
(25, '2026_05_28_000001_create_sms_logs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('010d882e-c60e-408f-ad1d-fa50ec917652', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":6,\"nom_complet\":\"CLAIRE Roncia\",\"objet\":\"probl\\u00e8me de touche clavier\",\"message\":\"Nouvelle demande de maintenance soumise par CLAIRE Roncia.\"}', '2026-11-15 21:57:07', '2026-11-15 21:43:24', '2026-11-15 21:57:07'),
('16c8fd4f-11d8-4e07-87f6-f3962af0cd31', 'App\\Notifications\\FicheAccueilTechnicienNotification', 'App\\Models\\User', 4, '{\"message\":\"Fiche d\'accueil du client sara SAMI, veuillez la compl\\u00e9ter d\\u00e8s que possible.\",\"fiche_id\":4,\"demande_id\":3,\"type\":\"fiche_accueil_a_completer\"}', NULL, '2026-11-15 22:33:21', '2026-11-15 22:33:21'),
('1a6b8eb4-12a3-4eed-81cd-64f55b5ca5bc', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":7,\"nom_complet\":\"junior MASSAMBA\",\"objet\":\"probl\\u00e8me d\'ordinateur\",\"message\":\"Demande de maintenance soumise par junior MASSAMBA.\"}', NULL, '2026-11-15 21:50:55', '2026-11-15 21:50:55'),
('2d96d71a-af2f-4cce-b9a4-200cae3bf11a', 'App\\Notifications\\FicheAccueilCommercialeNotification', 'App\\Models\\User', 3, '{\"message\":\"La fiche d\'accueil du client BELINDA Garcia a \\u00e9t\\u00e9 compl\\u00e9t\\u00e9e par le technicien.\",\"fiche_id\":2,\"demande_id\":4,\"type\":\"fiche_accueil_completee\"}', '2026-11-15 22:29:42', '2026-11-15 22:18:53', '2026-11-15 22:29:42'),
('2ff3a1d7-5748-428b-be37-e02dd1004bbb', 'App\\Notifications\\FicheInterventionEmiseNotification', 'App\\Models\\User', 3, '{\"type\":\"fiche_intervention_emise\",\"demande_id\":4,\"nom_complet\":\"BELINDA Garcia\",\"message\":\"La fiche d\'intervention du client BELINDA Garcia est pr\\u00eate, vous pouvez \\u00e9tablir la facture.\"}', '2026-11-15 22:29:42', '2026-11-15 22:20:53', '2026-11-15 22:29:42'),
('36a3bc50-afd1-40a4-adde-d6ba22ca9819', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":2,\"nom_complet\":\"Gr\\u00e2ce Ngoma\",\"objet\":\"Mon imprimante n\'imprime plus\",\"message\":\"Demande de maintenance soumise par Gr\\u00e2ce Ngoma.\"}', NULL, '2026-11-15 21:37:23', '2026-11-15 21:37:23'),
('3764edf1-ff1e-49a5-81c4-a9a53313735a', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 8, '{\"message\":\"Votre demande de maintenance a \\u00e9t\\u00e9 approuv\\u00e9e.\\nLes frais de diagnostic sont de 5 000 FCFA. Merci de venir \\u00e0 l\'ACSI avec votre appareil.\",\"type\":\"succes\"}', NULL, '2026-11-15 21:59:18', '2026-11-15 21:59:18'),
('381686b2-3dad-48e0-951f-2bb620c8f2a5', 'App\\Notifications\\FicheAccueilTechnicienNotification', 'App\\Models\\User', 4, '{\"message\":\"Fiche d\'accueil du client Gr\\u00e2ce Ngoma, veuillez la compl\\u00e9ter d\\u00e8s que possible.\",\"fiche_id\":3,\"demande_id\":2,\"type\":\"fiche_accueil_a_completer\"}', NULL, '2026-11-15 22:25:00', '2026-11-15 22:25:00'),
('4414e88b-a9cf-467c-92c6-904d212f997d', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":9,\"nom_complet\":\"Natacha\",\"objet\":\"Mon \\u00e9cran pr\\u00e9sente une fissure\",\"message\":\"Demande de maintenance soumise par Natacha.\"}', NULL, '2026-11-15 21:53:47', '2026-11-15 21:53:47'),
('4aa7163b-8600-4bfd-b73d-a8406ca3b04d', 'App\\Notifications\\FicheInterventionEmiseNotification', 'App\\Models\\User', 3, '{\"type\":\"fiche_intervention_emise\",\"demande_id\":2,\"nom_complet\":\"Gr\\u00e2ce Ngoma\",\"message\":\"La fiche d\'intervention du client Gr\\u00e2ce Ngoma est pr\\u00eate, vous pouvez \\u00e9tablir la facture.\"}', '2026-11-15 22:29:42', '2026-11-15 22:28:30', '2026-11-15 22:29:42'),
('4c227e3e-4e98-4d6d-ad4f-c41b5c1bd3fe', 'App\\Notifications\\FicheInterventionEmiseNotification', 'App\\Models\\User', 3, '{\"type\":\"fiche_intervention_emise\",\"demande_id\":1,\"nom_complet\":\"Patrick Mabiala\",\"message\":\"La fiche d\'intervention du client Patrick Mabiala est pr\\u00eate, vous pouvez \\u00e9tablir la facture.\"}', '2026-11-15 22:29:43', '2026-11-15 22:11:38', '2026-11-15 22:29:43'),
('4d6af17a-b79d-4198-9001-ec2ffd9f9437', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":3,\"nom_complet\":\"sara SAMI\",\"objet\":\"Panne r\\u00e9seau\",\"message\":\"Demande de maintenance soumise par sara SAMI.\"}', NULL, '2026-11-15 21:38:32', '2026-11-15 21:38:32'),
('4df53249-32c1-49c2-816a-aeeae416f1b9', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":2,\"nom_complet\":\"Gr\\u00e2ce Ngoma\",\"objet\":\"Mon imprimante n\'imprime plus\",\"message\":\"Nouvelle demande de maintenance soumise par Gr\\u00e2ce Ngoma.\"}', '2026-11-15 21:57:07', '2026-11-15 21:37:23', '2026-11-15 21:57:07'),
('4f9379d5-b879-4718-93df-6cf51848825d', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 8, '{\"message\":\"Votre mat\\u00e9riel a \\u00e9t\\u00e9 r\\u00e9par\\u00e9 et votre facture a \\u00e9t\\u00e9 \\u00e9mise. Veuillez vous rapprocher de l\'ACSI pour le paiement et la r\\u00e9cup\\u00e9ration de votre mat\\u00e9riel.\",\"type\":\"facture\"}', NULL, '2026-11-15 22:30:33', '2026-11-15 22:30:33'),
('51725147-4653-498e-b3fc-f034da0c08f1', 'App\\Notifications\\NouvelleFactureRecue', 'App\\Models\\User', 5, '{\"facture_id\":3,\"client\":\"Gr\\u00e2ce Ngoma\",\"montant\":40000,\"message\":\"Nouvelle facture re\\u00e7ue de Gr\\u00e2ce Ngoma\"}', NULL, '2026-11-15 22:30:33', '2026-11-15 22:30:33'),
('58a2b45e-72ed-4816-9b74-21934eeea22e', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 10, '{\"message\":\"Votre demande de maintenance a \\u00e9t\\u00e9 approuv\\u00e9e.\\nLes frais de diagnostic sont de 5 000 FCFA. Merci de venir \\u00e0 l\'ACSI avec votre appareil.\",\"type\":\"succes\"}', NULL, '2026-11-15 21:59:57', '2026-11-15 21:59:57'),
('5bfe3970-5dde-4414-96c0-cfe32c7b33f1', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":4,\"nom_complet\":\"BELINDA Garcia\",\"objet\":\"probl\\u00e8me de connexion internet\",\"message\":\"Demande de maintenance soumise par BELINDA Garcia.\"}', NULL, '2026-11-15 21:40:38', '2026-11-15 21:40:38'),
('61d76079-8dfd-48af-8e90-d9220bb96a28', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":3,\"nom_complet\":\"sara SAMI\",\"objet\":\"Panne r\\u00e9seau\",\"message\":\"Nouvelle demande de maintenance soumise par sara SAMI.\"}', '2026-11-15 21:57:07', '2026-11-15 21:38:32', '2026-11-15 21:57:07'),
('6447729f-814d-46e0-a9cb-321d86ad79e2', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 10, '{\"message\":\"Votre mat\\u00e9riel a \\u00e9t\\u00e9 r\\u00e9par\\u00e9 et votre facture a \\u00e9t\\u00e9 \\u00e9mise. Veuillez vous rapprocher de l\'ACSI pour le paiement et la r\\u00e9cup\\u00e9ration de votre mat\\u00e9riel.\",\"type\":\"facture\"}', NULL, '2026-11-15 22:22:16', '2026-11-15 22:22:16'),
('702eda38-0b6b-4cc7-91e7-871a4cfeab5e', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 13, '{\"message\":\"Votre demande de maintenance a \\u00e9t\\u00e9 approuv\\u00e9e.\\nLes frais de diagnostic sont de 5 000 FCFA. Merci de venir \\u00e0 l\'ACSI avec votre appareil.\",\"type\":\"succes\"}', NULL, '2026-11-15 22:04:31', '2026-11-15 22:04:31'),
('70c86052-e143-4b92-b7ba-c7da43f89a7e', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 7, '{\"message\":\"Votre mat\\u00e9riel a \\u00e9t\\u00e9 r\\u00e9par\\u00e9 et votre facture a \\u00e9t\\u00e9 \\u00e9mise. Veuillez vous rapprocher de l\'ACSI pour le paiement et la r\\u00e9cup\\u00e9ration de votre mat\\u00e9riel.\",\"type\":\"facture\"}', NULL, '2026-11-15 22:14:58', '2026-11-15 22:14:58'),
('8405808a-9603-42a7-aca3-f8cca067c695', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":8,\"nom_complet\":\"audrey MALONGA\",\"objet\":\"Panne ecran\",\"message\":\"Nouvelle demande de maintenance soumise par audrey MALONGA.\"}', '2026-11-15 21:57:07', '2026-11-15 21:52:33', '2026-11-15 21:57:07'),
('895c0ac9-8c2f-429f-96ec-3dbccf0c081a', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 12, '{\"message\":\"Votre demande de maintenance a \\u00e9t\\u00e9 approuv\\u00e9e.\\nLes frais de diagnostic sont de 5 000 FCFA. Merci de venir \\u00e0 l\'ACSI avec votre appareil.\",\"type\":\"succes\"}', NULL, '2026-11-15 22:00:25', '2026-11-15 22:00:25'),
('8c63da9d-6f49-4471-8144-500e22882f0b', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":10,\"nom_complet\":\"VALERIA\",\"objet\":\"Panne ordinateur\",\"message\":\"Demande de maintenance soumise par VALERIA.\"}', NULL, '2026-11-15 21:55:21', '2026-11-15 21:55:21'),
('9a74abfc-3492-4c95-a0e3-641cc6e2aafd', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":10,\"nom_complet\":\"VALERIA\",\"objet\":\"Panne ordinateur\",\"message\":\"Nouvelle demande de maintenance soumise par VALERIA.\"}', '2026-11-15 21:57:07', '2026-11-15 21:55:21', '2026-11-15 21:57:07'),
('9c26a998-4a5d-4079-bc82-7e372aa0793a', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":1,\"nom_complet\":\"Patrick Mabiala\",\"objet\":\"panne ordinateur\",\"message\":\"Demande de maintenance soumise par Patrick Mabiala.\"}', NULL, '2026-11-15 21:35:21', '2026-11-15 21:35:21'),
('9e016787-02d3-47e5-8b99-5ac1c61f9ce4', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":8,\"nom_complet\":\"audrey MALONGA\",\"objet\":\"Panne ecran\",\"message\":\"Demande de maintenance soumise par audrey MALONGA.\"}', NULL, '2026-11-15 21:52:33', '2026-11-15 21:52:33'),
('a19e4cfd-2c5d-44fb-a18f-9ea63d8cc9f4', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 9, '{\"message\":\"Votre demande de maintenance a \\u00e9t\\u00e9 approuv\\u00e9e.\\nLes frais de diagnostic sont de 5 000 FCFA. Merci de venir \\u00e0 l\'ACSI avec votre appareil.\",\"type\":\"succes\"}', NULL, '2026-11-15 21:59:35', '2026-11-15 21:59:35'),
('a7097966-215e-4152-bc63-51e53602f462', 'App\\Notifications\\FicheAccueilCommercialeNotification', 'App\\Models\\User', 3, '{\"message\":\"La fiche d\'accueil du client Patrick Mabiala a \\u00e9t\\u00e9 compl\\u00e9t\\u00e9e par le technicien.\",\"fiche_id\":1,\"demande_id\":1,\"type\":\"fiche_accueil_completee\"}', '2026-11-15 22:29:44', '2026-11-15 22:09:38', '2026-11-15 22:29:44'),
('aadc4904-157d-458b-99cc-6809f29b31ab', 'App\\Notifications\\FicheAccueilTechnicienNotification', 'App\\Models\\User', 4, '{\"message\":\"Fiche d\'accueil du client BELINDA Garcia, veuillez la compl\\u00e9ter d\\u00e8s que possible.\",\"fiche_id\":2,\"demande_id\":4,\"type\":\"fiche_accueil_a_completer\"}', NULL, '2026-11-15 22:17:45', '2026-11-15 22:17:45'),
('beced90b-42bc-4b8c-b3e4-75cccb9b7e68', 'App\\Notifications\\FicheInterventionEmiseNotification', 'App\\Models\\User', 3, '{\"type\":\"fiche_intervention_emise\",\"demande_id\":3,\"nom_complet\":\"sara SAMI\",\"message\":\"La fiche d\'intervention du client sara SAMI est pr\\u00eate, vous pouvez \\u00e9tablir la facture.\"}', NULL, '2026-11-15 22:39:01', '2026-11-15 22:39:01'),
('bf8e7bc9-db00-477c-912a-75b2856cfd25', 'App\\Notifications\\NouvelleFactureRecue', 'App\\Models\\User', 5, '{\"facture_id\":1,\"client\":\"Patrick Mabiala\",\"montant\":30000,\"message\":\"Nouvelle facture re\\u00e7ue de Patrick Mabiala\"}', NULL, '2026-11-15 22:14:58', '2026-11-15 22:14:58'),
('d34a10e0-d830-4376-be29-eb656c984441', 'App\\Notifications\\FicheAccueilCommercialeNotification', 'App\\Models\\User', 3, '{\"message\":\"La fiche d\'accueil du client Gr\\u00e2ce Ngoma a \\u00e9t\\u00e9 compl\\u00e9t\\u00e9e par le technicien.\",\"fiche_id\":3,\"demande_id\":2,\"type\":\"fiche_accueil_completee\"}', NULL, '2026-11-15 22:34:36', '2026-11-15 22:34:36'),
('d60f6232-330a-411a-bbbb-d2f159621ee1', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 7, '{\"message\":\"Votre demande de maintenance a \\u00e9t\\u00e9 approuv\\u00e9e.\\nLes frais de diagnostic sont de 5 000 FCFA. Merci de venir \\u00e0 l\'ACSI avec votre appareil.\",\"type\":\"succes\"}', NULL, '2026-11-15 21:57:39', '2026-11-15 21:57:39'),
('d92af119-83f8-434e-ab2d-f532836331e3', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":4,\"nom_complet\":\"BELINDA Garcia\",\"objet\":\"probl\\u00e8me de connexion internet\",\"message\":\"Nouvelle demande de maintenance soumise par BELINDA Garcia.\"}', '2026-11-15 21:57:07', '2026-11-15 21:40:38', '2026-11-15 21:57:07'),
('dd6e4e6d-7ad1-430e-bbb6-577197c01e6d', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":1,\"nom_complet\":\"Patrick Mabiala\",\"objet\":\"panne ordinateur\",\"message\":\"Nouvelle demande de maintenance soumise par Patrick Mabiala.\"}', '2026-11-15 21:57:07', '2026-11-15 21:35:21', '2026-11-15 21:57:07'),
('de253fdf-ca76-45af-81d8-ef80c19a8981', 'App\\Notifications\\FicheAccueilTechnicienNotification', 'App\\Models\\User', 4, '{\"message\":\"Fiche d\'accueil du client Patrick Mabiala, veuillez la compl\\u00e9ter d\\u00e8s que possible.\",\"fiche_id\":1,\"demande_id\":1,\"type\":\"fiche_accueil_a_completer\"}', '2026-11-15 22:10:03', '2026-11-15 22:08:30', '2026-11-15 22:10:03'),
('df129227-6437-44e7-af9c-65112e46dc33', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":5,\"nom_complet\":\"Veronique\",\"objet\":\"Mon \\u00e9cran affiche des lignes\",\"message\":\"Nouvelle demande de maintenance soumise par Veronique.\"}', '2026-11-15 21:57:07', '2026-11-15 21:41:46', '2026-11-15 21:57:07'),
('df13a713-3afb-461f-a03d-cbcad8eeb324', 'App\\Notifications\\NouvelleFactureRecue', 'App\\Models\\User', 5, '{\"facture_id\":2,\"client\":\"BELINDA Garcia\",\"montant\":25000,\"message\":\"Nouvelle facture re\\u00e7ue de BELINDA Garcia\"}', NULL, '2026-11-15 22:22:16', '2026-11-15 22:22:16'),
('e5cbecab-ab80-4815-a6ef-7b13cfd71a94', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":9,\"nom_complet\":\"Natacha\",\"objet\":\"Mon \\u00e9cran pr\\u00e9sente une fissure\",\"message\":\"Nouvelle demande de maintenance soumise par Natacha.\"}', '2026-11-15 21:57:07', '2026-11-15 21:53:48', '2026-11-15 21:57:07'),
('e6304c49-d13d-4d3b-8f6c-86913313691d', 'App\\Notifications\\FicheAccueilCommercialeNotification', 'App\\Models\\User', 3, '{\"message\":\"La fiche d\'accueil du client sara SAMI a \\u00e9t\\u00e9 compl\\u00e9t\\u00e9e par le technicien.\",\"fiche_id\":4,\"demande_id\":3,\"type\":\"fiche_accueil_completee\"}', NULL, '2026-11-15 22:35:15', '2026-11-15 22:35:15'),
('ea342be8-b854-4815-94b8-ff0c353a1b12', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":6,\"nom_complet\":\"CLAIRE Roncia\",\"objet\":\"probl\\u00e8me de touche clavier\",\"message\":\"Demande de maintenance soumise par CLAIRE Roncia.\"}', NULL, '2026-11-15 21:43:24', '2026-11-15 21:43:24'),
('eb2994fc-9150-45f9-9cc4-d3ec60633575', 'App\\Notifications\\MaintenanceNotification', 'App\\Models\\User', 1, '{\"demande_id\":5,\"nom_complet\":\"Veronique\",\"objet\":\"Mon \\u00e9cran affiche des lignes\",\"message\":\"Demande de maintenance soumise par Veronique.\"}', NULL, '2026-11-15 21:41:46', '2026-11-15 21:41:46'),
('f26b2b20-b136-483f-a15b-950dc340fc81', 'App\\Notifications\\ClientNotification', 'App\\Models\\User', 11, '{\"message\":\"Votre demande de maintenance a \\u00e9t\\u00e9 approuv\\u00e9e.\\nLes frais de diagnostic sont de 5 000 FCFA. Merci de venir \\u00e0 l\'ACSI avec votre appareil.\",\"type\":\"succes\"}', NULL, '2026-11-15 22:00:11', '2026-11-15 22:00:11'),
('ffaed8cc-7463-4674-a399-145a7c492c5d', 'App\\Notifications\\CommercialeNotification', 'App\\Models\\User', 3, '{\"demande_id\":7,\"nom_complet\":\"junior MASSAMBA\",\"objet\":\"probl\\u00e8me d\'ordinateur\",\"message\":\"Nouvelle demande de maintenance soumise par junior MASSAMBA.\"}', '2026-11-15 21:57:07', '2026-11-15 21:50:55', '2026-11-15 21:57:07');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'voir_admin_Dashboard', 'web', '2026-11-15 21:26:01', '2026-11-15 21:26:01'),
(2, 'ajouter_utilisateur', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(3, 'supprimer_utilisateur', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(4, 'modifier_utilisateur', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(5, 'voir_client', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(6, 'ajouter_client', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(7, 'supprimer_client', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(8, 'modifier_client', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(9, 'voir_demande', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(10, 'envoyer_demande', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(11, 'modifier_demande', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(12, 'supprimer_demande', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(13, 'voir fiche_accueil', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(14, 'voir fiche_intervention', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(15, 'voir facture', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(16, 'voir_Dashboard_client', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(17, 'soumettre_demande', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(18, 'suivre_statut_demande', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(19, 'voir_notification', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(20, 'Voir_commerciale_Dashboard', 'web', '2026-11-15 21:26:02', '2026-11-15 21:26:02'),
(21, 'consulter_demande', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(22, 'remplir_fiche_accueil', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(23, 'modifier_fiche_accueil', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(24, 'envoyer_fiche_accueil', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(25, 'voir_fiche_intervention', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(26, 'remplir_fiche_intervention', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(27, 'remplir_facture', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(28, 'Voir_technicien_dashboard', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(29, 'envoyer_fiche_intervention', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(30, 'modifier_fiche_intervention', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(31, 'voir_recouvrement_dashboard', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(32, 'consulter_facture', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(33, 'Voir_Dashboard_client_contrat', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(34, 'consulter_contrat', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03'),
(35, 'voir_planning_intervention', 'web', '2026-11-15 21:26:03', '2026-11-15 21:26:03');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plannings`
--

CREATE TABLE `plannings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_contractuel_id` bigint(20) UNSIGNED NOT NULL,
  `mois_debut` varchar(255) NOT NULL,
  `mois_fin` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `activite` text NOT NULL,
  `heure` time NOT NULL,
  `equipe` varchar(255) NOT NULL,
  `observation` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrateur', 'web', '2026-11-15 21:26:01', '2026-11-15 21:26:01'),
(2, 'client', 'web', '2026-11-15 21:26:01', '2026-11-15 21:26:01'),
(3, 'commerciale', 'web', '2026-11-15 21:26:01', '2026-11-15 21:26:01'),
(4, 'technicien', 'web', '2026-11-15 21:26:01', '2026-11-15 21:26:01'),
(5, 'recouvrement', 'web', '2026-11-15 21:26:01', '2026-11-15 21:26:01'),
(6, 'Client_Contrat', 'web', '2026-11-15 21:26:01', '2026-11-15 21:26:01');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 3),
(21, 3),
(22, 3),
(22, 4),
(23, 3),
(24, 3),
(24, 4),
(25, 3),
(26, 3),
(26, 4),
(27, 3),
(28, 4),
(29, 4),
(30, 4),
(31, 5),
(32, 5),
(33, 6),
(34, 6),
(35, 6);

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libellé` varchar(255) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libellé` varchar(255) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kqiaHs1YZqxhOYospSyFPYkk25kya2iP9FCoCPpo', 13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVEs2NGZYa2F4MDNQY0txeHkwdHp2cFVjTHI5VmNqeVNTeFlzYzU5MCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbGllbnQvbWVzc2FnZSI7czo1OiJyb3V0ZSI7czoxNDoiY2xpZW50Lm1lc3NhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMzt9', 1794783903),
('nNYxLnQXy2GYs3jf0BPV9qPePkC2RNULZSa3FlO3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWFsOVRKMUswWW9tVjliZnlhS1lPQVowYVRzWnRXa2d3MnJoZTBpNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1794786850),
('U8g770UQvGB2x5BNVLmWxcWoYeTmDo7msk8ooH3Z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSURrSXRKZFhNMlp3ZHp4Y0Rla2lla2wwdWtCVEdndWFXOXZtWlZoWiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NvbW1lcmNpYWwvbWVzc2FnZS9wb2xsP2NsaWVudF9pZD0yIjt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1794781678);

-- --------------------------------------------------------

--
-- Structure de la table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'sent',
  `provider` varchar(255) NOT NULL DEFAULT 'local',
  `response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`response`)),
  `sent_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sms_logs`
--

INSERT INTO `sms_logs` (`id`, `to`, `message`, `status`, `provider`, `response`, `sent_at`, `created_at`, `updated_at`) VALUES
(1, '+242060000001', 'Bonjour Patrick Mabiala, votre demande de maintenance a été approuvée. Veuillez définir votre mot de passe via ce lien : http://127.0.0.1:8000/password-setup/7?expires=1794869852&token=ErlFCe8S1MzWCWYzMZvmI58xcbPvdPdCLyBAZl3k5Q3jV5JOuCcMFFpzKJqW1Vb0&signature=2e4b51fee95c7b69233c7f90e0f0329153f4ca36a5a32e39510051d73929acfb', 'sent', 'local', NULL, '2026-11-15 21:57:39', '2026-11-15 21:57:39', '2026-11-15 21:57:39'),
(2, '+242056664875', 'Bonjour Grâce Ngoma, votre demande de maintenance a été approuvée. Veuillez définir votre mot de passe via ce lien : http://127.0.0.1:8000/password-setup/8?expires=1794869954&token=CA9Kh9DA3UxIyh2dL70B2Jf47U9e49KNyQ9YF5ZOv0yUQZBdM5m8bo4HBR3Mlgt1&signature=d6c2f9286e00e54fb938c9c3b335b863d57ebaa1df21c6fce0455d5593ea5c11', 'sent', 'local', NULL, '2026-11-15 21:59:17', '2026-11-15 21:59:17', '2026-11-15 21:59:17'),
(3, '+242054478552', 'Bonjour sara SAMI, votre demande de maintenance a été approuvée. Veuillez définir votre mot de passe via ce lien : http://127.0.0.1:8000/password-setup/9?expires=1794869970&token=wzOdCiaRSToEyHpNUOWHGrT6McMigCIHj4ixuT8tmh7UACWwqVHSUdN0Kmpc0Yqn&signature=4dd55a30e5a116b48117409c5b3ad8e79c638990cf02bc3db86a6450d2285487', 'sent', 'local', NULL, '2026-11-15 21:59:35', '2026-11-15 21:59:35', '2026-11-15 21:59:35'),
(4, '+242045589636', 'Bonjour BELINDA Garcia, votre demande de maintenance a été approuvée. Veuillez définir votre mot de passe via ce lien : http://127.0.0.1:8000/password-setup/10?expires=1794869992&token=TwVwEOeYonnKMmXzseDKQnOFrSe3Z4SE6640TfkSplgfDSMtwxS7MERhrprxY3Aq&signature=01005e50c7704d315b57b14bcae6a2fbfa6705c2ac5aeeac80a49be012a020f4', 'sent', 'local', NULL, '2026-11-15 21:59:57', '2026-11-15 21:59:57', '2026-11-15 21:59:57'),
(5, '+242065239878', 'Bonjour Veronique, votre demande de maintenance a été approuvée. Veuillez définir votre mot de passe via ce lien : http://127.0.0.1:8000/password-setup/11?expires=1794870007&token=pAHM0DTLzcjr47A8bwa0n9Do5UKiXNEiianbX9faCkW0a58YSiFVop3Njtb5n6IA&signature=455aaa00317fd3f3fc13117b2824826b6f492f6384dd5419349e20621cc34420', 'sent', 'local', NULL, '2026-11-15 22:00:10', '2026-11-15 22:00:10', '2026-11-15 22:00:10'),
(6, '+242041263350', 'Bonjour CLAIRE Roncia, votre demande de maintenance a été approuvée. Veuillez définir votre mot de passe via ce lien : http://127.0.0.1:8000/password-setup/12?expires=1794870020&token=jjrcWHE1TcWmk1dU7hxGoMsscek4iPrmpjGhdzGESZAFmWZIglPKI1owa2fhyY5T&signature=aee95b67a6cc6e44ad8d3cbc0cb9afbe34b0171244a4c4ac940bece2922ad8fb', 'sent', 'local', NULL, '2026-11-15 22:00:25', '2026-11-15 22:00:25', '2026-11-15 22:00:25'),
(7, '+242047863211', 'Bonjour junior MASSAMBA, votre demande de maintenance a été approuvée. Veuillez définir votre mot de passe via ce lien : http://127.0.0.1:8000/password-setup/13?expires=1794870265&token=04vkjsZgObXtFutjIpbPVB8oZAsRGQlizt2AvIV2CPy9Dx0RMUgByfKN0l3dHUPD&signature=c0634a0143acf50ce930333bd86ec7271abee4ff48eee33648f771ac422104b1', 'sent', 'local', NULL, '2026-11-15 22:04:31', '2026-11-15 22:04:31', '2026-11-15 22:04:31');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `password_setup_token` varchar(255) DEFAULT NULL,
  `password_setup_sent_at` timestamp NULL DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `password_setup_token`, `password_setup_sent_at`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', 'admin@maintenance.local', '054758614', '2026-11-15 21:26:05', '$2y$12$36WASxGwXN1vwDjfIOYehe7YSrgfpaPi1007a6ZJ9n5YDv4yFeqG2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:26:05', '2026-11-15 21:26:05'),
(2, 'Client ', 'client@maintenance.local', '064712258', '2026-11-15 21:26:05', '$2y$12$U7D6Rxv5hhUgUD/zfr29q.X5T8IT9YRgosCAHNyfzTpnLlntTUdjK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:26:05', '2026-11-15 21:26:05'),
(3, 'Commercial', 'commercial@maintenance.local', '055846215', '2026-11-15 21:26:06', '$2y$12$LWGYRuDsLDTWJai.2NFWtu5M5MXJqS7JU4dAPbJol9ZNBaUS7LSva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:26:06', '2026-11-15 21:26:06'),
(4, 'Technicien', 'technicien@maintenance.local', '043302128', '2026-11-15 21:26:06', '$2y$12$CfJakBMO3R4MjefMmw0yQu2EsBfL5lMMJiAW56z8uyP9TIenCtAfS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:26:06', '2026-11-15 21:26:06'),
(5, 'Recouvrement', 'recouvrement@maintenance.local', '041478233', '2026-11-15 21:26:07', '$2y$12$nfe5bCSOLmN7x6Tv9oJT1.BkYYPaA6K8f0nENS9hUYACX4gwPJNvu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:26:07', '2026-11-15 21:26:07'),
(6, 'Client Contrat', 'clientcontrat@maintenance.local', '062214582', '2026-11-15 21:26:07', '$2y$12$EU4x4Kjr1dF65fH7D4q4LOMh29y7zwAG3x2ukD0CgmIRbFnd1ALMe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:26:07', '2026-11-15 21:26:07'),
(7, 'Patrick Mabiala', 'patrickmabiala@gmail.com', '060000001', NULL, '$2y$12$/euvk9d1FWWT65PK7gacqeNMZf3rIK6ZWUo53Gd45od3tHm9bfNqq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:35:20', '2026-11-15 21:58:22'),
(8, 'Grâce Ngoma', 'Grace@gmail.com', '056664875', NULL, '$2y$12$nVx91Pr7uiASqMBd4lU2yuuUJLAPU0hr.3fcj7tHV/ZutmY5ajssO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:37:23', '2026-11-15 22:01:19'),
(9, 'sara SAMI', 'sami@gmail.com', '054478552', NULL, '$2y$12$.ZbXXJ.o5y.Owb.L9TkW2emaaf08hfmeVRgnqx7O2Wt4D46CTmJ0m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:38:32', '2026-11-15 22:01:44'),
(10, 'BELINDA Garcia', 'belinda@gmail.com', '045589636', NULL, '$2y$12$f7Yk6g/w1MGl1avHBW5HseyTK/2XHWKsE2izKD7m1Yb45VKdbqi/W', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:40:38', '2026-11-15 22:02:11'),
(11, 'Veronique', 'veronique@gmail.com', '065239878', NULL, '$2y$12$3k4n/a8OVRzjhgM3pO48K.UrT7dPcqQRNxBOOmZSdz1HfkO5.PIoS', NULL, NULL, NULL, NULL, 'pAHM0DTLzcjr47A8bwa0n9Do5UKiXNEiianbX9faCkW0a58YSiFVop3Njtb5n6IA', '2026-11-15 22:00:07', NULL, NULL, '2026-11-15 21:41:46', '2026-11-15 22:00:07'),
(12, 'CLAIRE Roncia', 'claire@gmail.com', '041263350', NULL, '$2y$12$jy27YYNtvbZ/pbdcIamVFeF8fDXF4DVewx9m37yS9PfM7sRe6koiu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:43:24', '2026-11-15 22:02:34'),
(13, 'junior MASSAMBA', 'juniormassamba@gmail.com', '047863211', NULL, '$2y$12$K3tjTeYSd3LdI9iuVsQWzeyffJf2QJlOxFhRXoXKNKZ3Y6/jyLL4a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:50:55', '2026-11-15 22:04:57'),
(14, 'audrey MALONGA', 'audreymalonga@gmail.com', '048752636', NULL, '$2y$12$BxgvPGWCvNLX1KabHHdYoefDZtfbCq3JskOG4FzMr/f.2/1aTKU9S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:52:32', '2026-11-15 21:52:32'),
(15, 'Natacha', 'natacha@gmail.com', '069987411', NULL, '$2y$12$UOmAXmSGv3QSDTtlO2fFluZNGnLJWCxpVVYSVKwbGIklgXhe3.m/K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:53:47', '2026-11-15 21:53:47'),
(16, 'VALERIA', 'valeria@gmail.com', '056647800', NULL, '$2y$12$EyfDzM3QxufidlM7GhKC7eX6CNq0i7MnfLT54sKYvvUyNgK9m6QXS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-15 21:55:21', '2026-11-15 21:55:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Index pour la table `clients_contractuels`
--
ALTER TABLE `clients_contractuels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrats_user_id_foreign` (`user_id`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demandes_user_id_foreign` (`user_id`),
  ADD KEY `demandes_client_id_foreign` (`client_id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factures_user_id_foreign` (`user_id`),
  ADD KEY `factures_demande_id_foreign` (`demande_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fiches_accueils`
--
ALTER TABLE `fiches_accueils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiches_accueils_user_id_foreign` (`user_id`),
  ADD KEY `fiches_accueils_demande_id_foreign` (`demande_id`);

--
-- Index pour la table `fiches_interventions`
--
ALTER TABLE `fiches_interventions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiches_interventions_user_id_foreign` (`user_id`),
  ADD KEY `fiches_interventions_demande_id_foreign` (`demande_id`);

--
-- Index pour la table `fiches_interventions_clients_entreprises`
--
ALTER TABLE `fiches_interventions_clients_entreprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiche_ce_user_fk` (`user_id`),
  ADD KEY `fiche_ce_client_fk` (`client_contractuel_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Index pour la table `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planning_user_fk` (`user_id`),
  ADD KEY `planning_client_fk` (`client_contractuel_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_user_id_foreign` (`user_id`),
  ADD KEY `sections_service_id_foreign` (`service_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`),
  ADD KEY `services_section_id_foreign` (`section_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_logs_to_index` (`to`),
  ADD KEY `sms_logs_sent_at_index` (`sent_at`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `clients_contractuels`
--
ALTER TABLE `clients_contractuels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fiches_accueils`
--
ALTER TABLE `fiches_accueils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fiches_interventions`
--
ALTER TABLE `fiches_interventions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fiches_interventions_clients_entreprises`
--
ALTER TABLE `fiches_interventions_clients_entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD CONSTRAINT `contrats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `demandes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `factures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `fiches_accueils`
--
ALTER TABLE `fiches_accueils`
  ADD CONSTRAINT `fiches_accueils_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fiches_accueils_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `fiches_interventions`
--
ALTER TABLE `fiches_interventions`
  ADD CONSTRAINT `fiches_interventions_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fiches_interventions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `fiches_interventions_clients_entreprises`
--
ALTER TABLE `fiches_interventions_clients_entreprises`
  ADD CONSTRAINT `fiche_ce_client_fk` FOREIGN KEY (`client_contractuel_id`) REFERENCES `clients_contractuels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fiche_ce_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `plannings`
--
ALTER TABLE `plannings`
  ADD CONSTRAINT `planning_client_fk` FOREIGN KEY (`client_contractuel_id`) REFERENCES `clients_contractuels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `planning_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
