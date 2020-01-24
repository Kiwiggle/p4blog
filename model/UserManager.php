<?php
Namespace Model;

class UserManager extends Manager {
    
    /**
     * newUser créée une nouvelle ligne (user) en BDD
     *
     * @param  array $user
     *
     */
    
    public function newUser($user) {
        $password = password_hash($user['password'], PASSWORD_DEFAULT); 
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO user(name, email, password) VALUES(:name, :email, :password)');
        $req->execute(array (
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $password,
        ));
    }

    /**
     * logInUser vérifie les informations du formulaire récupéré afin d'autoriser la connexion à un user
     *
     * @param array $user
     *
     * @return $passord (boolean)
     */

    public function logInUser($user) {
        $password = $this->passwordVerify($user);
         
        return $password;
    }

    /**
     * passwordVerify vérifie le mot de passe lors de la tentative de connexion d'un user
     *
     * @param  array $user
     *
     * @return $password (boolean)
     */
    
    private function passwordVerify($user) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, password FROM user WHERE name = :name');
        $req->execute(array(
            'name' => $user['name']
        ));
        $result = $req->fetch();
        $password = password_verify($user['password'], $result['password']); 

        return $password;
    }

}