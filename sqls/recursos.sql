CREATE TABLE `cbc`.`recurso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `recurso` VARCHAR(100) NOT NULL,
  `saldo_disponivel` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`));

INSERT INTO `cbc`.`recurso` (`recurso`, `saldo_disponivel`) VALUES ('Recurso para passagens', '10000');
INSERT INTO `cbc`.`recurso` (`recurso`, `saldo_disponivel`) VALUES ('Recurso para hospedagens', '10000');
