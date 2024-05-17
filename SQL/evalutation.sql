--suprimer commentaire

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SuprimmerCommentaire` (IN `idJoueurVariable` INT, IN `idItemVariable` INT)
BEGIN
        DELETE FROM evaluation
        WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `statsNbEtoile`(IN `idJoueurVariable` INT, IN `idItemVariable` INT)
BEGIN
    SELECT 
    	(SELECT COUNT(*) FROM évaluation WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable) AS TotalEnregistrements,
        (SELECT COUNT(*) FROM évaluation WHERE nbEtoile = 5 AND idJoueur = idJoueurVariable AND idItem = idItemVariable) AS NbEtoiles5,
        (SELECT COUNT(*) FROM évaluation WHERE nbEtoile = 4 AND idJoueur = idJoueurVariable AND idItem = idItemVariable) AS NbEtoiles4,
        (SELECT COUNT(*) FROM évaluation WHERE nbEtoile = 3 AND idJoueur = idJoueurVariable AND idItem = idItemVariable) AS NbEtoiles3,
        (SELECT COUNT(*) FROM évaluation WHERE nbEtoile = 2 AND idJoueur = idJoueurVariable AND idItem = idItemVariable) AS NbEtoiles2,
        (SELECT COUNT(*) FROM évaluation WHERE nbEtoile = 1 AND idJoueur = idJoueurVariable AND idItem = idItemVariable) AS NbEtoiles1;
END$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FetchCommentaire`(IN `IdJoueurPara` INT, IN `IdItemPara` INT)
SELECT * from evaluation where IdJoueur = IdJoueurPara and IdItem = IdItemPara$$
DELIMITER ;