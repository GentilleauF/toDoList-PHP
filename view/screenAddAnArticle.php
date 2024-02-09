<div class="m-5">
    <h3 class="text-lg font-medium">Ajouter un article</h3>
    <form action="addAnArticleAction" method="post">
        <p>Nom de l'article : <input type="text" name="article_title" class="border p-1 rounded-md m-2"></p>
        <p>Contenu de l'article : <input type="text" name="article_content" class="border p-1 rounded-md m-2"></p>
        <input type="submit" name="SubmitAddAnArticle" class="bg-blue-500 p-1 px-2 text-white rounded m-2">
    </form>
    <p><?= $messageAddArticle ?></p>
</div>