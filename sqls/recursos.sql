CREATE TABLE `cbc`.`recurso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `recurso` VARCHAR(100) NOT NULL,
  `saldo_disponivel` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`));