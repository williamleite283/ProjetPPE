<?php
session_start();
require_once __DIR__ . '/../config/config_bdd.php';
require_once __DIR__ . '/../models/Model.php';
require_once __DIR__ . '/../controllers/MainController.php';

$controller = new MainController($serveur, $bdd, $user, $mdp);

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

ob_start();

switch ($page) {
    case 'home':
    case '0':
        $controller->home();
        break;
    case 'vehicles':
    case '1':
        $controller->vehicles();
        break;
    case 'reservation':
    case '2':
        $controller->reservation();
        break;
    case 'account':
    case '3':
        $controller->account();
        break;
    case 'contact':
    case '4':
        $controller->contact();
        break;
    case 'login':
    case '5':
        $controller->login();
        break;



    case 'register':
        $controller->register();
        break;

    case 'confirmation':
    case '6':
        $controller->confirmation();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        $controller->error404();
        break;
}

echo ob_get_clean();
