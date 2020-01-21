<?php
Namespace Model;

class PostManager extends Manager {
    public function getPosts() 
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS date_creation_fr, latitude, longitude, chapter_id FROM posts ORDER BY creation_date');
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, latitude, longitude, chapter_id FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function createPost($content) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date, latitude, longitude, chapter_id) VALUES(:title, :content, :creation_date, :latitude, :longitude :chapter)');
        $req->execute(array (
            'title' => $content['titre'],
            'content' => $content['textarea'],
            'creation_date' => date("Y-m-d H:i:s"),
            'latitude' => $content['latitude'],
            'longitude' => $content ['longitude'],
            'chapter' => $content['chapter_id']
        ));
    }

    public function updatePost($updatedPost, $updatedPostId) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ?, creation_date = ?, latitude = ?, longitude = ?, chapter_id = ? WHERE id = ?');
        $req->execute(array(
            $updatedPost['title'],
            $updatedPost['textarea'],
            date("Y-m-d H:i:s"),
            $updatedPost['latitude'],
            $updatedPost['longitude'],
            $updatedPost['chapter_id'],
            $updatedPostId));
    }

    public function deletePost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($postId));
    }
}