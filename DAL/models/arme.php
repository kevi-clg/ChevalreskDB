<?php
include_once 'DAL/models/record.php';

Class Arme extends Record
{
    public $id;
    public $efficacite;
    public $genre;
    public $description;

    public function __construct($recordData = null)
    {
        $this->id= 0;
        $this->efficacite = "";
        $this->genre = "";
        $this->description = "";
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setefficacite($efficacite)
    {
        $this->efficacite = $efficacite;
    }
    public function setgenre($genre)
    {
        $this->genre = $genre;
    }
    public function setdescription($description)
    {
        $this->description = $description;
    }
}