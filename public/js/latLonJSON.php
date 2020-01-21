<?php 
$db = new PDO('mysql:host=localhost;dbname=tpblog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$posts = $db->query('SELECT * FROM posts ORDER BY chapter_id ASC'); 
$array = $posts->fetchAll( PDO::FETCH_ASSOC );
header('Content-Type: application/json');
$json = json_encode( $array );
echo $json;