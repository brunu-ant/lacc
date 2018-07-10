-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema lacc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lacc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lacc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `lacc` ;

-- -----------------------------------------------------
-- Table `lacc`.`conta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacc`.`conta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `ativo` TINYINT(1) NOT NULL DEFAULT '1',
  `dataCadastro` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `lacc`.`ano`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacc`.`ano` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `conta` INT(11) NULL DEFAULT NULL,
  `valor` INT(11) NOT NULL,
  `dataCadastro` DATETIME NOT NULL,
  `ativo` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  INDEX `fk_conta_idx` (`conta` ASC),
  CONSTRAINT `fk_ano_conta`
    FOREIGN KEY (`conta`)
    REFERENCES `lacc`.`conta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `lacc`.`semestre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacc`.`semestre` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `conta` INT(11) NOT NULL,
  `ano` INT(11) NOT NULL,
  `nome` VARCHAR(20) NOT NULL,
  `dataInicial` DATE NOT NULL,
  `dataFinal` DATE NOT NULL,
  `dataCadastro` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_semestre_ano`
    FOREIGN KEY (`id`)
    REFERENCES `lacc`.`ano` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_semestre_conta`
    FOREIGN KEY (`id`)
    REFERENCES `lacc`.`conta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `lacc`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacc`.`turma` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `conta` INT(11) NOT NULL,
  `ano` INT(11) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `turno` TINYINT(1) NOT NULL,
  `ativo` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  INDEX `fk_turma_conta_idx` (`conta` ASC),
  INDEX `fk_turma_ano_idx` (`ano` ASC),
  CONSTRAINT `fk_turma_ano`
    FOREIGN KEY (`ano`)
    REFERENCES `lacc`.`ano` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_conta`
    FOREIGN KEY (`conta`)
    REFERENCES `lacc`.`conta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `lacc`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacc`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `conta` INT(11) NOT NULL,
  `perfil` TINYINT(1) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(40) NOT NULL,
  `ativo` TINYINT(1) NOT NULL DEFAULT '1',
  `dataCadastro` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_conta` (`conta` ASC),
  CONSTRAINT `fk_conta`
    FOREIGN KEY (`conta`)
    REFERENCES `lacc`.`conta` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
