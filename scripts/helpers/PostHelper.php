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

}