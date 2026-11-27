-- Pink Data avec suppression en cascade d'un praticien
-- ATTENTION : ce fichier efface la base pink_data et la recrée VIDE.
-- phpMyAdmin > onglet Importer (ou onglet SQL) > exécuter

DROP DATABASE IF EXISTS pink_data;
CREATE DATABASE pink_data;
USE pink_data;

CREATE TABLE Patiente (
    Id_Patiente    INT AUTO_INCREMENT PRIMARY KEY,
    Nom            VARCHAR(50),
    Prenom         VARCHAR(50),
    Date_naissance DATE,
    Numero         VARCHAR(10),
    Rue            VARCHAR(100),
    Code_postal    VARCHAR(10),
    Localite       VARCHAR(60),
    Telephone      VARCHAR(20),
    Email          VARCHAR(100)
) ENGINE=InnoDB;

CREATE TABLE Professionnel (
    Id_Praticien INT AUTO_INCREMENT PRIMARY KEY,
    Nom          VARCHAR(50),
    Prenom       VARCHAR(50),
    Specialite   VARCHAR(60),
    Telephone    VARCHAR(20),
    Email        VARCHAR(100)
) ENGINE=InnoDB;

CREATE TABLE Reunion (
    Id_Reunion    INT AUTO_INCREMENT PRIMARY KEY,
    Date_reunion  DATE,
    Heure_reunion TIME
) ENGINE=InnoDB;

CREATE TABLE Equipement (
    Id_Equipement       INT AUTO_INCREMENT PRIMARY KEY,
    Type_machine        VARCHAR(60),
    Localisation_salle  VARCHAR(60),
    Etat_fonctionnement VARCHAR(30)
) ENGINE=InnoDB;

CREATE TABLE Antecedent_familial (
    Id_Antecedent_fam INT AUTO_INCREMENT PRIMARY KEY,
    Nom_maladie       VARCHAR(100),
    Lien_parente      VARCHAR(40),
    Id_Patiente       INT NOT NULL,
    FOREIGN KEY (Id_Patiente) REFERENCES Patiente(Id_Patiente)
) ENGINE=InnoDB;

CREATE TABLE Antecedent_medical (
    Id_Antecedent_med INT AUTO_INCREMENT PRIMARY KEY,
    Date_diagnostic   DATE,
    Nom_maladie       VARCHAR(100),
    Traitements       TEXT,
    Id_Patiente       INT NOT NULL,
    FOREIGN KEY (Id_Patiente) REFERENCES Patiente(Id_Patiente)
) ENGINE=InnoDB;

CREATE TABLE Concerner (
    Id_Patiente             INT,
    Id_Reunion              INT,
    Synthese_decisions      TEXT,
    Plan_traitement_propose TEXT,
    PRIMARY KEY (Id_Patiente, Id_Reunion),
    FOREIGN KEY (Id_Patiente) REFERENCES Patiente(Id_Patiente),
    FOREIGN KEY (Id_Reunion)  REFERENCES Reunion(Id_Reunion)
) ENGINE=InnoDB;

CREATE TABLE Participer (
    Id_Reunion   INT,
    Id_Praticien INT,
    PRIMARY KEY (Id_Reunion, Id_Praticien),
    FOREIGN KEY (Id_Reunion)   REFERENCES Reunion(Id_Reunion),
    FOREIGN KEY (Id_Praticien) REFERENCES Professionnel(Id_Praticien) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Consultation (
    Id_Consultation    INT AUTO_INCREMENT PRIMARY KEY,
    Date_consultation  DATE,
    Heure_consultation TIME,
    Motif_clinique     TEXT,
    Symptomes_observes TEXT,
    Conclusions        TEXT,
    Id_Patiente        INT NOT NULL,
    Id_Praticien       INT NOT NULL,
    FOREIGN KEY (Id_Patiente)  REFERENCES Patiente(Id_Patiente),
    FOREIGN KEY (Id_Praticien) REFERENCES Professionnel(Id_Praticien) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Prescription (
    Id_Prescription              INT AUTO_INCREMENT PRIMARY KEY,
    Date_prescription            DATE,
    Heure_prescription           TIME,
    Type_prescription            VARCHAR(50),
    Indication_clinique          TEXT,
    Instructions_complementaires TEXT,
    Id_Consultation              INT NOT NULL,
    FOREIGN KEY (Id_Consultation) REFERENCES Consultation(Id_Consultation) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Demande_examen (
    Id_Demande          INT AUTO_INCREMENT PRIMARY KEY,
    Type_examen_demande VARCHAR(60),
    Id_Prescription     INT NOT NULL,
    FOREIGN KEY (Id_Prescription) REFERENCES Prescription(Id_Prescription) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Examen (
    Id_Examen     INT AUTO_INCREMENT PRIMARY KEY,
    Date_examen   DATE,
    Heure_examen  TIME,
    Id_Demande    INT NOT NULL UNIQUE,
    Id_Equipement INT NOT NULL,
    FOREIGN KEY (Id_Demande)    REFERENCES Demande_examen(Id_Demande) ON DELETE CASCADE,
    FOREIGN KEY (Id_Equipement) REFERENCES Equipement(Id_Equipement)
) ENGINE=InnoDB;

CREATE TABLE Fichier_medical (
    Id_Fichier             INT AUTO_INCREMENT PRIMARY KEY,
    Nom_fichier            VARCHAR(150),
    Format_fichier         VARCHAR(20),
    Largeur_pixels         INT,
    Hauteur_pixels         INT,
    Taille_octets          BIGINT,
    Date_creation          DATE,
    Chemin_ou_URL_stockage VARCHAR(500),
    Id_Examen              INT NOT NULL,
    FOREIGN KEY (Id_Examen) REFERENCES Examen(Id_Examen) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Compte_rendu_radiologique (
    Id_Compte_rendu      INT AUTO_INCREMENT PRIMARY KEY,
    Date_compte_rendu    DATE,
    Localisation_lesions TEXT,
    Classification       VARCHAR(30),
    Conclusion           TEXT,
    Description_images   TEXT,
    Id_Examen            INT NOT NULL UNIQUE,
    Id_Praticien         INT NOT NULL,
    FOREIGN KEY (Id_Examen)    REFERENCES Examen(Id_Examen) ON DELETE CASCADE,
    FOREIGN KEY (Id_Praticien) REFERENCES Professionnel(Id_Praticien) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Resultat_anapath (
    Id_Resultat_anapath   INT AUTO_INCREMENT PRIMARY KEY,
    Date_resultat         DATE,
    Type_prelevement      VARCHAR(60),
    Descriptions          TEXT,
    Nature_lesion         VARCHAR(100),
    Caractere_benin_malin VARCHAR(10),
    Conclusions           TEXT,
    Id_Examen             INT NOT NULL UNIQUE,
    Id_Praticien          INT NOT NULL,
    FOREIGN KEY (Id_Examen)    REFERENCES Examen(Id_Examen) ON DELETE CASCADE,
    FOREIGN KEY (Id_Praticien) REFERENCES Professionnel(Id_Praticien) ON DELETE CASCADE
) ENGINE=InnoDB;


-- Données de départ (fictives)

INSERT INTO Professionnel (Nom, Prenom, Specialite, Telephone, Email) VALUES
('Dupont', 'Marie', 'Radiologue', '065111111', 'marie.dupont@hopital.be'),
('Lambert', 'Pierre', 'Gynécologue', '065222222', 'pierre.lambert@hopital.be'),
('Maes', 'Sophie', 'Oncologue', '065333333', 'sophie.maes@hopital.be'),
('Renard', 'Thomas', 'Anatomopathologiste', '065444444', 'thomas.renard@hopital.be'),
('Petit', 'Claire', 'Chirurgienne', '065555555', 'claire.petit@hopital.be');

INSERT INTO Patiente (Nom, Prenom, Date_naissance, Numero, Rue, Code_postal, Localite, Telephone, Email) VALUES
('Martin', 'Julie', '1975-03-12', '12', 'Rue de Mons', '7000', 'Mons', '0470101010', 'julie.martin@mail.be'),
('Leroy', 'Anne', '1968-09-25', '5', 'Avenue des Tilleuls', '7500', 'Tournai', '0470202020', 'anne.leroy@mail.be'),
('Dubois', 'Nathalie', '1982-01-30', '48', 'Rue Neuve', '7800', 'Ath', '0470303030', 'nathalie.dubois@mail.be');

INSERT INTO Equipement (Type_machine, Localisation_salle, Etat_fonctionnement) VALUES
('Mammographe', 'Salle 1', 'Fonctionnel'),
('Échographe', 'Salle 2', 'Fonctionnel'),
('IRM', 'Salle 3', 'En maintenance');
