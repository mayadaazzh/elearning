-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2023 pada 15.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nip` int(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `nohp` int(100) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `matkulampu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `username`, `password`, `nama`, `nip`, `alamat`, `nohp`, `foto`, `matkulampu`) VALUES
(1, 'muarifin', '$2y$10$nLD7MeDnTCD1VY2sWXtCwOv.8rExfOivzDfqU1Rfj50RRoGO.cmhu', 'muarifin', 12345678, 'mulyosari', 121414324, '', ''),
(2, 'maya', '123', 'maya', 12344342, 'gebang', 1234345, '', ''),
(3, 'pee', '$2y$10$WwZmTHDxLn5zriWM48OFAe3qB/mVdOxB3YSwtg8r7fGAs6b0W0N7u', '', 0, '', 0, '', ''),
(4, 'pe', '$2y$10$V7LUKstI9D0JxBdwH9Ei4.flAJ5qmjTvjFnDtj0u0Upnw9CiqAvFy', '', 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `NRP` varchar(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `Jurusan` varchar(25) NOT NULL,
  `Email_Student` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `No_HP` varchar(50) NOT NULL,
  `Asal_SMA` varchar(100) NOT NULL,
  `Matakuliahfav` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `username`, `password`, `NRP`, `Nama`, `Jenis_Kelamin`, `Jurusan`, `Email_Student`, `Alamat`, `No_HP`, `Asal_SMA`, `Matakuliahfav`, `foto`) VALUES
(10, '', '', '3122500001', 'Ade Hafis Rabbani', 'Laki-laki', 'Teknik Informatika', 'hafis@it.student.pens.ac.id', 'Gresik', '085830556606', 'SMKN 1 Cerme', 'Basis Data', '728066639_download.jpeg'),
(11, '', '', '3122500002', 'Nadila Aulya Salsabila Mirdianti ', 'Perempuan', 'Teknik Informatika', 'nadila@it.student.pens.ac.id', 'Kediri', '082335995643', 'SMAN 1 Patianrowo', 'Algoritma dan Struktur Data', '1069777090_download (1).jpeg'),
(12, '', '', '3122500003', 'Denti Widayanti', 'Perempuan', 'Teknik Informatika', 'denti@it.student.pens.ac.id', 'Sidoarjo', '089523304487', 'SMAN 3 Taruna Angkasa', 'Praktek Algoritma dan Struktur Data', '1562783865_download (2).jpeg'),
(13, '', '', '3122500004', 'Zahrotul Hidayah', 'Perempuan', 'Teknik Informatika', 'zahro@it.student.pens.ac.id', 'Lamongan', '085790342735', 'SMA NEGERI 1 BABAT ', 'Workshop Pemrograman Web', '1541849147_download (3).jpeg'),
(14, '', '', '3122500005', 'Gede Hari Yoga Nanda', 'Laki-laki', 'Teknik Informatika', 'gede@it.student.pens.ac.id', 'Tulungagung', '083135368657', 'SMAN 1 Boyolangu', 'Praktek Sistem Operasi', '716041120_download (4).jpeg'),
(15, '', '', '3122500006', 'Virgiawan Ivada Raksi Sekar Wibana', 'Laki-laki', 'Teknik Informatika', 'virgiawan@it.student.pens.ac.id', 'Tuban', '085236113808', 'SMAN JATIROGO', 'Praktek Basis Data', '1279705502_download (5).jpeg'),
(16, '', '', '3122500007', 'Irfan Akmal Ardianto', 'Laki-laki', 'Teknik Informatika', 'irfan@it.student.pens.ac.id', 'Palembang', '081274340490', 'SMA Plus Negeri 17 Palembang', 'Matematika', '294327494_download (6).jpeg'),
(17, '', '', '3122500008', 'Arsyita Devanaya Arianto', 'Perempuan', 'Teknik Informatika', 'arsyita@it.student.pens.ac.id', 'Surabaya', '085171620044', 'SMAN 17 Surabaya', 'Agama', '1404727208_download (7).jpeg'),
(18, '', '', '3122500009', 'Mirta Chadhirotin Nachlah', 'Perempuan', 'Teknik Informatika', 'mirta@it.student.pens.ac.id', 'Gresik', '089603443665', 'SMAN 1 Manyar', 'Kewarganegaraan', '622243367_download (8).jpeg'),
(19, '', '', '3122500010', 'Leody Zelvon Herliansa', 'Laki-laki', 'Teknik Informatika', 'leody@it.student.pens.ac.id', 'Tuban', '081331571335', 'SMAN 2 Tuban', 'Sistem Operasi', '1631365875_download (9).jpeg'),
(20, '', '', '3122500011', 'Ali Azhar Pradana Braveian', 'Laki-laki', 'Teknik Informatika', 'ali@it.student.pens.ac.id', 'Surabaya', '0895360141561', 'SMAN 12 Surabaya ', 'Basis Data', '180302570_download (10).jpeg'),
(21, '', '', '3122500012', 'Awal Raya', 'Laki-laki', 'Teknik Informatika', 'awal@it.student.pens.ac.id', 'Kediri', '081359200521', 'SMAN 1 Kediri', 'Algoritma dan Struktur Data', '684162092_download (11).jpeg'),
(22, '', '', '3122500013', 'Mahendra Khibrah Rabbani Sayyid', 'Laki-laki', 'Teknik Informatika', 'mahen@it.student.pens.ac.id', 'Surabaya', '08817934297', 'SMAN 5 Surabaya', 'Algoritma dan Struktur Data', '2113097158_download (12).jpeg'),
(23, '', '', '3122500014', 'Muhammad Iqbal Rahmatullah', 'Laki-laki', 'Teknik Informatika', 'iqbal@it.student.pens.ac.id', 'Sidoarjo', '081231685459', 'SMA Muhammadiyah 3 Tulangan ', 'Praktek Algoritma dan Struktur Data', '1237072007_download (13).jpeg'),
(24, 'maya', '$2y$10$V7LUKstI9D0JxBdwH9Ei4.flAJ5qmjTvjFnDtj0u0Upnw9CiqAvFy', '3122500015', 'Mayada Azizah', 'Perempuan', 'Teknik Informatika', 'mayada@it.student.pens.ac.id', 'Pasuruan', '081359049794', 'SMAN 1 Pandaan', 'Workshop Pemrograman Web', '1636602592_download (14).jpeg'),
(25, '', '', '3122500016', 'Gandi Rukmaning Ayu', 'Perempuan', 'Teknik Informatika', 'gandi@it.student.pens.ac.id', 'Lumajang', '083857864688', 'SMAN 3 LUMAJANG', 'Praktek Sistem Operasi', '474087848_download (15).jpeg'),
(26, '', '', '3122500017', 'Handaru Dwiki Yuntara', 'Laki-laki', 'Teknik Informatika', 'handaru@it.student.pens.ac.id', 'Trenggalek', '083896168416', 'SMA Negeri 1 Trenggalek', 'Praktek Basis Data', '1256183569_download (16).jpeg'),
(27, '', '', '3122500018', 'Adam Rasyid Nurmuhammad', 'Laki-laki', 'Teknik Informatika', 'adam@it.student.pens.ac.id', 'Surabaya', '08996086746', 'SMAN 1 SURABAYA', 'Matematika', '1471676160_download (17).jpeg'),
(28, '', '', '3122500019', 'Akmal Zidani Fikri', 'Laki-laki', 'Teknik Informatika', 'akmal@it.student.pens.ac.id', 'Surabaya', '087703133145', 'SMA Negeri 2 Surabaya', 'Agama', '1428315426_download (18).jpeg'),
(29, '', '', '3122500020', 'Adinda Zahra Qariru', 'Perempuan', 'Teknik Informatika', 'adinda@it.student.pens.ac.id', 'Malang', '081297901397', 'SMA Thursina IIBS', 'Kewarganegaraan', '1381122183_download (19).jpeg'),
(30, '', '', '3122500021', 'Mohammad Ilham Ramadani', 'Laki-laki', 'Teknik Informatika', 'ilham@it.student.pens.ac.id', 'Surabaya', '089699609041', 'SMAN 10 Surabaya', 'Sistem Operasi', '1054090003_download (20).jpeg'),
(31, '', '', '3122500022', 'Virginia Faiqoh', 'Perempuan', 'Teknik Informatika', 'virginia@it.student.pens.ac.id', 'Sidoarjo', '089515888419', 'SMKN 2 Buduran Sidoarjo ', 'Basis Data', '517380267_download (21).jpeg'),
(32, '', '', '3122500023', 'Masyitha Fahra Nabila', 'Perempuan', 'Teknik Informatika', 'masyitha@it.student.pens.ac.id', 'Tuban', '081216756463', 'SMAN 1 Tuban', 'Algoritma dan Struktur Data', '835734275_download (22).jpeg'),
(33, '', '', '3122500024', 'Muhamad Reza Muktasib', 'Laki-laki', 'Teknik Informatika', 'reza@it.student.pens.ac.id', 'Surabaya', '085649915406', 'SMAN 8 Surabaya', 'Praktek Algoritma dan Struktur Data', '1518671530_download (23).jpeg'),
(34, '', '', '3122500025', 'Adira Callysta', 'Perempuan', 'Teknik Informatika', 'adira@it.student.pens.ac.id', 'Mojokerto', '085716039986', 'SMAN 3 Mojokerto', 'Workshop Pemrograman Web', '2051206814_download (24).jpeg'),
(35, '', '', '3122500026', 'Shofira Izza Nurrohmah ', 'Perempuan', 'Teknik Informatika', 'shofira@it.student.pens.ac.id', 'Ngawi', '085608295984', 'MAN 2 Kota Madiun ', 'Praktek Sistem Operasi', '1916748807_download (25).jpeg'),
(36, '', '', '3122500027', 'Rifqi Rayita Dhiyaulhaq', 'Laki-laki', 'Teknik Informatika', 'rifqi@it.student.pens.ac.id', 'Ponorogo', '085746335238', 'SMAN 1 Ponorogo', 'Praktek Basis Data', '19437984_download (26).jpeg'),
(37, '', '', '3122500028', 'Bagus Bimo Prakoso', 'Laki-laki', 'Teknik Informatika', 'bagus@it.student.pens.ac.id', 'Tulungagung', '085645494404', 'SMAN 1 Boyolangu', 'Matematika', '496991702_download (27).jpeg'),
(38, '', '', '3122500030', 'Muhammad Syahrul Ramadhan ', 'Laki-laki', 'Teknik Informatika', 'syahrul@it.student.pens.ac.id', 'Sidoarjo', '08986367472', 'SMA Muhammadiyah 3 Tulangan ', 'Agama', '1097473241_download (28).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `materi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_dosen`, `title`, `materi`) VALUES
(20, 1, 'ASD', '885964704_Package Management-2023-rev.pdf'),
(22, 1, 'wpw', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_pengumpulan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id_pengumpulan` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `deadline` datetime NOT NULL,
  `nilai` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_dosen`, `judul`, `deskripsi`, `deadline`, `nilai`, `file`) VALUES
(3, 1, 'ASD PRAKTIKUM 1', 'Kerjakan ya', '2023-05-27 14:23:00', 0, '232626755_LAPORAN PRAKTIKUM 14.docx');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_pengumpulan` (`id_pengumpulan`);

--
-- Indeks untuk tabel `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD PRIMARY KEY (`id_pengumpulan`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`,`id_tugas`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_dosen_2` (`id_dosen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id_pengumpulan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_pengumpulan`) REFERENCES `pengumpulan` (`id_pengumpulan`);

--
-- Ketidakleluasaan untuk tabel `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD CONSTRAINT `pengumpulan_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `pengumpulan_ibfk_2` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`);

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
