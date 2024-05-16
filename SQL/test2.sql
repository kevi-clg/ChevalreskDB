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
INSERT INTO joueurs (alias, prenom, nom, password, avatar) VALUES ('bob', 'bob', 'bob', 'password', 'data/images/avatars/Ballon-Icon- 092550.png');


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



call AjouterEnigmes("qu\'est ce qu'une potion","1","P","une potion","1","une roche","0","un nuage","0","un balai","0");
call AjouterEnigmes("qu\'est ce qu'une potion","1","P","une potion","1","une roche","0","un nuage","0","un balai","0");
call AjouterEnigmes("qu\'est ce qu'une potion","3","P","une potion","1","une roche","0","un nuage","0","un balai","0");
call AjouterEnigmes("qu\'est ce qu'un élément", "2","P","une roche","0","un élément","1","un nuage","0","un balai","0");
call AjouterEnigmes("Pourquoi le sang est rouge","3","N","à cause du PH","0","Parce que?","1","Mutation génétique","0","génétique","0");
CALL AjouterEnigmes("Quel est le plus grand océan de la Terre?", "1", "N", "Océan Pacifique", "1", "Océan Atlantique", "0", "Océan Indien", "0", "Océan Arctique", "0");
CALL AjouterEnigmes("Qui a écrit 'Les Misérables'?", "2", "N", "Victor Hugo", "1", "Émile Zola", "0", "Honoré de Balzac", "0", "Gustave Flaubert", "0");
CALL AjouterEnigmes("Quelle est la capitale de l'Australie?", "1", "P", "Canberra", "1", "Sydney", "0", "Melbourne", "0", "Brisbane", "0");
CALL AjouterEnigmes("Quel est l'élément chimique dont le symbole est O?", "1", "P", "Oxygène", "1", "Or", "0", "Osmium", "0", "Oganesson", "0");
CALL AjouterEnigmes("Qui a peint la 'Joconde'?", "3", "P", "Leonardo da Vinci", "1", "Michel-Ange", "0", "Raphaël", "0", "Donatello", "0");
CALL AjouterEnigmes("Quelle est la planète la plus proche du soleil?", "1", "N", "Mercure", "1", "Vénus", "0", "Terre", "0", "Mars", "0");
CALL AjouterEnigmes("Dans quel pays peut-on trouver la Tour Eiffel?", "1", "P", "France", "1", "Italie", "0", "Allemagne", "0", "Espagne", "0");
CALL AjouterEnigmes("Quelle est la plus grande planète de notre système solaire?", "1", "P", "Jupiter", "1", "Saturne", "0", "Neptune", "0", "Uranus", "0");
CALL AjouterEnigmes("Qui a découvert la pénicilline?", "2", "N", "Alexander Fleming", "1", "Marie Curie", "0", "Louis Pasteur", "0", "Gregor Mendel", "0");
CALL AjouterEnigmes("Quel est le plus long fleuve du monde?", "1", "P", "Le Nil", "1", "L'Amazone", "0", "Le Yangtsé", "0", "Le Mississippi", "0");
CALL AjouterEnigmes("Quelle est la capitale du Japon?", "1", "P", "Tokyo", "1", "Osaka", "0", "Kyoto", "0", "Nagoya", "0");
CALL AjouterEnigmes("Qui a écrit 'Roméo et Juliette'?", "3", "N", "William Shakespeare", "1", "Charles Dickens", "0", "Jane Austen", "0", "Mark Twain", "0");
CALL AjouterEnigmes("Quel est le plus grand désert du monde?", "1", "P", "Le Sahara", "1", "Le désert de Gobi", "0", "Le désert de Kalahari", "0", "Le désert de Sonora", "0");
CALL AjouterEnigmes("Quel est le plus haut sommet du monde?", "2", "P", "L'Everest", "1", "K2", "0", "Kangchenjunga", "0", "Lhotse", "0");
CALL AjouterEnigmes("Quel est l'organe principal du système circulatoire?", "1", "P", "Le cœur", "1", "Les poumons", "0", "Le foie", "0", "Les reins", "0");
CALL AjouterEnigmes("Quelle est la monnaie du Royaume-Uni?", "1", "N", "Livre sterling", "1", "Euro", "0", "Dollar américain", "0", "Yen", "0");
CALL AjouterEnigmes("Qui est connu comme le père de la physique moderne?", "1", "P", "Albert Einstein", "1", "Isaac Newton", "0", "Galileo Galilei", "0", "Niels Bohr", "0");
CALL AjouterEnigmes("Quel est l'animal terrestre le plus rapide?", "3", "P", "Le guépard", "1", "Le lion", "0", "Le cheval", "0", "Le léopard", "0");
CALL AjouterEnigmes("Quelle est la plus grande île du monde?", "2", "N", "Groenland", "1", "Madagascar", "0", "Borneo", "0", "Nouvelle-Guinée", "0");
CALL AjouterEnigmes("Quel est le plus grand mammifère marin?", "3", "P", "La baleine bleue", "1", "Le requin blanc", "0", "Le dauphin", "0", "L'orque", "0");
