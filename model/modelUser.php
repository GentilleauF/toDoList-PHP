<?php

abstract class ModelUser
{
    private ?int $idUser;
    private ?string $nameUser;
    private ?string $firstnameUser;
    private ?string $loginUser;
    private ?string $passwordUser;
    private ?BddService $bdd;




    //GETTER AND SETTER
    //NAME
    public function getId(): int{
        return $this->idUser;
    }
    public function setId(int $idUser): ModelUser{
        $this->idUser = $idUser;
        return $this; //-> retourne l'objet ModelUser
    }
    
    //NAME
    public function getName(): string{
        return $this->nameUser;
    }
    public function setName(string $nameUser): ModelUser{
        $this->nameUser = $nameUser;
        return $this; //-> retourne l'objet ModelUser
    }

    //FIRSTNAME
    public function getFirstname(): string{
        return $this->firstnameUser;
    }
    public function setFirstname(string $firstnameUser): ModelUser{
        $this->firstnameUser = $firstnameUser;
        return $this; //-> retourne l'objet ModelUser
    }

    // LOGIN
    public function getLogin(): string{
        return $this->loginUser;
    }
    public function setLogin(string $loginUser): ModelUser{
        $this->loginUser = $loginUser;
        return $this; //-> retourne l'objet ModelUser
    }

    //PASSSWORD
    public function getPwd(): string{
        return $this->passwordUser;
    }
    public function setPwd(string $passwordUser): ModelUser{
        $this->passwordUser = $passwordUser;
        return $this; //-> retourne l'objet ModelUser
    }

    // DATABASE
    public function getBdd(): BddService{
        return $this->bdd;
    }
    public function setBdd(BddService $bdd): ModelUser{
        $this->bdd = $bdd;
        return $this; //-> retourne l'objet ModelUser
    }




    //METHODS
    public abstract function login(): array|Exception;
    public abstract function signUp();
}
