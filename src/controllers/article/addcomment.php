<?php

namespace MyWebsite\Controllers\Article\AddComment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Comment\CommentRepository;

/**
 * class that allows to add a comment
 */
class AddComment
{
    /**
     * function to add an article from forms input
     * 
     * @param string $postID ID of the article we want to comment
     * @param array $input inputs from the form
     * @throws exception if input forms are invalid or it their was an issue posting the SQL Data
     */
    public function execute(string $postID, array $input) : void
    {
        $author = null;
        $comment = null;
        if(!empty($input['author']) && !empty($input['comment'])) {
            $author = htmlspecialchars($input['author']);
            $comment = htmlspecialchars($input['comment']);

        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }
        
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($postID, $author, $comment);
        if (!$success) {
            throw new \Exception("Impossible d'ajouter le commentaire !");
        } else {
            header('Location: index.php?action=article&postID=' . $postID ."&err=comm");
        }
    }
}
