CREATE TABLE `client` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`first_name` varchar(100) NOT NULL,
	`last_name` varchar(100) NOT NULL,
	`contact_number` varchar(20) NOT NULL,
	`email` varchar(50) NOT NULL,
	`address` varchar(255) NOT NULL,
	`birthday` varchar(255) NOT NULL,
	`date_registered` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `reservation` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`check_in` TIMESTAMP NOT NULL,
	`check_out` TIMESTAMP NOT NULL,
	`client_id` INT(11) NOT NULL,
	`room_id` INT(11) NOT NULL,
	`person_count` INT(11) NOT NULL,
	`type` varchar(50) NOT NULL,
	`status` varchar(50) NOT NULL,
	`date_created` TIMESTAMP NOT NULL,
	`date_updated` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `room` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`type` varchar(50) NOT NULL,
	`description` TEXT NOT NULL,
	`simple_description` varchar(255) NOT NULL,
	`capacity` INT(1) NOT NULL,
	`rate` DECIMAL(10,2) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `transaction` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`reservation_id` INT(11) NOT NULL,
	`payment_method` varchar(50) NOT NULL,
	`amount_paid` DECIMAL(10, 2) NOT NULL,
	`total_amount` DECIMAL(10,2) NOT NULL,
	`change` DECIMAL(10,2) NOT NULL,
	`date_created` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `booking_expenses` (
	`reservation_id` INT(11) NOT NULL,
	`expense_id` INT(11) NOT NULL,
	`quantity` INT(11) NOT NULL,
	`amount` DECIMAL(10,2) NOT NULL
);

CREATE TABLE `expenses` (
	`id` INT(11) NOT NULL,
	`name` varchar(100) NOT NULL,
	`amount` DECIMAL(10,2) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `booking_discount` (
	`reservation_id` INT(11) NOT NULL,
	`discount_id` INT(11) NOT NULL,
	`amount` DECIMAL(10,2) NOT NULL
);

CREATE TABLE `discount` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`amount` DECIMAL(10,2) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `booking_cancelled` (
	`reservation_id` INT(11) NOT NULL,
	`date_cancelled` TIMESTAMP NOT NULL,
	`reason` varchar(255) NOT NULL
);

CREATE TABLE `booking_check` (
	`reservation_id` INT(11) NOT NULL,
	`check_in` TIMESTAMP NOT NULL,
	`check_out` TIMESTAMP NOT NULL
);

CREATE TABLE `account` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(100) NOT NULL,
	`last_name` varchar(100) NOT NULL,
	`contact` varchar(20) NOT NULL,
	`email` varchar(50) NOT NULL,
	`type` varchar(50) NOT NULL,
	`username` varchar(50) NOT NULL,
	`password` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `room_status` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`room_id` INT(11) NOT NULL,
	`status_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `status` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `reservation` ADD CONSTRAINT `reservation_fk0` FOREIGN KEY (`client_id`) REFERENCES `client`(`id`);

ALTER TABLE `reservation` ADD CONSTRAINT `reservation_fk1` FOREIGN KEY (`room_id`) REFERENCES `room`(`id`);

ALTER TABLE `transaction` ADD CONSTRAINT `transaction_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `reservation`(`id`);

ALTER TABLE `booking_expenses` ADD CONSTRAINT `booking_expenses_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `transaction`(`id`);

ALTER TABLE `booking_expenses` ADD CONSTRAINT `booking_expenses_fk1` FOREIGN KEY (`expense_id`) REFERENCES `expenses`(`id`);

ALTER TABLE `booking_discount` ADD CONSTRAINT `booking_discount_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `reservation`(`id`);

ALTER TABLE `booking_discount` ADD CONSTRAINT `booking_discount_fk1` FOREIGN KEY (`discount_id`) REFERENCES `discount`(`id`);

ALTER TABLE `booking_cancelled` ADD CONSTRAINT `booking_cancelled_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `reservation`(`id`);

ALTER TABLE `booking_check` ADD CONSTRAINT `booking_check_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `reservation`(`id`);

ALTER TABLE `room_status` ADD CONSTRAINT `room_status_fk0` FOREIGN KEY (`room_id`) REFERENCES `room`(`id`);

ALTER TABLE `room_status` ADD CONSTRAINT `room_status_fk1` FOREIGN KEY (`status_id`) REFERENCES `status`(`id`);

