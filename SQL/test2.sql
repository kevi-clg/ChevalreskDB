Delete From armes;
Delete From armures;
Delete From potions;
Delete From éléments;
Delete From items;
ALTER TABLE items AUTO_INCREMENT = 1;
ALTER TABLE joueurs AUTO_INCREMENT = 1;
Delete From joueurs;

INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Louka_J4', 'Louka', 'Janelle', 'password', 'data/images/avatars/Louka-Icon-092221.png');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Kévi_S5', 'Kévi', 'Simard', 'password', 'data/images/avatars/logo.jpg');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Damien_N6', 'Damien', 'Noël', 'password', 'data/images/avatars/Damien-Icon-092159.png');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Prof_cool103', 'Luc', 'Ledoux', 'password', 'data/images/avatars/vector-valid-icon-design.jpg');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Wilson23', 'Tom', 'Hanks', 'password', 'data/images/avatars/Ballon-Icon- 092550.png');


call AjouterArme('Lance', 10, 14, 'arme.png',3,1, 'arme tres equilibrer avec une parfaite areodynamique magnifiant vos lancer');
call AjouterArme('epee', 25,22,'arme.png',4,1,'une arme pour un roi');
call AjouterArme('bouclier',10,5,'arme.png',0,1,'pas très utile pour attaquer mais pour bloquer c est parfait');
call AjouterArme('dague',43,3,'arme.png',1,1,'une arme sournoise pour des personne sournois');
call AjouterArme('hache',12,10,'arme.png',5,1,'une arme puissante');

call AjouterArmure('casque',32,15,'armure.png','mithril','s');
call AjouterArmure('plastron',23,13,'armure.png','acier','m');
call AjouterArmure('jambiere',12,15,'armure.png','or','x');
call AjouterArmure('botte',30,12,'armure.png','bronze','l');
call AjouterArmure('bracelet',28,18,'armure.png','diamant','s');

call AjouterElement('dent de dragon',8,153,'elements.png','éléments',5,10);
call AjouterElement('larme de licorne',3,250,'elements.png','éléments',5,1);
call AjouterElement('poil de loup',32,43,'elements.png','éléments',1,3);
call AjouterElement('sang de liche',11,99,'elements.png','éléments',2,4);
call AjouterElement('poudre d os de mort vivant',26,53,'elements.png','éléments',4,4);

call AjouterPotion('potion de force',10,16,'potion.png','vous donne de la force',23,'potions');
call AjouterPotion('potion de vitesse',11,16,'potion.png','vous donne de la vitesse',12,'potions');
call AjouterPotion('potion de jump',13,16,'potion.png','vous permet de sauter plus haut',11,'potions');
call AjouterPotion('poison',12,16,'potion.png','ceci est un poison',9,'potions');
call AjouterPotion('potion de resurection',14,112,'potion.png','vous ramene a la vie',20,'potions');