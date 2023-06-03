<?php

require 'models/Model.php';


class AuthManager extends Model
{

  #Informations sur les types de membre parents
  public function memberList()
  {

    $req_mem = $this->getBdd()->prepare("SELECT * FROM typemembre WHERE name = 'Père' OR name = 'Mère' ");

    if ($req_mem->execute() === true) {
      $listMe = $req_mem->fetchAll(PDO::FETCH_ASSOC);
      return $listMe;
    } else {
      return $error = [];
    }
  }
  #Insertion de l'utilisateur dans la base de données
  public function insertUser($f_name, $l_name, $mail, $birth_date, $birth_city, $pwd, $idTm, $code)
  {
    $pwd = password_hash($pwd, PASSWORD_BCRYPT);

    $insertUser = $this->getBdd()->prepare("INSERT INTO utilisateur(f_name ,l_name ,mail ,birth_date ,birth_city ,pwd ,idTm,code) VALUES(:f_name ,:l_name ,:mail ,:birth_date ,:birth_city ,:pwd ,:idTm,:code)");


    $insertUser->bindParam(":f_name", $f_name);
    $insertUser->bindParam(':l_name', $l_name);
    $insertUser->bindParam(':mail', $mail);
    $insertUser->bindParam(':birth_date', $birth_date);
    $insertUser->bindParam(':birth_city', $birth_city);
    $insertUser->bindParam(':pwd', $pwd);
    $insertUser->bindParam(':idTm', $idTm);
    $insertUser->bindParam(':code', $code);
    if ($insertUser->execute()) {
      return true;
    }
    return false;
  }

  # Vérifie si le mail  à l'inscription est unique en base de données
  public function mailExist($mail)
  {
    $req_mail = $this->getBdd()->query("SELECT * FROM utilisateur WHERE mail ='$mail'");
    $result = $req_mail->rowCount();

    return $result;
  }

  #Vérifie si l'utilisateur est enregistré
  public function userExist($mail)
  {
    $user_ver = $this->getBdd()->prepare("SELECT * FROM utilisateur WHERE mail = '$mail'  ");

    if ($user_ver->execute()) {

      return  $user_ver->rowCount();
    } else {
      return "Requête non éxécutée ";
    }
  }
  #Obtenir la mot de passe d'un utilisateur
  public function getPwd($mail)
  {
    $user_ver = $this->getBdd()->prepare("SELECT pwd FROM utilisateur WHERE mail = '$mail' ");

    if ($user_ver->execute()) {
      $pwd_row = $user_ver->fetch(PDO::FETCH_ASSOC);

      return  $pwd_row['pwd'];
    } else {
      return "Requête non éxécutée ";
    }
  }

  #Vérifie si l'utilisateur est un admin
  public function userAdmin($mail, $pwd)
  {

    $user_ver = $this->getBdd()->prepare("SELECT * FROM admin WHERE login = '$mail' AND pwd= '$pwd' ");

    if ($user_ver->execute()) {
      return $user_ver->rowCount();
    } else {
      return "Requête non éxécutée ";
    }
  }

  #Obtenir l'information d'un utilisateur
  public function getUserInfo($mail)
  {
    $req_id = $this->getBdd()->prepare("SELECT idUt,idTm,code FROM utilisateur WHERE mail='$mail' ");

    if ($req_id->execute()) {

      $id = $req_id->fetchAll(PDO::FETCH_ASSOC);
      return $id[0];
    } else {
      return "Requête non éxécutée";
    }
  }

  #Obtenir l'id d'un admin
  public function getAdminInfo($mail)
  {
    $req_id = $this->getBdd()->prepare("SELECT idAd FROM admin WHERE login='$mail' ");

    if ($req_id->execute()) {

      $id = $req_id->fetchAll(PDO::FETCH_ASSOC);
      return $id[0];
    } else {
      return "Requête non éxécutée";
    }
  }

  #Vérifie si le code n'existe pas dans la bdd
  public function verifyCodeBdd($code)
  {
    $req_code = $this->getBdd()->prepare("SELECT * FROM utilisateur WHERE code='$code' ");

    if ($req_code->execute()) {
      return $req_code->rowCount();
    } else {
      return "Requête non exécutée";
    }
  }
}
