
CREATE DATABASE `CatiumPan` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE CatiumPan;

CREATE TABLE `users` (
  `user_id` int NOT NULL DEFAULT '0',
  `user_name` varchar(32) DEFAULT NULL,
  `user_email` varchar(32) DEFAULT NULL,
  `user_password_md5` varchar(32) DEFAULT NULL,
  `user_uuid` varchar(32) NOT NULL,
  `user_upload_file_count` int DEFAULT '0',
  `user_download_file_count` int DEFAULT '0',
  PRIMARY KEY (`user_id`,`user_uuid`),
  UNIQUE KEY `id_UNIQUE` (`user_id`),
  UNIQUE KEY `user_uuid_UNIQUE` (`user_uuid`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `files` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_res` varchar(32) NOT NULL,
  `file_name` varchar(64) DEFAULT NULL,
  `file_uploader_uuid` varchar(32) DEFAULT NULL,
  `file_download_count` int DEFAULT '0',
  `file_max_download_count` int DEFAULT NULL,
  `file_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`,`file_res`),
  UNIQUE KEY `file_id_UNIQUE` (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;



