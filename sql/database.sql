-- Créer la base de données

CREATE DATABASE EA_FC_25;
USE EA_FC_25;

-- Créer la table des flag

CREATE TABLE flag (
    id_flag INT PRIMARY KEY AUTO_INCREMENT,
    flag_name VARCHAR(50) NOT NULL,
    url_flag VARCHAR(255) NOT NULL
);

-- Créer la table des clubs

CREATE TABLE club (
    id_club INT PRIMARY KEY AUTO_INCREMENT,
    club_name VARCHAR(50) NOT NULL,
    url_club VARCHAR(255) NOT NULL
);

-- Créer la table des joueurs avec les clés étrangères correctement définies

CREATE TABLE players (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    position VARCHAR(20) NOT NULL,
    id_flag INT,
    id_club INT,
    rating INT NOT NULL,
    pace INT,
    shooting INT,
    passing INT,
    dribbling INT,
    defending INT,
    physical INT,
    diving INT,
    handling INT,
    kicking INT,
    reflexes INT,
    speed INT,
    positioning INT,
    
    FOREIGN KEY (id_flag) REFERENCES flag(id_flag),
    FOREIGN KEY (id_club) REFERENCES club(id_club)
);