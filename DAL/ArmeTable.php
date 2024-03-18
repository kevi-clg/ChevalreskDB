<?php
include_once 'DAL/MySQLDataBase.php';

final class ArmeTable extends MySQLTable
{
    public function __construct()
    {
        parent::__construct(DB(), new Arme());
    }

    public function insert($arme)
    {
        parent::insert($arme);
    }

    
}