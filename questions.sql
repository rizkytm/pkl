-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 09:48 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `nomor`, `category_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Profil lembaga (nama lembaga, alamat, kapan berdiri, kapan mulai beroperasi, siapa pendiri dst.)', '2018-08-01 23:49:14', '2018-08-01 23:49:14'),
(2, 2, 1, 'Sebutkan sarana dan prasarana yang dimiliki? Statusnya seperti apa (milik lembaga sewa, dll.) Apakah memadai?', '2018-08-01 23:49:25', '2018-08-01 23:49:25'),
(3, 3, 1, 'Mohon dijelaskan luas wilayah layanan yang diberikan lembaga kepada masyarakat?', '2018-08-01 23:49:41', '2018-08-01 23:49:41'),
(4, 4, 1, 'Berapa jumlah tutor/guru?', '2018-08-01 23:49:49', '2018-08-01 23:49:49'),
(5, 5, 1, 'Berapa jumlah tutor/guru?', '2018-08-01 23:49:50', '2018-08-01 23:49:50'),
(6, 6, 1, 'Berapa Jumlah warga belajar/peserta didik?', '2018-08-01 23:50:01', '2018-08-01 23:50:01'),
(7, 7, 1, 'Berapa jumlah lulusan? Seperti apa kondisi lulusan saat ini? (adakah perubuhan dibandingkan sebelum menjadi peserta didik lembaga?', '2018-08-01 23:50:11', '2018-08-01 23:50:11'),
(8, 8, 1, 'Mohon diceritakan kondisi masyarakat & sekitar lembaga (ekonomi, pendidikn sosial, dll. Saat ini?', '2018-08-01 23:50:32', '2018-08-01 23:50:32'),
(9, 9, 1, 'Apa alasan yang melatarbelakangi Anda mendirikan lembaga?', '2018-08-01 23:50:42', '2018-08-01 23:50:42'),
(10, 10, 1, 'Mohon dijelaskan seperti apa kondisi masyarakat sebelum lembaga ini berdiri?', '2018-08-01 23:51:37', '2018-08-01 23:51:37'),
(11, 11, 1, 'Mohon diceritakan seperti apa perjuangan merintis lembaga?', '2018-08-01 23:51:56', '2018-08-01 23:51:56'),
(12, 12, 1, 'Tantangan apa yang dihadapi ketika merintis lembags? Apa yang dilakukan untuk mengatasi kendala yang dimaksud?', '2018-08-01 23:52:05', '2018-08-01 23:52:05'),
(13, 13, 1, 'Mohon dijelaskan seperti apa sikap masyarakat ketika mengetahui Anda akan mendirikan lembaga? Adakah penolakan/kecurigan? Adakah pihak yang mendukung proses pendirian lembaga? Siapa? Seporti apu bentuk dukungannya?', '2018-08-01 23:52:32', '2018-08-01 23:52:32'),
(14, 14, 1, 'Mohon dijelaskan, seperti apa pendekatan yang dilakukan untuk meyakinian masyarakat/tokoh masyarakat agar memercayai lembaga yang Anda rintis?', '2018-08-01 23:52:43', '2018-08-01 23:52:43'),
(15, 15, 1, 'Sebutkan dan jelaskan program yang diselenggarakan lembaga? Alsan mengapa program ini dipilih?', '2018-08-01 23:52:54', '2018-08-01 23:52:54'),
(16, 16, 1, 'Mohon dijelaskan mekanisme yang ditempuh pengelola dalam merancang program?', '2018-08-01 23:53:08', '2018-08-01 23:53:08'),
(17, 17, 1, 'Mohon dijelaskan seperti apa penoalan yang dihadapi dalam pelaksanaan progam?', '2018-08-01 23:53:16', '2018-08-01 23:53:16'),
(18, 18, 1, 'Apa yang membedakan lembaga Anda dengan lembaga lainnya yang sejenis? Apa yang menjadi ciri khas lembaga?', '2018-08-01 23:53:24', '2018-08-01 23:53:24'),
(19, 19, 1, 'Sebutkan program inovasi unggulan yang dilaksnakan? Mohon djelaskan!', '2018-08-01 23:53:36', '2018-08-01 23:53:36'),
(20, 20, 1, 'Seperti apa pelaksanaannya? Apakah ada kendala?', '2018-08-01 23:54:00', '2018-08-01 23:54:00'),
(21, 21, 1, 'Seperti apa dampaknya kepada masyarakat? Seperti apa keberlanjutan program ini?', '2018-08-01 23:54:10', '2018-08-01 23:54:10'),
(22, 22, 1, 'Apakah lembaga membuka peluang untuk masyarakat sekitar ikut terlibat pada grrakan yang diselenggarakan lembaka? Seperti apa respons masyarakat? Seperti apa dukungan mereka?', '2018-08-01 23:54:21', '2018-08-01 23:54:21'),
(23, 23, 1, 'Selain tutor/guru adakah relawan yang ikut membatu program lembaga?', '2018-08-01 23:54:34', '2018-08-01 23:54:34'),
(24, 24, 1, 'Mobon sebutkan kemitraan yang berhasil dijalin oleh lembaga?', '2018-08-01 23:54:44', '2018-08-01 23:54:44'),
(25, 25, 1, 'Bagaimana cara Anda membina dan memerluas kemitraan? Mohon dijelaskan seperti apa kemitran yang dijalankan?', '2018-08-01 23:54:51', '2018-08-01 23:54:51'),
(26, 26, 1, 'Seperti apa dukungan pemerintah daerah, terutama Dinas Pendikan? Adakah kebijakan yang mendukung/memperkuat lembaga? Adakah dukungan berupa anggaran?', '2018-08-01 23:54:59', '2018-08-01 23:54:59'),
(27, 27, 1, 'Secara umum, bagaimana dukungan pemerintah daerah terhadap PAUD dan Dikmas di Kota/Kabupaten Anda?', '2018-08-01 23:55:07', '2018-08-01 23:55:07'),
(28, 28, 1, 'Apakah selama ini pengelola/pegiat dilibatkan dalam menyusun kebijakan?', '2018-08-01 23:55:14', '2018-08-01 23:55:14'),
(29, 29, 1, 'Bagaimana cara Anda menjaga eksistensi lembaga?', '2018-08-01 23:55:24', '2018-08-01 23:55:24'),
(30, 30, 1, 'Adakah upaya untuk meningkatkan kapasitas lembaga dan tutor? Mohon disebutkan dan jelaskan!', '2018-08-01 23:55:34', '2018-08-01 23:55:34'),
(31, 31, 1, 'Apa saja prestasi yang diraih oleh lembaga?', '2018-08-01 23:55:41', '2018-08-01 23:55:41'),
(32, 32, 1, 'Apa target yanig ingin/akan diraih oleh lembaga?', '2018-08-01 23:55:52', '2018-08-01 23:55:52'),
(33, 1, 2, 'Biodata (Nama, tempat dan tanggal lahir, jumlah anak, dll)', '2018-08-01 23:56:07', '2018-08-01 23:56:07'),
(34, 2, 2, 'Sebutkan latar belakang pendidikan?', '2018-08-01 23:56:18', '2018-08-01 23:56:18'),
(35, 3, 2, 'Pekerjaan/aktivitas selain menjadi tutor/guru PAUD dan Dikmas?', '2018-08-01 23:56:28', '2018-08-01 23:56:28'),
(36, 4, 2, 'Sejak kapan menjadi tutor guru PAUD dan Dikmas?', '2018-08-01 23:56:38', '2018-08-01 23:56:38'),
(37, 33, 2, 'Apa alasan Anda sehingga mau menjadi tutor/guru PAUD dan Dikmas?', '2018-08-01 23:56:49', '2018-08-01 23:56:49'),
(38, 34, 2, 'Mohon diceritakan pengalaman Anda ketika pertama kali menjalani tugas sebagai tutor guru PAUD dan Dikmas? Seperti apa perasaan Anda saat in?', '2018-08-01 23:56:58', '2018-08-01 23:56:58'),
(39, 5, 2, 'Apa yang biasa Anda lakukan dalam upaya pendekatan kepada warga belajar?', '2018-08-01 23:57:07', '2018-08-01 23:57:07'),
(40, 6, 2, 'Apa kesulitan yang dirasakan saat menjalankan tugas sebagai tutor/guru PAUD? Bagaimana Anda mengatasi kesulitan tersebut?', '2018-08-01 23:57:18', '2018-08-01 23:57:18'),
(41, 7, 2, 'Menurut pengalaman Anda seperti apa respons/penilaian masyarakat saat ini terhadap PAUD dan Dikmas?', '2018-08-01 23:57:26', '2018-08-01 23:57:26'),
(42, 8, 2, 'Sebutkan pengalaman paling berkesan (sedih, senang, haru, lucu) selama menjalankan tugas sebegai tutor/guru PAUD dan Dikmas? Mohon ceritakan!', '2018-08-01 23:57:39', '2018-08-01 23:57:39'),
(43, 9, 2, 'Berdasarkan pengalaman, Apa yang paling bernilai yang pemah Anda paroleh selama menjalani profesi sebagai tutor guru PAUD dan Dikmas?', '2018-08-01 23:57:58', '2018-08-01 23:57:58'),
(44, 35, 2, 'Berapa jumlah honor yang diterima sebougai tutor/guru PAUD dan Dikmas?', '2018-08-01 23:58:04', '2018-08-01 23:58:04'),
(45, 10, 2, 'Menurat Anda apakah jumlah honor itu layak/memadai?', '2018-08-01 23:58:13', '2018-08-01 23:58:13'),
(46, 11, 2, 'Menurut Anda kebijakan seperti apa yang bisa diterapkan untuk memajukan PAUD dan Dikmas di Indonesia umumnya di kota/kabupaten Anda khususnya?', '2018-08-01 23:58:20', '2018-08-01 23:58:20'),
(47, 1, 3, 'Biodata (nama, tempat/tgl/lahir, usia, dll)', '2018-08-01 23:58:38', '2018-08-01 23:58:38'),
(48, 2, 3, 'Apa pekerjaan anda?', '2018-08-01 23:58:46', '2018-08-01 23:58:46'),
(49, 3, 3, 'Sejak kapan mengikutí pembelajaran?', '2018-08-01 23:58:55', '2018-08-01 23:58:55'),
(50, 4, 3, 'Sebutkan alasan Anda tertarik/memilih belajar di lembaga nonformal?', '2018-08-01 23:59:07', '2018-08-01 23:59:07'),
(51, 5, 3, 'Dari mana Anda mengetahui keberadaan lembaga/program?', '2018-08-01 23:59:15', '2018-08-01 23:59:15'),
(52, 6, 3, 'Apa tujuan Anda mengikuti pogram?', '2018-08-01 23:59:23', '2018-08-01 23:59:23'),
(53, 7, 3, 'Apa yang Anda rasakan setelah mengkuti kegiatan pembelajaran di lembaga nonformal?', '2018-08-01 23:59:31', '2018-08-01 23:59:31'),
(54, 8, 3, 'Apakah Anda memperoleh manfaat dari program yang Anda ikuti? Apa manfaat yang dirasakan?', '2018-08-01 23:59:40', '2018-08-01 23:59:40'),
(55, 36, 3, 'Apakah Anda punya pengalaman menarik terkait pembelajaran di lembaga nonformal', '2018-08-01 23:59:53', '2018-08-01 23:59:53'),
(56, 37, 3, 'Apa target Anda setelah lulus ?', '2018-08-02 00:00:01', '2018-08-02 00:00:01'),
(57, 9, 3, 'Sebutkan masukan Anda terhadap pendidikan nonformal?', '2018-08-02 00:00:11', '2018-08-02 00:00:11'),
(58, 1, 4, 'Mohon digambarkan seperti apa kondisi PAUD dan Dikmas di kota/kabupaten Anda?', '2018-08-02 00:02:41', '2018-08-02 00:02:41'),
(59, 2, 4, 'Mohon digambarkan tren perkembangnya dari tahun ke tahun?', '2018-08-02 00:03:06', '2018-08-02 00:03:06'),
(60, 3, 4, 'Adakah kebijakan khusus untuk mendukung pengembangan PAUD dan Dikmas di kota/kabupaten Anda?', '2018-08-02 00:03:31', '2018-08-02 00:03:31'),
(61, 4, 4, 'Berapa jumlah PAUD? PKBM? TBM? LKP dan satuan pendidikan nonformal?', '2018-08-02 00:04:18', '2018-08-02 00:04:18'),
(62, 5, 4, 'Berapa alokasi anggaran untuk PAUD dan Dikmas ?', '2018-08-02 00:05:48', '2018-08-02 00:05:48'),
(63, 6, 4, 'Langkah /kebijakan yang dijalankan untuk memperkuat kapasitas pengelola/lembaga PAUD dan Dikmas?', '2018-08-02 00:06:22', '2018-08-02 00:06:22'),
(64, 7, 4, 'Persoalan apa yang dihadapi Dinas Pendidikan untuk mengembangkan dan meningkatkan kualitas penyelenggara PAUD dan Dikmas di kabupaten/kota Anda?', '2018-08-02 00:06:42', '2018-08-02 00:06:42'),
(65, 8, 4, 'Adakah inovasi pelayanan yang Anda dan jajaran Anda berikan kepada para pengelolalembaga PAUD dan Dikmas ?', '2018-08-02 00:07:03', '2018-08-02 00:07:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
