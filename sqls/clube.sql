CREATE TABLE `cbc`.`clube` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `clube` VARCHAR(100) NOT NULL,
  `saldo_disponivel` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`));