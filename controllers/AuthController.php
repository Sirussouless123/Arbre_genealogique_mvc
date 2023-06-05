<?php
session_start();
require 'models/AuthManager.php';

# Mettre au propre les données envoyées par l'utilisateur
function cleanData($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = trim($var);
    return $var;
}

#Générer le code d'identification d'une famille
function generateCode()
{
    $code = mt_rand(0, 100) . mt_rand(0, 500) . mt_rand(0, 1000);
    return $code;
}
class AuthController
{
    private $authManager;

    public function __construct()
    {
        $this->authManager = new AuthManager;
    }

    # Gestion de l'inscription
    public function signup()
    {
        $erreur = '';
        $list = $this->authManager->memberList();
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
                $mailExist =  $this->authManager->mailExist($mail);


                if ($mailExist > 0) {
                    $erreur = 'Mail existant.Veuillez la changer';
                } else {
                    if ($pwd === $cpwd) {
                        $code = generateCode();
                        $ver_code = $this->authManager->verifyCodeBdd($code);
                        if ($ver_code > 0) {
                            $code = generateCode();
                        }
                        $insert = $this->authManager->insertUser($f_name, $l_name, $mail, $birth_date, $birth_city, $pwd, $idTm, $code);
                        if ($insert === true) {
                            header("Location:connexion");
                        }
                    } else {
                        $erreur = 'Vos mots de passe ne correspondent pas ';
                    }
                }
            } else {
                $erreur = "Veuillez remplir tous les champs";
            }
        }

        require 'views/inscription.php';
    }

    #Gestion de la connexion
    public function login()
    {
        $erreur = '';

        if (isset($_POST['login'])) {

            if (!empty($_POST['mail']) && !empty($_POST['pwd'])) {
                $mail = $_POST['mail'];
                $pwd = $_POST['pwd'];
                $verif1 = $this->authManager->userExist($mail);
                $verif2 = $this->authManager->userAdmin($mail, $pwd);

                if ($verif1 === 1) {

                    $bd_pwd = $this->authManager->getPwd($mail);
                    if (password_verify($pwd, $bd_pwd)) {
                        $info = $this->authManager->getUserInfo($mail);
                        $_SESSION['id'] = $info['idUt'];
                        $_SESSION['idTm'] = $info['idTm'];
                        $_SESSION['code'] = $info['code'];

                        header("Location:membre");
                    } else {
                        $erreur = "Mot de passe erroné";
                    }
                } elseif ($verif2 === 1) {
                    $info = $this->authManager->getAdminInfo($mail);
                    $_SESSION['idAd'] = $info['idAd'];

                    header("Location:admin");
                } else {
                    $erreur = "Identifiant erroné";
                }
            } else {
                $erreur = "Veuillez remplir les champs";
            }
        }

        require 'views/connexion.php';
    }
}
