-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2024 at 07:42 PM
-- Server version: 5.7.33
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rajawali`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id_angkatan` int(11) NOT NULL,
  `namaakt` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id_angkatan`, `namaakt`, `tahun`) VALUES
(2, 'Angkatan 19', '2022'),
(3, 'Angkatan 18', '2021'),
(4, 'Angkatan 20', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id_arsip` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `lemari` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `namaarsip` varchar(255) NOT NULL,
  `tglarsip` date NOT NULL,
  `no_rak` int(11) NOT NULL,
  `no_box` int(11) NOT NULL,
  `no_map` int(11) NOT NULL,
  `filearsip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id_arsip`, `lokasi`, `lemari`, `kategori`, `users`, `namaarsip`, `tglarsip`, `no_rak`, `no_box`, `no_map`, `filearsip`) VALUES
(1, 20, 9, 13, 1, 'Proposal diksar angkatan 18', '2023-08-18', 1, 1, 1, ''),
(2, 20, 9, 13, 1, 'Proposal diksar angkatan 19', '2023-08-18', 2, 2, 2, 'https://web.whatsapp.com/'),
(3, 20, 9, 13, 1, 'Proposal diksar angkatan 20', '2023-08-18', 3, 3, 3, 'https://web.whatsapp.com/'),
(4, 13, 2, 6, 1, 'Database siswa angkatan 18', '2023-08-18', 4, 4, 4, ''),
(5, 13, 2, 6, 1, 'Database siswa angkatan 19', '2023-08-18', 5, 5, 5, 'https://web.whatsapp.com/'),
(6, 13, 2, 6, 1, 'Database siswa angkatan 20', '2023-08-18', 6, 6, 6, 'https://web.whatsapp.com/'),
(7, 14, 3, 7, 1, 'Dokumentasi angkatan 18', '2023-08-18', 6, 6, 6, 'https://web.whatsapp.com/'),
(8, 14, 3, 7, 1, 'Dokumentasi angkatan 19', '2023-08-18', 7, 7, 7, 'https://web.whatsapp.com/'),
(9, 14, 3, 7, 1, 'Dokumentasi angkatan 20', '2023-08-18', 13, 13, 13, 'https://web.whatsapp.com/'),
(10, 15, 4, 8, 1, 'Ijazah angkatan 18', '2023-08-18', 14, 14, 14, 'https://web.whatsapp.com/'),
(11, 15, 4, 8, 1, 'Ijazah angkatan 19', '2023-08-18', 15, 15, 15, 'https://web.whatsapp.com/'),
(12, 15, 4, 8, 1, 'Ijazah angkatan 20', '2023-08-18', 16, 16, 16, 'https://web.whatsapp.com/'),
(13, 16, 5, 9, 1, 'Surat Cuti Siswa', '2023-08-18', 17, 17, 17, 'https://web.whatsapp.com/'),
(14, 16, 5, 9, 1, 'Surat permohonan pengiriman siswa', '2023-08-18', 20, 20, 20, 'https://web.whatsapp.com/'),
(15, 17, 6, 10, 1, 'Nilai Angkatan 18', '2023-08-18', 21, 21, 21, 'https://web.whatsapp.com/'),
(16, 18, 7, 11, 1, 'KTA ANG.17', '2023-08-18', 22, 22, 22, 'https://web.whatsapp.com/'),
(17, 19, 8, 12, 1, 'KTP ANG.18', '2023-08-18', 23, 23, 23, 'https://web.whatsapp.com/'),
(18, 23, 9, 14, 1, 'Absen Ang.18', '2023-08-18', 25, 25, 25, 'https://web.whatsapp.com/'),
(19, 24, 11, 15, 1, 'Kas masuk dan keluar Ang.18', '2023-08-18', 30, 30, 30, 'https://web.whatsapp.com/');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tglbayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `biaya`, `siswa`, `tglbayar`) VALUES
(1, 4, 3, '2023-01-01'),
(2, 6, 4, '2023-08-01'),
(3, 5, 5, '2023-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(11) NOT NULL,
  `namabi` varchar(255) NOT NULL,
  `jumlahbi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `namabi`, `jumlahbi`) VALUES
(4, 'Cicilan Per 3 bulan', '1500000'),
(5, 'Cicilan Per 2 bulan', '2250000'),
(6, 'FULL LUNAS', '4500000');

-- --------------------------------------------------------

--
-- Table structure for table `hukuman`
--

CREATE TABLE `hukuman` (
  `id_hukuman` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `pelanggaran` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `hukumakhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hukuman`
--

INSERT INTO `hukuman` (`id_hukuman`, `siswa`, `pelanggaran`, `deskripsi`, `hukumakhir`) VALUES
(3, 6, 'SP1', 'Merokok Di dalam asrama ', 'Push Up sambil Jongkok Keliling Lapangan 2 Kali');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `pelajaran` int(11) NOT NULL,
  `pengajar` int(11) NOT NULL,
  `darijam` datetime NOT NULL,
  `sampaijam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `angkatan`, `pelajaran`, `pengajar`, `darijam`, `sampaijam`) VALUES
(2, 2, 3, 9, '2023-08-21 03:40:00', '2023-08-21 04:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `namakat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `namakat`) VALUES
(6, 'DA'),
(7, 'DO'),
(8, 'IJ'),
(9, 'SM'),
(10, 'NS'),
(11, 'K1'),
(12, 'K2'),
(13, 'PRP'),
(14, 'APA'),
(15, 'KPA');

-- --------------------------------------------------------

--
-- Table structure for table `lemari`
--

CREATE TABLE `lemari` (
  `id_lemari` int(11) NOT NULL,
  `namalemari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lemari`
--

INSERT INTO `lemari` (`id_lemari`, `namalemari`) VALUES
(2, '1'),
(3, '2'),
(4, '3'),
(5, '4'),
(6, '5'),
(7, '6'),
(8, '7'),
(9, '8'),
(10, '9'),
(11, '10');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `namalok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `namalok`) VALUES
(13, 'DATABASE'),
(14, 'DOKUMENTASI'),
(15, 'IJAZAH'),
(16, 'SURAT MENYURAT'),
(17, 'NILAI SISWA'),
(18, 'KTA'),
(19, 'KTP'),
(20, 'PROPOSAL'),
(23, 'ABSEN PER ANGKATAN'),
(24, 'KEUANGAN PER ANGKATAN');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `lemdik` int(11) DEFAULT NULL,
  `polakur` int(11) DEFAULT NULL,
  `perudal` int(11) DEFAULT NULL,
  `interperson` int(11) DEFAULT NULL,
  `etikapro` int(11) DEFAULT NULL,
  `tugaspok` int(11) DEFAULT NULL,
  `kempolter` int(11) DEFAULT NULL,
  `beladiri` int(11) DEFAULT NULL,
  `phbbtembak` int(11) DEFAULT NULL,
  `narkoba` int(11) DEFAULT NULL,
  `gunatongkat` int(11) DEFAULT NULL,
  `barisbaris` int(11) DEFAULT NULL,
  `binggris` int(11) DEFAULT NULL,
  `safety` int(11) DEFAULT NULL,
  `radio` int(11) DEFAULT NULL,
  `instansi` int(11) DEFAULT NULL,
  `patroli` int(11) DEFAULT NULL,
  `tindakanawal` int(11) DEFAULT NULL,
  `pemblapor` int(11) DEFAULT NULL,
  `pelprima` int(11) DEFAULT NULL,
  `psikomas` int(11) DEFAULT NULL,
  `tanggel` int(11) DEFAULT NULL,
  `kuhp` int(11) DEFAULT NULL,
  `ham` int(11) DEFAULT NULL,
  `kesehatan` int(11) DEFAULT NULL,
  `kesamaptaan` int(11) DEFAULT NULL,
  `teknis` int(11) DEFAULT NULL,
  `ceramah` int(11) DEFAULT NULL,
  `upacara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `siswa`, `lemdik`, `polakur`, `perudal`, `interperson`, `etikapro`, `tugaspok`, `kempolter`, `beladiri`, `phbbtembak`, `narkoba`, `gunatongkat`, `barisbaris`, `binggris`, `safety`, `radio`, `instansi`, `patroli`, `tindakanawal`, `pemblapor`, `pelprima`, `psikomas`, `tanggel`, `kuhp`, `ham`, `kesehatan`, `kesamaptaan`, `teknis`, `ceramah`, `upacara`) VALUES
(2, 3, 80, 79, 80, 79, 76, 77, 77, 77, 78, 76, 75, 78, 79, 77, 77, 78, 80, 77, 77, 78, 79, 78, 79, 78, 79, 70, 80, 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nippgw` varchar(255) NOT NULL,
  `namapgw` varchar(255) NOT NULL,
  `alamatpgw` varchar(255) NOT NULL,
  `tptlahirp` varchar(255) NOT NULL,
  `tgllahirp` date NOT NULL,
  `telppgw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nippgw`, `namapgw`, `alamatpgw`, `tptlahirp`, `tgllahirp`, `telppgw`) VALUES
(2, '10052001', 'GHINA AYU SAPUTRI', 'Komp.Banjar Indah Permai Banjarmasin', 'BANJARMASIN', '2001-05-10', '085931922848'),
(3, '6675432', 'SITI AISAH ARAPAH', 'Jalan Kasturi Raya no.169', 'BANJARMASIN', '2002-09-01', '089677543211'),
(4, '77654321', 'RABIATUL ADAWIYAH', 'Jalan Pekapiran Raya no.908', 'BANJARMASIN', '2002-04-16', '089766543215'),
(5, '3908776543', 'Muhammad Reza', 'Jalan Veteran Komp.Bumi Indah Jaya no,10', 'BANJARMASIN', '1999-01-24', '081233458876'),
(6, '33457798', 'Budi Wiratama', 'Komplek Banjar Indah Permai', 'BANJARMASIN', '1997-01-23', '05116675432'),
(7, '99876543', 'RATNO', 'Jalan Manggis Komplek Rahayu', 'BANJARMASIN', '1984-06-23', '089655432176');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `namapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `namapel`) VALUES
(1, 'Interpersonal Skill'),
(2, 'Pengenalan Lemdik'),
(3, 'Pola Kurikulum'),
(4, 'Peraturan Urusan Dalam'),
(5, 'Etika Profesi'),
(6, 'Tugas Pokok, Fungsi, dan Peranan Satpam'),
(7, 'Kemampuan Kepolisian Terbatas'),
(8, 'Beladiri'),
(9, 'Pengenalan Handak, Barang Berbahaya dan Latihan Menembak'),
(10, 'Pengetahuan Narkoba'),
(11, 'Penggunaan Tongkat Polri dan Borgol'),
(12, 'Pengetahuan Peraturan Baris Berbaris dan Penghormatan'),
(13, 'Bahasa Inggris'),
(14, 'Pengetahuan Keselamatan, Kesehatan Kerja dan Lingkungan'),
(15, 'Pengetahuan Dasar Komunikasi Radio dan Peralatan Security'),
(16, 'Pengetahuan Instansi Masing-masing'),
(17, 'Pengaturan, Penjagaan, Pengawalan dan Patroli'),
(18, 'Tindakan Pertama di Tempat Kejadian Perkara'),
(19, 'Pembuatan Laporan Informasi'),
(20, 'Kemampuan Memberikan Pelayanan Prima'),
(21, 'Psikologi Massa'),
(22, 'Penangkapan dan Penggeledahan'),
(23, 'Kapita Selekta Hukum (KUHP, KUHP) dan Peraturan Lain'),
(24, 'Hak Asasi Manusia'),
(25, 'Pemeriksaan Kesehatan'),
(26, 'Tes Kesamaptaan Jasmani '),
(27, 'Latihan Teknis'),
(28, 'Pembekalan / Ceramah'),
(29, 'Upacara Buka / Tutup');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `namapgj` varchar(255) NOT NULL,
  `nippgj` varchar(255) NOT NULL,
  `alamatpgj` varchar(255) NOT NULL,
  `tptlahirj` varchar(255) NOT NULL,
  `tgllahirj` date NOT NULL,
  `telppgj` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `namapgj`, `nippgj`, `alamatpgj`, `tptlahirj`, `tgllahirj`, `telppgj`) VALUES
(6, 'Moch Adang Kosasih', '65080403', 'Banjarbaru', 'Banjarmasin', '1975-03-23', '08112114352'),
(7, 'Tagor Sipayung', '66060331', 'Jalan Kasturi Raya No.76 Banjarmasin', 'Kotabaru', '1986-05-23', '085605543216'),
(8, 'Agus Jatmiko', '99876543', 'Komplek Agraria Banjarbaru', 'Batulicin', '1995-06-04', '081145326654'),
(9, 'Rezki Saputra', '5564328876', 'Komplek Nusa Bangsa No.12', 'Banjarmasin', '1987-11-17', '081151723539'),
(10, 'Agus Setiawan', '886400987', 'Jalan Kayu Kuku Blok II No.21', 'Kotabaru', '1969-11-27', '051123443215'),
(11, 'Husni Thamrin', '7765430098', 'Jalan Veteran No.63b', 'Kotabaru', '1976-09-20', '082155674320');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pegawai','Pengajar','Siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_users`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'Admin'),
(2, 'Ayu', 'Ayu', 'Siswa'),
(3, 'Saputri', 'Saputri', 'Pengajar'),
(4, 'Ghina', 'Ghina', 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `kompetisi` varchar(255) NOT NULL,
  `juara` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `despres` varchar(255) NOT NULL,
  `filesertif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `siswa`, `kompetisi`, `juara`, `tingkat`, `despres`, `filesertif`) VALUES
(2, 3, 'Cerdas Cermat', '2', 'Kecamatan Banjarmasin Selatan', 'Mewakili PT. Rajawali Buana Indah Wiratama', '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `namasis` varchar(255) NOT NULL,
  `niksis` varchar(255) NOT NULL,
  `jenissis` enum('KTA','Ijazah') NOT NULL,
  `perusahaansis` varchar(255) NOT NULL,
  `jabatansis` varchar(255) NOT NULL,
  `alamatsis` varchar(255) NOT NULL,
  `tptlahirs` varchar(255) NOT NULL,
  `tgllahirs` date NOT NULL,
  `telpsis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `angkatan`, `namasis`, `niksis`, `jenissis`, `perusahaansis`, `jabatansis`, `alamatsis`, `tptlahirs`, `tgllahirs`, `telpsis`) VALUES
(3, 2, 'ACHMAD RIDHA ANSYARI', '6302060806020005', 'Ijazah', 'Umum', 'Umum', 'JLVETERAN GG. HASANAH RT/RW 003/001 DIRGAHAYU PULAU LAUT UTARA', 'KOTABARU', '2002-06-08', '085820801853'),
(4, 3, 'AGUS SABARI', '6305011908720002', 'Ijazah', 'RSUD DATU SANGGUL', 'SATPAM', 'JL. PELITA RT. 002 RW. 001 KEL. MANDURIAN KEC. TAPIN TENGAH ', 'BANJARMASIN', '1972-08-12', '085248434932'),
(5, 2, 'AHMAD FAUJI', '6203041203820005', 'KTA', 'CKU', 'SATPAM', 'TAMBAN BARU MEKAR RT. 006 RW. 002 KEL. TAMBAN BARU MEKAR KEC. TAMBAN CATUR', 'TAMBAN BARU MEKAR', '1982-03-12', '083143972176'),
(6, 2, 'AHMAD FAZRI', '6311080404030001', 'KTA', 'UMUM', 'SATPAM', 'JU\'UH NO. 32 RT. 004 RW. 000 KEL. JU\'UH KEC. TEBING TINGGI', 'JU\'UH', '2003-04-04', '082157801395');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id_arsip`),
  ADD KEY `lokasi` (`lokasi`),
  ADD KEY `lemari` (`lemari`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `users` (`users`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `biaya` (`biaya`),
  ADD KEY `siswa` (`siswa`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `hukuman`
--
ALTER TABLE `hukuman`
  ADD PRIMARY KEY (`id_hukuman`),
  ADD KEY `siswa` (`siswa`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `angkatan` (`angkatan`),
  ADD KEY `pelajaran` (`pelajaran`),
  ADD KEY `pengajar` (`pengajar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lemari`
--
ALTER TABLE `lemari`
  ADD PRIMARY KEY (`id_lemari`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `siswa` (`siswa`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `siswa` (`siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `angkatan` (`angkatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hukuman`
--
ALTER TABLE `hukuman`
  MODIFY `id_hukuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lemari`
--
ALTER TABLE `lemari`
  MODIFY `id_lemari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip`
--
ALTER TABLE `arsip`
  ADD CONSTRAINT `arsip_ibfk_1` FOREIGN KEY (`lemari`) REFERENCES `lemari` (`id_lemari`),
  ADD CONSTRAINT `arsip_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `arsip_ibfk_3` FOREIGN KEY (`lokasi`) REFERENCES `lokasi` (`id_lokasi`);

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `bayar_ibfk_2` FOREIGN KEY (`biaya`) REFERENCES `biaya` (`id_biaya`);

--
-- Constraints for table `hukuman`
--
ALTER TABLE `hukuman`
  ADD CONSTRAINT `hukuman_ibfk_1` FOREIGN KEY (`siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`pengajar`) REFERENCES `pengajar` (`id_pengajar`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`angkatan`) REFERENCES `angkatan` (`id_angkatan`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`angkatan`) REFERENCES `angkatan` (`id_angkatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
