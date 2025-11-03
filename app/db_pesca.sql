-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.5 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_pesca
CREATE DATABASE IF NOT EXISTS `db_pesca` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pesca`;

-- Dumping structure for table db_pesca.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_departments_users` (`user`),
  CONSTRAINT `FK_departments_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pesca.departments: ~4 rows (approximately)
INSERT INTO `departments` (`id`, `name`, `description`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'TI', NULL, 3, '2023-06-24 19:14:14', NULL, NULL),
	(2, 'RH', NULL, 3, '2023-06-24 19:14:16', NULL, NULL),
	(3, 'Administracao', NULL, 3, '2023-06-24 19:14:16', NULL, NULL),
	(4, 'Financas', '', 3, '2023-06-16 07:41:42', '2023-06-16 07:41:42', NULL);

-- Dumping structure for table db_pesca.files_session
CREATE TABLE IF NOT EXISTS `files_session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text,
  `fishing_session` int NOT NULL,
  `user` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__users_files` (`user`),
  KEY `FK_files_fishing_session` (`fishing_session`),
  CONSTRAINT `FK__users_files` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_files_fishing_session` FOREIGN KEY (`fishing_session`) REFERENCES `fishing_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pesca.files_session: ~2 rows (approximately)
INSERT INTO `files_session` (`id`, `file`, `file_name`, `description`, `fishing_session`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, '1686860720_9f613c37e78541085aa3.pdf', 'Lei No 1', '', 1, 3, '2023-06-15 18:25:20', '2023-06-15 18:25:20', NULL),
	(6, '1686902749_16657ede95f832447187.pdf', 'ola', '', 7, 3, '2023-06-16 06:05:49', '2023-06-16 06:05:49', NULL);

-- Dumping structure for table db_pesca.fishing_session
CREATE TABLE IF NOT EXISTS `fishing_session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `stop_date` datetime DEFAULT NULL,
  `user` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fishing_session_users` (`user`),
  CONSTRAINT `FK_fishing_session_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pesca.fishing_session: ~2 rows (approximately)
INSERT INTO `fishing_session` (`id`, `title`, `description`, `start_date`, `stop_date`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Regulamentação da pesca para nova época que se avizinha', 'In this example, we assume you have retrieved the date from the database and stored it in the variable dbDate. You need to format the date string according to the required format for the date input field, which is "YYYY-MM-DD" (e.g., "2023-07-02").\r\n\r\nAfter that, you can get a reference to the date input element using getElementById() and assign the formatted date value (dbDate) to the value property of the input element. This will set the input field\'s value to the date retrieved from the database.\r\n\r\nMake sure to adjust the variable name (dbDate) and the format of the retrieved date according to your specific case.\r\n\r\nBy setting the value property of the date input field, the input will be populated with the date value from the database, and the date picker in the browser will display the corresponding date.', '2023-08-31 00:00:00', '2023-11-10 00:00:00', 3, '2023-06-13 10:47:10', '2023-07-02 13:40:21', NULL),
	(7, 'rgegerg', 'gregerg', '2023-06-16 00:00:00', '2023-06-23 00:00:00', 3, '2023-06-16 06:05:34', '2023-06-16 06:05:34', NULL);

-- Dumping structure for table db_pesca.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `message` text,
  `user` int DEFAULT NULL,
  `send` int DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  KEY `Index 1` (`id`),
  KEY `FK__users_messages` (`user`),
  CONSTRAINT `FK__users_messages` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pesca.messages: ~2 rows (approximately)
INSERT INTO `messages` (`id`, `type`, `message`, `user`, `send`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'E-mail', 'Vao pra casa.', 3, 10, '2023-07-11 18:26:28', '2025-09-09 15:24:29', NULL),
	(2, 'Mensagem', 'dwfewgewg', 3, 12, '2023-07-11 18:55:19', '2025-10-28 06:27:21', NULL);

-- Dumping structure for table db_pesca.newsletter
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `register` int DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pesca.newsletter: ~2 rows (approximately)
INSERT INTO `newsletter` (`id`, `name`, `email`, `contact`, `register`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, 'Muculo', 'justivenciof@gmail.com', '+258841474480', 0, '2023-07-09 11:06:04', '2023-07-09 11:06:04', NULL),
	(7, 'Agatah', 'agah@gmail.com', '+258875124492', 0, '2023-07-16 09:57:23', '2023-07-16 10:13:27', NULL);

-- Dumping structure for table db_pesca.notices
CREATE TABLE IF NOT EXISTS `notices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `user` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__users_notice` (`user`),
  CONSTRAINT `FK__users_notice` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pesca.notices: ~0 rows (approximately)
INSERT INTO `notices` (`id`, `title`, `description`, `image`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'peixe pende em risco de extinsão dsfdsds', 'e, we have an input field of type "date" with the id myDateInput. We also have a button with an onclick event handler that calls the setDate() function.\r\n\r\nIn the JavaScript function setDate(), we first get a reference to the date input element using getElementById(). Then, we create a new Date object to get the current date and convert it to an ISO string format. We split the ISO string at the \'T\' character to remove the time portion and only keep the date portion.\r\n\r\nFinally, we assign the current date value to the value property of the date input element, which will set the input field\'s value to the current date.\r\n\r\nWhen you click the "Set Date" button, it will set the current date as the value in the date input field.\r\n\r\nNote: Keep in mind that setting the value of a date input field programmatically does not trigger the default browser behavior for displaying the date picker. It simply sets the value, and how the browser displays the date picker or handles the value is dependent on the browser itself.\r\n\r\n\r\n\r\n\r\n\r\nUser\r\nhow to set date in input coming on db\r\nChatGPT\r\nTo set a date value retrieved from a database into an input field of type "date" using JavaScript, you need to format the date appropriately and assign it to the value property of the input element. Here\'s an example:\r\n\r\nHTML:\r\n\r\nhtml\r\nCopy code\r\n<input type="date" id="myDateInput">\r\nJavaScript:\r\n\r\njavascript\r\nCopy code\r\n// Assume you have retrieved the date from the database and stored it in a variable called \'dbDate\'\r\nvar dbDate = "2023-07-02"; // Sample date retrieved from the database\r\n\r\nvar dateInput = document.getElementById(\'myDateInput\');\r\ndateInput.value = dbDate;\r\nIn this example, we assume you have retrieved the date from the database and stored it in the variable dbDate. You need to format the date string according to the required format for the date input field, which is "YYYY-MM-DD" (e.g., "2023-07-02").\r\n\r\nAfter that, you can get a reference to the date input element using getElementById() and assign the formatted date value (dbDate) to the value property of the input element. This will set the input field\'s value to the date retrieved from the database.\r\n\r\nMake sure to adjust the variable name (dbDate) and the format of the retrieved date according to your specific case.\r\n\r\nBy setting the value property of the date input field, the input will be populated with the date value from the database, and the date picker in the browser will display the corresponding date.\r\n\r\n\r\n\r\n\r\n\r\nUser\r\nusing php\r\nChatGPT\r\nTo set a date value retrieved from a database into an input field of type "date" using PHP, you can echo the date value within the value attribute of the input element. Here\'s an example:\r\n\r\nhtml\r\nCopy code\r\n<input type="date" id="myDateInput" value="<?= $dbDate ?>">\r\nIn this example, we assume you have retrieved the date from the database and stored it in the variable $dbDate in PHP. You can then echo the value of $dbDate within the value attribute of the input element using <?= ?> shorthand for PHP echo.\r\n\r\nMake sure to adjust the variable name ($dbDate) according to the variable that holds the date value retrieved from the database.\r\n\r\nBy echoing the date value within the value attribute, the input field will be populated with the date value from the database, and the date picker in the browser will display the corresponding date.\r\n\r\nNote: When echoing the date value, ensure that it is in the correct format expected by the value attribute of the input field, which is "YYYY-MM-DD" (e.g., "2023-07-02"). If the date value retrieved from the database is in a different format, you may need to format it accordingly before echoing it. Regenerate response', '1688904413_8dd9c9cf647c5a661b0f.jpg', 3, '2023-07-02 15:55:31', '2023-07-09 10:06:53', NULL);

-- Dumping structure for table db_pesca.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `born_day` date DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `school_level` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `contact` int DEFAULT '0',
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `user_level` int NOT NULL DEFAULT '0',
  `department` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_users_user_levels` (`user_level`),
  KEY `FK_users_departments` (`department`),
  CONSTRAINT `FK_users_departments` FOREIGN KEY (`department`) REFERENCES `departments` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_users_user_levels` FOREIGN KEY (`user_level`) REFERENCES `user_levels` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pesca.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `born_day`, `gender`, `school_level`, `status`, `username`, `password`, `email`, `contact`, `token`, `user_level`, `department`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'Adminstrador do sistema', NULL, '', '', 1, 'admin', '$2y$10$reY4p1kAC/ZSKswTZ.qLsOzunFaQC3b0L0GYD5Bv18AH1deJ6nd3W', 'justivenciof@gmail.com', 0, '0', 1, 1, '2023-06-11 11:54:06', '2025-09-09 13:17:25', NULL),
	(8, 'Joao Mateus', NULL, '', '', 1, 'jaoom', '$2y$10$kLwl2phnpLcaN3bAnjirvu890MBMaLIBZhEWFG0/IqopwbpTp0AUu', 'j@gmal.com', 841474480, '0', 2, 1, '2023-06-13 07:26:21', '2023-07-01 11:37:08', NULL),
	(9, 'Alberto Gustavo', '2006-02-07', 'Masculino', 'Superior', 1, 'agustavo', '$2y$10$7Vs.Ork32UVgYkgFaqZnKOudoK63tXrqwCIFw/6PYtU1k5SYCvImS', 'gustavo@gmai.com', 875455878, '0', 2, 1, '2023-07-01 12:40:12', '2023-07-01 12:46:00', NULL);

-- Dumping structure for table db_pesca.user_levels
CREATE TABLE IF NOT EXISTS `user_levels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pesca.user_levels: ~2 rows (approximately)
INSERT INTO `user_levels` (`id`, `name`) VALUES
	(1, 'Super Usuario'),
	(2, 'Usuario');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
