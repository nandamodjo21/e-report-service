-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Sep 04, 2023 at 05:04 AM
-- Server version: 8.0.33
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelanggaran_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_dataguru`
--

CREATE TABLE `t_dataguru` (
  `id_guru` varchar(255) NOT NULL,
  `nip` int NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_dataguru`
--

INSERT INTO `t_dataguru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jabatan`) VALUES
('52b31181-4992-11ee-a19b-0242ac120002', 2147483647, 'Nurlela Doda', 'wanita', 'Gorontalo', '1992-09-26', 'Tanggidaa', 'Wali Kelas'),
('79f372b1-499d-11ee-a19b-0242ac120002', 309482359, 'Anggraini Noe', 'wanita', 'motilango', '2023-09-01', 'tilongkabila', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_datasiswa`
--

CREATE TABLE `t_datasiswa` (
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_kelas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_datasiswa`
--

INSERT INTO `t_datasiswa` (`nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `id_kelas`) VALUES
('0042428920', 'Adit Nugroho Mohune', 'Kabila', '2004-06-17', 'pria', 'Botubarani', 5),
('004317564', 'Firman Naue', 'Gorontalo', '2004-10-20', 'pria', 'Libuo', 6),
('0054509747', 'Adnan Lasalewo', 'Gorontalo', '2005-09-22', 'pria', 'Tenda', 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_grafik`
--

CREATE TABLE `t_grafik` (
  `id_grafik` int NOT NULL,
  `jumlah_pelanggaran` int NOT NULL,
  `pelanggaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_grafik`
--

INSERT INTO `t_grafik` (`id_grafik`, `jumlah_pelanggaran`, `pelanggaran`) VALUES
(1, 20, 'Bolos');

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_pelanggaran`
--

CREATE TABLE `t_jenis_pelanggaran` (
  `id_jenis_pelanggaran` int NOT NULL,
  `jenis_pelanggaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_jenis_pelanggaran`
--

INSERT INTO `t_jenis_pelanggaran` (`id_jenis_pelanggaran`, `jenis_pelanggaran`) VALUES
(1, 'Ringan'),
(2, 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` int NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `kelas`) VALUES
(1, '10MM_1'),
(2, '10MM_2'),
(3, '11MM_1'),
(4, '11MM_2'),
(5, '12MM_1'),
(6, '12MM_2');

-- --------------------------------------------------------

--
-- Table structure for table `t_laporan`
--

CREATE TABLE `t_laporan` (
  `id_laporan` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `id_guru` varchar(255) NOT NULL,
  `id_jenis_pelanggaran` int NOT NULL,
  `tanggal_pelanggaran` varchar(255) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_laporan`
--

INSERT INTO `t_laporan` (`id_laporan`, `nis`, `id_guru`, `id_jenis_pelanggaran`, `tanggal_pelanggaran`, `keterangan`, `status`) VALUES
('52e5e736-4adf-11ee-b03b-0242ac120002', '004317564', '933af7a1-4992-11ee-a19b-0242ac120002', 2, '13/09/2023', 'bolos. ba pojok pokoknya banyak', 0),
('684610d5-4adc-11ee-b03b-0242ac120002', '0054509747', '933af7a1-4992-11ee-a19b-0242ac120002', 2, '30/09/2023', 'bolossss', 0),
('6ba9f110-4ade-11ee-b03b-0242ac120002', '0054509747', '933af7a1-4992-11ee-a19b-0242ac120002', 2, '30/09/2023', 'boloss bu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `nama_pelapor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pelapor`, `username`, `image`, `password`, `role_id`, `is_active`) VALUES
('933af7a1-4992-11ee-a19b-0242ac120002', '52b31181-4992-11ee-a19b-0242ac120002', 'walikelas', 'default.jpg', '202cb962ac59075b964b07152d234b70', 2, 1),
('9b970292-499d-11ee-a19b-0242ac120002', '79f372b1-499d-11ee-a19b-0242ac120002', 'ainnoe', 'default.jpg', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'operator'),
(2, 'walikelas'),
(3, 'Guru Bk'),
(4, 'ketuajurusan'),
(5, 'Guru Mata Pelajaran'),
(6, 'Informan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_dataguru`
--
ALTER TABLE `t_dataguru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `t_datasiswa`
--
ALTER TABLE `t_datasiswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `t_jenis_pelanggaran`
--
ALTER TABLE `t_jenis_pelanggaran`
  ADD PRIMARY KEY (`id_jenis_pelanggaran`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `t_laporan`
--
ALTER TABLE `t_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_jenis_pelanggaran` (`id_jenis_pelanggaran`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`role_id`),
  ADD KEY `nama_pelapor` (`nama_pelapor`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_datasiswa`
--
ALTER TABLE `t_datasiswa`
  ADD CONSTRAINT `t_datasiswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `t_kelas` (`id_kelas`);

--
-- Constraints for table `t_laporan`
--
ALTER TABLE `t_laporan`
  ADD CONSTRAINT `t_laporan_ibfk_1` FOREIGN KEY (`id_jenis_pelanggaran`) REFERENCES `t_jenis_pelanggaran` (`id_jenis_pelanggaran`),
  ADD CONSTRAINT `t_laporan_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `t_datasiswa` (`nis`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `t_laporan_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`nama_pelapor`) REFERENCES `t_dataguru` (`id_guru`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
