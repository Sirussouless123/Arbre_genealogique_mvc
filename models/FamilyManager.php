<?php



class FamilyManager extends Model
{

    #Obtenir la liste des membres d'une famille dans la bdd
    public function getUserList($code)
    {

        $req_user = $this->getBdd()->prepare("SELECT Utilisateur.f_name, Utilisateur.idUt,Utilisateur.l_name,Utilisateur.birth_date,Typemembre.name FROM Utilisateur INNER JOIN TypeMembre ON Utilisateur.idTm = Typemembre.idTm WHERE code=$code");

        if ($req_user->execute()) {
            $users = $req_user->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } else {
            return "Requête non exécutée";
        }
    }

    #Vérifie si le mail existe dans la Bdd
    public function mailExist($mail)
    {
        $req_mail = $this->getBdd()->query("SELECT * FROM utilisateur WHERE mail ='$mail'");
        $result = $req_mail->rowCount();

        return $result;
    }

    #Vérifie si le code existe dans la bdd
    public function verifyCodeBdd($code)
    {
        $req_code = $this->getBdd()->prepare("SELECT * FROM utilisateur WHERE code='$code' ");

        if ($req_code->execute()) {
            return $req_code->rowCount();
        } else {
            return "Requête non exécutée";
        }
    }

    #Enregistrer un utilisateur

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

    #Liste des types de membre en dehors des parents
    public function memberList()
    {

        $req_mem = $this->getBdd()->prepare("SELECT idTm,name FROM typemembre WHERE name != 'Père' AND name != 'Mère' ");

        if ($req_mem->execute() === true) {
            $listMe = $req_mem->fetchAll(PDO::FETCH_ASSOC);
            return $listMe;
        } else {
            return 'Requête non exécutée';
        }
    }

    #Modifier un utilisateur
    public function update($id, $f_name, $l_name, $mail, $birth_date, $birth_city, $pwd, $idTm)
    {
        $pwd = password_hash($pwd, PASSWORD_BCRYPT);
        $req = $this->getBdd()->prepare("UPDATE utilisateur set f_name='$f_name' ,l_name='$l_name' ,mail='$mail' ,birth_date='$birth_date' ,birth_city='$birth_city' ,pwd='$pwd' ,idTm=$idTm WHERE idUt=$id ");

        if ($req->execute()) {
            return true;
        } else {
            return false;
        }
    }

    #Obtenir les infos d'un utilisatur
    public function getInfo($id)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM utilisateur WHERE idUt=$id ");

        if ($req->execute() === true) {
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list[0];
        } else {
            return "Requête non exécutée";
        }
    }
}
