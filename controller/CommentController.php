<?php
Namespace Controller;
use Model\CommentManager;

class CommentController {

    private $_commentManager;

    function __construct() {
        $this->_commentManager = new CommentManager();
    }

    //FRONT
    
        /**
         * addComment récupère les informations sur formulaire d'ajout de commentaire
         *
         * @param  int $postId 
         * @param  string $author
         * @param  string $comment
         *
         */

        function addComment($postId, $author, $comment) {
            $this->_commentManager->postComment($postId, $author, $comment);
            header('Location: index.php?action=post&id=' . $postId);
        }
    
        /**
         * commentView récupère les commentaires et affiche la vue correspondante
         *
         * @param  int $commentId
         *
         * @return void
         */

        function commentView($commentId) {
            $this->_commentManager->getComment($commentId);
            require('view/frontend/commentView.php');
        }
    
        /**
         * reportComment permet à un utilisateur de signaler un commentaire
         *
         * @param  int $commentId
         *
         */
        
        function reportComment($commentId) {
            $this->_commentManager->reportComment($commentId);
            header('Location: index.php');
        }

    //BACK

        /**
         * tableComments récupère tous les commentaires de la BDD et appelle la vue
         *
         */

        public function tableComments() 
        {
            $comments = $this->_commentManager->getAllComments();
            require('view/backend/tableComments.php');
        }

        /**
         * reportedComments Récupère tous les commentaires signalés et appelle la vue
         *
         * @return void
         */

        public function reportedComments()
        {
            $comments = $this->_commentManager->getReportedComments();
            require('view/backend/tableReportedComments.php');
        }

        public function commentVerified($commentId) {
            $this->_commentManager->commentVerified($commentId);
            header('Location: index.php?action=admin');
        }

        /**
         * deleteComment permet de supprimer un commentaire
         *
         * @param  int $commentId
         *
         */
        
        public function deleteComment($commentId) 
        {
            $this->_commentManager->deleteComment($commentId);
            require('view/backend/admin.php');
        }
}