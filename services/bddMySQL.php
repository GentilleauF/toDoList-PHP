<?php
class bddMySQL implements BddService
{   
    private ?string $host;
    private ?string $dbName;
    private ?string $dbLogin;
    private ?string $dbPassword;


    //Constructor()
    public function __construct($host, $dbName, $dbLogin, $dbPassword){
        $this->host = $host;
        $this->dbName = $dbName;
        $this->dbLogin = $dbLogin;
        $this->dbPassword = $dbPassword;
    }
    
    // GETTERS
    public function getHost():string{
        return $this->host;
    }
    public function getdbNBame():string{
        return $this->dbName;
    }

    public function getLogin():string{
        return $this->dbLogin;
    }

    public function getPassword():string{
        return $this->dbPassword;
    }




    //METHOD
    public function connect(): PDO
    {
        $host = $this->getHost();
        $dbName = $this->getdbNBame();
        $dbLogin = $this->getLogin();
        $dbPassword = $this->getPassword();
        return new PDO("mysql:host=$host;dbname=$dbName", "$dbLogin", "$dbPassword", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
