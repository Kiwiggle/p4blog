<?php
namespace Model;
use \PDO;

class Manager {
    protected function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=tpblog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}