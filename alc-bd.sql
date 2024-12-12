-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla alc.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.cache: ~10 rows (aproximadamente)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('10d7701ef5eabb2e411fa04a027fc977', 'i:1;', 1732808646),
	('10d7701ef5eabb2e411fa04a027fc977:timer', 'i:1732808646;', 1732808646),
	('14b877e4018e7f4f11340b9d74cc30d3', 'i:1;', 1733937209),
	('14b877e4018e7f4f11340b9d74cc30d3:timer', 'i:1733937209;', 1733937209),
	('715b820d88ad28617bf1e30a179bdc09', 'i:1;', 1733928160),
	('715b820d88ad28617bf1e30a179bdc09:timer', 'i:1733928160;', 1733928160),
	('92696e8631d8372dce9c128fcc5e1174', 'i:1;', 1732711050),
	('92696e8631d8372dce9c128fcc5e1174:timer', 'i:1732711050;', 1732711050),
	('98171836892639a3dc078b470a38b51c', 'i:1;', 1732808789),
	('98171836892639a3dc078b470a38b51c:timer', 'i:1732808789;', 1732808789);

-- Volcando estructura para tabla alc.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.documentos
CREATE TABLE IF NOT EXISTS `documentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_actualizacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_creacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.documentos: ~27 rows (aproximadamente)
INSERT INTO `documentos` (`id`, `nombre`, `estado`, `usuario_actualizacion`, `usuario_creacion`, `tipo`, `url`, `motivo`, `created_at`, `updated_at`) VALUES
	(1, 'Certificado Antecedentes Actualizados', 'aprobado', '2', '1', 'pdf', NULL, NULL, '2024-11-03 00:13:16', '2024-11-26 22:25:05'),
	(2, 'Certificado Antecedentes', 'aprobado', '2', '1', 'pdf', NULL, NULL, '2024-11-03 00:13:16', '2024-11-27 19:24:36'),
	(5, 'Certificado Residencia', 'enviado', '1', '1', 'pdf', NULL, NULL, '2024-11-26 23:02:23', '2024-11-26 23:02:23'),
	(6, 'Certificado Estudios', 'enviado', '1', '1', 'pdf', 'strorage/DocumentosCargados/certificado_residencia.pdf', NULL, '2024-11-26 23:03:45', '2024-11-26 23:03:45'),
	(46, 'Cedula de identidad', 'enviado', '1', '1', 'pdf', 'storage/DocumentosCargados/Cedula_de_identidad-54.pdf', NULL, '2024-11-27 05:19:15', '2024-11-27 05:19:15'),
	(47, 'Cedula de identidad reverso', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Cedula_de_identidad_reverso-54.jpeg', NULL, '2024-11-27 05:19:21', '2024-11-27 05:19:21'),
	(48, 'Certificado de estudios', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Certificado_de_estudios-54.jpeg', NULL, '2024-11-27 05:19:31', '2024-11-27 05:19:31'),
	(49, 'Certificado residencia', 'enviado', '1', '1', 'pdf', 'storage/DocumentosCargados/Certificado_residencia-54.pdf', NULL, '2024-11-27 05:19:37', '2024-11-27 05:19:37'),
	(50, 'Cedula de identidad', 'aprobado', '1', '1', 'pdf', 'storage/DocumentosCargados/Cedula_de_identidad-55.pdf', NULL, '2024-11-28 01:50:11', '2024-11-28 01:53:51'),
	(51, 'Cedula de identidad reverso', 'aprobado', '1', '1', 'ipynb', 'storage/DocumentosCargados/Cedula_de_identidad_reverso-55.ipynb', NULL, '2024-11-28 01:50:16', '2024-11-28 01:53:52'),
	(52, 'Certificado de estudios', 'aprobado', '1', '1', 'xlsx', 'storage/DocumentosCargados/Certificado_de_estudios-55.xlsx', NULL, '2024-11-28 01:50:22', '2024-11-28 01:53:53'),
	(53, 'Certificado residencia', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Certificado_residencia-55.jpeg', NULL, '2024-11-28 01:50:27', '2024-11-28 01:53:53'),
	(54, 'Cedula de identidad', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Cedula_de_identidad-57.jpeg', NULL, '2024-12-01 00:15:01', '2024-12-01 00:15:01'),
	(55, 'Cedula de identidad reverso', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Cedula_de_identidad_reverso-57.jpeg', NULL, '2024-12-01 00:15:02', '2024-12-01 00:15:02'),
	(56, 'Certificado de estudios', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Certificado_de_estudios-57.jpeg', NULL, '2024-12-01 00:15:11', '2024-12-01 00:15:11'),
	(57, 'Certificado residencia', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Certificado_residencia-57.jpeg', NULL, '2024-12-01 00:15:15', '2024-12-01 00:15:15'),
	(58, 'Hoja de vida del conductor', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Hoja_de_vida_del_conductor-57.jpeg', NULL, '2024-12-01 00:15:26', '2024-12-01 00:15:26'),
	(59, 'Cedula de identidad', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Cedula_de_identidad-58.jpeg', NULL, '2024-12-05 02:06:56', '2024-12-05 02:06:56'),
	(60, 'Cedula de identidad reverso', 'enviado', '1', '1', 'docx', 'storage/DocumentosCargados/Cedula_de_identidad_reverso-58.docx', NULL, '2024-12-05 02:07:01', '2024-12-05 02:07:01'),
	(61, 'Certificado de estudios', 'enviado', '1', '1', 'pdf', 'storage/DocumentosCargados/Certificado_de_estudios-58.pdf', NULL, '2024-12-05 02:07:07', '2024-12-05 02:07:07'),
	(62, 'Certificado residencia', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Certificado_residencia-58.jpeg', NULL, '2024-12-05 02:07:25', '2024-12-05 02:07:25'),
	(63, 'Hoja de vida del conductor', 'enviado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Hoja_de_vida_del_conductor-58.jpeg', NULL, '2024-12-05 02:07:28', '2024-12-05 02:07:28'),
	(64, 'Cedula de identidad', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Cedula_de_identidad-59.jpeg', NULL, '2024-12-05 03:37:23', '2024-12-05 03:39:46'),
	(65, 'Cedula de identidad reverso', 'aprobado', '1', '1', 'pdf', 'storage/DocumentosCargados/Cedula_de_identidad_reverso-59.pdf', NULL, '2024-12-05 03:37:28', '2024-12-05 03:39:44'),
	(66, 'Certificado de estudios', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Certificado_de_estudios-59.jpeg', NULL, '2024-12-05 03:37:33', '2024-12-05 03:39:44'),
	(67, 'Certificado residencia', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Certificado_residencia-59.jpeg', NULL, '2024-12-05 03:37:37', '2024-12-05 03:39:43'),
	(68, 'Hoja de vida del conductor', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Hoja_de_vida_del_conductor-59.jpeg', NULL, '2024-12-05 03:37:41', '2024-12-05 03:39:43'),
	(69, 'Cedula de identidad', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Cedula_de_identidad-60.jpeg', NULL, '2024-12-11 20:04:54', '2024-12-11 20:14:28'),
	(70, 'Cedula de identidad reverso', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Cedula_de_identidad_reverso-60.jpeg', NULL, '2024-12-11 20:04:58', '2024-12-11 20:14:29'),
	(71, 'Certificado de estudios', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Certificado_de_estudios-60.jpeg', NULL, '2024-12-11 20:05:02', '2024-12-11 20:14:30'),
	(72, 'Certificado residencia', 'aprobado', '1', '1', 'docx', 'storage/DocumentosCargados/Certificado_residencia-60.docx', NULL, '2024-12-11 20:06:36', '2024-12-11 20:14:31'),
	(73, 'Hoja de vida del conductor', 'aprobado', '1', '1', 'jpeg', 'storage/DocumentosCargados/Hoja_de_vida_del_conductor-60.jpeg', NULL, '2024-12-11 20:06:40', '2024-12-11 20:14:32');

-- Volcando estructura para tabla alc.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.estados: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.licencias
CREATE TABLE IF NOT EXISTS `licencias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vigencia_anos` int DEFAULT NULL,
  `folio` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotografia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.licencias: ~2 rows (aproximadamente)
INSERT INTO `licencias` (`id`, `tipo`, `vigencia_anos`, `folio`, `estado`, `id_usuario`, `observaciones`, `fotografia`, `created_at`, `updated_at`) VALUES
	(2, 'Clase B/C', 4, '172064', 'vigente', '1', 'Debe utilizar lentes opticos', 'urlFotografia', '2024-11-02 20:19:36', '2024-11-02 20:27:24'),
	(4, 'Clase B', 6, '172068', 'renovada', '1', 'Debe utilizar lentes opticos', 'urlFotografia', '2023-11-03 00:06:48', '2024-11-03 00:06:48');

-- Volcando estructura para tabla alc.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.migrations: ~15 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_10_27_145858_create_logins_table', 1),
	(5, '2024_10_29_215847_add_two_factor_columns_to_users_table', 2),
	(6, '2024_10_29_215938_create_personal_access_tokens_table', 2),
	(7, '2024_10_29_222738_create_permission_tables', 2),
	(8, '2024_10_31_030157_create_licencias_table', 3),
	(9, '2024_10_31_030210_create_estados_table', 3),
	(10, '2024_10_31_030227_create_documentos_table', 3),
	(11, '2024_10_31_030326_create_pagos_table', 3),
	(12, '2024_10_31_030351_create_res_examenes_table', 3),
	(13, '2024_10_31_030413_create_tipo_tramites_table', 3),
	(14, '2024_10_31_203504_create_tipo_licencias_table', 3),
	(15, '2024_10_31_212912_create_solicitudes_table', 3);

-- Volcando estructura para tabla alc.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.model_has_roles: ~2 rows (aproximadamente)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(3, 'App\\Models\\User', 1),
	(1, 'App\\Models\\User', 9);

-- Volcando estructura para tabla alc.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicitud_id` bigint unsigned DEFAULT NULL,
  `total` float DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1: Pendiente, 2: Aprobada, 3: Rechazada',
  `motivo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.pagos: ~8 rows (aproximadamente)
INSERT INTO `pagos` (`id`, `session_id`, `solicitud_id`, `total`, `status`, `motivo`, `created_at`, `updated_at`) VALUES
	(12, '123457', 1, 66450, 2, '1', '2024-11-01 22:22:50', '2024-11-01 22:23:39'),
	(31, '123457', 51, 66450, 2, NULL, '2024-11-26 04:24:02', '2024-11-26 04:25:15'),
	(32, '123457', 51, 25590, 2, NULL, '2024-11-26 06:31:45', '2024-11-26 06:32:40'),
	(33, '123457', 54, 25590, 2, NULL, '2024-11-27 03:45:33', '2024-11-27 03:46:49'),
	(34, '123457', 55, 25590, 2, NULL, '2024-11-28 01:50:31', '2024-11-28 01:51:09'),
	(35, '123457', 57, 25590, 2, NULL, '2024-12-01 00:15:36', '2024-12-01 00:16:12'),
	(36, '123457', 58, 25590, 2, NULL, '2024-12-05 02:07:35', '2024-12-05 02:08:18'),
	(37, '123457', 59, 25590, 2, NULL, '2024-12-05 03:37:44', '2024-12-05 03:38:18'),
	(38, '123457', 60, 25590, 2, NULL, '2024-12-11 20:06:47', '2024-12-11 20:08:27');

-- Volcando estructura para tabla alc.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.permissions: ~4 rows (aproximadamente)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'crear roles', 'web', '2024-10-30 02:35:44', '2024-10-30 02:35:44'),
	(2, 'leer roles', 'web', '2024-10-30 02:35:45', '2024-10-30 02:35:45'),
	(3, 'actualizar roles', 'web', '2024-10-30 02:35:45', '2024-10-30 02:35:45'),
	(4, 'eliminar roles', 'web', '2024-10-30 02:35:45', '2024-10-30 02:35:45');

-- Volcando estructura para tabla alc.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.res_examenes
CREATE TABLE IF NOT EXISTS `res_examenes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_examen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `porcentaje` int DEFAULT NULL,
  `puntaje` int DEFAULT NULL,
  `id_solicitud` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.res_examenes: ~8 rows (aproximadamente)
INSERT INTO `res_examenes` (`id`, `nombre_examen`, `estado`, `porcentaje`, `puntaje`, `id_solicitud`, `created_at`, `updated_at`) VALUES
	(1, 'examen practico', 'aprobado', 100, 35, '54', '2024-11-27 12:08:02', NULL),
	(2, 'examen medico', 'aprobado', 85, NULL, '54', '2024-11-27 12:08:48', NULL),
	(3, 'examen teorico', 'aprobado', 100, 35, '54', '2024-11-27 16:47:40', '2024-11-27 16:47:40'),
	(4, 'nuevo examen', 'aprobado', 100, 100, '54', '2024-11-27 17:18:31', '2024-11-27 17:18:31'),
	(5, 'Examen teorico', 'aprobado', 100, 1000, '1', '2024-11-27 17:23:05', '2024-11-27 17:23:05'),
	(6, 'examen teorico', 'aprobado', 100, 35, '55', '2024-11-28 01:55:56', '2024-11-28 01:55:56'),
	(7, 'examen practico', 'aprobado', 100, 1000, '55', '2024-11-28 01:56:14', '2024-11-28 01:56:14'),
	(8, 'examen practico', 'aprobado', NULL, 1000, '59', '2024-12-05 03:39:39', '2024-12-05 03:39:39'),
	(9, 'practico', 'aprobado', 100, 1000, '60', '2024-12-11 20:15:24', '2024-12-11 20:15:24');

-- Volcando estructura para tabla alc.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.roles: ~3 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2024-10-30 02:35:44', '2024-10-30 02:35:44'),
	(2, 'municipal', 'web', '2024-10-30 02:35:44', '2024-10-30 02:35:44'),
	(3, 'usuario', 'web', '2024-10-30 02:35:44', '2024-10-30 02:35:44');

-- Volcando estructura para tabla alc.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.role_has_permissions: ~4 rows (aproximadamente)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1);

-- Volcando estructura para tabla alc.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.sessions: ~4 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('FSo4XA1otEZYaaQOmRURK187tAuT643FdRlyO7qr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUDlxTldTNk5SVFpnTjFvdk5pVzhBOHA3T2N1V0NxUThKbzBZOHFCdSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2FsYy50ZXN0L3VzZXJzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9hbGMudGVzdC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733961821),
	('XmMSmeJ2bvmrOTfWErKy4CfjJBc8OmOcnx84nE85', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiR0lhV0Jrc3c2QTNreFlVVWdVSXJPSkREcmx6OEVpTVBLcG55bnFOeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733928007),
	('YUq8L5fMEmoGjqmoerPlukpZk4V4sv9p4qBRfxSs', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib0d2T0I2eEFKaWRqVUhUTzR6MTZHa0JXOXVITHNRWUFrV00zSXFiZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQ3VXNkOEpxcm1JTDdjZk8vUzV0bUdlbUl6YW1KUUJ4SzhOUWhJY2IwOFRVeEYvREdUcU9SaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9hbGMudGVzdC91c2VycyI7fX0=', 1733943966);

-- Volcando estructura para tabla alc.solicitudes
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pago` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_actualizacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_agendada` date DEFAULT NULL,
  `hora_agendada` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_res_examen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tipo_tramite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'inicio',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.solicitudes: ~12 rows (aproximadamente)
INSERT INTO `solicitudes` (`id`, `id_usuario`, `id_pago`, `id_estado`, `usuario_actualizacion`, `fecha_agendada`, `hora_agendada`, `id_res_examen`, `id_tipo_tramite`, `step`, `created_at`, `updated_at`) VALUES
	(1, '1', '12', '1', '1', '2024-11-11', NULL, '1', '1', 'Pago', NULL, '2024-11-28 01:50:30'),
	(2, '9', '12', '1', '12', NULL, NULL, '1', '1', 'carga de documentos', NULL, '2024-11-25 06:35:39'),
	(12, '1', NULL, NULL, '1', NULL, NULL, NULL, '2', 'seleccionando hora', '2024-11-25 07:05:51', '2024-11-25 07:10:33'),
	(51, '1', '31', NULL, '1', NULL, NULL, NULL, '1', 'Proceso Finalizado', '2024-11-26 04:02:34', '2024-11-26 06:33:31'),
	(52, '1', NULL, NULL, '1', NULL, NULL, NULL, '2', 'formulario de salud', '2024-11-26 23:43:25', '2024-11-26 23:46:40'),
	(53, '1', NULL, NULL, '1', NULL, NULL, NULL, '1', 'Carga documentos', '2024-11-26 23:57:40', '2024-11-27 00:02:06'),
	(54, '1', NULL, NULL, '1', '2024-11-30', '13:30', NULL, '1', 'formulario de salud', '2024-11-27 03:33:03', '2024-11-27 05:30:48'),
	(55, '1', NULL, NULL, '1', '2024-11-28', '12:30', NULL, '1', 'formulario de salud', '2024-11-28 01:48:33', '2024-11-28 17:05:07'),
	(56, '1', NULL, NULL, '1', '2024-11-12', '11:00', NULL, '1', 'formulario de salud', '2024-11-28 17:14:12', '2024-11-28 17:15:27'),
	(57, '1', NULL, NULL, '1', '2024-11-14', '11:30', NULL, '1', 'Proceso Finalizado', '2024-12-01 00:11:05', '2024-12-01 01:03:59'),
	(58, '1', NULL, NULL, '1', '2024-12-04', '11:00', NULL, '1', 'Proceso Finalizado', '2024-12-05 02:04:10', '2024-12-05 02:08:32'),
	(59, '1', NULL, NULL, '1', '2024-12-20', '11:30', NULL, '1', 'Proceso Finalizado', '2024-12-05 03:35:30', '2024-12-05 03:38:28'),
	(60, '1', NULL, NULL, '1', '2024-12-12', '10:30', NULL, '1', 'Proceso Finalizado', '2024-12-11 18:26:15', '2024-12-11 20:10:51');

-- Volcando estructura para tabla alc.solicitud_has_documentos
CREATE TABLE IF NOT EXISTS `solicitud_has_documentos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_solicitud` bigint unsigned NOT NULL,
  `id_documento` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_solicitud` (`id_solicitud`),
  KEY `id_documentos` (`id_documento`),
  CONSTRAINT `id_documentos` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`),
  CONSTRAINT `id_solicitud` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla alc.solicitud_has_documentos: ~27 rows (aproximadamente)
INSERT INTO `solicitud_has_documentos` (`id`, `id_solicitud`, `id_documento`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 1, 2, NULL, NULL),
	(3, 51, 5, '2024-11-26 23:02:23', '2024-11-26 23:02:23'),
	(4, 51, 6, '2024-11-26 23:03:45', '2024-11-26 23:03:45'),
	(23, 54, 46, '2024-11-27 05:19:15', '2024-11-27 05:19:15'),
	(24, 54, 47, '2024-11-27 05:19:21', '2024-11-27 05:19:21'),
	(25, 54, 48, '2024-11-27 05:19:31', '2024-11-27 05:19:31'),
	(26, 54, 49, '2024-11-27 05:19:37', '2024-11-27 05:19:37'),
	(27, 55, 50, '2024-11-28 01:50:11', '2024-11-28 01:50:11'),
	(28, 55, 51, '2024-11-28 01:50:16', '2024-11-28 01:50:16'),
	(29, 55, 52, '2024-11-28 01:50:22', '2024-11-28 01:50:22'),
	(30, 55, 53, '2024-11-28 01:50:27', '2024-11-28 01:50:27'),
	(31, 57, 54, '2024-12-01 00:15:01', '2024-12-01 00:15:01'),
	(32, 57, 55, '2024-12-01 00:15:02', '2024-12-01 00:15:02'),
	(33, 57, 56, '2024-12-01 00:15:11', '2024-12-01 00:15:11'),
	(34, 57, 57, '2024-12-01 00:15:15', '2024-12-01 00:15:15'),
	(35, 57, 58, '2024-12-01 00:15:26', '2024-12-01 00:15:26'),
	(36, 58, 59, '2024-12-05 02:06:56', '2024-12-05 02:06:56'),
	(37, 58, 60, '2024-12-05 02:07:01', '2024-12-05 02:07:01'),
	(38, 58, 61, '2024-12-05 02:07:07', '2024-12-05 02:07:07'),
	(39, 58, 62, '2024-12-05 02:07:25', '2024-12-05 02:07:25'),
	(40, 58, 63, '2024-12-05 02:07:28', '2024-12-05 02:07:28'),
	(41, 59, 64, '2024-12-05 03:37:23', '2024-12-05 03:37:23'),
	(42, 59, 65, '2024-12-05 03:37:28', '2024-12-05 03:37:28'),
	(43, 59, 66, '2024-12-05 03:37:33', '2024-12-05 03:37:33'),
	(44, 59, 67, '2024-12-05 03:37:37', '2024-12-05 03:37:37'),
	(45, 59, 68, '2024-12-05 03:37:41', '2024-12-05 03:37:41'),
	(46, 60, 69, '2024-12-11 20:04:54', '2024-12-11 20:04:54'),
	(47, 60, 70, '2024-12-11 20:04:59', '2024-12-11 20:04:59'),
	(48, 60, 71, '2024-12-11 20:05:02', '2024-12-11 20:05:02'),
	(49, 60, 72, '2024-12-11 20:06:36', '2024-12-11 20:06:36'),
	(50, 60, 73, '2024-12-11 20:06:40', '2024-12-11 20:06:40');

-- Volcando estructura para tabla alc.tipo_licencias
CREATE TABLE IF NOT EXISTS `tipo_licencias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_estado` bigint unsigned NOT NULL,
  `curso` tinyint DEFAULT '1' COMMENT '1: No requiere, 2: requiere',
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.tipo_licencias: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alc.tipo_tramites
CREATE TABLE IF NOT EXISTS `tipo_tramites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` int NOT NULL,
  `status` tinyint DEFAULT '1' COMMENT '1: Activo, 2: Inactivo, 3: eliminado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.tipo_tramites: ~4 rows (aproximadamente)
INSERT INTO `tipo_tramites` (`id`, `nombre`, `precio`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Renovación de licencia', 25590, 1, '2024-11-02 21:10:26', '2024-11-02 21:10:26'),
	(2, 'Ampliacion de clase', 25990, 1, '2024-11-24 17:39:50', '2024-11-24 17:39:51'),
	(3, 'Duplicados', 15990, 1, NULL, NULL),
	(4, 'Primera obtención B', 38990, 1, NULL, NULL);

-- Volcando estructura para tabla alc.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rut` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aPaterno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aMaterno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `estadoCivil` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sexo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nacionalidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `profesion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `region` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comuna` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `numero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `block_torre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `depto_casa_local` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla alc.users: ~3 rows (aproximadamente)
INSERT INTO `users` (`id`, `rut`, `name`, `aPaterno`, `aMaterno`, `telefono`, `fechaNacimiento`, `estadoCivil`, `sexo`, `nacionalidad`, `profesion`, `region`, `comuna`, `calle`, `numero`, `block_torre`, `depto_casa_local`, `referencia`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, '134785675', 'Diego', 'Cartagena', 'Navarrete', '971886377', '1995-10-16', 'Soltero', 'Masculino', 'cl', 'Ingeniero', 'Metropolitana', 'La Florida', 'av la florida', '1550', '', NULL, '', 'd.develop2022@gmail.com', '2024-10-29 15:12:03', '$2y$12$dLpeIp4KKLEKf2D8o.qOT.MoIGZlcUTdxfrKeRBwJ7OKjEgKXzZVC', NULL, NULL, NULL, NULL, '2024-10-29 15:12:18', '2024-11-07 02:09:00'),
	(9, '190253430', 'admin', 'Municipal', 'Director', '', NULL, '', '', '', '', '', '', 'av la florida', '4569', '', NULL, '', 'admin@admin.cl', NULL, '$2y$12$7Usd8JqrmIL7cfO/S5tmGemIzamJQBxK8NQhIcb08TUxF/DGTqORi', NULL, NULL, NULL, NULL, '2024-10-31 20:54:22', '2024-11-26 22:16:54'),
	(12, '192197686', 'Diego Estebans', 'Cartagena', 'Navarrete', '971886375', '1995-10-16', 'soltero', 'masculino', 'cl', 'Ingeniero', 'Metropolitana', 'La Florida', 'aaa', '15115', 'block', NULL, 'mi casa', 'prueba@postmans.cl', NULL, '$2y$12$ku/s4MVKZ7CkQpVRLToLXuIPwkl29VunwBeCs1MjctOCI0VRFfM8e', NULL, NULL, NULL, NULL, '2024-11-02 17:00:50', '2024-11-27 08:01:13');

-- Volcando estructura para tabla alc.user_has_licencia
CREATE TABLE IF NOT EXISTS `user_has_licencia` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `licencia_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_id_licencia_id` (`user_id`,`licencia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tabla de relacion usuario licencia \r\nun usuario puede tener licenia a, licencia b, licencia c, todas con distinto folio y id ';

-- Volcando datos para la tabla alc.user_has_licencia: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
