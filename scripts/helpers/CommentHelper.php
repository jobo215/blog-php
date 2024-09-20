<?php

class CommentHelper
{

    public static function getCommentsByPostId($postID)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT comment.id, comment.content, comment.created_date, users.username FROM comment INNER JOIN users ON comment.commenter = users.id WHERE comment.post = ?");
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function createComment($content, $userID, $postID)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("INSERT INTO `comment`(`content`, `created_date`, `commenter`, `post`) VALUES (?,now(),?,?)");
        $stmt->bind_param("sii", $content, $userID, $postID);
        if (!$stmt->execute()) {
            return false;
        }
        return true;
    }

}