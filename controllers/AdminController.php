<?php

require_once "models/AdminManager.php";
require_once "models/Admin.php";
class AdminController
{
  private $adminManager;
  public function __construct()
  {
    $this->adminManager = new AdminManager;
  }

  #Liste des types de membre
  public function typeList()
  {

    if (isset($_SESSION['idAd'])) {


      $typeList = $this->adminManager->getTypeList();
      require 'views/admin.php';
    } else {
      header("Location:connexion");
    }
  }

  #Ajout d'un type
  public function add()
  {

    if (isset($_SESSION['idAd'])) {
      $erreur = '';
      if (isset($_POST['adminad'])) {
        if (!empty($_POST['namead'])) {
          $verif = $this->adminManager->nameExist($_POST['namead']);
          if ($verif > 0) {
            $erreur = 'Le type existe .Veuillez mettre un autre type';
          } else {
            $insert = $this->adminManager->add($_POST['namead']);
            if ($insert == true) {
              header('Location:admin');
            }
          }
        } else {
          $erreur = 'Veuillez remplir le champ';
        }
      }
      require "views/adminajout.php";
    } else {
      header("Location:connexion");
    }
  }

  #Modification d'un type
  public function update()
  {
    if (isset($_SESSION['idAd'])) {

      $erreur = '';

      $name = $this->adminManager->getInfo($_GET['num']);

      if (isset($_POST['adminad'])) {
        if (!empty($_POST['namead'])) {


          $verif = $this->adminManager->nameExist($_POST['namead']);
          if ($verif > 0) {
            $erreur = 'Le type existe .Veuillez mettre un autre type';
          } else {

            $insert = $this->adminManager->update($_GET['num'], $_POST['namead']);

            if ($insert == true) {
              header('Location:admin');
            }
          }
        } else {
          $erreur = 'Veuillez remplir le champ';
        }
      }


      require 'views/adminmod.php';
    } else {
      header("Location:connexion");
    }
  }

  # Déconnexion
  public function logout()
  {
    session_destroy();
    header('Location:connexion');
  }
}
