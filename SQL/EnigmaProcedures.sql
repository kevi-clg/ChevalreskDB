
/*Toutes les procédures d'énigma*/
/*ATTENTION: TOUTES LES ACCENTS DE LA BASE DE DONNÉES DOIVENT ÊTRE RETIRÉS POUR QU'ELLE FONCTIONNENT*/


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FetchEnigme`(IN `DiffParam` INT)
SELECT * FROM enigmes where diff = DiffParam && IdQuestion NOT IN(Select IdQuestion from enigmesrepondues) && typee = "N" ORDER BY RAND () LIMIT 1$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FetchReponse`(IN `IdQuestionParam` INT)
Select * from reponses where idQuestion = IdQuestionParam  ORDER BY RAND () LIMIT 4$$
DELIMITER ;

/*FetchEnigmeAlch n'est plus nécessaire*/
/*Mise A jour des fetchs pour les énigme */

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FetchEnigme`(IN `DiffParam` INT, IN `IdJoueurPara` INT)
SELECT * FROM enigmes where diff = DiffParam && IdQuestion NOT IN(Select IdQuestion from enigmesrepondues where IdJoueur = IdJoueurPara) ORDER BY RAND () LIMIT 1$$
DELIMITER ;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FetchEnigmeRandom`(IN `IdJoueurPara` INT)
SELECT * FROM enigmes where IdQuestion NOT IN(Select IdQuestion from enigmesrepondues where IdJoueur = IdJoueurPara) ORDER BY RAND () LIMIT 1$$
DELIMITER ;

INSERT INTO enigmes (enigmes, diff, Typee) VALUES ('', '', '');

insert into reponses (idQuestion, reponse, flag) values (SELECT LAST_INSERT_ID(), 'test', 1);