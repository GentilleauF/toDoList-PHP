<?php

class ModelAddAnArticle extends ModelArticles
{
    public function addAnArticle()
    {
        try {
            $bdd = $this->getBdd()->connect();

            $req = $bdd->prepare('INSERT INTO tasks ( title_task, content_task, id_author) VALUES (?,?,?)');

            //Binding params
            $title = $this->gettitleArticle();
            $content = $this->getcontentArticle();
            $idUser = $this->getIdUser();

            $req->bindParam(1, $title, PDO::PARAM_STR);
            $req->bindParam(2, $content, PDO::PARAM_STR);
            $req->bindParam(3, $idUser, PDO::PARAM_STR);

            $req->execute();
            $messageAddArticle = "Article Bien enregistré";

            
            return $messageAddArticle;
        } catch (Exception $errorArticle) {
            echo $errorArticle;
            return $errorArticle;
        }
    }
}
