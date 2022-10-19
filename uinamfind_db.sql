-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2022 pada 10.14
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uinamfind_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin_jurusan`
--

CREATE TABLE `tb_admin_jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin_jurusan`
--

INSERT INTO `tb_admin_jurusan` (`id`, `nama`, `jabatan`, `fakultas`, `jurusan`, `email`, `password`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faisal Akib S.Kom, M.Kom', 'Ketua Jurusan', 'Sains dan Teknologi', 'Sistem Informasi', 'test@gmail.com', '$2y$10$qZjSJGtIwEfglvtDeDjLYuhAhG.d9wN0aT6dAao4GeUuFOkKu2.Gi', 'image_1664075932.jpeg', 'Active', '2022-09-25 03:18:52', '2022-09-25 03:18:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin_super`
--

CREATE TABLE `tb_admin_super` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin_super`
--

INSERT INTO `tb_admin_super` (`id`, `nama`, `jabatan`, `email`, `password`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Azwar Bahar ', 'Programmer', 'azwarbahar07@gmail.com', '$2y$10$Scs3CC3txRstxh46vZqqAeOHt3gfLBQxB/QG5r7rBkbKoQjPhCLsa', 'image_1664028633.png', 'Active', '2022-09-24 12:45:34', '2022-09-24 12:45:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `from_id` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `tahun_jabatan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal_penindakan` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beasiswa`
--

CREATE TABLE `tb_beasiswa` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `batas_tanggal` varchar(255) DEFAULT NULL,
  `link_info` varchar(255) DEFAULT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `role_admin` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_beasiswa`
--

INSERT INTO `tb_beasiswa` (`id`, `judul`, `instansi`, `deskripsi`, `foto`, `batas_tanggal`, `link_info`, `admin_id`, `role_admin`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test Beasiswa', 'PT Test Beasiswa', 'gashfkjsmklmvkl mklsdjfklsd', 'image_1665492234.jpeg', '2022-10-28', 'https://uinamfind.com', '1', 'Super', NULL, 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `singkatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id`, `nama`, `singkatan`) VALUES
(1, 'Syariah dan Hukum', 'fsh'),
(2, 'Tarbiyah dan Keguruan', 'ftk'),
(3, 'Ushuluddin dan Filsafat', 'fuf'),
(4, 'Adab dan Humaniora', 'fah'),
(5, 'Dakwah dan Komunikasi', 'fdk'),
(6, 'Sains dan Teknologi', 'fst'),
(7, 'Kedokteran dan Ilmu Kesehatan', 'fkik'),
(8, 'Ekonomi dan Bisnis Islam', 'febi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nama_foto` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `from_id` varchar(255) DEFAULT NULL,
  `uploader_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_foto`
--

INSERT INTO `tb_foto` (`id`, `judul`, `deskripsi`, `nama_foto`, `kategori`, `from_id`, `uploader_id`, `created_at`, `updated_at`) VALUES
(1, 'hjdkashckjs', 'terrf', NULL, 'Ukm', '1', '1', NULL, NULL),
(2, 'tregerg', 'fergersfe', 'image_1665636537.PNG', 'Informasi', '3', '1', '2022-10-13 04:48:57', '2022-10-13 04:48:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `cakupan` varchar(255) DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `penulis_id` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_informasi`
--

INSERT INTO `tb_informasi` (`id`, `judul`, `cakupan`, `pesan`, `tanggal`, `penulis_id`, `gambar`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Memperingati Hari Ulang Tahun Azwar Bahar', 'Semua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', NULL, '1', 'image_1665634627.PNG', 'memperingati-hari-ulang-tahun-azwar-bahar', 'Active', '2022-10-13 02:52:05', '2022-10-13 04:17:07'),
(3, 'tregerg', 'Mahasiswa', 'fergersfe', NULL, '1', 'image_1665636537.PNG', 'tregerg', 'Active', '2022-10-13 04:48:57', '2022-10-13 04:48:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `fakultas`, `jurusan`) VALUES
(1, 'Sains dan Teknologi', 'Sistem Informasi'),
(2, 'Syariah dan Hukum', 'Hukum Tata Negara'),
(3, 'Tarbiyah dan Keguruan', 'Pendidikan Agama Islam'),
(4, 'Husuluddin dan Filsafat', 'Sosiologi Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `from_id` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id`, `kategori`, `nama`, `deskripsi`, `tempat`, `tanggal`, `from_id`, `foto`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Lembaga', 'Sosialisasi Bantuan dan Peresmian', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Gowa', '2022-08-01', '1', NULL, NULL, '2022-10-08 12:20:14', '2022-10-08 12:20:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lamaran`
--

CREATE TABLE `tb_lamaran` (
  `id` int(11) NOT NULL,
  `loker_id` varchar(255) DEFAULT NULL,
  `mahasiswa_id` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `status_lamaran` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `dokumen_lamaran` varchar(255) DEFAULT NULL,
  `jenis_dokumen` varchar(255) DEFAULT NULL,
  `telpon_pelamar` varchar(255) DEFAULT NULL,
  `email_pelamar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lamaran`
--

INSERT INTO `tb_lamaran` (`id`, `loker_id`, `mahasiswa_id`, `tanggal`, `status_lamaran`, `pesan`, `dokumen_lamaran`, `jenis_dokumen`, `telpon_pelamar`, `email_pelamar`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '01-01-2022', 'Review', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor', NULL, NULL, '082358719404', 'azwarbahjar07@gmail.com', '2022-10-10 02:25:16', '2022-10-10 02:25:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lembaga_kampus`
--

CREATE TABLE `tb_lembaga_kampus` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `cakupan_lembaga` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `alamat_sekretariat` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tahun_berdiri` varchar(255) DEFAULT NULL,
  `jenis_lembaga` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lembaga_kampus`
--

INSERT INTO `tb_lembaga_kampus` (`id`, `nama`, `cakupan_lembaga`, `fakultas`, `jurusan`, `alamat_sekretariat`, `kontak`, `email`, `deskripsi`, `tahun_berdiri`, `jenis_lembaga`, `admin`, `foto`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HMJ SI', 'Jurusan', 'Sains dan Teknologi', 'Sistem Informasi', NULL, NULL, NULL, 'Ini adalah akun official resmi HMJ SI', '2013', NULL, '1', NULL, NULL, 'Active', '2022-10-05 07:22:12', '2022-10-05 07:22:12'),
(2, 'DEMA-SAINTEK', 'Fakultas', 'Sains dan Teknologi', '', NULL, NULL, NULL, 'Ini adalah akun official resmi DEMA-SAINTEK', NULL, NULL, '1', NULL, NULL, 'Active', '2022-10-05 14:27:18', '2022-10-05 14:27:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lowongan_pekerjaan`
--

CREATE TABLE `tb_lowongan_pekerjaan` (
  `id` int(11) NOT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `jobdesk` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `jenis_pekerjaan` varchar(255) DEFAULT NULL,
  `gaji_tersedia` enum('Ya','Tidak') DEFAULT NULL,
  `gaji_max` varchar(255) DEFAULT NULL,
  `gaji_min` varchar(255) DEFAULT NULL,
  `sumber_loker` varchar(255) DEFAULT NULL,
  `recruiter_id` varchar(255) DEFAULT NULL,
  `perusahaan_id` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `lamar_mudah` varchar(255) DEFAULT NULL,
  `link_lamar` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lowongan_pekerjaan`
--

INSERT INTO `tb_lowongan_pekerjaan` (`id`, `posisi`, `perusahaan`, `jobdesk`, `deskripsi`, `lokasi`, `jenis_pekerjaan`, `gaji_tersedia`, `gaji_max`, `gaji_min`, `sumber_loker`, `recruiter_id`, `perusahaan_id`, `slug`, `lamar_mudah`, `link_lamar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Staff Admin Kantor', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed nisi lacus sed viverra tellus in hac habitasse platea. Sed augue lacus viverra vitae. Ipsum faucibus vitae aliquet nec ullamcorper sit. Ut consequat semper viverra nam libero justo laoreet sit amet. Sed faucibus turpis in eu. Nunc congue nisi vitae suscipit tellus mauris a. Interdum velit euismod in pellentesque massa placerat duis ultricies. Orci eu lobortis elementum nibh tellus molestie nunc non. Eget arcu dictum varius duis at consectetur lorem donec massa. Bibendum at varius vel pharetra vel turpis nunc. Mauris a diam maecenas sed enim. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi.\r\n\r\nDonec adipiscing tristique risus nec. Tellus mauris a diam maecenas. Mauris nunc congue nisi vitae suscipit tellus mauris a diam. At erat pellentesque adipiscing commodo elit at. Bibendum est ultricies integer quis. Interdum varius sit amet mattis vulputate. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Euismod lacinia at quis risus sed vulputate odio. Cursus euismod quis viverra nibh. Viverra adipiscing at in tellus.', 'Makassar', 'Fulltime', 'Ya', '4000000', '3000000', NULL, '1', '1', NULL, 'Ya', '', 'Active', '2022-10-09 09:09:47', '2022-10-09 09:09:47'),
(2, 'Manager Marketing', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed nisi lacus sed viverra tellus in hac habitasse platea. Sed augue lacus viverra vitae. Ipsum faucibus vitae aliquet nec ullamcorper sit. Ut consequat semper viverra nam libero justo laoreet sit amet. Sed faucibus turpis in eu. Nunc congue nisi vitae suscipit tellus mauris a. Interdum velit euismod in pellentesque massa placerat duis ultricies. Orci eu lobortis elementum nibh tellus molestie nunc non. Eget arcu dictum varius duis at consectetur lorem donec massa. Bibendum at varius vel pharetra vel turpis nunc. Mauris a diam maecenas sed enim. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi.\r\n\r\nDonec adipiscing tristique risus nec. Tellus mauris a diam maecenas. Mauris nunc congue nisi vitae suscipit tellus mauris a diam. At erat pellentesque adipiscing commodo elit at. Bibendum est ultricies integer quis. Interdum varius sit amet mattis vulputate. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Euismod lacinia at quis risus sed vulputate odio. Cursus euismod quis viverra nibh. Viverra adipiscing at in tellus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Makassar', 'Fulltime', 'Tidak', NULL, NULL, NULL, '1', '1', NULL, 'Tidak', 'https://www.jobstreet.co.id/', 'Active', '2022-10-09 09:09:47', '2022-10-09 09:09:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_magang`
--

CREATE TABLE `tb_magang` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `industri` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `link_info` varchar(255) DEFAULT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `role_admin` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_magang`
--

INSERT INTO `tb_magang` (`id`, `judul`, `industri`, `instansi`, `deskripsi`, `foto`, `tanggal`, `lokasi`, `link_info`, `admin_id`, `role_admin`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Telkomsel Intenship Student', 'Telekomunikasi', 'Telkomsel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '01-01-2022', 'Makassar', 'https://telkomsel.com', '1', 'Super', NULL, 'Active', '2022-10-10 02:31:22', '2022-10-10 02:31:22'),
(3, 'Test Magang', 'Uji Coba', 'PT Test Magang', 'asfsdgfsdahr', 'image_1665491739.jpeg', '2022-10-27', 'Makassar', 'uinamfind.com', '1', 'Super', NULL, 'Active', '2022-10-11 12:35:39', '2022-10-11 12:35:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_market_produk`
--

CREATE TABLE `tb_market_produk` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nomor_wa` varchar(255) DEFAULT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `penjual_id` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_market_produk`
--

INSERT INTO `tb_market_produk` (`id`, `judul`, `harga`, `satuan`, `lokasi`, `deskripsi`, `nomor_wa`, `foto1`, `foto2`, `foto3`, `penjual_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Baju Koko', '120000', 'pcs', 'Makassar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '6282358719404', NULL, NULL, NULL, '1', NULL, 'Active', '2022-10-12 07:25:36', '2022-10-12 07:25:36'),
(3, 'frwerew', '100000000', 'Kg', 'Makassar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. Risus ultricies tristique nulla aliquet enim tortor at auctor urna. Dis parturient montes nascetur ridiculus mus mauris vitae. Curabitur gravida arcu ac tortor dignissim convallis aenean et tortor. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci. Leo integer malesuada nunc vel. Egestas dui id ornare arcu odio ut. Mauris pharetra et ultrices neque ornare aenean euismod. Non nisi est sit amet. At consectetur lorem donec massa. Odio pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus. Amet tellus cras adipiscing enim eu turpis egestas pretium aenean.\r\n\r\nPlatea dictumst quisque sagittis purus sit amet volutpat consequat. Tristique senectus et netus et malesuada fames ac turpis egestas. Augue eget arcu dictum varius duis at. Faucibus a pellentesque sit amet porttitor eget. Tellus mauris a diam maecenas sed enim. Sed libero enim sed faucibus turpis. Mauris sit amet massa vitae tortor condimentum. Mattis aliquam faucibus purus in massa. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Praesent semper feugiat nibh sed pulvinar proin. Donec ac odio tempor orci dapibus ultrices in. Neque laoreet suspendisse interdum consectetur libero id. Amet massa vitae tortor condimentum. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac ut consequat semper viverra nam libero justo. Nulla porttitor massa id neque. Morbi tempus iaculis urna id volutpat lacus laoreet. Quam viverra orci sagittis eu volutpat odio facilisis. Aliquet porttitor lacus luctus accumsan tortor posuere ac ut consequat. Fermentum dui faucibus in ornare quam viverra.', '8282358719404', NULL, NULL, NULL, '1', NULL, 'Active', '2022-10-12 14:07:08', '2022-10-12 14:07:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_motto_user`
--

CREATE TABLE `tb_motto_user` (
  `id` int(11) NOT NULL,
  `motto_profesional` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_organisasi`
--

CREATE TABLE `tb_organisasi` (
  `id` int(11) NOT NULL,
  `nama_organisasi` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `tahun_berdiri` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_sampul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_organisasi`
--

INSERT INTO `tb_organisasi` (`id`, `nama_organisasi`, `kategori`, `tahun_berdiri`, `foto`, `foto_sampul`, `deskripsi`, `kontak`, `email`, `alamat`, `admin`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Inready Workgroup', 'Teknologi Informasi', NULL, NULL, NULL, 'Ini adalah akun official resmi Inready Workgroup', NULL, NULL, NULL, '1', NULL, 'Active', '2022-10-08 14:41:02', '2022-10-08 14:41:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_organisasi_user`
--

CREATE TABLE `tb_organisasi_user` (
  `id` int(11) NOT NULL,
  `nama_organisasi` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `kedudukan_organisasi` varchar(255) DEFAULT NULL,
  `organisasi_id` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tanggal_mulai` varchar(255) DEFAULT NULL,
  `tanggal_berakhir` varchar(255) DEFAULT NULL,
  `status_organisasi_user` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendidikan_user`
--

CREATE TABLE `tb_pendidikan_user` (
  `id` int(11) NOT NULL,
  `pendidikan` enum('TK','SD','SMP','SMA','Universitas') DEFAULT NULL,
  `nama_tempat` varchar(255) DEFAULT NULL,
  `gelar` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `tanggal_masuk` varchar(255) DEFAULT NULL,
  `tanggal_berakhir` varchar(255) DEFAULT NULL,
  `status_pendidikan` enum('Masih','Selesai') NOT NULL DEFAULT 'Masih',
  `slug_pendidikan` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengalaman_user`
--

CREATE TABLE `tb_pengalaman_user` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `jenis_pengalaman` varchar(255) DEFAULT NULL,
  `nama_tempat` varchar(255) DEFAULT NULL,
  `lokasi_tempat` varchar(255) DEFAULT NULL,
  `tanggal_mulai` varchar(255) DEFAULT NULL,
  `tanggal_berakhir` varchar(255) DEFAULT NULL,
  `status_pengalaman` varchar(255) DEFAULT NULL,
  `slug_pengalaman` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `url_profil` varchar(255) DEFAULT NULL,
  `industri` varchar(255) DEFAULT NULL,
  `ukuran_kariawan` varchar(255) DEFAULT NULL,
  `jenis_perusahaan` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tahun_berdiri` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `recruiter_id` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id`, `nama`, `tagline`, `url_profil`, `industri`, `ukuran_kariawan`, `jenis_perusahaan`, `telpon`, `email`, `tahun_berdiri`, `deskripsi`, `alamat`, `lokasi`, `recruiter_id`, `foto`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kisel Group', NULL, 'https://kiselindonesia.com/', 'Telekomunikasi', '1000-5000', NULL, '081234567890', NULL, '1996', 'Koperasi Telekomunikasi Selular atau \"Kisel\" didirikan pada tanggal 23 Oktober 1996, sebagai entity support kebutuhan internal Telkomsel terutama untuk memenuhi kebutuhan Sumber Daya Manusia pendukung dan proyek pencetakan invoice yang tersebar di 14 Wilayah. Pada tahun 2001, Kisel melakukan konsolidasi menjadi 9 Wilayah, yaitu Sumbagut, Sumbagsel, Jabotabek, Jawa Barat, Jawa Tengah, Jawa Timur, Balinusra, Kalimantan, dan Sumalirja.\r\n\r\nAkhir tahun 2010, wilayah kerja Kisel semakin bertambah menjadi 10 Wilayah dengan dibentuknya Kisel Sumbagteng. Seiring dengan perkembangan bisnis, pada akhir tahun 2015, wilayah Sumalirja diputuskan untuk dipecah menjadi dua wilayah, yaitu Wilayah Sulawesi dan Wilayah Papua Maluku (Puma), sehingga pada saat ini Kisel telah memiliki 11 Kantor Wilayah dan 54 Kantor Layanan yang tersebar dari Provinsi Nangroe Aceh Darussalam hingga Papua, serta memiliki 4.182 anggota di seluruh wilayah Indonesia yang terdiri dari Karyawan PT Telkomsel.', NULL, 'Gowa', '1', NULL, NULL, 'Active', '2022-10-04 07:55:13', '2022-10-04 07:55:13'),
(2, 'dfssddsadas', NULL, 'fdge', 'fsdfds', '100-500', NULL, NULL, NULL, NULL, 'Ini adalah akun official resmi dfssddsadas', NULL, NULL, '1', NULL, NULL, 'Active', '2022-10-09 05:33:50', '2022-10-09 05:33:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_recruiter`
--

CREATE TABLE `tb_recruiter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis kelamin` varchar(255) DEFAULT NULL,
  `tempat lahir` varchar(255) DEFAULT NULL,
  `tanggal lahir` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `verifed_telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verifed_email` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `id_perusahaan` varchar(255) DEFAULT NULL,
  `motto` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_sampul` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_recruiter`
--

INSERT INTO `tb_recruiter` (`id`, `nama`, `jenis kelamin`, `tempat lahir`, `tanggal lahir`, `telpon`, `verifed_telpon`, `email`, `verifed_email`, `nama_perusahaan`, `jabatan`, `id_perusahaan`, `motto`, `lokasi`, `foto`, `foto_sampul`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Azwar Bahar', 'Laki-laki', 'Makassar', '1-11-1996', '082358719404', 'Yes', 'azwarbahar07@gmail.com', 'Yes', 'Kisel Group', 'Lead Software Engineer', '1', 'Leader IT', 'Makassar', NULL, NULL, NULL, NULL, 'Active', '2022-10-04 06:49:45', '2022-10-04 06:49:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_skills_user`
--

CREATE TABLE `tb_skills_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `nama_skill` varchar(255) DEFAULT NULL,
  `level_skill` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_skills_user`
--

INSERT INTO `tb_skills_user` (`id`, `user_id`, `nama_skill`, `level_skill`, `created_at`, `updated_at`) VALUES
(1, '1', 'Android Developer', '5', '2022-09-26 09:20:30', '2022-09-26 09:20:30'),
(2, '1', 'System Analyst', '4', '2022-09-26 09:20:30', '2022-09-26 09:20:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sosmed`
--

CREATE TABLE `tb_sosmed` (
  `id` int(11) NOT NULL,
  `nama_sosmed` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `from_id` varchar(255) DEFAULT NULL,
  `url_sosmed` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sosmed`
--

INSERT INTO `tb_sosmed` (`id`, `nama_sosmed`, `kategori`, `from_id`, `url_sosmed`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'Mahasiswa', '1', 'https://www.facebook.com/azwar.016/', 'Active', NULL, NULL),
(2, 'Instagram', 'Mahasiswa', '1', 'https://www.instagram.com/azwarbahar_/', 'Active', NULL, NULL),
(3, 'Linkedin', 'Mahasiswa', '1', 'https://www.linkedin.com/in/-azwar-bahar/', 'Active', NULL, NULL),
(4, 'Github', 'Mahasiswa', '1', 'https://github.com/azwarbahar', 'Active', NULL, NULL),
(5, 'Instagram', 'Lembaga', '1', 'https://www.instagram.com/hmjsi.uinam/', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `role` enum('Recruiter','Seller','Lainnya','') NOT NULL,
  `status` enum('Active','Inactive','Banned') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ukm`
--

CREATE TABLE `tb_ukm` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `tahun_berdiri` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status_konfirmasi` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ukm`
--

INSERT INTO `tb_ukm` (`id`, `nama_ukm`, `kategori`, `tahun_berdiri`, `deskripsi`, `status_konfirmasi`, `admin`, `kontak`, `email`, `alamat`, `foto`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Olahraga', 'Olahraga', NULL, 'Ini adalah akun official resmi Olahraga', 'Yes', '1', NULL, NULL, NULL, NULL, NULL, 'Active', '2022-10-08 13:10:15', '2022-10-08 13:10:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `tentang_user` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_uinam` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `tahun_masuk` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `suku` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_sampul` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `status_akun` enum('Active','Inactive','Blokir','Banned') NOT NULL DEFAULT 'Active',
  `status_aktif` enum('Online','Offline','','') DEFAULT 'Offline',
  `status_kemahasiswaan` enum('Lulus','Belum Lulus') NOT NULL DEFAULT 'Belum Lulus',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_depan`, `nama_belakang`, `nim`, `username`, `tentang_user`, `email`, `email_uinam`, `password`, `fakultas`, `jurusan`, `tahun_masuk`, `telpon`, `lokasi`, `alamat`, `jenis_kelamin`, `suku`, `foto`, `foto_sampul`, `tempat_lahir`, `tanggal_lahir`, `status_akun`, `status_aktif`, `status_kemahasiswaan`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Azwar', 'Bahar', '60900116085', '60900116085', NULL, NULL, '60900116085@uin-alauddin.ac.id', '$2y$10$dXxgPe2tWQ1ogn./e0zet.irL9OwsChzOElMcP8D2HU0IFPj4gHty', 'Sains dan Teknologi', 'Sistem Informasi', '2016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 'Offline', '', '2022-09-26 08:27:11', '2022-09-26 08:27:11'),
(2, 'fd', 'yyt', '46', '46', NULL, NULL, '46@uin-alauddin.ac.id', '$2y$10$aH3qQvT0EoGWvwvzRFY60OaUg1C4chpSntC6xM9BSwofNIkyWZut6', 'Tarbiyah dan Keguruan', 'Hukum Tata Negara', '34567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 'Offline', '', '2022-09-26 09:01:50', '2022-09-26 09:01:50'),
(3, 'htgut', 'ytt', '555', '555', NULL, NULL, '555@uin-alauddin.ac.id', '$2y$10$iIhaM5GfcuC0prlzSY9Fc..lymzpPpCz7OzeI6g9Y/IalDGfaEg46', 'Syariah dan Hukum', 'Hukum Tata Negara', '312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 'Offline', 'Lulus', '2022-09-26 09:03:20', '2022-09-26 09:03:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin_jurusan`
--
ALTER TABLE `tb_admin_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_admin_super`
--
ALTER TABLE `tb_admin_super`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lamaran`
--
ALTER TABLE `tb_lamaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lembaga_kampus`
--
ALTER TABLE `tb_lembaga_kampus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lowongan_pekerjaan`
--
ALTER TABLE `tb_lowongan_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_market_produk`
--
ALTER TABLE `tb_market_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_motto_user`
--
ALTER TABLE `tb_motto_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_organisasi_user`
--
ALTER TABLE `tb_organisasi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pendidikan_user`
--
ALTER TABLE `tb_pendidikan_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengalaman_user`
--
ALTER TABLE `tb_pengalaman_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_recruiter`
--
ALTER TABLE `tb_recruiter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_skills_user`
--
ALTER TABLE `tb_skills_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ukm`
--
ALTER TABLE `tb_ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin_jurusan`
--
ALTER TABLE `tb_admin_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_admin_super`
--
ALTER TABLE `tb_admin_super`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_lamaran`
--
ALTER TABLE `tb_lamaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_lembaga_kampus`
--
ALTER TABLE `tb_lembaga_kampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_lowongan_pekerjaan`
--
ALTER TABLE `tb_lowongan_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_market_produk`
--
ALTER TABLE `tb_market_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_motto_user`
--
ALTER TABLE `tb_motto_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_organisasi_user`
--
ALTER TABLE `tb_organisasi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pendidikan_user`
--
ALTER TABLE `tb_pendidikan_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengalaman_user`
--
ALTER TABLE `tb_pengalaman_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_recruiter`
--
ALTER TABLE `tb_recruiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_skills_user`
--
ALTER TABLE `tb_skills_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ukm`
--
ALTER TABLE `tb_ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
