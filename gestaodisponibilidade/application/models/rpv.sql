SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';



-- -----------------------------------------------------
-- Table `rpv`.`equipamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`equipamento` (
  `id_equipamento` INT(11) NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id_equipamento`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rpv`.`tipo_sala`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`tipo_sala` (
  `id_tipo_sala` INT(11) NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id_tipo_sala`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rpv`.`sala`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`sala` (
  `numero` INT(10) NOT NULL ,
  `descricao` VARCHAR(255) NOT NULL ,
  `capacidade` VARCHAR(255) NOT NULL ,
  `capacidade_desc` VARCHAR(255) NOT NULL ,
  `responsavel` VARCHAR(40) NOT NULL ,
  `status_disponibilidade` TINYINT(1) NOT NULL ,
  `info_adicionais` VARCHAR(255) NOT NULL ,
  `id_tipo_sala` INT(11) NOT NULL ,
  PRIMARY KEY (`numero`) ,
  INDEX `fk_sala_tipo_sala1` (`id_tipo_sala` ASC) ,
  CONSTRAINT `fk_sala_tipo_sala1`
    FOREIGN KEY (`id_tipo_sala` )
    REFERENCES `rpv`.`tipo_sala` (`id_tipo_sala` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rpv`.`equipamento_sala`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`equipamento_sala` (
  `id_equipamento_sala` INT(11) NOT NULL AUTO_INCREMENT ,
  `numero_sala` INT(11) NOT NULL ,
  `quantidade` INT(11) NOT NULL ,
  INDEX `numero_sala_numero` (`numero_sala` ASC) ,
  INDEX `id_equipamento_sala_id_equipamento` (`id_equipamento_sala` ASC) ,
  PRIMARY KEY (`id_equipamento_sala`, `numero_sala`) ,
  CONSTRAINT `numero_sala_numero`
    FOREIGN KEY (`numero_sala` )
    REFERENCES `rpv`.`sala` (`numero` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_equipamento_sala_id_equipamento`
    FOREIGN KEY (`id_equipamento_sala` )
    REFERENCES `rpv`.`equipamento` (`id_equipamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rpv`.`curso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`curso` (
  `id_curso` INT NOT NULL AUTO_INCREMENT ,
  `codigo` FLOAT NULL ,
  `nome` VARCHAR(255) NULL ,
  PRIMARY KEY (`id_curso`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rpv`.`disciplina`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`disciplina` (
  `id_disciplina` INT NOT NULL AUTO_INCREMENT ,
  `codigo` CHAR(15) NULL ,
  `ementa` LONGTEXT NULL ,
  `carga_horaria` INT NULL ,
  `info_adicionais` LONGTEXT NULL ,
  PRIMARY KEY (`id_disciplina`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rpv`.`disciplina_curso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`disciplina_curso` (
  `id_disciplina_curso` INT NOT NULL AUTO_INCREMENT ,
  `id_curso` INT NOT NULL ,
  `id_disciplina` INT NOT NULL ,
  PRIMARY KEY (`id_disciplina_curso`) ,
  INDEX `fk_curso_has_disciplina_disciplina1` (`id_disciplina` ASC) ,
  INDEX `fk_curso_has_disciplina_curso1` (`id_curso` ASC) ,
  CONSTRAINT `fk_curso_has_disciplina_curso1`
    FOREIGN KEY (`id_curso` )
    REFERENCES `rpv`.`curso` (`id_curso` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_curso_has_disciplina_disciplina1`
    FOREIGN KEY (`id_disciplina` )
    REFERENCES `rpv`.`disciplina` (`id_disciplina` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rpv`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NULL ,
  `matricula` FLOAT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rpv`.`nivel_interesse`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`nivel_interesse` (
  `id_nivel_interesse` INT NOT NULL ,
  `id_professor` INT NOT NULL ,
  `id_disciplina` INT NOT NULL ,
  `nivel_interesse` CHAR(45) NULL ,
  PRIMARY KEY (`id_nivel_interesse`) ,
  INDEX `fk_professor_has_disciplina_disciplina1` (`id_disciplina` ASC) ,
  INDEX `fk_professor_has_disciplina_professor1` (`id_professor` ASC) ,
  CONSTRAINT `fk_professor_has_disciplina_professor1`
    FOREIGN KEY (`id_professor` )
    REFERENCES `rpv`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_has_disciplina_disciplina1`
    FOREIGN KEY (`id_disciplina` )
    REFERENCES `rpv`.`disciplina` (`id_disciplina` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rpv`.`area`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`area` (
  `id_area` INT NOT NULL ,
  `nome` VARCHAR(255) NULL ,
  `descricao` TEXT NULL ,
  PRIMARY KEY (`id_area`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rpv`.`area_professor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `rpv`.`area_professor` (
  `id_area_professor` INT NOT NULL AUTO_INCREMENT ,
  `id_area` INT NOT NULL ,
  `id_professor` INT NOT NULL ,
  PRIMARY KEY (`id_area_professor`) ,
  INDEX `fk_area_has_professor_professor1` (`id_professor` ASC) ,
  INDEX `fk_area_has_professor_area1` (`id_area` ASC) ,
  CONSTRAINT `fk_area_has_professor_area1`
    FOREIGN KEY (`id_area` )
    REFERENCES `rpv`.`area` (`id_area` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_area_has_professor_professor1`
    FOREIGN KEY (`id_professor` )
    REFERENCES `rpv`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
