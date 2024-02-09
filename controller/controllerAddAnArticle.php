<?php

class controllerAddArticle
{

    public function addAnArticleController()
    {
        if (isset($_POST['SubmitAddAnArticle'])) {
            if (
                isset($_POST['article_title']) and !empty($_POST['article_title'])
                and isset($_POST['article_content']) and !empty($_POST['article_content'])
            ) {
                $sanitize = new Functions;
                $title = $sanitize->sanitize($_POST['article_title']);
                $content = $sanitize->sanitize($_POST['article_content']);
                $login = intval($_SESSION['id']);
                echo gettype($login);

                $newArticleAdd = new ModelAddAnArticle();
                $newArticleAdd->settitleArticle($title);
                $newArticleAdd->setcontentArticle($content);
                $newArticleAdd->setIdUSer($login);
                $newArticleAdd->setBdd(new bddMySQL('localhost', 'todolist', 'root', ''));

                $messageAddArticle =$newArticleAdd->addAnArticle();

                header("Location: ./addAnArticle");
            }
        }
    }

    public function render()
    {
        if (isset($_SESSION['connected'])) {
            $connectedNavBar = '
                <a href="articles">Les articles</a>
                <a href="addAnArticle">Ajouter un article</a>
                <button><a href="signOut">Deconnexion</a></button>';
        }
        include './view/header.php';
        include './view/navBar.php';
        include './view/screenAddAnArticle.php';
    }
}
