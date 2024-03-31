-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 12:06 AM
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
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_siswa`
--

CREATE TABLE `akun_siswa` (
  `id` char(36) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_sekolah` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_pendaftaran` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun_siswa`
--

INSERT INTO `akun_siswa` (`id`, `nisn`, `nama_lengkap`, `jenis_sekolah`, `asal_sekolah`, `nomor_hp`, `password`, `no_pendaftaran`, `status`, `created_at`, `updated_at`) VALUES
('3207ae76-acdb-4dd1-8b09-5817544c9944', '13100304', 'Wahyu Hidayat', 'MTs', 'SMP Negeri 1 Sukoharjo', '08218590335', '$2y$12$Iuo49U3EKuXsL.OY1w/6juvskBjiNgapRYI/HozIh1c7TpeVYLxKW', 'PPDB2024002', 1, '2024-03-31 04:30:33', '2024-03-31 04:30:33'),
('f012f293-1e5c-4991-82b1-4784c8ee1b5c', '13100303', 'Wahyu Rahmat Hidayat', 'SMP', 'SMP Negeri 1 Sukoharjo', '082185903635', '$2y$12$XLjXovKlPb8wuCj0r4BmleLretdlZJ3Pbn/c16pbbMIhbdcCgnJx.', 'PPDB2024001', 1, '2024-03-30 15:08:02', '2024-03-30 15:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id` char(36) NOT NULL,
  `nama_biaya` varchar(255) NOT NULL,
  `jumlah_biaya` decimal(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `status_wajib` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id`, `nama_biaya`, `jumlah_biaya`, `status`, `status_wajib`, `created_at`, `updated_at`) VALUES
('96551abc-0194-4805-b0c8-c3e496d41b6e', 'Pendaftaran Baru', 500000.00, 1, 1, '2024-03-31 04:28:34', '2024-03-31 04:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id` char(36) NOT NULL,
  `nama_gelombang` varchar(255) NOT NULL,
  `tahun_pelajaran_id` char(36) NOT NULL,
  `tgl_dibuka` date NOT NULL,
  `tgl_ditutup` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id`, `nama_gelombang`, `tahun_pelajaran_id`, `tgl_dibuka`, `tgl_ditutup`, `status`, `created_at`, `updated_at`) VALUES
('109963bb-6769-43e5-a048-ae5b9020a909', 'Gelombang 2', '9b28bfba-ddf1-4692-9e70-8049869c21c6', '2022-07-01', '2022-12-31', 1, '2024-03-31 10:23:21', '2024-03-31 10:23:21'),
('64584033-24ad-46ea-8b5d-ef7381a949ea', 'Gelombang 1', '9b28bfba-ddf1-4692-9e70-8049869c21c6', '2022-01-01', '2022-06-30', 0, '2024-03-31 10:23:21', '2024-03-31 10:23:21'),
('f966246e-557f-4ac2-93b8-0da1061fe6e3', 'Gelombang 3', '9b28bfba-ddf1-4692-9e70-8049869c21c6', '2023-01-01', '2023-06-30', 0, '2024-03-31 10:23:21', '2024-03-31 10:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `jalur_seleksi`
--

CREATE TABLE `jalur_seleksi` (
  `id` char(36) NOT NULL,
  `nama_jalur` varchar(255) NOT NULL,
  `persyaratan` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jalur_seleksi`
--

INSERT INTO `jalur_seleksi` (`id`, `nama_jalur`, `persyaratan`, `status`, `created_at`, `updated_at`) VALUES
('48ac480c-d72b-4120-ba6c-8cc834ff4452', 'Jalur Prestasi', '<ul>\n<li>Upload Foto Kartu Keluarga Khusus untuk pendaftar dari MTs/Pondok Pesantren</li>\n<li>Memiliki NISN Valid dan terverifikasi di&nbsp;<a href=\"https://nisn.data.kemdikbud.go.id\">https://nisn.data.kemdikbud.go.id</a></li>\n</ul>', 1, NULL, NULL),
('8f12bf05-fb54-4fae-b5f1-145cfc04ebdf', 'Jalur Beasiswa', '<ul>\n<li>Memiliki NISN Valid dan terverifikasi di&nbsp;<a href=\"https://nisn.data.kemdikbud.go.id\">https://nisn.data.kemdikbud.go.id</a><span style=\"font-weight: bolder;\"></span></li><li>Photocopy Rapor Semester 1 s/d 4</li><li>Upload Foto Kartu Keluarga Khusus untuk pendaftar dari MTs/Pondok Pesantren</li>\n</ul>', 1, NULL, NULL),
('a26c6386-d5ad-4e1a-aae9-01cb3208c33d', 'Jalur Reguler', '<ul><li>Surat Keterangan Tidak Mampu Dari Kelurahan</li><li>Memiliki NISN Valid dan terverifikasi di&nbsp;<a href=\"https://nisn.data.kemdikbud.go.id\">https://nisn.data.kemdikbud.go.id</a><a href=\"https://nisn.data.kemdikbud.go.id/\"></a></li><li>Upload Foto Kartu Keluarga Khusus untuk pendaftar dari MTs/Pondok Pesantren</li>\n<ul></ul></ul>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` char(36) NOT NULL,
  `kode_jurusan` varchar(255) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `kuota` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `program_tambahan_id` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `nama_jurusan`, `kuota`, `status`, `program_tambahan_id`, `created_at`, `updated_at`) VALUES
('5af613e9-0533-429c-98ec-4b54d0cf1090', 'KJ003', 'Teknik Elektro', 100, 1, NULL, NULL, NULL),
('a7527bf0-d223-46bd-8967-23e2a4eabb80', 'KJ002', 'Sistem Informasi', 100, 1, NULL, NULL, NULL),
('cf237aba-f632-4466-b4af-44e600df5d03', 'KJ001', 'Teknik Informatika', 100, 1, NULL, NULL, NULL);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_30_214226_create_akun_siswa_table', 1),
(5, '2024_03_31_072933_session_table', 2),
(6, '2024_03_31_080646_create_biaya_table', 2),
(7, '2024_03_31_083905_create_pembayaran_table', 2),
(8, '2024_03_31_141645_create_tahun_pelajaran_table', 3),
(9, '2024_03_31_171848_gelombang_table', 4),
(10, '2024_03_31_173214_create_siswa_gelombangs_table', 5),
(11, '2024_03_31_191932_jalur_seleksi_table', 6),
(12, '2024_03_31_194233_create_siswa_jalur_seleksi_table', 7),
(13, '2024_03_31_200641_create_jurusan_table', 8),
(14, '2024_03_31_201138_add_program_wajib_to_jurusan_table', 9),
(15, '2024_03_31_201745_create_program_tambahan_table', 10),
(16, '2024_03_31_202036_add_program_tambahan_id_to_jurusan_table', 11),
(17, '2024_03_31_203414_program_wajib_to_program_tambahan', 12),
(18, '2024_03_31_212037_create_pilih_jurusan_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` char(36) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `biaya_id` char(36) NOT NULL,
  `siswa_id` char(36) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `kode_transaksi`, `biaya_id`, `siswa_id`, `tgl_pembayaran`, `bukti_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
('4043c4e5-7f24-4958-97c4-4bac1e692bf8', 'PPDB202431032024002001', '96551abc-0194-4805-b0c8-c3e496d41b6e', '3207ae76-acdb-4dd1-8b09-5817544c9944', '2024-03-31', 'T277qFeVwNfdkn422QGInbdWu3qJxKjMuEyFslmR.jpg', 0, '2024-03-31 06:45:45', '2024-03-31 06:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `pilih_jurusan`
--

CREATE TABLE `pilih_jurusan` (
  `id` char(36) NOT NULL,
  `siswa_id` char(36) NOT NULL,
  `pilihan_1` char(36) NOT NULL,
  `pilihan_2` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pilih_jurusan`
--

INSERT INTO `pilih_jurusan` (`id`, `siswa_id`, `pilihan_1`, `pilihan_2`, `status`, `created_at`, `updated_at`) VALUES
('9366f4c7-ceac-464e-b9cc-c8f806c6c808', '3207ae76-acdb-4dd1-8b09-5817544c9944', '5af613e9-0533-429c-98ec-4b54d0cf1090', 'cf237aba-f632-4466-b4af-44e600df5d03', 1, '2024-03-31 15:05:13', '2024-03-31 15:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `program_tambahan`
--

CREATE TABLE `program_tambahan` (
  `id` char(36) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `program_wajib` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_tambahan`
--

INSERT INTO `program_tambahan` (`id`, `nama_program`, `program_wajib`, `status`, `created_at`, `updated_at`) VALUES
('30dea5bf-76e7-4dc4-94f7-c4881e0ead68', 'Keterampilan Musik', 0, 1, '2024-03-31 13:31:42', '2024-03-31 13:31:42'),
('6ad57e5a-0775-4f00-8f04-25adb6571394', 'Olahraga Ekstrakurikuler', 1, 1, '2024-03-31 13:31:42', '2024-03-31 13:31:42'),
('bf2cc37d-40e9-4f5f-800d-162f1f5ed65d', 'Bahasa Asing', 0, 1, '2024-03-31 13:31:42', '2024-03-31 13:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(36) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('OzYSiFDyKPUSWyIIRA3ADbBTdTt4PFqjtfb3tJiP', '3207ae76-acdb-4dd1-8b09-5817544c9944', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWDh4emo5YWpVeUxVcDdDb09Bc2M4VGE5aDJXdjhlWkhnTWtMZm1VRSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGlsaWgtanVydXNhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX3Npc3dhXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6IjMyMDdhZTc2LWFjZGItNGRkMS04YjA5LTU4MTc1NDRjOTk0NCI7fQ==', 1711922718);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_gelombang`
--

CREATE TABLE `siswa_gelombang` (
  `id` char(36) NOT NULL,
  `siswa_id` char(36) NOT NULL,
  `gelombang_id` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa_gelombang`
--

INSERT INTO `siswa_gelombang` (`id`, `siswa_id`, `gelombang_id`, `status`, `created_at`, `updated_at`) VALUES
('df349c12-af16-43ae-9653-1b7918f27c34', '3207ae76-acdb-4dd1-8b09-5817544c9944', '109963bb-6769-43e5-a048-ae5b9020a909', 1, '2024-03-31 11:48:56', '2024-03-31 11:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_jalur_seleksi`
--

CREATE TABLE `siswa_jalur_seleksi` (
  `id` char(36) NOT NULL,
  `siswa_id` char(36) NOT NULL,
  `jalur_id` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa_jalur_seleksi`
--

INSERT INTO `siswa_jalur_seleksi` (`id`, `siswa_id`, `jalur_id`, `status`, `created_at`, `updated_at`) VALUES
('da5e2a21-ebd9-4688-b02e-5b9b73653575', '3207ae76-acdb-4dd1-8b09-5817544c9944', '8f12bf05-fb54-4fae-b5f1-145cfc04ebdf', 1, '2024-03-31 12:57:08', '2024-03-31 12:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id` char(36) NOT NULL,
  `nama_tahun_pelajaran` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id`, `nama_tahun_pelajaran`, `semester`, `status`, `created_at`, `updated_at`) VALUES
('54a85172-1f39-45b4-af6d-96495d09e38f', '2021/2022', 'Ganjil', 0, '2024-03-31 07:18:50', '2024-03-31 07:18:50'),
('9b28bfba-ddf1-4692-9e70-8049869c21c6', '2021/2022', 'Genap', 1, '2024-03-31 07:18:50', '2024-03-31 07:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_siswa`
--
ALTER TABLE `akun_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akun_siswa_no_pendaftaran_unique` (`no_pendaftaran`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gelombang_tahun_pelajaran_id_foreign` (`tahun_pelajaran_id`);

--
-- Indexes for table `jalur_seleksi`
--
ALTER TABLE `jalur_seleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_program_tambahan_id_foreign` (`program_tambahan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembayaran_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `pembayaran_biaya_id_foreign` (`biaya_id`),
  ADD KEY `pembayaran_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `pilih_jurusan`
--
ALTER TABLE `pilih_jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pilih_jurusan_siswa_id_foreign` (`siswa_id`),
  ADD KEY `pilih_jurusan_pilihan_1_foreign` (`pilihan_1`),
  ADD KEY `pilih_jurusan_pilihan_2_foreign` (`pilihan_2`);

--
-- Indexes for table `program_tambahan`
--
ALTER TABLE `program_tambahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa_gelombang`
--
ALTER TABLE `siswa_gelombang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_gelombang_siswa_id_foreign` (`siswa_id`),
  ADD KEY `siswa_gelombang_gelombang_id_foreign` (`gelombang_id`);

--
-- Indexes for table `siswa_jalur_seleksi`
--
ALTER TABLE `siswa_jalur_seleksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_jalur_seleksi_siswa_id_foreign` (`siswa_id`),
  ADD KEY `siswa_jalur_seleksi_jalur_id_foreign` (`jalur_id`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD CONSTRAINT `gelombang_tahun_pelajaran_id_foreign` FOREIGN KEY (`tahun_pelajaran_id`) REFERENCES `tahun_pelajaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_program_tambahan_id_foreign` FOREIGN KEY (`program_tambahan_id`) REFERENCES `program_tambahan` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_biaya_id_foreign` FOREIGN KEY (`biaya_id`) REFERENCES `biaya` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `akun_siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pilih_jurusan`
--
ALTER TABLE `pilih_jurusan`
  ADD CONSTRAINT `pilih_jurusan_pilihan_1_foreign` FOREIGN KEY (`pilihan_1`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pilih_jurusan_pilihan_2_foreign` FOREIGN KEY (`pilihan_2`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pilih_jurusan_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `akun_siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_gelombang`
--
ALTER TABLE `siswa_gelombang`
  ADD CONSTRAINT `siswa_gelombang_gelombang_id_foreign` FOREIGN KEY (`gelombang_id`) REFERENCES `gelombang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_gelombang_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `akun_siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_jalur_seleksi`
--
ALTER TABLE `siswa_jalur_seleksi`
  ADD CONSTRAINT `siswa_jalur_seleksi_jalur_id_foreign` FOREIGN KEY (`jalur_id`) REFERENCES `jalur_seleksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_jalur_seleksi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `akun_siswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
