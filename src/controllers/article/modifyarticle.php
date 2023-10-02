<?php

namespace MyWebsite\Controllers\Article\ModifyArticle;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

/**
 * class that allows to edit an article
 */
class ModifyArticle
{
    /**
     * function that allows to moderate comment
     * 
     * @param string $postID the article ID we want to edit
     * @param array $input get the form inputs that will modify the article
     * @throws exception if forms data are invalid.
     */
    public function execute(string $postID, array $input) : void
    {
        $email = null;
        $title = null;
        $chapo = null;
        $content = null;
        if(!empty($input['email']) && !empty($input['title']) && !empty($input['chapo']) && !empty($input['content'])) {
            $email = htmlspecialchars($input['email']);
            $title = htmlspecialchars($input['title']);
            $chapo = htmlspecialchars($input['chapo']);
            $content = htmlspecialchars($input['content']);

        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }
        
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->modifyArticle($postID, $email, $title, $chapo, $content);
        if (!$success) {
            throw new \Exception("Impossible de modifier l'article !");
        } else {
            header('Location: index.php?action=articles&err=modif');
        }
    }
}
