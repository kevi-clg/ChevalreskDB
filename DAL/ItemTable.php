<?php
include_once 'DAL/MySQLDataBase.php';
//
const photopath = "data/images/photositem/";
final class ItemTable extends MySQLTable
{
    public function __construct()
    {
        parent::__construct(DB(), new items());
    }

    public function insert($item)
    {
        //$newitem = new Items($item->nom, $item->quantite,$item->type ,$item->prix, $item->photo);
        $newitem = new Items();
        $newitem->setNom($item->nom);
        $newitem->setquantite($item->quantite);
        $newitem->settypee($item->type);
        $newitem->setphoto(saveImage(photopath, $item->photo));
        if ($item->type == "Arme") {
            $arme = new Arme();
            $arme->setdescription($item->description);
            $arme->setefficacite($item->efficacite);
            $arme->setgenre($item->genre);
            ArmeTable()->insert($arme);
        }
        if ($item->type == "Armure") {
            $armure = new Armure();
            $armure->setmatiere($item->matiere);
            $armure->settaille($item->taille);
            ArmureTable()->insert($arme);
        }
        parent::insert($item);
    }
}