<?php


class ControllerHome
{
    private ?ControllerNav $controllerNav;
    private ?ModelUser $user;

    //Getter and Setter
    public function getNav()
    {
        $this->controllerNav;
    }

    public function setNav(ControllerNav $controllerNav): ControllerHome
    {
        $this->controllerNav = $controllerNav;
        return $this;
    }

    public function getUser()
    {
        $this->controllerNav;
    }

    public function setUser(ModelUser $user): ControllerHome
    {
        $this->user = $user;
        return $this;
    }


    //METHODS
    public function log()
    {
        if (isset($_POST['submitLogin'])) {
            if (
                isset($_POST['login']) and !empty($_POST['login'])
                and isset($_POST['password']) and !empty($_POST['password'])
            ) {
                $sanitize = new Functions;
                $login = $sanitize->sanitize($_POST['login']);
                $password = $sanitize->sanitize($_POST['password']);

                $loginUser = new ManagerUSer();
                $loginUser->setLogin($login);
                $loginUser->setBdd(new bddMySQL('localhost', 'todolist', 'root', ''));
                $logedInUser = $loginUser->login();

                

                if (!empty($logedInUser) and password_verify($password, $logedInUser[0]['password_user'])) {
                    //save Session Storage
                    $_SESSION['id'] = $logedInUser[0]['id'];
                    $_SESSION['name'] = $logedInUser[0]['name_user'];
                    $_SESSION['firstname'] = $logedInUser[0]['firstname_user'];
                    $_SESSION['login'] = $logedInUser[0]['login_user'];
                    $_SESSION['connected'] = true;
    
                    echo '<br> Vous êtes bien connecté.';

                    header("Location: ./accueil");
 
                } else {
                    echo "erreur 1";
                    $messageConnexion = "Utilisateur ou Mot de Passe incorrect.";
                    return $messageConnexion;
                }
            }
        }
    }
    public function sign()
    {
        if (isset($_POST['submitNewUser'])){
            if (
                isset($_POST['name']) and !empty($_POST['name'])
                and isset($_POST['firstname']) and !empty($_POST['firstname'])
                and isset($_POST['login']) and !empty($_POST['login'])
                and isset($_POST['pwd']) and !empty($_POST['pwd'])
            ){
                $sanitize = new Functions;
                $name = $sanitize->sanitize($_POST['name']);
                $firstname = $sanitize->sanitize($_POST['firstname']);
                $login = $sanitize->sanitize($_POST['login']);
                $password = $sanitize->sanitize($_POST['pwd']);
        
        
                $newUser = new ManagerUSer();
                $newUser->setName($name);
                $newUser->setFirstname($firstname);
                $newUser->setLogin($login);
                $newUser->setPwd(password_hash($password, PASSWORD_BCRYPT));
                $newUser->setBdd(new bddMySQL('localhost', 'todolist', 'root', ''));
                $newUser->signUp();
            }


        }
    }
    public function render()
    {
        $loginForm='';
        $signInForm='';
        $connectedNavBar= '';
        
        if (!isset($_SESSION['connected'])) {
            $loginForm = '
            <form action="connexion" method="post" class=" px-8">
            <h2 class="text-lg font-semibold mt-10">Connexion</h2>
            <input type="text" name="login" placeholder="Votre Login" class="border p-1 rounded-md m-2">
            <input type="password" name="password" placeholder="Votre Mot de Passe" class="border p-1 rounded-md m-2">
            <input type="submit" name="submitLogin" value="Se Connecter" class="bg-blue-500 p-1 px-2 text-white rounded m-2">
            </form>';
        }

        if (isset($_SESSION['connected'])) {
            $connectedNavBar = '
                <button><a href="signOut">Deconnexion</a></button>';
        }

        // Affiche la creation de compte si on est connecte
        if (!isset($_SESSION['connected'])) {
            $signInForm = '
            <form action="signUp" method="post" class="px-8">
            <h2 class="text-lg font-semibold mt-10">Creer un compte</h2>
            <input type="text" name="name" placeholder="Nom" class="border p-1 rounded-md m-2">
            <input type="text" name="firstname" placeholder="Prénom" class="border p-1 rounded-md m-2">
            <input type="text" name="login" placeholder="Login" class="border p-1 rounded-md m-2">
            <input type="text" name="pwd" placeholder="Mot de passe" class="border p-1 rounded-md m-2">
            <input type="submit" name="submitNewUser" class="bg-blue-500 p-1 px-2 rounded text-white m-2">
        </form>';
        }
        include './view/header.php';
        include './view/navBar.php';
        include './view/screenHome.php';
    }
}
