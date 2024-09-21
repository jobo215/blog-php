<?php

include '../db/Database.php';
include '../helpers/SessionHelper.php';
include "../../models/Post.php";
include '../helpers/PostHelper.php';

if (isset($_POST) && isset($_POST['post-title']) && isset($_POST['post-content']) && isset($_POST['post-category']) && isset($_POST['postID'])) {
    $postID = $_POST['postID'];
    $post = PostHelper::editPost($postID, $_POST['post-title'], $_POST['post-content'], $_POST['post-category']);
    if ($post == null) {
        header("Location: ../../posts/edit.php?id=" . $postID);
    } else {
        header("Location: ../../posts/post.php?id=" . $postID);
    }
}