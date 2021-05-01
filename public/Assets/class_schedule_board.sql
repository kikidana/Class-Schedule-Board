-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2021 pada 11.59
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class_schedule_board`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `created_at`, `updated_at`) VALUES
(1, 'Danang Indrajaya', NULL, NULL),
(2, 'Abdul Barir Hakim', NULL, NULL),
(3, 'Edo Surya', NULL, NULL),
(4, 'Ahlijati Nuraminah', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_matkul`
--

CREATE TABLE `dosen_matkul` (
  `id_dosen` int(10) UNSIGNED NOT NULL,
  `id_matkul` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen_matkul`
--

INSERT INTO `dosen_matkul` (`id_dosen`, `id_matkul`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 1, NULL, NULL),
(3, 2, NULL, NULL),
(4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_matkul` int(10) UNSIGNED NOT NULL,
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_matkul`, `id_ruang`, `hari`, `jenis_kelas`, `waktu_mulai`, `waktu_selesai`, `tanggal_mulai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Rabu', 'Teori', '07:30:00', '09:10:00', '2021-04-28', NULL, NULL),
(2, 1, 1, 'Rabu', 'Teori', '09:40:00', '11:20:00', '2021-04-28', NULL, NULL),
(3, 2, 2, 'Rabu', 'Lab', '07:30:00', '10:00:00', '2021-04-28', NULL, NULL),
(4, 3, 3, 'Rabu', 'Teori', '07:30:00', '10:00:00', '2021-04-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_matakuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matakuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_matakuliah`, `nama_matakuliah`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'KBMT308', 'Statistika R', '6,8-BIS', NULL, NULL),
(2, 'KKAI300', 'Kecerdasan Buatan', '4-CS', NULL, NULL),
(3, 'KBSE402', 'Manajemen Proyek', '6-CS', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_01_064007_create_dosen_table', 1),
(2, '2021_05_01_064121_create_ruangan_table', 1),
(3, '2021_05_01_064141_create_status_table', 1),
(4, '2021_05_01_064203_create_matakuliah_table', 1),
(5, '2021_05_01_064229_create_matkul_dosen_table', 1),
(6, '2021_05_01_064247_create_jadwal_table', 1),
(7, '2021_05_01_064309_create_sesi_kelas_table', 1),
(8, '2021_05_01_092349_create_dosen_matkul_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `no_ruangan`, `created_at`, `updated_at`) VALUES
(1, 'R.1901', NULL, NULL),
(2, 'L.1801', NULL, NULL),
(3, 'R.1804', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi_kelas`
--

CREATE TABLE `sesi_kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `id_matkul` int(10) UNSIGNED NOT NULL,
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `sesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sesi_kelas`
--

INSERT INTO `sesi_kelas` (`id`, `status`, `id_jadwal`, `id_matkul`, `id_ruang`, `sesi`, `waktu_mulai`, `waktu_selesai`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'sesi 1', '07:30:00', '09:10:00', '2021-04-28', NULL, NULL),
(2, 1, 2, 1, 1, 'sesi 1', '09:40:00', '11:20:00', '2021-04-28', NULL, NULL),
(3, 1, 1, 1, 1, 'sesi 2', '07:30:00', '09:10:00', '2021-05-05', NULL, NULL),
(4, 1, 2, 1, 1, 'sesi 2', '09:40:00', '11:20:00', '2021-05-05', NULL, NULL),
(5, 2, 3, 2, 2, 'sesi 1', '07:30:00', '10:00:00', '2021-04-28', NULL, NULL),
(6, 1, 3, 2, 2, 'sesi 2', '07:30:00', '10:00:00', '2021-05-05', NULL, NULL),
(7, 3, 4, 3, 3, 'sesi 1', '07:30:00', '10:00:00', '2021-04-28', NULL, NULL),
(8, 1, 4, 3, 3, 'sesi 2', '07:30:00', '10:00:00', '2021-05-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'On Schedule', NULL, NULL),
(2, 'Batal Kelas', NULL, NULL),
(3, 'Sedang Berlangsung', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen_matkul`
--
ALTER TABLE `dosen_matkul`
  ADD PRIMARY KEY (`id_dosen`,`id_matkul`),
  ADD KEY `dosen_matkul_id_matkul_foreign` (`id_matkul`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_id_matkul_foreign` (`id_matkul`),
  ADD KEY `jadwal_id_ruang_foreign` (`id_ruang`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sesi_kelas`
--
ALTER TABLE `sesi_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesi_kelas_status_foreign` (`status`),
  ADD KEY `sesi_kelas_id_jadwal_foreign` (`id_jadwal`),
  ADD KEY `sesi_kelas_id_matkul_foreign` (`id_matkul`),
  ADD KEY `sesi_kelas_id_ruang_foreign` (`id_ruang`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sesi_kelas`
--
ALTER TABLE `sesi_kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen_matkul`
--
ALTER TABLE `dosen_matkul`
  ADD CONSTRAINT `dosen_matkul_id_dosen_foreign` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_matkul_id_matkul_foreign` FOREIGN KEY (`id_matkul`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_id_matkul_foreign` FOREIGN KEY (`id_matkul`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_id_ruang_foreign` FOREIGN KEY (`id_ruang`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sesi_kelas`
--
ALTER TABLE `sesi_kelas`
  ADD CONSTRAINT `sesi_kelas_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesi_kelas_id_matkul_foreign` FOREIGN KEY (`id_matkul`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesi_kelas_id_ruang_foreign` FOREIGN KEY (`id_ruang`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesi_kelas_status_foreign` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
