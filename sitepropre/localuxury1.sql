DROP DATABASE IF EXISTS localuxury1;
CREATE DATABASE localuxury1;
USE localuxury1;

CREATE TABLE Vehicule (
  idvehicule INT PRIMARY KEY AUTO_INCREMENT,
  marque VARCHAR(255) NOT NULL,
  modele VARCHAR(255) NOT NULL,
  annee INT NOT NULL,
  caracteristiques TEXT,
  image VARCHAR(255) NOT NULL,
  prix_journalier DECIMAL(10, 2) NOT NULL,
  caution DECIMAL(10, 2) NOT NULL,
  puissance DECIMAL(10, 2) NOT NULL,
  nb_places INT NOT NULL,
  statut ENUM('DISPONIBLE', 'INDISPONIBLE') NOT NULL DEFAULT 'DISPONIBLE'
);

INSERT INTO Vehicule (marque, modele, annee, caracteristiques, image, prix_journalier, caution, puissance, nb_places)
VALUES 
  ("Lamborghini", "URUS", 2020, "SUV de luxe à quatre roues motrices", "urus.png", 2500, 30000, 650, 4),
  ("Porsche", "Panamera", 2020, "Berline de luxe à quatre portes", "panamera.png", 730, 9000, 550, 4),
  ("Porsche", "Cayenne S", 2021, "SUV de luxe à quatre roues motrices", "cayenne.png", 750, 10000, 541, 4),
  ("Audi", "RS6", 2020, "Berline de luxe à quatre portes", "rs6.png", 1200, 12000, 592, 4),
  ("Bentley", "Continental GT Speed", 2021, "Coupé de luxe à deux portes", "continental.png", 1800, 20000, 660, 4),
  ("Bugatti", "Chiron", 2020, "Supercar de luxe à deux portes", "chiron.png", 38500, 240000, 1500, 2),
  ("McLaren", "P1", 2020, "Supercar hybride à deux portes", "p1.png", 27000, 9000, 916, 2),
  ("Land Rover", "Range Rover Sport", 2020, "SUV de luxe à quatre roues motrices", "rangerover.png", 700, 7000, 400, 5),
  ("Porsche", "718 Boxster", 2020, "Cabriolet de sport à deux portes", "718boxster.png", 800, 9000, 300, 2),
  ("Audi", "R8", 2020, "Supercar de luxe à deux portes", "r8.png", 1800, 12000, 420, 2);

CREATE TABLE Client (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  adresse VARCHAR(255) NOT NULL,
  ville VARCHAR(255) NOT NULL,
  code_postal VARCHAR(255) NOT NULL,
  numero_telephone VARCHAR(255) NOT NULL
);

INSERT INTO Client (nom, adresse, ville, code_postal, numero_telephone)
VALUES 
  ('Karim Bentaleb', '1 rue de la Paix', 'Paris', '75000', '01 02 03 04 05'),
  ('Marie Martin', '2 avenue des Champs-Elysées', 'Paris', '75000', '06 07 08 09 10'),
  ('Pierre Durand', '3 boulevard de la Villette', 'Paris', '75010', '11 12 13 14 15'),
  ('Julie Blanc', '4 rue de la Roquette', 'Paris', '75011', '16 17 18 19 20'),
  ('David Noiret', '5 avenue de Clichy', 'Paris', '75017', '21 22 23 24 25');

CREATE TABLE Location (
  id INT PRIMARY KEY AUTO_INCREMENT,
  vehicule_id INT NOT NULL,
  client_id INT NOT NULL,
  date_debut DATETIME NOT NULL,
  date_fin DATETIME NOT NULL,
  prix_total DECIMAL(10, 2) NOT NULL,
  reduction DECIMAL(10, 2) DEFAULT 0,
  mode_paiement ENUM('ESPECES', 'CARTE_DE_CREDIT', 'CHEQUE') NOT NULL,
  caution DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (vehicule_id) REFERENCES Vehicule(idvehicule),
  FOREIGN KEY (client_id) REFERENCES Client(id)
);

INSERT INTO Location (vehicule_id, client_id, date_debut, date_fin, prix_total, reduction, mode_paiement, caution)
VALUES 
  (1, 1, '2022-01-01 10:00:00', '2022-01-07 10:00:00', 15000, 0, 'ESPECES', 30000),
  (2, 2, '2022-02-01 10:00:00', '2022-02-07 10:00:00', 4380, 0, 'CARTE_DE_CREDIT', 9000),
  (3, 3, '2022-03-01 10:00:00', '2022-03-07 10:00:00', 4500, 0, 'ESPECES', 10000),
  (4, 4, '2022-04-01 10:00:00', '2022-04-07 10:00:00', 7200, 0, 'CARTE_DE_CREDIT', 12000),
  (5, 5, '2022-05-01 10:00:00', '2022-05-07 10:00:00', 10800, 0, 'CHEQUE', 20000);

CREATE TABLE Historique LIKE Location;
INSERT INTO Historique SELECT * FROM Location;

CREATE TABLE user (
  iduser INT(3) NOT NULL AUTO_INCREMENT,
  nom VARCHAR(50), 
  prenom VARCHAR(50), 
  email VARCHAR(50), 
  mdp VARCHAR(50), 
  role ENUM('admin', 'user'),
  nbConnexion INT DEFAULT 0,
  nbfail INT DEFAULT 0,
  nbfailSinceLastLogin INT DEFAULT 0,
  lastConnexion DATETIME,
  lastfail DATETIME,
  PRIMARY KEY(iduser)
);

INSERT INTO user (nom, prenom, email, mdp, role) VALUES 
  ("wasil", "Selhami", "wasil.selhami@mediaschool.me", "456", "user"), 
  ("william", "leite", "leitefaria.william@gmail.com", "123", "admin");

CREATE TABLE Reservation (
  vehicule_id INT(3) NOT NULL AUTO_INCREMENT,
  vehicule_marque VARCHAR(255),
  vehicule_modele VARCHAR(255),
  start_date VARCHAR(50), 
  end_date VARCHAR(50), 
  name VARCHAR(50), 
  email VARCHAR(50), 
  PRIMARY KEY(vehicule_id)
);

DELIMITER //
DROP PROCEDURE IF EXISTS Connexion;
CREATE PROCEDURE Connexion(uname VARCHAR(255), mdp VARCHAR(255))
BEGIN
  IF (SELECT u.mdp FROM user u WHERE u.email = uname) = mdp THEN
    UPDATE user u 
    SET
      u.nbConnexion = u.nbConnexion + 1,
      u.nbfailSinceLastLogin = 0,
      u.lastConnexion = NOW()
    WHERE u.email = uname;
  ELSE 
    UPDATE user u
    SET 
      u.nbfail = u.nbfail + 1,
      u.nbfailSinceLastLogin = u.nbfailSinceLastLogin + 1,
      u.lastfail = NOW()
    WHERE u.email = uname;
  END IF;
END;
//
CREATE EVENT IF NOT EXISTS update_password_every_3_months
ON SCHEDULE
EVERY 3 MONTH
DO
BEGIN
  UPDATE user SET mdp = 'new_password_hash' WHERE iduser = 1;
END;
//
DELIMITER ;
