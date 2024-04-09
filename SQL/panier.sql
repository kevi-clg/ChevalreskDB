/*afficher le panier*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AfficherPanier`(IN `joueur_connecter` INT)
BEGIN
	select items.nom, items.prix, panier.quantite
	from panier
	INNER JOIN items ON items.idItem = panier.idItem
	where idJoueur = joueur_connecter;
END$$
DELIMITER ;