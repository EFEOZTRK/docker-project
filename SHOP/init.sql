CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` VARCHAR(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `last_name` VARCHAR(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `addr` VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;