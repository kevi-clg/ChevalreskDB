/*afficher le panier*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AfficherPanier`(IN `joueur_connecter` INT)
BEGIN
	select panier.idJoueur, items.idItem, items.nom, items.prix, panier.quantite, items.photo
	from panier
	INNER JOIN items ON items.idItem = panier.idItem
	where idJoueur = joueur_connecter;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterPanier`(IN `idJoueurVariable` INT, IN `idItemVariable` INT)
BEGIN
    DECLARE existing_quantity INT;
    
    -- Vérifier si l'item existe déjà dans le panier du joueur
    SELECT quantite INTO existing_quantity
    FROM panier
    WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable;
    
    IF existing_quantity IS NOT NULL THEN
        -- Si l'item existe déjà, mettre à jour la quantité
        UPDATE panier
        SET quantite = 1 + existing_quantity
        WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable;
    ELSE
        -- Si l'item n'existe pas, l'ajouter au panier
        INSERT INTO panier VALUES (idJoueurVariable, idItemVariable, 1);
    END IF;
END$$
DELIMITER ;

--supprimer un item du panier
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `supprimerPanier`(IN `idItemVariable` INT, IN `idJoueurVariable` INT)
BEGIN
   
        UPDATE panier
        SET quantite = 0
        WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable;
    
END$$
DELIMITER ;


--enlever
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EnleverPanier`(IN `idJoueurVariable` INT, IN `idItemVariable` INT)
BEGIN
   
        UPDATE panier
        SET quantite = quantite - 1
        WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable;
    
END$$
DELIMITER ;

--ajouter inventaire depuis panier
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjouterInventaireDepuisPanier`(IN `idJoueurVariable` INT, IN `idItemVariable` INT, IN `quantiterPanier` INT)
BEGIN
    DECLARE existing_quantity INT;
    
    -- Vérifier si l'item existe déjà dans le panier du joueur
    SELECT quantite INTO existing_quantity
    FROM inventaire
    WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable;
    
    IF existing_quantity IS NOT NULL THEN
        -- Si l'item existe déjà, mettre à jour la quantité
        UPDATE inventaire
        SET quantite = quantiterPanier + existing_quantity
        WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable;
    ELSE
        INSERT INTO inventaire VALUES (idJoueurVariable,idItemVariable, quantiterPanier);
    END IF;
END$$
DELIMITER ;

--vider panier joueur
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `viderPanier`(IN `idJoueurVariable` INT)
BEGIN
   
        DELETE FROM panier
        WHERE idJoueur = idJoueurVariable;
    
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `payerPanier`(IN `idJoueurVariable` INT, IN `total` INT)
BEGIN
	UPDATE joueurs set solde = solde - total where idJoueur = idJoueurVariable;
    delete from panier where idJoueur = idJoueurVariable;
END$$
DELIMITER ;
