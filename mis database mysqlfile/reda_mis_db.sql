-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2025 at 08:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reda_mis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2025_03_18_061901_create_users_table', 1),
(3, '2025_06_10_070020_create_redsesta_table', 1),
(4, '2025_06_16_074258_create_redafinance_table', 2),
(5, '2025_06_16_102037_create_redatourism_table', 3),
(6, '2025_07_11_053523_add_column_status_users', 4),
(7, '2025_07_11_054038_add_column_status_to_users', 5),
(8, '2025_07_13_035239_create_redahrm_table', 6),
(9, '2025_07_15_070557_create_redahrm_table', 7),
(10, '2025_07_15_073744_create_redaauditmgt_table', 8),
(11, '2025_07_15_082031_create_redatourismdev_table', 9),
(12, '2025_07_15_085229_create_redaeconomydev_table', 10),
(13, '2025_07_16_044119_create_redaenterprise_table', 11),
(14, '2025_07_16_051532_create_redahotelschool_table', 12),
(15, '2025_07_16_053745_create_redaitcenter_table', 13),
(16, '2025_07_20_112447_create_redalanguagecenter_table', 14),
(17, '2025_07_20_113711_create_redamanpower_table', 15),
(18, '2025_07_20_115047_create_redamanpower_table', 16),
(19, '2025_07_20_121055_create_redamanpowernvq_table', 17),
(20, '2025_07_20_123446_create_redamanpowernvq_table', 18),
(21, '2025_07_20_133328_create_redasecurityservice_table', 19),
(22, '2025_07_20_135902_create_redacleaningservice_table', 20),
(23, '2025_07_21_040920_create_redaskilledmanpower_table', 21),
(24, '2025_07_22_052736_create_redasecurityservicemembers_table', 22),
(25, '2025_07_22_074314_create_redasecurityservicemembers_table', 23),
(26, '2025_07_22_081118_create_reda_security_service_members_table', 24),
(27, '2025_07_22_081732_create_reda_security_service_members_table', 25),
(29, '2025_07_22_100038_create_reda_security_service_members_table', 26),
(30, '2025_07_22_102309_create_reda_security_service_members_table', 27),
(31, '2025_07_23_042740_create_redaaccounts_table', 28),
(32, '2025_07_28_035101_create_redaprocuments_table', 29),
(33, '2025_08_05_135617_create_redastoresandassets_table', 30),
(34, '2025_08_05_140642_create_redasalaries_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redaaccounts`
--

CREATE TABLE `redaaccounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redaaccounts`
--

INSERT INTO `redaaccounts` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(3, 'vv', '2025-07-25', NULL, 'Pending', NULL, 'uploads/accounts/1753246800_c36ecfa0c5816f01b6fb4b6edc215d07.png', '2025-07-22 23:20:10', '2025-07-22 23:30:00'),
(4, 'xwddddedededed', '2025-07-08', NULL, 'Pending', NULL, 'uploads/accounts/1753246614_Screenshot 2025-07-20 181142.png', '2025-07-22 23:26:54', '2025-07-22 23:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `redaauditmgts`
--

CREATE TABLE `redaauditmgts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redaauditmgts`
--

INSERT INTO `redaauditmgts` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 'sss', '2025-07-09', '2025-07-10', 'Pending', '90%', 'uploads/auditfiles/1753245949_1753018995_Screenshot 2025-04-07 103740.png', '2025-07-15 02:25:45', '2025-07-22 23:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `redacleaningservices`
--

CREATE TABLE `redacleaningservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL DEFAULT 'Pending',
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redacleaningservices`
--

INSERT INTO `redacleaningservices` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'jjjjjkkj', '2025-07-04', '2025-07-08', 'Completed', NULL, 'uploads/cleaningfiles/1753020975_hd_6878af4c8e37d (1).jpg', '2025-07-20 08:40:27', '2025-07-20 08:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `redaeconomydevs`
--

CREATE TABLE `redaeconomydevs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Pending','Completed') NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redaeconomydevs`
--

INSERT INTO `redaeconomydevs` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'dd', '2025-07-11', '2025-07-11', 'Pending', 'd', 'uploads/economyfiles/1753245968_Screenshot 2025-07-21 100106.png', '2025-07-15 03:29:34', '2025-07-22 23:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `redaenterprises`
--

CREATE TABLE `redaenterprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redaenterprises`
--

INSERT INTO `redaenterprises` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 'gbfgn', '2025-07-14', '2025-07-17', 'Completed', NULL, 'uploads/enterprisefiles/1753245983_ea0ebd957fef1033b90b7758963bef1f.png', '2025-07-20 05:28:50', '2025-07-22 23:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `redahotelschool`
--

CREATE TABLE `redahotelschool` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redahotelschool`
--

INSERT INTO `redahotelschool` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'mmm', '2025-07-02', '2025-07-03', 'Pending', NULL, 'uploads/hotelschoolfiles/1753246009_232538ded20958fe7198b4ba344a61b7.png', '2025-07-15 23:58:25', '2025-07-22 23:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `redahrm`
--

CREATE TABLE `redahrm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL DEFAULT 'Pending',
  `proofments` varchar(255) DEFAULT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redahrm`
--

INSERT INTO `redahrm` (`id`, `task`, `due_date`, `complete_date`, `status`, `proofments`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(21, 'nikam damme', '2025-08-08', '2025-08-01', 'Pending', NULL, NULL, 'uploads/hrmfiles/1754137461_Black Yellow Creative Dimsum Promotion Banner (1).png', '2025-08-02 06:54:21', '2025-08-02 06:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `redaitcenters`
--

CREATE TABLE `redaitcenters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL DEFAULT 'Pending',
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redaitcenters`
--

INSERT INTO `redaitcenters` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(3, 'gbfgn', '2025-07-12', '2025-07-18', 'Pending', NULL, 'uploads/itcenterfiles/1753246026_83e43aa2d2d04d4d15f5caafdd5e2038.png', '2025-07-20 06:00:49', '2025-07-22 23:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `redalanguagecenters`
--

CREATE TABLE `redalanguagecenters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redalanguagecenters`
--

INSERT INTO `redalanguagecenters` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'iiioio[', '2025-07-04', '2025-07-11', 'Pending', NULL, 'uploads/languagecenterfiles/1753011025_IMG-20250226-WA0032.jpg', '2025-07-20 06:00:16', '2025-07-20 06:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `redamanpowernvq`
--

CREATE TABLE `redamanpowernvq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redamanpowernvq`
--

INSERT INTO `redamanpowernvq` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`) VALUES
(1, 'dfgg', '2025-07-17', '2025-07-16', 'Pending', NULL, 'uploads/manpowerfiles/1753015014_Screenshot 2025-03-24 112053.png');

-- --------------------------------------------------------

--
-- Table structure for table `redaprocuments`
--

CREATE TABLE `redaprocuments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redaprocuments`
--

INSERT INTO `redaprocuments` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'sx', '2025-07-08', '2025-07-03', 'Pending', 'ccc', 'uploads/procuments/1753676031_uigu.png', '2025-07-27 22:40:49', '2025-07-27 22:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `redasalaries`
--

CREATE TABLE `redasalaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL DEFAULT 'Pending',
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redasalaries`
--

INSERT INTO `redasalaries` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'pioi', '2025-08-08', '2025-08-20', 'Completed', NULL, 'uploads/salaryfiles/1754403400_javavvavavavababababab.docx', '2025-08-05 08:46:03', '2025-08-05 08:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `redasecurityservices`
--

CREATE TABLE `redasecurityservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redasecurityservices`
--

INSERT INTO `redasecurityservices` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(5, 'test', '2025-08-07', '2025-08-07', 'Pending', NULL, NULL, '2025-08-05 07:50:36', '2025-08-05 07:50:36'),
(6, 'හිඟ ආදායම් සඳහා ඉදිරි ක්රියාමාර්ග', '2025-07-10', '2025-08-14', 'Pending', 'completed', 'uploads/securityfiles/1754543171_INFORMATION TECHNOLOGY (7).png', '2025-08-06 23:30:05', '2025-08-17 02:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `redaskilledmanpower`
--

CREATE TABLE `redaskilledmanpower` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL DEFAULT 'Pending',
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redaskilledmanpower`
--

INSERT INTO `redaskilledmanpower` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'ddcdcd', '2025-07-10', '2025-07-24', 'Pending', NULL, 'uploads/skilledmanpowerfiles/1753071596_Whisk_62c8edc5a8.jpg', '2025-07-20 22:49:33', '2025-07-20 22:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `redastoresandassets`
--

CREATE TABLE `redastoresandassets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL DEFAULT 'Pending',
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redastoresandassets`
--

INSERT INTO `redastoresandassets` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'sss', '2025-08-07', '2025-08-08', 'Pending', NULL, 'uploads/storesassetfiles/1754402636_Whisk_509ae54894.jpg', '2025-08-05 08:33:17', '2025-08-05 08:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `redatourismdev`
--

CREATE TABLE `redatourismdev` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `complete_date` date DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redatourismdev`
--

INSERT INTO `redatourismdev` (`id`, `task`, `due_date`, `complete_date`, `status`, `progress`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 'mmm', '2025-07-07', '2025-07-16', 'Completed', NULL, 'uploads/tourismfiles/1753160884_1752564239_Document (3).docx', '2025-07-15 22:38:54', '2025-07-21 23:38:04'),
(5, 'dcdc', '2025-07-05', NULL, 'Pending', NULL, 'uploads/tourismfiles/1753245756_1753160884_1752564239_Document (3).docx', '2025-07-22 23:12:28', '2025-07-22 23:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `reda_security_service_members`
--

CREATE TABLE `reda_security_service_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etf_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `nationality` enum('SINHALA','TAMIL','ISLAMIC','CATHOLIC','CHRISTIAN') NOT NULL,
  `nic_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `workplace` varchar(255) NOT NULL,
  `salary_bank_branch_no` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date_joined` date NOT NULL,
  `date_resigned` date DEFAULT NULL,
  `ds_division` varchar(255) NOT NULL,
  `gn_division` varchar(255) NOT NULL,
  `police_division` varchar(255) NOT NULL,
  `marital_status` enum('UNMARRIED','MARRIED') NOT NULL,
  `spouse_name` varchar(255) DEFAULT NULL,
  `no_of_children` int(11) NOT NULL DEFAULT 0,
  `education_qualifications` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `position_category` enum('LSO','SO','OIC') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reda_security_service_members`
--

INSERT INTO `reda_security_service_members` (`id`, `etf_no`, `fullname`, `gender`, `nationality`, `nic_no`, `address`, `workplace`, `salary_bank_branch_no`, `acc_no`, `telephone`, `picture`, `date_joined`, `date_resigned`, `ds_division`, `gn_division`, `police_division`, `marital_status`, `spouse_name`, `no_of_children`, `education_qualifications`, `experience`, `position_category`, `created_at`, `updated_at`) VALUES
(1, '112233', 'dssdsd', 'MALE', 'SINHALA', 'dsdsdsd', 'dsdd', 'vdvd', 'vdvdv', '112233', '0777852562', '687f67609e099_Whisk_99a3d45b47.jpg', '2025-07-25', NULL, 'dcd', 'vdv', 'vdv', 'UNMARRIED', 'vdd', 14, 'ffff', 'fff', 'SO', '2025-07-22 04:56:40', '2025-07-22 04:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `picture`, `type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'reda', 'reda@gmail.com', '1111', 'k,jkghjgjg.jpg', 'User', '2025-06-15 08:32:03', '2025-09-09 00:50:05', 'Active'),
(2, 'admin', 'reda1@gmail.com', '0000', 'jyjgyjyj.jpg', 'Admin', '2025-06-15 08:32:43', '2025-06-15 08:32:43', 'Active'),
(3, 'amila nawarathna', 'nawa@gmail.com', '1234', 'Whisk_129b4ca4c8.jpg', 'User', '2025-06-24 01:23:37', '2025-07-21 00:54:14', 'Active'),
(4, 'dd', 'reda12@gmail.com', '1212', 'hd_686a92ec86f24.jpg', 'User', '2025-07-06 23:16:28', '2025-07-11 00:19:57', 'Active'),
(5, 'Lakshmi', 'lakshmiwijaya636@gmail.com', '1111', 'jfuky.jpg', 'User', '2025-07-07 01:59:01', '2025-07-07 01:59:01', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `redaaccounts`
--
ALTER TABLE `redaaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redaauditmgts`
--
ALTER TABLE `redaauditmgts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redacleaningservices`
--
ALTER TABLE `redacleaningservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redaeconomydevs`
--
ALTER TABLE `redaeconomydevs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redaenterprises`
--
ALTER TABLE `redaenterprises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redahotelschool`
--
ALTER TABLE `redahotelschool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redahrm`
--
ALTER TABLE `redahrm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redaitcenters`
--
ALTER TABLE `redaitcenters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redalanguagecenters`
--
ALTER TABLE `redalanguagecenters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redamanpowernvq`
--
ALTER TABLE `redamanpowernvq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redaprocuments`
--
ALTER TABLE `redaprocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redasalaries`
--
ALTER TABLE `redasalaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redasecurityservices`
--
ALTER TABLE `redasecurityservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redaskilledmanpower`
--
ALTER TABLE `redaskilledmanpower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redastoresandassets`
--
ALTER TABLE `redastoresandassets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redatourismdev`
--
ALTER TABLE `redatourismdev`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reda_security_service_members`
--
ALTER TABLE `reda_security_service_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reda_security_service_members_etf_no_unique` (`etf_no`),
  ADD UNIQUE KEY `reda_security_service_members_nic_no_unique` (`nic_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redaaccounts`
--
ALTER TABLE `redaaccounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `redaauditmgts`
--
ALTER TABLE `redaauditmgts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `redacleaningservices`
--
ALTER TABLE `redacleaningservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redaeconomydevs`
--
ALTER TABLE `redaeconomydevs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redaenterprises`
--
ALTER TABLE `redaenterprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `redahotelschool`
--
ALTER TABLE `redahotelschool`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redahrm`
--
ALTER TABLE `redahrm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `redaitcenters`
--
ALTER TABLE `redaitcenters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `redalanguagecenters`
--
ALTER TABLE `redalanguagecenters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redamanpowernvq`
--
ALTER TABLE `redamanpowernvq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redaprocuments`
--
ALTER TABLE `redaprocuments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redasalaries`
--
ALTER TABLE `redasalaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redasecurityservices`
--
ALTER TABLE `redasecurityservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `redaskilledmanpower`
--
ALTER TABLE `redaskilledmanpower`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redastoresandassets`
--
ALTER TABLE `redastoresandassets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redatourismdev`
--
ALTER TABLE `redatourismdev`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reda_security_service_members`
--
ALTER TABLE `reda_security_service_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
