/*afficher le panier*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AfficherPanier`(IN `joueur_connecter` INT)
BEGIN
	select items.nom, items.prix, panier.quantite, items.photo
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