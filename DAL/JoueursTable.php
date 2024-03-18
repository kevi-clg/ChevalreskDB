<?php

include_once "DAL/MySQLDataBase.php";
include_once "DAL/models/joueur.php";
include_once 'php/imageFiles.php';

const avatarsPath = "data/images/avatars/";
final class JoueursTable extends MySQLTable
{
    public function __construct()
    {
        parent::__construct(DB(), new Joueur());
    }

    public function insert($joueur)
    {
        $joueur->setAvatar(saveImage(avatarsPath, $joueur->avatar));
        parent::insert($joueur);
    }
}