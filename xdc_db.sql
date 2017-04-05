/*
 Target Server Type    : MySQL
 Target Server Version : 50549
 File Encoding         : utf-8

 Date: 04/05/2017 10:41:28 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admin_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_role`;
CREATE TABLE `admin_user_role` (
  `admin_user_role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_user_id` mediumint(9) NOT NULL,
  `role_id` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_super_admin` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `admin_users`
-- ----------------------------
BEGIN;
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$eHICFqlTnWRxiKP2NjHA1.wNnznmUpCjkGWmQFCOAWzD8/LlBwtoa', 'Administrator', '1', 'ubnuYATxauauWGNTUFzkOU6pyYtKOUR9hBdLeYasSSYbOHxTMWCDTUYdBtwZ', null, '2017-04-01 16:54:58');
COMMIT;

-- ----------------------------
--  Table structure for `menu_role`
-- ----------------------------
DROP TABLE IF EXISTS `menu_role`;
CREATE TABLE `menu_role` (
  `menu_role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` mediumint(9) NOT NULL,
  `role_id` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` mediumint(9) NOT NULL,
  `icon` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort_order` tinyint(4) NOT NULL DEFAULT '50',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`menu_id`),
  UNIQUE KEY `uri` (`uri`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `menus`
-- ----------------------------
BEGIN;
INSERT INTO `menus` VALUES ('1', '首页', '0', 'fa-link', 'admin.index', '1', '1', null, '2017-03-31 11:29:23', '1'), ('2', '权限管理', '0', 'fa-bars', '', '1', '2', null, '2017-03-31 11:29:23', '1'), ('3', '管理员管理', '2', 'fa-user', 'admin.adminUser.index', '1', '1', null, '2017-03-31 12:00:38', '1'), ('4', '角色管理', '2', 'fa-users', 'admin.role.index', '1', '2', null, '2017-03-31 17:39:47', '1'), ('6', '节点管理', '2', 'fa-align-justify', 'admin.menu.index', '1', '4', null, '2017-04-01 15:10:12', '1'), ('8', '节点保存', '6', 'fa-bars', 'admin.menu.update', '1', '50', '2017-04-01 15:49:58', '2017-04-01 16:46:15', '0'), ('11', '节点编辑', '6', 'fa-edit', 'admin.menu.edit', '1', '50', '2017-04-01 17:35:38', '2017-04-01 17:36:28', '0');
COMMIT;


-- ----------------------------
--  Table structure for `permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` mediumint(9) NOT NULL,
  `permission_id` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permission_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `permission_role`
-- ----------------------------
BEGIN;
INSERT INTO `permission_role` VALUES ('19', '2', '2', '2017-04-01 14:45:20', '2017-04-01 14:45:20'), ('20', '2', '4', '2017-04-01 14:45:20', '2017-04-01 14:45:20');
COMMIT;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
