CREATE DATABASE registration;

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(60) NOT NULL,
    lastName VARCHAR(60),
    address VARCHAR(50)
);