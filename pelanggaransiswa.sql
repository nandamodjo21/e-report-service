-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2023 pada 05.01
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelanggaransiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dataguru`
--

CREATE TABLE `t_dataguru` (
  `id_guru` int(10) NOT NULL,
  `nip` int(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_dataguru`
--

INSERT INTO `t_dataguru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jabatan`) VALUES
(1, 12345, 'Noeee', 'wanita', 'Kabila', '2023-03-08', 'tilong', 'Wali kelas'),
(2, 2030, 'Noeee', 'pria', 'Kabila', '2023-03-31', 'tilong', 'Wali kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_datasiswa`
--

CREATE TABLE `t_datasiswa` (
  `id_siswa` int(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_datasiswa`
--

INSERT INTO `t_datasiswa` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `id_kelas`) VALUES
(0, 201511, 'noe', 'Kabila', '2023-04-04', '', 'Gorontalo', 1),
(1, 20501006, 'Anggraini Noe', 'Gorontalo', '2023-03-08', 'wanita', 'Botupingge', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis_pelanggaran`
--

CREATE TABLE `t_jenis_pelanggaran` (
  `id_jenis_pelanggaran` int(10) NOT NULL,
  `jenis_pelanggaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` int(10) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `kelas`) VALUES
(1, '10MM_1'),
(2, '10MM_2'),
(3, '11MM_1'),
(4, '11MM_2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_laporan`
--

CREATE TABLE `t_laporan` (
  `id_laporan` int(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `pelanggaran` varchar(50) NOT NULL,
  `id_jenis_pelanggaran` int(10) NOT NULL,
  `tanggal_pelanggaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(10) NOT NULL,
  `is_active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`) VALUES
(1, 'admin', 'admin@gmail.com', '', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'operator', 'operator@gmail.com', '', '4b583376b2767b923c3e1da60d10de59', 2, 1),
(3, 'Guru Bk', 'GuruBk@gmail.com', '', '39582aed46a18dee28f1096780784ae6', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(7, 1, 3),
(9, 2, 4),
(10, 2, 3),
(12, 1, 4),
(13, 3, 3),
(14, 1, 2),
(15, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'menu'),
(3, 'user'),
(4, 'Data Posko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'operator'),
(3, 'Guru Bk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(4, 2, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 2, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 3, 'Menu utama', 'user/menuutama', 'fas fa-fw fa-user-tie', 1),
(13, 4, 'Data Kebutuhan', 'petugas/index', 'fas fa-fw fa-user-tie', 1),
(14, 1, 'laporan', 'admin/laporan', 'fas fa-fw fa-user-tie', 1),
(15, 4, 'Data Bencana', 'petugas/index', 'fas fa-fw fa-user-tie', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_dataguru`
--
ALTER TABLE `t_dataguru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `t_datasiswa`
--
ALTER TABLE `t_datasiswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `t_jenis_pelanggaran`
--
ALTER TABLE `t_jenis_pelanggaran`
  ADD PRIMARY KEY (`id_jenis_pelanggaran`);

--
-- Indeks untuk tabel `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `t_laporan`
--
ALTER TABLE `t_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_jenis_pelanggaran` (`id_jenis_pelanggaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`role_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_dataguru`
--
ALTER TABLE `t_dataguru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_datasiswa`
--
ALTER TABLE `t_datasiswa`
  ADD CONSTRAINT `t_datasiswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `t_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `t_laporan`
--
ALTER TABLE `t_laporan`
  ADD CONSTRAINT `t_laporan_ibfk_1` FOREIGN KEY (`id_jenis_pelanggaran`) REFERENCES `t_jenis_pelanggaran` (`id_jenis_pelanggaran`),
  ADD CONSTRAINT `t_laporan_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `t_datasiswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
