<?php
class ModelArticles
{
    private ?int $id;
    private ?string $titleArticle;
    private ?string $contentArticle;
    private ?string $idUser;
    private ?BddService $bdd;



    //GETTER AND SETTER
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): ModelArticles
    {
        $this->id = $id;
        return $this;
    }



    //titleArticle
    public function gettitleArticle(): string
    {
        return $this->titleArticle;
    }
    public function settitleArticle(string $titleArticle): ModelArticles
    {
        $this->titleArticle = $titleArticle;
        return $this;
    }


    public function getcontentArticle(): string
    {
        return $this->contentArticle;
    }
    public function setcontentArticle(string $contentArticle): ModelArticles
    {
        $this->contentArticle = $contentArticle;
        return $this;
    }

    //idUser
    public function getIdUser(): string{
        return $this->idUser;
    }
    public function setIdUSer(string $idUser): ModelArticles
    {
        $this->idUser = $idUser;
        return $this;
    }

    // DATABASE
    public function getBdd(): BddService{
        return $this->bdd;
    }
    
    public function setBdd(BddService $bdd): ModelArticles{
        $this->bdd = $bdd;
        return $this; //-> retourne l'objet ModelUser
    }




    // METHOD
    public function ListArticles(): array|Exception
    {
        try {
            $bdd = $this->getBdd()->connect();
            $req = $bdd->prepare(
                'SELECT id_task, title_task, content_task, users.login_user FROM tasks
                 LEFT JOIN users 
                 ON tasks.id_author = users.id            
                '
            );
            $req->execute();

            //Fetch answer
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } catch (Exception $error) {
            return $error;
        }
    }

    public function addArticle(){}
}
