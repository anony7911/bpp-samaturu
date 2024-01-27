-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 27 Jan 2024 pada 11.44
-- Versi server: 10.6.14-MariaDB-cll-lve
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u939198444_bppsamaturu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `harga_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bahanaktif_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dayatahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hamadibasmi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `nama_alternatif`, `harga_id`, `bahanaktif_id`, `dayatahan_id`, `hamadibasmi_id`, `created_at`, `updated_at`) VALUES
(1, 'Abuki 50 SL', 2, 1, 2, 3, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(2, 'Acqura 500 EC', 3, 1, 3, 1, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(3, 'Actara 25 WG', 2, 1, 2, 2, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(4, 'Agadi 50 SC', 5, 2, 3, 2, '2023-06-30 18:42:06', '2023-10-12 18:37:35'),
(5, 'Agent 50SC', 2, 1, 4, 2, '2023-06-30 18:42:06', '2023-10-12 18:35:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif_petanis`
--

CREATE TABLE `alternatif_petanis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `petani_id` bigint(20) UNSIGNED NOT NULL,
  `alasan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahanaktifs`
--

CREATE TABLE `bahanaktifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahanaktifs`
--

INSERT INTO `bahanaktifs` (`id`, `nama`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '1 Bahan Aktif', 1, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(2, '> 1 Bahan Aktif', 2, '2023-06-30 18:42:06', '2023-06-30 18:42:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dayatahans`
--

CREATE TABLE `dayatahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dayatahans`
--

INSERT INTO `dayatahans` (`id`, `nama`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '1 Tahun', 1, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(2, '2 Tahun', 2, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(3, '3 Tahun', 3, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(4, '4 Tahun', 4, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(5, '> 4 Tahun', 5, '2023-06-30 18:42:06', '2023-06-30 18:42:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `hamadibasmis`
--

CREATE TABLE `hamadibasmis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hamadibasmis`
--

INSERT INTO `hamadibasmis` (`id`, `nama`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '1 Hama', 1, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(2, '2 Hama', 2, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(3, '3 Hama', 3, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(4, '4 Hama', 4, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(5, '>= 5 Hama', 5, '2023-06-30 18:42:06', '2023-06-30 18:42:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hargas`
--

CREATE TABLE `hargas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hargas`
--

INSERT INTO `hargas` (`id`, `nama`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '< Rp 30.000', 1, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(2, 'Rp 30.000 - Rp 50.000', 2, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(3, 'Rp 50.000 - Rp 70.000', 3, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(4, 'Rp 70.000 - Rp 90.000', 4, '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(5, '> Rp 90.000', 5, '2023-06-30 18:42:06', '2023-06-30 18:42:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasils`
--

CREATE TABLE `hasils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_preferensi` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasils`
--

INSERT INTO `hasils` (`id`, `alternatif_id`, `nilai_preferensi`, `created_at`, `updated_at`) VALUES
(41, 5, 0.80833333333333, '2023-10-26 14:06:36', '2023-10-26 14:06:36'),
(42, 4, 0.69083333333333, '2023-10-26 14:06:36', '2023-10-26 14:06:36'),
(43, 3, 0.68333333333333, '2023-10-26 14:06:36', '2023-10-26 14:06:36'),
(44, 2, 0.57916666666667, '2023-10-26 14:06:36', '2023-10-26 14:06:36'),
(45, 1, 0.75, '2023-10-26 14:06:36', '2023-10-26 14:06:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_petanis`
--

CREATE TABLE `hasil_petanis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petani_id` bigint(20) UNSIGNED NOT NULL,
  `hasil_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_petanis`
--

INSERT INTO `hasil_petanis` (`id`, `petani_id`, `hasil_id`, `created_at`, `updated_at`) VALUES
(1, 1, 41, '2023-10-26 14:06:43', '2023-10-26 14:06:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecocokans`
--

CREATE TABLE `kecocokans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `harga_id` bigint(20) UNSIGNED NOT NULL,
  `bahanaktif_id` bigint(20) UNSIGNED NOT NULL,
  `dayatahan_id` bigint(20) UNSIGNED NOT NULL,
  `hamadibasmi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` double(8,2) NOT NULL,
  `tipe` enum('cost','benefit') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama`, `bobot`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'harga', 0.30, 'cost', '2023-06-30 18:42:06', '2023-06-30 18:54:05'),
(2, 'bahan aktif', 0.25, 'benefit', '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(3, 'daya tahan', 0.25, 'benefit', '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(4, 'hama dibasmi', 0.20, 'benefit', '2023-06-30 18:42:06', '2023-06-30 18:42:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_23_024457_create_petanis_table', 1),
(7, '2023_05_23_025559_create_kriterias_table', 1),
(8, '2023_07_01_015427_create_subkriterias_table', 1),
(9, '2023_07_01_020138_create_hargas_table', 1),
(10, '2023_07_01_020145_create_bahanaktifs_table', 1),
(11, '2023_07_01_020153_create_dayatahans_table', 1),
(12, '2023_07_01_022714_create_hamadibasmis_table', 1),
(13, '2023_07_23_035531_create_alternatifs_table', 1),
(14, '2023_07_23_045646_create_alternatif_petanis_table', 1),
(15, '2023_07_30_030000_create_kecocokans_table', 1),
(16, '2023_07_02_004647_add_user_id_to_petanis_table', 2),
(17, '2023_07_02_010408_create_hasils_table', 3),
(18, '2023_07_02_040421_create_hasil_petanis_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `petanis`
--

CREATE TABLE `petanis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `luas_lahan` int(11) NOT NULL,
  `status` enum('pribadi','sewa') NOT NULL DEFAULT 'pribadi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petanis`
--

INSERT INTO `petanis` (`id`, `nama`, `nik`, `alamat`, `no_hp`, `luas_lahan`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Makmur Abadi', 'ALIMUDDIN. N', 'Desa Konaweha', '08234845323', 2000, 'pribadi', '2023-06-30 18:50:42', '2023-06-30 18:50:42', 2),
(2, 'Padi Sejahtera', 'Sul Khaeruddin', 'Desa Ulu Konaweha', '082393319333', 1670, 'pribadi', '2023-06-30 19:33:15', '2023-06-30 19:33:15', NULL),
(3, 'Menteng Jaya', 'Misna', 'Desa Ulu Konaweha', '082134562128', 200, 'pribadi', '2023-10-24 10:11:43', '2023-10-24 10:11:43', 5),
(4, 'Sinar Melati', 'Sulaiman', 'Desa Ulu Konaweha', '082312367843', 3200, 'pribadi', '2023-10-24 10:12:48', '2023-10-24 10:12:48', 6),
(5, 'Beringin Jaya', 'Didik Nurhadis', 'Desa Ulu Konaweha', '082315123654', 1200, 'pribadi', '2023-10-24 10:13:35', '2023-10-24 10:13:35', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriterias`
--

CREATE TABLE `subkriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','pimpinan') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2023-06-30 18:42:06', '$2y$10$zkvtF6b5DWuFkwbOY6aiSuhNEppwpllySAp0tvgFxM/W6BJ1L5pNW', 'admin', '0h0q5DwwCMsSkzXGQ2zDURDkjdxpL1aRzQLdQ8WobL8sGnqS99wP9OQktI97', '2023-06-30 18:42:06', '2023-06-30 18:42:06'),
(2, 'Yusran', 'yusran@gmail.com', NULL, '$2y$10$J4KgCDFtl5FYoG9w9dVCWuqTpcHQ2Fhur1XuRurEIAaaTQKUdafsS', 'user', NULL, '2023-07-01 16:33:30', '2023-07-01 20:36:17'),
(3, 'yusran', 'yusran1@gmail.com', NULL, '$2y$10$/oDD.gWkqg5Ru8HoOebPL.CM6H79BGKJXK2HbY/21zw854kRMJtD2', 'admin', NULL, '2023-07-01 16:34:52', '2023-07-01 16:39:13'),
(5, 'Menteng Jaya', 'mentengjaya@gmail.com', NULL, '$2y$10$4eBhpa0/JJvDIa6ID88HueTwoj9GpbcHCv/TAYsff8pDtuMqozs8K', 'user', NULL, '2023-10-24 10:11:43', '2023-10-24 10:11:43'),
(6, 'Sinar Melati', 'sinarmelati@gmail.com', NULL, '$2y$10$FjPKHbzSudadSmV8JMEyMOoEhVNGomgDGMf5qY2bh.ptBtu6AzOyC', 'user', NULL, '2023-10-24 10:12:48', '2023-10-24 10:12:48'),
(7, 'Beringin Jaya', 'beringinjaya@gmail.com', NULL, '$2y$10$FxDn/zQ8ZU2vMYKM3CFyHOrMNtYbGMOzH6rClaSoeFLYmVZDtU3oe', 'user', NULL, '2023-10-24 10:13:35', '2023-10-24 10:13:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatifs_harga_id_foreign` (`harga_id`),
  ADD KEY `alternatifs_bahanaktif_id_foreign` (`bahanaktif_id`),
  ADD KEY `alternatifs_dayatahan_id_foreign` (`dayatahan_id`),
  ADD KEY `alternatifs_hamadibasmi_id_foreign` (`hamadibasmi_id`);

--
-- Indeks untuk tabel `alternatif_petanis`
--
ALTER TABLE `alternatif_petanis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_petanis_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `alternatif_petanis_petani_id_foreign` (`petani_id`);

--
-- Indeks untuk tabel `bahanaktifs`
--
ALTER TABLE `bahanaktifs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dayatahans`
--
ALTER TABLE `dayatahans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hamadibasmis`
--
ALTER TABLE `hamadibasmis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hargas`
--
ALTER TABLE `hargas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasils`
--
ALTER TABLE `hasils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasils_alternatif_id_foreign` (`alternatif_id`);

--
-- Indeks untuk tabel `hasil_petanis`
--
ALTER TABLE `hasil_petanis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_petanis_petani_id_foreign` (`petani_id`),
  ADD KEY `hasil_petanis_hasil_id_foreign` (`hasil_id`);

--
-- Indeks untuk tabel `kecocokans`
--
ALTER TABLE `kecocokans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecocokans_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `kecocokans_harga_id_foreign` (`harga_id`),
  ADD KEY `kecocokans_bahanaktif_id_foreign` (`bahanaktif_id`),
  ADD KEY `kecocokans_dayatahan_id_foreign` (`dayatahan_id`),
  ADD KEY `kecocokans_hamadibasmi_id_foreign` (`hamadibasmi_id`);

--
-- Indeks untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `petanis`
--
ALTER TABLE `petanis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `petanis_nik_unique` (`nik`),
  ADD KEY `user_fk_4495571` (`user_id`);

--
-- Indeks untuk tabel `subkriterias`
--
ALTER TABLE `subkriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subkriterias_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `alternatif_petanis`
--
ALTER TABLE `alternatif_petanis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bahanaktifs`
--
ALTER TABLE `bahanaktifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dayatahans`
--
ALTER TABLE `dayatahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hamadibasmis`
--
ALTER TABLE `hamadibasmis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hargas`
--
ALTER TABLE `hargas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hasils`
--
ALTER TABLE `hasils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `hasil_petanis`
--
ALTER TABLE `hasil_petanis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kecocokans`
--
ALTER TABLE `kecocokans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petanis`
--
ALTER TABLE `petanis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `subkriterias`
--
ALTER TABLE `subkriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD CONSTRAINT `alternatifs_bahanaktif_id_foreign` FOREIGN KEY (`bahanaktif_id`) REFERENCES `bahanaktifs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatifs_dayatahan_id_foreign` FOREIGN KEY (`dayatahan_id`) REFERENCES `dayatahans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatifs_hamadibasmi_id_foreign` FOREIGN KEY (`hamadibasmi_id`) REFERENCES `hamadibasmis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatifs_harga_id_foreign` FOREIGN KEY (`harga_id`) REFERENCES `hargas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `alternatif_petanis`
--
ALTER TABLE `alternatif_petanis`
  ADD CONSTRAINT `alternatif_petanis_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatif_petanis_petani_id_foreign` FOREIGN KEY (`petani_id`) REFERENCES `petanis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasils`
--
ALTER TABLE `hasils`
  ADD CONSTRAINT `hasils_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_petanis`
--
ALTER TABLE `hasil_petanis`
  ADD CONSTRAINT `hasil_petanis_hasil_id_foreign` FOREIGN KEY (`hasil_id`) REFERENCES `hasils` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_petanis_petani_id_foreign` FOREIGN KEY (`petani_id`) REFERENCES `petanis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecocokans`
--
ALTER TABLE `kecocokans`
  ADD CONSTRAINT `kecocokans_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kecocokans_bahanaktif_id_foreign` FOREIGN KEY (`bahanaktif_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kecocokans_dayatahan_id_foreign` FOREIGN KEY (`dayatahan_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kecocokans_hamadibasmi_id_foreign` FOREIGN KEY (`hamadibasmi_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kecocokans_harga_id_foreign` FOREIGN KEY (`harga_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `petanis`
--
ALTER TABLE `petanis`
  ADD CONSTRAINT `user_fk_4495571` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `subkriterias`
--
ALTER TABLE `subkriterias`
  ADD CONSTRAINT `subkriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
