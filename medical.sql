-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 03:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'user.png',
  `status_login` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `jenis_kelamin`, `email`, `alamat`, `no_hp`, `foto`, `status_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'mutia ', 'Perempuan', 'mutia23.mr@gmail.com', 'bulaan kamba', '085282406642', 'foto8627.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(200) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `penulis`, `judul`, `isi_artikel`, `tanggal`, `gambar`) VALUES
(1, 'Artikel Indonesia  ', 'Cara Lari yang Baik di Siang Hari dan Dampaknya bagi Kesehatan', '     Lari adalah olahraga yang sederhana, murah, dan mudah untuk dilakukan. Orang biasanya berlari pada pagi atau sore hari. Bagaimana dengan lari pada siang hari? Apakah manfaat lari siang hari? nah kita di sini akan mengulas bahaya lari di siang hari bagi kesehatan yang harus anda ketahui.\r\n     Banyak orang memanfaatkan olahraga lari untuk menurunkan berat badan karena cara ini dianggap tidak sulit untuk dilakukan. Tapi ternyata, lari juga harus dilakukan dengan cara yang benar.\r\n\r\nCara Lari di Siang Hari\r\n~ Gunakan sepatu lari. Jangan sekali-kali menggunakan sendal untuk berlari. Hal itu beresiko menyebabkan cidera, kaki terasa berat, dan kram.\r\n~ Pilih pakaian yang tepat. Banyak orang berlari menggunakan pakaian yang panas agar menghasilkan lebih banyak keringat. Ini merupakan cara yang salah. Pakailah pakaian yang efektif menyerap keringat dan juga nyaman untuk Anda.\r\n~ Agar tidak mudah lelah, berlarilah dengan cara menapakkan setengah kaki saja seperti berjingkat.\r\n~ Bernafas dengan cara yang tepat untuk melatih pernafasan dan jantung. Bernafas lah hanya dengan menggunakan hidung. Tarik nafas selama 3 detik lalu keluarkan, tarik nafas lagi lalu keluarkan.\r\n~ Lakukan lari dalam durasi 45 menit. Lakukan setiap hari. Hal ini agar Anda terbiasa. Saat pertama mungkin terasa berat, jika Anda tidak kuat maka larilah sekuat Anda dan menambahkan durasi berlari seiring berjalannya waktu hingga Anda bisa konstan melakukan lari dalam durasi 45 menit. Lakukan sesuai kemampuan, 3 hingga 4 kali lari dalam seminggu sudah bagus.\r\n~ Setelah berlari, luruskan kaki dan minum 2 gelas air. Selanjutnya jika keringat sudah tidak keluar silakan lanjutkan dengan mandi.\r\n~ Tidak perlu tergesa-gesa saat berlari karena Anda tidak sedang berlomba. Lakukan dengan kecepatan normal, nikmati, dan lihat hasilnya.\r\n\r\nBagaimana dengan lari pada siang hari?\r\n     Lari ternyata tidak selalu bisa memberikan dampak positif. Banyak orang menganggap berkeringat adalah hal utama agar berat badan turun. Selain itu, saat berlari muncul anggapan bahwa semakin keras kerja tubuh maka semakin kuat daya tahan tubuh tersebut.\r\n\r\nTernyata hal itu cukup berbahaya untuk dilakukan!!!!\r\n     Amati perubahan pada tubuh Anda saat berolahraga. Saat itu suhu tubuh Anda akan meningkat dan Anda akan merasakan panas tubuh tersebut. Secara alami, sistem tubuh bekerja agar tubuh selalu ada pada kondisi normal. Dengan kata lain, saat suhu tubuh meningkat, maka sistem akan melakukan fungsi untuk menjaga suhu tubuh agar tetap normal. Panas tubuh akan diserap dan proses penguapan keringat menjaga agar suhu tubuh tetap normal.\r\n     Selain itu, Anda juga perlu memperhatikan apakah keringat tersebut benar-benar mengurangi berat badan Anda? Penurunan berat badan sementara terjadi saat tubuh kehilangan cairan, sehingga saat Anda minum, berat badan akan kembali seperti semula.\r\n\r\nPenurunan Berat Badan\r\n     Penurunan berat badan yang sebenarnya adalah ketika kalori terbakar. Dan yang perlu dilakukan adalah olahraga dengan cara yang tepat.\r\n     Beberapa orang lari dengan menggunakan jaket agar berkeringat lebih banyak. Dengan menggunakan jaket akan membuat proses penguapan keringat terhambat sehingga akan lebih mudah terkena heat stroke. Selain itu, juga ada resiko dehidrasi karena terlalu banyak mengeluarkan cairan tubuh. Ciri-cirinya adalah pusing, pandangan yang berkunang-kunang, tangan dingin, bahkan hingga pingsan.\r\n     Berolahraga memang baik, tapi lakukan dengan cara yang tepat. Menurut beberapa dokter, tidak apa melakukan lari di siang hari asalkan tidak memaksakan diri karena waktu luang yang dimiliki seseorang berbeda-beda. Selain berolahraga, tentunya Anda juga harus membiasakan diri untuk mengkonsumsi makanan sehat.', '2020-05-30 10:46:02', 'artikel6107.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `judul_banner` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul_banner`, `deskripsi`) VALUES
(1, 'Kebersihan', 'Menjaga kebersihan demi generasi masa depan yang cerah '),
(2, 'Kesehatan', 'Kesehatan adalah anugerah paling mahal yang bisa kita dapatkan');

-- --------------------------------------------------------

--
-- Table structure for table `contoh`
--

CREATE TABLE `contoh` (
  `id_medis` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'user.png',
  `sip` varchar(50) NOT NULL,
  `str` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(200) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `keterangan`, `gambar`) VALUES
(1, 'IGD (Instalasi Gawat Darurat)', 'Instalasi Gawat Darurat adalah salah satu bagian di rumah sakit yang menyediakan penanganan awal bagi pasien yang menderita sakit dan cedera, yang dapat mengancam kelangsungan hidupnya.', 'fasilitas8486.jpg'),
(3, 'Kamar Operasi', 'Kamar operasi adalah suatu unit khusus di rumah sakit, tempat untuk melakukan tindakan pembedahan, baik elektif maupun akut, yang membutuhkan keadaan suci hama (steril).', 'fasilitas1993.jpg'),
(4, 'Instalasi Farmasi', 'Instalasi Farmasi adalah suatu unit di rumah sakit yang merupakan fasilitas penyelenggaraan kefarmasian di bawah pimpinan seorang Apoteker dan memenuhi persyaratan secara hukum untuk mengadakan, menyediakan, dan mengelola seluruh aspek penyediaan perbekalan kesehatan di rumah sakit. ', 'fasilitas4892.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `kategori`) VALUES
(0, '-', ''),
(1, 'Cek Darah', 'Laboratorium'),
(2, 'Cek Gula', 'Laboratorium'),
(3, 'Ganti Perban', 'Perawatan');

-- --------------------------------------------------------

--
-- Table structure for table `medis`
--

CREATE TABLE `medis` (
  `id_medis` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_medis` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'user.png',
  `bagian_tugas` enum('Rumah Sakit','Puskesmas','Klinik','Poliklinik') NOT NULL,
  `status_medis` enum('Dokter','Perawat','Bidan') NOT NULL,
  `sip` varchar(100) NOT NULL,
  `str` varchar(100) NOT NULL,
  `stb` varchar(100) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `status_verifikasi` enum('Terverifikasi','Belum Terverifikasi') NOT NULL,
  `status_login` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medis`
--

INSERT INTO `medis` (`id_medis`, `username`, `password`, `nama_medis`, `jenis_kelamin`, `email`, `alamat_lengkap`, `no_hp`, `umur`, `foto`, `bagian_tugas`, `status_medis`, `sip`, `str`, `stb`, `ijazah`, `ktp`, `status_verifikasi`, `status_login`) VALUES
(7, 'mutia23', 'c96a5ccb86bd3e18ff765e54da3a0866', 'mutia', 'Perempuan', 'mutia23.mr@gmail.com', 'bandung', '085374681923', '22', 'foto464.JPG', 'Puskesmas', 'Perawat', 'sip4815.jpg', 'str3603.jpg', 'stb1744.jpg', 'ijazah8316.jpg', 'ktp9968.jpg', 'Terverifikasi', '0'),
(11, '0', '0', 'deni ', 'Laki-laki', 'denigunjo@gmail.com', 'jakbar jakbar jakbar jakbar jakbar jakbar jakbar jakbar jakbar jakbar jakbar jakbar jakbar jakbar', '081338736597', '26', 'foto906.jpg', 'Rumah Sakit', 'Dokter', 'sip3523.png', 'str2226.jpg', 'stb8898.jpg', 'ijazah9958.jpg', 'ktp6392.jpg', 'Terverifikasi', '0'),
(14, 'aryputra', 'ee351be81bdc737a5e0475538200e6ea', 'ary putra', 'Laki-laki', 'aryputra2504@gmail.com', 'jakarta', '081297871837', '28', 'foto1759.jpeg', 'Klinik', 'Perawat', 'sip3483.jpg', 'str3055.jpg', 'stb629.jpg', 'ijazah765.jpg', 'ktp6166.png', 'Belum Terverifikasi', '0'),
(15, 'reninov', 'da4266c789cabe150b54a57206003cc9', 'reni novarita', 'Perempuan', 'reninovarita@gmail.com', 'bekasi', '081363137766', '43', 'user.png', 'Poliklinik', 'Bidan', 'sip2153.png', 'str8147.jpg', 'stb1171.jpg', 'ijazah1495.jpg', 'ktp7175.jpg', 'Belum Terverifikasi', '0'),
(18, 'roni', 'd78b154c99fe7f06ebc02ebd63d1c87c', 'roni mursyid', 'Laki-laki', 'roni@gmail.com', 'tanggerang', '085467664322', '20', 'user.png', 'Rumah Sakit', 'Dokter', 'sip4610.jpg', 'str8148.jpg', 'stb5967.jpg', 'ijazah542.jpg', 'ktp507.jpg', 'Belum Terverifikasi', '0');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `golongan` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `bentuk` text NOT NULL,
  `manfaat` text NOT NULL,
  `dikonsumsi_oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `golongan`, `kategori`, `bentuk`, `manfaat`, `dikonsumsi_oleh`) VALUES
(0, '-', '', '', '', '', ''),
(1, 'neurobion', 'vitamin', 'obat bebas dan obat resep', 'tablet dan suntik', 'menjaga kesehatan sistem saraf', 'dewasa dan lansia'),
(2, 'paracetamol', 'oban penurun panas dan pereda nyeri', 'obat bebas', 'tablet, kaplet, sirup, drop, infus, dan suppositor', 'meredakan rasa sakit dan demam', 'dewasa dan anak-anak'),
(3, 'dermatix', 'obat luar', 'obat bebas', 'gel', 'menghaluskan bekas luka', 'anak-anak hingga orang dewasa'),
(4, 'bisolvon', 'mukolitik (pengencer dahak)', 'obat bebas', 'tablet dan sirop', 'meredakan batuk yang disertai dahak', 'dewasa dan anak-anak (usia di atas 2 tahun)'),
(5, 'carvedilol', 'penghambat beta', 'obat resep', 'tablet', 'mengatasi hipertensi, mengatasi angina, salah satu pengobatan gagal jantung ', 'dewasa '),
(6, 'melanox', 'krim pemutih kulit (krim pencerah kulit)', 'obat resep', 'krim', 'mengatasi hiperpigmentasi kulit (misalnya flek hitam atau bekas jerawat)', 'dewasa dan anak-anak berusia > 12 tahun'),
(7, 'kalpanax', 'anti jamur', 'obat bebas', 'krim, salep, dan cair', 'mengatasi jamur kulit, seperti panu, kutu air, dan kurap', 'dewasa'),
(8, 'gentamicin', 'antibiotik', 'obat resep', 'injeksi, tetes (tincture), krim, dan salep', 'mengobati dan mencegah infeksi pada jamur', 'dewasa dan anak-anak'),
(9, 'estazolam', 'obat penenang golongan benzodiazepin', 'obat resep', 'tablet', 'menangani insomnia', 'dewasa'),
(10, 'nitrogliserin', 'nitrat', 'obat resep', 'tablet minum, tablet sublingual, suntika', 'meredakan dan mencegah serangan angina pada penderita penyakit jantung koroner', 'dewasa');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'user.png',
  `status_login` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `username`, `password`, `nama_pasien`, `jenis_kelamin`, `email`, `alamat_lengkap`, `no_hp`, `umur`, `foto`, `status_login`) VALUES
(2, 'nabila20', '24603b5c9b637ae90a4367d77f426a42', 'annisa azka nabila', 'Perempuan', 'nabila20@gmail.com', 'ladang laweh', '082171748719', '11', 'user.png', '0'),
(6, '0', '0', 'ahmad fikri', 'Laki-laki', 'fikri@gmail.com', 'bogor', '081990216901', '15', 'foto2323.JPG', '0');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `deskripsi`, `jadwal`, `no_hp`, `email`, `alamat`, `twitter`, `facebook`, `instagram`) VALUES
(1, 'PT. Arkamaya', 'Arkamaya berlokasi di Jakarta Selatan dan memiliki cabang di Bandung dan Tangerang', 'Senin - Jumat, 8.00 - 17.00', '081802152157', 'info@arkamaya.co.id', 'Jl. Guntursari Wetan No.17, Turangga, Lengkong, Kota Bandung, Jawa Barat 40286', 'https://twitter.com/ptarkamaya', 'http://www.facebook.com/ptarkamaya/', 'http://www.instagram.com/ptarkamaya/');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_medis` int(11) NOT NULL,
  `id_obat_1` int(11) NOT NULL,
  `id_obat_2` int(11) NOT NULL,
  `id_obat_3` int(11) NOT NULL,
  `id_obat_4` int(11) NOT NULL,
  `id_obat_5` int(11) NOT NULL,
  `id_layanan_1` int(11) NOT NULL,
  `id_layanan_2` int(11) NOT NULL,
  `desk_gejala` varchar(100) NOT NULL,
  `jumlah_obat_1` varchar(5) NOT NULL DEFAULT '0',
  `jumlah_obat_2` varchar(5) NOT NULL DEFAULT '0',
  `jumlah_obat_3` varchar(5) NOT NULL DEFAULT '0',
  `jumlah_obat_4` varchar(5) NOT NULL DEFAULT '0',
  `jumlah_obat_5` varchar(5) NOT NULL DEFAULT '0',
  `total_obat` varchar(20) NOT NULL,
  `harga_layanan_1` varchar(20) NOT NULL DEFAULT '0',
  `harga_layanan_2` varchar(20) NOT NULL DEFAULT '0',
  `total_layanan` varchar(20) NOT NULL DEFAULT '0',
  `harga_medis` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `status_transaksi` enum('Diproses','Selesai') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pasien`, `id_medis`, `id_obat_1`, `id_obat_2`, `id_obat_3`, `id_obat_4`, `id_obat_5`, `id_layanan_1`, `id_layanan_2`, `desk_gejala`, `jumlah_obat_1`, `jumlah_obat_2`, `jumlah_obat_3`, `jumlah_obat_4`, `jumlah_obat_5`, `total_obat`, `harga_layanan_1`, `harga_layanan_2`, `total_layanan`, `harga_medis`, `total_bayar`, `status_transaksi`, `tanggal`) VALUES
(3, 2, 7, 3, 1, 2, 0, 0, 3, 2, 'hghghghggfgfgf', '1', '15', '15', '', '', '60000', '15000', '34000', '49000', '950000', '1059000', 'Diproses', '2020-05-27 03:18:32'),
(4, 6, 14, 7, 3, 0, 0, 0, 0, 0, ' gfgfgfgfg', '2', '3', '', '', '', '50000', '', '', '0', '75000', '125000', 'Selesai', '2020-06-07 06:25:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `contoh`
--
ALTER TABLE `contoh`
  ADD PRIMARY KEY (`id_medis`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `medis`
--
ALTER TABLE `medis`
  ADD PRIMARY KEY (`id_medis`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_medis` (`id_medis`),
  ADD KEY `id_obat` (`id_obat_1`),
  ADD KEY `id_layanan` (`id_layanan_1`),
  ADD KEY `id_obat_2` (`id_obat_2`),
  ADD KEY `id_obat_3` (`id_obat_3`),
  ADD KEY `id_obat_4` (`id_obat_4`),
  ADD KEY `id_obat_5` (`id_obat_5`),
  ADD KEY `id_layanan_2` (`id_layanan_2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contoh`
--
ALTER TABLE `contoh`
  MODIFY `id_medis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medis`
--
ALTER TABLE `medis`
  MODIFY `id_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_medis`) REFERENCES `medis` (`id_medis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_obat_1`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_obat_2`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_obat_3`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_6` FOREIGN KEY (`id_obat_4`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_7` FOREIGN KEY (`id_obat_5`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_8` FOREIGN KEY (`id_layanan_1`) REFERENCES `layanan` (`id_layanan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_9` FOREIGN KEY (`id_layanan_2`) REFERENCES `layanan` (`id_layanan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
