show databases;
create database form_practice;
use form_practice;

CREATE TABLE IF NOT EXISTS `form_practice`.`user` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(32) NOT NULL,
  `apellido` VARCHAR(64) NULL,
  `dni` INT NOT NULL,
  `fecha` DATE NULL,
  `calle` VARCHAR(255) NULL,
  `numero` INT NULL,
  `localidad` VARCHAR(64) NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC) VISIBLE);
  
alter table user modify column dni bigint not null;
  
select * from user;
delete from user where ID between 1 and 1000;
alter table user auto_increment = 0;