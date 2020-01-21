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
        $password = $this->passwordVerify($user);
         
        return $password;
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