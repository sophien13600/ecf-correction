CREATE DATABASE tp_ecf;

USE tp_ecf;

CREATE TABLE administrateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
     nom VARCHAR(30),
     prenom VARCHAR(30),
    email VARCHAR(30) UNIQUE,
    password VARCHAR(30)
);

CREATE TABLE auteurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_complet VARCHAR(50),
    nationalite VARCHAR(30)
);

CREATE TABLE livres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(30) UNIQUE,
    categorie VARCHAR(30),
    annee_publication INT,
    id_auteur INT,
    id_admin INT,
    CONSTRAINT fk_auteurs_id FOREIGN KEY  (id_auteur) REFERENCES auteurs(id),
    CONSTRAINT fk_administrateurs_id FOREIGN KEY (id_admin) REFERENCES administrateurs(id)
);


INSERT INTO administrateurs VALUES (NULL, "Wick", "John", "wick@john.fr", "wick");
INSERT INTO administrateurs VALUES (NULL, "Dalton", "Jack", "dalton@jack.fr", "dalton");



INSERT INTO auteurs (nom_complet, nationalite) VALUES
('Victor Hugo', 'Française'),
('Jane Austen', 'Britannique'),
('Gabriel García Márquez', 'Colombienne'),
('George Orwell', 'Britannique');

INSERT INTO livres (titre, categorie, annee_publication, id_auteur, id_admin) VALUES
('Les Misérables', 'Roman historique', 1862, 1, 1),
('Orgueil et Préjugés', 'Roman', 1813, 2, 2),
('Cent ans de solitude', 'Réalisme magique', 1967, 3, 1),
('1984', 'Science-fiction', 1949, 4, 1);
