<?php
include_once 'DAL/MySQLDataBase.php';

const photopath = "data/images/photositem/";
final class ItemTable extends MySQLTable
{
    public function __construct()
    {
        parent::__construct(DB(), new Item());
    }

    public function insert($item)
    {
        $newitem = new Item($item->nom, $item->quantite,$item->type ,$item->prix, $item->photo);
        $newitem->setphoto(saveImage(photopath, $item->photo));
        if($item->type == "Arme")
        {
            ArmeTable()->insert(new Arme($item->efficacite, $item->genre, $item->description));
        }
        if($item->type == "Armure")
        {
            ArmureTable()->insert(new Armure($item->matiere, $item->taille));
        }
        parent::insert($item);
    }
}