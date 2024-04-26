DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getInventaireId`(IN `idJoueurVariable` INT, IN `idItemVariable` INT)
BEGIN
	select * from inventaire
    where idJoueur = idJoueurVariable and idItem = idItemVariable;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getTableCraft`(IN `idItemVariable` INT)
BEGIN
	select e1.idItem as idE1,e2.idItem as idE2,p.nom as nomPotion, e1.nom as nomE1, e2.nom as nomE2, tabledecraft.quantiteE1,tabledecraft.quantiteE2, e1.prix as prixE1, e2.prix as prixE2 
    from tabledecraft
    inner join items as p on p.idItem = tabledecraft.idPotion
    inner join items as e1 on e1.idItem = tabledecraft.Éléments1
    inner join items as e2 on e2.idItem = tabledecraft.Éléments2
    where idPotion = idItemVariable;
    
END$$
DELIMITER ;