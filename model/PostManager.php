<?php
Namespace Model;

class PostManager extends Manager {
    
    /**
     * getPosts récupère et envoie tous les posts et leur contenu
     *
     * @return $posts
     */
    
    public function getPosts() 
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS date_creation_fr, latitude, longitude, chapter_id FROM posts ORDER BY creation_date DESC');
        return $posts;
    }

    /**
     * getPost récupère et envoie un post et son contenu
     *
     * @param  int $postId
     *
     * @return $post
     */
    
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, latitude, longitude, chapter_id FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    /**
     * createPost créée une nouvelle ligne (post) en BDD
     *
     * @param  array $content
     *
     */
    
    public function createPost($content) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date, latitude, longitude, chapter_id) VALUES(:title, :content, :creation_date, :latitude, :longitude, :chapter_id)');
        $req->execute(array (
            'title' => $content['titre'],
            'content' => $content['textarea'],
            'creation_date' => date("Y-m-d H:i:s"),
            'latitude' => $content['latitude'],
            'longitude' => $content ['longitude'],
            'chapter_id' => $content['chapter_id']
        ));
    }

    /**
     * updatePost modifie une ligne déjà existante en BDD
     *
     * @param  array $updatedPost
     * @param  int $updatedPostId
     *
     */
    
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

    /**
     * deletePost supprime une ligne de la BDD
     *
     * @param  int $postId
     *
     */

    public function deletePost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($postId));
    }
}