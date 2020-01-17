<?php 
$db = new PDO('mysql:host=localhost;dbname=tpblog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$posts = $db->query('SELECT id, title, latitude, longitude FROM posts'); 
$array = $posts->fetchAll( PDO::FETCH_ASSOC );
header('Content-Type: application/json');
$json = json_encode( $array );
echo $json;