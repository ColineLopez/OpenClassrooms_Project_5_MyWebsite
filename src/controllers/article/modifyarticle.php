<?php

namespace MyWebsite\Controllers\Article\ModifyArticle;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Post\PostRepository;

class ModifyArticle
{
    public function execute(string $postID, array $input) 
    {
        $authorID = null;
        $title = null;
        $chapo = null;
        $content = null;
        if(!empty($input['authorID']) && !empty($input['title']) && !empty($input['chapo']) && !empty($input['content'])) {
            $authorID = htmlspecialchars($input['authorID']);
            $title = htmlspecialchars($input['title']);
            $chapo = htmlspecialchars($input['chapo']);
            $content = htmlspecialchars($input['content']);

        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }
        
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->modifyArticle($postID, $authorID, $title, $chapo, $content);
        if (!$success) {
            throw new \Exception("Impossible de modifier l'article !");
        } else {
            header('Location: index.php?action=articles');
        }
    }
}