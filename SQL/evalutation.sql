--suprimer commentaire

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SuprimmerCommentaire` (IN `idJoueurVariable` INT, IN `idItemVariable` INT)
BEGIN
        DELETE FROM évaluation
        WHERE idJoueur = idJoueurVariable AND idItem = idItemVariable;
END$$
DELIMITER ;