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



    public function creer() {
       $db = new Database();
       $pdo = $db->getPdo();

       $sql = 'INSERT INTO reservations(id_client, id_vehicule, date_debut, date_fin, lieu_depart, lieu_retour, statut) 
            VALUES (?,?,?,?,?,?, "en_attente")';
       $stmt = $pdo->prepare($sql);
    
    $resultat = $stmt->execute([
        $this->id_client,
        $this->id_vehicule,
        $this->date_debut,
        $this->date_fin,
        $this->lieu_depart,
        $this->lieu_retour
    ]);
    
    return $resultat;  
   }

    public static function isDisponible($pdo, $id_vehicule, $dateDebut, $dateFin) {
        $sql = 'SELECT * FROM reservations 
            WHERE id_vehicule = ? 
            AND statut != "annulee"
            AND (
                (date_debut <= ? AND date_fin >= ?) OR
                (date_debut >= ? AND date_fin <= ?)
            )';
       $stmt = $pdo->prepare($sql);
       $stmt->execute([$id_vehicule, $dateFin, $dateDebut, $dateDebut, $dateFin]);
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return !$result;  
   }



    public static function listerClient($pdo, $id_client) {
        $sql = 'SELECT r.*, v.modele, c.nom AS categorie_nom 
            FROM reservations r
            JOIN vehicules v ON r.id_vehicule = v.id
            JOIN categories c ON v.id_categorie = c.id
            WHERE r.id_client = ? 
            ORDER BY r.date_debut DESC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_client]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
?>