insert into Items (nom,quantite,type,prix,photo) values ("Objet",3,"Arme",30,"292F99C8-BBC3-4834-AECD-45C12A9C063D.png");

create procedure getJoueur(idJoueur int)

/*insert Arme
*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterArme`(IN `Nom` VARCHAR(20), IN `Quantite` INT, IN `Typee` VARCHAR(20), IN `Prix` INT, IN `Photo` VARCHAR(256), IN `Efficacite` INT, IN `Genre` INT, IN `DescriptionArme` VARCHAR(20))
begin
	declare id int;
    insert into Items (nom,quantite,typee,prix,photo) values (Nom,Quantite,Typee,Prix,Photo);
    set id = (select idItem from Items order by idItem desc LIMIT 1);
    insert into Armes values (id, Efficacite, Genre, DescriptionArme);
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterArmure`(IN `Nom` VARCHAR(20), IN `Quantite` INT, IN `Prix` INT, IN `Photo` VARCHAR(256), IN `matiere` VARCHAR(20), IN `taille` CHAR(1))
begin
	declare id int;
    insert into Items (nom,quantite,typee,prix,photo) values (Nom,Quantite,'Armure',Prix,Photo);
    set id = (select idItem from Items order by idItem desc LIMIT 1);
    insert into Armures values (id, matiere, taille);
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterPotion`(IN `Nom` VARCHAR(20), IN `Quantite` INT, IN `Prix` INT, IN `Photo` VARCHAR(256), IN `Effet` VARCHAR(50), IN `Duree` INT, IN `Typee` VARCHAR(20))
begin
	declare id int;
    insert into Items (nom,quantite,typee,prix,photo) values (Nom,Quantite,'Potion',Prix,Photo);
    set id = (select idItem from Items order by idItem desc LIMIT 1);
    insert into Potions values (id, Effect, Duree, Typee);
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterElement`(IN `Nom` VARCHAR(20), IN `Quantite` INT, IN `Prix` INT, IN `Photo` VARCHAR(256), IN `Typee` VARCHAR(20), IN `rarete` INT, IN `dangerosite` INT)
begin
	declare id int;
    insert into Items (nom,quantite,typee,prix,photo) values (Nom,Quantite,'Élément',Prix,Photo);
    set id = (select idItem from Items order by idItem desc LIMIT 1);
    insert into éléments values (id, Typee, rarete, dangerosite);
end$$
DELIMITER ;