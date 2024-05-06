Delete From armes;
Delete From armures;
Delete From potions;
Delete From éléments;
delete from panier;
delete from inventaire;
Delete From items;
delete from panier;
delete from évaluation;

ALTER TABLE items AUTO_INCREMENT = 1;
ALTER TABLE joueurs AUTO_INCREMENT = 1;
Delete From joueurs;

INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Louka_J4', 'Louka', 'Janelle', 'password', 'data/images/avatars/Louka-Icon-092221.png');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Kévi_S5', 'Kévi', 'Simard', 'password', 'data/images/avatars/logo.jpg');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Damien_N6', 'Damien', 'Noël', 'password', 'data/images/avatars/Damien-Icon-092159.png');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Prof_cool103', 'Luc', 'Ledoux', 'password', 'data/images/avatars/vector-valid-icon-design.jpg');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Wilson23', 'Tom', 'Hanks', 'password', 'data/images/avatars/Ballon-Icon- 092550.png');


delete from tabledecraft;
Delete From armes;
Delete From armures;
Delete From potions;
Delete From éléments;
delete from panier;
delete from inventaire;
delete from évaluation;
Delete From items;
delete from panier;
ALTER TABLE items AUTO_INCREMENT = 1;
call AjouterArme('Lance', 10, 14, 'arme.png',3,1, 'Arme très équilibré avec un parfait aréodynamisme, parfait pour lancer loin');

call AjouterElement('Larme de licorne',3,5,'elements.png','Magique',5,1);
call AjouterPotion('Potion de résurection',14,112,'potion.png','Vous ramène à la vie',20,'Défense');
call AjouterArme('Épée', 25,22,'arme.png',4,1,'Une arme pour un roi');
call AjouterElement('Poudre d\'os de mort vivant',26,4,'elements.png','Mort',4,4);

call AjouterArme('Bouclier',10,5,'arme.png',0,1,'Pas très utile pour attaquer, mais pour bloquer c\'est parfait');
call AjouterArmure('Plastron',23,13,'armure.png','Acier','M');
call AjouterElement('Poil de loup',32,7,'elements.png','Magique',1,3);

call AjouterArme('Dague',43,3,'arme.png',1,1,'Une arme sournoise pour des personnes sournoises');
call AjouterArmure('Casque',32,15,'armure.png','Mithril','S');
call AjouterPotion('Potion de force',10,16,'potion.png','Vous donne de la force',23,'Attaque');
call AjouterArmure('botte',30,12,'armure.png','bronze','l');

call AjouterArme('Hache',12,10,'arme.png',5,1,'Une arme puissante');
call AjouterPotion('Potion de saut',13,16,'potion.png','Vous permet de sauter plus haut',11,'Défense');

call AjouterArmure('Jambiere',12,15,'armure.png','Or','X');
call AjouterArmure('Bracelet',28,18,'armure.png','Diamant','S');

call AjouterElement('Dent de dragon',8,6,'elements.png','Magique',5,10);
call AjouterElement('Sang de liche',11,2,'elements.png','Mort',2,4);

call AjouterPotion('Potion de vitesse',11,16,'potion.png','Vous donne de la vitesse',12,'Défense');
call AjouterPotion('Poison',12,16,'potion.png','Ceci est un poison',9,'Attaque');
call AjouterElement('Persil',11,1,'elements.png','Herbe',1,1);

insert into tabledecraft values(3,2,5,4,2);
insert into tabledecraft values(11,8,18,5,3);
insert into tabledecraft values(14,5,21,7,4);
insert into tabledecraft values(19,2,8,2,3);
insert into tabledecraft values(20,17,5,7,3);

insert into évaluation values(32,1,"Très bon!",4);
insert into évaluation values(31,1,"Bon!",3);
insert into évaluation values(32,2,"Très bon!",5);
insert into évaluation values(34,2,"Mauvais!",1);
insert into évaluation values(31,2,"Mauvais!",2);
insert into évaluation values(32,3,"Très bon!",5);
insert into évaluation values(35,3,"Mauvais!",2);
insert into évaluation values(33,3,"Très bon!",4);
insert into évaluation values(31,3,"Mauvais!",1);
insert into évaluation values(35,4,"Bon!",3);
insert into évaluation values(32,5,"Très bon!",5);
insert into évaluation values(33,5,"Mauvais!",2);
insert into évaluation values(32,6,"Bon!",3);
insert into évaluation values(35,7,"Mauvais!",1);
insert into évaluation values(34,7,"Très bon!",5);
insert into évaluation values(31,7,"Mauvais!",2);
insert into évaluation values(32,7," Bon!",3);
insert into évaluation values(32,8,"Mauvais!",1);
insert into évaluation values(34,9,"Très bon!",5);
insert into évaluation values(35,10,"Mauvais!",1);
insert into évaluation values(31,11,"Bon!",3);
insert into évaluation values(32,12,"Très bon!",4);

insert into enigmes(enigme,diff,typee) values("qu\'est ce qu'une potion", "F","P");
insert into enigmes(enigme,diff,typee) values("qu\'est ce qu'un élément", "F","P");
insert into enigmes(enigme,diff,typee) values("Pourquoi le sang est rouge", "M","N");
insert into enigmes(enigme,diff,typee) values("Comment s\'appelle le casque du chevalier", "D","N");
insert into enigmes(enigme,diff,typee) values("qu\'est ce qu'une potion", "F","P");
insert into enigmes(enigme,diff,typee) values("qu\'est ce qu'une potion", "F","P");
insert into enigmes(enigme,diff,typee) values("qu\'est ce qu'une potion", "F","P");
insert into enigmes(enigme,diff,typee) values("qu\'est ce qu'une potion", "F","P");
insert into enigmes(enigme,diff,typee) values("qu\'est ce qu'une potion", "F","P");

call AjouterEnigmes("qu\'est ce qu'une potion","1","P","une potion","1","une roche","0","un nuage","0","un balai","0");
call AjouterEnigmes("qu\'est ce qu'une potion","1","P","une potion","1","une roche","0","un nuage","0","un balai","0");
call AjouterEnigmes("qu\'est ce qu'une potion","1","P","une potion","1","une roche","0","un nuage","0","un balai","0");
call AjouterEnigmes("qu\'est ce qu'un élément", "2","P","une roche","0","un élément","1","un nuage","0","un balai","0");
call AjouterEnigmes("Pourquoi le sang est rouge","3","N","à cause du PH","0","Parce que?","1","Mutation génétique","0","génétique","0");
