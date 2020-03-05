-- MySQL Script generated by MySQL Workbench
-- Thu Mar  5 12:02:50 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
-- Schema xogoteca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema xogoteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `xogoteca` DEFAULT CHARACTER SET latin1 ;
USE `xogoteca` ;

-- -----------------------------------------------------
-- Table `xogoteca`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xogoteca`.`usuarios` (
  `nome` VARCHAR(10) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NOT NULL,
  `contrasinal` VARCHAR(10) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NOT NULL,
  `rol` TINYINT(1) NOT NULL,
  PRIMARY KEY (`nome`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `xogoteca`.`estadisticas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xogoteca`.`estadisticas` (
  `codactividade` VARCHAR(4) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NOT NULL,
  `nomexogador` VARCHAR(10) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NOT NULL,
  `data` DATETIME NOT NULL,
  `puntos` INT(11) NOT NULL,
  `dificultade` ENUM('baixa', 'media', 'dificil') CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`codactividade`, `nomexogador`, `data`),
  INDEX `nomexogador` (`nomexogador` ASC),
  CONSTRAINT `estadisticas_ibfk_1`
    FOREIGN KEY (`nomexogador`)
    REFERENCES `xogoteca`.`usuarios` (`nome`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;

-- -----------------------------------------------------
-- Table `xogoteca`.`a4_categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xogoteca`.`a4_categorias` (
  `codactividade` VARCHAR(4) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NOT NULL,
  `nome` VARCHAR(45) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NOT NULL,
  `imaxeprincipal` VARCHAR(45) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NOT NULL,
  PRIMARY KEY (`nome`),
  UNIQUE INDEX `imaxeprincipal_UNIQUE` (`imaxeprincipal` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;

-- -----------------------------------------------------
-- Table `mydb`.`a4_imaxes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xogoteca`.`a4_imaxes` (
  `a4_idimaxe` INT NOT NULL AUTO_INCREMENT,
  `a4_categorias_nome` VARCHAR(45) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NOT NULL,
  `rutaimaxe` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`a4_idimaxe`, `a4_categorias_nome`),
  INDEX `fk_a4_imaxes_a4_categorias_idx` (`a4_categorias_nome` ASC),
  CONSTRAINT `fk_a4_imaxes_a4_categorias`
    FOREIGN KEY (`a4_categorias_nome`)
    REFERENCES `xogoteca`.`a4_categorias` (`nome`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

USE `xogoteca` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
