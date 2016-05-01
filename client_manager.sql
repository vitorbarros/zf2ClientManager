-- MySQL Script generated by MySQL Workbench
-- Dom 01 Mai 2016 10:49:31 BRT
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
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_username_UNIQUE` (`user_username` ASC))
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
  `adderss_name` VARCHAR(255) NOT NULL,
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
  `client_cpf` VARCHAR(255) NOT NULL,
  `client_cnpj` VARCHAR(255) NOT NULL,
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
