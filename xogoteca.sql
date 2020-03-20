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
CREATE SCHEMA IF NOT EXISTS `xogoteca` DEFAULT CHARACTER SET utf8 ;
USE `xogoteca` ;

-- -----------------------------------------------------
-- Table `xogoteca`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xogoteca`.`usuarios` (
  `nome` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `contrasinal` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `rol` TINYINT(1) NOT NULL,
  `dataAlta` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `bloqueado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`nome`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `xogoteca`.`estadisticas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xogoteca`.`estadisticas` (
  `codactividade` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `nomexogador` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `data` DATETIME NOT NULL,
  `puntos` INT(11) NOT NULL,
  `dificultade` ENUM('baixa', 'media', 'dificil') CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`codactividade`, `nomexogador`, `data`),
  INDEX `nomexogador` (`nomexogador` ASC),
  CONSTRAINT `estadisticas_ibfk_1`
    FOREIGN KEY (`nomexogador`)
    REFERENCES `xogoteca`.`usuarios` (`nome`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `xogoteca`.`a4_categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xogoteca`.`a4_categorias` (
  `codactividade` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `codcategoria` INT(100) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `imaxeprincipal` VARCHAR(90) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  PRIMARY KEY (`codcategoria`),
  UNIQUE INDEX `imaxeprincipal_UNIQUE` (`imaxeprincipal` ASC),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `xogoteca`.`a4_imaxes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xogoteca`.`a4_imaxes` (
  `a4_idimaxe` INT NOT NULL AUTO_INCREMENT,
  `rutaimaxe` VARCHAR(90) NOT NULL,
  `a4_categorias_codcategoria` INT(100) NOT NULL,
  PRIMARY KEY (`a4_idimaxe`),
  INDEX `fk_a4_imaxes_a4_categorias_idx` (`a4_categorias_codcategoria` ASC),
  CONSTRAINT `fk_a4_imaxes_a4_categorias`
    FOREIGN KEY (`a4_categorias_codcategoria`)
    REFERENCES `xogoteca`.`a4_categorias` (`codcategoria`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


USE `xogoteca` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

insert into a4_categorias (codactividade, nome, imaxeprincipal) values ('a4', 'Animais', 'actividades/actividade4/Imaxes/Animais/animais.png');
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal1.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal2.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal3.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal4.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal5.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal6.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal7.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal8.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal9.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal10.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal11.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal12.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/Animais/animal13.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal14.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal15.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal16.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal17.jpeg', 1);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Animais/animal18.jpeg', 1);

insert into a4_categorias (codactividade, nome, imaxeprincipal) values ('a4', 'Árbores', 'actividades/actividade4/Imaxes/Arbores/arbores.png');
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol1.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol2.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol3.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol4.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol5.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol6.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol7.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol8.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol9.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol10.png', 2);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Arbores/arbol11.png', 2);

insert into a4_categorias (codactividade, nome, imaxeprincipal) values ('a4', 'Bebidas', 'actividades/actividade4/Imaxes/Bebidas/bebidas.png');
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida1.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida2.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida3.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida4.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida5.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida6.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida7.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida8.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida9.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida10.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida11.png', 3);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Bebidas/bebida12.png', 3);

insert into a4_categorias (codactividade, nome, imaxeprincipal) values ('a4', 'Calzado', 'actividades/actividade4/Imaxes/Calzado/calzado.png');
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado1.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado2.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado3.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado4.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado5.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado6.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado7.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado8.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado9.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado10.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado11.png', 4);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Calzado/calzado12.png', 4);

insert into a4_categorias (codactividade, nome, imaxeprincipal) values ('a4', 'Comida', 'actividades/actividade4/Imaxes/Comida/comidas.jpg');
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida1.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida2.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida3.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida4.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida5.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida6.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida7.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida8.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida9.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida10.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida11.png', 5);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comida/comida12.png', 5);


insert into a4_categorias (codactividade, nome, imaxeprincipal) values ('a4', 'Comprar', 'actividades/actividade4/Imaxes/Comprar/comprar.png');
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar1.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar2.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar3.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar4.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar5.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar6.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar7.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar8.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar9.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar10.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar11.png', 6);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Comprar/comprar12.png', 6);

insert into a4_categorias (codactividade, nome, imaxeprincipal) values ('a4', 'Deporte', 'actividades/actividade4/Imaxes/Deportes/deportes.png');
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte1.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte2.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte7.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte4.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte5.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte6.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte7.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte8.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte9.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte10.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte11.png', 7);
insert into a4_imaxes(rutaimaxe, a4_categorias_codcategoria) values ('actividades/actividade4/Imaxes/Deportes/deporte12.png', 7);
