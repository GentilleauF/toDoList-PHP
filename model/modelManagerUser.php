<?php

class ManagerUSer extends ModelUser
{

    public function login(): array|Exception
    {
        try {

            $bdd = $this->getBdd()->connect();
            $req = $bdd->prepare('SELECT users.id, users.name_user, users.firstname_user, users.login_user, users.password_user FROM users WHERE login_user = ?');

            $login = $this->getLogin();
            $req->bindParam(1, $login, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            // var_dump($data);
            // echo 'reussi';
            return $data;
        } 
        catch (Exception $error) 
        { 
            echo $error;
            return $error;
        }
    }

    public function signUp()
    {
        try {
            $bdd = $this->getBdd()->connect();
            $req = $bdd->prepare('INSERT INTO users (name_user, firstname_user, login_user, password_user) VALUES (?,?,?,?)');
    
            //Binding Param
            $name = $this->getName();
            $firstname = $this->getFirstname();
            $login = $this->getLogin();
            $pwd = $this->getPwd();

            $req->bindParam(1, $name, PDO::PARAM_STR);
            $req->bindParam(2, $firstname, PDO::PARAM_STR);
            $req->bindParam(3, $login, PDO::PARAM_STR);
            $req->bindParam(4, $pwd, PDO::PARAM_STR);
    

            $req->execute();
    
            //DONE
            $signInMessage = "Vous avez été enregistré avec succès !";
            echo $signInMessage;
            return $signInMessage;
        } 
        catch (Exception $error) {
            return $error;
        }
    }
}
