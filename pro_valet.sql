/*
 Navicat Premium Data Transfer

 Source Server         : Local_MySQL
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : pro_valet

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 13/11/2023 17:11:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for garages
-- ----------------------------
DROP TABLE IF EXISTS `garages`;
CREATE TABLE `garages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `h` int(11) NOT NULL,
  `e` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of garages
-- ----------------------------
INSERT INTO `garages` VALUES (1, 332, 60, 40, 120, 45, NULL, '2023-11-13 18:21:47');
INSERT INTO `garages` VALUES (2, 390, 60, 40, 120, 3, NULL, '2023-11-13 19:27:58');
INSERT INTO `garages` VALUES (3, 448, 60, 40, 120, NULL, NULL, '2023-11-13 19:27:58');
INSERT INTO `garages` VALUES (4, 1600, 195, 115, 45, NULL, NULL, '2023-11-13 19:28:01');
INSERT INTO `garages` VALUES (5, 1600, 260, 115, 45, 47, NULL, '2023-11-13 18:35:10');
INSERT INTO `garages` VALUES (6, 506, 60, 40, 120, NULL, NULL, '2023-11-13 19:28:00');
INSERT INTO `garages` VALUES (7, 564, 60, 40, 120, NULL, NULL, '2023-11-13 18:36:16');
INSERT INTO `garages` VALUES (8, 624, 60, 40, 120, 46, NULL, '2023-11-13 18:36:16');
INSERT INTO `garages` VALUES (9, 682, 60, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (10, 740, 60, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (11, 798, 60, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (12, 856, 60, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (13, 914, 60, 40, 120, NULL, NULL, '2023-11-13 18:16:47');
INSERT INTO `garages` VALUES (14, 972, 60, 40, 120, 41, NULL, NULL);
INSERT INTO `garages` VALUES (15, 1030, 60, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (16, 1088, 60, 40, 120, 9, NULL, NULL);
INSERT INTO `garages` VALUES (17, 1146, 60, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (18, 1204, 60, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (19, 1262, 60, 40, 120, 12, NULL, NULL);
INSERT INTO `garages` VALUES (20, 1320, 60, 40, 120, 40, NULL, NULL);
INSERT INTO `garages` VALUES (21, 1378, 60, 40, 120, 44, NULL, '2023-11-13 19:28:02');
INSERT INTO `garages` VALUES (22, 1436, 60, 40, 120, 10, NULL, NULL);
INSERT INTO `garages` VALUES (23, 1494, 60, 40, 120, 8, NULL, '2023-11-13 18:35:13');
INSERT INTO `garages` VALUES (24, 1552, 60, 40, 120, NULL, NULL, '2023-11-13 18:35:12');
INSERT INTO `garages` VALUES (25, 1600, 325, 115, 45, 43, NULL, '2023-11-13 18:36:19');
INSERT INTO `garages` VALUES (26, 1600, 390, 115, 45, 0, NULL, NULL);
INSERT INTO `garages` VALUES (27, 332, 340, 40, 120, 24, NULL, '2023-11-13 18:16:31');
INSERT INTO `garages` VALUES (28, 390, 340, 40, 120, NULL, NULL, '2023-11-13 18:16:31');
INSERT INTO `garages` VALUES (29, 448, 340, 40, 120, 38, NULL, NULL);
INSERT INTO `garages` VALUES (30, 508, 340, 40, 120, 42, NULL, NULL);
INSERT INTO `garages` VALUES (31, 566, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (32, 624, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (33, 682, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (34, 740, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (35, 798, 340, 40, 120, 21, NULL, NULL);
INSERT INTO `garages` VALUES (36, 856, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (37, 914, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (38, 972, 340, 40, 120, 36, NULL, NULL);
INSERT INTO `garages` VALUES (39, 1030, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (40, 1088, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (41, 1146, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (42, 1204, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (43, 1262, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (44, 1320, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (45, 1378, 340, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (46, 332, 490, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (47, 390, 490, 40, 120, 25, NULL, NULL);
INSERT INTO `garages` VALUES (48, 448, 490, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (49, 508, 490, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (50, 566, 490, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (51, 624, 490, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (52, 682, 490, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (53, 740, 490, 40, 120, 26, NULL, NULL);
INSERT INTO `garages` VALUES (54, 1204, 490, 40, 120, 29, NULL, NULL);
INSERT INTO `garages` VALUES (55, 1262, 490, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (56, 1320, 490, 40, 120, 31, NULL, NULL);
INSERT INTO `garages` VALUES (57, 1378, 490, 40, 120, 32, NULL, NULL);
INSERT INTO `garages` VALUES (58, 158, 770, 40, 120, 17, NULL, NULL);
INSERT INTO `garages` VALUES (59, 216, 770, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (60, 274, 770, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (61, 332, 770, 40, 120, 16, NULL, '2023-11-13 18:16:33');
INSERT INTO `garages` VALUES (62, 390, 770, 40, 120, NULL, NULL, '2023-11-13 18:16:33');
INSERT INTO `garages` VALUES (63, 448, 770, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (64, 506, 770, 40, 120, 7, NULL, NULL);
INSERT INTO `garages` VALUES (65, 564, 770, 40, 120, 20, NULL, NULL);
INSERT INTO `garages` VALUES (66, 622, 770, 40, 120, 23, NULL, NULL);
INSERT INTO `garages` VALUES (67, 680, 770, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (68, 738, 770, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (69, 796, 770, 40, 120, 13, NULL, NULL);
INSERT INTO `garages` VALUES (70, 1230, 770, 40, 120, 35, NULL, NULL);
INSERT INTO `garages` VALUES (71, 1290, 770, 40, 120, 0, NULL, NULL);
INSERT INTO `garages` VALUES (72, 1347, 770, 40, 120, 34, NULL, NULL);
INSERT INTO `garages` VALUES (73, 1425, 770, 40, 120, 14, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_11_13_151900_create_garages_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
