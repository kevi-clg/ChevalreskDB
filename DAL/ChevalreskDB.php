<?php
include_once 'DAL/MySQLDataBase.php';
include_once 'DAL/JoueursTable.php';
include_once 'DAL/ItemTable.php';

function DB()
    {
        return MySQLDataBase::getInstance('dbchevalersk18');
    }
    function JoueursTable()
    {
        return new JoueursTable();
    }
    function ItemTable()
    {
        return new ItemTable();
    }
    function ArmeTable()
    {
        return new ArmeTable();
    }
    function ArmureTable()
    {
        return new ArmureTable();
    }