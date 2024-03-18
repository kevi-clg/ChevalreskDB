<?php
include_once 'DAL/models/record.php';

Class Items extends Record
{
    public $nom;
    public $quantité;
    public $type;
    public $prix;
    public $photo;

    public function __construct($recordData = null)
    {
        
        $this->nom = "";
        $this->quantité = 1;
        $this->type = "";
        $this->prix = 200;
        $this->photo = "";
        $this->setUniqueKey('Alias');
        parent::__construct($recordData);
    }
}