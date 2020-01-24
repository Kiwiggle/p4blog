<?php

Namespace Controller;
use Model\PostManager;
use Model\CommentManager;


class PostController {

    private $_commentManager; 
    private $_postManager; 

    function __construct() {
        $this->_commentManager = new CommentManager();
        $this->_postManager = new PostManager();
    }
 
    //FRONT

        /**
         * listPosts récupère tous les posts et appelle la vue
         *
         */
        
        function listPosts()
        {
            $this->_postManager->getPosts();
            require('view/frontend/listPostsView.php');
        }

        /**
         * post récupère un post grâce à son ID, ainsi que tous les commentaires qui y sont associés 
         * et appelle la vue
         *
         * @param  int $postId
         *
         */

        function post($postId)
        {
            $post = $this->_postManager->getPost($postId);
            $comments = $this->_commentManager->getCommentsFromPost($postId);
            require('view/frontend/postView.php');
        }

    //BACK

        /**
         * tablePosts récupère tous les posts et appelle la vue pour créer un tableau
         *
         */
        
        public function tablePosts()
        {
            $posts = $this->_postManager->getPosts();
            require('view/backend/tablePosts.php');
        }

        /**
         * createPost permet de créer un post.
         * Par défaut, $post (= réponse au formulaire) est null, un formulaire s'affiche.
         * Lorsque le formulaire est rempli et envoyé, $post est envoyé dans la BDD
         * et permet de créer un nouveau post.
         *
         * @param  mixed $post
         *
         */

        public function createPost($post = null) {
            if ($post === null) {
                require('view/backend/createPost.php');
            } else {
                $this->_postManager->createPost($post);
                header('Location: index.php');
            }
        }

        /**
         * deletePost permet de supprimer un post
         *
         * @param  int $postId
         *
         */
        
        public function deletePost($postId)
        {
            $this->_postManager->deletePost($postId);
            header('Location: index.php');
        }

        /**
         * updatePost permet de modifier un post.
         * Par défaut, $updatedPost est null, un formulaire s'affiche.
         * Ce formulaire contient déjà les informations du post à modifier.
         * Une fois le formulaire rempli et envoyé, les infos partent en BDD.
         *
         * @param  int $postId
         * @param  mixed $updatedPost
         *
         */
        
        public function updatePost($postId, $updatedPost = null)
        {
            if ($updatedPost === null) {
                $post = $this->_postManager->getPost($postId);
                require('view/backend/updatePost.php');
            } else {
                $post = $this->_postManager->updatePost($updatedPost, $postId);
                header('Location: index.php');
            }
        }
}