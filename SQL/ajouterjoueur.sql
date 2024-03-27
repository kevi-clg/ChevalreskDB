DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterJoueur`(IN `AliasAjout` VARCHAR(20), IN `PrenomAjout` VARCHAR(20), IN `NomAjout` VARCHAR(20), IN `PasswordAjout` VARCHAR(20), IN `AvatarAjout` VARCHAR(256))
INSERT into joueurs (alias, prenom,nom,password, avatar) VALUES(aliasAjout,PrenomAjout,NomAjout, PasswordAjout, AvatarAjout)$$
DELIMITER ;
--Login--

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LoginJoueur`(IN `AliasFind` VARCHAR(20), IN `PasswordFind` VARCHAR(20))
SELECT * from joueurs where alias = AliasFind AND password = PasswordFind$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CheckAlias`(IN `AliasCheck` VARCHAR(20))
SELECT * FROM joueurs WHERE Alias = AliasCheck$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LoginJoueur`(IN `AliasFind` VARCHAR(20), IN `PasswordFind` VARCHAR(20))
SELECT * from joueurs where alias = AliasFind AND password = PasswordFind$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EditJoueur`(IN `AliasEdit` VARCHAR(20), IN `PrenomEdit` VARCHAR(20), IN `NomEdit` VARCHAR(20), IN `MotdepasseEdit` VARCHAR(20), IN `AvatarEdit` VARCHAR(256), IN `IdJoueurEdit` INT)
UPDATE joueurs SET alias = AliasEdit, prenom = PrenomEdit, nom = NomEdit, password = MotdepasseEdit, avatar = AvatarEdit where idJoueur = IdJoueurEdit$$
DELIMITER ;
