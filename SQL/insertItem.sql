



create procedure AjouterArme(IN Nom varchar(20), Quantite int, Typee varchar(20), Prix int,Photo varchar(256),Efficacite int, Genre int, DescriptionArme varchar(20))
begin
	declare id int;
    insert into Items (nom,quantite,typee,prix,photo) values (Nom,Quantite,Typee,Prix,Photo);
    set id = (select idItem from Items order by idItem desc LIMIT 1);
    insert into Armes values (id, Efficacite, Genre, DescriptionArme);
end

call 'AjouterArme'("Objet1",3,"Arme",30,"292F99C8-BBC3-4834-AECD-45C12A9C063D.png",5,1,"Arme pour tuer");

