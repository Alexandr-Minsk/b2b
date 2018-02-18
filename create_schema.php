<?php

require_once ('ConnectionDB.php');

$db = ConnectionDB::get();

$db->query("CREATE TABLE `users` (
                  `id` INT(11) NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(255) DEFAULT NULL,
                  `gender` INT(11) NOT NULL,
                  `birth_date` DATE NOT NULL,
                  PRIMARY KEY (`id`),
                  INDEX idx_birth_date (birth_date)
                  )
          ");

$db->query("CREATE TABLE `phone_numbers` (
                  `id` INT(11) NOT NULL AUTO_INCREMENT,
                  `user_id` INT(11) NOT NULL,
                  `phone` VARCHAR(255) DEFAULT NULL,
                  PRIMARY KEY (`id`),
                  FOREIGN KEY (user_id) REFERENCES users(id)
              )
          ");

error_log('Schema created');

