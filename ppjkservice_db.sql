/*
Navicat MySQL Data Transfer

Source Server         : lokal
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ppjkservice_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-09-07 11:06:33
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `kb_belanja_reseller`
-- ----------------------------
DROP TABLE IF EXISTS `kb_belanja_reseller`;
CREATE TABLE `kb_belanja_reseller` (
  `no_faktur` varchar(25) NOT NULL DEFAULT '',
  `id_reseller` bigint(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total_belanja` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`no_faktur`),
  KEY `id_reseller` (`id_reseller`),
  CONSTRAINT `kb_belanja_reseller_ibfk_1` FOREIGN KEY (`id_reseller`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_belanja_reseller
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_belanja_reseller_detail`
-- ----------------------------
DROP TABLE IF EXISTS `kb_belanja_reseller_detail`;
CREATE TABLE `kb_belanja_reseller_detail` (
  `no_faktur` varchar(25) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_detail_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  KEY `no_faktur` (`no_faktur`),
  CONSTRAINT `kb_belanja_reseller_detail_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `kb_belanja_reseller` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_belanja_reseller_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_comments`
-- ----------------------------
DROP TABLE IF EXISTS `kb_comments`;
CREATE TABLE `kb_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10)),
  KEY `user_id` (`user_id`),
  CONSTRAINT `kb_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_comments
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_diskon_reseller`
-- ----------------------------
DROP TABLE IF EXISTS `kb_diskon_reseller`;
CREATE TABLE `kb_diskon_reseller` (
  `id_label` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `type_reseller` int(11) DEFAULT NULL,
  `id_diskon` int(11) NOT NULL AUTO_INCREMENT,
  `min_beli` int(11) DEFAULT NULL,
  `max_beli` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_diskon`),
  KEY `id_label` (`id_label`),
  CONSTRAINT `kb_diskon_reseller_ibfk_1` FOREIGN KEY (`id_label`) REFERENCES `kb_label_produk` (`id_label`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_diskon_reseller
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_isi_ulang_saldo`
-- ----------------------------
DROP TABLE IF EXISTS `kb_isi_ulang_saldo`;
CREATE TABLE `kb_isi_ulang_saldo` (
  `no_tf` int(30) NOT NULL DEFAULT '0',
  `tgl_tf` datetime DEFAULT NULL,
  `id_reseller` bigint(11) DEFAULT NULL,
  `id_admin` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`no_tf`),
  KEY `id_reseller` (`id_reseller`),
  CONSTRAINT `kb_isi_ulang_saldo_ibfk_1` FOREIGN KEY (`id_reseller`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_isi_ulang_saldo
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_jasa_ekspedisi`
-- ----------------------------
DROP TABLE IF EXISTS `kb_jasa_ekspedisi`;
CREATE TABLE `kb_jasa_ekspedisi` (
  `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT,
  `nm_ekspedisi` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  PRIMARY KEY (`id_ekspedisi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_jasa_ekspedisi
-- ----------------------------
INSERT INTO `kb_jasa_ekspedisi` VALUES ('1', 'jne', '1', '2016-07-25', '2016-07-25');
INSERT INTO `kb_jasa_ekspedisi` VALUES ('2', 'tiki', '1', '2016-07-25', null);
INSERT INTO `kb_jasa_ekspedisi` VALUES ('3', 'pos', '1', '2016-07-25', null);
INSERT INTO `kb_jasa_ekspedisi` VALUES ('5', 'jnt', '1', '2016-07-25', null);

-- ----------------------------
-- Table structure for `kb_label_produk`
-- ----------------------------
DROP TABLE IF EXISTS `kb_label_produk`;
CREATE TABLE `kb_label_produk` (
  `id_label` int(11) NOT NULL AUTO_INCREMENT,
  `nama_label` varchar(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_label`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_label_produk
-- ----------------------------
INSERT INTO `kb_label_produk` VALUES ('1', 'Green', null);

-- ----------------------------
-- Table structure for `kb_links`
-- ----------------------------
DROP TABLE IF EXISTS `kb_links`;
CREATE TABLE `kb_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_links
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_media`
-- ----------------------------
DROP TABLE IF EXISTS `kb_media`;
CREATE TABLE `kb_media` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(99) NOT NULL,
  `jenis` varchar(99) NOT NULL,
  `keterangan` varchar(99) NOT NULL,
  `gambar` varchar(99) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `author` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_image`),
  KEY `author` (`author`),
  KEY `kategori` (`kategori`),
  CONSTRAINT `kb_media_ibfk_1` FOREIGN KEY (`author`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kb_media_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `kb_media_type` (`id_media_cat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_media
-- ----------------------------
INSERT INTO `kb_media` VALUES ('1', 'Slider 1', 'Slider', '#', '/savanacms/uploads/images/slide_01.jpg', '/savanacms/uploads/.thumbs/images/slide_01.jpg', '1', '#', '1', '2016-06-23 11:27:23', '2016-06-23 11:32:44');
INSERT INTO `kb_media` VALUES ('2', 'JNE', 'pengiriman', 'JNE', '/savanacms/uploads/images/JNE-logo-gambar-coreldraw-cdr.jpg', '/savanacms/uploads/.thumbs/images/JNE-logo-gambar-coreldraw-cdr.jpg', '3', '#', '1', '2016-06-23 11:39:31', '2016-06-30 09:52:12');
INSERT INTO `kb_media` VALUES ('3', 'Tiki', 'Tiki', 'Tiki', '/savanacms/uploads/images/tiki-logo.jpg', '/savanacms/uploads/.thumbs/images/tiki-logo.jpg', '3', '#', '1', '2016-06-23 11:40:06', '2016-06-30 09:54:50');
INSERT INTO `kb_media` VALUES ('4', 'JnT', 'pengiriman', 'JnT', '/savanacms/uploads/images/Logo-JT-Express-140x130.jpg', '/savanacms/uploads/.thumbs/images/Logo-JT-Express-140x130.jpg', '3', '#', '1', '2016-06-23 11:44:34', '2016-06-30 09:55:16');
INSERT INTO `kb_media` VALUES ('5', 'Pos', 'pengiriman', 'Pos', '/savanacms/uploads/images/pos.png', '/savanacms/uploads/.thumbs/images/pos.png', '3', '#', '1', '2016-06-23 11:44:54', '2016-06-23 11:44:54');
INSERT INTO `kb_media` VALUES ('6', 'BCA', 'bank', 'BCA', '/savanacms/uploads/images/logobca-highres-bluliner-master-2011.jpg', '/savanacms/uploads/.thumbs/images/logobca-highres-bluliner-master-2011.jpg', '2', '#', '1', '2016-06-23 11:45:31', '2016-06-30 09:57:04');
INSERT INTO `kb_media` VALUES ('7', 'Mandiri', 'bank', 'Mandiri', '/savanacms/uploads/images/Lowongan-Kerja-Terbaru-Bank-Mandiri.jpg', '/savanacms/uploads/.thumbs/images/Lowongan-Kerja-Terbaru-Bank-Mandiri.jpg', '2', '#', '1', '2016-06-23 11:45:50', '2016-06-30 09:57:55');
INSERT INTO `kb_media` VALUES ('8', 'BRI', 'bank', 'BRI', '/savanacms/uploads/images/Logo%20BRI.jpg', '/savanacms/uploads/.thumbs/images/Logo%20BRI.jpg', '2', '#', '1', '2016-06-23 11:46:06', '2016-06-30 09:59:50');

-- ----------------------------
-- Table structure for `kb_media_type`
-- ----------------------------
DROP TABLE IF EXISTS `kb_media_type`;
CREATE TABLE `kb_media_type` (
  `id_media_cat` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(160) DEFAULT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_media_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_media_type
-- ----------------------------
INSERT INTO `kb_media_type` VALUES ('1', 'Slider', '1', '2016-05-16 02:24:32', '2016-05-16 02:24:32');
INSERT INTO `kb_media_type` VALUES ('2', 'Bank', '1', '2016-05-31 10:41:50', '2016-05-31 10:41:50');
INSERT INTO `kb_media_type` VALUES ('3', 'Pengiriman', '1', '2016-05-31 02:59:17', '2016-05-31 02:59:25');

-- ----------------------------
-- Table structure for `kb_menu`
-- ----------------------------
DROP TABLE IF EXISTS `kb_menu`;
CREATE TABLE `kb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_type` enum('module','page','post','url') NOT NULL DEFAULT 'url',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `idmodule` int(11) NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `uri` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dyn_group_id` int(11) NOT NULL DEFAULT '0',
  `position` enum('backend','frontend') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `is_parent` tinyint(1) NOT NULL DEFAULT '0',
  `show_menu` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dyn_group_id - normal` (`dyn_group_id`),
  KEY `module` (`idmodule`),
  CONSTRAINT `kb_menu_ibfk_1` FOREIGN KEY (`dyn_group_id`) REFERENCES `kb_menu_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_menu
-- ----------------------------
INSERT INTO `kb_menu` VALUES ('1', 'Dashboard', 'url', '0', '0', 'backend_panel/dashboard', '', '1', 'backend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('3', 'Pengaturan', 'url', '0', '0', '#', '', '1', 'backend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('4', 'Akun', 'module', '0', '1', 'user', '', '1', 'backend', null, '3', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('5', 'Grup akun', 'module', '0', '2', 'user_grup', '', '1', 'backend', null, '3', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('6', 'Menu', 'module', '0', '3', 'menu', '', '1', 'backend', null, '3', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('7', 'Grup menu', 'module', '0', '4', 'menu_grup', '', '1', 'backend', null, '3', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('10', 'Produk', 'module', '0', '5', 'produk', '', '1', 'backend', null, '38', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('13', 'Hak akses', 'module', '0', '6', 'permission', '', '1', 'backend', null, '3', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('14', 'Artikel', 'module', '0', '7', 'post', '', '1', 'backend', null, '20', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('19', 'Kategori Artikel', 'module', '0', '14', 'post_category', '', '1', 'backend', null, '20', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('20', 'Konten', 'module', '0', '0', '#', '', '1', 'backend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('21', 'Halaman', 'module', '0', '15', 'halaman', '', '1', 'backend', null, '20', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('22', 'Website', 'module', '0', '16', 'setting', '', '1', 'backend', null, '3', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('23', 'Testimonial', 'module', '0', '12', 'testimonial', '', '1', 'backend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('27', 'Media', 'module', '0', '20', 'media', '', '1', 'backend', null, '20', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('34', 'Kategori media', 'module', '0', '21', 'media_kat', '', '1', 'backend', null, '20', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('36', 'Pengaturan Widget', 'module', '0', '23', 'widgets', '', '1', 'backend', null, '3', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('37', 'Kategori Produk', 'module', '0', '24', 'produkkategori', '', '1', 'backend', null, '38', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('38', 'Katalog Produk', 'module', '0', '0', '#', '', '1', 'backend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('45', 'Profil', 'url', '0', '0', 'profile', '', '1', 'backend', null, '0', '0', '0', null);
INSERT INTO `kb_menu` VALUES ('60', 'Template', 'module', '0', '26', 'templatemanager', '', '1', 'backend', null, '3', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('62', 'Home', 'module', '0', '0', '', '', '1', 'frontend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('63', 'Profil', 'page', '0', '0', 'p/profil', 'profil', '1', 'frontend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('64', 'Peluang Usaha', 'page', '0', '0', 'p/peluang-usaha', 'peluang-usaha', '1', 'frontend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('65', 'Testimonial', 'page', '0', '0', 'p/testimonial', 'testimonial', '1', 'frontend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('66', 'Kontak', 'page', '0', '0', 'p/kontak', 'kontak', '1', 'frontend', null, '0', '1', '1', 'fa fa-caret-right');
INSERT INTO `kb_menu` VALUES ('67', 'Tim Kami', 'page', '0', '0', 'p/tim-kami', 'tim-kami', '1', 'frontend', null, '63', '0', '1', '');
INSERT INTO `kb_menu` VALUES ('68', 'Produk', 'page', '0', '0', 'p/produk', 'produk', '1', 'frontend', null, '0', '1', '1', 'fa fa-caret-right');

-- ----------------------------
-- Table structure for `kb_menu_group`
-- ----------------------------
DROP TABLE IF EXISTS `kb_menu_group`;
CREATE TABLE `kb_menu_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) DEFAULT NULL,
  `abbrev` varchar(160) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_menu_group
-- ----------------------------
INSERT INTO `kb_menu_group` VALUES ('1', 'Sidebar Menu', 'sidebar-menu');
INSERT INTO `kb_menu_group` VALUES ('2', 'Top Menu', 'top-menu');
INSERT INTO `kb_menu_group` VALUES ('4', 'Main Menu', 'main-menu');

-- ----------------------------
-- Table structure for `kb_modules`
-- ----------------------------
DROP TABLE IF EXISTS `kb_modules`;
CREATE TABLE `kb_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) DEFAULT NULL,
  `module_title` varchar(100) DEFAULT NULL,
  `module_note` varchar(255) DEFAULT NULL,
  `module_author` bigint(11) DEFAULT NULL,
  `module_created` datetime DEFAULT NULL,
  `module_desc` text,
  `module_tbl` varchar(100) DEFAULT NULL,
  `module_type` enum('core','addon','master') DEFAULT 'master',
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_modules
-- ----------------------------
INSERT INTO `kb_modules` VALUES ('1', 'user', 'akun', 'Pengaturan akun', '1', '2016-03-20 08:22:29', null, 'kb_users', 'core');
INSERT INTO `kb_modules` VALUES ('2', 'user_grup', 'grup akun', 'Pengaturan grup akun', '1', '2016-03-20 08:23:03', null, 'kb_user_type', 'core');
INSERT INTO `kb_modules` VALUES ('3', 'menu', 'menu', 'Pengaturan menu', '1', '2016-03-20 08:23:39', null, 'kb_menu', 'core');
INSERT INTO `kb_modules` VALUES ('4', 'menu_grup', 'grup menu', 'Pengaturan grup_menu', '1', '2016-03-20 08:24:11', null, 'kb_menu_groups', 'core');
INSERT INTO `kb_modules` VALUES ('5', 'produk', 'Produk', 'Manajemen Produk', '1', null, 'Manajemen Produk', 'kb_products', 'master');
INSERT INTO `kb_modules` VALUES ('6', 'permission', 'Permission', 'Modul Hak Akses', '1', null, 'Modul Hak Akses', 'kb_permission', 'core');
INSERT INTO `kb_modules` VALUES ('7', 'post', 'Post', 'Post', '1', null, 'Post', 'kb_posts', 'core');
INSERT INTO `kb_modules` VALUES ('8', 'reportsales', 'Report Sales', 'Modul Report Sales', '1', null, null, 'kb_target_sales', 'master');
INSERT INTO `kb_modules` VALUES ('9', 'reseller_controller', 'Reseller', 'Modul reseller', '1', null, null, 'kb_reseller_type', 'master');
INSERT INTO `kb_modules` VALUES ('10', 'reseller_diskon', 'Diskon Reseller', 'Modul diskon reseller', '1', null, null, 'kb_diskon_reseller', 'master');
INSERT INTO `kb_modules` VALUES ('11', 'salestarget', 'Target Sales', 'Modul Target sales', '1', null, null, 'kb_target_sales', 'master');
INSERT INTO `kb_modules` VALUES ('12', 'testimonial', 'Modul testimonial', 'Modul testimonial', '1', null, null, 'kb_testimonial', 'master');
INSERT INTO `kb_modules` VALUES ('13', 'updatesaldo', 'Update Saldo', 'Modul update saldo', '1', null, null, 'kb_saldo_updated', 'master');
INSERT INTO `kb_modules` VALUES ('14', 'post_category', 'Modul Post Kategori', 'Modul kategori postingan', '1', null, 'Modul kategori postingan', 'kb_post_category', 'core');
INSERT INTO `kb_modules` VALUES ('15', 'halaman', 'Halaman', 'Modul halaman', '1', '2016-04-12 20:08:19', 'Modul halaman admin', 'kb_posts', 'core');
INSERT INTO `kb_modules` VALUES ('16', 'setting', 'Pengaturan Website', 'Modul pengaturan website', null, null, 'Modul pengaturan website', 'kb_option', 'core');
INSERT INTO `kb_modules` VALUES ('17', 'label_produk', 'Label produk', 'Modul label produk', '1', null, null, 'kb_label_produk', 'master');
INSERT INTO `kb_modules` VALUES ('18', 'inputsaldo', 'Input saldo', 'modul input saldo', '1', null, null, 'kb_isi_ulang_saldo', 'master');
INSERT INTO `kb_modules` VALUES ('19', 'konfirmasipesanan', 'Konfirmasi pesanan', 'Modul konfirmasi pesanan', '1', null, null, 'kb_belanja_reseller', 'master');
INSERT INTO `kb_modules` VALUES ('20', 'media', 'Media', 'Modul Media', null, null, 'Modul Media', 'kb_media', 'addon');
INSERT INTO `kb_modules` VALUES ('21', 'media_kat', 'Kategori Media', 'Modul Kategori Media', '1', null, null, 'kb_media_type', 'master');
INSERT INTO `kb_modules` VALUES ('23', 'widgets', 'Widget', 'Modul Widget', null, null, 'Modul Widget', 'kb_widgets', 'master');
INSERT INTO `kb_modules` VALUES ('24', 'produkkategori', 'Kategori Produk', 'Moduk Kategori Produk', '1', null, 'Modul Kategori Produk', 'kb_products_category', 'master');
INSERT INTO `kb_modules` VALUES ('25', 'profile', 'Modul Profil', 'Modul Profil', '1', null, null, 'kb_user_detail', 'master');
INSERT INTO `kb_modules` VALUES ('26', 'templatemanager', 'Pengelola Template', 'Modul pengelola template', '1', null, null, 'kb_option', 'core');
INSERT INTO `kb_modules` VALUES ('27', 'ekspedisi', 'Jasa Ekspedisi', 'Modul Jasa Ekspedisi', null, null, 'Modul Jasa Ekspedisi', 'kb_jasa_ekspedisi', 'addon');
INSERT INTO `kb_modules` VALUES ('28', 'laporan_resi', 'Laporan Resi', 'Modul Laporan Resi Pengiriman', null, null, 'Modul Laporan Resi Pengiriman', 'kb_no_resi', 'addon');

-- ----------------------------
-- Table structure for `kb_no_resi`
-- ----------------------------
DROP TABLE IF EXISTS `kb_no_resi`;
CREATE TABLE `kb_no_resi` (
  `id_resi` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jasa_ekspedisi` int(11) DEFAULT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `alamat` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  PRIMARY KEY (`id_resi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_no_resi
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_option`
-- ----------------------------
DROP TABLE IF EXISTS `kb_option`;
CREATE TABLE `kb_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_title` varchar(255) DEFAULT NULL,
  `website_desc` text,
  `company_name` varchar(160) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `contact_email` varchar(160) DEFAULT NULL,
  `contact_phone` varchar(160) DEFAULT NULL,
  `contact_fax` varchar(160) DEFAULT NULL,
  `contact_cellphone` varchar(160) DEFAULT NULL,
  `meta_title` varchar(160) DEFAULT NULL,
  `meta_author` varchar(160) DEFAULT NULL,
  `meta_desc` text,
  `meta_keywords` text,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `sosmed_fb` varchar(255) DEFAULT NULL,
  `sosmed_twitter` varchar(255) DEFAULT NULL,
  `sosmed_gplus` varchar(255) DEFAULT NULL,
  `sosmed_linkedin` varchar(255) DEFAULT NULL,
  `sosmed_instagram` varchar(255) DEFAULT NULL,
  `bbm_pin` varchar(255) DEFAULT NULL,
  `whatsapp_no` varchar(160) DEFAULT NULL,
  `telegram_no` varchar(160) DEFAULT NULL,
  `google_analytics` text,
  `facebook_pixel` text,
  `template` varchar(255) DEFAULT NULL,
  `gmap_iframe` text,
  `token_fb` varchar(255) DEFAULT NULL,
  `token_twitter` varchar(255) DEFAULT NULL,
  `token_instagram` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_option
-- ----------------------------
INSERT INTO `kb_option` VALUES ('1', 'PPJK Services', 'Check, Do and Action', 'PPJK Services', 'Jl. Sarirasa No. 130/04', 'superadmin@ppjkservices.com', '08211231234', '', '08211231234', 'PPJK Services', 'PPJK Services', 'Check, Do and Action', 'ppjk services', '/ppjkservice/uploads/images/logo%20PPJK%20Services-png.png', '/ppjkservice/uploads/images/logo%20PPJK%20Services-png.png', 'https://www.facebook.com/ppjkservices/', '#', '#', '#', 'https://www.instagram.com/ppjkservices/', '', '08211231234', '08211231234', '', '', 'ppjkservice', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.090716450933!2d107.5770095064324!3d-6.8797348692280975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6836dc36b39%3A0x30e343df230476e6!2sJl.+Sarirasa+No.130%2C+Sarijadi%2C+Sukasari%2C+Kota+Bandung%2C+Jawa+Barat!5e0!3m2!1sid!2sid!4v1467088370818\" height=\"200\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '', '', '');

-- ----------------------------
-- Table structure for `kb_permission`
-- ----------------------------
DROP TABLE IF EXISTS `kb_permission`;
CREATE TABLE `kb_permission` (
  `id_module` int(11) DEFAULT NULL,
  `id_user_group` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_view` enum('false','true') DEFAULT 'false',
  `is_add` enum('false','true') DEFAULT 'false',
  `is_edit` enum('false','true') DEFAULT 'false',
  `is_delete` enum('false','true') DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `id_user_group` (`id_user_group`),
  KEY `id_module` (`id_module`),
  CONSTRAINT `kb_permission_ibfk_2` FOREIGN KEY (`id_user_group`) REFERENCES `kb_user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kb_permission_ibfk_3` FOREIGN KEY (`id_module`) REFERENCES `kb_modules` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_permission
-- ----------------------------
INSERT INTO `kb_permission` VALUES ('1', '1', '2', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('2', '1', '3', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('3', '1', '4', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('4', '1', '5', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('5', '1', '6', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('6', '1', '7', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('7', '1', '8', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('8', '1', '9', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('11', '1', '10', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('13', '1', '11', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('14', '1', '12', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('15', '1', '13', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('16', '1', '14', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('20', '1', '15', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('21', '1', '16', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('23', '1', '18', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('24', '1', '19', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('25', '1', '20', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('26', '1', '21', 'true', '', '', '');
INSERT INTO `kb_permission` VALUES ('1', '3', '22', 'true', 'false', 'false', 'false');
INSERT INTO `kb_permission` VALUES ('2', '3', '23', 'true', 'false', 'false', 'false');
INSERT INTO `kb_permission` VALUES ('3', '3', '24', 'true', '', '', '');
INSERT INTO `kb_permission` VALUES ('4', '3', '25', 'true', '', '', '');
INSERT INTO `kb_permission` VALUES ('6', '3', '26', 'true', 'true', 'false', 'false');
INSERT INTO `kb_permission` VALUES ('8', '3', '27', 'true', 'false', 'false', 'false');
INSERT INTO `kb_permission` VALUES ('12', '1', '28', 'true', 'false', 'false', 'false');
INSERT INTO `kb_permission` VALUES ('27', '1', '29', 'true', 'true', 'true', 'true');
INSERT INTO `kb_permission` VALUES ('28', '1', '30', 'true', 'true', 'true', 'true');

-- ----------------------------
-- Table structure for `kb_post_category`
-- ----------------------------
DROP TABLE IF EXISTS `kb_post_category`;
CREATE TABLE `kb_post_category` (
  `post_parent` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(160) DEFAULT NULL,
  `seo_url` varchar(255) DEFAULT NULL,
  `creator` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`post_parent`),
  KEY `creator` (`creator`),
  CONSTRAINT `kb_post_category_ibfk_2` FOREIGN KEY (`creator`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_post_category
-- ----------------------------
INSERT INTO `kb_post_category` VALUES ('1', 'Blog', 'blog', '1', '2016-06-23 11:51:35', null);
INSERT INTO `kb_post_category` VALUES ('2', 'Pricing', 'pricing', '1', '2016-06-23 02:12:11', null);
INSERT INTO `kb_post_category` VALUES ('3', 'Runningtext', 'runningtext', '1', '2016-06-27 03:38:07', null);

-- ----------------------------
-- Table structure for `kb_posts`
-- ----------------------------
DROP TABLE IF EXISTS `kb_posts`;
CREATE TABLE `kb_posts` (
  `id_post` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` bigint(20) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_parent` int(11) NOT NULL,
  `post_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `post_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `user` (`user`),
  KEY `post_parent` (`post_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_posts
-- ----------------------------
INSERT INTO `kb_posts` VALUES ('1', '1', '2016-06-23 00:00:00', '2016-06-23 11:23:45', '', 'Home', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'page', '', '0', '', 'index', 'home');
INSERT INTO `kb_posts` VALUES ('2', '1', '2016-06-23 00:00:00', '2016-06-23 11:51:58', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut. Donec eget pharetra eros. Fusce in diam dapibus, consequat erat ac, convallis tortor. Vivamus vulputate maximus est, ac congue tortor sagittis sed. Pellentesque eget convallis ex. Curabitur eget dui dapibus, molestie lacus at, pellentesque quam. In tempor ut nisl sit amet viverra. Aliquam interdum pellentesque lacinia. Nam quis arcu facilisis, bibendum arcu at, molestie arcu.</p>\r\n<p>\r\n	Donec facilisis urna metus, vel cursus felis sodales vitae. Sed sodales, turpis vel semper imperdiet, mauris mi dignissim velit, quis hendrerit tortor nisl convallis nulla. Donec dignissim felis quis ipsum feugiat porttitor. Phasellus tempus odio consequat, imperdiet magna a, fermentum risus. Aenean dictum eros eu erat faucibus, in scelerisque nisl egestas. Aenean lobortis efficitur nulla quis dignissim. In a urna vitae ex luctus sagittis vel eget ipsum. Suspendisse non vulputate nulla.</p>\r\n<p>\r\n	Quisque vitae justo egestas sapien vulputate dictum at vitae urna. Proin faucibus bibendum ex commodo sodales. Vivamus eleifend eleifend felis, id semper odio viverra a. Donec est enim, aliquet sit amet lorem vitae, dignissim maximus arcu. Aliquam vel egestas risus. Morbi sed purus quis elit commodo mollis a fringilla metus. Praesent id rutrum mi. Aenean pretium sem finibus ante ultrices, quis vulputate tellus sagittis. Mauris sagittis rutrum massa, vitae vehicula sapien laoreet et.</p>\r\n<p>\r\n	Pellentesque at pellentesque leo. Aliquam eu odio mauris. Cras sit amet libero porttitor, consequat nisl sed, facilisis erat. Aliquam rutrum nec odio at semper. Aliquam at sem sed urna hendrerit rutrum ut at velit. Donec ac libero quis sem tincidunt dictum in id ex. Donec eu metus tempor, cursus ipsum a, convallis orci. Nulla aliquet imperdiet nisi id luctus. Nulla quis interdum nisl. Ut a blandit purus, id eleifend mi. Suspendisse potenti.</p>\r\n<p>\r\n	Sed sed sem vitae metus gravida finibus eget in ligula. Integer quis rutrum elit. Sed id tortor vitae lacus porta vestibulum et nec tortor. Etiam imperdiet neque ut mollis vehicula. Vestibulum eu mattis nisi, a sollicitudin dui. Mauris bibendum dictum eleifend. Suspendisse volutpat vel tellus eleifend eleifend. Fusce laoreet est non luctus condimentum.</p>\r\n', 'Lorem Ipsum', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'post', '', '0', '/savanacms/uploads/images/domains-that-never-sleep.png', null, 'lorem-ipsum');
INSERT INTO `kb_posts` VALUES ('3', '1', '2016-06-23 00:00:00', '2016-06-23 11:53:08', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut. Donec eget pharetra eros. Fusce in diam dapibus, consequat erat ac, convallis tortor. Vivamus vulputate maximus est, ac congue tortor sagittis sed. Pellentesque eget convallis ex. Curabitur eget dui dapibus, molestie lacus at, pellentesque quam. In tempor ut nisl sit amet viverra. Aliquam interdum pellentesque lacinia. Nam quis arcu facilisis, bibendum arcu at, molestie arcu.</p>\r\n<p>\r\n	Donec facilisis urna metus, vel cursus felis sodales vitae. Sed sodales, turpis vel semper imperdiet, mauris mi dignissim velit, quis hendrerit tortor nisl convallis nulla. Donec dignissim felis quis ipsum feugiat porttitor. Phasellus tempus odio consequat, imperdiet magna a, fermentum risus. Aenean dictum eros eu erat faucibus, in scelerisque nisl egestas. Aenean lobortis efficitur nulla quis dignissim. In a urna vitae ex luctus sagittis vel eget ipsum. Suspendisse non vulputate nulla.</p>\r\n<p>\r\n	Quisque vitae justo egestas sapien vulputate dictum at vitae urna. Proin faucibus bibendum ex commodo sodales. Vivamus eleifend eleifend felis, id semper odio viverra a. Donec est enim, aliquet sit amet lorem vitae, dignissim maximus arcu. Aliquam vel egestas risus. Morbi sed purus quis elit commodo mollis a fringilla metus. Praesent id rutrum mi. Aenean pretium sem finibus ante ultrices, quis vulputate tellus sagittis. Mauris sagittis rutrum massa, vitae vehicula sapien laoreet et.</p>\r\n<p>\r\n	Pellentesque at pellentesque leo. Aliquam eu odio mauris. Cras sit amet libero porttitor, consequat nisl sed, facilisis erat. Aliquam rutrum nec odio at semper. Aliquam at sem sed urna hendrerit rutrum ut at velit. Donec ac libero quis sem tincidunt dictum in id ex. Donec eu metus tempor, cursus ipsum a, convallis orci. Nulla aliquet imperdiet nisi id luctus. Nulla quis interdum nisl. Ut a blandit purus, id eleifend mi. Suspendisse potenti.</p>\r\n<p>\r\n	Sed sed sem vitae metus gravida finibus eget in ligula. Integer quis rutrum elit. Sed id tortor vitae lacus porta vestibulum et nec tortor. Etiam imperdiet neque ut mollis vehicula. Vestibulum eu mattis nisi, a sollicitudin dui. Mauris bibendum dictum eleifend. Suspendisse volutpat vel tellus eleifend eleifend. Fusce laoreet est non luctus condimentum.</p>\r\n', 'Lorem Ipsum 2', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'post', '', '0', '/savanacms/uploads/images/domains-that-never-sleep.png', null, 'lorem-ipsum-2');
INSERT INTO `kb_posts` VALUES ('4', '1', '2016-06-23 00:00:00', '2016-06-23 11:53:34', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut. Donec eget pharetra eros. Fusce in diam dapibus, consequat erat ac, convallis tortor. Vivamus vulputate maximus est, ac congue tortor sagittis sed. Pellentesque eget convallis ex. Curabitur eget dui dapibus, molestie lacus at, pellentesque quam. In tempor ut nisl sit amet viverra. Aliquam interdum pellentesque lacinia. Nam quis arcu facilisis, bibendum arcu at, molestie arcu.</p>\r\n<p>\r\n	Donec facilisis urna metus, vel cursus felis sodales vitae. Sed sodales, turpis vel semper imperdiet, mauris mi dignissim velit, quis hendrerit tortor nisl convallis nulla. Donec dignissim felis quis ipsum feugiat porttitor. Phasellus tempus odio consequat, imperdiet magna a, fermentum risus. Aenean dictum eros eu erat faucibus, in scelerisque nisl egestas. Aenean lobortis efficitur nulla quis dignissim. In a urna vitae ex luctus sagittis vel eget ipsum. Suspendisse non vulputate nulla.</p>\r\n<p>\r\n	Quisque vitae justo egestas sapien vulputate dictum at vitae urna. Proin faucibus bibendum ex commodo sodales. Vivamus eleifend eleifend felis, id semper odio viverra a. Donec est enim, aliquet sit amet lorem vitae, dignissim maximus arcu. Aliquam vel egestas risus. Morbi sed purus quis elit commodo mollis a fringilla metus. Praesent id rutrum mi. Aenean pretium sem finibus ante ultrices, quis vulputate tellus sagittis. Mauris sagittis rutrum massa, vitae vehicula sapien laoreet et.</p>\r\n<p>\r\n	Pellentesque at pellentesque leo. Aliquam eu odio mauris. Cras sit amet libero porttitor, consequat nisl sed, facilisis erat. Aliquam rutrum nec odio at semper. Aliquam at sem sed urna hendrerit rutrum ut at velit. Donec ac libero quis sem tincidunt dictum in id ex. Donec eu metus tempor, cursus ipsum a, convallis orci. Nulla aliquet imperdiet nisi id luctus. Nulla quis interdum nisl. Ut a blandit purus, id eleifend mi. Suspendisse potenti.</p>\r\n<p>\r\n	Sed sed sem vitae metus gravida finibus eget in ligula. Integer quis rutrum elit. Sed id tortor vitae lacus porta vestibulum et nec tortor. Etiam imperdiet neque ut mollis vehicula. Vestibulum eu mattis nisi, a sollicitudin dui. Mauris bibendum dictum eleifend. Suspendisse volutpat vel tellus eleifend eleifend. Fusce laoreet est non luctus condimentum.</p>\r\n', 'Lorem ipsum 3', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'post', '', '0', '/savanacms/uploads/images/domains-that-never-sleep.png', null, 'lorem-ipsum-3');
INSERT INTO `kb_posts` VALUES ('5', '1', '2016-06-23 00:00:00', '2016-06-23 02:12:58', '<ul class=\"p_list\">\r\n	<li>\r\n		Lorem</li>\r\n	<li>\r\n		Ipsum</li>\r\n	<li>\r\n		Dolor</li>\r\n	<li>\r\n		Sit&nbsp;</li>\r\n	<li>\r\n		Amet</li>\r\n</ul>\r\n', 'Pricing 1', '', 'publish', 'on', '2016-06-23 00:00:00', '2016-06-27 01:16:12', '2', 'post', '', '0', '', null, 'pricing-1');
INSERT INTO `kb_posts` VALUES ('6', '1', '2016-06-23 00:00:00', '2016-06-23 02:13:16', '<ul class=\"p_list\">\r\n	<li>\r\n		Lorem</li>\r\n	<li>\r\n		Ipsum</li>\r\n	<li>\r\n		Dolor</li>\r\n	<li>\r\n		Sit&nbsp;</li>\r\n	<li>\r\n		Amet</li>\r\n</ul>\r\n', 'Pricing 2', '', 'publish', 'on', '2016-06-23 00:00:00', '2016-06-27 01:17:56', '2', 'post', '', '0', '', null, 'pricing-2');
INSERT INTO `kb_posts` VALUES ('7', '1', '2016-06-23 00:00:00', '2016-06-23 04:05:16', '<p>\r\n	<img alt=\"\" src=\"/savanacms/uploads/images/314756_headset-virtual-reality-fove_663_382.jpg\" style=\"width: 300px; height: 173px; float: left;margin:10px\" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut. Donec eget pharetra eros. Fusce in diam dapibus, consequat erat ac, convallis tortor. Vivamus vulputate maximus est, ac congue tortor sagittis sed. Pellentesque eget convallis ex. Curabitur eget dui dapibus, molestie lacus at, pellentesque quam. In tempor ut nisl sit amet viverra. Aliquam interdum pellentesque lacinia. Nam quis arcu facilisis, bibendum arcu at, molestie arcu.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Donec facilisis urna metus, vel cursus felis sodales vitae. Sed sodales, turpis vel semper imperdiet, mauris mi dignissim velit, quis hendrerit tortor nisl convallis nulla. Donec dignissim felis quis ipsum feugiat porttitor. Phasellus tempus odio consequat, imperdiet magna a, fermentum risus. Aenean dictum eros eu erat faucibus, in scelerisque nisl egestas. Aenean lobortis efficitur nulla quis dignissim. In a urna vitae ex luctus sagittis vel eget ipsum. Suspendisse non vulputate nulla.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Quisque vitae justo egestas sapien vulputate dictum at vitae urna. Proin faucibus bibendum ex commodo sodales. Vivamus eleifend eleifend felis, id semper odio viverra a. Donec est enim, aliquet sit amet lorem vitae, dignissim maximus arcu. Aliquam vel egestas risus. Morbi sed purus quis elit commodo mollis a fringilla metus. Praesent id rutrum mi. Aenean pretium sem finibus ante ultrices, quis vulputate tellus sagittis. Mauris sagittis rutrum massa, vitae vehicula sapien laoreet et.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Pellentesque at pellentesque leo. Aliquam eu odio mauris. Cras sit amet libero porttitor, consequat nisl sed, facilisis erat. Aliquam rutrum nec odio at semper. Aliquam at sem sed urna hendrerit rutrum ut at velit. Donec ac libero quis sem tincidunt dictum in id ex. Donec eu metus tempor, cursus ipsum a, convallis orci. Nulla aliquet imperdiet nisi id luctus. Nulla quis interdum nisl. Ut a blandit purus, id eleifend mi. Suspendisse potenti.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sed sed sem vitae metus gravida finibus eget in ligula. Integer quis rutrum elit. Sed id tortor vitae lacus porta vestibulum et nec tortor. Etiam imperdiet neque ut mollis vehicula. Vestibulum eu mattis nisi, a sollicitudin dui. Mauris bibendum dictum eleifend. Suspendisse volutpat vel tellus eleifend eleifend. Fusce laoreet est non luctus condimentum.</p>\r\n', 'Profil', '', 'publish', 'on', '2016-06-23 00:00:00', '2016-06-29 10:49:03', '0', 'page', '', '0', '', 'fullwidth', 'profil');
INSERT INTO `kb_posts` VALUES ('8', '1', '2016-06-24 00:00:00', '2016-06-24 05:30:36', '', 'Peluang Usaha', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'page', '', '0', '', 'pricing', 'peluang-usaha');
INSERT INTO `kb_posts` VALUES ('9', '1', '2016-06-24 00:00:00', '2016-06-24 05:31:49', '', 'Testimonial', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'page', '', '0', '', 'testimonial', 'testimonial');
INSERT INTO `kb_posts` VALUES ('10', '1', '2016-06-24 00:00:00', '2016-06-24 05:32:44', '', 'Kontak', '', 'publish', 'on', '2016-06-24 00:00:00', '2016-06-29 01:20:12', '0', 'page', '', '0', '', 'contact_fullwidth', 'kontak');
INSERT INTO `kb_posts` VALUES ('11', '1', '2016-06-27 00:00:00', '2016-06-27 03:38:43', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi.</p>\r\n', 'Lorem Ipsum Runningtext', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', 'post', '', '0', '', null, 'lorem-ipsum-runningtext');
INSERT INTO `kb_posts` VALUES ('12', '1', '2016-06-28 00:00:00', '2016-06-28 12:08:34', '<ul class=\"p_list\">\r\n	<li>\r\n		Lorem</li>\r\n	<li>\r\n		Ipsum</li>\r\n	<li>\r\n		Dolor</li>\r\n	<li>\r\n		Sit&nbsp;</li>\r\n	<li>\r\n		Amet</li>\r\n</ul>\r\n', 'Pricing 3', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2', 'post', '', '0', '', null, 'pricing-3');
INSERT INTO `kb_posts` VALUES ('13', '1', '2016-06-30 00:00:00', '2016-06-30 09:47:47', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut. Donec eget pharetra eros. Fusce in diam dapibus, consequat erat ac, convallis tortor. Vivamus vulputate maximus est, ac congue tortor sagittis sed. Pellentesque eget convallis ex. Curabitur eget dui dapibus, molestie lacus at, pellentesque quam. In tempor ut nisl sit amet viverra. Aliquam interdum pellentesque lacinia. Nam quis arcu facilisis, bibendum arcu at, molestie arcu.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Donec facilisis urna metus, vel cursus felis sodales vitae. Sed sodales, turpis vel semper imperdiet, mauris mi dignissim velit, quis hendrerit tortor nisl convallis nulla. Donec dignissim felis quis ipsum feugiat porttitor. Phasellus tempus odio consequat, imperdiet magna a, fermentum risus. Aenean dictum eros eu erat faucibus, in scelerisque nisl egestas. Aenean lobortis efficitur nulla quis dignissim. In a urna vitae ex luctus sagittis vel eget ipsum. Suspendisse non vulputate nulla.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Quisque vitae justo egestas sapien vulputate dictum at vitae urna. Proin faucibus bibendum ex commodo sodales. Vivamus eleifend eleifend felis, id semper odio viverra a. Donec est enim, aliquet sit amet lorem vitae, dignissim maximus arcu. Aliquam vel egestas risus. Morbi sed purus quis elit commodo mollis a fringilla metus. Praesent id rutrum mi. Aenean pretium sem finibus ante ultrices, quis vulputate tellus sagittis. Mauris sagittis rutrum massa, vitae vehicula sapien laoreet et.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Pellentesque at pellentesque leo. Aliquam eu odio mauris. Cras sit amet libero porttitor, consequat nisl sed, facilisis erat. Aliquam rutrum nec odio at semper. Aliquam at sem sed urna hendrerit rutrum ut at velit. Donec ac libero quis sem tincidunt dictum in id ex. Donec eu metus tempor, cursus ipsum a, convallis orci. Nulla aliquet imperdiet nisi id luctus. Nulla quis interdum nisl. Ut a blandit purus, id eleifend mi. Suspendisse potenti.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sed sed sem vitae metus gravida finibus eget in ligula. Integer quis rutrum elit. Sed id tortor vitae lacus porta vestibulum et nec tortor. Etiam imperdiet neque ut mollis vehicula. Vestibulum eu mattis nisi, a sollicitudin dui. Mauris bibendum dictum eleifend. Suspendisse volutpat vel tellus eleifend eleifend. Fusce laoreet est non luctus condimentum.</p>\r\n', 'Tim Kami', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'page', '', '0', '', 'team', 'tim-kami');
INSERT INTO `kb_posts` VALUES ('14', '1', '2016-07-01 00:00:00', '2016-07-01 02:31:02', '', 'Produk', '', 'publish', 'on', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'page', '', '0', '', 'product_left_sidebar', 'produk');

-- ----------------------------
-- Table structure for `kb_products`
-- ----------------------------
DROP TABLE IF EXISTS `kb_products`;
CREATE TABLE `kb_products` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `author` bigint(11) DEFAULT NULL,
  `kode_produk` varchar(99) NOT NULL,
  `nama_produk` varchar(99) NOT NULL,
  `kategori` int(11) NOT NULL,
  `subkategori` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `bestseller` enum('F','T') DEFAULT 'F',
  `featured` enum('F','T') DEFAULT 'F',
  `meta_title` varchar(100) NOT NULL,
  `meta_keywords` varchar(160) NOT NULL,
  `meta_desc` text,
  `seo_url` text,
  `gambar_produk` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_label` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `author` (`author`),
  KEY `id_label` (`id_label`),
  CONSTRAINT `kb_products_ibfk_1` FOREIGN KEY (`author`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_products
-- ----------------------------
INSERT INTO `kb_products` VALUES ('1', '1', 'pk1', 'Pakaian 1', '1', '0', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut.</p>\r\n', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut.</p>\r\n', 'F', 'F', '', '', '', 'pakaian-1', '/savanacms/uploads/images/quick_view_img_1.jpg', '/savanacms/uploads/.thumbs/images/quick_view_img_1.jpg', 'publish', '0', '2016-06-23 05:25:39', null);
INSERT INTO `kb_products` VALUES ('2', '1', 'pk2', 'Pakaian 2', '1', '0', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut.</p>\r\n', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut.</p>\r\n', 'F', 'F', '', '', '', 'pakaian-2', '/savanacms/uploads/images/quick_view_img_1.jpg', '/savanacms/uploads/.thumbs/images/quick_view_img_1.jpg', 'publish', '0', '2016-06-24 05:26:52', null);
INSERT INTO `kb_products` VALUES ('3', '1', 'pk3', 'Pakaian 3', '1', '0', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut.</p>\r\n', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut.</p>\r\n', 'F', 'F', '', '', '', 'pakaian-3', '/savanacms/uploads/images/quick_view_img_1.jpg', '/savanacms/uploads/.thumbs/images/quick_view_img_1.jpg', 'publish', '0', '2016-06-24 05:27:45', null);
INSERT INTO `kb_products` VALUES ('4', '1', 'pk4', 'Pakaian 4', '1', '0', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut.</p>\r\n', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. Fusce eu laoreet est. Fusce non libero in mauris aliquet vehicula. Vestibulum suscipit ante risus, a lobortis sapien gravida ut.</p>\r\n', 'F', 'F', '', '', '', 'pakaian-4', '/savanacms/uploads/images/quick_view_img_1.jpg', '/savanacms/uploads/.thumbs/images/quick_view_img_1.jpg', 'publish', '0', '2016-06-27 10:27:25', null);

-- ----------------------------
-- Table structure for `kb_products_category`
-- ----------------------------
DROP TABLE IF EXISTS `kb_products_category`;
CREATE TABLE `kb_products_category` (
  `id_prod_category` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(160) DEFAULT NULL,
  `seo_url` text,
  `user_id` bigint(20) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_parent` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_prod_category`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `kb_products_category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_products_category
-- ----------------------------
INSERT INTO `kb_products_category` VALUES ('1', 'Pakaian', 'pakaian', '1', '0', '1', '2016-06-23 05:24:00', '2016-06-23 05:24:00');

-- ----------------------------
-- Table structure for `kb_products_detail`
-- ----------------------------
DROP TABLE IF EXISTS `kb_products_detail`;
CREATE TABLE `kb_products_detail` (
  `id_detail_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `ukuran` char(25) DEFAULT NULL,
  `satuan` char(15) DEFAULT NULL,
  `berat` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `min_order` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_produk`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `kb_products_detail_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `kb_products` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_products_detail
-- ----------------------------
INSERT INTO `kb_products_detail` VALUES ('1', '1', '85000', '0', '', null, '', '10', '0');
INSERT INTO `kb_products_detail` VALUES ('2', '2', '90000', '0', '', null, '', '10', '0');
INSERT INTO `kb_products_detail` VALUES ('3', '3', '100000', '0', '', null, '', '10', '0');
INSERT INTO `kb_products_detail` VALUES ('4', '4', '120000', '0', '', null, '', '10', '0');

-- ----------------------------
-- Table structure for `kb_reseller_type`
-- ----------------------------
DROP TABLE IF EXISTS `kb_reseller_type`;
CREATE TABLE `kb_reseller_type` (
  `id_typereseller` int(11) NOT NULL AUTO_INCREMENT,
  `nama_type` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_typereseller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_reseller_type
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_saldo_updated`
-- ----------------------------
DROP TABLE IF EXISTS `kb_saldo_updated`;
CREATE TABLE `kb_saldo_updated` (
  `id_reseller` bigint(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  KEY `id_reseller` (`id_reseller`),
  CONSTRAINT `kb_saldo_updated_ibfk_1` FOREIGN KEY (`id_reseller`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_saldo_updated
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_sales_report`
-- ----------------------------
DROP TABLE IF EXISTS `kb_sales_report`;
CREATE TABLE `kb_sales_report` (
  `id_sales` bigint(11) DEFAULT NULL,
  `month_date_time` datetime DEFAULT NULL,
  `jumlah_jual` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `id_target` int(11) DEFAULT NULL,
  KEY `id_target` (`id_target`),
  CONSTRAINT `kb_sales_report_ibfk_1` FOREIGN KEY (`id_target`) REFERENCES `kb_target_sales` (`id_target`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_sales_report
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_target_sales`
-- ----------------------------
DROP TABLE IF EXISTS `kb_target_sales`;
CREATE TABLE `kb_target_sales` (
  `id_target` int(11) NOT NULL AUTO_INCREMENT,
  `qty_target` int(11) DEFAULT NULL,
  `month_target` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `id_admin` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_target`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_target_sales
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_testimonial`
-- ----------------------------
DROP TABLE IF EXISTS `kb_testimonial`;
CREATE TABLE `kb_testimonial` (
  `id_testimonial` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `judul_id` text NOT NULL,
  `judul_en` text NOT NULL,
  `testimonial` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `approval` enum('true','false') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id_testimonial`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_testimonial
-- ----------------------------
INSERT INTO `kb_testimonial` VALUES ('1', 'John Doe', 'Good', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. ', '', '2016-06-23', '#', 'true');
INSERT INTO `kb_testimonial` VALUES ('2', 'Elice Doe', 'Nice', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae tellus tincidunt, gravida ante vel, consequat nibh. Nunc vulputate mi sed fermentum bibendum. Nunc nunc nunc, molestie in risus sit amet, eleifend condimentum nisi. ', '', '2016-06-23', '#', 'true');

-- ----------------------------
-- Table structure for `kb_user_detail`
-- ----------------------------
DROP TABLE IF EXISTS `kb_user_detail`;
CREATE TABLE `kb_user_detail` (
  `ID` bigint(11) NOT NULL,
  `name` varchar(160) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `fb_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `bbm_pin` varchar(10) DEFAULT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `kb_user_detail_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_user_detail
-- ----------------------------
INSERT INTO `kb_user_detail` VALUES ('1', 'Administrator', 'Cimahi', '0223414312', '085722864906', '', '', '', '', '', '', '');
INSERT INTO `kb_user_detail` VALUES ('2', 'Rian Abdul', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `kb_user_type`
-- ----------------------------
DROP TABLE IF EXISTS `kb_user_type`;
CREATE TABLE `kb_user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(160) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_user_type
-- ----------------------------
INSERT INTO `kb_user_type` VALUES ('1', 'Administrator', '2016-03-02 00:00:00', '2016-03-05 18:27:02');
INSERT INTO `kb_user_type` VALUES ('3', 'Sales', '2016-04-15 21:51:19', null);
INSERT INTO `kb_user_type` VALUES ('4', 'Sub agen', '2016-06-02 10:12:16', null);
INSERT INTO `kb_user_type` VALUES ('6', 'Agen', '2016-06-07 08:35:41', null);

-- ----------------------------
-- Table structure for `kb_users`
-- ----------------------------
DROP TABLE IF EXISTS `kb_users`;
CREATE TABLE `kb_users` (
  `ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `user_type` int(11) DEFAULT NULL,
  `display_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `position` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_type` (`user_type`),
  CONSTRAINT `kb_users_ibfk_2` FOREIGN KEY (`user_type`) REFERENCES `kb_user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_users
-- ----------------------------
INSERT INTO `kb_users` VALUES ('1', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'superadmin@ppjkservices.com', '', '2016-03-02 00:00:00', '', '0', '1', 'Admin', null);
INSERT INTO `kb_users` VALUES ('2', 'rian', '601f1889667efaebb33b8c12572835da3f027f78', '', 'rianabdul@gmail.com', '', '2016-07-19 11:09:00', '0e90294a2463c2dc008b363487e6717b06f1c4b5', '0', '3', 'Rian', null);

-- ----------------------------
-- Table structure for `kb_usertypereseller`
-- ----------------------------
DROP TABLE IF EXISTS `kb_usertypereseller`;
CREATE TABLE `kb_usertypereseller` (
  `id_user` bigint(11) DEFAULT NULL,
  `reseller_type` int(11) DEFAULT NULL,
  KEY `id_user` (`id_user`),
  KEY `reseller_type` (`reseller_type`),
  CONSTRAINT `kb_usertypereseller_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `kb_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kb_usertypereseller_ibfk_2` FOREIGN KEY (`reseller_type`) REFERENCES `kb_reseller_type` (`id_typereseller`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_usertypereseller
-- ----------------------------

-- ----------------------------
-- Table structure for `kb_widgets`
-- ----------------------------
DROP TABLE IF EXISTS `kb_widgets`;
CREATE TABLE `kb_widgets` (
  `id_widget` int(11) NOT NULL AUTO_INCREMENT,
  `nm_widget` varchar(255) DEFAULT NULL,
  `konten_text_widget` text,
  `konten_text_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `author` int(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_widget`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kb_widgets
-- ----------------------------
INSERT INTO `kb_widgets` VALUES ('5', 'slider_w', '', '1', null, null, '1', '2016-05-18 00:00:00', null);
INSERT INTO `kb_widgets` VALUES ('8', 'product_w', '<h2 style=\"text-align: center;\">\n	Katalog Produk</h2>\n', '0', '', null, '1', '2016-05-19 00:00:00', '2016-06-02 03:42:24');
INSERT INTO `kb_widgets` VALUES ('9', 'post_w', '', '9', '', null, '1', '2016-05-19 00:00:00', null);
INSERT INTO `kb_widgets` VALUES ('10', 'page_w', '', '7', '0', null, '1', '2016-05-19 00:00:00', '2016-06-23 04:06:16');
INSERT INTO `kb_widgets` VALUES ('11', 'testimonial_w', '<h3 style=\"text-align: center;\">\n	Testimonial</h3>\n', '0', '', null, '1', '2016-05-19 00:00:00', '2016-06-02 03:42:53');
INSERT INTO `kb_widgets` VALUES ('12', 'pricing_w', '<p>\r\n	PELUANG USAHA</p>\r\n', '2', '0', null, '1', '2016-05-19 00:00:00', '2016-06-27 01:04:29');
INSERT INTO `kb_widgets` VALUES ('14', 'team_w', '', '3', '', null, '1', '2016-05-21 00:00:00', null);
INSERT INTO `kb_widgets` VALUES ('16', 'runningtext_w', '', '3', '0', null, '1', '2016-05-30 11:10:55', '2016-06-27 03:38:55');
INSERT INTO `kb_widgets` VALUES ('17', 'blog_w', '<h2 style=\"text-align: center;\">\r\n	The amazing Builder</h2>\r\n<p style=\"text-align: center;\">\r\n	Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad&nbsp; voluptate velit esse cillum dolore eu fugiat.</p>\r\n', '1', '', null, '1', '2016-05-30 01:41:14', '2016-06-23 11:52:17');
INSERT INTO `kb_widgets` VALUES ('19', 'bank_w', '<p>\r\n	Bank</p>\r\n', '2', '0', null, '1', '2016-05-31 10:45:43', '2016-06-27 02:19:24');
INSERT INTO `kb_widgets` VALUES ('21', 'delivery_w', '<p>\r\n	Pengiriman</p>\r\n', '3', '0', null, '1', '2016-05-31 03:07:29', '2016-06-27 02:55:37');
INSERT INTO `kb_widgets` VALUES ('22', 'custom_w', '<a class=\"twitter-timeline\" data-widget-id=\"737616268274999296\" href=\"https://twitter.com/kaosnyabagus\">Tweets by @kaosnyabagus</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\"://platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>', '0', '', null, '1', '2016-05-31 07:12:21', '2016-06-04 10:19:22');
