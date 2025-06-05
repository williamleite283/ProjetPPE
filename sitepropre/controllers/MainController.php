<?php
class MainController
{
    private $model;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->model = new Model($serveur, $bdd, $user, $mdp);
    }

    public function home()
    {
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/home.php';
        require __DIR__ . '/../views/partials/footer.php';
    }

    public function vehicles()
    {
        $vehicles = $this->model->getAllVehicles();
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/vehicles.php';
        require __DIR__ . '/../views/partials/footer.php';
    }

    public function reservation()
    {
        $vehicles = $this->model->getAllVehicles();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier disponibilité du véhicule pour la période demandée (simplifié)
            $vehicule_id = $_POST['vehicule'];
            $start_date = $_POST['start-date'];
            $end_date = $_POST['end-date'];
            // Ici on ne refait pas tout le contrôle avancé, mais tu peux ajouter la vérification en BDD

            $this->model->addReservation($_POST);
            header('Location: index.php?page=confirmation');
            exit;
        }
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/reservation.php';
        require __DIR__ . '/../views/partials/footer.php';
    }

    public function confirmation()
    {
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/confirmation.php';
        require __DIR__ . '/../views/partials/footer.php';
    }

    public function account()
    {
        if (!isset($_SESSION['User'])) {
            header('Location: index.php?page=login');
            exit;
        }
        $reservations = $this->model->getUserReservations($_SESSION['User']['email']);
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/account.php';
        require __DIR__ . '/../views/partials/footer.php';
    }

    public function contact()
    {
        $success = false;
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);


            $success = true;
        }
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/contact.php';
        require __DIR__ . '/../views/partials/footer.php';
    }


    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->model->verifyLogin($email, $password);
            if ($user) {
                $_SESSION['User'] = $user;
                header('Location: index.php?page=account');
                exit;
            } else {
                $error = "Identifiants incorrects";
            }
        }
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/login.php';
        require __DIR__ . '/../views/partials/footer.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?page=home');
        exit;
    }


    public function register()
    {
        $error = '';
        $success = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $prenom = trim($_POST['prenom'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $mdp = trim($_POST['mdp'] ?? '');
            $mdp2 = trim($_POST['mdp2'] ?? '');

            if (!$nom || !$prenom || !$email || !$mdp || !$mdp2) {
                $error = "Veuillez remplir tous les champs.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Email invalide.";
            } elseif ($mdp !== $mdp2) {
                $error = "Les mots de passe ne correspondent pas.";
            } elseif ($this->model->userExists($email)) {
                $error = "Un compte existe déjà avec cet email.";
            } else {
                // Pour la démo, pas de hash, mais mets `password_hash($mdp, PASSWORD_DEFAULT)` si tu modifies la connexion
                $this->model->createUser($nom, $prenom, $email, $mdp);
                $success = true;
            }
        }
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/register.php';
        require __DIR__ . '/../views/partials/footer.php';
    }


    public function error404()
    {
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/error404.php';
        require __DIR__ . '/../views/partials/footer.php';
    }
}
