<?php

namespace MyWebsite\Controllers\Article\CommentModeration;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use MyWebsite\Lib\Database\DatabaseConnection;
use MyWebsite\Model\Comment\CommentRepository;

class CommentModeration
{
    public function execute(array $input)  : void 
    {
        $commentID = null;

        if(!empty($input['commentID'])) {
            $commentID = htmlspecialchars($input['commentID']);

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();

            if(isset($_POST['true'])) {
                $success = $commentRepository->validateComment($commentID);
                header('Location: index.php?action=admin&err=accept');
            } elseif (isset($_POST['false'])) {
                $success = $commentRepository->rejectComment($commentID);
                header('Location: index.php?action=admin&err=refuse');
            } 
        } else {
                throw new \Exception('Les données sont invalides.');
        }
    }
}
