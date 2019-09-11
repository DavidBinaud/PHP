CREATE TABLE `binaudd`.`voiture` ( `immatriculation` VARCHAR(8) NOT NULL ,
 `marque` VARCHAR(25) NOT NULL ,
  `couleur` VARCHAR(12) NOT NULL ,
   PRIMARY KEY (`immatriculation`(8))) 
ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;




//INSERTION
INSERT INTO `voiture` (`immatriculation`, `marque`, `couleur`) VALUES ('AX679DB', 'peugeot', 'grise');