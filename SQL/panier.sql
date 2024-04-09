/*afficher le panier*/
DELIMITER $$
select items.nom, items.prix, panier.quantite
from panier
INNER JOIN items ON item.idItem = panier.idItem
where idJoueur = joueur_connecter;
DELIMITER ;