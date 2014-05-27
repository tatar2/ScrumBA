SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `scrum` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `scrum` ;

-- -----------------------------------------------------
-- Table `scrum`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scrum`.`users` (
  `userid` INT NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `userpasswd` VARCHAR(45) NOT NULL ,
  `useremail` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`userid`) ,
  UNIQUE INDEX `userid_UNIQUE` (`userid` ASC) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `useremail_UNIQUE` (`useremail` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
