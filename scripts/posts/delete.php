<?php

include '../db/Database.php';
include '../helpers/PostHelper.php';
include '../helpers/SessionHelper.php';

if (isset($_POST['postID'])) {
    $post = PostHelper::getPostById($_POST['postID'])[0];
    if ($post != null && $post['userID'] == SessionHelper::getLoggedUserId()) {
        PostHelper::deletePost($post['id']);
        header("Location: ../../posts/posts.php");
    }
} else {
    header("Location: ../../posts/posts.php");
}