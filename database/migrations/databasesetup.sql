-- WARNING: This file contains hardcoded credentials. Do not use in a production environment.

CREATE DATABASE nasa;
USE nasa;
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'abc123.';
GRANT SELECT, INSERT, UPDATE, DELETE ON nasa.* TO 'admin'@'localhost';
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  token varchar(255) DEFAULT NULL,
  api_calls_remaining int(11) NOT NULL DEFAULT 2000,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;