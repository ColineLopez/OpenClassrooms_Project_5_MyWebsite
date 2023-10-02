<?php

namespace MyWebsite\Controllers\Article\AddArticle;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

/**
 * class that allows to add an article
 */
class AddArticle
{
    /**
     * function to add an article from forms input
     * 
     * @param array $input inputs from the form
     * @throws exception if input forms are invalid or it their was an issue posting the SQL Data
     */
    public function execute(array $input) : void
    {
        $email = null;
        $title = null;
        $chapo = null;
        $content = null;
        $image = null;
        if(!empty($input['email']) && !empty($input['title']) && !empty($input['chapo']) && !empty($input['content'])) {
            $email = htmlspecialchars($input['email']);
            $title = htmlspecialchars($input['title']);
            $chapo = htmlspecialchars($input['chapo']);
            $content = htmlspecialchars($input['content']);
            if(!empty($input['image'])) {
                $image = htmlspecialchars($input['image']);
            } else {
                $image = '';
            }

        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }
        
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->createArticle($email, $title, $chapo, $content, $image);
        if (!$success) {
            throw new \Exception("Impossible d'ajouter l'article !");
        } else {
            header('Location: index.php?action=articles&err=add');
        }
    }
}
