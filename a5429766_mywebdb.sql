/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.10-MariaDB : Database - a5429766_mywebdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`a5429766_mywebdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `a5429766_mywebdb`;

/*Table structure for table `berita` */

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `id_berita` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `id_kategori_berita` INT(11) NOT NULL,
  `slug_berita` VARCHAR(255) NOT NULL,
  `judul` VARCHAR(255) NOT NULL,
  `isi` TEXT NOT NULL,
  `status_berita` VARCHAR(20) NOT NULL,
  `jenis_berita` VARCHAR(20) NOT NULL,
  `gambar` VARCHAR(255) NOT NULL,
  `tanggal` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_berita`),
  UNIQUE KEY `slug_berita` (`slug_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `berita` */

insert  into `berita`(`id_berita`,`id_user`,`id_kategori_berita`,`slug_berita`,`judul`,`isi`,`status_berita`,`jenis_berita`,`gambar`,`tanggal`) values (5,1,1,'5-informasi-pengabdian-masyarakat','Informasi Pengabdian Masyarakat 2016','<p>Informasi Pengabdian Masyarakat</p>','publish','berita','JDSJ326.jpg','2016-08-30 14:59:56'),(6,1,1,'6-informasi-perkuliahan','Informasi Perkuliahan','<p>Informasi Perkuliahan,Informasi Perkuliahan,Informasi PerkuliahanInformasi Perkuliahan,Informasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi Perkuliahan,Informasi Perkuliahanvv,Informasi Perkuliahan,Informasi Perkuliahan,Informasi Perkuliahan,vInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi Perkuliahan</p>','publish','berita','JDSJ332.jpg','2016-08-30 16:32:10'),(7,1,1,'7-informasi-pelatihan-2016','Informasi Pelatihan 2016','<p>Informasi Perkuliahan,Informasi Perkuliahan,Informasi PerkuliahanInformasi Perkuliahan,Informasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi Perkuliahan,Informasi Perkuliahanvv,Informasi Perkuliahan,Informasi Perkuliahan,Informasi Perkuliahan,vInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi Perkuliahan</p>','publish','berita','JDSJ327.jpg','2016-08-31 09:54:13'),(8,1,1,'8-workshop-career','Workshop Career','<p>Informasi Perkuliahan,Informasi Perkuliahan,Informasi PerkuliahanInformasi Perkuliahan,Informasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi Perkuliahan,Informasi Perkuliahanvv,Informasi Perkuliahan,Informasi Perkuliahan,Informasi Perkuliahan,vInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi PerkuliahanInformasi Perkuliahan</p>','publish','berita','JDSJ334.jpg','2016-08-31 10:13:33');

/*Table structure for table `dokumen` */

DROP TABLE IF EXISTS `dokumen`;

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_dokumen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `slug_dokumen` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_dokumen` varchar(20) NOT NULL,
  `jenis_dokumen` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `dokumen` */

insert  into `dokumen`(`id_dokumen`,`id_kategori_dokumen`,`id_user`,`judul`,`slug_dokumen`,`isi`,`gambar`,`status_dokumen`,`jenis_dokumen`,`tanggal`) values (1,1,1,'Hasil Pengabdian Kelurahan Ragunan','1-hasil-pengabdian-kelurahan-ragunan','<p>adasd</p>','0420_Skel_to_Nusa_Mandiri.docx','publish','internal','2016-08-31 11:49:11'),(2,1,1,'Pengabdian Cengkareng','2-pengabdian-cengkareng','<p>dfsdfsdfsdf</p>','0420_Skel_to_Nusa_Mandiri1.docx','publish','external','2016-09-06 14:03:54');

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `keterangan` text,
  `posisi` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_galeri`),
  UNIQUE KEY `gambar` (`gambar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `galeri` */

insert  into `galeri`(`id_galeri`,`id_user`,`judul`,`keterangan`,`posisi`,`website`,`gambar`,`tanggal`) values (1,1,'Pengabdian Masyaraakat','<p>Pengabdian Masyarakat</p>','homepage','http://lppm.bsi.ac.id','cr_korindo_27_April_2016__4.jpg','2016-09-01 11:02:53'),(2,1,'Test Galeri','<p>adasdad</p>','galeri','http://lppm.ac.id','BROSUR_WII_QBIG_BSD_25-29_JULI_2016.jpg','2016-09-01 11:03:20'),(3,1,'Workshop ','<p>Workshop Career</p>','homepage','http://hardinal.id','cr_korindo_27_April_2016__1.jpg','2016-09-07 15:02:47');

/*Table structure for table `kategori_berita` */

DROP TABLE IF EXISTS `kategori_berita`;

CREATE TABLE `kategori_berita` (
  `id_kategori_berita` int(11) NOT NULL AUTO_INCREMENT,
  `slug_kategori` varchar(200) NOT NULL,
  `nama_kategori_berita` varchar(200) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_berita`),
  UNIQUE KEY `slug_kategori` (`slug_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kategori_berita` */

insert  into `kategori_berita`(`id_kategori_berita`,`slug_kategori`,`nama_kategori_berita`,`keterangan`,`urutan`) values (1,'pengumuman','Pengumuman','Berisi Pengumuman - Pengumuman',1),(2,'lowongan-kerja','Lowongan Kerja','Berisi Informasi Seputar Lowongan Kerja',2);

/*Table structure for table `kategori_dokumen` */

DROP TABLE IF EXISTS `kategori_dokumen`;

CREATE TABLE `kategori_dokumen` (
  `id_kategori_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `slug_kategori_dokumen` varchar(200) DEFAULT NULL,
  `nama_kategori_dokumen` varchar(200) NOT NULL,
  `keterangan` text,
  `urutan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kategori_dokumen` */

insert  into `kategori_dokumen`(`id_kategori_dokumen`,`slug_kategori_dokumen`,`nama_kategori_dokumen`,`keterangan`,`urutan`,`tanggal`) values (1,'hasil-pengabdian','Hasil Pengabdian','',2,'2016-08-31 11:31:14');

/*Table structure for table `konfigurasi` */

DROP TABLE IF EXISTS `konfigurasi`;

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,
  `namaweb` varchar(100) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `keyword` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `google_map` text,
  `metatext` text,
  `logo` varchar(200) DEFAULT NULL,
  `icon` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `konfigurasi` */

insert  into `konfigurasi`(`id_konfigurasi`,`namaweb`,`tagline`,`website`,`email`,`alamat`,`telepon`,`keyword`,`description`,`google_map`,`metatext`,`logo`,`icon`) values (2,'Hardinal Portal','SHare','http://hardinal.id','hardinal@hardinal.id','Jakarta','9078780978','hardinal','Portalny Berbagi','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7822541915225!2d106.81979284964439!3d-6.292323395423507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f21b0000000b%3A0xdfc0cf966f387901!2sSTMIK+Nusa+Mandiri+Warung+Jati!5e0!3m2!1sid!2sid!4v1473134064171\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','','Nusamandiri_Logo.jpg','KUPU-KUPU_copy.png');

/*Table structure for table `site` */

DROP TABLE IF EXISTS `site`;

CREATE TABLE `site` (
  `id_site` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_site` varchar(100) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_site`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `site` */

insert  into `site`(`id_site`,`id_user`,`nama_site`,`contact_person`,`telepon`,`hp`,`alamat`,`kota`,`email`,`keterangan`,`tanggal`) values (1,0,'My Portal','Hardinal','9897676383','68768588','JL. Pesona','Tangerang Selatan','hardinal.fahmi@gmail.com','Coba','2016-08-22 14:43:27'),(2,1,'Site Baru','','','','','Jakarta','baru@gmail.com','','2016-08-24 09:47:41');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id_site` int(11) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`nama`,`email`,`username`,`password`,`id_site`,`akses_level`,`gambar`,`id_admin`,`tanggal`) values (1,'Hardinal Keren','hardinal@gmail.com','justhardinal','7c222fb2927d828af22f592134e8932480637c0d',2,'user','',0,'2016-08-24 13:39:02');

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `keterangan` text,
  `posisi` varchar(20) DEFAULT NULL,
  `video` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_video`),
  UNIQUE KEY `video` (`video`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `video` */

insert  into `video`(`id_video`,`id_user`,`judul`,`keterangan`,`posisi`,`video`,`tanggal`) values (1,1,'TMNT','Film TMN 1987','galeri','KZn52EEeRk4','2016-09-06 14:50:00'),(3,1,'TMNT 1987','Part 2','homepage','0nerpVT6aFY','2016-09-06 14:51:11'),(4,1,'Import Netbean to Eclipse','Import Netbeans','homepage','Y1cCC8EqWqQ','2016-09-07 15:25:18');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
