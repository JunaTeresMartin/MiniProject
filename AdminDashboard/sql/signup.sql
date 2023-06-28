CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    age INT
);
ALTER TABLE users DROP age

ALTER TABLE `users` ADD `panchayath` VARCHAR(50) NOT NULL AFTER `username`;