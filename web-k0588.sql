-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 03:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-s0j239`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'About Us YourBeuty', '<p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p><p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p>', 'assets/images/About-1689365919-600.jpg', '2023-07-15 03:47:40', '2023-07-15 03:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `level` enum('Superadmin','Administrator') NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `foto`, `level`, `password`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'assets/images/Admin-1689374418-909.png', 'Superadmin', '25d55ad283aa400af464c76d713c07ad', '2023-07-15 05:40:18', '2023-07-15 05:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `kode_invoice` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `status` enum('0','1','2','3','4') NOT NULL,
  `tgl_acara` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `kode_invoice`, `user_id`, `rekening_id`, `total`, `status`, `tgl_acara`, `created_at`, `updated_at`) VALUES
(8, 'INV20072023001', 1, 2, 2000000, '2', '2023-07-25', '2023-07-20 06:04:06', '2023-07-20 06:04:06'),
(9, 'INV20072023002', 1, 2, 5000000, '3', '2023-07-31', '2023-07-20 06:24:39', '2023-07-20 06:24:39'),
(10, 'INV20072023003', 1, 2, NULL, '0', NULL, '2023-07-20 07:07:51', '2023-07-20 07:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `mua`
--

CREATE TABLE `mua` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `jns_kelamin` enum('0','1') NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mua`
--

INSERT INTO `mua` (`id`, `nama`, `email`, `jns_kelamin`, `foto`, `no_telp`, `alamat`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Sarah Palmer', 'sarah@example.com', '0', 'assets/images/Mua-1689376849-345.png', '082147483647', '<p>Kp. Jauh</p>', 'sarahpalmer', '25d55ad283aa400af464c76d713c07ad', '2023-07-17 21:58:45', '2023-07-17 21:58:45'),
(3, 'Randy Salim', 'randy@gmail.com', '1', 'assets/images/Mua-1689604938-647.png', '08989591299', '<p>Jakarta</p>', 'randy_salim', '25d55ad283aa400af464c76d713c07ad', '2023-07-17 21:42:18', '2023-07-17 21:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `mua_id` int(11) NOT NULL,
  `nama_paket` varchar(250) NOT NULL,
  `gambar_paket` varchar(250) NOT NULL,
  `harga_paket` varchar(250) NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `mua_id`, `nama_paket`, `gambar_paket`, `harga_paket`, `deskripsi_paket`, `created_at`, `updated_at`) VALUES
(1, 2, 'Paket 1', 'assets/images/Gambar-Paket-1689380954-154.png', '2000000', '<p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p><p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p>', '2023-07-17 21:18:54', '2023-07-17 21:18:54'),
(3, 2, 'Paket 2', 'assets/images/Gambar-Paket-1689381180-324.png', '3000000', '<p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p><p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p>', '2023-07-17 21:18:43', '2023-07-17 21:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `bukti_pembayaran` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `invoice_id`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(3, 8, 'assets/images/Bukti-Pembayaran-1689807936-790.jpg', '2023-07-20 06:05:36', '2023-07-20 06:05:36'),
(4, 9, 'assets/images/Bukti-Pembayaran-1689809101-263.png', '2023-07-20 06:25:01', '2023-07-20 06:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `nama_rekening` varchar(250) NOT NULL,
  `no_rekening` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `nama_rekening`, `no_rekening`, `bank`, `created_at`, `updated_at`) VALUES
(2, 'Yourbeauty', '8712618901', 'BCA', '2023-07-19 08:25:56', '2023-07-19 08:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(250) NOT NULL,
  `logo_website` varchar(250) NOT NULL,
  `favicon_website` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `no_telp` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `google_map` varchar(250) NOT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `youtube` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_website`, `logo_website`, `favicon_website`, `email`, `no_telp`, `alamat`, `google_map`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, 'YourBeauty', 'assets/images/Logo-1689364431-978.png', 'assets/images/Favicon-1689364431-453.png', 'yourbeuty@example.com', '08123123123', '<p>Kota Bogor</p>', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126829.33545453408!2d106.7094893159979!3d-6.59501620309088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5b7ad0f824b%3A0x4c71fd1b0b8ae76d!2sKota%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `judul`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Welcome To Our Gift Shop', 'assets/images/Slider-1689368236-382.png', '<p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p>', '2023-07-15 03:58:52', '2023-07-15 03:58:52'),
(3, 'Welcome To Our Gift Shop 1', 'assets/images/Slider-1689369691-264.png', '<p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p>', '2023-07-15 04:21:31', '2023-07-15 04:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `mua_id` int(11) NOT NULL,
  `nama_toko` varchar(250) NOT NULL,
  `banner_toko` varchar(250) NOT NULL,
  `deskripsi_toko` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `mua_id`, `nama_toko`, `banner_toko`, `deskripsi_toko`, `created_at`, `updated_at`) VALUES
(2, 2, 'Sarah Foundation', 'assets/images/Banner-Toko-1689379359-754.jpg', '<p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p><p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p>', '2023-07-15 07:23:38', '2023-07-15 07:23:38'),
(3, 3, 'Randy Beauty', 'assets/images/Banner-Toko-1689710116-433.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,</p>', '2023-07-19 02:55:16', '2023-07-19 02:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `invoice_id`, `paket_id`, `created_at`, `updated_at`) VALUES
(9, 8, 1, '2023-07-20 06:04:06', '2023-07-20 06:04:06'),
(10, 9, 1, '2023-07-20 06:24:39', '2023-07-20 06:24:39'),
(11, 9, 3, '2023-07-20 06:24:50', '2023-07-20 06:24:50'),
(12, 10, 3, '2023-07-20 07:07:51', '2023-07-20 07:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `jns_kelamin` enum('0','1') NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `jns_kelamin`, `foto`, `no_telp`, `alamat`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rudi Salim', 'rudi@gmail.com', '1', 'assets/images/Pelanggan-1689722060-458.png', '08989591299', '<p>Kp. Juah</p>', 'rudisalim123', '25d55ad283aa400af464c76d713c07ad', '2023-07-19 05:32:05', '2023-07-19 06:14:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mua`
--
ALTER TABLE `mua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mua`
--
ALTER TABLE `mua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `invoice_id` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
