insert into Items (nom,quantite,type,prix,photo) values ("Objet",3,"Arme",30,"292F99C8-BBC3-4834-AECD-45C12A9C063D.png");

create procedure getJoueur(idJoueur int)

DROP PROCEDURE `AjouterJoueur`; CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterJoueur`(IN `AliasAjout` VARCHAR(20), IN `PrénomAjout` VARCHAR(20), IN `NomAjout` VARCHAR(20), IN `PasswordAjout` VARCHAR(20)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER INSERT into joueurs (alias, prénom,nom,password) VALUES(aliasAjout,PrénomAjout,NomAjout, PasswordAjout)