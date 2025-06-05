<?php
class Model
{
    private $pdo;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $dsn = "mysql:host=$serveur;dbname=$bdd;charset=utf8";
        try {
            $this->pdo = new PDO($dsn, $user, $mdp, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // VÉHICULES
    public function getAllVehicles()
    {
        $stmt = $this->pdo->query("SELECT * FROM Vehicule");
        return $stmt->fetchAll();
    }
    public function getVehicleById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Vehicule WHERE idvehicule = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // RÉSERVATION
    public function addReservation($data)
    {
        $veh = $this->getVehicleById($data['vehicule']);
        $stmt = $this->pdo->prepare("INSERT INTO Reservation (vehicule_id, vehicule_marque, vehicule_modele, start_date, end_date, name, email)
            VALUES (:vehicule_id, :marque, :modele, :start_date, :end_date, :name, :email)");
        $stmt->execute([
            ':vehicule_id' => $data['vehicule'],
            ':marque' => $veh['marque'],
            ':modele' => $veh['modele'],
            ':start_date' => $data['start-date'],
            ':end_date' => $data['end-date'],
            ':name' => $data['name'],
            ':email' => $data['email'],
        ]);
    }
    public function getUserReservations($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Reservation WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchAll();
    }

    // LOGIN
    public function verifyLogin($email, $mdp)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ? AND mdp = ?");
        $stmt->execute([$email, $mdp]);
        return $stmt->fetch();
    }

    // Inscription
    public function createUser($nom, $prenom, $email, $mdp)
    {
        $stmt = $this->pdo->prepare("INSERT INTO user (nom, prenom, email, mdp, role) VALUES (?, ?, ?, ?, 'user')");
        return $stmt->execute([$nom, $prenom, $email, $mdp]);
    }
    public function userExists($email)
    {
        $stmt = $this->pdo->prepare("SELECT iduser FROM user WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }
}
