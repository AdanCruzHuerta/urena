SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `rgdiazco_urena` ;
CREATE SCHEMA IF NOT EXISTS `rgdiazco_urena` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `rgdiazco_urena` ;

-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`administrador` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`administrador` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido_p` VARCHAR(45) NOT NULL,
  `apellido_m` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`estados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`estados` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`estados` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`municipios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`municipios` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`municipios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `estado_id` INT(11) NOT NULL,
  `nombre` VARCHAR(90) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_municipio_estado1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_municipio_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `rgdiazco_urena`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`proveedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`proveedores` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`proveedores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `municipios_id` INT(11) NOT NULL,
  `responsable` VARCHAR(150) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `email` VARCHAR(90) NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_final` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_proveedores_municipios1_idx` (`municipios_id` ASC),
  CONSTRAINT `fk_proveedores_municipios1`
    FOREIGN KEY (`municipios_id`)
    REFERENCES `rgdiazco_urena`.`municipios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`articulos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`articulos` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`articulos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `precio` VARCHAR(45) NOT NULL,
  `alto` VARCHAR(45) NULL DEFAULT NULL,
  `largo` VARCHAR(45) NULL DEFAULT NULL,
  `ancho` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  `ruta_imagen` VARCHAR(250) NOT NULL,
  `provedores_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_articulos_provedores1_idx` (`provedores_id` ASC),
  CONSTRAINT `fk_articulos_provedores1`
    FOREIGN KEY (`provedores_id`)
    REFERENCES `rgdiazco_urena`.`proveedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`conjuntos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`conjuntos` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`conjuntos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `precio` INT(11) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `ruta_imagen` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`articulos_has_conjunto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`articulos_has_conjunto` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`articulos_has_conjunto` (
  `articulos_id` INT(11) NOT NULL,
  `conjunto_id` INT(11) NOT NULL,
  PRIMARY KEY (`articulos_id`, `conjunto_id`),
  INDEX `fk_articulos_has_conjunto_conjunto1_idx` (`conjunto_id` ASC),
  INDEX `fk_articulos_has_conjunto_articulos1_idx` (`articulos_id` ASC),
  CONSTRAINT `fk_articulos_has_conjunto_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `rgdiazco_urena`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_has_conjunto_conjunto1`
    FOREIGN KEY (`conjunto_id`)
    REFERENCES `rgdiazco_urena`.`conjuntos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`fleteras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`fleteras` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`fleteras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `municipio_id` INT(11) NOT NULL,
  `ciudad` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(50) NOT NULL,
  `email` VARCHAR(80) NULL DEFAULT NULL,
  `responsable` VARCHAR(80) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fletera_municipio1` (`municipio_id` ASC),
  CONSTRAINT `fk_fletera_municipio1`
    FOREIGN KEY (`municipio_id`)
    REFERENCES `rgdiazco_urena`.`municipios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(90) NOT NULL,
  `password` VARCHAR(80) NOT NULL,
  `roles_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`personas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`personas` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`personas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `apellido_p` VARCHAR(60) NOT NULL,
  `apellido_m` VARCHAR(60) NOT NULL,
  `ciudad` VARCHAR(100) NOT NULL DEFAULT '0',
  `calle` VARCHAR(100) NOT NULL DEFAULT '0',
  `numero_ext` VARCHAR(10) NOT NULL DEFAULT '0',
  `numero_int` VARCHAR(10) NOT NULL DEFAULT '0',
  `telefono` VARCHAR(20) NOT NULL DEFAULT '0',
  `codigo_postal` VARCHAR(45) NOT NULL DEFAULT '0',
  `creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuarios_id` INT(11) NOT NULL DEFAULT '0',
  `actualizo_datos` INT(11) NOT NULL DEFAULT '0',
  `municipios_id` INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_personas_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_personas_municipios1_idx` (`municipios_id` ASC),
  CONSTRAINT `fk_personas_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `rgdiazco_urena`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personas_municipios1`
    FOREIGN KEY (`municipios_id`)
    REFERENCES `rgdiazco_urena`.`municipios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`pedidos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`pedidos` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`pedidos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `status_pedido` INT(11) NOT NULL,
  `costo_total` INT(11) NOT NULL,
  `personas_id` INT(11) NOT NULL,
  `fleteras_id` INT(11) NOT NULL,
  `fecha_inicio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_final` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_pedidos_personas1_idx` (`personas_id` ASC),
  INDEX `fk_pedidos_fleteras1_idx` (`fleteras_id` ASC),
  CONSTRAINT `fk_pedidos_fleteras1`
    FOREIGN KEY (`fleteras_id`)
    REFERENCES `rgdiazco_urena`.`fleteras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_personas1`
    FOREIGN KEY (`personas_id`)
    REFERENCES `rgdiazco_urena`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`articulos_has_pedidos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`articulos_has_pedidos` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`articulos_has_pedidos` (
  `articulos_id` INT(11) NOT NULL,
  `pedidos_id` INT(11) NOT NULL,
  PRIMARY KEY (`articulos_id`, `pedidos_id`),
  INDEX `fk_articulos_has_pedidos_pedidos1_idx` (`pedidos_id` ASC),
  INDEX `fk_articulos_has_pedidos_articulos1_idx` (`articulos_id` ASC),
  CONSTRAINT `fk_articulos_has_pedidos_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `rgdiazco_urena`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_has_pedidos_pedidos1`
    FOREIGN KEY (`pedidos_id`)
    REFERENCES `rgdiazco_urena`.`pedidos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`categorias` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`categorias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`categorias_has_articulos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`categorias_has_articulos` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`categorias_has_articulos` (
  `categorias_id` INT(11) NOT NULL,
  `articulos_id` INT(11) NOT NULL,
  PRIMARY KEY (`categorias_id`, `articulos_id`),
  INDEX `fk_categorias_has_articulos_articulos1_idx` (`articulos_id` ASC),
  INDEX `fk_categorias_has_articulos_categorias1_idx` (`categorias_id` ASC),
  CONSTRAINT `fk_categorias_has_articulos_categorias1`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `rgdiazco_urena`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categorias_has_articulos_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `rgdiazco_urena`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`categorias_has_categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`categorias_has_categorias` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`categorias_has_categorias` (
  `categorias_id` INT(11) NOT NULL,
  `categorias_id1` INT(11) NOT NULL,
  PRIMARY KEY (`categorias_id`, `categorias_id1`),
  INDEX `fk_categorias_has_categorias_categorias2_idx` (`categorias_id1` ASC),
  INDEX `fk_categorias_has_categorias_categorias1_idx` (`categorias_id` ASC),
  CONSTRAINT `fk_categorias_has_categorias_categorias1`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `rgdiazco_urena`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categorias_has_categorias_categorias2`
    FOREIGN KEY (`categorias_id1`)
    REFERENCES `rgdiazco_urena`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`categorias_has_conjunto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`categorias_has_conjunto` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`categorias_has_conjunto` (
  `categorias_id` INT(11) NOT NULL,
  `conjunto_id` INT(11) NOT NULL,
  PRIMARY KEY (`categorias_id`, `conjunto_id`),
  INDEX `fk_categorias_has_conjunto_conjunto1_idx` (`conjunto_id` ASC),
  INDEX `fk_categorias_has_conjunto_categorias1_idx` (`categorias_id` ASC),
  CONSTRAINT `fk_categorias_has_conjunto_categorias1`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `rgdiazco_urena`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categorias_has_conjunto_conjunto1`
    FOREIGN KEY (`conjunto_id`)
    REFERENCES `rgdiazco_urena`.`conjuntos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`conjunto_has_pedidos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`conjunto_has_pedidos` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`conjunto_has_pedidos` (
  `conjunto_id` INT(11) NOT NULL,
  `pedidos_id` INT(11) NOT NULL,
  PRIMARY KEY (`conjunto_id`, `pedidos_id`),
  INDEX `fk_conjunto_has_pedidos_pedidos1_idx` (`pedidos_id` ASC),
  INDEX `fk_conjunto_has_pedidos_conjunto1_idx` (`conjunto_id` ASC),
  CONSTRAINT `fk_conjunto_has_pedidos_conjunto1`
    FOREIGN KEY (`conjunto_id`)
    REFERENCES `rgdiazco_urena`.`conjuntos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conjunto_has_pedidos_pedidos1`
    FOREIGN KEY (`pedidos_id`)
    REFERENCES `rgdiazco_urena`.`pedidos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rgdiazco_urena`.`mensajes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rgdiazco_urena`.`mensajes` ;

CREATE TABLE IF NOT EXISTS `rgdiazco_urena`.`mensajes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `correo` VARCHAR(80) NOT NULL,
  `telefono` VARCHAR(10) NULL DEFAULT NULL,
  `mensaje` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
