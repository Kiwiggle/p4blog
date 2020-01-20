<?php
Namespace Model;

class UserManager extends Manager {
    
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

    public function logInUser($user) {
        var_dump($user);
        $password = $this->passwordVerify($user);
        if ($password === true) {
            session_start();
            $_SESSION['name'] = $user['name'];
        } else {
            echo "Mauvais identifiant ou mot de passe !";
        }
    }

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