

USE `cakephp_2_3`;

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) DEFAULT NULL,  
  `email` VARCHAR(255) DEFAULT NULL,
  `telephone` VARCHAR(255) DEFAULT NULL,
  `message` TEXT DEFAULT NULL,
  `created` DATETIME DEFAULT NULL,
  `modified` DATETIME DEFAULT NULL
);