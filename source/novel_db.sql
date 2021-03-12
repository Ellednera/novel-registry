-- Create tables, then add primary and foreign keys, finally insert data
CREATE DATABASE `novel`;
USE `novel`;

CREATE TABLE `books` (
	`row_no` INT(255) NOT NULL AUTO_INCREMENT,
	`ISBN` VARCHAR(13) NOT NULL,
	`book_title` NVARCHAR(255) NOT NULL,
	`author` NVARCHAR(10) NOT NULL,
	`book_size_id` INT(1) NOT NULL,
	`description` NVARCHAR(255) NOT NULL,
	`brand_name` NVARCHAR(10) NOT NULL,
	`quantity` INT(5) NOT NULL,
	`fixed_price` VARCHAR(6) NOT NULL,
	`member_price` VARCHAR(6) NOT NULL,
	`free_gift` INT(1) NOT NULL,
	`deleted` INT(1) NOT NULL,
	PRIMARY KEY (`row_no`)
);

CREATE TABLE `book_size` (
	`book_size_id` INT(2) NOT NULL AUTO_INCREMENT,
	`book_size` VARCHAR(6) NOT NULL COMMENT '开本',
	PRIMARY KEY (book_size_id)
);

CREATE TABLE `members` (
	`member_list_id` INT(255) AUTO_INCREMENT NOT NULL,
	`member_id` VARCHAR(255) NOT NULL,
	`name_eng` VARCHAR(255) NOT NULL,
	`name_chi` NVARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`gender` VARCHAR(1) NOT NULL COMMENT 'M or F',
	PRIMARY KEY (member_list_id)
);


ALTER TABLE `books`
ADD FOREIGN KEY (book_size_id) 
REFERENCES `book_size`(book_size_id);

INSERT INTO `book_size`(`book_size_id`, `book_size`) VALUES
('', 16),
('', 32),
('', 'others'); 