<?php
class Vehicule {
    private $id;
    private $modele;
    private $immatriculation;
    private $prix_jour;
    private $disponible;
    private $id_categorie;

    public function __construct($id, $modele, $immatriculation, $prix_jour, $disponible, $id_categorie) {
        $this->id = $id;
        $this->modele = $modele;
        $this->immatriculation = $immatriculation;
        $this->prix_jour = $prix_jour;
        $this->disponible = $disponible;
        $this->id_categorie = $id_categorie;
    }

    // Getters
    public function getId() 
    {
         return $this->id; 
    }
    public function getModele() 
    { 
        return $this->modele; 
    }
    public function getImmatriculation() 
    { 
        return $this->immatriculation; 
    }
    public function getPrixJour() 
    { 
        return $this->prix_jour; 
    }
    public function getDisponible() 
    {
         return $this->disponible; 
    }
    public function getIdCategorie() 
    {
         return $this->id_categorie; 
    }

    // Setters
    public function setId($id) 
    {
         $this->id = $id; 
    }
    public function setModele($modele) 
    {
         $this->modele = $modele; 
    }
    public function setImmatriculation($immat) 
    {
         $this->immatriculation = $immat; 
    }
    public function setPrixJour($prix) 
    {
         $this->prix_jour = $prix; 
    }
    public function setDisponible($bool) 
    {
         $this->disponible = $bool; 
    }
    public function setIdCategorie($id_cat) 
    {
         $this->id_categorie = $id_cat; 
    }
}