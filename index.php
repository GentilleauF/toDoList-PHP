<?php
session_start();
//ROUTER DU SITE
include './model/modelUser.php';
include './model/modelManagerUser.php';
include './services/bddServices.php';
include './services/bddMySQL.php';
include './controller/controllerHome.php';
include './controller/controllerNav.php';
include './utils/functions.php';


//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';
/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch ($path) {
        //route /projet/test -> ./test.php
    case $path === "/PHP_MVC/toDoList/":
    case $path === "/PHP_MVC/toDoList/accueil":
        $accueil = new ControllerHome;
        $accueil->render();
        break;

    case $path === "/PHP_MVC/toDoList/connexion":
        $loginForm = new ControllerHome;
        $loginForm->log();
        break;
        
    case $path === "/PHP_MVC/toDoList/signUp":
        $loginForm = new ControllerHome;
        $loginForm->sign();
        break;

    case $path === "/PHP_MVC/toDoList/signOut":
        $loginForm = new ControllerNav;
        $loginForm->logout();
        break;

    default :
        include './view/page404.php';

}
