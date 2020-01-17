<?php
Namespace Model;

class CommentManager extends Manager
{
    public function getCommentsFromPost($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
    
        return $comments;
    }

    public function getAllComments() {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT c.id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, p.title title, p.id postid FROM comments c INNER JOIN posts p ON p.id = c.post_id');
    
        return $comments;
    }
    
    public function postComment($postId, $author, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, reported) VALUES(?,?,?, NOW(), 0)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
    
        return $affectedLines;
    }

    public function getComment($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE id = ? ORDER BY comment_date DESC');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function modifyComment($oldCommentId, $newComment) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $req->execute(array($newComment, $oldCommentId));
    }

    public function getReportedComments() {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE reported > 0');
        return $comments;
    }

    public function reportComment($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET reported = 1 WHERE id = ?');
        $req->execute(array($commentId));
    }

    public function deleteComment($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        
    }

}