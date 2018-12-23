DROP DATABASE IF EXISTS users;
CREATE DATABASE users;
USE users;

CREATE TABLE account (
	id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(25) NOT NULL,
    favFood VARCHAR(25),
    PRIMARY KEY (id)
);
