<?php
class Avis {
    private $id;
    private $id_client;
    private $id_vehicule;
    private $note;
    private $commentaire;
    private $date_avis;

    public function __construct($id, $id_client, $id_vehicule, $note, $commentaire, $date_avis) {
        $this->id = $id;
        $this->id_client = $id_client;
        $this->id_vehicule = $id_vehicule;
        $this->note = $note;
        $this->commentaire = $commentaire;
        $this->date_avis = $date_avis;
    }

    // --- GETTERS ---
    public function getId() 
    {
         return $this->id; 
    }
    public function getIdClient() 
    {
         return $this->id_client; 
    }
    public function getIdVehicule() 
    { 
        return $this->id_vehicule; 
    }
    public function getNote() 
    {
         return $this->note; 
    }
    public function getCommentaire() 
    {
         return $this->commentaire; 
    }
    public function getDateAvis() 
    {
         return $this->date_avis; 
    }

    // --- SETTERS ---
    public function setId($id) 
    {
         $this->id = $id; 
    }
    public function setIdClient($id) 
    {
         $this->id_client = $id; 
    }
    public function setIdVehicule($id) 
    {
         $this->id_vehicule = $id; 
    }
    public function setNote($note) 
    {
         $this->note = $note; 
    }
    public function setCommentaire($comm) 
    {
         $this->commentaire = $comm; 
    }
    public function setDateAvis($date) 
    {
         $this->date_avis = $date; 
    }
}