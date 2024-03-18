<?
include_once 'DAL/models/record.php';

Class Armure extends Record
{
    public $id;
    public $matiere;
    public $taille;

    public function __construct($recordData = null)
    {
        $this->id= 0;
        $this->matiere = "";
        $this->taille = "";
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setmatiere($matiere)
    {
        $this->matiere = $matiere;
    }
    public function settaille($taille)
    {
        $this->taille = $taille;
    }
}