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

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterEnigmes`(IN `enigmeVariable` VARCHAR(100), IN `difficulte` CHAR(1), IN `typeEnigme` CHAR(1), IN `r1` VARCHAR(20), IN `flag1` INT, IN `r2` VARCHAR(20), IN `flag2` INT, IN `r3` VARCHAR(20), IN `flag3` INT, IN `r4` VARCHAR(20), IN `flag4` INT)
begin
	declare id int;
    insert into enigmes(enigme,diff,typee) values(enigmeVariable, difficulte,typeEnigme);
    set id = (select idQuestion from enigmes order by idQuestion desc LIMIT 1);
    insert into reponses (idQuestion,reponse,flag) values (id, r1,flag1);
    insert into reponses (idQuestion,reponse,flag) values (id, r2,flag2);
    insert into reponses (idQuestion,reponse,flag) values (id, r3,flag3);
    insert into reponses (idQuestion,reponse,flag) values (id, r4,flag4);
end$$
DELIMITER ;