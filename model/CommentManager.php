<?php
Namespace Model;

class CommentManager extends Manager
{
    public function getComments($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
    
        return $comments;
    }
    
    public function postComment($postId, $author, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?,?,?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
    
        return $affectedLines;
    }

    public function getComment($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ? ORDER BY comment_date DESC');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function modifyComment($oldCommentId, $newComment) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $req->execute(array($newComment, $oldCommentId));
    }

}