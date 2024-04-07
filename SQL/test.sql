/*Vidage de Table*/
Delete From armes;
Delete From armures;
Delete From potions;
Delete From éléments;
Delete From items;
ALTER TABLE items AUTO_INCREMENT = 1;
ALTER TABLE joueurs AUTO_INCREMENT = 1;
Delete From joueurs;


/*table joueur*/
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Louka_J4', 'Louka', 'Janelle', 'password', 'data/images/avatars/Louka-Icon-092221.png');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Kévi_S5', 'Kévi', 'Simard', 'password', 'data/images/avatars/logo.jpg');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Damien_N6', 'Damien', 'Noël', 'password', 'data/images/avatars/Damien-Icon-092159.png');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Prof_cool103', 'Luc', 'Ledoux', 'password', 'data/images/avatars/vector-valid-icon-design.jpg');
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('Wilson23', 'Tom', 'Hanks', 'password', 'data/images/avatars/Ballon-Icon- 092550.png');

/*table Armes*/
Delete From armes;
INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('Lance', 10, 'armes', 14, 'lance-115623.png');
INSERT INTO armes (id,efficacite,genre,description) VALUES (1,3,1, 'arme tres equilibrer avec une parfaite areodynamique magnifiant vos lancer');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('epee', 25,'armes',22,'epee.png');
INSERT INTO armes (id,efficacite,genre,description) VALUES (2,4,1,'une arme pour un roi');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('bouclier',10,'armes',5,'bouclier.png');
INSERT INTO armes (id,efficacite,genre,description) VALUES (3,0,1,'pas tres utile pour attaquer mais pour bloquer c est parfait');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('dague',43,'armes',3,'dague.png');
INSERT INTO armes (id,efficacite,genre,description) VALUES (4,1,1,'une arme sournoise pour des personne sournois');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('hache',12,'armes',10,'hache.png');
INSERT INTO armes (id,efficacite,genre,description) VALUES (5,5,1,'une arme puissante');

/*table Armures*/
INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('casque',32,'armures',15,'armure.png');
INSERT INTO armures (id,matiere,taille) VALUES (6,'mithril','s');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('plastron',23,'armures',13,'armure.png');
INSERT INTO armures (id,matiere,taille) VALUES (7,'acier','m');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('jambiere',12,'armures',15,'armure.png');
INSERT INTO armures (id,matiere,taille) VALUES (8,'or','x');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('botte',30,'armures',12,'armure.png');
INSERT INTO armures (id,matiere,taille) VALUES (9,'bronze','l');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('bracelet',28,'armures',18,'armure.png');
INSERT INTO armures (id,matiere,taille) VALUES (10,'diamant','s');

/*table Potions*/
INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('potion de force',10,'potions',16,'potion.png');
INSERT INTO potions (id,effect,duree,type) VALUES (11,'vous donne de la force',23,'potions');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('potion de vitesse',11,'potions',16,'potion.png');
INSERT INTO potions (id,effect,duree,type) VALUES (12,'vous donne de la vitesse',12,'potions');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('potion de jump',13,'potions',16,'potion.png');
INSERT INTO potions (id,effect,duree,type) VALUES (13,'vous permet de sauter plus haut',11,'potions');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('poison',12,'potions',16,'potion.png');
INSERT INTO potions (id,effect,duree,type) VALUES (14,'ceci est un poison',9,'potions');

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('potion de resurection',14,'potions',112,'potion.png');
INSERT INTO potions (id,effect,duree,type) VALUES (15,'vous ramene a la vie',20,'potions');

/*table Elements*/
INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('dent de dragon',8,'éléments',153,'elements.png');
INSERT INTO éléments (id,type,rarete,dangerosite) VALUES (16,'éléments',5,10);

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('larme de licorne',3,'éléments',250,'elements.png');
INSERT INTO éléments (id,type,rarete,dangerosite) VALUES (17,'éléments',5,1);

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('poil de loup',32,'éléments',43,'elements.png');
INSERT INTO éléments (id,type,rarete,dangerosite) VALUES (18,'éléments',1,3);

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('sang de liche',11,'éléments',99,'elements.png');
INSERT INTO éléments (id,type,rarete,dangerosite) VALUES (19,'éléments',2,4);

INSERT INTO items (nom,quantite,typee,prix,photo) VALUES ('poudre d os de mort vivant',26,'éléments',53,'elements.png');
INSERT INTO éléments (id,type,rarete,dangerosite) VALUES (20,'éléments',4,4);