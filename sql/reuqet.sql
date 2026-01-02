-- Active: 1764687553815@@localhost@3306@mabagnole
CREATE DATABASE MaBagnole ;
USE MaBagnole ;

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE clients (
    id_client  INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_passe_hash VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    role ENUM ('admin','client') DEFAULT 'client'
);

CREATE TABLE vehicules (
    id INT PRIMARY KEY AUTO_INCREMENT,
    modele VARCHAR(100) NOT NULL,
    immatriculation VARCHAR(20) UNIQUE NOT NULL,
    prix_jour DECIMAL(10,2) NOT NULL,
    id_categorie INT,
    disponible BOOLEAN DEFAULT TRUE,
    image_url VARCHAR(255),
    FOREIGN KEY (id_categorie) REFERENCES categories(id)
);

CREATE TABLE reservations (
    id_rev INT PRIMARY KEY AUTO_INCREMENT,
    id_clt INT,
    id_vehicule INT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    lieu_depart VARCHAR(100),
    lieu_retour VARCHAR(100),
    statut ENUM('en_attente', 'confirmee', 'terminee', 'annulee') DEFAULT 'en_attente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_clt) REFERENCES clients(id_client),
    FOREIGN KEY (id_vehicule) REFERENCES vehicules(id)
);


CREATE TABLE avis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_clt INT,
    id_vehicule INT,
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    soft_deleted BOOLEAN DEFAULT FALSE,
    date_avis TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_clt) REFERENCES clients(id_client),
    FOREIGN KEY (id_vehicule) REFERENCES vehicules(id)
);


INSERT INTO categories (nom, description) VALUES 
('Citadines', 'Voitures compactes pour la ville'),
('SUV', 'Véhicules 4x4 familiaux'),
('Utilitaires', 'Camions et camionnettes'),
('Motos', 'Deux roues');

INSERT INTO vehicules (modele, immatriculation, prix_jour, id_categorie) VALUES 
('Renault Clio', 'AB-123-CD', 45.00, 1),
('Peugeot 208', 'XY-456-ZZ', 48.00, 1),
('BMW X3', 'EF-789-GH', 85.00, 2),
('Ford Transit', 'JK-012-LM', 65.00, 3),
('Yamaha MT-07', 'NO-345-PQ', 35.00, 4);


SELECT * FROM vehicules;


SELECT v.modele, c.nom AS categorie 
FROM vehicules v 
JOIN categories c ON v.id_categorie = c.id;

SELECT c.nom, COUNT(v.id) as nb_vehicules
FROM categories c
JOIN vehicules v ON c.id = v.id_categorie
GROUP BY c.id, c.nom;



