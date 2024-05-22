show databases;
create database doctorpatient;
show databases;
use doctorpatient;
CREATE TABLE doctor (
	id INT(11) NOT NULL AUTO_INCREMENT,
	user_name VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	name VARCHAR(255) NOT NULL,
    primary key (id)
);
CREATE TABLE `patients` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`age` INT(11) NOT NULL,
	`gender` VARCHAR(255) NOT NULL,
	`dob` DATE NOT NULL,
	`mail` VARCHAR(255) NOT NULL,
	`address` VARCHAR(255) NOT NULL,
    primary key(id)
);
ALTER TABLE patients ADD COLUMN receipt varchar(255) AFTER address;
ALTER TABLE patients ADD COLUMN uploaddate DATE AFTER receipt;
ALTER TABLE doctor ADD COLUMN age int(11) NOT NULL AFTER name;
ALTER TABLE doctor ADD COLUMN gender varchar(255) NOT NULL AFTER age;
ALTER TABLE doctor ADD dob date AFTER gender;
ALTER TABLE doctor ADD COLUMN mail varchar(255) NOT NULL AFTER dob;
ALTER TABLE doctor ADD COLUMN address varchar(255) NOT NULL AFTER mail;
CREATE TABLE `slots` (
	`date` DATE unique NOT NULL,
	`time` TIME NOT NULL,
	`m1` VARCHAR(255) NOT NULL DEFAULT 'Empty',
	`m2` VARCHAR(255) NOT NULL DEFAULT 'Empty',
	`m3` VARCHAR(255) NOT NULL DEFAULT 'Empty',
	`m4` VARCHAR(255) NOT NULL DEFAULT 'Empty',
	`a1` VARCHAR(255) NOT NULL DEFAULT 'Empty',
	`a2` VARCHAR(255) NOT NULL DEFAULT 'Empty',
	`a3` VARCHAR(255) NOT NULL DEFAULT 'Empty',
	`a4` VARCHAR(255) NOT NULL DEFAULT 'Empty',
	`user_name` VARCHAR(255) NOT NULL
) ENGINE=InnoDB;