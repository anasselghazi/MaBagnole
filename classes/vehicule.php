<?php
class Vehicule 
{
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


     public  static function listerTous()
{     $db = new Database();
      $pdo = $db->getPdo();

    $sql = "SELECT v.*, c.nom AS categorie_nom 
      FROM vehicules v
      LEFT JOIN categories c ON v.id_categorie = c.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}



 
 

    

     public static function rechercherParModele($search) {
        $db = new Database();
        $pdo = $db->getPdo();
        $sql = "SELECT v.*, c.nom AS categorie_nom 
                FROM vehicules v LEFT JOIN categories c ON v.id_categorie = c.id 
                WHERE v.modele LIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["%$search%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function filtrerParCategorie($nomCategorie) {
        $db = new Database();
        $pdo = $db->getPdo();
        $sql = "SELECT v.*, c.nom AS categorie_nom 
                FROM vehicules v LEFT JOIN categories c ON v.id_categorie = c.id 
                WHERE c.nom LIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["%$nomCategorie%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function listerPagine($page=1, $parPage=5, $modele='', $categorie='') {
        $db = new Database();
        $pdo = $db->getPdo();
        $offset = ($page - 1) * $parPage;
        
        $sql = "SELECT v.*, c.nom AS categorie_nom 
                FROM vehicules v LEFT JOIN categories c ON v.id_categorie = c.id 
                WHERE (:modele='' OR v.modele LIKE :modele)
                AND (:categorie='' OR c.nom LIKE :categorie)
                AND v.disponible = 1
                LIMIT ? OFFSET ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'modele' => "%$modele%",
            'categorie' => "%$categorie%",
            $parPage, $offset
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



?>