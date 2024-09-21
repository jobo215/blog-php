<?php

class PostHelper
{

    public static function getPosts()
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT post.id, post.title, post.content, post.created_date, category.category_title, CONCAT(users.first_name, ' ', users.last_name) as author FROM post INNER JOIN category ON post.category = category.id INNER JOIN users ON post.creator = users.id");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function formatDates($date)
    {
        $timeDate = strtotime($date);
        return date('d.m.Y', $timeDate);
    }

    public static function getPostsByCategoryId($categoryId)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT post.id, post.title, post.content, post.created_date, category.category_title, CONCAT(users.first_name, ' ', users.last_name) as author FROM post INNER JOIN category ON post.category = category.id INNER JOIN users ON post.creator = users.id WHERE category.id = ?");
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function getPostById($postID)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT post.id, post.title, post.content, post.created_date, post.updated_date, category.category_title, users.id as userID, CONCAT(users.first_name, ' ', users.last_name) as author FROM post INNER JOIN category ON post.category = category.id INNER JOIN users ON post.creator = users.id WHERE post.id = ?");
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function deletePost($postID)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("DELETE FROM `post` WHERE id = ?");
        $stmt->bind_param("i", $postID);
        $stmt->execute();
    }

    public static function createPost($title, $content, $category, $creator)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("INSERT INTO `post`(`title`, `content`, `created_date`, `updated_date`, `category`, `creator`) VALUES (?,?,now(),now(),?,?)");
        $stmt->bind_param("ssii", $title, $content, $category, $creator);
        if (!$stmt->execute()) {
            return null;
        }
        return new Post($title, $content, null, $category);
    }

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