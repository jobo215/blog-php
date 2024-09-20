<?php

include '../db/Database.php';
include '../helpers/SessionHelper.php';
include '../helpers/CommentHelper.php';

if (isset($_POST['postID']) && isset($_POST['comment'])) {
    $isCommented = CommentHelper::createComment($_POST['comment'], SessionHelper::getLoggedUserId(), $_POST['postID']);
    if ($isCommented) {
        header("Location: ../../posts/post.php?id=" . $_POST['postID']);
    } else {
        header("Location: ../../posts/posts.php");
    }
}