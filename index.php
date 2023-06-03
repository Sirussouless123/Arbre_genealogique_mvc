<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once 'controllers/AuthController.php';
require_once 'controllers/FamilyController.php';
require_once 'controllers/AdminController.php';



if (empty($_GET['var'])) {
    require 'views/accueil.php';
} else {
    $url = $_GET['var'];
    $authController = new AuthController;
    $familyController = new FamilyController;
    $adminController = new AdminController;
    try {
        switch ($url) {
            case 'accueil':
                require 'views/accueil.php';
                break;
            case 'connexion':
                $authController->login();
                break;
            case 'inscription':
                $authController->signup();
                break;
            case 'membre':
                $familyController->familyList();
                break;
                case 'recensement':
                    $familyController->add();
                    break;
                    case 'modifier':
                        $familyController->update();
                        break;
                    case 'memout':
                        $adminController->logout();
                        break;
            case 'admin':
                $adminController->typeList();
                break;

            case 'adminaj':

                $adminController->add();
                break;
            case 'adminmod':

                $adminController->update();
                break;
            case 'adminlogout':
                $adminController->logout();
                break;
            default:
                $e =   'Page non trouvé';
                require 'views/error.php';
                break;
        }
    } catch (\PDOException $e) {
        require 'views/error.php';
    }
}
