<?php
include_once 'DAL/models/record.php';

Class Items extends Record
{
    public $nom;
    public $quantite;
    public $typee;
    public $prix;
    public $photo;

    public function __construct($recordData = null)
    {
        
        $this->nom = "";
        $this->quantite = 1;
        $this->typee = "";
        $this->prix = 200;
        $this->photo = "";
        $this->setUniqueKey('Alias');
        parent::__construct($recordData);
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setquantite($quantite)
    {
        $this->quantite = $quantite;
    }
    public function settypee($typee)
    {
        $this->typee = $typee;
    }
    public function setprix($prix)
    {
        $this->prix = $prix;
    }
    public function setphoto($photo)
    {
        $this->photo = $photo;
    }
}