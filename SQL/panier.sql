select ..., quantite from panier 
inner join items on item.idItem = panier.idItem
where idJoueur = variableIdJoueur;