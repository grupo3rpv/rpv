SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `equipamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `equipamento` (
  `id_equipamento` INT(11) NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id_equipamento`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tipo_sala`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipo_sala` (
  `id_tipo_sala` INT(11) NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id_tipo_sala`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sala`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sala` (
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
    REFERENCES `tipo_sala` (`id_tipo_sala` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `equipamento_sala`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `equipamento_sala` (
  `id_equipamento_sala` INT(11) NOT NULL ,
  `numero_sala` INT(11) NOT NULL ,
  `quantidade` INT(11) NOT NULL ,
  INDEX `numero_sala_numero` (`numero_sala` ASC) ,
  INDEX `id_equipamento_sala_id_equipamento` (`id_equipamento_sala` ASC) ,
  PRIMARY KEY (`id_equipamento_sala`, `numero_sala`) ,
  CONSTRAINT `numero_sala_numero`
    FOREIGN KEY (`numero_sala` )
    REFERENCES `sala` (`numero` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_equipamento_sala_id_equipamento`
    FOREIGN KEY (`id_equipamento_sala` )
    REFERENCES `equipamento` (`id_equipamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `curso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `curso` (
  `id_curso` INT NOT NULL AUTO_INCREMENT ,
  `codigo` CHAR(12) NULL ,
  `nome` VARCHAR(255) NULL ,
  PRIMARY KEY (`id_curso`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disciplina`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NULL ,
  `codigo` CHAR(15) NULL ,
  `ementa` LONGTEXT NULL ,
  `carga_horaria` INT NULL ,
  `info_adicionais` LONGTEXT NULL ,
  PRIMARY KEY (`id_disciplina`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disciplina_curso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `disciplina_curso` (
  `id_disciplina_curso` INT NOT NULL AUTO_INCREMENT ,
  `id_curso` INT NOT NULL ,
  `id_disciplina` INT NOT NULL ,
  PRIMARY KEY (`id_disciplina_curso`) ,
  INDEX `fk_curso_has_disciplina_disciplina1` (`id_disciplina` ASC) ,
  INDEX `fk_curso_has_disciplina_curso1` (`id_curso` ASC) ,
  CONSTRAINT `fk_curso_has_disciplina_curso1`
    FOREIGN KEY (`id_curso` )
    REFERENCES `curso` (`id_curso` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_curso_has_disciplina_disciplina1`
    FOREIGN KEY (`id_disciplina` )
    REFERENCES `disciplina` (`id_disciplina` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tipo_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(100) NULL ,
  PRIMARY KEY (`id_tipo_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `id_tipo_usuario` INT NOT NULL ,
  `nome` VARCHAR(255) NOT NULL ,
  `matricula` CHAR(12) NULL ,
  `email` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id_usuario`) ,
  INDEX `fk_usuario_tipo_usuario1` (`id_tipo_usuario` ASC) ,
  CONSTRAINT `fk_usuario_tipo_usuario1`
    FOREIGN KEY (`id_tipo_usuario` )
    REFERENCES `tipo_usuario` (`id_tipo_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nivel_interesse`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `nivel_interesse` (
  `id_nivel_interesse` INT NOT NULL AUTO_INCREMENT ,
  `id_professor` INT NOT NULL ,
  `id_disciplina` INT NOT NULL ,
  `nivel_interesse` CHAR(45) NULL ,
  PRIMARY KEY (`id_nivel_interesse`) ,
  INDEX `fk_professor_has_disciplina_disciplina1` (`id_disciplina` ASC) ,
  INDEX `fk_professor_has_disciplina_professor1` (`id_professor` ASC) ,
  CONSTRAINT `fk_professor_has_disciplina_professor1`
    FOREIGN KEY (`id_professor` )
    REFERENCES `usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_has_disciplina_disciplina1`
    FOREIGN KEY (`id_disciplina` )
    REFERENCES `disciplina` (`id_disciplina` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `area`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `area` (
  `id_area` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NULL ,
  `descricao` TEXT NULL ,
  PRIMARY KEY (`id_area`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `area_professor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `area_professor` (
  `id_area_professor` INT NOT NULL AUTO_INCREMENT ,
  `id_area` INT NOT NULL ,
  `id_professor` INT NOT NULL ,
  PRIMARY KEY (`id_area_professor`) ,
  INDEX `fk_area_has_professor_professor1` (`id_professor` ASC) ,
  INDEX `fk_area_has_professor_area1` (`id_area` ASC) ,
  CONSTRAINT `fk_area_has_professor_area1`
    FOREIGN KEY (`id_area` )
    REFERENCES `area` (`id_area` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_area_has_professor_professor1`
    FOREIGN KEY (`id_professor` )
    REFERENCES `usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `evento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `evento` (
  `id_evento` INT NOT NULL AUTO_INCREMENT ,
  `data_inicial` DATE NULL ,
  `data_final` DATE NULL ,
  `hora1` TIME NULL ,
  `hora2` TIME NULL ,
  `titulo` VARCHAR(255) NULL ,
  `privado` TINYINT(1) NULL ,
  PRIMARY KEY (`id_evento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disponibilidade_aula`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `disponibilidade_aula` (
  `id_disponibilidade_aula` INT NOT NULL AUTO_INCREMENT ,
  `dia` VARCHAR(45) NULL ,
  `hora` VARCHAR(10) NULL ,
  `id_usuario` INT NOT NULL ,
  PRIMARY KEY (`id_disponibilidade_aula`) ,
  INDEX `fk_disponibilidade_aula_usuario1` (`id_usuario` ASC) ,
  CONSTRAINT `fk_disponibilidade_aula_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `evento_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `evento_usuario` (
  `id_evento` INT NOT NULL ,
  `id_professor` INT NOT NULL ,
  `convite` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_evento`, `id_professor`) ,
  INDEX `fk_evento_has_usuario_usuario1` (`id_professor` ASC) ,
  INDEX `fk_evento_has_usuario_evento1` (`id_evento` ASC) ,
  CONSTRAINT `fk_evento_has_usuario_evento1`
    FOREIGN KEY (`id_evento` )
    REFERENCES `evento` (`id_evento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_usuario_usuario1`
    FOREIGN KEY (`id_professor` )
    REFERENCES `usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
