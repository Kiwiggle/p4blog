<?php
Namespace Model;

class CommentManager extends Manager
{
    /**
     * getCommentsFromPost récupère & envoie les commentaire d'un seul post
     *
     * @param  int $postId
     *
     * @return $comments
     */

    public function getCommentsFromPost($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, reported, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? AND reported <> 1 ORDER BY comment_date DESC');
        $comments->execute(array($postId));
    
        return $comments;
    }

    /**
     * getAllComments récupère et envoie tous les commentaires de la BDD
     *
     * @return $comments 
     */
    
    public function getAllComments() {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT c.id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, p.title title, p.id postid FROM comments c INNER JOIN posts p ON p.id = c.post_id');
    
        return $comments;
    }
    
    /**
     * postComment envoie le nouveau commentaire dans la BDD
     *
     * @param  int $postId
     * @param  string $author
     * @param  string $comment
     *
     */

    public function postComment($postId, $author, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, reported) VALUES(?,?,?, NOW(), 0)');
        $comments->execute(array($postId, $author, $comment));
    }

    /**
     * getComment récupère et envoie un commentaire grâce à son ID
     *
     * @param  int $commentId
     *
     * @return $comment
     */

    public function getComment($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE id = ? ORDER BY comment_date DESC');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    /**
     * getReportedComments récupère et envoie tous les commentaires signalés
     *
     * @return $comments
     */
    
    public function getReportedComments() {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE reported = 1');
        return $comments;
    }

    /**
     * reportComment permet de signaler un commentaire en BDD
     *
     * @param  int $commentId
     *
     */

    public function reportComment($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET reported = 1 WHERE id = ?');
        $req->execute(array($commentId));
    }

    /**
     * commentVerified permet d'approuver un commentaire en BDD
     *
     * @param  int $commentId
     *
     */

    public function commentVerified($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET reported = 2 WHERE id = ?');
        $req->execute(array($commentId));
    }

    /**
     * deleteComment supprime un commentaire de la BDD
     *
     * @param  int $commentId
     *
     */

    public function deleteComment($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
    }

    /**
     * supprime les commentaires liés à un post supprimé
     *
     * @param  int $postId
     *
     */

    public function deleteCommentsFromPost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE post_id = ?');
        $req->execute(array($postId));
    }

}