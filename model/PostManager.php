<?php
Namespace Model;

class PostManager extends Manager {
    public function getPosts() 
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS date_creation_fr, latitude, longitude FROM posts ORDER BY creation_date');
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function createPost($content) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(:title, :content, :creation_date)');
        $req->execute(array (
            'title' => 'Titre test',
            'content' => $content['textarea'],
            'creation_date' => date("Y-m-d H:i:s")
        ));
    }

    public function updatePost($updatedPost, $updatedPostId) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ?, creation_date = ? WHERE id = ?');
        $req->execute(array('Updated post test', $updatedPost['textarea'], date("Y-m-d H:i:s"), $updatedPostId));
    }

    public function deletePost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($postId));
    }
}