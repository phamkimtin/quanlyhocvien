-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.20-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6340
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for qlhv
CREATE DATABASE IF NOT EXISTS `qlhv` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `qlhv`;

-- Dumping structure for table qlhv.admin_resource
CREATE TABLE IF NOT EXISTS `admin_resource` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_hien_thi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `uri` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `show_menu` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `icon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_resource_parent_foreign` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1267 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlhv.admin_resource: ~56 rows (approximately)
/*!40000 ALTER TABLE `admin_resource` DISABLE KEYS */;
INSERT INTO `admin_resource` (`id`, `ten_hien_thi`, `resource`, `method`, `action`, `parameter`, `parameter_value`, `parent_id`, `created_at`, `updated_at`, `uri`, `status`, `show_menu`, `order`, `icon`) VALUES
	(1, '#', '#', '#', '#', '#', '#', NULL, '2021-06-22 08:32:31', '2021-06-22 08:32:31', '#', 1, 1, 0, NULL),
	(1201, 'login', 'GET | App\\Http\\Controllers\\Auth\\LoginController@showLoginForm', 'GET', 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'login', 1, 3, 1000, NULL),
	(1202, 'login', 'POST | App\\Http\\Controllers\\Auth\\LoginController@login', 'POST', 'App\\Http\\Controllers\\Auth\\LoginController@login', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'login', 1, 2, 1000, NULL),
	(1203, 'logout', 'POST | App\\Http\\Controllers\\Auth\\LoginController@logout', 'POST', 'App\\Http\\Controllers\\Auth\\LoginController@logout', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'logout', 1, 2, 1000, NULL),
	(1204, 'register', 'GET | App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm', 'GET', 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'register', 1, 3, 1000, NULL),
	(1205, 'register', 'POST | App\\Http\\Controllers\\Auth\\RegisterController@register', 'POST', 'App\\Http\\Controllers\\Auth\\RegisterController@register', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'register', 1, 2, 1000, NULL),
	(1206, 'password/reset', 'GET | App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm', 'GET', 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'password/reset', 1, 3, 1000, NULL),
	(1207, 'password/email', 'POST | App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail', 'POST', 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'password/email', 1, 2, 1000, NULL),
	(1208, 'password/reset/{token}', 'GET | App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm', 'GET', 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'password/reset/{token}', 1, 3, 1000, NULL),
	(1209, 'password/reset', 'POST | App\\Http\\Controllers\\Auth\\ResetPasswordController@reset', 'POST', 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'password/reset', 1, 2, 1000, NULL),
	(1210, 'password/confirm', 'GET | App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm', 'GET', 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'password/confirm', 1, 3, 1000, NULL),
	(1211, 'password/confirm', 'POST | App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm', 'POST', 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'password/confirm', 1, 2, 1000, NULL),
	(1212, 'Danh mục tham số hệ thống', 'GET | App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@dmThamSoHeThong', 'GET', 'App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@dmThamSoHeThong', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'dm-tham-so-he-thong', 1, 1, 1000, '<i class="menu-icon icon-list"></i>'),
	(1213, 'danh-sach-dm-tham-so-he-thong', 'POST | App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@danhSachDmThamSoHeThong', 'POST', 'App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@danhSachDmThamSoHeThong', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'danh-sach-dm-tham-so-he-thong', 1, 2, 1000, NULL),
	(1214, 'them-dm-tham-so-he-thong', 'POST | App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@themDmThamSoHeThong', 'POST', 'App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@themDmThamSoHeThong', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'them-dm-tham-so-he-thong', 1, 2, 1000, NULL),
	(1215, 'dm-tham-so-he-thong-single', 'POST | App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@dmThamSoHeThongSingle', 'POST', 'App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@dmThamSoHeThongSingle', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'dm-tham-so-he-thong-single', 1, 2, 1000, NULL),
	(1216, 'cap-nhat-dm-tham-so-he-thong', 'POST | App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@capNhatDmThamSoHeThong', 'POST', 'App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@capNhatDmThamSoHeThong', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'cap-nhat-dm-tham-so-he-thong', 1, 2, 1000, NULL),
	(1217, 'xoa-dm-tham-so-he-thong', 'POST | App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@xoaDmThamSoHeThong', 'POST', 'App\\Modules\\DmThamSoHeThong\\Controllers\\DmThamSoHeThongController@xoaDmThamSoHeThong', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'xoa-dm-tham-so-he-thong', 1, 2, 1000, NULL),
	(1218, 'Phân quyền', 'GET | App\\Modules\\PhanQuyen\\Controllers\\PhanQuyenController@phanQuyen', 'GET', 'App\\Modules\\PhanQuyen\\Controllers\\PhanQuyenController@phanQuyen', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'phan-quyen', 1, 1, 1000, '<i class="fa fa-cogs menu-icon"></i>'),
	(1219, 'phan-quyen-post', 'POST | App\\Modules\\PhanQuyen\\Controllers\\PhanQuyenController@phanQuyenPost', 'POST', 'App\\Modules\\PhanQuyen\\Controllers\\PhanQuyenController@phanQuyenPost', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'phan-quyen-post', 1, 2, 1000, NULL),
	(1220, 'phan-quyen/danh-sach-nhom-quyen', 'POST | App\\Modules\\PhanQuyen\\Controllers\\PhanQuyenController@phanQuyenDanhSachNhomQuyen', 'POST', 'App\\Modules\\PhanQuyen\\Controllers\\PhanQuyenController@phanQuyenDanhSachNhomQuyen', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'phan-quyen/danh-sach-nhom-quyen', 1, 2, 1000, NULL),
	(1221, 'phan-quyen/danh-sach-quyen-theo-nhom-quyen-id', 'POST | App\\Modules\\PhanQuyen\\Controllers\\PhanQuyenController@phanQuyenDanhSachQuyenTheoNhomQuyenId', 'POST', 'App\\Modules\\PhanQuyen\\Controllers\\PhanQuyenController@phanQuyenDanhSachQuyenTheoNhomQuyenId', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'phan-quyen/danh-sach-quyen-theo-nhom-quyen-id', 1, 2, 1000, NULL),
	(1222, 'Tài nguyên', 'GET | App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@taiNguyen', 'GET', 'App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@taiNguyen', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'tai-nguyen', 1, 1, 1000, '<i class="menu-icon icon-list"></i>'),
	(1223, 'danh-sach-tai-nguyen', 'POST | App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@danhSachTaiNguyen', 'POST', 'App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@danhSachTaiNguyen', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'danh-sach-tai-nguyen', 1, 2, 1000, NULL),
	(1224, 'quet-tai-nguyen', 'POST | App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@quetTaiNguyen', 'POST', 'App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@quetTaiNguyen', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'quet-tai-nguyen', 1, 2, 1000, NULL),
	(1225, 'them-tai-nguyen', 'POST | App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@themTaiNguyen', 'POST', 'App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@themTaiNguyen', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'them-tai-nguyen', 1, 2, 1000, NULL),
	(1226, 'tai-nguyen-single', 'POST | App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@taiNguyenSingle', 'POST', 'App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@taiNguyenSingle', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'tai-nguyen-single', 1, 2, 1000, NULL),
	(1227, 'cap-nhat-tai-nguyen', 'POST | App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@capNhatTaiNguyen', 'POST', 'App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@capNhatTaiNguyen', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'cap-nhat-tai-nguyen', 1, 2, 1000, NULL),
	(1228, 'xoa-tai-nguyen', 'POST | App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@xoaTaiNguyen', 'POST', 'App\\Modules\\TaiNguyen\\Controllers\\TaiNguyenController@xoaTaiNguyen', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'xoa-tai-nguyen', 1, 2, 1000, NULL),
	(1229, 'To do list', 'GET | App\\Modules\\ToDo\\Controllers\\ToDoController@toDo', 'GET', 'App\\Modules\\ToDo\\Controllers\\ToDoController@toDo', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'to-do', 1, 1, 1000, '<i class="fa fa-clock-o menu-icon"></i>'),
	(1230, 'danh-sach-to-do', 'POST | App\\Modules\\ToDo\\Controllers\\ToDoController@danhSachToDo', 'POST', 'App\\Modules\\ToDo\\Controllers\\ToDoController@danhSachToDo', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'danh-sach-to-do', 1, 2, 1000, NULL),
	(1231, 'them-to-do', 'POST | App\\Modules\\ToDo\\Controllers\\ToDoController@themToDo', 'POST', 'App\\Modules\\ToDo\\Controllers\\ToDoController@themToDo', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'them-to-do', 1, 2, 1000, NULL),
	(1232, 'to-do-single', 'POST | App\\Modules\\ToDo\\Controllers\\ToDoController@toDoSingle', 'POST', 'App\\Modules\\ToDo\\Controllers\\ToDoController@toDoSingle', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'to-do-single', 1, 2, 1000, NULL),
	(1233, 'cap-nhat-to-do', 'POST | App\\Modules\\ToDo\\Controllers\\ToDoController@capNhatToDo', 'POST', 'App\\Modules\\ToDo\\Controllers\\ToDoController@capNhatToDo', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'cap-nhat-to-do', 1, 2, 1000, NULL),
	(1234, 'xoa-to-do', 'POST | App\\Modules\\ToDo\\Controllers\\ToDoController@xoaToDo', 'POST', 'App\\Modules\\ToDo\\Controllers\\ToDoController@xoaToDo', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'xoa-to-do', 1, 2, 1000, NULL),
	(1235, 'check-to-do', 'POST | App\\Modules\\ToDo\\Controllers\\ToDoController@checkToDo', 'POST', 'App\\Modules\\ToDo\\Controllers\\ToDoController@checkToDo', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'check-to-do', 1, 2, 1000, NULL),
	(1236, 'uncheck-to-do', 'POST | App\\Modules\\ToDo\\Controllers\\ToDoController@uncheckToDo', 'POST', 'App\\Modules\\ToDo\\Controllers\\ToDoController@uncheckToDo', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'uncheck-to-do', 1, 2, 1000, NULL),
	(1237, 'sort-to-do', 'POST | App\\Modules\\ToDo\\Controllers\\ToDoController@sortToDo', 'POST', 'App\\Modules\\ToDo\\Controllers\\ToDoController@sortToDo', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'sort-to-do', 1, 2, 1000, NULL),
	(1238, 'Trang chủ', 'GET | App\\Modules\\TrangChu\\Controllers\\TrangChuController@home', 'GET', 'App\\Modules\\TrangChu\\Controllers\\TrangChuController@home', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', '/', 1, 3, 1000, NULL),
	(1239, 'Tài khoản', 'GET | App\\Modules\\User\\Controllers\\UserController@user', 'GET', 'App\\Modules\\User\\Controllers\\UserController@user', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'tai-khoan', 1, 1, 1000, '<i class="fa fa-address-book menu-icon"></i>'),
	(1240, 'danh-sach-user', 'POST | App\\Modules\\User\\Controllers\\UserController@danhSachUser', 'POST', 'App\\Modules\\User\\Controllers\\UserController@danhSachUser', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'danh-sach-user', 1, 2, 1000, NULL),
	(1241, 'them-user', 'POST | App\\Modules\\User\\Controllers\\UserController@themUser', 'POST', 'App\\Modules\\User\\Controllers\\UserController@themUser', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'them-user', 1, 2, 1000, NULL),
	(1242, 'user-single', 'POST | App\\Modules\\User\\Controllers\\UserController@userSingle', 'POST', 'App\\Modules\\User\\Controllers\\UserController@userSingle', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'user-single', 1, 2, 1000, NULL),
	(1243, 'cap-nhat-user', 'POST | App\\Modules\\User\\Controllers\\UserController@capNhatUser', 'POST', 'App\\Modules\\User\\Controllers\\UserController@capNhatUser', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'cap-nhat-user', 1, 2, 1000, NULL),
	(1244, 'xoa-user', 'POST | App\\Modules\\User\\Controllers\\UserController@xoaUser', 'POST', 'App\\Modules\\User\\Controllers\\UserController@xoaUser', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'xoa-user', 1, 2, 1000, NULL),
	(1245, 'user-don-vi-single', 'POST | App\\Modules\\User\\Controllers\\UserController@userDonViSingle', 'POST', 'App\\Modules\\User\\Controllers\\UserController@userDonViSingle', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'user-don-vi-single', 1, 2, 1000, NULL),
	(1246, 'user-role-single', 'POST | App\\Modules\\User\\Controllers\\UserController@userRoleSingle', 'POST', 'App\\Modules\\User\\Controllers\\UserController@userRoleSingle', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'user-role-single', 1, 2, 1000, NULL),
	(1247, 'phan-quyen-user-role', 'POST | App\\Modules\\User\\Controllers\\UserController@phanQuyenUserRole', 'POST', 'App\\Modules\\User\\Controllers\\UserController@phanQuyenUserRole', '', '', 1, '2021-06-22 08:32:31', '2021-06-22 08:32:31', 'phan-quyen-user-role', 1, 2, 1000, NULL),
	(1259, 'Thông tin cá nhân', 'GET | App\\Modules\\User\\Controllers\\UserController@thongTinCaNhan', 'GET', 'App\\Modules\\User\\Controllers\\UserController@thongTinCaNhan', '', '', 1, '2021-06-22 08:33:49', '2021-06-22 08:33:49', 'thong-tin-ca-nhan', 1, 3, 1000, NULL),
	(1260, 'cap-nhat-thong-tin-ca-nhan', 'POST | App\\Modules\\User\\Controllers\\UserController@capNhatThongTinCaNhan', 'POST', 'App\\Modules\\User\\Controllers\\UserController@capNhatThongTinCaNhan', '', '', 1, '2021-06-22 08:33:49', '2021-06-22 08:33:49', 'cap-nhat-thong-tin-ca-nhan', 1, 2, 1000, NULL),
	(1261, 'Danh mục dân tộc', 'GET | App\\Modules\\DanToc\\Controllers\\DanTocController@danToc', 'GET', 'App\\Modules\\DanToc\\Controllers\\DanTocController@danToc', '', '', 1, '2021-06-30 08:58:03', '2021-06-30 08:58:03', 'dan-toc', 1, 1, 1000, '<i class="menu-icon fa fa-user-o"></i>'),
	(1262, 'danh-sach-dan-toc', 'POST | App\\Modules\\DanToc\\Controllers\\DanTocController@danhSachDanToc', 'POST', 'App\\Modules\\DanToc\\Controllers\\DanTocController@danhSachDanToc', '', '', 1, '2021-06-30 08:58:06', '2021-06-30 08:58:06', 'danh-sach-dan-toc', 1, 2, 1000, NULL),
	(1263, 'them-dan-toc', 'POST | App\\Modules\\DanToc\\Controllers\\DanTocController@themDanToc', 'POST', 'App\\Modules\\DanToc\\Controllers\\DanTocController@themDanToc', '', '', 1, '2021-06-30 08:58:06', '2021-06-30 08:58:06', 'them-dan-toc', 1, 2, 1000, NULL),
	(1264, 'dan-toc-single', 'POST | App\\Modules\\DanToc\\Controllers\\DanTocController@danTocSingle', 'POST', 'App\\Modules\\DanToc\\Controllers\\DanTocController@danTocSingle', '', '', 1, '2021-06-30 08:58:06', '2021-06-30 08:58:06', 'dan-toc-single', 1, 2, 1000, NULL),
	(1265, 'cap-nhat-dan-toc', 'POST | App\\Modules\\DanToc\\Controllers\\DanTocController@capNhatDanToc', 'POST', 'App\\Modules\\DanToc\\Controllers\\DanTocController@capNhatDanToc', '', '', 1, '2021-06-30 08:58:06', '2021-06-30 08:58:06', 'cap-nhat-dan-toc', 1, 2, 1000, NULL),
	(1266, 'xoa-dan-toc', 'POST | App\\Modules\\DanToc\\Controllers\\DanTocController@xoaDanToc', 'POST', 'App\\Modules\\DanToc\\Controllers\\DanTocController@xoaDanToc', '', '', 1, '2021-06-30 08:58:06', '2021-06-30 08:58:06', 'xoa-dan-toc', 1, 2, 1000, NULL);
/*!40000 ALTER TABLE `admin_resource` ENABLE KEYS */;

-- Dumping structure for table qlhv.admin_role
CREATE TABLE IF NOT EXISTS `admin_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlhv.admin_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_role` DISABLE KEYS */;
INSERT INTO `admin_role` (`id`, `role_name`, `state`, `created_at`, `updated_at`) VALUES
	(1, 'Quản trị', 1, '2021-06-21 18:39:01', '2021-06-21 18:39:01');
/*!40000 ALTER TABLE `admin_role` ENABLE KEYS */;

-- Dumping structure for table qlhv.admin_rule
CREATE TABLE IF NOT EXISTS `admin_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `resource_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `admin_rule_role_id_foreign` (`role_id`),
  KEY `admin_rule_resource_id_foreign` (`resource_id`),
  CONSTRAINT `admin_rule_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `admin_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_rule_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1349 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlhv.admin_rule: ~6 rows (approximately)
/*!40000 ALTER TABLE `admin_rule` DISABLE KEYS */;
INSERT INTO `admin_rule` (`id`, `role_id`, `resource_id`, `created_at`, `updated_at`) VALUES
	(1343, 1, 1212, '2021-06-21 18:40:08', '2021-06-21 18:40:08'),
	(1344, 1, 1218, '2021-06-21 18:40:09', '2021-06-21 18:40:09'),
	(1345, 1, 1222, '2021-06-21 18:40:10', '2021-06-21 18:40:10'),
	(1346, 1, 1229, '2021-06-21 18:40:11', '2021-06-21 18:40:11'),
	(1347, 1, 1238, '2021-06-21 18:40:11', '2021-06-21 18:40:11'),
	(1348, 1, 1239, '2021-06-21 18:40:12', '2021-06-21 18:40:12');
/*!40000 ALTER TABLE `admin_rule` ENABLE KEYS */;

-- Dumping structure for table qlhv.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiration` int(11) DEFAULT NULL,
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.cache: ~0 rows (approximately)
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

-- Dumping structure for table qlhv.dm_dan_toc
CREATE TABLE IF NOT EXISTS `dm_dan_toc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_dan_toc` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ten_dan_toc` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.dm_dan_toc: ~56 rows (approximately)
/*!40000 ALTER TABLE `dm_dan_toc` DISABLE KEYS */;
INSERT INTO `dm_dan_toc` (`id`, `ma_dan_toc`, `ten_dan_toc`, `state`, `updated_at`, `created_at`) VALUES
	(1, '01', 'Kinh', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(2, '02', 'Tày', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(3, '03', 'Thái', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(4, '04', 'Hoa', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(5, '05', 'Khơ-me', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(6, '06', 'Mường', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(7, '07', 'Nùng', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(8, '08', 'HMông', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(9, '09', 'Dao', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(10, '10', 'Gia-rai', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(11, '11', 'Ngái', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(12, '12', 'Ê-đê', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(13, '13', 'Ba na', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(14, '14', 'Xơ-Đăng', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(15, '15', 'Sán Chay', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(16, '16', 'Cơ-ho', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(17, '17', 'Chăm', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(18, '18', 'Sán Dìu', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(19, '19', 'Hrê', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(20, '20', 'Mnông', 1, '2021-09-29 10:24:22', '2021-09-29 17:23:55'),
	(21, '21', 'Ra-glai', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(22, '22', 'Xtiêng', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(23, '23', 'Bru-Vân Kiều', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(24, '24', 'Thổ', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(25, '25', 'Giáy', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(26, '26', 'Cơ-tu', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(27, '27', 'Gié Triêng', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(28, '28', 'Mạ', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(29, '29', 'Khơ-mú', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(30, '30', 'Co', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(31, '31', 'Tà-ôi', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(32, '32', 'Chơ-ro', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(33, '33', 'Kháng', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(34, '34', 'Xinh-mun', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(35, '35', 'Hà Nhì', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(36, '36', 'Chu ru', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(37, '37', 'Lào', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(38, '38', 'La Chí', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(39, '39', 'La Ha', 1, '2021-09-30 19:39:44', '2021-09-29 17:23:55'),
	(40, '40', 'Phù Lá', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(41, '41', 'La Hủ', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(42, '42', 'Lự', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(43, '43', 'Lô Lô', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(44, '44', 'Chứt', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(45, '45', 'Mảng', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(46, '46', 'Pà Thẻn', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(47, '47', 'Co Lao', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(48, '48', 'Cống', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(49, '49', 'Bố Y', 1, '2021-09-30 19:42:48', '2021-09-29 17:23:55'),
	(50, '50', 'Si La', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(51, '51', 'Pu Péo', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(52, '52', 'Brâu', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(53, '53', 'Ơ Đu', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(54, '54', 'Rơ măm', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(55, '55', 'Người nước ngoài', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55'),
	(56, '56', 'Không rõ', 1, '2021-09-29 17:23:55', '2021-09-29 17:23:55');
/*!40000 ALTER TABLE `dm_dan_toc` ENABLE KEYS */;

-- Dumping structure for table qlhv.dm_dia_chi
CREATE TABLE IF NOT EXISTS `dm_dia_chi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MA_DIA_CHI` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DIA_CHI` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `PARENT_ID` int(11) NOT NULL,
  `STATE` int(11) NOT NULL DEFAULT 0,
  `UPDATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.dm_dia_chi: ~5 rows (approximately)
/*!40000 ALTER TABLE `dm_dia_chi` DISABLE KEYS */;
INSERT INTO `dm_dia_chi` (`ID`, `MA_DIA_CHI`, `DIA_CHI`, `PARENT_ID`, `STATE`, `UPDATED_AT`, `CREATED_AT`) VALUES
	(1, 'SO_TNMT', 'Sở Tài nguyên và Môi trường', 0, 1, '2021-06-30 08:12:12', '2021-06-30 08:12:12'),
	(2, 'SO_TTTT', 'Sở Thông tin và Truyền thông', 0, 1, '2021-06-30 08:13:14', '2021-06-30 08:13:14'),
	(3, 'SO_VHTTDL', 'Sở Văn hóa, Thể thao và Du lịch', 0, 1, '2021-06-30 08:15:08', '2021-06-30 08:15:08'),
	(4, 'SO_KHCN', 'Sở Khoa học và Công nghệ', 0, 1, '2021-06-30 08:16:17', '2021-06-30 08:16:17'),
	(7, 'SO_CT', 'Sở Công thương', 0, 1, '2021-06-30 08:23:36', '2021-06-30 08:23:36');
/*!40000 ALTER TABLE `dm_dia_chi` ENABLE KEYS */;

-- Dumping structure for table qlhv.dm_don_vi
CREATE TABLE IF NOT EXISTS `dm_don_vi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_don_vi` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ten_don_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.dm_don_vi: ~12 rows (approximately)
/*!40000 ALTER TABLE `dm_don_vi` DISABLE KEYS */;
INSERT INTO `dm_don_vi` (`id`, `ma_don_vi`, `ten_don_vi`, `state`, `updated_at`, `created_at`) VALUES
	(1, 'SO_TNMT', 'Sở Tài nguyên Môi trường', 1, '2021-07-02 07:07:57', '2021-07-02 07:07:57'),
	(3, 'SO_TTTT', 'Sở Thông tin Truyền thông', 1, '2021-07-02 07:21:26', '2021-07-02 07:21:26'),
	(4, 'SO_XD', 'Sở Xây dựng', 1, '2021-07-02 07:21:36', '2021-07-02 07:21:36'),
	(5, 'SO_VHTTDL', 'Sở Văn hóa, Thể thao, Du lịch', 1, '2021-07-02 07:22:02', '2021-07-02 07:22:02'),
	(7, 'CHI_CUC_BVMT', 'Chi cục Bảo vệ môi trường', 1, '2021-07-02 07:32:59', '2021-07-02 07:32:59'),
	(8, 'TRUONG_NANG_KHIEU', 'Trường năng khiếu', 1, '2021-07-02 08:13:36', '2021-07-02 08:13:36'),
	(9, 'CONG_AN_TINH', 'Công an Tỉnh', 1, '2021-07-02 08:27:45', '2021-07-02 08:27:45'),
	(10, 'PHONG_THAM_MUU', 'Phòng Tham mưu', 1, '2021-07-02 08:28:25', '2021-07-02 08:28:25'),
	(11, 'PHONG_PB_11', 'Phòng PB 11', 1, '2021-07-02 08:29:07', '2021-07-02 08:29:07'),
	(16, 'SO_KHCN', 'Sở Khoa học Công nghệ', 1, '2021-09-23 01:56:15', '2021-09-23 01:56:15'),
	(17, 'TEST', 'Đơn vị test 3', 0, '2021-09-23 19:46:19', '2021-09-23 18:16:10'),
	(20, 'TEST3', 'Đơn vị test 3', 1, '2021-09-30 19:43:34', '2021-09-30 19:43:34');
/*!40000 ALTER TABLE `dm_don_vi` ENABLE KEYS */;

-- Dumping structure for table qlhv.dm_nhom_quyen
CREATE TABLE IF NOT EXISTS `dm_nhom_quyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_nhom_quyen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten_nhom_quyen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.dm_nhom_quyen: ~4 rows (approximately)
/*!40000 ALTER TABLE `dm_nhom_quyen` DISABLE KEYS */;
INSERT INTO `dm_nhom_quyen` (`id`, `ma_nhom_quyen`, `ten_nhom_quyen`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Quản trị', '2021-09-24 08:07:35', '2021-09-24 08:07:35'),
	(2, 'admin_don_vi', 'Quản trị đơn vị', '2021-09-24 08:08:18', '2021-09-24 08:08:18'),
	(3, 'hoc_vien', 'Học viên', '2021-09-24 08:08:24', '2021-09-24 08:08:24'),
	(4, 'khach', 'Khách', '2021-09-24 08:08:29', '2021-09-24 08:08:29');
/*!40000 ALTER TABLE `dm_nhom_quyen` ENABLE KEYS */;

-- Dumping structure for table qlhv.dm_tham_so_he_thong
CREATE TABLE IF NOT EXISTS `dm_tham_so_he_thong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_tham_so` varchar(250) DEFAULT NULL,
  `ten_tham_so` varchar(250) DEFAULT NULL,
  `loai_tham_so` varchar(250) DEFAULT NULL,
  `gia_tri_tham_so` varchar(250) DEFAULT NULL,
  `mo_ta_tham_so` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table qlhv.dm_tham_so_he_thong: ~0 rows (approximately)
/*!40000 ALTER TABLE `dm_tham_so_he_thong` DISABLE KEYS */;
/*!40000 ALTER TABLE `dm_tham_so_he_thong` ENABLE KEYS */;

-- Dumping structure for table qlhv.hoc_vien
CREATE TABLE IF NOT EXISTS `hoc_vien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `ma_hoc_vien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nam_sinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noi_sinh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chuc_vu_dang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chuc_vu_chinh_quyen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_dan_toc` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ma_don_vi` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ma_khoa_hoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_DAN_TOC` (`ma_dan_toc`) USING BTREE,
  KEY `FK_DON_VI` (`ma_don_vi`) USING BTREE,
  KEY `FK_LOP_HOC` (`ma_khoa_hoc`) USING BTREE,
  KEY `id_users` (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.hoc_vien: ~8 rows (approximately)
/*!40000 ALTER TABLE `hoc_vien` DISABLE KEYS */;
INSERT INTO `hoc_vien` (`id`, `id_user`, `ma_hoc_vien`, `nam_sinh`, `noi_sinh`, `chuc_vu_dang`, `chuc_vu_chinh_quyen`, `ma_dan_toc`, `ma_don_vi`, `ma_khoa_hoc`, `state`, `updated_at`, `created_at`) VALUES
	(1, 72, '1123123', '10/01/1985', 'Trà Vinh', 'Không', 'Không', '01', 'SO_TNMT', 'TEST', 1, '2021-10-03 23:52:34', '2021-09-28 08:47:29'),
	(3, 75, '1212', NULL, NULL, NULL, NULL, '01', 'TRUONG_NANG_KHIEU', 'TEST', 0, '2021-10-03 23:52:34', '2021-09-28 20:32:37'),
	(4, 77, '001', NULL, NULL, NULL, NULL, '01', 'TEST3', 'TEST', 1, '2021-10-03 23:52:34', '2021-09-29 09:55:14'),
	(5, 78, '002', NULL, NULL, NULL, NULL, '01', 'SO_TNMT', 'TEST', 0, '2021-10-03 23:52:34', '2021-09-29 09:55:46'),
	(6, 79, '002', NULL, NULL, NULL, NULL, '01', 'SO_TNMT', 'TEST', 0, '2021-10-03 23:52:34', '2021-09-29 10:15:52'),
	(7, 80, '003', NULL, NULL, NULL, NULL, '01', 'SO_TNMT', 'TEST', 0, '2021-10-03 23:52:34', '2021-09-29 10:16:27'),
	(8, 81, '009', NULL, NULL, NULL, NULL, '01', 'SO_TNMT', 'TEST', 0, '2021-10-03 23:52:34', '2021-09-29 18:07:15'),
	(9, 82, '010', NULL, NULL, NULL, NULL, '09', 'SO_VHTTDL', 'TEST', 0, '2021-10-03 23:52:34', '2021-09-29 23:59:35');
/*!40000 ALTER TABLE `hoc_vien` ENABLE KEYS */;

-- Dumping structure for table qlhv.ket_qua
CREATE TABLE IF NOT EXISTS `ket_qua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_mon_hoc` int(11) NOT NULL,
  `id_khoa_hoc` int(11) NOT NULL,
  `lan_thi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diem` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ket_qua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xep_loai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_mon_hoc` (`id_mon_hoc`),
  KEY `ma_khoa_hoc` (`id_khoa_hoc`) USING BTREE,
  KEY `ma_hoc_vien` (`id_user`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.ket_qua: ~0 rows (approximately)
/*!40000 ALTER TABLE `ket_qua` DISABLE KEYS */;
/*!40000 ALTER TABLE `ket_qua` ENABLE KEYS */;

-- Dumping structure for table qlhv.khoa_hoc
CREATE TABLE IF NOT EXISTS `khoa_hoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_khoa_hoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_khoa_hoc` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `tu_nam` int(11) DEFAULT NULL,
  `den_nam` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.khoa_hoc: ~3 rows (approximately)
/*!40000 ALTER TABLE `khoa_hoc` DISABLE KEYS */;
INSERT INTO `khoa_hoc` (`id`, `ma_khoa_hoc`, `ten_khoa_hoc`, `tu_nam`, `den_nam`, `state`, `updated_at`, `created_at`) VALUES
	(3, 'KHOA_2015_2016', 'Lớp Trung cấp lý luận chính trị - hành chính tập trung khóa 24', 2015, 2016, 1, '2021-07-06 09:57:06', '2021-07-06 09:57:06'),
	(4, 'KHOA_2016_2017', 'Lớp Trung cấp lý luận chính trị - hành chính tập trung khóa 25', 2016, 2017, 1, '2021-07-06 09:58:05', '2021-07-06 09:58:05'),
	(5, 'KHOA_2020', 'Khóa học năm 2020', 2019, 2020, 1, '2021-08-17 02:01:19', '2021-08-17 02:01:19'),
	(8, 'TEST', 'Khóa học test', 2020, 2021, 1, '2021-10-03 23:49:12', '2021-09-23 01:55:02');
/*!40000 ALTER TABLE `khoa_hoc` ENABLE KEYS */;

-- Dumping structure for table qlhv.mon_hoc
CREATE TABLE IF NOT EXISTS `mon_hoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_mon_hoc` text COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.mon_hoc: ~5 rows (approximately)
/*!40000 ALTER TABLE `mon_hoc` DISABLE KEYS */;
INSERT INTO `mon_hoc` (`id`, `ten_mon_hoc`, `state`, `updated_at`, `created_at`) VALUES
	(1, 'I.1: Những vấn đề cơ bản của chủ nghĩa Mác Lênin', 1, '2021-09-30 09:04:16', '2021-09-30 09:04:16'),
	(2, 'I.2: Những vấn đề cơ bản của tư tưởng Hồ Chí Minh', 1, '2021-09-30 02:35:42', '2021-09-30 02:34:46'),
	(4, 'II: Những vấn đề cơ bản về Đảng Cộng sản và lịch sử Đảng Cộng sản Việt Nam', 1, '2021-09-30 02:36:08', '2021-09-30 02:36:08'),
	(5, 'III.1: Những vấn đề cơ bản về hệ thống chính trị,  nhà nước và pháp luật xã hội chủ nghĩa', 1, '2021-09-30 02:36:22', '2021-09-30 02:36:22'),
	(6, 'III.2: Những vấn đề cơ bản về quản lý hành chính nhà nước', 1, '2021-09-30 02:36:34', '2021-09-30 02:36:34');
/*!40000 ALTER TABLE `mon_hoc` ENABLE KEYS */;

-- Dumping structure for table qlhv.quyen_nhom_quyen
CREATE TABLE IF NOT EXISTS `quyen_nhom_quyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_nhom_quyen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_quyen` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.quyen_nhom_quyen: ~24 rows (approximately)
/*!40000 ALTER TABLE `quyen_nhom_quyen` DISABLE KEYS */;
INSERT INTO `quyen_nhom_quyen` (`id`, `ma_nhom_quyen`, `ma_quyen`, `created_at`, `updated_at`) VALUES
	(58, 'admin_don_vi', 'view_tai_khoan', '2021-09-26 20:39:37', '2021-09-26 20:39:37'),
	(59, 'admin_don_vi', 'edit_tai_khoan', '2021-09-26 20:39:37', '2021-09-26 20:39:37'),
	(74, 'hoc_vien', 'view_khoa_hoc', '2021-09-27 03:00:45', '2021-09-27 03:00:45'),
	(75, 'hoc_vien', 'view_mon_hoc', '2021-09-27 03:00:45', '2021-09-27 03:00:45'),
	(76, 'hoc_vien', 'view_dan_toc', '2021-09-27 03:00:45', '2021-09-27 03:00:45'),
	(77, 'hoc_vien', 'edit_dan_toc', '2021-09-27 03:00:45', '2021-09-27 03:00:45'),
	(91, 'khach', 'view_tai_khoan', '2021-09-27 18:24:17', '2021-09-27 18:24:17'),
	(92, 'khach', 'view_khoa_hoc', '2021-09-27 18:24:17', '2021-09-27 18:24:17'),
	(93, 'khach', 'edit_khoa_hoc', '2021-09-27 18:24:17', '2021-09-27 18:24:17'),
	(94, 'khach', 'view_don_vi', '2021-09-27 18:24:17', '2021-09-27 18:24:17'),
	(95, 'khach', 'edit_don_vi', '2021-09-27 18:24:17', '2021-09-27 18:24:17'),
	(108, 'admin', 'view_tai_khoan', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(109, 'admin', 'edit_tai_khoan', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(110, 'admin', 'view_hoc_vien', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(111, 'admin', 'edit_hoc_vien', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(112, 'admin', 'view_khoa_hoc', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(113, 'admin', 'edit_khoa_hoc', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(114, 'admin', 'xep_khoa_hoc', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(115, 'admin', 'view_mon_hoc', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(116, 'admin', 'edit_mon_hoc', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(117, 'admin', 'view_dan_toc', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(118, 'admin', 'edit_dan_toc', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(119, 'admin', 'view_don_vi', '2021-09-29 11:03:52', '2021-09-29 11:03:52'),
	(120, 'admin', 'edit_don_vi', '2021-09-29 11:03:52', '2021-09-29 11:03:52');
/*!40000 ALTER TABLE `quyen_nhom_quyen` ENABLE KEYS */;

-- Dumping structure for table qlhv.to_do
CREATE TABLE IF NOT EXISTS `to_do` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `noi_dung` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `ngay_giao` datetime DEFAULT current_timestamp(),
  `han_xu_ly` datetime DEFAULT NULL,
  `ngay_hoan_thanh` datetime DEFAULT NULL,
  `sap_xep` int(11) NOT NULL DEFAULT 0,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_to_do_users` (`id_user`),
  CONSTRAINT `FK_to_do_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.to_do: ~0 rows (approximately)
/*!40000 ALTER TABLE `to_do` DISABLE KEYS */;
INSERT INTO `to_do` (`id`, `id_user`, `noi_dung`, `file`, `ngay_tao`, `ngay_giao`, `han_xu_ly`, `ngay_hoan_thanh`, `sap_xep`, `trang_thai`) VALUES
	(44, 59, 'Test', NULL, '2021-06-22 08:49:53', '2021-06-22 08:49:53', NULL, '2021-07-02 08:51:20', 0, 1);
/*!40000 ALTER TABLE `to_do` ENABLE KEYS */;

-- Dumping structure for table qlhv.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `di_dong` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhom_quyen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nguoi_dung',
  `state` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlhv.users: ~15 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `hoten`, `username`, `password`, `gioi_tinh`, `hinh_anh`, `di_dong`, `nhom_quyen`, `state`, `created_at`, `updated_at`) VALUES
	(59, 'Quản trị', 'admin', 'YjM0NmU0ZmZmMGIwNDAzZGFhYTgzYWVlNzFmODQzOTA=z', 'nam', 'logo.png', NULL, 'admin', 1, '2021-06-21 18:20:02', '2021-06-21 18:20:02'),
	(60, 'Phan Văn Thanh', 'thanhpv.tvh@vnpt.vn', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', '', '0941138484', 'admin', 1, '2021-06-21 18:26:10', '2021-08-19 02:53:39'),
	(61, 'Phạm Kim Tín', 'tinpk.tvh@vnpt.vn', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', '', NULL, 'admin_don_vi', 1, '2021-06-21 18:41:13', '2021-09-26 20:36:43'),
	(62, 'Nguyễn Chí Thanh', 'thanhnc.tvh@vnpt.vn', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', '', '0913658639', 'admin', 1, '2021-06-21 18:41:36', '2021-08-20 02:54:43'),
	(70, 'Trần Thị M', '123', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nu', '', '0913658639', 'khach', 0, '2021-08-21 10:47:20', '2021-09-26 20:31:56'),
	(72, 'Nguyễn Văn An', 'nguyenvanan', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', '', NULL, 'hoc_vien', 1, '2021-09-26 23:49:48', '2021-09-29 10:28:42'),
	(73, 'Khách', 'khach', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', '', NULL, 'khach', 1, '2021-09-27 18:12:38', '2021-09-27 18:12:38'),
	(75, 'Trần B', 'tranb', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', NULL, NULL, 'hoc_vien', 0, '2021-09-28 20:32:37', '2021-10-03 23:45:51'),
	(77, 'Nguyễn Văn A', 'nguyenvana', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', NULL, NULL, 'hoc_vien', 1, '2021-09-29 09:55:14', '2021-09-29 18:48:26'),
	(78, 'Nguyễn Văn B', 'nguyenvanb', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', NULL, NULL, 'hoc_vien', 0, '2021-09-29 09:55:46', '2021-09-29 09:55:46'),
	(79, 'Nguyễn Văn C', 'nguyenvanc', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', NULL, NULL, 'hoc_vien', 0, '2021-09-29 10:15:52', '2021-09-29 10:15:52'),
	(80, 'Nguyễn Văn D', 'nguyenvand', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nu', NULL, NULL, 'hoc_vien', 0, '2021-09-29 10:16:27', '2021-09-29 10:16:39'),
	(81, 'Nguyễn Trần Văn E', 'nguyentranvane', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nu', NULL, NULL, 'hoc_vien', 0, '2021-09-29 18:07:15', '2021-09-29 18:07:15'),
	(82, 'Trần Văn C', 'tranvanc', 'MzkxNDBkZTNmYTVhNDliNTc0YjU1YzZjODc1Nzg5MmY=z', 'nam', NULL, NULL, 'hoc_vien', 0, '2021-09-29 23:59:35', '2021-09-29 23:59:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table qlhv.users_role
CREATE TABLE IF NOT EXISTS `users_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_role_id` (`user_id`,`role_id`),
  KEY `FK_users_role_admin_role` (`role_id`),
  CONSTRAINT `FK_users_role_admin_role` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_users_role_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- Dumping data for table qlhv.users_role: ~4 rows (approximately)
/*!40000 ALTER TABLE `users_role` DISABLE KEYS */;
INSERT INTO `users_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(64, 59, 1, '2021-06-22 08:40:39', '2021-06-22 08:40:39'),
	(65, 60, 1, '2021-06-22 08:40:47', '2021-06-22 08:40:47'),
	(66, 61, 1, '2021-06-22 08:41:45', '2021-06-22 08:41:45'),
	(67, 62, 1, '2021-06-22 08:41:50', '2021-06-22 08:41:50');
/*!40000 ALTER TABLE `users_role` ENABLE KEYS */;

-- Dumping structure for table qlhv.xep_mon_hoc
CREATE TABLE IF NOT EXISTS `xep_mon_hoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mon_hoc` int(11) NOT NULL,
  `id_khoa_hoc` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_mon_hoc` (`id_mon_hoc`),
  KEY `id_khoa_hoc` (`id_khoa_hoc`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table qlhv.xep_mon_hoc: ~7 rows (approximately)
/*!40000 ALTER TABLE `xep_mon_hoc` DISABLE KEYS */;
INSERT INTO `xep_mon_hoc` (`id`, `id_mon_hoc`, `id_khoa_hoc`, `updated_at`, `created_at`) VALUES
	(19, 4, 3, '2021-10-01 10:49:37', '2021-10-01 10:49:37'),
	(20, 5, 3, '2021-10-01 10:49:37', '2021-10-01 10:49:37'),
	(21, 1, 8, '2021-10-03 23:49:19', '2021-10-03 23:49:19'),
	(22, 2, 8, '2021-10-03 23:49:19', '2021-10-03 23:49:19'),
	(23, 4, 8, '2021-10-03 23:49:19', '2021-10-03 23:49:19'),
	(24, 5, 8, '2021-10-03 23:49:19', '2021-10-03 23:49:19'),
	(25, 6, 8, '2021-10-03 23:49:19', '2021-10-03 23:49:19');
/*!40000 ALTER TABLE `xep_mon_hoc` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
