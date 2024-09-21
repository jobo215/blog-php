<?php

include '../db/Database.php';
include '../helpers/SessionHelper.php';
include "../../models/Post.php";
include '../helpers/PostHelper.php';

if (isset($_POST) && isset($_POST['post-title']) && isset($_POST['post-content']) && isset($_POST['post-category'])) {
    $creator = SessionHelper::getLoggedUserId();
    $post = PostHelper::createPost($_POST['post-title'], $_POST['post-content'], $_POST['post-category'], $creator);
    if ($post == null) {
        header("Location: ../../posts/create.php");
    } else {
        header("Location: ../../posts/posts.php");
    }
}