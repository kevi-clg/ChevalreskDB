<?php
include_once 'DAL/MySQLDataBase.php';
final class ArmureTable extends MySQLTable
{
    public function __construct()
    {
        parent::__construct(DB(), new Armure());
    }

    public function insert($Armure)
    {
        parent::insert($Armure);
    }
}