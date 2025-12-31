<?php
class Client {
    private $id;
    private $nom;
    private $email;
    private $mot_de_passe_hash;

    public function __construct($id, $nom, $email, $mot_de_passe_hash) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->mot_de_passe_hash = $mot_de_passe_hash;
    }

    // Getters & Setters
    public function getId() 
    {
         return $this->id; 
    }
    public function getNom() 
    {
         return $this->nom; 
    }
    public function getEmail() 
    {
         return $this->email; 
    }
    public function getMotDePasseHash() 
    {
         return $this->mot_de_passe_hash; 
    }

    public function setId($id)
    {
         $this->id = $id; 
    }
    public function setNom($nom) 
    {
         $this->nom = $nom; 
    }
    
    public function setEmail($email) 
    {
         $this->email = $email; 
    }
    
    public function setMotDePasseHash($hash) 
    {
         $this->mot_de_passe_hash = $hash; 
    }
}