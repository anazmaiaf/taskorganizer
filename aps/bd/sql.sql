-- MySQL Script generated by MySQL Workbench
-- Thu Jun 13 16:07:13 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`projetos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`projetos` (
  `idprojetos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_entrega` DATE NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `andamento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idprojetos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tarefas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tarefas` (
  `idtarefa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_entrega` DATE NOT NULL,
  `tarefascol` VARCHAR(45) NOT NULL,
  `andamento` VARCHAR(45) NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `projetos_idprojetos` INT NOT NULL,
  PRIMARY KEY (`idtarefa`),
  INDEX `fk_tarefas_projetos_idx` (`projetos_idprojetos` ASC) VISIBLE,
  CONSTRAINT `fk_tarefas_projetos`
    FOREIGN KEY (`projetos_idprojetos`)
    REFERENCES `mydb`.`projetos` (`idprojetos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
