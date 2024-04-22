DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `rechercheArme`(IN `idItemVariable` INT)
BEGIN
	select * from items
    inner join Armes on armes.id = items.idItem
    where items.idItem = idItemVariable;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `rechercheArmure`(IN `idItemVariable` INT)
BEGIN
	select * from items
    inner join Armures on Armures.id = items.idItem
    where items.idItem = idItemVariable;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `rechercheCommentaire`(IN `idItemVariable` INT)
BEGIN
	select * from évaluation
    inner join joueurs on joueurs.idJoueur = évaluation.idJoueur
    inner join items on items.idItem = évaluation.idItem
    where évaluation.idItem = idItemVariable;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `rechercheElement`(IN `idItemVariable` INT)
BEGIN
	select * from items
    inner join éléments on éléments.id = items.idItem
    where items.idItem = idItemVariable;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `rechercheItemId`(IN `idItemVariable` INT)
BEGIN
	select * from items where idItem = idItemVariable;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `recherchePotion`(IN `idItemVariable` INT)
BEGIN
	select * from items
    inner join potions on potions.id = items.idItem
    where items.idItem = idItemVariable;
END$$
DELIMITER ;