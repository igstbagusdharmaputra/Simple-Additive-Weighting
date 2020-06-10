-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2020 pada 04.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk-ilkom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut` enum('cost','benefit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_kriteria`
--

INSERT INTO `data_kriteria` (`id`, `nama_kriteria`, `atribut`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'benefit', 0.6, '2020-06-06 17:42:30', '2020-06-08 17:07:34'),
(2, 'C2', 'benefit', 0.2, '2020-06-06 17:45:26', '2020-06-08 17:07:43'),
(3, 'C3', 'benefit', 0.8, '2020-06-06 17:45:38', '2020-06-08 17:07:54'),
(4, 'C4', 'benefit', 0.6, '2020-06-06 17:45:50', '2020-06-06 17:45:50'),
(6, 'C5', 'benefit', 1, '2020-06-06 18:04:02', '2020-06-08 17:08:05'),
(7, 'C6', 'benefit', 1, '2020-06-06 18:04:23', '2020-06-08 17:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tanaman`
--

CREATE TABLE `data_tanaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tanaman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekanan_udara` double NOT NULL,
  `kecepatan_angin` double NOT NULL,
  `kelembaban_udara` double NOT NULL,
  `penyinaran_matahari` double NOT NULL,
  `jumlah_curah_hujan` double NOT NULL,
  `suhu` double NOT NULL,
  `waktu` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_tanaman`
--

INSERT INTO `data_tanaman` (`id`, `nama_tanaman`, `tekanan_udara`, `kecepatan_angin`, `kelembaban_udara`, `penyinaran_matahari`, `jumlah_curah_hujan`, `suhu`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 'Padi', 1011.03, 7.22, 75, 11, 145.833, 23, '2020-06-07', '2020-06-07 10:25:49', '2020-06-07 10:25:49'),
(3, 'Jagung', 1011.03, 7.22, 75, 11, 89.583, 25, '2020-06-07', '2020-06-07 11:13:12', '2020-06-07 11:13:12'),
(4, 'Kedelai', 1011.03, 7.22, 75, 10, 56.25, 24.5, '2020-06-07', '2020-06-07 11:14:01', '2020-06-07 11:14:01'),
(5, 'Ubi jalar', 1011.03, 7.22, 80, 12, 93.75, 22.5, '2020-06-07', '2020-06-07 11:15:08', '2020-06-07 11:15:08'),
(6, 'Ubi Kayu', 1011.03, 7.22, 80, 10, 66.33, 21, '2020-06-07', '2020-06-07 11:15:42', '2020-06-07 11:15:42'),
(7, 'Kacang Tanah', 1011.03, 7.22, 70, 10, 66.667, 28, '2020-06-07', '2020-06-07 11:16:18', '2020-06-07 11:16:18'),
(8, 'Kacang Hijau', 1011.03, 7.22, 70, 8, 125, 26, '2020-06-07', '2020-06-07 11:16:53', '2020-06-07 11:16:53'),
(9, 'Cabai', 1011.03, 7.22, 80, 8, 100, 28, '2020-06-07', '2020-06-07 11:17:23', '2020-06-07 11:17:23'),
(13, 'Padi', 1012.6, 13.32, 70, 12, 100, 23, '2020-07-07', '2020-06-08 17:13:09', '2020-06-08 17:14:31'),
(14, 'Cabai', 1012.6, 7.22, 80, 10, 145.833, 28, '2020-07-07', '2020-06-08 17:13:33', '2020-06-08 17:13:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_users`
--

CREATE TABLE `detail_users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_users`
--

INSERT INTO `detail_users` (`id_user`, `nama`, `jenis_kelamin`, `no_telp`, `tgl_lahir`, `created_at`, `updated_at`) VALUES
(3, 'petaniku', 'laki-laki', '081236309692', '1983-06-15', '2020-06-06 16:58:44', '2020-06-06 16:58:44'),
(4, 'petaniku1', 'laki-laki', '081236309692', '1915-07-22', '2020-06-06 16:59:45', '2020-06-06 17:00:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2020_02_26_094143_create_detail_users_table', 1),
(8, '2020_02_27_042928_create_data_kriteria', 1),
(9, '2020_06_07_093006_create_data_tanaman', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$10$A2YnZQp21ESAXd9oNp2KPuyNrTR.E3Teb/Fj2LSi2UVbdUmY6cxaK', '1', NULL, '2020-06-06 08:41:23', '2020-06-06 08:41:23'),
(3, 'petaniku@gmail.com', 'petaniku', '$2y$10$uM1ubLWMr8.ltHcD6Nok.eL8XoC/g5KzB/e44aBL4Vw/mhSV.AUuW', '2', NULL, '2020-06-06 16:58:44', '2020-06-06 16:58:44'),
(4, 'petaniku1@gmail.com', 'petaniku1', '$2y$10$tUwzaKxxf45yDyf0yYZLqe3qq3t2Um.hxnDFAxdalXYec0gxqsPlG', '2', NULL, '2020-06-06 16:59:45', '2020-06-06 17:00:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_tanaman`
--
ALTER TABLE `data_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_users`
--
ALTER TABLE `detail_users`
  ADD KEY `detail_users_id_user_foreign` (`id_user`);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_tanaman`
--
ALTER TABLE `data_tanaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_users`
--
ALTER TABLE `detail_users`
  ADD CONSTRAINT `detail_users_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
