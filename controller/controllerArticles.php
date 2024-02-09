<?php
 class  ControllerArticles {
    public function getAllArticles(){
        $listedArticles = new ModelArticles;
        $listedArticles->setBdd(new bddMySQL('localhost', 'todolist', 'root', ''));
        $listedArrayArticles = $listedArticles->ListArticles();

        foreach ($listedArrayArticles as $key=>$oneArticle) {
            ?>
            <div class="flex flex-row border mx-5 my-4 rounded">
                <div class="w-16 flex justify-center items-center bg-blue-300">
                    <?= $key+1 ?>
                </div>
                <div class="p-3">
                    <p class="font-medium"><?= $oneArticle['title_task'] ?></p>
                    <p><?= $oneArticle['content_task'] ?></p>
                    <p>écrit par <?= $oneArticle['login_user'] ?></p>
                </div>
            </div>
            <?php
        }
        return $listedArticles = ob_get_clean();
    }

    public function render(){
        $listedArticles = $this->getAllArticles();

        if (isset($_SESSION['connected'])) {
            $connectedNavBar = '
                <a href="articles">Les articles</a>
                <a href="addAnArticle">Ajouter un article</a>
                <button><a href="signOut">Deconnexion</a></button>';
        }
        include './view/header.php';
        include './view/navBar.php';
        include './view/screenArticles.php';

    }
 }