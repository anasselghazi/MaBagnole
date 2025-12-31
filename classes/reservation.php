 <?php
class Reservation {
    private $id;
    private $id_client;
    private $id_vehicule;
    private $date_debut;
    private $date_fin;
    private $lieu_depart;
    private $lieu_retour;
    private $statut;

    public function __construct($id, $id_client, $id_vehicule, $date_debut, $date_fin, $lieu_depart, $lieu_retour, $statut) {
        $this->id = $id;
        $this->id_client = $id_client;
        $this->id_vehicule = $id_vehicule;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->lieu_depart = $lieu_depart;
        $this->lieu_retour = $lieu_retour;
        $this->statut = $statut;
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
    public function getDateDebut() 
    {
         return $this->date_debut; 
    }
    public function getDateFin() 
    {
         return $this->date_fin; 
        
    }
    public function getLieuDepart() 
    {
         return $this->lieu_depart; 
    }
    public function getLieuRetour() 
    {
         return $this->lieu_retour; 
    }
    public function getStatut() 
    {
         return $this->statut; 
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
    public function setDateDebut($date) 
    {
         $this->date_debut = $date; 
    }
    public function setDateFin($date) 
    {
         $this->date_fin = $date; 
    }
    public function setLieuDepart($lieu) 
    {
         $this->lieu_depart = $lieu; 
    }
    public function setLieuRetour($lieu) 
    {
         $this->lieu_retour = $lieu; 
    }
    public function setStatut($statut) 
    { 
        $this->statut = $statut; 
    }
}