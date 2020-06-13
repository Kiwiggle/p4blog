<?php
namespace Model;
use \PDO;

class Manager {
    
    /**
     * dbConnect connexion à la bdd
     *
     */

    protected function dbConnect() {
        $db = new PDO('mysql:host=127.0.0.1:8889;dbname=tpblog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}