<?php
include_once 'DAL/models/record.php';
class Joueur extends Record
{
    
    public $alias;
    public $prenom;
    public $nom;
    public $solde;
    public $niveau;
    public $type;
    public $demande;

    public $password;
    public $avatar;

    public function __construct($recordData = null)
    {
        
        $this->alias = "";
        $this->prenom = "";
        $this->nom = "";
        $this->solde = 200;
        $this->demande = 0;
        $this ->niveau = "Auncun";
        $this->type = "Normal";
        $this->password = "";
        $this->avatar = "";
        $this->setUniqueKey('Alias');
        parent::__construct($recordData);
    }
   
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }
    public function setPrenom($Prenom)
    {
        $this->prenom = $Prenom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setniveau($niveau)
    {
        $this->niveau = $niveau;
    }
    public function Type($type)
    {
        $this->type = $type;
    }
    public function setDemande($demande)
    {
        $this->demande = (int) $demande;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

}