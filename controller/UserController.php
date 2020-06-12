<?php

Namespace Controller;
use Model\UserManager;

class UserController {

    private $_userManager;

    function __construct() 
    {
        $this->_userManager = new UserManager();
    }
    
    /**
     * signIn permet à un user de s'inscrire.
     * Si $user est null, un formulaire s'affiche.
     * Une fois le formulaire rempli et envoyé, le nouvel user part en BDD
     *
     * @param  mixed $user
     *
     */

    function signIn($user = null) {
        if ($user === null) {
            require('view/frontend/signin.php');
        } else {
            $this->_userManager->newUser($_POST);
            header('Location: index.php');
        }
        
    }
    
    /**
     * logIn permet à un user de s'identifier et démarrer une session
     * Par défaut, $user est null, un formulaire s'affiche
     * Lorsque le formulaire est rempli et envoyé, une session démarre.
     *
     * @param  mixed $user
     *
     */
    
    function logIn($user = null) {
        if ($user === null) {
            require('view/frontend/login.php');
        } else {
            $password = $this->_userManager->logInUser($_POST);
                if ($password === true) {
                    $user = $this->_userManager->getUser($_POST['name']);
                    session_start();
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['role'] = $user['role'];
                    header('Location: index.php');
                } else {
                    echo "Mauvais identifiant ou mot de passe !";
                }
        }
        
    }
    
    /**
     * logout permet à un user de se déconnecter
     *
     */

    function logout() {
        session_destroy();
        header('Location: index.php');
    }
}