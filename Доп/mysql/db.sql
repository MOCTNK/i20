CREATE DATABASE db;

USE db;

CREATE TABLE applications (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(50),
	email VARCHAR(255),
	year INT,
	gender INT,
	topic VARCHAR(255),
	essence TEXT
);