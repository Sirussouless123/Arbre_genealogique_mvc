<?php

require 'models/familyManager.php';

class FamilyController
{

    private $familyManager;
    public function __construct()
    {
        $this->familyManager = new FamilyManager;
    }

    #Obtenir la liste d'une famille
    public function familyList()
    {

        if (isset($_SESSION['id'])) {

            $userList = $this->familyManager->getUserList($_SESSION['code']);

            require "views/membre.php";
        } else {
            header("Location:connexion");
        }
    }
    #Ajout d'un nouveau membre à la famille
    public function add()
    {
        if (isset($_SESSION['id'])) {
            $erreur = '';
            $list = $this->familyManager->memberList();
            if (isset($_POST['signup'])) {
                if (!empty($_POST['f_name']) && !empty($_POST['l_name']) && !empty($_POST['mail'])  && !empty($_POST['birth_date']) && !empty($_POST['birth_city']) && !empty($_POST['pwd']) && !empty($_POST['cpwd'])) {
                    $f_name = cleanData($_POST['f_name']);
                    $l_name = cleanData($_POST['l_name']);
                    $mail = cleanData($_POST['mail']);
                    $birth_date = cleanData($_POST['birth_date']);
                    $birth_city = cleanData($_POST['birth_city']);
                    $idTm = $_POST['membre'];
                    $pwd = cleanData($_POST['pwd']);
                    $cpwd = cleanData($_POST['cpwd']);
                    $mailExist =  $this->familyManager->mailExist($mail);


                    if ($mailExist > 0) {
                        $erreur = 'Mail existant.Veuillez la changer';
                    } else {
                        if ($pwd === $cpwd) {

                            $insert = $this->familyManager->insertUser($f_name, $l_name, $mail, $birth_date, $birth_city, $pwd, $idTm, $_SESSION['code']);
                            if ($insert === true) {
                                header("Location:membre");
                            }
                        } else {
                            $erreur = 'Vos mots de passe ne correspondent pas ';
                        }
                    }
                } else {
                    $erreur = "Veuillez remplir tous les champs";
                }
            }
            require 'views/recensement.php';
        } else {
            header("Location:connexion");
        }
    }

    #Gestion de la modification des informations
    public function update()
    {
        if (isset($_SESSION['id'])) {

            $erreur = '';
            $list = $this->familyManager->memberList();
            $info = $this->familyManager->getInfo($_GET['num']);
            if (isset($_POST['signup'])) {
                if (!empty($_POST['f_name']) && !empty($_POST['l_name']) && !empty($_POST['mail'])  && !empty($_POST['birth_date']) && !empty($_POST['birth_city']) && !empty($_POST['pwd']) && !empty($_POST['cpwd'])) {
                    $f_name = cleanData($_POST['f_name']);
                    $l_name = cleanData($_POST['l_name']);
                    $mail = cleanData($_POST['mail']);
                    $birth_date = cleanData($_POST['birth_date']);
                    $birth_city = cleanData($_POST['birth_city']);
                    $idTm = $_POST['membre'];
                    $pwd = cleanData($_POST['pwd']);
                    $cpwd = cleanData($_POST['cpwd']);
                    $mailExist =  $this->familyManager->mailExist($mail);


                    if ($mailExist > 0) {
                        $erreur = 'Mail existant.Veuillez la changer';
                    } else {
                        if ($pwd === $cpwd) {

                            $update = $this->familyManager->update($_GET['num'], $f_name, $l_name, $mail, $birth_date, $birth_city, $pwd, $idTm);
                            if ($update === true) {
                                header("Location:membre");
                            }
                        } else {
                            $erreur = 'Vos mots de passe ne correspondent pas ';
                        }
                    }
                } else {
                    $erreur = "Veuillez remplir tous les champs";
                }
            }
            require 'views/modifmembre.php';
        } else {
            header("Location:connexion");
        }
    }
}
