CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterJoueur`(IN `AliasAjout` VARCHAR(20), IN `PrénomAjout` VARCHAR(20), IN `NomAjout` VARCHAR(20), IN `PasswordAjout` VARCHAR(20)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER INSERT into joueurs (alias, prénom,nom,password) VALUES(aliasAjout,PrénomAjout,NomAjout, PasswordAjout)
DROP PROCEDURE `AjouterJoueur`; <--Au besoin-->

--Login--

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LoginJoueur`(IN `AliasFind` VARCHAR(20), IN `PasswordFind` VARCHAR(20))
SELECT * from joueurs where alias = AliasFind AND password = PasswordFind$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LoginJoueur`(IN `AliasFind` VARCHAR(20), IN `PasswordFind` VARCHAR(20))
SELECT * from joueurs where alias = AliasFind AND password = PasswordFind$$
DELIMITER ;