SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `scrum` ;
CREATE SCHEMA IF NOT EXISTS `scrum` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `scrum` ;

-- -----------------------------------------------------
-- Table `scrum`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `scrum`.`users` ;

CREATE  TABLE IF NOT EXISTS `scrum`.`users` (
  `userid` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `userpasswd` VARCHAR(45) NOT NULL ,
  `useremail` VARCHAR(45) NOT NULL ,
  `userenabled` TINYINT(1) NULL DEFAULT TRUE ,
  PRIMARY KEY (`userid`) ,
  UNIQUE INDEX `userid_UNIQUE` (`userid` ASC) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `useremail_UNIQUE` (`useremail` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scrum`.`projects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `scrum`.`projects` ;

CREATE  TABLE IF NOT EXISTS `scrum`.`projects` (
  `projectid` INT NOT NULL AUTO_INCREMENT ,
  `projectname` VARCHAR(45) NOT NULL ,
  `projectdesc` TEXT NULL ,
  `userid` INT NULL COMMENT 'Project owner' ,
  PRIMARY KEY (`projectid`) ,
  UNIQUE INDEX `projectid_UNIQUE` (`projectid` ASC) ,
  INDEX `fk_projects_1` (`userid` ASC) ,
  CONSTRAINT `fk_projects_1`
    FOREIGN KEY (`userid` )
    REFERENCES `scrum`.`users` (`userid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scrum`.`backlogs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `scrum`.`backlogs` ;

CREATE  TABLE IF NOT EXISTS `scrum`.`backlogs` (
  `backlogid` INT NOT NULL AUTO_INCREMENT ,
  `backlogname` VARCHAR(45) NOT NULL ,
  `backlogdesc` TEXT NULL ,
  `projectid` INT NULL ,
  PRIMARY KEY (`backlogid`) ,
  UNIQUE INDEX `backlogid_UNIQUE` (`backlogid` ASC) ,
  INDEX `fk_backlogs_1` (`projectid` ASC) ,
  CONSTRAINT `fk_backlogs_1`
    FOREIGN KEY (`projectid` )
    REFERENCES `scrum`.`projects` (`projectid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scrum`.`usersprojects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `scrum`.`usersprojects` ;

CREATE  TABLE IF NOT EXISTS `scrum`.`usersprojects` (
  `userprojectid` INT NOT NULL AUTO_INCREMENT ,
  `userid` INT NOT NULL ,
  `projectid` INT NOT NULL ,
  PRIMARY KEY (`userprojectid`) ,
  UNIQUE INDEX `userprojectid_UNIQUE` (`userprojectid` ASC) ,
  INDEX `fk_usersprojects_1` (`userid` ASC) ,
  INDEX `fk_usersprojects_2` (`projectid` ASC) ,
  CONSTRAINT `fk_usersprojects_1`
    FOREIGN KEY (`userid` )
    REFERENCES `scrum`.`users` (`userid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usersprojects_2`
    FOREIGN KEY (`projectid` )
    REFERENCES `scrum`.`projects` (`projectid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scrum`.`statuses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `scrum`.`statuses` ;

CREATE  TABLE IF NOT EXISTS `scrum`.`statuses` (
  `statusid` INT NOT NULL AUTO_INCREMENT ,
  `backlogid` INT NOT NULL ,
  `statusname` VARCHAR(45) NOT NULL ,
  `statusdesc` TEXT NULL ,
  `statusfinished` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`statusid`) ,
  UNIQUE INDEX `statusid_UNIQUE` (`statusid` ASC) ,
  INDEX `fk_statuses_1` (`backlogid` ASC) ,
  CONSTRAINT `fk_statuses_1`
    FOREIGN KEY (`backlogid` )
    REFERENCES `scrum`.`backlogs` (`backlogid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scrum`.`priorities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `scrum`.`priorities` ;

CREATE  TABLE IF NOT EXISTS `scrum`.`priorities` (
  `priorityid` INT NOT NULL AUTO_INCREMENT ,
  `backlogid` INT NOT NULL ,
  `priorityname` VARCHAR(45) NOT NULL ,
  `prioritydesc` TEXT NULL ,
  `priorityweight` INT NOT NULL ,
  PRIMARY KEY (`priorityid`) ,
  UNIQUE INDEX `priorityid_UNIQUE` (`priorityid` ASC) ,
  INDEX `fk_priorities_1` (`backlogid` ASC) ,
  CONSTRAINT `fk_priorities_1`
    FOREIGN KEY (`backlogid` )
    REFERENCES `scrum`.`backlogs` (`backlogid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scrum`.`backlogitems`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `scrum`.`backlogitems` ;

CREATE  TABLE IF NOT EXISTS `scrum`.`backlogitems` (
  `backlogitemid` INT NOT NULL AUTO_INCREMENT ,
  `backlogitemname` VARCHAR(45) NOT NULL ,
  `backlogitemdesc` TEXT NULL ,
  `backlogid` INT NOT NULL ,
  `userid` INT NOT NULL ,
  `backlogitemcreated` DATE NOT NULL ,
  `statusid` INT NOT NULL ,
  `priorityid` INT NOT NULL ,
  `backlogitemestimated` DECIMAL NULL ,
  `backlogitemremaining` DECIMAL NULL ,
  `backlogitemactual` DECIMAL NULL ,
  `useridassigned` INT NULL ,
  `backlogitemidchild` INT NULL ,
  PRIMARY KEY (`backlogitemid`) ,
  UNIQUE INDEX `backlogitemid_UNIQUE` (`backlogitemid` ASC) ,
  INDEX `fk_backlogitems_1` (`userid` ASC) ,
  INDEX `fk_backlogitems_2` (`backlogid` ASC) ,
  INDEX `fk_backlogitems_3` (`statusid` ASC) ,
  INDEX `fk_backlogitems_4` (`priorityid` ASC) ,
  INDEX `fk_backlogitems_5` (`backlogitemidchild` ASC) ,
  INDEX `fk_backlogitems_6` (`useridassigned` ASC) ,
  CONSTRAINT `fk_backlogitems_1`
    FOREIGN KEY (`userid` )
    REFERENCES `scrum`.`usersprojects` (`userid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_backlogitems_2`
    FOREIGN KEY (`backlogid` )
    REFERENCES `scrum`.`backlogs` (`backlogid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_backlogitems_3`
    FOREIGN KEY (`statusid` )
    REFERENCES `scrum`.`statuses` (`statusid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_backlogitems_4`
    FOREIGN KEY (`priorityid` )
    REFERENCES `scrum`.`priorities` (`priorityid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_backlogitems_5`
    FOREIGN KEY (`backlogitemidchild` )
    REFERENCES `scrum`.`backlogitems` (`backlogitemid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_backlogitems_6`
    FOREIGN KEY (`useridassigned` )
    REFERENCES `scrum`.`usersprojects` (`userid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scrum`.`backlogitemcomments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `scrum`.`backlogitemcomments` ;

CREATE  TABLE IF NOT EXISTS `scrum`.`backlogitemcomments` (
  `backlogitemcommentid` INT NOT NULL AUTO_INCREMENT ,
  `backlogitemid` INT NOT NULL ,
  `backlogitemcommentcreated` DATE NOT NULL ,
  `userid` INT NOT NULL ,
  `backlogitemcommentdesc` TEXT NOT NULL ,
  PRIMARY KEY (`backlogitemcommentid`) ,
  UNIQUE INDEX `backlogitemcommentid_UNIQUE` (`backlogitemcommentid` ASC) ,
  INDEX `fk_backlogitemcomments_1` (`backlogitemid` ASC) ,
  INDEX `fk_backlogitemcomments_2` (`userid` ASC) ,
  CONSTRAINT `fk_backlogitemcomments_1`
    FOREIGN KEY (`backlogitemid` )
    REFERENCES `scrum`.`backlogitems` (`backlogitemid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_backlogitemcomments_2`
    FOREIGN KEY (`userid` )
    REFERENCES `scrum`.`usersprojects` (`userid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
