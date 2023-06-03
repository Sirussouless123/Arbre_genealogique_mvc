<?php

class AdminManager extends Model
{

    #Obtenir la liste des types dans la bdd
    public function getTypeList()
    {
        $req_type = $this->getBdd()->prepare("SELECT * FROM typemembre ");

        if ($req_type->execute()) {
            return $req_type->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 'Requête non exécutée';
        }
    }


    #Vérifie si  un type existe dans la Bdd
    public function nameExist($name)
    {
        $req = $this->getBdd()->prepare("SELECT * From typemembre WHERE name='$name' ");

        if ($req->execute()) {
            return $req->rowCount();
        } else {
            return ' Requête non exécutée';
        }
    }

    #Ajout d'un type dans la Bdd
    public function add($name)
    {
        $req = $this->getBdd()->prepare("INSERT INTO typemembre(name) VALUES('$name') ");

        if ($req->execute()) {
            return true;
        } else {
            return false;
        }
    }

    #Modification d'un type dans la Bdd
    public function update($idTm, $name)
    {
        $req = $this->getBdd()->prepare(" UPDATE typemembre set name='$name' WHERE idTm='$idTm' ");

        if ($req->execute()) {
            return true;
        } else {
            return false;
        }
    }

    #Infos d'un utilisateur donnéee
    public function getInfo($idTm)
    {
        $req = $this->getBdd()->prepare("SELECT * From typemembre WHERE idTm='$idTm' ");

        if ($req->execute()) {

            $info = $req->fetchAll(PDO::FETCH_ASSOC);
            return $info[0];
        } else {
            return ' Requête non exécutée';
        }
    }
}
