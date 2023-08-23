<?php

namespace MyWebsite\Controllers\Article\AddArticle;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

class AddArticle
{
    public function execute(array $input) 
    {
        $authorID = null;
        $title = null;
        $chapo = null;
        $content = null;
        $image = null;
        if(!empty($input['authorID']) && !empty($input['title']) && !empty($input['chapo']) && !empty($input['content'])) {
            $authorID = htmlspecialchars($input['authorID']);
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
        $success = $postRepository->createArticle($authorID, $title, $chapo, $content, $image);
        if (!$success) {
            throw new \Exception("Impossible d'ajouter l'article !");
        } else {
            header('Location: index.php?action=articles');
        }
    }
}