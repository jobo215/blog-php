<?php

class CommentHelper
{
    /**
     * Method for getting comments by post Id
     * @param int $postID Post id.
     * @return array Array with post data.
     */

    public static function getCommentsByPostId($postID)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT comment.id, comment.content, comment.created_date, users.username FROM comment INNER JOIN users ON comment.commenter = users.id WHERE comment.post = ?");
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Method which creates comment 
     * @param string $content Comment content.
     * @param int $userID ID of user whom commented.
     * @param int $postID Post id.
     * @return bool Bool value if comment is created successfully or not
     */
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