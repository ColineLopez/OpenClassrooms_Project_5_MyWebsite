<?php

namespace MyWebsite\Controllers\Article\AddComment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Comment\CommentRepository;

class AddComment
{
    public function execute(string $postID, array $input) 
    {
        $author = null;
        $comment = null;
        if(!empty($input['author']) && !empty($input['comment'])) {
            $author = htmlspecialchars($input['author']);
            $comment = htmlspecialchars($input['comment']);

        } else {
            throw new \Exception('Les données du formulaires sont invalides.');
        }
        
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($postID, $author, $comment);
        if (!$success) {
            throw new \Exception("Impossible d'ajouter le commentaire !");
        } else {
            header('Location: index.php?action=article&postID=' . $postID);
        }
    }
}
