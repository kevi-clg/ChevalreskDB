/*selectAllItems*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllItems`()
begin 
	select * from items;
end$$
DELIMITER ;