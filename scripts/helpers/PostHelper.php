<?php

class PostHelper
{
    /**
     * Method which gets all posts
     * @return array Array with post data.
     */

    public static function getPosts()
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT post.id, post.title, post.content, post.created_date, category.category_title, CONCAT(users.first_name, ' ', users.last_name) as author FROM post INNER JOIN category ON post.category = category.id INNER JOIN users ON post.creator = users.id");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Method which format dates for posts data
     * @param string $date Date in string format
     * @return string String with formatted date.
     */
    public static function formatDates($date)
    {
        $timeDate = strtotime($date);
        return date('d.m.Y', $timeDate);
    }

    /**
     * Method which gets all posts by category
     * @param int $categoryId Category ID
     * @return array Array with posts
     */
    public static function getPostsByCategoryId($categoryId)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT post.id, post.title, post.content, post.created_date, category.category_title, CONCAT(users.first_name, ' ', users.last_name) as author FROM post INNER JOIN category ON post.category = category.id INNER JOIN users ON post.creator = users.id WHERE category.id = ?");
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Method which gets post by it's id
     * @param int $postID Post id
     * @return array Array with post.
     */
    public static function getPostById($postID)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT post.id, post.title, post.content, post.created_date, post.updated_date, category.category_title, users.id as userID, CONCAT(users.first_name, ' ', users.last_name) as author FROM post INNER JOIN category ON post.category = category.id INNER JOIN users ON post.creator = users.id WHERE post.id = ?");
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Method which deletes post by it's id
     * @param string $postID Post id
     */
    public static function deletePost($postID)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("DELETE FROM `post` WHERE id = ?");
        $stmt->bind_param("i", $postID);
        $stmt->execute();
    }

    /**
     * Method which creates post
     * @param string $title Post title
     * @param string $content Post content
     * @param int $category Post category id
     * @param int $creator Post creator id
     * @return Post|null Returns Post object if it is created, else returns null
     */
    public static function createPost($title, $content, $category, $creator)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("INSERT INTO `post`(`title`, `content`, `created_date`, `updated_date`, `category`, `creator`) VALUES (?,?,now(),now(),?,?)");
        $stmt->bind_param("ssii", $title, $content, $category, $creator);
        if (!$stmt->execute()) {
            return null;
        }
        return new Post($title, $content, null, $category);
    }

    /**
     * Method which edits post
     * @param int $id Post id
     * @param string $title Post title
     * @param string $content Post content
     * @param int $category Post category id
     * @return Post|null Method returns Post if it's edited successfully, else returns null
     */
    public static function editPost($id, $title, $content, $category)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("UPDATE `post` SET `title`= ?,`content`= ?,`updated_date`= now(),`category`= ? WHERE `id` = ?");
        $stmt->bind_param("ssii", $title, $content, $category, $id);
        if (!$stmt->execute()) {
            return null;
        }
        return new Post($title, $content, null, $category);
    }

}