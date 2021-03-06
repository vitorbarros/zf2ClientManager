-- MySQL Script generated by MySQL Workbench
-- Dom 15 Mai 2016 15:42:48 BRT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema client_manager_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `client_manager_db` ;

-- -----------------------------------------------------
-- Schema client_manager_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `client_manager_db` DEFAULT CHARACTER SET latin1 ;
USE `client_manager_db` ;

-- -----------------------------------------------------
-- Table `client_manager_db`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`role` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`role` (
  `role_id` INT NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(100) NOT NULL,
  `role_created_at` DATETIME NOT NULL,
  `role_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`role_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`user` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `user_username` VARCHAR(255) NOT NULL,
  `user_password` VARCHAR(255) NOT NULL,
  `user_salt` VARCHAR(255) NOT NULL,
  `user_activation_key` VARCHAR(255) NOT NULL,
  `user_status` VARCHAR(255) NOT NULL,
  `user_created_at` DATETIME NOT NULL,
  `user_updated_at` DATETIME NOT NULL,
  `role` INT NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_username_UNIQUE` (`user_username` ASC),
  INDEX `fk_user_role1_idx` (`role` ASC),
  CONSTRAINT `fk_user_role1`
    FOREIGN KEY (`role`)
    REFERENCES `client_manager_db`.`role` (`role_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`contact` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`contact` (
  `contact_id` INT NOT NULL AUTO_INCREMENT,
  `contact_name` VARCHAR(255) NOT NULL,
  `contact_phone_1` VARCHAR(255) NOT NULL,
  `contact_phone_2` VARCHAR(255) NULL,
  `contact_created_at` DATETIME NOT NULL,
  `contact_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`contact_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`address` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`address` (
  `address_id` INT NOT NULL AUTO_INCREMENT,
  `address_name` VARCHAR(255) NOT NULL,
  `address_zipcode` VARCHAR(255) NOT NULL,
  `address_city` VARCHAR(255) NOT NULL,
  `address_state` VARCHAR(255) NOT NULL,
  `address_created_at` DATETIME NOT NULL,
  `address_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`address_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`client`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`client` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`client` (
  `client_id` INT NOT NULL AUTO_INCREMENT,
  `client_name` VARCHAR(255) NOT NULL,
  `client_cpf` VARCHAR(255) NULL,
  `client_cnpj` VARCHAR(255) NULL,
  `client_email` VARCHAR(255) NOT NULL,
  `user` INT NOT NULL,
  `contact` INT NOT NULL,
  `address` INT NOT NULL,
  `client_created_at` DATETIME NOT NULL,
  `client_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`client_id`),
  INDEX `fk_client_user_idx` (`user` ASC),
  INDEX `fk_client_contact1_idx` (`contact` ASC),
  INDEX `fk_client_address1_idx` (`address` ASC),
  CONSTRAINT `fk_client_user`
    FOREIGN KEY (`user`)
    REFERENCES `client_manager_db`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_contact1`
    FOREIGN KEY (`contact`)
    REFERENCES `client_manager_db`.`contact` (`contact_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_address1`
    FOREIGN KEY (`address`)
    REFERENCES `client_manager_db`.`address` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`service`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`service` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`service` (
  `service_id` INT NOT NULL AUTO_INCREMENT,
  `service_name` VARCHAR(255) NOT NULL,
  `service_created_at` DATETIME NOT NULL,
  `service_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`service_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`budget_request`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`budget_request` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`budget_request` (
  `budget_request_id` INT NOT NULL AUTO_INCREMENT,
  `budget_request_description` TEXT NOT NULL,
  `budget_request_created_at` DATETIME NOT NULL,
  `budget_request_updated_at` DATETIME NOT NULL,
  `budget_request_status` TINYINT NOT NULL,
  `service` INT NOT NULL,
  `client` INT NOT NULL,
  PRIMARY KEY (`budget_request_id`),
  INDEX `fk_budget_request_service1_idx` (`service` ASC),
  INDEX `fk_budget_request_client1_idx` (`client` ASC),
  CONSTRAINT `fk_budget_request_service1`
    FOREIGN KEY (`service`)
    REFERENCES `client_manager_db`.`service` (`service_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_budget_request_client1`
    FOREIGN KEY (`client`)
    REFERENCES `client_manager_db`.`client` (`client_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`student` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`student` (
  `student_id` INT NOT NULL AUTO_INCREMENT,
  `student_name` VARCHAR(255) NOT NULL,
  `student_email` VARCHAR(255) NOT NULL,
  `student_created_at` DATETIME NOT NULL,
  `student_updated_at` DATETIME NOT NULL,
  `user` INT NOT NULL,
  PRIMARY KEY (`student_id`),
  INDEX `fk_student_user1_idx` (`user` ASC),
  CONSTRAINT `fk_student_user1`
    FOREIGN KEY (`user`)
    REFERENCES `client_manager_db`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`course_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`course_type` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`course_type` (
  `course_type_id` INT NOT NULL AUTO_INCREMENT,
  `course_type_name` VARCHAR(255) NOT NULL,
  `course_type_created_at` DATETIME NOT NULL,
  `course_type_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`course_type_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`course` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`course` (
  `course_id` INT NOT NULL AUTO_INCREMENT,
  `course_name` VARCHAR(255) NOT NULL,
  `course_created_at` DATETIME NOT NULL,
  `course_updated_at` DATETIME NOT NULL,
  `user` INT NOT NULL,
  `course_type` INT NOT NULL,
  `course_status` TINYINT NOT NULL,
  PRIMARY KEY (`course_id`),
  INDEX `fk_course_user1_idx` (`user` ASC),
  INDEX `fk_course_course_type1_idx` (`course_type` ASC),
  CONSTRAINT `fk_course_user1`
    FOREIGN KEY (`user`)
    REFERENCES `client_manager_db`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_course_type1`
    FOREIGN KEY (`course_type`)
    REFERENCES `client_manager_db`.`course_type` (`course_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `client_manager_db`.`inscription`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `client_manager_db`.`inscription` ;

CREATE TABLE IF NOT EXISTS `client_manager_db`.`inscription` (
  `inscription_id` INT NOT NULL AUTO_INCREMENT,
  `inscription_created_at` DATETIME NOT NULL,
  `inscription_updated_at` DATETIME NOT NULL,
  `inscription_expiration_date` DATETIME NOT NULL,
  `inscription_status` TINYINT NOT NULL,
  `student` INT NOT NULL,
  `course` INT NOT NULL,
  PRIMARY KEY (`inscription_id`),
  INDEX `fk_inscription_student1_idx` (`student` ASC),
  INDEX `fk_inscription_course1_idx` (`course` ASC),
  CONSTRAINT `fk_inscription_student1`
    FOREIGN KEY (`student`)
    REFERENCES `client_manager_db`.`student` (`student_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscription_course1`
    FOREIGN KEY (`course`)
    REFERENCES `client_manager_db`.`course` (`course_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
